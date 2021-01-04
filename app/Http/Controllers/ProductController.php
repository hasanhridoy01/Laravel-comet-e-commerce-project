<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $all_product = Product::latest() -> get();
        $all_cat = Category::latest() -> get();
        $all_tag = Tag::latest() -> get();

        return view('admin.post.product.index',compact('all_product', 'all_cat', 'all_tag'));
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
        $this -> validate($request,[ 
            'name' => 'required',
            'brand' => 'required',
        ]);

         //featured_image upload
        if ( $request -> hasFile('fimg') ) {
            $fimage = $request -> file('fimg');
            $unique_fimg = md5(time().rand()) .'.'. $fimage -> getClientOriginalExtension();
            $fimage -> move(public_path('media/products/'), $unique_fimg);
        }

        //data send with database
        $all_product = Product::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name),
            'brand' => $request -> brand,
            'price' => $request -> price,
            'image' => $unique_fimg,
        ]);

        //category add
        $all_product -> categoris() -> attach($request -> categoris);

        //tag add
        $all_product -> tags() -> attach($request -> tags);

        //return with home page
        return redirect() -> route('product.index') -> with('success', 'Product Added Successfull');
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
        $data = Product::find($id);
        $cats = Category::all();
        $tags = Tag::all();

        $all_tag = $data -> tags;

        $checked_id = [];
        foreach ( $all_tag as $tag ) {
            array_push($checked_id, $tag -> id);
        }
        
        $tag_list = '';
        foreach ( $tags as $tag ) {
            if ( in_array($tag -> id, $checked_id) ) {
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $tag_list .= '<input type="checkbox" '.$checked.' id="tg" value="'.$tag -> id.'" name="tags[]"><label for="tg"> '.$tag -> name.' </label><br>';
        }

        $categoris = $data -> categoris;

        $checked_id = [];
        foreach ( $categoris as $all_cat ) {
            array_push($checked_id, $all_cat -> id);
        }

        
        $cat_list = '';
        foreach ( $cats as $cat ) {
            if ( in_array($cat -> id, $checked_id) ) {
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $cat_list .= '<input type="checkbox" '.$checked.' id="cn" value="'.$cat -> id.'" name="categoris[]"><label for="cn"> '.$cat -> name.' </label><br>';
        }

        return [
           'name' => $data -> name,
           'id' => $data -> id,
           'image' => $data -> image,
           'brand' => $data -> brand,
           'price' => $data -> price,
           'cat_list' => $cat_list,
           'tag_list' => $tag_list,
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
        $data = Product::find($id);

        //file upload photo
        if ( $request -> hasFile('upimg') ) {
            $upimg = $request -> file('upimg');
            $unique_file_name = md5(time().rand()) .'.'. $upimg -> getClientOriginalExtension();
            $upimg -> move(public_path('media/products/'), $unique_file_name);
        }else{
            $unique_file_name = $unique_fimg;
        }
        
        //Product Update
        $data -> name = $request -> name;
        $data -> slug = Str::slug($request -> name);
        $data -> brand = $request -> brand;
        $data -> image = $unique_file_name;
        $data -> price = $request -> price;
        $data -> update();

        //tag remove
        $data -> tags() -> detach();

        //  //tag add
        $data -> tags() -> attach($request -> tags);
        
        // //category remove
        $data -> categoris() -> detach();

        //category add
        $data -> categoris() -> attach($request -> categoris);

        //return with home page
        return redirect() -> route('product.index') -> with('success', 'Product Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data -> delete();

        return redirect() -> route('product.index') -> with('success', 'Product Deleted successful');
    }

    
    /**
     * unpublished Product Method
     */
    public function unpublished($id)
    {
        $data = Product::find($id);
        $data -> status  = 'unpublished';
        $data -> update();

        return redirect() -> route('product.index') -> with('success', 'Product Unpublished successful');
    }

    /**
     * publishedCategory Product Method
     */
    public function published($id){

        $data = Product::find($id);
        $data -> status = 'Published';
        $data -> update();

        return redirect() -> route('product.index') -> with('success', 'Product Published successful');
    }
}
