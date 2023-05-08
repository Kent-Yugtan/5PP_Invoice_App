<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\DeductionType;
use App\Models\ProfileDeductionTypes;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller


{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    return view('private.admin.profile');
  }
  public function userprofile()
  {
    return view('private.user.Userprofile');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function imagePreview(Request $request)
  {

    $imageData = $request->input('image');

    // Decode the base64 data
    $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
    // Create the directory if it does not exist
    if (!file_exists(public_path('storage/images'))) {
      mkdir(public_path('storage/images'), 0777, true);
    }

    $filename = uniqid() . '.png';
    $filepath = public_path('storage/images/' . $filename);

    // Save the file to public/storage/images directory
    if (file_put_contents($filepath, $imageData) !== false) {
      $imageSize = getimagesize($filepath);
    } else {

      return response()->json([
        'success' => false,
        'message' => 'Failed to save image.'
      ]);
    }

    return response()->json([
      'success' => true,
      'image' => $filename,
      'path' => '/storage/images/' . $filename,
      'size' => $imageSize,
      'message' => 'Your profile image has been successfully set to this account.',
    ]);
  }
  public function store(Request $request)
  {
    $error = false;
    $user_id = $request->user_id;
    $findUser = User::with('profile', 'profile.profile_deduction_types')->find($user_id);
    // return $findUser;
    if (!$user_id) {
      $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique:users|email',
        'username' => 'required|unique:users',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
        // 'acct_no' => 'required|unique:profiles',
        // 'acct_name' => 'required|unique:profiles',
        // 'gcash_no' => 'required|unique:profiles|numeric',
      ]);
      // return "NO USER ID";
    } else {
      if ($findUser) {
        if ($findUser->profile) {
          if ($findUser->first_name != $request->first_name) {
            $request->validate([
              'first_name' => 'required',
            ]);
          }
          if ($findUser->last_name != $request->last_name) {
            $request->validate([
              'last_name' => 'required',
            ]);
          }
          if ($findUser->email != $request->email) {
            $request->validate([
              'email' => 'required|unique:users|email',
            ]);
          }
          if ($findUser->username != $request->username) {
            $request->validate([
              'username' => 'required|unique:users',
            ]);
          }

          // if ($findUser->profile->acct_no != $request->acct_no) {
          //   $request->validate([
          //     'acct_no' => 'required|unique:profiles',
          //   ]);
          // }

          // if ($findUser->profile->acct_name != $request->acct_name) {
          //   $request->validate([
          //     'acct_name' => 'required|unique:profiles',
          //   ]);
          // }

          // if ($findUser->profile->gcash_no != $request->gcash_no) {
          //   $request->validate([
          //     'gcash_no' => 'required|unique:profiles|numeric',
          //   ]);
          // }
        }
      }
    }

    if ($error === false) {
      $incoming_data = $request->validate(
        [
          'profile_status' => 'required',
          'position' => 'required',
          'phone_number' => 'required',
          'address' => 'required',
          'province' => 'required',
          'city' => 'required',
          'zip_code' => 'required',
          'date_hired' => 'required',
          // 'bank_name' => 'required',
          // 'bank_address' => 'required',
        ]
      );

      // if ($request->file('profile_picture')) {
      //   $userImageFile = $request->file('profile_picture');
      //   $userImageFileName = $userImageFile->getClientOriginalName();
      //   $userImageFilePath = time() . '' . $userImageFile->getClientOriginalName();
      //   $filename =  $userImageFilePath;
      //   $userImageFilePath = $userImageFile->storeAs('/images', $userImageFilePath, 'public');
      //   $userImageFileSize = $this->formatSizeUnits($userImageFile->getSize());
      //   // $path = $userImageFilePath;
      //   $path = '/storage/' . $userImageFilePath;
      // $incoming_data += [
      //   'file_original_name' => $userImageFileName,
      //   'file_name' => $userImageFilePath,
      //   'file_path' => $path,
      //   'file_size' => $userImageFileSize,
      // ];
      // }

      $incoming_data += [
        'file_original_name' => $request->file_original_name,
        'file_name' => $request->file_name,
        'file_path' => $request->file_path,

        'bank_name' => $request->bank_name,
        'bank_address' => $request->bank_address,
        'acct_no' => $request->acct_no,
        'acct_name' => $request->acct_name,
        'gcash_no' => $request->gcash_no,
        // 'file_size' => $request->userImageFileSize,
      ];


      // if (!$user_id) {
      //   $incoming_data += $request->validate([
      //     // 'acct_no' => 'required|unique:profiles',
      //     // 'acct_name' => 'required|unique:profiles',
      //     // 'gcash_no' => 'required|unique:profiles',
      //     'bank_name' => $request->bank_name,
      //     'bank_address' => $request->bank_address,
      //     'acct_no' => $request->acct_no,
      //     'acct_name' => $request->acct_name,
      //     'gcash_no' => $request->gcash_no,
      //   ]);
      // } else {
      //   $incoming_data += [
      //     'bank_name' => $request->bank_name,
      //     'bank_address' => $request->bank_address,
      //     'acct_no' => $request->acct_no,
      //     'acct_name' => $request->acct_name,
      //     'gcash_no' => $request->gcash_no,
      //   ];
      // }

      $userCreateData = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'username' => $request->username,
        'role' => 'Staff',

      ];
      if ($request->password) {
        $userCreateData += [
          'password' => Hash::make($request->password)
        ];
      }

      if ($user_id) {
        $userCreate = $findUser->fill($userCreateData)->save();
        if ($userCreate) {
          if ($findUser->profile) {
            $findUser->profile()->where('id', $findUser->profile->id)->update(
              $incoming_data,
            );
          } else {
            $findUser->profile()->create(
              $incoming_data,
            );
          }
        }
      } else {
        $userCreate = User::create($userCreateData);
        if ($userCreate) {
          $userCreate->profile()->create(
            $incoming_data,
          );

          $deduction_type_id = $request->deduction_type_id;
          foreach (json_decode($deduction_type_id) as $q) {
            $findProfile = Profile::where('user_id', $userCreate->id)->first();
            $findProfileDeductionTypes = ProfileDeductionTypes::where('profile_id', $findProfile->id)
              ->where('deduction_type_id', $q)
              ->first();

            $dataDeductionType = \App\Models\DeductionType::find($q);

            if ($findProfileDeductionTypes) {
              $findProfileDeductionTypes->fill([
                'deduction_type_id' => $q,
                'amount' => $dataDeductionType->deduction_amount,
                'deduction_type_name' => $dataDeductionType->deduction_name,
              ])->save();
            } else {
              ProfileDeductionTypes::create([
                'profile_id' => $findProfile->id,
                'deduction_type_id' => $q,
                'amount' => $dataDeductionType->deduction_amount,
                'deduction_type_name' => $dataDeductionType->deduction_name
              ]);
            }
          }
        }
      }

      if (!$user_id) {
        return response()->json([
          'success' => true,
          'message' => 'Your profile has been created successfully.',
          'data' => $userCreate,
        ], 200);
      } else {
        return response()->json([
          'success' => true,
          'message' => 'Your profile has been updated successfully.',
          'data' => $userCreate,
        ], 200);
      }
    }
  }



  // VALIDATE EMAIL ON UPDATE
  public function editValidateEmail(Request $request)
  {
    $user_id = $request->user_id;
    $findUser = User::with('profile', 'profile.profile_deduction_types')->find($user_id);
    if ($user_id) {
      if ($findUser) {
        if ($findUser->profile) {
          if ($findUser->email != $request->email) {
            $editvalidateEmail = $request->validate([
              'email' => 'required|unique:users|email',
            ]);

            return response()->json([
              'success' => true,
              'data' => $editvalidateEmail,
            ], 200);
          }
        }
      }
    }
  }



  // VALIDATE USERNAME ON UPDATE
  public function editValidateUsername(Request $request)
  {
    $user_id = $request->user_id;
    $findUser = User::with('profile', 'profile.profile_deduction_types')->find($user_id);
    if ($user_id) {
      if ($findUser) {
        if ($findUser->profile) {
          if ($findUser->username != $request->username) {
            $editvalidateUsername = $request->validate([
              'username' => 'required|unique:users',
            ]);

            return response()->json([
              'success' => true,
              'data' => $editvalidateUsername,
            ], 200);
          }
        }
      }
    }
  }

  // VALIDATE ACCT NUmber ON UPDATE
  public function editValidateAcctno(Request $request)
  {
    $user_id = $request->user_id;
    $findUser = User::with('profile', 'profile.profile_deduction_types')->find($user_id);
    if ($user_id) {
      if ($findUser) {
        if ($findUser->profile) {
          if ($findUser->profile->acct_no != $request->acct_no) {
            $editvalidateAcctno =  $request->validate([
              'acct_no' => 'required|unique:profiles',
            ]);

            return response()->json([
              'success' => true,
              'data' => $editvalidateAcctno,
            ], 200);
          }
        }
      }
    }
  }

  // VALIDATE ACCT NUmber ON UPDATE
  public function editValidateAcctname(Request $request)
  {
    $user_id = $request->user_id;
    $findUser = User::with('profile', 'profile.profile_deduction_types')->find($user_id);
    if ($user_id) {
      if ($findUser) {
        if ($findUser->profile) {
          if ($findUser->profile->acct_name != $request->acct_name) {
            $editvalidateAcctname = $request->validate([
              'acct_name' => 'required|unique:profiles',
            ]);

            return response()->json([
              'success' => true,
              'data' => $editvalidateAcctname,
            ], 200);
          }
        }
      }
    }
  }



  // VALIDATE ACCT NUmber ON UPDATE
  public function editValidateGCASHno(Request $request)
  {
    $user_id = $request->user_id;
    $findUser = User::with('profile', 'profile.profile_deduction_types')->find($user_id);
    if ($user_id) {
      if ($findUser) {
        if ($findUser->profile) {
          if ($findUser->profile->gcash_no != $request->gcash_no) {
            $editvalidateGCASHno = $request->validate([
              'gcash_no' => 'required|unique:profiles|numeric',
            ]);

            return response()->json([
              'success' => true,
              'data' => $editvalidateGCASHno,
            ], 200);
          }
        }
      }
    }
  }


  // VALIDATION
  public function validateEmail(Request $request)
  {
    $validateEmail = $request->validate([
      'email' => 'required|email|unique:users',
    ]);

    return response()->json([
      'success' => true,
      'data' => $validateEmail,
    ], 200);
  }

  // VALIDATION
  public function validateUsername(Request $request)
  {
    $validateUsername = $request->validate([
      'username' => 'required|unique:users',
    ]);

    return response()->json([
      'success' => true,
      'data' => $validateUsername,
    ], 200);
  }

  // VALIDATION
  public function vallidateConfirmPassword(Request $request)
  {
    $confirmPassword = $request->validate([
      'password' => 'required|confirmed',
      'password_confirmation' => 'required',
    ]);

    return response()->json([
      'success' => true,
      'data' => $confirmPassword,
    ], 200);
  }



  // VALIDATION
  public function validateAcctno(Request $request)
  {
    $validateAcctno = $request->validate([
      'acct_no' => 'required|unique:profiles',
    ]);

    return response()->json([
      'success' => true,
      'data' => $validateAcctno,
    ], 200);
  }

  // VALIDATION
  public function validateAcctname(Request $request)
  {
    $validateAcctname = $request->validate([
      'acct_name' => 'required|unique:profiles',
    ]);

    return response()->json([
      'success' => true,
      'data' => $validateAcctname,
    ], 200);
  }

  // VALIDATION
  public function validateGcashno(Request $request)
  {
    $validateGcashno = $request->validate([
      'gcash_no' => 'required|unique:profiles|numeric',
    ]);

    return response()->json([
      'success' => true,
      'data' => $validateGcashno,
    ], 200);
  }



  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Profile  $profile
   * @return \Illuminate\Http\Response
   */
  public function show(Profile $profile)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Profile  $profile
   * @return \Illuminate\Http\Response
   */
  public function activeProfile(Request $request)
  {
    $findid = User::with('profile', 'profile.profile_deduction_types')->find($request->id);
    return view("private.admin.activeProfile", compact('findid'));
  }
  public function inactiveProfile(Request $request)
  {
    $findid = User::with('profile', 'profile.profile_deduction_types')->find($request->id);
    return view("private.admin.inactiveProfile", compact('findid'));
  }

  public function show_edit(Request $request, $id)
  {

    $finduser_profile = User::with('profile', 'profile.profile_deduction_types')->find($id);
    if (!$finduser_profile) {
      return response()->json([
        'success' => false,
        'message' => 'ID ' . $request->id . ' not found'
      ], 400);
    } else {
      return response()->json([
        'success' => true,
        'data' => $finduser_profile,
      ], 200);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Profile  $profile
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Profile  $profile
   * @return \Illuminate\Http\Response
   */
  public function destroy(Profile $profile)
  {
    //
  }

  public function current_show(Request $request)
  {
    return view('private.admin.current');
  }

  public function usercurrent_show(Request $request)
  {
    return view('user.usercurrent');
  }

  public function show_profile(Request $request)
  {
    $data = User::with('profile')->select(
      [
        'users.*',
        DB::raw("CONCAT(first_name, ' ', last_name) full_name")
      ],
    )->profile()->where('profile_status', 'Active')->get();

    return response()->json([
      'success' => true,
      'data' => $data,
    ], 200);
  }

  public function show_data_active(Request $request)
  {
    $data = User::with('profile.invoice')->select(
      [
        'users.*',
        'position',
        'phone_number',
        'address',
        'province',
        'city',
        'zip_code',
        'profile_status',
        'acct_no',
        'acct_name',
        'bank_name',
        'bank_address',
        'gcash_no',
        'date_hired',
        'file_name',
        'file_original_name',
        'file_path',
        'file_size',
        DB::raw("CONCAT(first_name, ' ', last_name) full_name")
      ],
    )->profile()->where('profile_status', 'Active');
    // ->join('invoices', 'profiles.id', '=', 'invoices.profile_id')->orderBy('invoices.created_at', 'DESC');

    if ($request->search) {
      $data = $data
        ->where(
          function ($q) use ($request) {
            $q->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', '%' . $request->search . '%');
            $q->orWhere('position', 'LIKE', '%' . $request->search . '%');
          }
        );
    }

    if ($request->page_size) {
      $data = $data->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $data = $data->get();
    }

    return response()->json([
      'success' => true,
      'data' => $data,
    ], 200);
  }

  public function show_data_inactive(Request $request)
  {
    $data = User::with('profile.invoice')->select(
      [
        'users.*',
        'position',
        'phone_number',
        'address',
        'province',
        'city',
        'zip_code',
        'profile_status',
        'acct_no',
        'acct_name',
        'bank_name',
        'bank_address',
        'gcash_no',
        'date_hired',
        'file_name',
        'file_original_name',
        'file_path',
        'file_size',
        DB::raw("CONCAT(first_name, ' ', last_name) full_name")
      ],
    )->profile()->where('profile_status', 'Inactive');

    if ($request->search) {
      $data = $data->where(
        function ($q) use ($request) {
          $q->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', '%' . $request->search . '%');
          $q->orWhere('position', 'LIKE', '%' . $request->search . '%');
        }
      );
    }

    if ($request->page_size) {
      $data = $data->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $data = $data->get();
    }

    return response()->json([
      'success' => true,
      'data' => $data,
    ], 200);
  }
  public function show_deduction_types(Request $request)
  {
    $deduction_type = DeductionType::orderby("id", "ASC")->get();

    return response()->json([
      'success' => true,
      'data' => $deduction_type,
    ], 200);
  }

  public function inactive()
  {
    return view('private.admin.inactive');
  }


  public function userinactive()
  {
    return view('user.userinactive');
  }

  public function usereditProfile()
  {
    return view('user.usereditProfile');
  }

  public function editProfile()
  {
    return view('admin.editProfile');
  }

  public function count_active()
  {
    $active = Profile::where('profile_status', 'Active')->count();
    if ($active) {
      return $active;
    }
  }
  public function count_inactive()
  {
    $inactive = Profile::where('profile_status', 'Inactive')->count();
    if ($inactive) {
      return $inactive;
    }
  }


  // THIS LINE IS FOR USER
  public function show_userProfile(Request $request)
  {
    $userId = auth()->user()->id;
    $data = User::with('profile')
      ->where('id', $userId)
      ->whereHas('profile', function ($q) {
        $q->where('profile_status', 'Active');
      })
      ->select([
        'users.*',
        DB::raw("CONCAT(first_name,' ',last_name) full_name")
      ])
      ->get();
    return response()->json([
      'success' => true,
      'data' => $data,
    ], 200);
  }

  //   PROFILE PAGE
  public function show_userEdit()
  {
    $userId = auth()->user()->id;
    $finduser_profile = User::with('profile', 'profile.profile_deduction_types')->find($userId);
    if (!$finduser_profile) {
      return response()->json([
        'success' => false,
      ], 400);
    } else {
      return response()->json([
        'success' => true,
        'data' => $finduser_profile,
      ], 200);
    }
  }

  public function updateProfile(Request $request)
  {
    $error = false;
    $userId = auth()->user()->id;
    $findUser = User::with('profile', 'profile.profile_deduction_types')->find($userId);
    if ($findUser) {
      if ($findUser->profile) {

        if ($findUser->profile->acct_no != $request->acct_no) {
          $request->validate([
            'acct_no' => 'required|unique:profiles',
          ]);
        }

        if ($findUser->profile->acct_name != $request->acct_name) {
          $request->validate([
            'acct_name' => 'required|unique:profiles',
          ]);
        }

        if ($findUser->profile->gcash_no != $request->gcash_no) {
          $request->validate([
            'gcash_no' => 'required|unique:profiles',
          ]);
        }
      }
      if ($findUser->email != $request->email) {
        $request->validate([
          'email' => 'required|unique:users',
        ]);
      }
      if ($findUser->username != $request->username) {
        $request->validate([
          'username' => 'required|unique:users',
        ]);
      }
      if ($findUser->first_name != $request->first_name) {
        $request->validate([
          'first_name' => 'required',
        ]);
      }
      if ($findUser->last_name != $request->last_name) {
        $request->validate([
          'last_name' => 'required',
        ]);
      }
    }
    if ($error === false) {
      $incoming_data = $request->validate(
        [
          'profile_status' => 'required',
          'position' => 'required',
          'phone_number' => 'required',
          'address' => 'required',
          'province' => 'required',
          'city' => 'required',
          'zip_code' => 'required',
          'bank_name' => 'required',
          'bank_address' => 'required',
          'date_hired' => 'required',

        ]
      );

      // if ($request->file('profile_picture')) {
      //   $userImageFile = $request->file('profile_picture');
      //   $userImageFileName = $userImageFile->getClientOriginalName();
      //   $userImageFilePath = time() . '' . $userImageFile->getClientOriginalName();
      //   $filename =  $userImageFilePath;
      //   $userImageFilePath = $userImageFile->storeAs('/images', $userImageFilePath, 'public');

      //   $userImageFileSize = $this->formatSizeUnits($userImageFile->getSize());
      //   // $path = $userImageFilePath;
      //   $path = '/storage/' . $userImageFilePath;

      //   $incoming_data += [
      //     'file_original_name' => $userImageFileName,
      //     'file_name' => $userImageFilePath,
      //     'file_path' => $path,
      //     'file_size' => $userImageFileSize,
      //   ];
      // }

      $incoming_data += [
        'file_original_name' => $request->file_original_name,
        'file_name' => $request->file_name,
        'file_path' => $request->file_path,
        // 'file_size' => $request->userImageFileSize,
      ];

      if (!$userId) {
        $incoming_data += $request->validate([
          'acct_no' => 'required|unique:profiles',
          'acct_name' => 'required|unique:profiles',
          'gcash_no' => 'required|unique:profiles',
        ]);
      } else {
        $incoming_data += [
          'acct_no' => $request->acct_no,
          'acct_name' => $request->acct_name,
          'gcash_no' => $request->gcash_no,
        ];
      }

      $userCreateData = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'username' => $request->username,
        'role' => 'Staff',

      ];
      if ($request->password) {
        $userCreateData += [
          'password' => Hash::make($request->password)
        ];
      }

      if ($userId) {
        $userCreate = $findUser->fill($userCreateData)->save();
        if ($userCreate) {
          if ($findUser->profile) {
            $findUser->profile()->where('id', $findUser->profile->id)->update(
              $incoming_data,
            );
          } else {
            $findUser->profile()->create(
              $incoming_data,
            );
          }
        }
      } else {
        $userCreate = User::create($userCreateData);
        if ($userCreate) {
          $userCreate->profile()->create(
            $incoming_data,
          );

          $deduction_type_id = $request->deduction_type_id;
          foreach (json_decode($deduction_type_id) as $q) {
            $findProfile = Profile::where('userId', $userCreate->id)->first();
            $findProfileDeductionTypes = ProfileDeductionTypes::where('profile_id', $findProfile->id)
              ->where('deduction_type_id', $q)
              ->first();

            $dataDeductionType = \App\Models\DeductionType::find($q);

            if ($findProfileDeductionTypes) {
              $findProfileDeductionTypes->fill([
                'deduction_type_id' => $q,
                'amount' => $dataDeductionType->deduction_amount,
                'deduction_type_name' => $dataDeductionType->deduction_name,
              ])->save();
            } else {
              ProfileDeductionTypes::create([
                'profile_id' => $findProfile->id,
                'deduction_type_id' => $q,
                'amount' => $dataDeductionType->deduction_amount,
                'deduction_type_name' => $dataDeductionType->deduction_name
              ]);
            }
          }
        }
      }

      if (!$userId) {
        return response()->json([
          'success' => true,
          'message' => 'Your Profile has been added successfully.',
          'data' => $userCreate,
        ], 200);
      } else {
        return response()->json([
          'success' => true,
          'message' => 'Your Profile has been updated successfully.',
          'data' => $userCreate,
        ], 200);
      }
    }
  }

  public function user_data()
  {
    $userId = auth()->user()->id;
    $findProfile = User::with('profile')->find($userId);

    return response()->json([
      'success' => true,
      'data' => $findProfile,
    ], 200);
  }



  public function updateInactiveProfile(Request $request)
  {

    $error = false;
    $profile_id = $request->profile_id;
    $multipleId = $request->multipleId;
    if ($error === false) {
      if ($profile_id) {
        $data = Profile::find($profile_id);
        $data->profile_status = 'Inactive';
        $data->save();
        return response()->json([
          'success' => true,
          'message' => 'Your Profile has been updated successfully .',
        ], 200);
      } else {
        $multipleData = Profile::whereIn('id', $multipleId)
          ->update(['profile_status' => 'Inactive']);
        return response()->json([
          'success' => true,
          'message' => 'Your Profile has been updated successfully .',
        ], 200);
      }
    }
  }
  public function updateActiveProfile(Request $request)
  {

    $error = false;
    $profile_id = $request->profile_id;
    $multipleId = $request->multipleId;
    if ($error === false) {
      if ($profile_id) {
        $data = Profile::find($profile_id);
        $data->profile_status = 'Active';
        $data->save();
        return response()->json([
          'success' => true,
          'message' => 'Your Profile has been updated successfully.',
        ], 200);
      } else {

        $multipleData = Profile::whereIn('id', $multipleId)
          ->update(['profile_status' => 'Active']);
        return response()->json([
          'success' => true,
          'message' => 'Your Profile has been updated successfully.',
        ], 200);
      }
    }
  }

  public function getPassword(Request $request)
  {
    $userId = auth()->user()->id;
    $data = User::find($userId);

    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function validateCurrentPassword(Request $request)
  {
    $validateCurrentPassword = $request->validate([
      'currentPassword' => ['required', new MatchOldPassword],
      'newPassword' => ['required', 'different:currentPassword'],
      'confirmPassword' => ['required', 'same:newPassword'],
    ]);
    if ($validateCurrentPassword) {
      return response()->json([
        'success' => true,
        'data' => $validateCurrentPassword,
      ], 200);
    }
  }

  public function changePassword(Request $request)
  {
    $request->validate([
      'currentPassword' => ['required', new MatchOldPassword],
      'newPassword' => ['required', 'different:currentPassword'],
      'confirmPassword' => ['required', 'same:newPassword'],
    ]);

    $data = User::find(auth()->user()->id)->update(['password' => Hash::make($request->newPassword)]);
    if ($data) {
      return response()->json([
        'success' => true,
        'message' => 'The administrator password has been changed successfully.',
        'data' => $data,
      ], 200);
    }
  }
}
