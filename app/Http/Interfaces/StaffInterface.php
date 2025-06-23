<?php 
namespace App\Http\Interfaces;


interface StaffInterface
{
   public function indexFromRepository();

  public function showFromRepository($staff);

  public function storeFromRepository( $request);

  public function updateFromRepository($request,$staff);

  public function destroyFromRepository($staff);

}