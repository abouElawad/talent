<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
  use ApiResponseTrait;
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(),[
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6',
    ]);

    if ($validator->fails())
    {
      $errors = collect($validator->errors()->messages())
              ->map(fn($messages) => $messages[0]) ;// get first error message for each field
        
        return $this->apiResponse(422,'validation error',$errors);
    }

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'phone' => $request->phone,
      'role_id' => $request->role_id
    ]);

    try {
      $token = JWTAuth::fromUser($user);
    } catch (JWTException $e) {
      // return response()->json(['error' => 'Could not create token'], 500);
      return $this->apiResponse(500,'Could not create token',);
    }

    return $this->apiResponse(201,"user : '{$user->name}' has been created successfully",null ,$user);
  }

  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    try {
      if (!$token = JWTAuth::attempt($credentials)) {
        return $this->apiResponse(401,'not authorized','Invalid credentials');
      }
    } catch (JWTException $e) {
        return $this->apiResponse(500,'not authorized','Could not create token');

    }
    return $this->apiResponse(200,'welcome back',null,$token);
  }

  public function logout()
  {
    try {
      JWTAuth::invalidate(JWTAuth::getToken());
    } catch (JWTException $e) {
      return response()->json(['error' => 'Failed to logout, please try again'], 500);
    }

    return response()->json(['message' => 'Successfully logged out']);
  }

  public function getUser()
  {
    try {
      $user = Auth::user();
      if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
      }
      return response()->json($user);
    } catch (JWTException $e) {
      return response()->json(['error' => 'Failed to fetch user profile'], 500);
    }
  }

  public function updateUser(Request $request)
  {
    try {
      $user = Auth::user();
      $user->update($request->only(['name', 'email']));
      return response()->json($user);
    } catch (JWTException $e) {
      return response()->json(['error' => 'Failed to update user'], 500);
    }
  }
}
