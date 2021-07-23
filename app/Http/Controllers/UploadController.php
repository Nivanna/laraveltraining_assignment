<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class UploadController extends Controller
{

    //add blog
    function addBlog(Request $req){

        $req -> validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $blog = new Blog;

        //insert data
        $blog -> title = $req -> title;
        $blog -> description = $req -> description;
        $blog -> user_id = session('logged')['user_id'];
        
        $blog -> save();
        return redirect('upload');
    }
}
