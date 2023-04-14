<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeductionType;
use App\Models\Profile;
use App\Models\ProfileDeductionTypes;
use App\Models\User;
use Illuminate\Http\Request;

class DeductionTypeController extends Controller
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
    $error = false;
    $deductionType_id = $request->id;
    if ($error === false) {
      if (!$deductionType_id) {
        $incoming_data = $request->validate(
          [
            'deduction_name' => 'required|unique:deduction_types',
            'deduction_amount' => 'required',
          ]
        );
        $store_data = DeductionType::Create($incoming_data);
        return response()->json([
          'success' => true,
          'message' => 'The deduction types has been added successfully.',
          'data' => $store_data,
        ], 200);
      } else {
        $data = DeductionType::find($deductionType_id);
        if ($data->deduction_name != $request->deduction_name) {
          $request->validate([
            'deduction_name' => 'required|unique:deduction_types',

          ]);
        }

        $store_data = DeductionType::where('id', $deductionType_id)->update(
          [
            'deduction_name' => $request->deduction_name,
            'deduction_amount' => $request->deduction_amount,
          ],
        );

        return response()->json([
          'success' => true,
          'message' => 'The deduction types has been updated successfully.',
          'data' => $store_data,
        ], 200);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\DeductionType  $deductionType
   * @return \Illuminate\Http\Response
   */
  public function show(DeductionType $deductionType)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\DeductionType  $deductionType
   * @return \Illuminate\Http\Response
   */
  public function edit(DeductionType $deductionType)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\DeductionType  $deductionType
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, DeductionType $deductionType)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\DeductionType  $deductionType
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    //
    $deductionType_id = $request->id;
    $delete_data = DeductionType::where('id', $deductionType_id)->delete();
    return response()->json([
      'success' => true,
      'message' => 'The deduction types has been deleted successfully.',
      'data' => $delete_data,
    ], 200);
  }

  public function view_deductiontype()
  {
    return view('private.deduction.deductiontype');
  }

  public function view_userdeductiontype()
  {
    return view('private.user.userdeductiontype');
  }

  public function show_edit(Request $request, $id)
  {
    $deductionType_id = $request->id;
    $deductionType = DeductionType::find($deductionType_id);

    return response()->json([
      'success' => true,
      'data' => $deductionType,
    ]);
  }

  public function show_data(Request $request)
  {
    $deductionType = new DeductionType();
    if ($request->search) {
      $deductionType = $deductionType->where(
        function ($q) use ($request) {
          $q->orWhere('deduction_name', 'LIKE', '%' . $request->search . '%');
        }
      );
    }

    if ($request->page_size) {
      $deductionType = $deductionType->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $deductionType = $deductionType->get();
    }

    return response()->json([
      'success' => true,
      'data' => $deductionType,
    ], 200);
  }


  // public function show_deduction_data(Request $request)
  // {
  //     $profile_id = $request->profile_id;
  //     return $profile_id;
  //     $deductionType = new DeductionType();
  //     $deductionType = $deductionType->with('profile_deduction_types')->doesntHave('profile_deduction_types')->where('profile_id', $profile_id);
  //     if ($request->search) {
  //         $deductionType = $deductionType->where(
  //             function ($q) use ($request) {
  //                 $q->orWhere('deduction_name', 'LIKE', '%' . $request->search . '%');
  //             }
  //         );
  //     }

  //     if ($request->page_size) {
  //         $deductionType = $deductionType->limit($request->page_size)
  //             ->paginate($request->page_size, ['*'], 'page', $request->page)
  //             ->toArray();
  //     } else {
  //         $deductionType = $deductionType->get();
  //     }

  //     return response()->json([
  //         'success' => true,
  //         'data' => $deductionType,
  //     ], 200);
  // }


}
