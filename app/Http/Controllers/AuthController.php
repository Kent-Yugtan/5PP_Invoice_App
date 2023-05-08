<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InvoiceConfig;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
    $request->session()->invalidate();
    session()->forget('data');
    return response()->json([
      'success' => true,
      'message' => 'Logged Out Successfully.',
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

  public function resetPassword(Request $request)
  {
    $request->validate([
      'email_address' => 'required|email|exists:users,email'
    ]);

    $users = User::where('email', $request->email_address)->first();
    if ($users) {
      $token = Str::random(64);
      DB::table('password_resets')->insert([
        'email' => $request->email_address,
        'token' => $token,
        'created_at' => Carbon::now(),
      ]);

      $invoice_logo = InvoiceConfig::first();

      if ($invoice_logo) {
        $invoice_logo = $invoice_logo->invoice_logo;
      }

      // SETUP EMAIl FOR FORGOT PASSWORD
      $data_setup_email_template = [
        'invoice_logo'    => $invoice_logo,
        'to'             =>  $request->email_address,
        'token'          =>  $token,
        'action_link'    =>  url('password/reset/'),
      ];
      $this->setup_forgot_password($data_setup_email_template);


      return response()->json([
        'success' => true,
        'message' => 'Success, We have e-mailed your password reset link!',
      ], 200);
    } else {
      return response()->json([
        'success' => false,
        'message' => 'Unrecognized Credentials.',
      ], 200);
    }
  }
  public function reset(Request $request)
  {
    $request->validate([
      'email_address' => 'required|email|exists:users,email',
      'password' => 'required',
    ]);

    $check_token = DB::table('password_resets')->where([
      'email' => $request->email_address,
      'token' => $request->token,
    ])->first();


    if (!$check_token) {
      return response()->json([
        'success' => false,
        'message' => 'Invalid Credentials',
      ], 200);
    } else {

      $user = User::where('email', $request->email_address)->first();

      if ($request->password) {
        $hashedPassword = Hash::make($request->password);

        DB::table('users')
          ->where('id', $user->id)
          ->update(['password' => $hashedPassword]);

        DB::table('password_resets')
          ->where([
            'email' => $request->email_address
          ])->delete();

        return response()->json([
          'success' => true,
          'message' => 'Your password has been successfully reset.',
        ], 200);
      }
    }
  }
}
