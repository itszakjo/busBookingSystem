<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{


    /**
     * Register
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('test')->accessToken;

        return response()->json(['token' => $token], 200);


    }

    /**
     * Login
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {


        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('testMyApp')->accessToken;

            return response()->json([
                'message' => 'User logged successfully.',
                'token' => $token
            ], 200);

        } else {
            return response()->json([
                'error' => 'Wrong Login !',
            ], 401);
        }




    }


}
