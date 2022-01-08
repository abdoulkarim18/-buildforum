<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardControoler extends Controller
{
    public function home(){

        $users = User::all();
        return view('admin.pages.home', compact('users'));

    }
}
