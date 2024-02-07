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
            return response()->json(['message' => $validate->errors()->first()]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $token = $user->createToken('API TOKEN');

        return response()->json([
            'message' => 'User Created Successfully',
            'token' => $token->plainTextToken,
        ], 200);
    }

    public function login(Request $request)
    {
        $validations = [
            'email' => 'required|email',
            'password' => 'required|string',
        ];

        $validate = Validator::make($request->all(), $validations);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Incorrect Email or Password',
            ], 401);
        }

        $token = $user->createToken('API TOKEN');

        return response()->json([
            'message' => 'Login Successfully',
            'token' => $token->plainTextToken,
        ], 200);
    }

}
