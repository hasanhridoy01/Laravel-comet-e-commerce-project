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
    	$all_post = Post::latest() -> paginate(5);
    	return view('fontend.blog', compact('all_post'));
    }

    public function SingleBlogPage($slug)
    {   
        $single_post = Post::where('slug', $slug) ->  first();
    	return view('fontend.blog-single', compact('single_post'));
    }
}
