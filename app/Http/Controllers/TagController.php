<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $all_tag = Tag::latest() -> get();
        return view('admin.post.tag.index', compact('all_tag'));
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
        $this -> validate($request, [
            'name'  => 'required | unique:tags'
        ]);

        Tag::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name),
        ]);

        return redirect() -> route('tag.index') -> with('success', 'Tag Added Successfull');
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
        $all_tag = Tag::find($id);
        return [
            'name' => $all_tag -> name,
            'id' => $all_tag -> id,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $id = $request -> id;
        $tag = Tag::find($id);

        $tag -> name = $request -> name;
        $tag -> slug = Str::slug($request -> name);
        $tag -> update();

        return redirect() -> route('tag.index') -> with('success', 'Tag Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tag::find($id);
        $tags -> delete();

        return redirect() -> route('tag.index') -> with('success', 'Tag Deleted Successfull');
    }


    /**
     * unpublished Tag Method
     */
    public function unpublishedTags($id)
    {
        $data = Tag::find($id);
        $data -> status  = 'unpublished';
        $data -> update();

        return redirect() -> route('post-category.index') -> with('success', 'Tag Unpublished successful');
    }

    /**
     * publishedCategory Tag Method
     */
    public function publishedTags($id){

        $data = Tag::find($id);
        $data -> status = 'Published';
        $data -> update();

        return redirect() -> route('post-category.index') -> with('success', 'Tag Published successful');
    }
}
