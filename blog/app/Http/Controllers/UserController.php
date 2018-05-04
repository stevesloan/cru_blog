<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $arUsers = User::all();
        foreach ($arUsers as $user)
        {
            $user->role = $user->role;
            $user->post_count = sizeof($user->blogPosts);
            $user->address = $user->address;
        }
        return $arUsers;
    }

    public function getUser($id)
    {
        $user = User::find($id);
        $user->role = $user->role;
        $user->post_count = sizeof($user->blogPosts);
        $user->address = $user->address;
        return $user;
    }

    public function updateUser($id, Request $request)
    {
        $user = User::find($id);
        
        if ($request->has('user_roles_id')) {
            $user->user_roles_id = $request->input('user_roles_id');
        }
        if ($request->has('username')) {
            $user->username = $request->input('username');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }

        if ($request->has('address')) {
            $user->address->address = $request->input('address');
        }
        if ($request->has('province')) {
            $user->address->province = $request->input('province');
        }
        if ($request->has('city')) {
            $user->address->city = $request->input('city');
        }
        if ($request->has('city')) {
            $user->address->city = $request->input('city');
        }
        if ($request->has('country')) {
            $user->address->country = $request->input('country');
        }
        if ($request->has('postal_code')) {
            $user->address->postal_code = $request->input('postal_code');
        }

        $user->address->update();

        $user->update();
        return response()->json($user, 200);
    }

}
