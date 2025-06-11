<?php 
namespace App\Interfaces;

interface UserRepositoryInterface
{
  public function indexFromRepository();

  public function showFromRepository($user);

  public function storeFromRepository( $request);

  public function updateFromRepository($request,$user);

  public function destroyFromRepository($user);

}