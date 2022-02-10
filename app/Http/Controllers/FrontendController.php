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

        $user = new User;
        $users_online = $user->allOnline();
        $forumsCount = count(Forum::all());
        $topicsCount = count(Discussion::all());
        $totalMembers = count(User::all());
        $newest = User::latest()->first();
        $totalCategories = count(Category::all());
        $categories = Category::latest()->get();
        // $categories = Category::with('forums.discussions')->get();
        return view('welcome', compact('categories', 'forumsCount', 'topicsCount', 'newest', 'totalMembers', 'totalCategories', 'users_online'));
    }

    public function categoryOverview($id){

        $category = Category::find($id);
        $user = new User;
        $users_online = $user->allOnline();
        $forumsCount = count(Forum::all());
        $topicsCount = count(Discussion::all());
        $totalMembers = count(User::all());
        $newest = User::latest()->first();
        $totalCategories = count(Category::all());
        // $categories = Category::latest()->get();
        // $categories = Category::with('forums.discussions')->get();
        return view('client.category-overview', compact('category','users_online', 'forumsCount', 'topicsCount', 'newest', 'totalMembers', 'totalCategories'));
    }

    public function forumOverview($id){

        $forum = Forum::find($id);
        return view('client.forum-overview', compact('forum'));
    }

    public function profile($id){

        $user = User::find($id);
        $latest_user_post = Discussion::where('user_id', auth()->id())->latest()->first();
        $latest = Discussion::latest()->first();
        return view('client.user_profile', compact('user','latest_user_post', 'latest'));
    }
}
