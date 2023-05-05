<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\DeductionType;
use App\Models\Invoice;
use App\Models\Profile;
use App\Models\ProfileDeductionTypes;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProfileDeductionTypesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $error = false;
    $id = $request->id;
    $profile_id = $request->profile_id;
    $deduction = $request->deduction_type_id;

    if ($error === false) {
      if ($deduction) {
        if (!$id) {
          $deductionType = DeductionType::find($deduction);

          $incoming_data = [
            'profile_id' => $request->profile_id,
            'deduction_type_id' => $request->deduction_type_id,
            'amount' => $request->amount,
            'deduction_type_name' => $deductionType->deduction_name,
          ];

          $storeData = ProfileDeductionTypes::Create(
            $incoming_data,
          );

          return response()->json([
            'success' => 'true',
            'message' => 'The profile deduction has been added successfully..',
            'data' => $storeData,
          ]);
        }
      } else {
        if (!$id) {
          // $deductionType = DeductionType::find($request->deduction_type_id);

          $request->validate([
            'deduction_type_name' => 'required',
          ]);

          $request->validate([
            'deduction_type_name' => [
              'required',
              Rule::unique('profile_deduction_types')
                ->where('profile_id', $profile_id)
            ],
          ]);

          $incoming_data = [
            'profile_id' => $request->profile_id,
            'deduction_type_name' => $request->deduction_type_name,
            'amount' => $request->amount,
            'deduction_type_id' => '0',
          ];

          $storeData = ProfileDeductionTypes::Create(
            $incoming_data,
          );

          return response()->json([
            'success' => 'true',
            'message' => 'The profile deduction has been added successfully..',
            'data' => $storeData,
          ]);
        } else {
          $request->validate([
            'deduction_type_name' => 'required'
          ]);
          $data = ProfileDeductionTypes::find($id);
          if ($data->deduction_type_name != $request->deduction_type_name) {
            $existingData = ProfileDeductionTypes::where('profile_id', $profile_id)
              ->where('deduction_type_name', $request->deduction_type_name)
              ->where('id', '<>', $id)
              ->get();

            if ($existingData->count() > 0) {
              $editValidateProfileDeductionname = $request->validate([
                'deduction_type_name' => [
                  'required',
                  Rule::unique('profile_deduction_types')
                    ->where('profile_id', $profile_id)
                    ->ignore($id),
                ],
              ]);
            }
          }

          $store_data = ProfileDeductionTypes::where('id', $id)->update(
            [
              'amount' => $request->amount,
              'deduction_type_name' => $request->deduction_type_name,
            ]
          );
          return response()->json([
            'success' => true,
            'message' => 'The profile deduction has been updated successfully.',
            'data' => $store_data,
          ], 200);
        }
      }
    }
  }

  // VALIDATION
  public function validateSelectProfileDeduction(Request $request)
  {
    $id = $request->id;
    $data = ProfileDeductionTypes::where('profile_id', $id)->get();
    if ($data) {
      $validateSelectProfileDeduction = $request->validate([
        'deduction_type_id' => [
          'required',
          Rule::unique('profile_deduction_types')
            ->where('profile_id', $id)
        ],
      ]);

      return response()->json([
        'success' => true,
        'data' => $validateSelectProfileDeduction,
      ], 200);
    }
  }

  // VALIDATION
  public function validateProfileDeduction(Request $request)
  {
    $id = $request->id;
    $data = ProfileDeductionTypes::where('profile_id', $id)->get();
    if ($data) {
      $validateProfileDeduction = $request->validate([
        'deduction_type_name' => [
          'required',
          Rule::unique('profile_deduction_types')
            ->where('profile_id', $id)
        ],
      ]);

      return response()->json([
        'success' => true,
        'data' => $validateProfileDeduction,
      ], 200);
    }
  }

  // VALIDATE EDIT
  public function editValidateProfileDeductionname(Request $request)
  {

    $id = $request->id;
    $profile_id = $request->profile_id;

    $data = ProfileDeductionTypes::find($id);
    $existingData = 0;
    $request->validate([
      'deduction_type_name' => 'required'
    ]);
    if ($data->deduction_type_name != $request->deduction_type_name) {
      $existingData = ProfileDeductionTypes::where('profile_id', $profile_id)
        ->where('deduction_type_name', $request->deduction_type_name)
        ->where('id', '<>', $id)
        ->get();

      if ($existingData->count() > 0) {
        $request->validate([
          'deduction_type_name' => [
            'required',
            Rule::unique('profile_deduction_types')
              ->where('profile_id', $profile_id)
              ->ignore($id),
          ],
        ]);
      }
      return response()->json([
        'success' => true,
        'count' => $existingData,
      ], 200);
    }

    // $id = $request->id;
    // $profile_id = $request->profile_id;

    // $data = ProfileDeductionTypes::find($id);

    // if ($data->deduction_type_name != $request->deduction_type_name) {
    //   $data1 = ProfileDeductionTypes::where('profile_id', $id)->get();
    //   foreach ($data1 as $item) {
    //     if ($item->deduction_type_name != $request->deduction_type_name && $item->profile_id == $request->id) {
    //       $editValidateProfileDeductionname = $request->validate([
    //         'deduction_type_name' => [
    //           'required',
    //           Rule::unique('profile_deduction_types')
    //             ->where('profile_id', $profile_id)
    //             ->ignore($request->id),
    //         ],
    //       ]);
    //     }
    //   }
    // }
    // return response()->json([
    //   'success' => true,
    // ], 200);
    // $editValidateProfileDeductionname = null; // Initialize variable outside loop

    // if ($data) {
    //   foreach ($data as $item) {
    //     if ($item->deduction_type_name != $request->deduction_type_name && $item->profile_id == $request->id) {
    //       $editValidateProfileDeductionname = $request->validate([
    //         'deduction_type_name' => [
    //           'required',
    //           Rule::unique('profile_deduction_types')
    //             ->where('profile_id', $id)
    //             ->ignore($request->id),
    //         ],
    //       ]);
    //     }
    //   }

    //   return response()->json([
    //     'success' => true,
    //     'data' => $editValidateProfileDeductionname,
    //   ], 200);
    // }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ProfileDeductionTypes  $profileDeductionTypes
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
    //
    $profileDeductionType_id = $request->id;
    $data = ProfileDeductionTypes::where('id', $profileDeductionType_id)->first();
    if ($data) {
      $hasForeignKey = $data->deductions()->exists();
      return response()->json([
        'success' => true,
        'data' => $data,
        'foreign' => $hasForeignKey,
      ], 200);
    } else {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ProfileDeductionTypes  $profileDeductionTypes
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ProfileDeductionTypes $profileDeductionTypes)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ProfileDeductionTypes  $profileDeductionTypes
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    $profileDeductionType_id = $request->id;
    if ($profileDeductionType_id) {
      // THIS QUERY CAN DELETE DEDUCTIONS AND UPDATE THE DELETED AMOUNT TO THE INVOICE
      // $data = ProfileDeductionTypes::with('deductions')->find($profileDeductionType_id);
      // if ($data) {
      //   $last_data = $data;
      //   $deductions = $last_data->deductions;
      //   if (count($deductions) === 0) {
      //     $delete_data = ProfileDeductionTypes::where('id', $profileDeductionType_id)->delete();
      //     $ret = [
      //       'success' => true,
      //       'message' => 'Data deleted successfully',
      //       'data' => $delete_data,
      //     ];
      //   }
      //   else {
      //     if ($deductions) {
      //       if ($data->delete()) {
      //         if ($deductions[0]->invoice_id) {
      //           $invoice = Invoice::find($deductions[0]->invoice_id);
      //           $grand_total_amount = $invoice->grand_total_amount + $deductions[0]->amount;

      //           $invoice->fill(['grand_total_amount' => $grand_total_amount])->save();

      //           $ret = [
      //             'success' => true,
      //             'message' => 'Data deleted successfully',
      //             'data' => $invoice,
      //           ];
      //           $data->deductions()->delete();
      //         } else {
      //           $ret = [
      //             'success' => true,
      //             'message' => 'No invoice and deleted successfully',
      //           ];
      //           $data->deductions()->delete();
      //         }
      //       } else {
      //         $ret = [
      //           'success' => false,
      //           'message' => 'Data not deleted'
      //         ];
      //       }
      //     } else {
      //       $ret = [
      //         'success' => false,
      //         'message' => 'Data not found'
      //       ];
      //     }
      //   }
      //   return response()->json($ret, 200);
      // } else {
      // }

      $delete_data = ProfileDeductionTypes::where('id', $profileDeductionType_id)->delete();
      return response()->json([
        'success' => true,
        'message' => 'Profile deduction has been successfully deleted.',
        'data' => $delete_data,
      ], 200);
    }
  }

  public function show_profileDeductionType_Button(Request $request)
  {
    $profile_id = $request->profile_id;
    // $profile = Profile::with('profile_deduction_types', 'profile_deduction_types.deduction_type')
    //   ->where('id', $profile_id)
    //   ->orderby('profile_deduction_types.id', 'asc')
    //   ->first();
    $profile = Profile::with([
      'profile_deduction_types' => function ($query) {
        $query->with('deduction_type')->orderBy('id', 'asc');
      }
    ])->findOrFail($profile_id);

    return response()->json([
      'success' => true,
      'data' => $profile,
    ], 200);
  }

  public function get_deduction(Request $request)
  {
    $deduction_id = $request->id;
    $get_deduction = DeductionType::find($deduction_id);

    return response()->json([
      'success' => true,
      'data' => $get_deduction,
    ]);
  }

  public function show_deduction_data(Request $request)
  {
    $profile_id = $request->profile_id;
    $profileDeductionType = DeductionType::with(['profile_deduction_types' => function ($q) use ($profile_id) {
      $q->where('profile_id', $profile_id);
    }]);

    return response()->json([
      'success' => true,
      'data' => $profileDeductionType->get(),
    ], 200);
  }
}
