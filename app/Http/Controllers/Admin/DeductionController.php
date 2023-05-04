<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Exception;

class DeductionController extends Controller
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
  public function store(Request $request)
  {
    //
    $error = false;
    $deduction_profile_id = $request->profile_id;
    if ($error === false) {
      if ($deduction_profile_id) {
        $incoming_data = $request->validate([
          'deduction_type_name' => 'required',
          'amount' => 'required'
        ]);

        $incoming_data += [
          'invoice_id' => '0',
          'profile_deduction_type_id' => '0',
          'profile_id' => $request->profile_id,
        ];

        $storeData = Deduction::Create($incoming_data);
        return response()->json([
          'success' => 'true',
          'message' => 'The deduction has been added successfully..',
          'data' => $storeData,
        ]);
      } else {
        $deduction_id = $request->deduction_id;
        // $data = Deduction::find($deduction_id);
        $request->validate([
          'deduction_type_name' => 'required',
          'amount' => 'required'
        ]);

        $update_data = Deduction::where('id', $deduction_id)->update([
          'deduction_type_name' => $request->deduction_type_name,
          'amount' => $request->amount
        ]);

        return response()->json([
          'success' => true,
          'message' => 'The deduction has been updated successfully.',
          'data' => $update_data,
        ], 200);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Deduction  $deduction
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Deduction  $deduction
   * @return \Illuminate\Http\Response
   */
  public function edit(Deduction $deduction)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Deduction  $deduction
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Deduction $deduction)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Deduction  $deduction
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    //
    $deduction_id = $request->id;
    if ($deduction_id) {
      $delete_data = Deduction::where('id', $deduction_id)->delete();
      return response()->json([
        'success' => true,
        'message' => 'This deduction has been successfully deleted.',
        'data' => $delete_data,
      ], 200);
    }
  }
  // VALIDATION
  public function validateCreateDeduction(Request $request)
  {
    $id = $request->id;
    $data = deduction::where('profile_id', $id)->get();
    if ($data) {
      $validateCreateDeduction = $request->validate([
        'deduction_type_name' => [
          'required'
          // ,
          // Rule::unique('deductions')
          //   ->where('profile_id', $id)
        ],
      ]);

      return response()->json([
        'success' => true,
        'data' => $validateCreateDeduction,
      ], 200);
    }
  }
  // EDIT VALIDATION
  public function editValidateCreateDeduction(Request $request)
  {
    $id = $request->deduction_id;
    $data = deduction::where('id', $id)->get();
    if ($data) {
      $editValidateCreateDeduction = $request->validate([
        'deduction_type_name' => [
          'required'
          // ,
          // Rule::unique('deductions')
          //   ->where('profile_id', $id)
        ],
      ]);

      return response()->json([
        'success' => true,
        'data' => $editValidateCreateDeduction,
      ], 200);
    }
  }
}
