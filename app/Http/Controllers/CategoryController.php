<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(20);

        return view('admin.pages.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.new_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([

            'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
        ]);

        $image = $request->image;
        $name = $image->getClientOriginalName();
        $new_name = time().$name;
        $dir = "strorage/images/categories/";
        $image->move($dir, $new_name);

        $category = new Category();
        $category->title = $request->title;
        $category->desc = $request->desc;
        $category->image = $new_name ;
        $category->user_id = auth()->id();
        $category->save();
        Session::flash('message','Category Created Successfuly! ');
        Session::flash('alert-class','alert-success');
        return back();
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
        //
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
        //
    }
}
