<?php

namespace App\Http\Controllers\API\v1;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'user_name' => 'required|string|max:255',
            'password' => 'required|string'
        ]);

        if (!$token = auth()->attempt($credentials)) {
            return Helpers::errorResponse('Login Failed', 401);
        }

        return Helpers::successResponse('Login Success', [
            'user' => auth()->user(),
            'token' => $token
        ]);
    }

    public function register(Request $request): JsonResponse
    {
        $input = $request->validate([
            'user_name' => 'required|string|max:45|unique:users,user_name',
            'name' => 'required|string|max:45',
            'password' => 'required|string'
        ]);

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        return Helpers::successResponse('Register Success', [
            'user' => $user,
            'token' => auth()->login($user)
        ]);
    }

    public function me(): JsonResponse
    {
        return Helpers::successResponse('Get Auth User Success', [
            'user' => auth()->user()
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return Helpers::successResponse('Logout Success');
    }
}
