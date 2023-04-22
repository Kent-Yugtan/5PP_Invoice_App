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
    $profileDeductionTypes_id = $request->id;
    if ($error === false) {
      if (!$profileDeductionTypes_id) {
        $incoming_data = $request->validate([
          'deduction_type_name' => 'required',
          'amount' => 'required',
        ]);

        // $deductionType = DeductionType::find($request->deduction_type_id);
        $incoming_data += [
          'profile_id' => $request->profile_id,
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
        // $data = ProfileDeductionTypes::find($profileDeductionTypes_id);
        $request->validate([
          'amount' => 'required',
          'deduction_type_name' => 'required|unique:profile_deduction_types',
        ]);
        $store_data = ProfileDeductionTypes::where('id', $profileDeductionTypes_id)->update(
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


  // VALIDATION
  public function validateProfileDeduction(Request $request)
  {
    $id = $request->id;
    $data = ProfileDeductionTypes::find($id);
    if ($id && $data) {
      $profileId = $data->profile_id;
      $validateProfileDeduction = $request->validate([
        'deduction_type_name' => [
          'required',
          Rule::unique('profile_deduction_types')
            ->where('profile_id', $profileId)
            ->ignore($id),
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
    $data = ProfileDeductionTypes::find($id);
    if ($id && $data) {
      if ($data->deduction_type_name != $request->deduction_type_name) {
        $profileId = $data->profile_id;
        $editValidateProfileDeductionname = $request->validate([
          'deduction_type_name' => [
            'required',
            Rule::unique('profile_deduction_types')
              ->where('profile_id', $profileId)
              ->ignore($id),
          ],
        ]);

        return response()->json([
          'success' => true,
          'data' => $editValidateProfileDeductionname,
        ], 200);
      }
    }
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
    $data = ProfileDeductionTypes::with('deduction_type')->where('id', $profileDeductionType_id)->first();

    return response()->json([
      'success' => true,
      'data' => $data,
    ], 200);
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
    $ret = [
      'success' => false,
      'message' => 'Something went wrong'
    ];

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
    $profile = Profile::with('profile_deduction_types', 'profile_deduction_types.deduction_type')->where('id', $profile_id)->first();

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
