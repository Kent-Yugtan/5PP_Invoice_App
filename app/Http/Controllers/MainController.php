<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{
  //
  public function login()
  {
    return view('public.login');
  }

  public function forgotPassword(Request $request)
  {
    return view('public.forgotPassword');
  }

  public function showResetForm(Request $request, $token = null)
  {
    return view('public.reset')->with(['token' => $token, 'email_address' => $request->email_address]);
  }
}
