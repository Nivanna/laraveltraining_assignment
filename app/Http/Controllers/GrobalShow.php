<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class GrobalShow extends Controller
{
    //show grobal data
    function showAll(){
        $data = Blog::orderBy('title', 'asc') -> paginate(4);
        return view('pages.home', ['blogs'=> $data]);
    }

    //show specific post
    function showPost($id){
        $post = Blog::find($id);
        return view('pages.showpost', ['blog' => $post]);
    }
}
