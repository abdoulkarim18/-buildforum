<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, $id){

        $input = $request->all();
        $user = User::find($id);
        $user->fill($input)->save();
        toastr()->success('Your details have been successfully!');
        return back();
    }
}
