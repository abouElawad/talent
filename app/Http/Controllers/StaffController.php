<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;

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
}
