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
        $few_users = User::latest()->take(5)->get();
        // $categories = Category::with('forums.discussions')->get();
        return view('welcome', compact('categories', 'forumsCount', 'topicsCount', 'newest', 'totalMembers', 'totalCategories', 'users_online', 'few_users'));
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

    public function users(){

        $users = User::latest()->paginate(10);
        return view('client.users', compact('users'));
    }

    public function photoUpdate(Request $request, $id){

        if (!$request->profile_image ) {
            toastr()->error('Please select Image!');
            return back();
        }

        $image = $request->profile_image;
        $name = $image->getClientOriginalName();
        $new_image = time().$name;
        $dir = 'storage/profile/';
        $image->move($dir,$new_image);
        $user = User::find($id);
        $user->profile_image = $new_image;
        $user->save();
        toastr()->success('The profile Photo Updated successfully!');
        return back();

    }
}
