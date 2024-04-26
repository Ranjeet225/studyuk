<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

  public function __construct()
  {
      $this->middleware('role_or_permission:dashboard.view', ['only' => ['index']]);
      view()->share('page_title', 'Dashboard');
  }

  public function index()
  {
      return view('dashboard');
  }
  

}
