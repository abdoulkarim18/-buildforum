<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discussion;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardControoler extends Controller
{
    public function home(){

        $users = User::latest()->paginate(10);
        $categories = Category::latest()->paginate(10);
        $topics = Discussion::latest()->paginate(10);
        $forums = Forum::latest()->paginate(10);

        return view('admin.pages.home', compact('users','categories','topics','forums'));

    }

    public function users(){

        $users = User::latest()->paginate(10);
        return view('admin.pages.users', compact('users'));
    }

    public function show($id){

        $latest_user_post = Discussion::where('user_id', auth()->id())->latest()->first();
        $latest = Discussion::latest()->first();
        $user = User::find($id);

        return view('admin.pages.user', compact('user', 'latest_user_post', 'latest'));
    }
    public function profile(){

        $latest_user_post = Discussion::where('user_id', auth()->id())->latest()->first();
        $latest = Discussion::latest()->first();
        $user = auth()->user();

        return view('admin.pages.user', compact('user', 'latest_user_post', 'latest'));
    }

    public function destroy($id){

        $user = User::find($id);
        $user->delete();
        toastr()->success('User Deleted successfully!');
        return back();

    }
}
