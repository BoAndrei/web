<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('users.userforms');
    }

    public function store(Request $request)
    {
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return Redirect::to('/');
        }
    }

    public function destroy($id)
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
