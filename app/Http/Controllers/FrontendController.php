<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discussion;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $forumsCount = count(Forum::all());
        $topicsCount = count(Discussion::all());
        $totalMembers = count(User::all());
        $newest = User::latest()->first();
        $totalCategories = count(Category::all());
        $categories = Category::latest()->get();
        // $categories = Category::with('forums.discussions')->get();
        return view('welcome', compact('categories', 'forumsCount', 'topicsCount', 'newest', 'totalMembers', 'totalCategories'));
    }

    public function categoryOverview($id){

        $category = Category::find($id);
        return view('client.category-overview', compact('category'));
    }

    public function forumOverview($id){

        $forum = Forum::find($id);
        return view('client.forum-overview', compact('forum'));
    }
}
