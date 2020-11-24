<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class FontEndController extends Controller
{
    public function HomePage()
    {
    	return view('fontend.home');
    }

    public function BlogPage()
    {   
    	$all_post = Post::latest() -> get();
    	return view('fontend.blog', compact('all_post'));
    }

    public function SingleBlogPage()
    {
    	return view('fontend.blog-single');
    }
}
