<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "name" => ["required", "string", "min:4", "max:32"],
            "username" => ["required", "string", "min:4", "max:32", "unique:users"],
            "email" => ["required", "email"],
            "password" => ["required", "min:4", "max:32"]
        ]);

        try
        {
            User::create([
                "name" => $request->name,
                "username" => $request->username,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);

            return Response(true, 200);
        }
        catch(\Exception $ex)
        {
            return Response($ex->getMessage(), 503);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            "username" => ["required", "string", "min:4", "max:32"],
            "password" => ["required", "string", "min:4", "max:32"]
        ]);

        $user = User::where("username", "=", $request->username)->first();

        if( $user && Hash::check($request->password, $user->password) )
        {
            $user->token = Str::random(32);
            $user->save();

            return Response($user->token, 200);
        }
        else
        {
            return Response(false, 403);
        }
    }

    public function all()
    {
        return User::all();
    }
}
