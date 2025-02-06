<?php

namespace App\Http\Controllers\Team;

use App\Services\Team\Service;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
  public $service;

  public function __construct(Service $service)
  {
    $this->service = $service;
  }
}
