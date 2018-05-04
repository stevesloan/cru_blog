<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserAddress;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $arUsers = User::all();
        foreach ($arUsers as $user) {
            $user->role = $user->role;
            $user->post_count = sizeof($user->blogPosts);
            $user->address = $user->address;
        }
        return $arUsers;
    }

    public function getUser($id) {
        $user = User::find($id);
        $user->role = $user->role;
        $user->post_count = sizeof($user->blogPosts);
        $user->address = $user->address;
        return $user;
    }

    public function updateUser($id, Request $request) {
        $user = User::find($id);
        $user->user_roles_id = $request->user_roles_id;
        $user->username = $request->username;
        $user->email = $request->email;

        $user->address->address = $request->address;
        $user->address->province = $request->province;
        $user->address->city = $request->city;
        $user->address->country = $request->country;
        $user->address->postal_code = $request->postal_code;
        $user->address->update();

        $user->update();
        return response()->json($user, 200);
    }

}
