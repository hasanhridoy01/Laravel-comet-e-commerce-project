<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

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

    //post Search By Category
    public function postByCategory($slug)
    {   
        $cats = Category::where('slug', $slug) -> first();
        return view('fontend.category-search', compact('cats'));
    }

    //Search By Category
    public function postBySearch(Request $request)
    {
        $search_text = $request -> search;
        $posts = Post::where('title', 'LIKE', '%'.$search_text.'%') -> get();
        return view('fontend.search', compact('posts'));
    }
}
