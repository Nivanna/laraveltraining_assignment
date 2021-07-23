<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
class AuthShow extends Controller
{
    //show indevidual
    function index(){
        $user_id = session('logged')['user_id'];
        $data = User::find($user_id)->getBlog;
        $user = User::find($user_id);
        return view('welcome', ['blogs'=> $data, 'name'=> $user -> name ]);
    }
    //delete blog
    function delete($id){
        $blog = Blog::find($id);
        $blog -> delete();
        return redirect('/');
    }
    //editing blog
    function showBlog($id){
        $blog = Blog::find($id);
        return view('pages.edit', ['blog' => $blog]);
    }

    //updated
    function update(Request $req){
        $req -> validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $blog =  Blog::find($req -> id);

        //insert data
        $blog -> title = $req -> title;
        $blog -> description = $req -> description;
        $blog -> user_id = session('logged')['user_id'];
        
        $blog -> save();
        return redirect('/');
    }
}
