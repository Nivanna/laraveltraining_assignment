<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    //user register
    function userRegister(Request $req){

        $req -> validate([
            'username' => 'required | min:3',
            'useremail' => 'required',
            'userpassword' => 'required | min: 6'
        ]);
        
        $user = new User;
        $isAlreadyHas =  User::where('email',$req -> useremail)->first();
        if($isAlreadyHas  != null){
            return redirect('register');
        }

        $user -> name = $req -> username;
        $user -> email = $req -> useremail;
        $user -> password = bcrypt($req -> userpassword);
        $user-> save();

        return redirect('login');
    }

    //user login
    function userLogin(Request $req){

        $req -> validate([
            'useremail' => 'required',
            'userpassword' => 'required | min: 6'
        ]);
        
        //check if user is found
        $user = User::where('email',$req -> useremail)->first();

        if($user  == null){
            return redirect('register');
        }
        //check weather password is matched
        $isMatchedPassword = Hash::check($req -> userpassword, $user -> password);
        if(!$isMatchedPassword){
            return redirect('register');
        }
        $req ->session() -> put('logged', ['isLogged' => true, 'name' => $user -> name, 'user_id' => $user -> id]);

        return redirect('/');
    }
}
