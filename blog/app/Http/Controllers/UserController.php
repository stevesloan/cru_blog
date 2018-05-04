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
        $user->user_roles_id = $request->input('user_roles_id', $user->user_roles_id);
        $user->username = $request->input('username', $user->username);
        $user->email = $request->input('email', $user->email);

        $user->address->address = $request->input('address', $user->address);
        $user->address->province = $request->input('province', $user->province);
        $user->address->city = $request->input('city', $user->city);
        $user->address->country = $request->input('country', $user->country);
        $user->address->postal_code = $request->input('postal_code', $user->postal_code);
        $user->address->update();

        $user->update();
        return response()->json($user, 200);


    }

}
