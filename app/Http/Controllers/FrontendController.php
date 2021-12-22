<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $categories = Category::latest()->get();
        return view('welcome', compact('categories'));
    }

    public function categoryOverview($id){

        $category = Category::find($id);
        return view('client.category-overview', compact('category'));
    }
}
