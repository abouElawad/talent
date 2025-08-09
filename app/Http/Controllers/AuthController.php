<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Services\AuthService;
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

  public function __construct(public AuthService $authService){}
  public function register(Request $request)
  {
   return $this->authService->registerFromService($request);
    
  }

  public function login(Request $request)
  {
   return $this->authService->loginFromService($request);
  }

  public function logout()
  {
   return $this->authService->logoutFromService();
  }

  public function getUser()
  {
  return $this->authService->getUserFromService();
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
