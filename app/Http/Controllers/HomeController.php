<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $latest_user_post = auth()->user()->discussions()->latest()->first() OU;
        $latest_user_post = Discussion::where('user_id', auth()->id())->latest()->first();
        $latest = Discussion::latest()->first();
        return view('home', compact('latest_user_post','latest'));
    }
}
