<?php 
namespace App\Http\Repositories;

use App\Http\Interfaces\StaffInterface;
use App\Models\User;

class StaffRepository implements StaffInterface
{

  public function indexFromRepository(){
    $users = User::get();
    return $users;
  }
  public function showFromRepository($staff) {

  }
  public function storeFromRepository($request){

    $user = User::create($request->all());
    return $user;
  }
  public function updateFromRepository($request,$staff){}
  public function destroyFromRepository($staff){}

}