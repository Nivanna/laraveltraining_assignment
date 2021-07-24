<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Blog;
use App\Models\User;

class UploadController extends Controller
{

    //add blog
    function addBlog(Request $req){
        $req -> validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max: 2000'
        ]);

        // generate image's path
        $newImageName = time(). 
                        '-'.
                        session('logged')['name'].
                        '.'.
                        $req-> image -> guessExtension();

        //stor image in public/iamges folder
        $req -> image -> move(public_path('images'), $newImageName);
         
        $blog = new Blog;
        //insert data
        $blog -> title = $req -> title;
        $blog -> description = $req -> description;
        $blog -> image_path = $newImageName;
        $blog -> user_id = session('logged')['user_id'];
        
        $blog -> save();
        return redirect('upload');
    }
}
