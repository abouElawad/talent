<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
 
  public function __construct(public UserService $service){
   
  }
  use ApiResponseTrait;
  public function index()
  {
    return $this->service->indexFromService();
  }
  public function show(User $user) 
  {
        return $this->service->showFromService($user);
  }
  public function store(Request $request)
  {
            return $this->service->storeFromService($request);
  }
  public function update(Request $request,User $user)
  {
            return $this->service->updateFromService($request,$user);
  }
  
  public function destroy(User $user)
  {
            return $this->service->destroyFromService($user);
  }

}
