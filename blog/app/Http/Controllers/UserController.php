<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        //TODO rest of address
        $user->address->update();
        $user->update();
        return response()->json($user, 200);
    }

}
