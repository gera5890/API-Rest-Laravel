<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class User extends Controller
{
    public function show(){
        $users =  User::all();
        return response()->json([
            "users" => $users
        ], 200);
    }

    public function create(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = '123456789qwertyuio';
        $user->save();

        return response()->json([
            "user" => $user
        ]);
    }
}
