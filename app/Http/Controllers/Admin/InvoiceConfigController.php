<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceConfig;
use App\Models\InvoiceItems;
use Illuminate\Http\Request;


class InvoiceConfigController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
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
    // return $request->all();
    $error = false;
    $invoiceconfig_id = $request->id;
    if ($error === false) {
      if ($invoiceconfig_id) {
        $data = InvoiceConfig::find($invoiceconfig_id);

        if ($data->invoice_title != $request->invoice_title) {
          $request->validate([
            'invoice_title' => 'required',
          ]);
        }

        if ($data->invoice_email != $request->invoice_email) {
          $request->validate([
            'invoice_email' => 'required|email|unique:invoice_configs',
          ]);
        }
        if ($data->bill_to_address != $request->bill_to_address) {
          $request->validate([
            'bill_to_address' => 'required',
          ]);
        }

        $incoming_data = [
          'invoice_title' => $request->invoice_title,
          'invoice_email' => $request->invoice_email,
          'bill_to_address' => $request->bill_to_address,
        ];

        if ($request->hasFile('edit_invoice_logo')) {
          $userImageFile = $request->file('edit_invoice_logo');
          $userImageFileName = $userImageFile->getClientOriginalName();
          $userImageFilePath = time() . '.' . $userImageFile->getClientOriginalExtension();
          $filename =  $userImageFilePath;
          $userImageFilePathnew = $userImageFile->storeAs('/images', $userImageFilePath, 'public');

          $userImageFileSize = $this->formatSizeUnits($userImageFile->getSize());
          // $path = $userImageFilePath;
          $pathffff = '/storage/' . $userImageFilePathnew;

          $incoming_data += [
            'invoice_logo' => $pathffff,
            'invoice_logo_name' => $userImageFileName,
            // 'file_original_name' => $userImageFileName,
            // 'file_name' => $userImageFilePath,
            // 'file_size' => $userImageFileSize,
          ];
        }

        $store_data = $data->fill(
          $incoming_data,
        )->save();

        return response()->json([
          'success' => true,
          'message' => 'The invoice configuration has been updated successfully.',
          'data' => $data,
        ], 200);
      } else {

        $incoming_data = $request->validate([
          'invoice_title' => 'required',
          'invoice_email' => 'required|email|unique:invoice_configs',
          'bill_to_address' => 'required',
        ]);

        if ($request->hasFile('invoice_logo')) {
          $userImageFile = $request->file('invoice_logo');
          $userImageFileName = $userImageFile->getClientOriginalName();
          $userImageFilePath = time() . '.' . $userImageFile->getClientOriginalExtension();
          $filename =  $userImageFilePath;
          $userImageFilePathnew = $userImageFile->storeAs('/images', $userImageFilePath, 'public');

          $userImageFileSize = $this->formatSizeUnits($userImageFile->getSize());
          // $path = $userImageFilePath;
          $pathffff = '/storage/' . $userImageFilePathnew;

          $incoming_data += [
            'invoice_logo' => $pathffff,
            'invoice_logo_name' => $userImageFileName,
            // 'file_original_name' => $userImageFileName,
            // 'file_name' => $userImageFilePath,
            // 'file_size' => $userImageFileSize,
          ];
        }

        $store_data = InvoiceConfig::create($incoming_data);

        return response()->json([
          'success' => true,
          'message' => 'The invoice configuration has been added successfully.',
          'data' => $store_data,
          'incoming_data' => $incoming_data,
        ], 200);
      }
    }
  }
  // VALIDATE ON UPDATE
  public function editValidateInvoiceEmail(Request $request)
  {
    $id = $request->id;
    $data = InvoiceConfig::find($id);
    if ($id) {
      if ($data) {
        if ($data->invoice_email != $request->invoice_email) {
          $editValidateInvoiceEmail = $request->validate([
            'invoice_email' => 'required|email|unique:invoice_configs',
          ]);
          return response()->json([
            'success' => true,
            'data' => $editValidateInvoiceEmail,
          ], 200);
        }
      }
    }
  }

  // VALIDATE ON SAVE
  public function validateInvoiceEmail(Request $request)
  {

    $validateInvoiceEmail = $request->validate([
      'invoice_email' => 'required|email|unique:invoice_configs',
    ]);

    return response()->json([
      'success' => true,
      'data' => $validateInvoiceEmail,
    ], 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\InvoiceConfig  $invoiceConfig
   * @return \Illuminate\Http\Response
   */
  public function show(InvoiceConfig $invoiceConfig)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\InvoiceConfig  $invoiceConfig
   * @return \Illuminate\Http\Response
   */
  public function edit(InvoiceConfig $invoiceConfig)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\InvoiceConfig  $invoiceConfig
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, InvoiceConfig $invoiceConfig)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\InvoiceConfig  $invoiceConfig
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    //   
    $invoiceConfig_id = $request->id;
    $delete_data = InvoiceConfig::where('id', $invoiceConfig_id)->delete();
    return response()->json([
      'success' => true,
      'message' => 'The invoice configuration has been deleted successfully.',
      'data' => $delete_data,
    ], 200);
  }

  public function invoice_config()
  {
    return view("private.settings.invoiceconfig");
  }


  public function show_editinvoice()
  {
    return view("settings.editinvoice");
  }

  public function show_edit(Request $request)
  {
    $invoice_config_id = $request->id;
    $invoice_config = InvoiceConfig::find($invoice_config_id);

    return response()->json([
      'success' => true,
      'data' => $invoice_config,
    ], 200);
  }


  public function show_invoiceConfig_data(Request $request)
  {
    $invoice_config = new InvoiceConfig();
    // $invoiceConfig_id = $request->id;
    // $data = InvoiceConfig::find($invoiceConfig_id);
    // if ($request->search) {
    //   $invoice_config = $invoice_config->where(
    //     function ($q) use ($request) {
    //       $q->orWhere('invoice_title', 'LIKE', '%' . $request->search . '%');
    //       $q->orWhere('invoice_email', 'LIKE', '%' . $request->search . '%');
    //       $q->orWhere('bill_to_address', 'LIKE', '%' . $request->search . '%');
    //       $q->orWhere('ship_to_address', 'LIKE', '%' . $request->search . '%');
    //     }
    //   );
    // }

    if ($request->page_size) {
      $invoice_config = $invoice_config->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $invoice_config = $invoice_config->get();
    }

    return response()->json([
      'success' => true,
      'data' => $invoice_config,
    ], 200);
  }
}
