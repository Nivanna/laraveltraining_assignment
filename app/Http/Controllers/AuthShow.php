<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Blog;

class AuthShow extends Controller
{
    //show indevidual
    function index(){
        $user_id = session('logged')['user_id'];
        $user = User::find($user_id);
        $data = Blog::where('user_id',$user_id)
                        ->orderBy('title', 'asc')
                        ->paginate(4);
        return view('welcome', ['blogs'=> $data, 'name' => $user -> name ]);
    }
    //delete blog
    function delete($id){
        
        $blog = Blog::find($id);

        //delete current image from public/images folder
        $currentImagePath = 'images/'.$blog -> image_path;

        if(File::exists($currentImagePath)){
            File::delete($currentImagePath);
        }
        
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
            'description' => 'required',
        ]);

        $blog =  Blog::find($req -> id);

        if(!$req->image){
            //insert data
            $blog -> title = $req -> title;
            $blog -> description = $req -> description;
            $blog -> image_path = $blog -> image_path;
            $blog -> user_id = session('logged')['user_id'];
            $blog -> save();
            return redirect('/');
        }

        //delete current image from public/images folder
        $currentImagePath = 'images/'.$blog -> image_path;
        
        if(File::exists($currentImagePath)){
            File::delete($currentImagePath);
        }

        //ganerate new image path
        $newImageName = time(). 
                '-'.
                session('logged')['name'].
                '.'.
                $req-> image -> guessExtension();

        //stor image in public/iamges folder
        $req -> image -> move(public_path('images'), $newImageName);

        //insert data
        $blog -> title = $req -> title;
        $blog -> description = $req -> description;
        $blog -> image_path = $newImageName;
        $blog -> user_id = session('logged')['user_id'];
        $blog -> save();

        return redirect('/');
    }
}
