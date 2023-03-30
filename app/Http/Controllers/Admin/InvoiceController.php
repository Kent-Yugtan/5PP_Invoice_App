<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\EmailConfig;
use App\Models\Invoice;
use App\Models\InvoiceConfig;
use App\Models\InvoiceItems;
use App\Models\Profile;
use App\Models\ProfileDeductionTypes;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use League\OAuth2\Server\RequestEvent;

class InvoiceController extends Controller
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
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Invoice  $invoice
   * @return \Illuminate\Http\Response
   */
  public function show(Invoice $invoice)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Invoice  $invoice
   * @return \Illuminate\Http\Response
   */
  public function edit(Invoice $invoice)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Invoice  $invoice
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Invoice $invoice)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Invoice  $invoice
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    $invoice_id = $request->id;
    if ($invoice_id) {
      $data = Invoice::with('invoice_items', 'deductions')->find($invoice_id);
      $last_data = $data;

      if (count($data->deductions) > 0) {
        $data->deductions()->delete();
      }
      if (count($data->invoice_items) > 0) {

        $data->invoice_items()->delete();
      }
      $delete_data = Invoice::where('id', $invoice_id)->delete();

      return response()->json([
        'success' => true,
        'message' => "Invoice has been successfully deleted.",
      ], 200);
    }
  }

  // CHECK PROFILE
  public function check_profile(Request $request)
  {
    $user_id = $request->id;
    $check_profile = Profile::with(['profile_deduction_types', 'profile_deduction_types.deduction_type'])
      ->where('user_id', $user_id)->first();

    if (!$check_profile) {
      return response()->json([
        'success' => false,
        'message' => "Please create profile before making transactions.",
      ], 200);
    } else {
      return response()->json([
        'success' => true,
        'message' => "Success",
        'data' => $check_profile,
      ], 200);
    }
  }

  public function reports_invoice()
  {
    return view('private.reports.invoice');
  }
  public function reports_deduction()
  {
    return view('private.reports.deduction');
  }

  public function userReports_invoice()
  {
    return view('private.userReports.invoice');
  }
  public function userReports_deduction()
  {
    return view('private.userReports.deduction');
  }

  public function current()
  {
    return view('private.invoice.current');
  }

  public function inactive()
  {
    return view('private.invoice.inactive');
  }
  public function current_createinvoice()
  {
    return view('settings.CreateInvoice');
  }
  public function inactive_profile()
  {
    return view('private.admin.inactive');
  }
  public function add_invoice()
  {
    return view('private.invoice.addInvoice');
  }
  public function edit_invoice()
  {
    return view('private.admin.editInvoice');
  }
  public function edit_inactiveInvoice()
  {
    return view('private.admin.editInactiveInvoice');
  }
  public function edit_Invoiceinvoice()
  {
    return view('private.invoice.editInvoice');
  }
  public function edit_inactiveInvoiceinvoice()
  {
    return view('private.invoice.editInactiveInvoice');
  }
  public function edit_userInvoice()
  {
    return view('private.user.editInvoice');
  }

  public function user_addInvoice()
  {
    return view('private.user.UserAddInvoice');
  }

  public function user_currentActiveInvoice()
  {
    return view('private.user.currentActiveInvoice');
  }

  public function user_currentInactiveInvoice()
  {
    return view('private.user.currentInactiveInvoice');
  }


  public function invoiceConfig()
  {

    $data = InvoiceConfig::orderBy('id', 'Desc')->first();

    return response()->json([
      'success' => true,
      'data' => $data,

    ]);
  }

  public function editInvoice(Request $request)
  {
    $invoice_id = $request->id;
    // $invoice = Invoice::with('profile.deduction.profile_deduction_types.deduction_type', 'invoice_items', 'profile.user')->where('id', $invoice_id)->first();
    $invoice = Invoice::with('deductions.profile_deduction_types.deduction_type', 'invoice_items', 'profile.user')->where('id', $invoice_id)->first();

    return response()->json([
      'success' => true,
      'data' => $invoice,

    ]);
  }

  public function update_status_activeOrinactive(Request $request)
  {
    $invoice_id = $request->id;
    $data = Invoice::find($invoice_id);

    $date = date('Y-m-d H:i:s');
    $status = $request->status;
    if ($status === "Active") {
      $data->fill([
        'id' => $invoice_id,
        'status' => $request->status,
        'date_received' => $date,
      ])->save();
    } else {
      $data->fill([
        'id' => $invoice_id,
        'status' => $request->status,
        'date_received' => null,
      ])->save();
    }

    return response()->json([
      'success' => true,
      'message' => "Invoice status has been successfully updated.",
      'data' => $data,
    ]);
  }

  public function update_status(Request $request)
  {
    $invoice_id = $request->id;
    $data = Invoice::find($invoice_id);

    $date = date('Y-m-d H:i:s');
    $status = $request->invoice_status;
    if ($status === "Paid") {
      $data->fill([
        'id' => $invoice_id,
        'invoice_status' => $request->invoice_status,
        'date_received' => $date,
      ])->save();
      $this->sendEmail_status_admin($invoice_id);
      $this->sendEmail_status_profile($invoice_id);
    } else {
      $data->fill([
        'id' => $invoice_id,
        'invoice_status' => $request->invoice_status,
        'date_received' => null,
      ])->save();
    }

    return response()->json([
      'success' => true,
      'message' => "Invoice status has been successfully sent to your email and successfully updated to the database.",
      'data' => $data,
    ]);
  }

  public function add_invoices(Request $request)
  {
    $error = false;
    $profile_id = $request->profile_id;

    if ($error === false) {
      $incoming_data = $request->validate(
        [
          'profile_id' => 'required',
          'due_date' => 'required',
          'description' => 'required',
          'sub_total' => 'required',
          'peso_rate' => '',
          'converted_amount' => '',
          'discount_type' => '',
          'discount_amount' => '',
          'discount_total' => '',
          'grand_total_amount' => '',
          'notes' => '',
        ]
      );

      if ($profile_id) {

        $incoming_data += [
          'invoice_status' => 'Pending',
          'status' => 'Active',
          'quick_invoice' => '1',
          'invoice_no' => $this->generate_invoice(),
        ];
        $store_data = Invoice::create($incoming_data);

        if ($store_data) {

          if ($request->invoiceItem) {
            foreach ($request->invoiceItem as $key => $value) {
              $datainvoiceitem = [
                'item_description' => $value['item_description'],
                'quantity' => $value['item_qty'],
                'rate' => $value['item_rate'],
                'total_amount' => $value['item_total_amount'],
              ];
              $store_data->invoice_items()->create($datainvoiceitem);
            }
          }

          if ($request->Deductions) {
            foreach ($request->Deductions as $key => $value) {
              $dataDeductions = [
                'profile_id' => $request->profile_id,
                'profile_deduction_type_id' => $value['profile_deduction_type_id'],
                'deduction_type_name' => $value['profile_deduction_type_name'],
                'amount' => $value['deduction_amount'],
              ];
              $store_data->deductions()->create($dataDeductions);
            }
          }

          $this->sendEmail_admin();
          $this->sendEmail_profile();
        }
      }
      return response()->json(
        [
          'success' => true,
          'message' => "Invoice has been successfully sent to your email and successfully added to the database.",
          'data' => $store_data,
        ],
        200
      );
    }
  }

  public function create_invoice(Request $request)
  {
    $error = false;
    $profile_id = $request->profile_id;
    $invoice_id = $request->invoice_id;
    $invoiceItems_id = $request->invoiceItems_id;
    $profileDeduction_id = $request->profileDeduction_id;
    $invoiceItem = $request->invoiceItem;
    $deductions = $request->Deductions;
    if ($error === false) {
      // STORE

      if ($profile_id) {
        $incoming_data = $request->validate(
          [
            'profile_id' => '',
            'due_date' => 'required',
            'description' => 'required',
            'sub_total' => 'required',
            'peso_rate' => '',
            'converted_amount' => '',
            'discount_type' => '',
            'discount_amount' => '',
            'discount_total' => '',
            'grand_total_amount' => '',
            'notes' => '',

          ]
        );
        $incoming_data += [
          'invoice_status' => 'Pending',
          'status' => 'Active',
          'quick_invoice' => '0',
          'invoice_no' => $this->generate_invoice(),

        ];
        $store_data = Invoice::create($incoming_data);

        if ($store_data) {
          if ($request->invoiceItem) {
            foreach ($request->invoiceItem as $key => $value) {
              $datainvoiceitem = [
                'item_description' => $value['item_description'],
                'quantity' => $value['item_qty'],
                'rate' => $value['item_rate'],
                'total_amount' => $value['item_total_amount'],
              ];
              $store_data->invoice_items()->create($datainvoiceitem);
            }
          }

          if ($request->Deductions) {
            foreach ($request->Deductions as $key => $value) {
              $dataDeductions = [
                'profile_id' => $request->profile_id,
                'profile_deduction_type_id' => $value['profile_deduction_type_id'],
                'deduction_type_name' => $value['deduction_type_name'],
                'amount' => $value['deduction_amount'],
              ];
              $store_data->deductions()->create($dataDeductions);
            }
          }
        }
        // SEND EMAIL
        // MAO NI ANG FUNCTION NGA TAWAGON SA BUTTON
        $this->sendEmail_admin();
        $this->sendEmail_profile();
        return response()->json([
          'success' => true,
          'message' => "Invoice has been successfully sent to your email and successfully added to the database.",
          'data' => $store_data,
        ], 200);
      }


      // DELETE INVOICE ITEMS DELETE WHEN CLICK SUBMIT
      $invoiceItem_ids = [];
      if ($invoice_id && $invoiceItem) {
        foreach ($invoiceItem as $items) {
          if (!empty($items['item_invoice_id'])) {
            $invoiceItem_ids[] = $items['item_invoice_id'];
          }
        }
      }
      if (count($invoiceItem_ids) > 0) {
        InvoiceItems::where('invoice_id', $invoice_id)->whereNotIn('id', $invoiceItem_ids)->delete();
      } else {
        InvoiceItems::where('invoice_id', $invoice_id)->delete();
      }

      // UPDATE REMOVED INVOICE ITEMS
      if ($invoiceItems_id && $invoice_id) {
        $invoice_data = Invoice::find($invoice_id);
        if ($invoice_data) {
          $incoming_data = $request->validate(
            [
              'sub_total' => 'required',
              'description' => 'required',
              'due_date' => 'required',
            ],
          );
          $incoming_data += [
            'peso_rate' => $request->peso_rate,
            'converted_amount' => $request->converted_amount,
            'discount_type' => $request->discount_type,
            'discount_amount' => $request->discount_amount,
            'discount_total' => $request->discount_total,
            'grand_total_amount' => $request->grand_total_amount,
            'notes' => $request->notes,
            'invoice_status' => 'Pending',
            'status' => 'Active'
          ];

          $invoice_update_data = $invoice_data->fill($incoming_data)->save();

          if ($request->invoiceItem) {
            foreach ($request->invoiceItem as $key => $value) {
              if (!empty($value['item_invoice_id'])) {
                $find_invoice_items = InvoiceItems::find($value['item_invoice_id']);
                if ($find_invoice_items) {
                  $find_invoice_items->fill([
                    'item_description' => $value['item_description'],
                    'quantity' => $value['item_qty'],
                    'rate' => $value['item_rate'],
                    'total_amount' => $value['item_total_amount'],
                  ])->save();
                }
              } else {
                $store_data = InvoiceItems::create(
                  [
                    'invoice_id' => $invoice_id,
                    'item_description' => $value['item_description'],
                    'quantity' => $value['item_qty'],
                    'rate' => $value['item_rate'],
                    'total_amount' => $value['item_total_amount'],
                  ]
                );
              }
            }
          }

          if ($request->Deductions) {
            foreach ($request->Deductions as $key => $value) {
              $find_deductions = Deduction::find($value['deduction_id']);
              if ($find_deductions) {
                $find_deductions->fill([
                  'amount' => $value['deduction_amount'],
                ])->save();
              }
            }
          }

          return response()->json([
            'success' => true,
            'message' => "Invoice has been successfully updated to the database.",
            'data' => $invoice_update_data,
          ], 200);
        }
      }

      // DELETE DEDUCTIONS DELETE WHEN CLICK SUBMIT
      $deductions_ids = [];
      if ($invoice_id && $deductions) {
        foreach ($deductions as $deduction) {
          $deductions_ids[] = $deduction['deduction_id'];
        }
      }
      if (count($deductions_ids) > 0) {
        Deduction::where('invoice_id', $invoice_id)->whereNotIn('id', $deductions_ids)->delete();
      } else {
        Deduction::where('invoice_id', $invoice_id)->delete();
      }

      // UPDATE REMOVED PROFILE DEDUCTIONS ITEMS
      if ($profileDeduction_id && $invoice_id) {
        $invoice_data = Invoice::find($invoice_id);
        if ($invoice_data) {
          $incoming_data = $request->validate(
            [
              'sub_total' => 'required',
              'description' => 'required',
              'due_date' => 'required',
            ],
          );
          $incoming_data += [
            'peso_rate' => $request->peso_rate,
            'converted_amount' => $request->converted_amount,
            'discount_type' => $request->discount_type,
            'discount_amount' => $request->discount_amount,
            'discount_total' => $request->discount_total,
            'grand_total_amount' => $request->grand_total_amount,
            'notes' => $request->notes,
            'invoice_status' => 'Pending',
            'status' => 'Active'
          ];

          $invoice_update_data = $invoice_data->fill($incoming_data)->save();

          if ($request->Deductions) {
            foreach ($request->Deductions as $key => $value) {
              $find_deductions = Deduction::find($value['deduction_id']);
              if ($find_deductions) {
                $find_deductions->fill([
                  'amount' => $value['deduction_amount'],
                ])->save();
              }
            }
          }

          return response()->json([
            'success' => true,
            'message' => "Invoice has been successfully updated to the database.",
            'data' => $invoice_update_data,
          ], 200);
        }
      }

      if ($invoice_id) {
        $invoice_data = Invoice::find($invoice_id);
        if ($invoice_data) {
          $incoming_data = $request->validate(
            [
              'sub_total' => 'required',
              'description' => 'required',
              'due_date' => 'required',
            ],
          );
          $incoming_data += [
            'peso_rate' => $request->peso_rate,
            'converted_amount' => $request->converted_amount,
            'discount_type' => $request->discount_type,
            'discount_amount' => $request->discount_amount,
            'discount_total' => $request->discount_total,
            'grand_total_amount' => $request->grand_total_amount,
            'notes' => $request->notes,
            'invoice_status' => 'Pending',
            'status' => 'Active'
          ];

          $invoice_update_data = $invoice_data->fill($incoming_data)->save();

          if ($request->invoiceItem) {
            foreach ($request->invoiceItem as $key => $value) {
              if (!empty($value['item_invoice_id'])) {
                $find_invoice_items = InvoiceItems::find($value['item_invoice_id']);
                if ($find_invoice_items) {
                  $find_invoice_items->fill([
                    'item_description' => $value['item_description'],
                    'quantity' => $value['item_qty'],
                    'rate' => $value['item_rate'],
                    'total_amount' => $value['item_total_amount'],
                  ])->save();
                }
              } else {
                $store_data = InvoiceItems::create(
                  [
                    'invoice_id' => $invoice_id,
                    'item_description' => $value['item_description'],
                    'quantity' => $value['item_qty'],
                    'rate' => $value['item_rate'],
                    'total_amount' => $value['item_total_amount'],
                  ]
                );
              }
            }
          }

          if ($request->Deductions) {
            foreach ($request->Deductions as $key => $value) {
              $find_deductions = Deduction::find($value['deduction_id']);
              if ($find_deductions) {
                $find_deductions->fill([
                  'amount' => $value['deduction_amount'],
                ])->save();
              }
            }
          }

          return response()->json([
            'success' => true,
            'message' => "Invoice has been successfully updated to the database.",
            'data' => $invoice_update_data,
          ], 200);
        }
      }
    }
  }

  public function create_invoice2(Request $request)
  {
    $error = false;
    $profile_id = $request->profile_id;
    $invoiceItems = $request->invoiceItems;
    $deductions = $request->deduction;

    if ($error == false) {
      $incoming_data = $request->validate([
        'profile_id' => 'required',
        'due_date' => 'required',
        'description' => 'required',
        'sub_total' => 'required',
      ]);
      if ($profile_id) {
        $incoming_data += [
          'peso_rate' => $request->peso_rate,
          'converted_amount' => $request->converted_amount,
          'discount_type' => $request->discount_type,
          'discount_amount' => $request->discount_amount,
          'discount_total' => $request->discount_total,
          'grand_total_amount' => $request->grand_total_amount,
          'notes' => $request->notes,
          'invoice_status' => 'Pending',
          'status' => 'Active',
          'quick_invoice' => '0',
          'invoice_no' => $this->generate_invoice(),
        ];
        $store_data = Invoice::create($incoming_data);
        if ($store_data) {
          if ($request->invoiceItem) {
            foreach ($request->invoiceItem as $key => $value) {
              $datainvoiceitem = [
                'item_description' => $value['item_description'],
                'quantity' => $value['item_qty'],
                'rate' => $value['item_rate'],
                'total_amount' => $value['item_total_amount'],
              ];
              $store_data->invoice_items()->create($datainvoiceitem);
            }
          }

          if ($request->Deductions) {
            foreach ($request->Deductions as $key => $value) {
              $dataDeductions = [
                'profile_id' => $request->profile_id,
                'profile_deduction_type_id' => $value['profile_deduction_type_id'],
                'deduction_type_name' => $value['deduction_type_name'],
                'amount' => $value['deduction_amount'],
              ];
              $store_data->deductions()->create($dataDeductions);
            }
          }
          $this->sendEmail_admin();
          $this->sendEmail_profile();
          return response()->json([
            'success' => true,
            'message' => "Invoice has been successfully sent to your email and successfully added to the database.",
            'data' => $store_data,
          ], 200);
        }
      }
    }
  }


  public function get_invoice_config()
  {
    $invoice_config = InvoiceConfig::latest()->get();

    return response()->json([
      'success' => true,
      'data' => $invoice_config,
    ], 200);
  }

  public function count_pending()
  {
    $pending = Invoice::where('invoice_status', 'Pending')->count();
    if ($pending) {
      return $pending;
    }
  }
  public function count_overdue()
  {
    $overdue = Invoice::where('invoice_status', 'Overdue')->count();
    if ($overdue) {
      return $overdue;
    }
  }
  public function count_paid()
  {
    $paid = Invoice::where('invoice_status', 'Paid')->count();
    if ($paid) {
      return $paid;
    }
  }
  public function count_cancelled()
  {
    $cancelled = Invoice::where('invoice_status', 'Cancelled')->count();
    if ($cancelled) {
      return $cancelled;
    }
  }

  public function getInvoiceStatus(Request $request)
  {
    $invoice_no = $request->id;
    if ($invoice_no) {

      $data = Invoice::find($invoice_no);

      return response()->json([
        'success' => true,
        'data' => $data->invoice_status,
      ]);
    }
  }

  public function show_profileDeductionType_Button(Request $request)
  {

    $deductions = Deduction::with('invoice', 'profile_deduction_types.deduction_type')
      ->where('profile_id', $request->profile_id);

    if (isset($request->search)) {
      $deductions = $deductions->where(
        function ($q) use ($request) {
          $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
        }
      );
    }

    if (isset($request->filter_all_deductions)) {
      if ($request->filter_all_deductions == 'All') {
        $deductions =  $deductions->whereHas('invoice', function ($query) use ($request) {
          $query->where('invoice_status', '<>', '');
        });
      } else {
        $deductions =  $deductions->whereHas('invoice', function ($query) use ($request) {
          $query->where('invoice_status', $request->filter_all_deductions);
        });
      }
    }

    $deductions = $deductions->orderby('created_at', 'desc');

    if ($request->page_size) {
      $deductions = $deductions->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $deductions = $deductions->get();
    }

    return response()->json([
      'success' => true,
      'data' => $deductions,
    ]);
  }

  public function show_Profilededuction_Table_Active(Request $request)
  {
    $profile_id = $request->profile_id;
    if ($profile_id) {

      $deductions = Deduction::with('invoice')
        ->where('profile_id', $profile_id)->whereHas('invoice', function ($query) {
          $query->where('status', 'Active');
        });

      if (isset($request->search)) {
        $deductions = $deductions
          ->where('profile_id', $request->profile_id)
          ->where('amount', 'LIKE', '%' . $request->search . '%')
          ->orWhere('deduction_type_name', 'LIKE', '%' . $request->search . '%')
          ->orwhereHas('invoice', function ($q) use ($request) {
            $q->where('profile_id', $request->profile_id);
            $q->where('invoice_no', 'LIKE', '%' . $request->search . '%');
            $q->orwhere('invoice_status', 'LIKE', '%' . $request->search . '%');
          });
      }

      if (isset($request->filter_all_deductions)) {
        if ($request->filter_all_deductions == 'All') {
          $deductions =  $deductions->whereHas('invoice', function ($query) use ($request) {
            $query->where('invoice_status', '<>', '');
          });
        } else {
          $deductions =  $deductions->whereHas('invoice', function ($query) use ($request) {
            $query->where('invoice_status', $request->filter_all_deductions);
          });
        }
      }

      $deductions = $deductions->orderby('created_at', 'desc');

      if ($request->page_size) {
        $deductions = $deductions->limit($request->page_size)
          ->paginate($request->page_size, ['*'], 'page', $request->page)
          ->toArray();
      } else {
        $deductions = $deductions->get();
      }

      return response()->json([
        'success' => true,
        'data' => $deductions,
      ]);
    }
  }
  public function search_statusInactive_invoice(Request $request)
  {
    $invoices = Invoice::with(['profile.user'])->where('status', 'Inactive');
    if (isset($request->search)) {
      $invoices = $invoices->where(
        function ($q) use ($request) {
          $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('invoice_status', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('grand_total_amount', 'LIKE', '%' . $request->search . '%');
        }
      )->orwhereHas(
        'profile.user',
        function ($q) use ($request) {
          $q->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', '%' . $request->search . '%');
          $q->Where('status', 'Inactive');
        }
      );
    }

    if (isset($request->filter_all_invoices)) {
      if ($request->filter_all_invoices == 'All') {
        $invoices = $invoices->where('invoice_status', '<>', '');
      } else {
        $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
      }
    }

    $invoices = $invoices->orderBy("invoice_no", "desc");

    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' => $invoices,
    ], 200);
  }

  public function search_statusActive_invoice(Request $request)
  {
    $invoices = Invoice::with(['profile.user', 'profile'])->whereHas('profile', function ($query) {
      $query->Where('profile_status', 'Active');
    });
    if (isset($request->search)) {
      $invoices = $invoices->where(
        function ($q) use ($request) {
          $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('invoice_status', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('status', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('grand_total_amount', 'LIKE', '%' . $request->search . '%');
        }
      )->where('status', 'Active')->orwhereHas(
        'profile.user',
        function ($q) use ($request) {
          $q->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', '%' . $request->search . '%');
        }
      )->whereHas('profile', function ($q) {
        $q->where('profile_status', 'Active');
      })->where('status', 'Active');
    }

    if (isset($request->filter_all_invoices)) {
      if ($request->filter_all_invoices == 'All') {
        $invoices = $invoices->where('invoice_status', '<>', '');
      } else {
        $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
      }
    }

    $invoices = $invoices->orderBy("invoice_no", "desc");

    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' => $invoices,
    ], 200);
  }

  public function check_InactiveStatusInvoice(Request $request)
  {
    $invoices = Invoice::with('profile.user')
      ->where('invoice_status', 'Pending')
      ->where('status', 'Inactive')
      ->orderby('created_at', 'desc')->get();
    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }

  public function show_statusInactiveinvoice(Request $request)
  {

    $invoices = Invoice::with('profile.user')->where('status', 'Inactive');

    if (isset($request->search)) {
      $invoices = $invoices->where(
        function ($q) use ($request) {
          $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('invoice_status', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('status', 'LIKE', '%' . $request->search . '%');
        }
      );
    }

    if (isset($request->filter_all_invoices)) {
      if ($request->filter_all_invoices == 'All') {
        $invoices = $invoices->where('invoice_status', '<>', '');
      } else {
        $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
      }
    }

    $invoices = $invoices->orderBy("invoice_no", "desc");

    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' => $invoices,
    ], 200);
  }

  public function show_invoice(Request $request)
  {
    $findProfile = Profile::firstWhere('user_id', $request->user_id);
    if ($findProfile) {
      $invoices = Invoice::with('profile.user', 'deductions.profile_deduction_types.deduction_type', 'invoice_items')
        ->where('status', 'Active')
        ->where('profile_id', $findProfile->id);

      if (isset($request->search)) {
        $invoices = $invoices->where(
          function ($q) use ($request) {
            $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
            $q->orWhere('invoice_status', 'LIKE', '%' . $request->search . '%');
            $q->orWhere('grand_total_amount', 'LIKE', '%' . $request->search . '%');
            $q->orWhere('due_date', 'LIKE', '%' . $request->search . '%');
          }
        );
      }

      if (isset($request->filter_all_invoices)) {
        if ($request->filter_all_invoices == 'All') {
          $invoices = $invoices->where('invoice_status', '<>', '');
        } else {
          $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
        }
      }

      $invoices = $invoices->orderBy("invoice_no", "desc");

      if ($request->page_size) {
        $invoices = $invoices->limit($request->page_size)
          ->paginate($request->page_size, ['*'], 'page', $request->page)
          ->onEachSide(2)
          ->toArray();
      } else {
        $invoices = $invoices->get();
      }

      return response()->json([
        'success' => true,
        'data' => $invoices,
      ], 200);
    } else {
      $invoices = Invoice::with('profile.user', 'profile')
        ->whereHas('profile', function ($query) {
          $query->where('profile_status', 'Active');
        })->where('status', 'Active');

      if (isset($request->search)) {
        $invoices = $invoices->where(
          function ($q) use ($request) {
            $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
            $q->orWhere('invoice_status', 'LIKE', '%' . $request->search . '%');
          }
        );
      }

      if (isset($request->filter_all_invoices)) {
        if ($request->filter_all_invoices == 'All') {
          $invoices = $invoices->where('invoice_status', '<>', '');
        } else {
          $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
        }
      }

      $invoices = $invoices->orderBy("invoice_no", "desc");

      if ($request->page_size) {
        $invoices = $invoices->limit($request->page_size)
          ->paginate($request->page_size, ['*'], 'page', $request->page)
          ->toArray();
      } else {
        $invoices = $invoices->get();
      }

      return response()->json([
        'success' => true,
        'data' => $invoices,
      ], 200);
    }
  }

  public function check_ActivependingInvoices(Request $request)
  {
    $invoices = Invoice::with('profile.user', 'profile')
      ->whereHas('profile', function ($query) {
        $query->where('profile_status', 'Active');
      })->where('status', 'Active')
      ->where('invoice_status', 'Pending')
      ->orderby('created_at', 'desc')->get();
    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }

  public function check_InactivependingInvoices(Request $request)
  {
    $invoices = Invoice::with('profile.user', 'profile')
      ->whereHas('profile', function ($query) {
        $query->where('profile_status', 'Inactive');
      })->where('invoice_status', 'Pending')->orderby('created_at', 'desc')->get();
    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }


  public function check_ActivependingInvoicesStatus(Request $request)
  {
    $invoices = Invoice::with('profile.user', 'profile')
      ->whereHas('profile', function ($query) {
        $query->where('profile_status', 'Active');
      })->where('invoice_status', 'Pending')->orderby('created_at', 'desc')->get();
    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }

  public function check_InactivependingInvoicesStatus(Request $request)
  {
    $invoices = Invoice::with('profile.user', 'profile')
      ->whereHas('profile', function ($query) {
        $query->where('profile_status', 'Inactive');
      })->where('invoice_status', 'Pending')->orderby('created_at', 'desc')->get();

    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }

  public function show_pendingInvoices(Request $request)
  {
    // $findProfile = Profile::firstWhere('user_id', $request->user_id);
    $invoices = Invoice::with('profile', 'profile.user')
      ->whereHas('profile', function ($query) {
        $query->where('profiles.profile_status', 'Active');
      })->where('status', 'Active')
      ->where('invoice_status', 'Pending')
      ->orderby('created_at', 'desc');
    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->onEachSide(2)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }

  public function show_overdueInvoices(Request $request)
  {
    // $findProfile = Profile::firstWhere('user_id', $request->user_id);

    $invoices = Invoice::with('profile', 'profile.user')
      ->whereHas('profile', function ($query) {
        $query->where('profiles.profile_status', 'Active');
      })->where('status', 'Active')
      ->where('invoice_status', 'Overdue')
      ->orderby('created_at', 'desc');

    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->onEachSide(2)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }

  public function show_edit_invoice(Request $request)
  {
    $invoice_id = $request->invoice_id;
    if ($invoice_id) {
      $data = Invoice::with('deductions.profile_deduction_types.deduction_type', 'invoice_items')
        ->where('id', $invoice_id)->first();

      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function active_paid_invoice_count()
  {
    $data = Invoice::with('profile')
      ->whereHas('profile', function ($query) {
        $query->where('profile_status', 'Active');
      })->where('status', 'Active')
      ->where('invoice_status', 'Paid')
      ->get();
    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function active_pending_invoice_count()
  {
    $data = Invoice::with('profile')
      ->whereHas('profile', function ($query) {
        $query->where('profile_status', 'Active');
      })->where('status', 'Active')
      ->where('invoice_status', 'Pending')
      ->get();

    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function active_overdue_invoice_count()
  {
    // $data = Invoice::join('profiles', 'profiles.id', 'invoices.profile_id')
    //   ->where('profiles.profile_status', 'Active')
    //   ->where('invoices.invoice_status', 'Overdue')
    //   ->get();
    $data = Invoice::with('profile')
      ->whereHas('profile', function ($query) {
        $query->where('profile_status', 'Active');
      })->where('status', 'Active')
      ->where('invoice_status', 'Overdue')
      ->get();
    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function active_cancelled_invoice_count()
  {
    // $data = Invoice::join('profiles', 'profiles.id', 'invoices.profile_id')
    //   ->where('profiles.profile_status', 'Active')
    //   ->where('invoices.invoice_status', 'Cancelled')
    //   ->get();
    $data = Invoice::with('profile')
      ->whereHas('profile', function ($query) {
        $query->where('profile_status', 'Active');
      })->where('status', 'Active')
      ->where('invoice_status', 'Cancelled')
      ->get();
    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }


  public function inactive_paid_invoice_count()
  {
    $data = Invoice::join('profiles', 'profiles.id', 'invoices.profile_id')
      ->where('profiles.profile_status', 'Inactive')
      ->where('invoices.invoice_status', 'Paid')
      ->where('invoices.status', 'Active')
      ->get();

    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function inactive_pending_invoice_count()
  {
    $data = Invoice::join('profiles', 'profiles.id', 'invoices.profile_id')
      ->where('profiles.profile_status', 'Inactive')
      ->where('invoices.invoice_status', 'Pending')
      ->where('invoices.status', 'Active')
      ->get();

    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function get_quickInvoice_PDT(Request $request)
  {
    $profile_id = $request->id;
    $data = ProfileDeductionTypes::select('id', 'deduction_type_name', 'amount')->where('profile_id', $profile_id)->get();
    $sum = $data->sum('amount');

    $otherValues = [];
    foreach ($data as $item) {
      $otherValues[] = [
        'id' => $item->id,
        'deduction_type_name' => $item->deduction_type_name,
        'amount' => $item->amount,
        'sum' => $sum,
      ];
    }
    return response()->json([
      'success' => true,
      'data' => $otherValues,
    ], 200);
  }

  public function statusInactive_paid_invoice_count()
  {
    $data = Invoice::join('profiles', 'profiles.id', 'invoices.profile_id')
      ->where('profiles.profile_status', 'Active')
      ->where('invoices.status', 'Inactive')
      ->where('invoices.invoice_status', 'Paid')
      ->get();
    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function statusInactive_pending_invoice_count()
  {
    $data = Invoice::join('profiles', 'profiles.id', 'invoices.profile_id')
      ->where('profiles.profile_status', 'Active')
      ->where('invoices.status', 'Inactive')
      ->where('invoices.invoice_status', 'Pending')
      ->get();

    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  // SEND EMAIL FOR STATUS PAID ADMIN
  public function sendEmail_status_admin($invoice_id)
  {
    $data = Invoice::with(['profile.user', 'deductions.profile_deduction_types.deduction_type', 'invoice_items'])
      ->where('id', $invoice_id)->first();
    $data1 = InvoiceConfig::orderBy('id', 'Desc')->first();
    $data2 = EmailConfig::where('status', 'Active')->get();
    if ($data && $data1 && $data2) {
      foreach ($data2 as $send_admin) {
        $data_setup_email_template = [
          'invoice_logo'           => $data1->invoice_logo, // VARIABLE FOR UPLOADING INTO WEB
          // 'invoice_logo'           => 'https://shamcey.5ppsite.com/logo.png', // DEFAULT FOR LOCAL
          'full_name'              => $data->profile->user->first_name . " " . $data->profile->user->last_name,
          'user_email'             => $data->profile->user->email,
          'invoice_no'             => $data->invoice_no,
          'invoice_status'         => $data->status,
          'address'                => $data->profile->address,
          'city'                   => $data->profile->city,
          'province'               => $data->profile->province,
          'zip_code'               => $data->profile->zip_code,
          'date_created'           => CarbonCarbon::parse($data->created_at)->isoFormat('MMMM DD, YYYY'),
          'invoice_title'          => $data1->invoice_title,
          'due_date'               => CarbonCarbon::parse($data->due_date)->isoFormat('MMMM DD, YYYY'),
          'bill_to_address'        => $data1->bill_to_address,
          'payment_status'         => $data->invoice_status,
          'date_received'          => CarbonCarbon::parse($data->date_received)->isoFormat('MMMM DD, YYYY'),
          'ship_to_address'        => $data1->ship_to_address,
          'balance_due'            => number_format($data->sub_total, 2),
          'invoice_items'          => $data->invoice_items,
          'invoice_description'    => $data->description,
          'sub_total'              => number_format(($data->sub_total + $data->discount_total), 2),
          'discount_type'          => $data->discount_type,
          'discount_amount'        => number_format($data->discount_amount, 2),
          'discount_total'         => number_format($data->discount_total, 2),
          'peso_rate'              => number_format($data->peso_rate, 2),
          'converted_amount'       => number_format($data->converted_amount, 2),
          'deductions'             => $data->deductions,
          'deductions_total'       => number_format($data->deductions->pluck('amount')->sum(), 2),
          'notes'                  => $data->notes,
          'grand_total_amount'     => number_format($data->grand_total_amount, 2),
          'admin_email'            => $send_admin->email_address,
          'quick_invoice'          => $data->quick_invoice,
        ];
        $this->setup_email_template_status_admin($data_setup_email_template);
      }
      $dataObject = array_merge($data->toArray(), $data1->toArray(), $data2->toArray());
      return response()->json([
        'success' => true,
        'Message' => 'Please configure the email settings.',
        'data' => $dataObject,
      ]);
    }
  }
  // SEND EMAIL FOR STATUS PAID PROFILE
  public function sendEmail_status_profile($invoice_id)
  {
    $data = Invoice::with(['profile.user', 'deductions.profile_deduction_types.deduction_type', 'invoice_items'])
      ->where('id', $invoice_id)->first();
    $data1 = InvoiceConfig::orderBy('id', 'Desc')->first();
    if ($data && $data1) {

      $data_setup_email_template = [
        'invoice_logo'           => $data1->invoice_logo, // VARIABLE FOR UPLOADING INTO WEB
        // 'invoice_logo'           => 'https://shamcey.5ppsite.com/logo.png', // DEFAULT FOR LOCAL
        'full_name'              => $data->profile->user->first_name . " " . $data->profile->user->last_name,
        'user_email'             => $data->profile->user->email,
        'invoice_no'             => $data->invoice_no,
        'invoice_status'         => $data->status,
        'address'                => $data->profile->address,
        'city'                   => $data->profile->city,
        'province'               => $data->profile->province,
        'zip_code'               => $data->profile->zip_code,
        'date_created'           => CarbonCarbon::parse($data->created_at)->isoFormat('MMMM DD, YYYY'),
        'invoice_title'          => $data1->invoice_title,
        'due_date'               => CarbonCarbon::parse($data->due_date)->isoFormat('MMMM DD, YYYY'),
        'bill_to_address'        => $data1->bill_to_address,
        'payment_status'         => $data->invoice_status,
        'date_received'          => CarbonCarbon::parse($data->date_received)->isoFormat('MMMM DD, YYYY'),
        'ship_to_address'        => $data1->ship_to_address,
        'balance_due'            => number_format($data->sub_total, 2),
        'invoice_items'          => $data->invoice_items,
        'invoice_description'    => $data->description,
        'sub_total'              => number_format(($data->sub_total + $data->discount_total), 2),
        'discount_type'          => $data->discount_type,
        'discount_amount'        => number_format($data->discount_amount, 2),
        'discount_total'         => number_format($data->discount_total, 2),
        'peso_rate'              => number_format($data->peso_rate, 2),
        'converted_amount'       => number_format($data->converted_amount, 2),
        'deductions'             => $data->deductions,
        'deductions_total'       => number_format($data->deductions->pluck('amount')->sum(), 2),
        'notes'                  => $data->notes,
        'grand_total_amount'     => number_format($data->grand_total_amount, 2),
        'quick_invoice'          => $data->quick_invoice,
      ];
      $this->setup_email_template_status_profile($data_setup_email_template);
      $dataObject = array_merge($data->toArray(), $data1->toArray());
      return response()->json([
        'success' => true,
        'Message' => 'Please configure the email settings.',
        'data' => $dataObject,
      ]);
    }
  }

  // SEND EMAIL FOR ADMIN
  public function sendEmail_admin()
  {
    $data = Invoice::with(['profile.user', 'deductions.profile_deduction_types.deduction_type', 'invoice_items'])
      ->orderBy('id', 'Desc')->first();
    $data1 = InvoiceConfig::orderBy('id', 'Desc')->first();
    $data2 = EmailConfig::where('status', 'Active')->get();

    if ($data && $data1 && $data2) {
      foreach ($data2 as $send_admin) {
        $data_setup_email_template = [
          'invoice_logo'           => $data1->invoice_logo, // VARIABLE FOR UPLOADING INTO WEB
          // 'invoice_logo'           => 'https://shamcey.5ppsite.com/logo.png', // DEFAULT FOR LOCAL
          'full_name'              => $data->profile->user->first_name . " " . $data->profile->user->last_name,
          'user_email'             => $data->profile->user->email,
          'invoice_no'             => $data->invoice_no,
          'invoice_status'         => $data->status,
          'address'                => $data->profile->address,
          'city'                   => $data->profile->city,
          'province'               => $data->profile->province,
          'zip_code'               => $data->profile->zip_code,
          'date_created'           => CarbonCarbon::parse($data->created_at)->isoFormat('MMMM DD, YYYY'),
          'invoice_title'          => $data1->invoice_title,
          'due_date'               => CarbonCarbon::parse($data->due_date)->isoFormat('MMMM DD, YYYY'),
          'bill_to_address'        => $data1->bill_to_address,
          'payment_status'         => $data->invoice_status,
          'date_received'          => CarbonCarbon::parse($data->date_received)->isoFormat('MMMM DD, YYYY'),
          'ship_to_address'        => $data1->ship_to_address,
          'balance_due'            => number_format($data->sub_total, 2),
          'invoice_items'          => $data->invoice_items,
          'invoice_description'    => $data->description,
          'sub_total'              => number_format(($data->sub_total + $data->discount_total), 2),
          'discount_type'          => $data->discount_type,
          'discount_amount'        => number_format($data->discount_amount, 2),
          'discount_total'         => number_format($data->discount_total, 2),
          'peso_rate'              => number_format($data->peso_rate, 2),
          'converted_amount'       => number_format($data->converted_amount, 2),
          'deductions'             => $data->deductions,
          'deductions_total'       => number_format($data->deductions->pluck('amount')->sum(), 2),
          'notes'                  => $data->notes,
          'grand_total_amount'     => number_format($data->grand_total_amount, 2),
          'admin_email'            => $send_admin->email_address,
          'quick_invoice'          => $data->quick_invoice,
        ];
        $this->setup_email_template_admin($data_setup_email_template);
      }

      $dataObject = array_merge($data->toArray(), $data1->toArray(), $data2->toArray());

      return response()->json([
        'success' => true,
        'Message' => 'Please configure the email settings.',
        'data' => $dataObject,
      ]);
    }
  }

  // SEND EMAIL FOR PROFILE
  public function sendEmail_profile()
  {
    $data = Invoice::with(['profile.user', 'deductions.profile_deduction_types.deduction_type', 'invoice_items'])
      ->orderBy('id', 'Desc')->first();
    $data1 = InvoiceConfig::orderBy('id', 'Desc')->first();
    if ($data && $data1) {
      $data_setup_email_template = [
        'invoice_logo'           => $data1->invoice_logo, // VARIABLE FOR UPLOADING INTO WEB
        // 'invoice_logo'           => 'https://shamcey.5ppsite.com/logo.png', // DEFAULT FOR LOCAL
        'full_name'              => $data->profile->user->first_name . " " . $data->profile->user->last_name,
        'user_email'             => $data->profile->user->email,
        'invoice_no'             => $data->invoice_no,
        'invoice_status'         => $data->status,
        'address'                => $data->profile->address,
        'city'                   => $data->profile->city,
        'province'               => $data->profile->province,
        'zip_code'               => $data->profile->zip_code,
        'date_created'           => CarbonCarbon::parse($data->created_at)->isoFormat('MMMM DD, YYYY'),
        'invoice_title'          => $data1->invoice_title,
        'due_date'               => CarbonCarbon::parse($data->due_date)->isoFormat('MMMM DD, YYYY'),
        'bill_to_address'        => $data1->bill_to_address,
        'payment_status'         => $data->invoice_status,
        'date_received'          => CarbonCarbon::parse($data->date_received)->isoFormat('MMMM DD, YYYY'),
        'ship_to_address'        => $data1->ship_to_address,
        'balance_due'            => number_format($data->sub_total, 2),
        'invoice_items'          => $data->invoice_items,
        'invoice_description'    => $data->description,
        'sub_total'              => number_format(($data->sub_total + $data->discount_total), 2),
        'discount_type'          => $data->discount_type,
        'discount_amount'        => number_format($data->discount_amount, 2),
        'discount_total'         => number_format($data->discount_total, 2),
        'peso_rate'              => number_format($data->peso_rate, 2),
        'converted_amount'       => number_format($data->converted_amount, 2),
        'deductions'             => $data->deductions,
        'deductions_total'       => number_format($data->deductions->pluck('amount')->sum(), 2),
        'notes'                  => $data->notes,
        'grand_total_amount'     => number_format($data->grand_total_amount, 2),
        'quick_invoice'          => $data->quick_invoice,

      ];

      $this->setup_email_template_profile($data_setup_email_template);
      $dataObject = array_merge($data->toArray(), $data1->toArray());
      $data['data'] = $dataObject;
      return response()->json([
        'success' => true,
        'Message' => 'Please configure the email settings.',
        'data' => $dataObject,
      ]);
    }
  }

  public function invoiceReport_load(Request $request)
  {
    // your other code here
    $data = Invoice::with(['profile.user', 'deductions' => function ($q) {
      $q->select(DB::raw('SUM(amount) as total_deductions'), 'invoice_id')
        ->groupBy('invoice_id');
    }])
      ->orderBy('invoices.id', 'Desc')
      ->get();

    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ]);
    }
  }

  public function invoiceReport_click(Request $request)
  {
    $rules = $request->validate([
      'fromDate' => 'required',
      'toDate' => 'required',
    ]);

    if (isset($request->fromDate) && isset($request->toDate)) {
      try {
        $startDate = Carbon::createFromFormat('Y/m/d', $request->fromDate)->startOfDay();
        $endDate = Carbon::createFromFormat('Y/m/d', $request->toDate)->endOfDay();

        $invoices = Invoice::with(['profile.user', 'deductions' => function ($q) {
          $q->select(DB::raw('SUM(amount) as total_deductions'), 'invoice_id')
            ->groupBy('invoice_id');
        }])
          ->whereBetween('created_at', [$startDate, $endDate]) // filter by date range
          ->orderBy('id', 'desc')
          ->get();
        return response()->json([
          'success' => true,
          'data' => $invoices,
        ], 200);
      } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
      }
    }
  }
  public function deductionReport_load(Request $request)
  {
    // your other code here
    $from = date('Y-m-d', strtotime($request->from));
    $to = date('Y-m-d', strtotime($request->to));
    $data = Invoice::with(['profile.user', 'deductions' => function ($q) {
      $q->select(DB::raw('SUM(amount) as total_deductions'), 'invoice_id')
        ->groupBy('invoice_id');
    }])
      ->orderBy('id', 'Desc')
      ->get();


    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ]);
    }
  }

  public function deductionReport_click(Request $request)
  {
    $rules = $request->validate([
      'fromDate' => 'required',
      'toDate' => 'required',
    ]);

    if (isset($request->fromDate) && isset($request->toDate)) {
      try {
        $startDate = Carbon::createFromFormat('Y/m/d', $request->fromDate)->startOfDay();
        $endDate = Carbon::createFromFormat('Y/m/d', $request->toDate)->endOfDay();

        $invoices = Invoice::with(['profile.user', 'deductions' => function ($q) {
          $q->select(DB::raw('SUM(amount) as total_deductions'), 'invoice_id')
            ->groupBy('invoice_id');
        }])
          ->whereBetween('created_at', [$startDate, $endDate]) // filter by date range
          ->orderBy('id', 'desc')
          ->get();
        return response()->json([
          'success' => true,
          'data' => $invoices,
        ], 200);
      } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
      }
    }
  }

  public function deductionDetails(Request $request)
  {
    $invoice_id = $request->id;
    $data = Invoice::find($invoice_id)
      ->deductions()
      ->select('deductions.deduction_type_name', 'deductions.amount')
      ->get();
    // ->join('profile_deduction_types', 'profile_deduction_types.id', '=', 'deductions.profile_deduction_type_id')
    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ]);
    }
  }

  // USER'S FUNCTION
  // DASHBOARD PAGE
  public function get_quickInvoiceUser_PDT(Request $request)
  {
    $profile_id = $request->id;
    $data = ProfileDeductionTypes::select('id', 'deduction_type_name', 'amount')->where('profile_id', $profile_id)->get();
    $sum = $data->sum('amount');

    $otherValues = [];
    foreach ($data as $item) {
      $otherValues[] = [
        'id' => $item->id,
        'deduction_type_name' => $item->deduction_type_name,
        'amount' => $item->amount,
        'sum' => $sum,
      ];
    }
    return response()->json([
      'success' => true,
      'data' => $otherValues,
    ], 200);
  }

  public function check_userActivependingInvoices(Request $request)
  {
    $userId = auth()->user()->id;
    $invoices = Invoice::with('profile.user', 'profile')
      ->whereHas('profile', function ($query) {
        $query->where('profile_status', 'Active');
      })
      ->where(DB::raw('(select user_id from profiles where profiles.id=profile_id)'), $userId)
      ->where('status', 'Active')
      ->where('invoice_status', 'Pending')
      ->orderby('created_at', 'desc')->get();
    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }

  public function show_userpendingInvoices(Request $request)
  {
    $userId = auth()->user()->id;
    $invoices = Invoice::with('profile', 'profile.user')
      ->whereHas('profile', function ($query) {
        $query->where('profiles.profile_status', 'Active');
      })
      ->where(DB::raw('(select user_id from profiles where profiles.id=profile_id)'), $userId)
      ->where('status', 'Active')
      ->where('invoice_status', 'Pending')
      ->orderby('created_at', 'desc');
    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }

  public function show_useroverdueInvoices(Request $request)
  {
    $userId = auth()->user()->id;
    $invoices = Invoice::with('profile', 'profile.user')
      ->whereHas('profile', function ($query) {
        $query->where('profiles.profile_status', 'Active');
      })
      ->where(DB::raw('(select user_id from profiles where profiles.id=profile_id)'), $userId)
      ->where('status', 'Active')
      ->where('invoice_status', 'Overdue')
      ->orderby('created_at', 'desc');

    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' =>  $invoices,
    ], 200);
  }

  public function active_user_paid_invoice_count()
  {
    $data = Invoice::with('profile')
      ->whereHas('profile', function ($query) {
        $userId = auth()->user()->id;
        $query->where('profile_status', 'Active');
        $query->where('user_id', $userId);
      })->where('status', 'Active')
      ->where('invoice_status', 'Paid')
      ->get();

    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function active_user_pending_invoice_count()
  {
    $data = Invoice::with('profile')
      ->whereHas('profile', function ($query) {
        $userId = auth()->user()->id;
        $query->where('profile_status', 'Active');
        $query->where('user_id', $userId);
      })->where('status', 'Active')
      ->where('invoice_status', 'Pending')
      ->get();

    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function active_user_overdue_invoice_count()
  {

    $data = Invoice::with('profile')
      ->whereHas('profile', function ($query) {
        $userId = auth()->user()->id;
        $query->where('profile_status', 'Active');
        $query->where('user_id', $userId);
      })->where('status', 'Active')
      ->where('invoice_status', 'Overdue')
      ->get();
    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  public function active_user_cancelled_invoice_count()
  {

    $data = Invoice::with('profile')
      ->whereHas('profile', function ($query) {
        $userId = auth()->user()->id;
        $query->where('profile_status', 'Active');
        $query->where('user_id', $userId);
      })->where('status', 'Active')
      ->where('invoice_status', 'Cancelled')
      ->get();
    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ], 200);
    }
  }

  //   PROFILE PAGE
  public function getUserInvoiceStatus(Request $request)
  {
    $invoice_no = $request->id;
    if ($invoice_no) {
      $data = Invoice::find($invoice_no);
      return response()->json([
        'success' => true,
        'data' => $data->invoice_status,
      ]);
    }
  }

  public function show_userInvoice(Request $request)
  {
    $userId = auth()->user()->id;
    if ($userId) {
      $invoices = Invoice::with('profile.user', 'deductions.profile_deduction_types.deduction_type', 'invoice_items')
        ->where('status', 'Active')
        ->where(DB::raw('(select user_id from profiles where profiles.id = profile_id)'), $userId);

      if (isset($request->search)) {
        $invoices = $invoices->where(
          function ($q) use ($request) {
            $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
            $q->orWhere('invoice_status', 'LIKE', '%' . $request->search . '%');
            $q->orWhere('grand_total_amount', 'LIKE', '%' . $request->search . '%');
            $q->orWhere('due_date', 'LIKE', '%' . $request->search . '%');
          }
        );
      }

      if (isset($request->filter_all_invoices)) {
        if ($request->filter_all_invoices == 'All') {
          $invoices = $invoices->where('invoice_status', '<>', '');
        } else {
          $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
        }
      }

      $invoices = $invoices->orderBy("invoice_no", "desc");

      if ($request->page_size) {
        $invoices = $invoices->limit($request->page_size)
          ->paginate($request->page_size, ['*'], 'page', $request->page)
          ->toArray();
      } else {
        $invoices = $invoices->get();
      }

      return response()->json([
        'success' => true,
        'data' => $invoices,
      ], 200);
    }
  }

  // CHECK PROFILE
  public function check_userProfile(Request $request)
  {
    $userId = auth()->user()->id;
    $check_profile = Profile::with(['profile_deduction_types', 'profile_deduction_types.deduction_type'])
      ->where('user_id', $userId)->first();

    if (!$check_profile) {
      return response()->json([
        'success' => false,
        'message' => "Please create profile before making transactions.",
      ], 200);
    } else {
      return response()->json([
        'success' => true,
        'message' => "Success",
        'data' => $check_profile,
      ], 200);
    }
  }

  public function userEditInvoice(Request $request)
  {
    $invoice_id = $request->id;
    // $invoice = Invoice::with('profile.deduction.profile_deduction_types.deduction_type', 'invoice_items', 'profile.user')->where('id', $invoice_id)->first();
    $invoice = Invoice::with('deductions.profile_deduction_types.deduction_type', 'invoice_items', 'profile.user')->where('id', $invoice_id)->first();

    return response()->json([
      'success' => true,
      'data' => $invoice,

    ]);
  }

  public function search_userstatusActive_invoice(Request $request)
  {
    $userId = auth()->user()->id;
    $invoices = Invoice::with(['profile.user', 'profile'])
      ->where(DB::raw('(select user_id from profiles where profiles.id=profile_id)'), $userId)
      ->where('status', 'Active')
      ->whereHas('profile', function ($query) {
        $query->Where('profile_status', 'Active');
      });

    if (isset($request->search)) {
      $invoices = $invoices->where(
        function ($q) use ($request) {
          $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('invoice_status', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('status', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('grand_total_amount', 'LIKE', '%' . $request->search . '%');
        }
      )->where('status', 'Active')->orwhereHas(
        'profile.user',
        function ($q) use ($request) {
          $userId = auth()->user()->id;
          $q->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', '%' . $request->search . '%');
          $q->where('id', $userId);
        }
      )->whereHas('profile', function ($q) {
        $q->where('profile_status', 'Active');
      })->where('status', 'Active');
    }

    if (isset($request->filter_all_invoices)) {
      if ($request->filter_all_invoices == 'All') {
        $invoices = $invoices->where('invoice_status', '<>', '');
      } else {
        $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
      }
    }

    $invoices = $invoices->orderBy("invoice_no", "desc");

    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' => $invoices,
    ], 200);
  }
  public function search_userstatusInactive_invoice(Request $request)
  {
    $userId = auth()->user()->id;
    $invoices = Invoice::with(['profile.user', 'profile'])
      ->where(DB::raw('(select user_id from profiles where profiles.id=profile_id)'), $userId)
      ->where('status', 'Inactive')
      ->whereHas('profile', function ($query) {
        $query->Where('profile_status', 'Active');
      });
    if (isset($request->search)) {
      $invoices = $invoices->where(
        function ($q) use ($request) {
          $userId = auth()->user()->id;
          $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('invoice_status', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('grand_total_amount', 'LIKE', '%' . $request->search . '%');
          $q->where(DB::raw('(select user_id from profiles where profiles.id=profile_id)'), $userId);
        }
      )->where('status', 'Inactive')->orwhereHas(
        'profile.user',
        function ($q) use ($request) {
          $userId = auth()->user()->id;
          $q->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', '%' . $request->search . '%');
          $q->where('id', $userId);
        }
      )->whereHas('profile', function ($q) {
        $q->where('profile_status', 'Active');
      })->where('status', 'Inactive');
    }

    if (isset($request->filter_all_invoices)) {
      if ($request->filter_all_invoices == 'All') {
        $invoices = $invoices->where('invoice_status', '<>', '');
      } else {
        $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
      }
    }

    $invoices = $invoices->orderBy("invoice_no", "desc");

    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' => $invoices,
    ], 200);
  }

  public function show_userstatusInactiveinvoice(Request $request)
  {
    $userId = auth()->user()->id;
    $invoices = Invoice::with(['profile.user', 'profile'])->where('status', 'Inactive')
      ->where(DB::raw('(select user_id from profiles where profiles.id=profile_id)'), $userId);
    if (isset($request->search)) {
      $invoices = $invoices->where(
        function ($q) use ($request) {
          $q->orWhere('invoice_no', 'LIKE', '%' . $request->search . '%');
          $q->orWhere('invoice_status', 'LIKE', '%' . $request->search . '%');
        }
      );
    }

    if (isset($request->filter_all_invoices)) {
      if ($request->filter_all_invoices == 'All') {
        $invoices = $invoices->where('invoice_status', '<>', '');
      } else {
        $invoices = $invoices->where('invoice_status', $request->filter_all_invoices);
      }
    }

    $invoices = $invoices->orderBy("invoice_no", "desc");

    if ($request->page_size) {
      $invoices = $invoices->limit($request->page_size)
        ->paginate($request->page_size, ['*'], 'page', $request->page)
        ->toArray();
    } else {
      $invoices = $invoices->get();
    }

    return response()->json([
      'success' => true,
      'data' => $invoices,
    ], 200);
  }

  public function userInvoiceReport_load(Request $request)
  {
    // your other code here
    $userId = auth()->user()->id;
    $data = Invoice::with(['profile.user', 'deductions' => function ($q) {
      $q->select(DB::raw('SUM(amount) as total_deductions'), 'invoice_id')
        ->groupBy('invoice_id');
    }])->whereHas('profile', function ($query) use ($userId) {
      $query->where('user_id', $userId);
    })
      ->orderBy('id', 'Desc')
      ->get();

    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ]);
    }
  }

  public function userInvoiceReport_click(Request $request)
  {


    $rules = $request->validate([
      'fromDate' => 'required',
      'toDate' => 'required',
    ]);

    if (isset($request->fromDate) && isset($request->toDate)) {
      try {
        $startDate = Carbon::createFromFormat('Y/m/d', $request->fromDate)->startOfDay();
        $endDate = Carbon::createFromFormat('Y/m/d', $request->toDate)->endOfDay();
        $invoices = Invoice::with(['profile.user', 'deductions' => function ($q) {
          $q->select(DB::raw('SUM(amount) as total_deductions'), 'invoice_id')
            ->groupBy('invoice_id');
        }, 'profile'])
          ->whereHas('profile', function ($q) {
            $userId = auth()->user()->id;
            $q->where('user_id', $userId);
          })
          ->whereBetween('created_at', [$startDate, $endDate]) // filter by date range
          ->orderBy('id', 'desc')
          ->get();
        return response()->json([
          'success' => true,
          'data' => $invoices,
        ], 200);
      } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
      }
    }
  }
  public function userDeductionReport_load(Request $request)
  {
    // your other code here
    $userId = auth()->user()->id;
    $data = Invoice::with(['profile.user', 'deductions' => function ($q) {
      $q->select(DB::raw('SUM(amount) as total_deductions'), 'invoice_id')
        ->groupBy('invoice_id');
    }])
      ->whereHas('profile', function ($q) use ($userId) {
        $q->where('user_id', $userId);
      })
      ->orderBy('id', 'Desc')
      ->get();


    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ]);
    }
  }

  public function userDeductionReport_click(Request $request)
  {

    $rules = $request->validate([
      'fromDate' => 'required',
      'toDate' => 'required',
    ]);

    if (isset($request->fromDate) && isset($request->toDate)) {
      try {
        $startDate = Carbon::createFromFormat('Y/m/d', $request->fromDate)->startOfDay();
        $endDate = Carbon::createFromFormat('Y/m/d', $request->toDate)->endOfDay();
        $invoices = Invoice::with(['profile.user', 'deductions' => function ($q) {
          $q->select(DB::raw('SUM(amount) as total_deductions'), 'invoice_id')
            ->groupBy('invoice_id');
        }, 'profile'])
          ->whereHas('profile', function ($q) {
            $userId = auth()->user()->id;
            $q->where('user_id', $userId);
          })
          ->whereBetween('created_at', [$startDate, $endDate]) // filter by date range
          ->orderBy('id', 'desc')
          ->get();
        return response()->json([
          'success' => true,
          'data' => $invoices,
        ], 200);
      } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
      }
    }
  }

  public function userDeductionDetails(Request $request)
  {
    $invoice_id = $request->id;
    $data = Invoice::find($invoice_id)
      ->deductions()
      ->select('deductions.deduction_type_name', 'deductions.amount')
      ->get();
    // ->join('profile_deduction_types', 'profile_deduction_types.id', '=', 'deductions.profile_deduction_type_id')
    if ($data) {
      return response()->json([
        'success' => true,
        'data' => $data,
      ]);
    }
  }
}
