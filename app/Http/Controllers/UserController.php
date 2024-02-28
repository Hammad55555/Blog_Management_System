<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validations = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ];

        $validate = Validator::make($request->all(), $validations);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Assign roles
        $user->assignRole('admin');

        // Now you can check roles
        if ($user->hasRole('admin')) {
            // User has the 'admin' role
        } else {
            // User does not have the 'admin' role
        }


        // Assuming $user is an instance of your User model

        // Check if the user has a single role
        if ($user->hasRole('admin')) {
            // User has the 'admin' role
        } else {
            // User does not have the 'admin' role
        }

        // Check if the user has multiple roles
        if ($user->hasRole(['admin', 'user'])) {
            // User has either 'admin' or 'user' role
        } else {
            // User does not have either 'admin' or 'user' role
        }

        $token = $user->createToken('API TOKEN')->plainTextToken;

        return response()->json([
            'message' => 'User Created Successfully',
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $validations = [
            'email' => 'required|email',
            'password' => 'required|string',
        ];

        $validate = Validator::make($request->all(), $validations);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Incorrect Email or Password',
            ], 401);
        }

        $token = $user->createToken('API TOKEN')->plainTextToken;

        return response()->json([
            'message' => 'Login Successfully',
            'token' => $token,
        ], 200);
    }
}
