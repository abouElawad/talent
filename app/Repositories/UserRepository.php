<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Response;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Response as HttpResponse;

class UserRepository implements UserRepositoryInterface
{
  use ApiResponseTrait;

  public function indexFromRepository()
  {

    $users = User::get();
    return $users;
  }
  public function showFromRepository($user) 
  {
      return  $user;
  }

  public function storeFromRepository( $request)
  {
  return User::create($request);
  }

  public function updateFromRepository($request,$user)
  {
    $user->update($request->all());
  return $user;
  }

  public function destroyFromRepository($user)
  {
    $user->delete();
    return $user;
  }

}