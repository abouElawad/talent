<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class TestApiController extends Controller
{

  use ApiResponseTrait;
    public function testApi($name)
    {

      if($name == 'abou')
      return $this->apiResponse(200,'hello',null,$name);
      else
      return $this->apiResponse(422,'hello','validation error',null);

    }
}
