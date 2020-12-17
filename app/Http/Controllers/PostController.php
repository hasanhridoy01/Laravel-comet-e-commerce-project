<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $all_post = Post::latest() -> get();
        $all_cat = Category::latest() -> get();
        return view('admin.post.index', compact('all_post', 'all_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //form validation
        $this -> validate($request, [
           'title' => 'required',
           'content' => 'required',
        ]);

        //featured_image upload
        if ( $request -> hasFile('fimg') ) {
            $fimage = $request -> file('fimg');
            $unique_fimg = md5(time().rand()) .'.'. $fimage -> getClientOriginalExtension();
            $fimage -> move(public_path('media/posts/'), $unique_fimg);
        }else{
            $unique_fimg = '';
        }

        //data send with database
        $post_user = Post::create([
             'title' => $request -> title,
             'slug' => Str::slug($request -> title),
             'user_id' => Auth::user() -> id,
             'content' => $request -> content,
             'featured_image' => $unique_fimg,
        ]);

        //category add
        $post_user -> categoris() -> attach($request -> categoris);

        //return with page
        return redirect() -> route('post.index') -> with('success', 'Post added successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_post = Post::find($id);
        $all_cat = Category::all();
        
        $post_cat = $all_post -> categoris;
        
        $checked_id = [];
        foreach ( $post_cat as $checked_cat ) {
           array_push($checked_id, $checked_cat -> id) ;
        }
        
        $cat_list = '';
        foreach ( $all_cat as $cat ) {
            if ( in_array($cat -> id, $checked_id) ) {
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $cat_list .= '
                        <input type="checkbox" '.$checked.' id="cn" value="'.$cat -> id.'" name="categoris[]">'.$cat -> name.'<label for="cn"></label>
                        <br>';
        }

        return [
            'title' => $all_post -> title,
            'featured_image' => $all_post -> featured_image,
            'content' => $all_post -> content,
            'cat_list' => $cat_list,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts -> delete();

        //return with home page
        return redirect() -> route('post.index') -> with('success', 'Post Deleted successful');
    }

    /**
     * unpublished Post Method
     */
    public function unpublishedCategory($id)
    {
        $data = Post::find($id);
        $data -> status  = 'unpublished';
        $data -> update();

        return redirect() -> route('post.index') -> with('success', 'Post Unpublished successful');
    }

    /**
     * publishedCategory Post Method
     */
    public function publishedCategory($id){

        $data = Post::find($id);
        $data -> status = 'Published';
        $data -> update();

        return redirect() -> route('post.index') -> with('success', 'Post Published successful');
    }
}
