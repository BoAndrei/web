<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCredentialsRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.userforms');
    }

    public function store(Request $request, RegisterCredentialsRequest $request)
    {
        $user = User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password'))
        ]);

        auth()->login($user);

        return Redirect::to('/');
    }
}
