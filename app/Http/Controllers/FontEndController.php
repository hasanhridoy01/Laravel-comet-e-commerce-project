<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Product;

use Illuminate\Http\Request;

class FontEndController extends Controller
{   
    //home index
    public function HomePage()
    {
    	return view('fontend.home');
    }
    
    //homepage two
    public function HomePageTwo()
    {
        return view('fontend.hometwo');
    }

    public function BlogPage()
    {   
    	$all_post = Post::latest() -> paginate(5);
    	return view('fontend.blog', compact('all_post'));
    }
    
    //single post search
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

    //post search by Tag
    public function postByTag($slug)
    {
        $tags = Tag::where('slug', $slug) -> first();
        return view('fontend.tag-search', compact('tags'));
    }

    //Search By Post
    public function postBySearch(Request $request)
    {
        $search_text = $request -> search;
        $posts = Post::where('title', 'LIKE', '%'.$search_text.'%') -> get();
        return view('fontend.search', compact('posts'));
    }

    //product shop page show
    public function ShopPage()
    {   
        $all_product = Product::latest() -> paginate(4);
        $all_cat = Category::latest() -> get();
        $all_tag = Tag::latest() -> get();
        return view('fontend.shop', compact('all_product','all_cat','all_tag'));
    }

    //product shopSingle page show
    public function ShopSinglePage()
    {
        return view('fontend.shop-single');
    }

    //product search by category
    public function ProductByCategory($slug)
    {   
        $all_cat = Category::where('slug',$slug) -> first();
        return view('fontend.category-shop-search', compact('all_cat'));
    }

    //product search by tag
    public function ProductByTag($slug)
    {
        $all_tag = Tag::where('slug', $slug) -> first();
        return view('fontend.tag-shop-search', compact('all_tag'));
    }

    //single product
    public function SingleProduct($slug)
    {
        $all_product = Product::where('slug', $slug) -> first();
        return view('fontend.shop-single', compact('all_product'));

    }

    //product search by search box
    public function ProductSearch(Request $request)
    {
        $search_text = $request -> search;
        $product = Product::where('name', 'LIKE', '%'.$search_text.'%') -> orWhere('price', 'LIKE', '%'.$search_text.'%') -> get();
        return view('fontend.product-search', compact('product'));
    }
}
