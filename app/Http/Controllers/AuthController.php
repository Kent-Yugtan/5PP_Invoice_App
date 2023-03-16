<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
  //
  public function register(Request $request)
  {
    $data = $request->validate([
      'first_name' => 'required|string|max:191',
      'last_name' => 'required|string|max:191',
      'email' => 'required|email|max:191|unique:users,email',
      'username' => 'required|string|max:191|unique:users',
      'password' => 'required|string',
    ]);

    $user = User::create([
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
      'email' => $data['email'],
      'username' => $data['username'],
      'password' => Hash::make($data['password']),
    ]);

    $token = $user->createToken('csjInvoiceToken')->plainTextToken;

    $response = [
      'user' => $user,
      'token' => $token,
    ];
    return response()->json($response, 201);
  }

  public function logout(Request $request)
  {
    // Revoke all tokens...
    // session()->flush();
    // Auth::user()->tokens()->delete();
    // Auth::logout();
    return response()->json([
      'success' => true,
      'message' => 'Logged Out Successfully.',

      'asd' => Auth::user(),
    ]);
  }

  public function login(Request $request)
  {
    $data = $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);

    if (auth()->attempt($data)) {
      $user = auth()->user();
      $profile_status = Profile::select('profile_status')->where('user_id', $user->id)->first();
      $token = $user->createToken('csjInvoiceTokenLogin')->accessToken;
      session(['data' => $user]);
      $response = [
        'succcess' => true,
        'user' => $user,
        'profile_status' => $profile_status,
        'token' => $token,
      ];
      return response()->json($response, 200);
    } else {
      $request->validate([
        'email' => 'required',
        'password' => 'required',
      ]);

      $data1 = [
        'username' => $request->email,
        'password' => $request->password,
      ];

      if (auth()->attempt($data1)) {
        $user = auth()->user();
        $profile_status = Profile::select('profile_status')->where('user_id', $user->id)->first();
        $token = $user->createToken('csjInvoiceTokenLogin')->accessToken;
        session(['data' => $user]);
        $response = [
          'succcess' => true,
          'user' => $user,
          'profile_status' => $profile_status,
          'token' => $token,
        ];
        return response()->json($response, 200);
      } else {
        return response()->json([
          'success' => false,
          'message' => 'Unrecognized Credentials.',
        ], 200);
      }
    }
  }
}
