<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
  //
  public function login()
  {
    return view('public.login');
  }

  public function logout(Request $request)
  {
    // // Revoke all tokens...
    // Auth::user()->tokens()->delete();
    // Auth::guard('web')->logout();
    // return response()->json([
    //   'success' => true,
    //   'message' => 'Logged Out Successfully.',
    // ]);
  }
}