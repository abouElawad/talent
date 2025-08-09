<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\StaffService;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function __construct(public StaffService $staffService) {
    }

    public function index()
    {
      return $this->staffService->indexFromService();
    }

    public function store(Request $request){
      return $this->staffService->storeFromService($request);
    }
    public function update(Request $request,$staff){
      return $this->staffService->updateFromService($request,$staff);
    }

    public function show($staff){
      // return response()->json($user);

        return $this->staffService->showFromService($staff);

      

    }

    public function delete($staff)
    {
      return $this->staffService->destroyFromService($staff);
    }
}
