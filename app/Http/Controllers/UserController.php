<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function view_user(Request $request){
        $users = User::where('role', 'guest')->get();

        return view('page/home', compact('users'));
    }

    public function view_user_detail(Request $request){
        $data_transfer = Transfer::where('user_id', $request->id)->orderBy('created_at', 'asc')->get();
        $user = User::find($request->id);

        return view('page/user_detail', compact('data_transfer', 'user'));
    }
}
