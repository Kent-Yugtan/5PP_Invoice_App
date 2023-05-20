@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">
        <div class="row" style="padding-top:10px">
            <div class="col-lg-8 col-xl-8 bottom10" style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white h-100">
                    <div class="card-body" id="mainCard">
                        <div style="padding:20px">
                            <div id="content">
                                {{-- <div class="row">
                                    <span id="userId" hidden></span>
                                    <span id="profileId" hidden></span>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6 fw-bolder">
                                                <div id="full_name" class="top10"></div>
                                                <div id="email" style="overflow-wrap: break-word"></div>
                                            </div>

                                            <div class="col-6 fw-bolder text-end">
                                                <div class="fs-3 fw-bold">INVOICE</div>
                                                <div class="text-muted" id="invoice_no"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="address"></div>
                                        <div id="city-province"></div>
                                        <div id="zip_code"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 pt-3">
                                        <div class="row">
                                            <div class="col">
                                                Bill To
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="fw-bold" id="invoice_title"></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label id="invoice_email"></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label id="bill_to_address"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 pt-3">
                                        <div class="row">
                                            <div class="col">
                                                Date
                                            </div>
                                            <div class="col text-end">
                                                <label id="date_created"></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                Due Date
                                            </div>
                                            <div class="col text-end">
                                                <label id="show_due_date"></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                Invoice Status
                                            </div>
                                            <div class="col text-end">
                                                <label id="invoice_status"></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col text-sm-start">
                                                <label id="text_date_received"></label>
                                            </div>
                                            <div class="col text-end">
                                                <label id="date_received"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="rounded-3 w-100" style="background-color: #d4d4d4;">
                                            <div class="row">
                                                <div class="col span1"
                                                    style="display:flex; justify-content:space-between;align-items:center;height:40px">
                                                    <label class="ms-2 fw-bold ">Balance Due:</label>
                                                    <div class="col-6 text-end span1">
                                                        <label class="me-2 fw-bold " id="balance_due"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="col-sm-12 table-responsive-sm">
                                        <table class="table" id="table_invoiceItems">
                                            <thead style="border-radius: 0.3rem; background-color: #3a3a3a; color: white;">
                                                <tr>
                                                    <th class=""
                                                        style="border-top-left-radius: 5px;border-bottom-left-radius: 5px;width:52%;border-right: 0px solid rgb(255,255,255);">
                                                        Description</th>
                                                    <th class=""
                                                        style="width:16%;border-right: 0px solid rgb(255,255,255);text-align: end;">
                                                        Quantity</th>
                                                    <th class=""
                                                        style="width:16%;border-right: 0px solid rgb(255,255,255);text-align: end;">
                                                        Rate
                                                    </th>
                                                    <th class=""
                                                        style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;width:16%;border-right: 0px solid rgb(255,255,255);text-align: end;">
                                                        Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody class="px-3">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12" id="quickInvoiceDescription"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-7">
                                                <label class="text-muted " style="text-align:right"> Subtotal: </label>
                                            </div>
                                            <div class="col-5 " id="sub_total" style="text-align:end"></div>
                                        </div>

                                        <div id="displayDiscountType">

                                        </div>

                                        <div class="row">
                                            <div class="col-7">
                                                <label class="text-muted"> Total:</label>
                                            </div>
                                            <div class="col-5 " id="total" style="text-align:end"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8">
                                                <label class="text-muted ">Converted Amount: P<label class="text-muted"
                                                        id="peso_rate"></label></label>
                                            </div>

                                            <div class="col-4" id="convertedAmount" style="text-align:end">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row title_deductions ">
                                </div>

                                <div class="deductions">
                                </div>

                                <div class="row total_deductions" id="total_deductions">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col">
                                        <label class="fw-bold">Grand Total: </label>
                                    </div>
                                    <div class="col" style="text-align:end">
                                        <label class="h6 fw-bold" id="grand_total_amount"></label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 ">Notes:</div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label style="word-wrap: break-word; text-align:right" id="notes"></label>
                                    </div>

                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-xl-4  h-50 bottom10" style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white ">
                    <div style="padding:20px">
                        <div class="card-body" style="padding-top:1rem;padding-bottom:1rem">
                            <div class="row bottom10">
                                <div class="col-12 w-100">
                                    <button type="button" id="back" class="btn  w-100"
                                        style="color: White; background-color: #CF8029;">Back</button>
                                </div>
                            </div>

                            {{-- <div class="row bottom10">
                                <div class="col-6" style="padding-right:5px;">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#activeModal"
                                        class="btn w-100" style="color: White; background-color: #CF8029;">Active</button>
                                </div>
                                <div class="col-6" style="padding-left:5px;">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#inactiveModal"
                                        class="btn w-100" style="color: White; background-color: #A4A6B3;">Inactive</button>
                                </div>
                            </div> --}}

                            <div class="row bottom10">
                                <div class="col-12 w-100">
                                    <button type="button" data-bs-toggle="modal" id="paid_button"
                                        data-bs-target="#paidModal" class="btn  w-100"
                                        style="color: White; background-color: #198754;">Paid
                                        Invoice</button>
                                </div>
                            </div>

                            <div class="row bottom10">
                                <div class="col-12 w-100">
                                    <button type="button" data-bs-toggle="modal" id="cancel_button"
                                        data-bs-target="#cancelModal" class="btn  w-100"
                                        style="color: White; background-color:#A4A6B3;">Cancel
                                        Invoice</button>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-12 w-100">
                                    <button type="button" id="delete_button" data-bs-toggle='modal'
                                        data-bs-target='#deleteModal' class="btn  w-100"
                                        style="color: White; background-color: #dc3545;">Delete
                                        Invoice</button>
                                </div>
                            </div> --}}

                            <div class="row" style="padding-top:2.5rem">
                                <div class="col-12 w-100 bottom10">
                                    <button type="button" id="pdfDownload" class="btn  w-100"
                                        style="color: White; background-color: #CF8029;">Download</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 w-100 ">
                                    <button type="button" id="edit_invoice" data-bs-toggle="modal"
                                        data-bs-target="#updateModal" class="btn w-100"
                                        style="color: White; background-color: #CF8029;">Edit
                                        Invoice</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="position:fixed;top:60px;right:20px;z-index:99999;justify-content:flex-end;display:flex;">
        <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div id="notifyIcon"></div>
                <div><strong class="mr-auto m-l-sm toast-title">Notification</strong></div>
                <div>
                    <button type="button" class="ml-2 mb-1 close float-end" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="toast-body">
                Hello, you can push notifications to your visitors with this toast feature.
            </div>
        </div>
    </div>

    <!-- Modal FOR Active Invoice -->
    <div class="modal fade" id="activeModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="top:30px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col">
                            <span>
                                <img class="" src="{{ URL('images/Info.png') }}" style="width: 50%; padding:10px" />
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span>
                                <h3> Are you sure?</h3>
                            </span>
                        </div>
                    </div>
                    <div class="row pt-3 px-3">
                        <div class="col">
                            <span id="invoice_id"></span>
                            <span class="text-muted"> Do you really want to set this invoice Active?</span>
                        </div>
                    </div>
                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn w-100" style="color:white; background-color:#A4A6B3; "
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="active_button" class="btn  w-100"
                                style="color:white;background-color: #CF8029;">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal FOR Inactive Invoice -->
    <div class="modal fade" id="inactiveModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="top:30px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col">
                            <span>
                                <img class="" src="{{ URL('images/Info.png') }}"
                                    style="width: 50%; padding:10px" />
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span>
                                <h3> Are you sure?</h3>
                            </span>
                        </div>
                    </div>
                    <div class="row pt-3 px-3">
                        <div class="col">
                            <span id="invoice_id"></span>
                            <span class="text-muted"> Do you really want to set this invoice Inactive?</span>
                        </div>
                    </div>
                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn w-100" style="color:white; background-color:#A4A6B3; "
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="inactive_button" class="btn  w-100"
                                style="color:white;background-color: #CF8029;">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal FOR Paid Invoice -->
    <div class="modal fade" id="paidModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="top:30px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col">
                            <span>
                                <img class="" src="{{ URL('images/Info.png') }}"
                                    style="width: 50%; padding:10px" />
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span>
                                <h3> Are you sure?</h3>
                            </span>
                        </div>
                    </div>
                    <div class="row pt-3 px-3">
                        <div class="col">
                            <span id="invoice_id"></span>
                            <span class="text-muted"> Do you really want to paid this invoice? This process cannot be
                                undone.</span>
                        </div>
                    </div>
                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn  w-100" style="color:white; background-color:#A4A6B3; "
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="confirm_paid_button" class="btn  w-100"
                                style="color:white;background-color: #CF8029;">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal FOR Cancel Invoice -->
    <div class="modal fade" id="cancelModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="top:30px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col">
                            <span>
                                <img class="" src="{{ URL('images/Info.png') }}"
                                    style="width: 50%; padding:10px" />
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span>
                                <h3> Are you sure?</h3>
                            </span>
                        </div>
                    </div>
                    <div class="row pt-3 px-3">
                        <div class="col">
                            <span id="invoice_id"></span>
                            <span class="text-muted"> Do you really want to cancel this invoice? This process cannot be
                                undone.</span>
                        </div>
                    </div>
                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn  w-100" style="color:white; background-color:#A4A6B3; "
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="cancelled_button" class="btn  w-100"
                                style="color:white;background-color: #CF8029;">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal FOR DELETE INVOICE -->
    <div class="modal fade" id="deleteModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="top:30px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col">
                            <span>
                                <img class="" src="{{ URL('images/Delete.png') }}"
                                    style="width: 50%; padding:10px" />
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span>
                                <h3> Are you sure?</h3>
                            </span>
                        </div>
                    </div>
                    <div class="row pt-3 px-3">
                        <div class="col">
                            <span id="profilededuction_id"></span>
                            <span class="text-muted"> Do you really want to delete this record? This process cannot be
                                undone.</span>
                        </div>
                    </div>

                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn  w-100" style="color:white; background-color:#A4A6B3; "
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="invoice_delete" class="btn btn-danger w-100">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL FOR EDIT INVOICE -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="hide-content">
                <div class="modal-body">
                    <div class="row whole_row">
                        <form id="submit_update_invoice" class="g-3 needs-validation" novalidate>
                            @csrf
                            <div class="row" id="header">
                                <div class="col-md-6 w-100 bottom10" style="padding-right:5px;padding-left:5px;">
                                    <div class="card-border shadow bg-white h-100" style="padding:20px">
                                        <div class="card-body">
                                            <div class="row" id="header">
                                                <input type="text" id="update_invoice_id" hidden>

                                                <div class="row">
                                                    <div class="col-sm-12 bottom20">
                                                        <span class="fs-3 fw-bold">Edit Invoice</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group-profile">
                                                                <label for="due_date" style="color:#A4A6B3">Due
                                                                    Date</label>
                                                                <input type="text" id="due_date" name="due_date"
                                                                    class="datepicker_input form-control"
                                                                    placeholder="Due Date" required autocomplete="off">
                                                                <div class="invalid-feedback">This field is required.
                                                                </div>
                                                            </div>
                                                            <!-- <input id="due_date" name="due_date" type="date" class="form-control"> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group-profile">
                                                                <label for="invoice_description"
                                                                    style="color:#A4A6B3">Description</label>
                                                                <input id="invoice_description" name="invoice_description"
                                                                    type="text" class="form-control" required>
                                                                <div class="invalid-feedback">This field is required.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 " id="show_items">
                                                    <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                                                </div>

                                                <div class="col-12 bottom20">
                                                    <div class="row justify-content-end">
                                                        <div class="col-sm-4">
                                                            <button class="btn "
                                                                style="width:100%;color:white; background-color: #CF8029;"
                                                                id="add_item">Add
                                                                Item</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <div class="col-lg-4 bottom20"
                                                            style="display: flex;align-items: start;">
                                                            <div>
                                                                <label class="formGroupExampleInput2"
                                                                    style="color:#A4A6B3">Discount
                                                                    Type</label>
                                                                <br>
                                                                <input class="form-check-input" type="radio"
                                                                    name="discount_type" id="discount_type"
                                                                    value="Fixed">
                                                                <label class="formGroupExampleInput2">
                                                                    Fixed &nbsp; &nbsp;
                                                                </label>
                                                                <input class="discount_type form-check-input"
                                                                    type="radio" name="discount_type"
                                                                    id="discount_type" value="Percentage">
                                                                <label class="formGroupExampleInput2">
                                                                    Percentage
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 bottom20">
                                                            <label for="discount_amount" class="label_discount_amount"
                                                                style="color:#A4A6B3">Discount
                                                                Amount ($)</label>
                                                            <input type="text" step="any"
                                                                style="text-align:right;" name="discount_amount"
                                                                id="discount_amount" maxlength="6"
                                                                class="form-control" />
                                                        </div>

                                                        <div class="col-lg-4 bottom20">
                                                            <label for="discount_total" class="label_discount_total"
                                                                style="color:#A4A6B3">Discount
                                                                Total ($)</label>
                                                            <input type="text" disabled
                                                                style="text-align:right; border:0px;background-color:white;"
                                                                onkeypress="return onlyNumberKey(event)"
                                                                name="discount_total" id="discount_total"
                                                                class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 d-flex justify-content-end w-100">
                                                            <div class="topBottom20" style="width: 290px !important;">
                                                                <div class="input-group">
                                                                    <label class="d-flex align-items-center"
                                                                        for="subtotal" style="color:#A4A6B3">Subtotal
                                                                        ($):
                                                                    </label>
                                                                    <input type="text"
                                                                        style="font-weight: bold; text-align:right;border:none;background-color:white "
                                                                        name="subtotal" id="subtotal"
                                                                        class="form-control subtotal" readonly>
                                                                    <div class="invalid-feedback"
                                                                        style="padding-left: 85px;
                                                                ">
                                                                        This field is required.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- AMOUNT COVERTION DISPLAY - NONE --}}
                                                <div class="col-12 bottom20 d-none">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <div>
                                                                <label for="dollar_amount" style="color:#A4A6B3">Dollar
                                                                    Amount
                                                                    ($)</label>
                                                                <input type="text" id="dollar_amount"
                                                                    style="font-weight: bold;border:none; text-align:left;background-color:white"
                                                                    class="form-control dollar_amount" disabled />

                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div>
                                                                <label for="peso_rate" style="color:#A4A6B3">Peso Rate
                                                                    (Php)</label>
                                                                <input type="text"
                                                                    style="font-weight: bold;border:none; text-align:left;background-color:white"
                                                                    onkeypress="return onlyNumberKey(event)"
                                                                    id="edit_peso_rate" class="form-control" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div>
                                                                <label for="converted_amount"
                                                                    style="color:#A4A6B3">Converted
                                                                    Amount (Php)</label>
                                                                <input type="text"
                                                                    style="font-weight: bold;border:none; text-align:left;background-color:white"
                                                                    onkeypress="return onlyNumberKey(event)"
                                                                    id="converted_amount" class="form-control" disabled />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 bottom20">
                                                    <div class="row">
                                                        <div class="col">
                                                            <span class="fs-3 fw-bold">Deductions</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12" id="show_deduction_items"></div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <div class="input-group" style="width: 290px">
                                                                <label class="d-flex align-items-center fw-bold"
                                                                    for="update_grand_subTotal">Grand Total($):</label>
                                                                <input type="text" id="update_grand_subTotal"
                                                                    class="form-control fw-bold"
                                                                    style="text-align:right;border:0;background-color:white;"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- DONT DELETE JUST HIDE KAY MAG ERROR --}}
                                                    <input type="text" id="grand_total" class="form-control fw-bold"
                                                        style="text-align:right;border:0;background-color:white;" disabled
                                                        hidden>

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 bottom20">
                                                                <label for="floatingTextarea"
                                                                    style="color:#A4A6B3">Notes</label>
                                                                <textarea class="form-control" placeholder="Leave a notes here" id="notes" name="notes"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-6 bottom20">
                                                            <button type="button" id="UpdateModalClose"
                                                                class="btn w-100"
                                                                style="color:#CF8029; background-color:#f3f3f3; "
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        <div class="col-6 bottom20">
                                                            <button type="submit" id="update" class="btn w-100"
                                                                style="color:White; background-color:#CF8029;">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spanner" style="display: flex;align-items: center;justify-content: center;position: fixed;">
        <div class="loader"></div>
    </div>



    <script type="text/javascript">
        let total_deduction_amount = 0
        let x = 0;
        let invoiceNumber = "";

        const PHP = value => currency(value, {
            symbol: '',
            decimal: '.',
            separator: ','
        });

        //  For creating invoice codes
        const api = "https://api.exchangerate-api.com/v4/latest/USD";

        function tableLoader() {
            var originalText = $('#content').html();
            $('#content').html(
                `<div id="contentSpinner">
                <span id="button-spinner" style="color:#CF8029;width:150px;height:150px" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                `
            );
            $('#content').addClass('d-flex');
            $('#content').addClass('justify-content-center');
            $('#content').css('padding', '52px');
            $('#contentSpinner').css('width', '150px');
            $('#contentSpinner').css('height', '150px');
            setTimeout(function() {
                $('#content').removeClass('d-flex');
                $('#content').removeClass('justify-content-center');
                $('#content').css('padding', '0px');
                $('#contentSpinner').css('width', '0px');
                $('#contentSpinner').css('height', '0px');
                $('#content').html(originalText);
            }, 1500);
        }


        $(document).ready(function() {
            tableLoader();
            var windowWidth = $(window).width();
            if (windowWidth <= 320) {
                $('.span1 label').removeClass('fs-5');
            } else {
                $('.span1 label').addClass('fs-5');
            }

            $(window).resize(function() {
                var windowWidth = $(window).width();
                if (windowWidth <= 320) {
                    $('.span1 label').removeClass('fs-5');
                } else {
                    $('.span1 label').addClass('fs-5');
                }
            })


            $("div.spanner").addClass("show");
            setTimeout(function() {
                $("div.spanner").removeClass("show");
                show_invoice();
                show_invoice_config();
            }, 1500)

            $('#due_date').each(function() {
                const datepicker = new Datepicker(this, {
                    'format': 'yyyy/mm/dd',
                });
                $(this).on('changeDate', function() {
                    datepicker.hide();
                });
            });

            var currentPage = apiUrl + "/user/currentActiveInvoice";
            $('#collapseLayouts2 a').each(function() {
                // Compare the href attribute of the link to the current page URL
                if (currentPage.indexOf($(this).attr('href')) !== -1) {
                    // If there is a match, add the "active" class to the link
                    $(this).addClass('active');

                    // Trigger a click event on the parent link to expand the collapsed section
                    $(this).parent().parent().addClass("show");
                    $(this).parent().parent().addClass("active");
                    $('[data-bs-target="#collapseLayouts2"]').addClass('active');
                }
            });

            let toast1 = $('.toast1');
            toast1.toast({
                delay: 1400,
                animation: true,
            });

            $('#back').on('click', function(e) {
                e.preventDefault();
                let userid = $('#userId').val();
                let profileId = $('#profileId').val();
                // console.log(userid + " " + profileId);
                window.location.href = apiUrl + "/user/currentActiveInvoice";
            })

            $('.close').on('click', function(e) {
                e.preventDefault();
                toast1.toast('hide');
            })
            $("#error_msg").hide();
            $("#success_msg").hide();

            $('#discount_amount').on('keyup', function() {
                subtotal();
            })

            // // CHECK IF THE USER HAVE THE PROFILE
            $("#UpdateModalClose").on('click', function(e) {
                e.preventDefault();
                location.reload(true); // refresh the page
            });


            // ONLY NUMBERS FOR NUMBER INPUTS
            function onlyNumberKey(evt) {
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }

            // FUNCTION FOR KEYUP CLASS MULTI INPUTS FOR ADD ITEMS
            $('#show_items').on("keyup", ".multi", function() {
                let sub_total = 0;
                let parent = $(this).closest('.row');
                let quantity = parent.find('.quantity').val().replaceAll(',', '');
                let rate = parent.find('.rate').val().replaceAll(',', '');
                let newQuantity = quantity.replace(/[^\d.]/g, '');
                let newRate = rate.replace(/[^\d.]/g, '');

                sub_total = parseFloat(newQuantity * newRate);
                parent.find('.amount').val(PHP(sub_total).format());
                // getResults_Converted();
                Additems_total();
                subtotal();

            });

            $('#show_items').focusout(".multi", function() {
                let invoiceItems_sum = 0;
                $('#show_items .row1').each(function() {
                    let parent = $(this).closest('.row1');
                    let quantity = parent.find('.quantity').val();
                    let rate = parent.find('.rate').val();
                    let amount = parent.find('.amount').val();

                    // Have Decimals
                    // parent.find('.quantity').val(PHP(quantity).format());
                    // Remove Decimals
                    parent.find('.quantity').val(quantity ? quantity : "0");
                    parent.find('.rate').val(PHP(rate).format());
                    parent.find('.amount').val(PHP(amount).format());
                })
                DeductionItems_total();
            })


            $('#discount_amount').focusout(function() {
                if ($('#discount_amount').val() == "") {
                    $('#discount_amount').val('0.00');
                } else {
                    let discount_type = $("input[id='discount_type']:checked").val();
                    if (discount_type == 'Percentage') {
                        let discount_amount = $('#discount_amount').val();
                        let newDiscount_amount = discount_amount.replace(/[^\d.]/g,
                            ''); // Remove non-numeric characters
                        $('#discount_amount').val(newDiscount_amount);
                    } else {
                        let discount_amount = $('#discount_amount').val();
                        $('#discount_amount').val(PHP(discount_amount).format());
                    }
                }
                DeductionItems_total();
            })

            // FUNCTION FOR KEYUP CLASS DEDUCTIONS FOR DEDUCTIONS
            $('#show_deduction_items').on("keyup", ".multi2", function() {
                DeductionItems_total();
            });

            $('#show_deduction_items').focusout('.multi2', function() {
                let deduction_sum = 0;
                $('#show_deduction_items .deduction_amount').each(function() {
                    let parent = $(this).closest('.row');
                    let deduction_amount = parent.find('.deduction_amount').val();
                    parent.find('.deduction_amount').val(PHP(deduction_amount)
                        .format());
                })
            })

            // DISPLAY CONVERTED AMOUTN FROM DATABASE
            function displayResults() {
                let converted_amount = 0;
                let dollar_amount = $("#dollar_amount").val().replaceAll(',', '');
                let peso_rate = $('#edit_peso_rate').val().replaceAll(',', '');
                converted_amount = parseFloat(dollar_amount * peso_rate);
                $('#converted_amount').val(PHP(parseFloat(converted_amount)).format());
            }

            $("#discount_amount").addClass('d-none');
            $("#discount_total").addClass('d-none');
            $(".label_discount_amount").addClass('d-none');
            $(".label_discount_total").addClass('d-none');
            $('input[type=radio][id=discount_type]').change(function() {

                if (subtotal == 0) {
                    $("#discount_amount").addClass('d-none');
                    $("#discount_total").addClass('d-none');
                    $(".label_discount_amount").addClass('d-none');
                    $(".label_discount_total").addClass('d-none');
                } else {
                    if (this.value == 'Fixed') {
                        //write your logic here
                        // console.log("FIXED");
                        $("#discount_amount").removeClass('d-none');
                        $("#discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');

                        $('#discount_amount').val('0.00');

                    } else if (this.value == 'Percentage') {
                        //write your logic here
                        // console.log("PERCENTAGE");
                        $("#discount_amount").removeClass('d-none');
                        $("#discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');

                        $('#discount_amount').val('0.00');
                        $('#discount_total').val('0.00');
                    }
                }
                subtotal();
                Additems_total();
            })


            // FUNCTION FOR CALCUTAION DEDUCTIONS
            function DeductionItems_total() {
                var deduction_sum = 0;
                let converted_amount = 0;
                let dollar_amount = 0;
                let converted_amount_input = 0;
                let peso_rate = 0;
                let grand_total = 0;

                $('#show_deduction_items .deduction_amount').each(function() {
                    deduction_sum += Number($(this).val().replace(/[^\d.]/g, ''));
                })

                $('#show_items .amount').each(function() {
                    converted_amount += Number($(this).val().replace(/[^\d.]/g, ''));
                });

                peso_rate = $('#edit_peso_rate').val().replaceAll(',', '') ? $('#edit_peso_rate').val()
                    .replaceAll(
                        ',', '') :
                    0;
                dollar_amount = $('#dollar_amount').val().replaceAll(',', '') ? $('#dollar_amount')
                    .val()
                    .replaceAll(',', '') : 0;
                converted_amount_input = parseFloat(dollar_amount * peso_rate);
                grand_total =
                    parseFloat(converted_amount_input - deduction_sum);
                $('#grand_total').val(PHP(grand_total).format());
                // console.log("grand_total", grand_total);
            }

            // SUBTOTAL CALCULATIONS
            function subtotal() {
                let discount_type = $("input[id='discount_type']:checked").val();
                let discount_amount = $('#discount_amount').val();
                let newDiscount_amount = discount_amount.replace(/[^\d.]/g, ''); // Remove non-numeric characters
                let discount_total = $('#discount_total').val();
                let subtotal = $('#subtotal').val();
                var sum = 0;

                $('#show_items .amount').each(function() {
                    sum += Number($(this).val().replace(/[^\d.]/g, ''));
                });

                if (discount_type == 'Fixed') {
                    $('#discount_total').val(PHP(parseFloat(newDiscount_amount * 1) ? parseFloat(
                            newDiscount_amount * 1) : 0)
                        .format());

                    let sub_total = (sum - $('#discount_total').val().replace(/[^\d.]/g, ''));
                    $('#subtotal').val(PHP(sub_total).format());
                    $('#update_grand_subTotal').val(PHP(sub_total).format());
                    let dollar_amount = $('#subtotal').val();
                    $('#dollar_amount').val(PHP(dollar_amount).format());
                    DeductionItems_total()

                } else if (discount_type == 'Percentage') {

                    let percentage = parseFloat(((newDiscount_amount ? newDiscount_amount : 0) / 100) * sum);
                    $('#discount_total').val(PHP(percentage).format());
                    let sub_total = (parseFloat(sum) - parseFloat(percentage));
                    $('#subtotal').val(PHP(sub_total).format());
                    $('#update_grand_subTotal').val(PHP(sub_total).format());
                    $('#dollar_amount').val(PHP(sub_total).format());
                    DeductionItems_total()
                }
                // getResults_Converted();
                displayResults();
            }

            // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
            function Additems_total() {
                var sum = 0;
                let converted_amount = 0;
                $('#show_items .amount').each(function() {
                    sum += Number($(this).val().replace(/[^\d.]/g, ''));
                });


                $('#subtotal').val(PHP(parseFloat(sum)).format());
                $('#update_grand_subTotal').val(PHP(parseFloat(sum)).format());
                $('#dollar_amount').val(PHP(parseFloat(sum)).format());

            }

            // JQUERY CONFIRM FOR REMOVING INVOICE ITEMS ON INVOICE
            $(document).on('click', '.remove_items_button', function(e) {
                e.preventDefault();
                let parent = $(this).closest('.row');
                let invoiceItems_id = parent.find('.item_id').val();
                let amount = parent.find('.amount').val();
                let row_item = $(this).parent().parent().parent();
                // $('#updateModal').addClass('d-none');
                if (row_item) {
                    let remove_row = $(this).parent().parent();
                    $('input').prop('disabled', true);
                    $.confirm({
                        columnClass: 'col-sm-4',
                        icon: 'fa fa-warning',
                        draggable: false,
                        title: 'Are you sure?',
                        content: '<div class="row"><div class="col text-center"><img class="" src="{{ asset('images/Delete.png') }}" style="width: 50%; padding:10px" /></div></div><div class="row"><div class="col text-center"><label>Do you really want to delete this record? This process cannot be undone.<label></div></div>',
                        //autoClose: 'Cancel|5000',
                        buttons: {
                            removeItems: {
                                btnClass: 'btn btn-danger',
                                text: 'Confirm',
                                action: function() {
                                    $(remove_row).remove();
                                    displayResults();
                                    Additems_total();
                                    subtotal();
                                    DeductionItems_total();
                                }
                            },
                            Cancel: function() {}
                        },
                        onClose: function() {
                            // before the modal is hidden.
                            $('#updateModal').removeClass('d-none');
                            $('input').prop('disabled', false);
                        },
                    });
                }

            });

            // JQUERY CONFIRM FOR REMOVING DEDUCTIONS ON INVOICE
            $(document).on('click', '.remove_deductions', function(e) {
                e.preventDefault();
                let parent = $(this).closest('.row');
                let profileDeduction_id = parent.find('.deduction_id').val();
                let row_item = $(this).parent().parent().parent();
                console.log("profileDeduction_id", profileDeduction_id);
                // $('#updateModal').addClass('d-none');
                if (row_item) {
                    $.confirm({
                        columnClass: 'col-sm-4',
                        icon: 'fa fa-warning',
                        draggable: false,
                        title: 'Are you sure?',
                        content: '<div class="row"><div class="col text-center"><img class="" src="{{ asset('images/Delete.png') }}" style="width: 50%; padding:10px" /></div></div><div class="row"><div class="col text-center"><label>Do you really want to delete this record? This process cannot be undone.<label></div></div>',
                        //autoClose: 'Cancel|5000',
                        buttons: {
                            removeDeductions: {
                                btnClass: 'btn btn-danger',
                                text: 'Confirm',
                                action: function() {
                                    $(row_item).remove();
                                    Additems_total();
                                    subtotal();
                                    DeductionItems_total();
                                }
                            },
                            Cancel: function() {}
                        },
                        onClose: function() {
                            // before the modal is hidden.
                            $('#updateModal').removeClass('d-none');
                        },
                    });
                }
            });

            // CHECK IF THE USER HAVE THE PROFILE
            $("#updateModal").on('hide.bs.modal', function() {
                $("div.spanner").removeClass("show");
                $('#invoice_items').trigger('reset'); // reset the form
                $('#show_deduction_items').empty();
                $('textarea').val('');
                $('#show_items').empty();
                $('#show_deduction_items').empty();
                if ($('#show_items > .row').length > 1) {
                    $('#show_items').empty();
                    display_item_rows();
                }
            });

            // BUTTON for ADD ITEMS ROWS
            $("#add_item").click(function(e) {
                e.preventDefault();
                // BUTTON SPINNER
                var originalText = $('#add_item').html();
                $('#add_item').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                setTimeout(function() {
                    $('#add_item').html(originalText);
                    display_item_rows()
                }, 500);
            });

            // INITIALIZE DISPLAY ITEM ROWS
            function display_item_rows() {
                let max_fields = 5;
                if (x < max_fields) {
                    let wrapper = $('#show_items');
                    add_rows = '';
                    add_rows += '<div class="row row1">';
                    add_rows += '<div class="col-lg-4 ">';
                    add_rows += '<div class="form-group-profile">';
                    // add_rows += '<div class="form-floating form-group">';
                    add_rows += '<label for="item_description" style="color:#A4A6B3">Item Desctiption</label>';
                    add_rows +=
                        '<input type="text" name="item_description" placeholder="Item Description" id="item_description" class="form-control item_description multi" required/>';
                    // add_rows += '</div>';
                    add_rows += '<div class="invalid-feedback">This field is required.</div>';
                    add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows += '<div class="col-lg-2">';
                    // add_rows += '<div class="form-floating form-group">';
                    add_rows += '<div class="form-group-profile">';
                    add_rows += '<label for="quantity" style="color:#A4A6B3">Quantity</label>';
                    add_rows +=
                        '<input type="text" step="any" maxlength="4" placeholder="Quantity" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity"  />';
                    // add_rows += '</div>';
                    add_rows += '<div class="invalid-feedback">This field is required.</div>';
                    add_rows += '</div>';
                    add_rows += ' </div>';

                    add_rows += '<div class="col-lg-3">';
                    add_rows += '<div class="form-group-profile">';
                    // add_rows += '<div class="form-floating form-group">';
                    add_rows += '<label for="rate" style="color:#A4A6B3">Rate</label>';
                    add_rows +=
                        '<input type="text" step="any" name="rate" placeholder="Rate" id="rate" style="text-align:right;" class="form-control multi rate" maxlength="6" />';
                    // add_rows += '</div>';
                    add_rows += '<div class="invalid-feedback">This field is required.</div>';
                    add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows += '<div class="col-lg-2 bottom20">';
                    // add_rows += '<div class="form-floating form-group">';
                    // style="text-align:right;border:none;background-color:white"
                    add_rows += '<label for="amount" style="color:#A4A6B3">Amount</label>';
                    add_rows +=
                        '<input type="text" style="text-align:right;border:none;background-color:white" readonly name="amount" id="amount" class="form-control amount" />';
                    // add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows +=
                        '<div class="col-lg-1 d-flex justify-content-center align-items-center topbottom20 col-remove-item">';
                    // add_rows += '<div class="d-none" >';
                    // add_rows += '<label></label>';
                    add_rows +=
                        '<button class="btn remove_items_button"><i class="fa fa-trash" style="color:#dc3545"></i></button>';
                    add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows += '</div>'
                    $(wrapper).append(add_rows);

                    // if ($('#show_items > .row').length > 1) {
                    //     $('#show_items > .row').each(function() {
                    //         $(this).find('.col-remove-item').removeClass('d-none');
                    //     })
                    //     console.log(">1")
                    // } else {
                    //     $('#show_items > .row').find('.col-remove-item').removeClass('d-none').addClass(
                    //         'd-none');
                    //     console.log("<1")
                    // }
                    x++;
                }
            }

            $(document).on('click', '#edit_invoice', function(e) {
                e.preventDefault();
                let url = window.location.pathname;
                let urlSplit = url.split('/');
                if (urlSplit.length == 4) {
                    let invoice_id = urlSplit[3]
                    $('#update_invoice_id').val(invoice_id)

                    axios.get(apiUrl + '/api/admin/editInvoice/' + invoice_id, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                        let data = response.data
                        if (data.success) {
                            console.log("SUCCESSSUCCESS", data);

                            // $('#update_profile_id').val(data.data.profile_id);
                            $('#due_date').val(data.data.due_date);
                            $('#invoice_description').val(data.data.description);
                            $('#edit_peso_rate').val(PHP(data.data.peso_rate).format());
                            // $('#edit_converted_amount').val(PHP(data.data.converted_amount).format());
                            // Get the text from the database
                            var text = data.data.notes;
                            // Perform null check before replacing
                            if (text !== null && text !== undefined) {
                                // Replace <br> tags with newline characters
                                text = text.replace(/<br>/g, "\n");
                            }
                            $('textarea#notes').val(text ? text : "");

                            $("#discount_amount").addClass('d-none');
                            $("#discount_total").addClass('d-none');
                            $(".label_discount_amount").addClass('d-none');
                            $(".label_discount_total").addClass('d-none');

                            if (data.data.discount_type) {
                                $('#discount_amount').val(data.data.discount_amount);
                                $('#discount_total').val(data.data.discount_total);
                                if (data.data.discount_type === 'Fixed') {
                                    $("#discount_amount").removeClass('d-none');
                                    $("#discount_total").removeClass('d-none');
                                    $(".label_discount_amount").removeClass('d-none');
                                    $(".label_discount_total").removeClass('d-none');
                                    $("input[id=discount_type][value=" + data.data.discount_type +
                                            "]")
                                        .attr('checked', true)
                                } else {
                                    $("#discount_amount").removeClass('d-none');
                                    $("#discount_total").removeClass('d-none');
                                    $(".label_discount_amount").removeClass('d-none');
                                    $(".label_discount_total").removeClass('d-none');
                                    $("input[id=discount_type][value=" + data.data.discount_type +
                                            "]")
                                        .attr('checked', true)
                                }
                            }

                            if (data.data.invoice_items.length > 0) {
                                data.data.invoice_items.map((item) => {
                                    let wrapper = $('#show_items');
                                    add_rows = '';
                                    add_rows += '<div class="row row1">';
                                    add_rows += '<div class="col-md-4">';
                                    add_rows += '<div class="form-group-profile">';
                                    // add_rows += '<div class="form-floating form-group">';

                                    add_rows +=
                                        '<input type="text" value="' + item.id +
                                        '" name="item_id" id="item_id" class="form-control item_id" hidden />';

                                    if (item.item_description) {
                                        add_rows +=
                                            '<label for="item_description" style="color:#A4A6B3">Item Desctiption</label>';
                                        add_rows += '<input type="text" value="' + item
                                            .item_description +
                                            '" name="item_description" id="item_description" class="form-control item_description" required/>';
                                        add_rows +=
                                            '<div class="invalid-feedback">This field is required.</div>';
                                    } else {
                                        add_rows +=
                                            '<label for="item_description" style="color:#A4A6B3">Item Desctiption</label>';
                                        add_rows +=
                                            '<input type="text" value="N/A" name="item_description" id="item_description" class="form-control item_description" required/>';
                                        add_rows +=
                                            '<div class="invalid-feedback">This field is required.</div>';
                                    }
                                    add_rows += '</div>';
                                    add_rows += '</div>';

                                    add_rows += '<div class="col-md-2 bottom20">';
                                    // add_rows += '<div class="form-floating form-group">';

                                    add_rows +=
                                        '<label for="quantity" style="color:#A4A6B3">Quantity</label>';
                                    add_rows +=
                                        '<input type="text" value=' + PHP(item.quantity)
                                        .format() +
                                        ' step="any" maxlength="4" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
                                    // add_rows += '</div>';
                                    add_rows += ' </div>';

                                    add_rows += '<div class="col-md-3 bottom20">';
                                    // add_rows += '<div class="form-floating form-group">';
                                    add_rows +=
                                        '<label for="rate" style="color:#A4A6B3">Rate</label>';
                                    add_rows +=
                                        '<input type="text" value=' + PHP(item.rate)
                                        .format() +
                                        ' step="any" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
                                    // add_rows += '</div>';
                                    add_rows += '</div>';

                                    add_rows += '<div class="col-md-2 bottom20">';
                                    // add_rows += '<div class="form-floating form-group">';
                                    add_rows +=
                                        '<label for="amount" style="color:#A4A6B3">Amount</label>';
                                    add_rows +=
                                        '<input type="text" value=' + PHP(item
                                            .total_amount)
                                        .format() +
                                        ' style="text-align:right;border:none;background-color:white" disabled name="amount" id="amount" multi class="form-control amount" />';
                                    // add_rows += '</div>';
                                    add_rows += '</div>';

                                    add_rows +=
                                        '<div class="col-md-1 d-flex justify-content-center align-items-center col-remove-item">';
                                    // add_rows += '<div class="form-group">';
                                    add_rows +=
                                        '<button class="btn remove_items_button " ><i class="fa fa-trash" style="color:#dc3545"></i></button>';
                                    // add_rows += '</div>';
                                    add_rows += '</div>';
                                    add_rows += '</div>';

                                    add_rows += '</div>';

                                    $(wrapper).append(add_rows);
                                    return '';
                                    // if ($('#show_items > .row1').length > 1) {
                                    //     $('#show_items > .row1').each(function() {
                                    //         $(this).find('.remove_items_button')
                                    //             .removeClass('d-none');
                                    //     })
                                    // } else {
                                    //     $('#show_items > .row1').find(
                                    //             '.remove_items_button')
                                    //         .removeClass('d-none').addClass(
                                    //             'd-none');
                                    // }

                                })
                                x = data.data.invoice_items.length;
                                console.log("X", x)
                            }

                            if (data.data.deductions.length > 0) {
                                data.data.deductions.map((item2) => {
                                    let wrapper = $('#show_deduction_items');
                                    add_rows = '';
                                    add_rows += '<div class="row ">';
                                    add_rows += '<div class="col-sm-6 bottom20">';
                                    add_rows += '<div class=" w-100">';
                                    add_rows +=
                                        '<input type="text" value=' + item2.id +
                                        ' id="deduction_id" name="deduction_id" class="form-control deduction_id" hidden >'

                                    // add_rows +=
                                    //   '<select class="form-control profile_deduction_type" id="profile_deduction_type" name="profile_deduction_type">';
                                    // add_rows += '<option value=' + item2.id +
                                    //   '>' + item2
                                    //   .deduction_type_name + '</option> ';
                                    // add_rows += '</select>';
                                    add_rows +=
                                        '<label for="deduction_type_name" style="color:#A4A6B3">Deduction Type</label>';
                                    add_rows +=
                                        '<input type="text" class="form-control deduction_type_name" name="deduction_type_name" id="deduction_type_name" value="' +
                                        item2.deduction_type_name + '" readonly>'
                                    add_rows += '</div>';
                                    add_rows += '</div>';

                                    add_rows += '<div class="col-sm-5">';
                                    add_rows += '<div class=" ">';
                                    add_rows +=
                                        '<label for="deduction_amount" style="color:#A4A6B3">Deduction Amount (Php)</label>';
                                    add_rows +=
                                        '<input type="text" value="' + PHP(item2.amount)
                                        .format() +
                                        '" style="text-align:right;" id="deduction_amount" name="deduction_amount" class="form-control multi2 deduction_amount" maxlength="6" />';
                                    add_rows += '</div>';
                                    add_rows += '</div>';

                                    add_rows +=
                                        '<div class="col-sm-1 col-remove-deductions d-flex justify-content-center align-items-center">';
                                    add_rows += '<div class="">';
                                    add_rows +=
                                        '<button type="button" class="btn remove_deductions" style="display: flex;justify-content: center;"><i class="fa fa-trash pe-1" style="color:#dc3545"></i></button>';
                                    add_rows += '</div>';
                                    add_rows += '</div>';

                                    add_rows += '</div>';

                                    $(wrapper).append(add_rows);
                                    return '';
                                    // console.log("asdas", item2.profile_deduction_types);
                                })
                            }
                            // getResults_Converted();       
                            $('#grand_total').val(PHP(data.data.grand_total_amount).format());
                            displayResults();
                            Additems_total();
                            subtotal();
                            DeductionItems_total();
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
                    })
                }

            })

            function show_invoice() {
                let url = window.location.pathname;
                let urlSplit = url.split('/');
                if (urlSplit.length == 4) {
                    let invoice_id = urlSplit[3];
                    // console.log("invoice_id", invoice_id);
                    axios
                        .get(apiUrl + '/api/admin/editInvoice/' + invoice_id, {
                            headers: {
                                Authorization: token,
                            },
                        }).then(function(response) {
                            let data = response.data;
                            if (data.success) {
                                console.log("DATA123", data);
                                $('#content').append(` 
                                <input type="text" id="user_id" hidden>
                                <input type="text" id="profileId" hidden>
                                <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 fw-bolder">
                                            <div id="full_name" class="top10"></div>
                                            <div id="email" style="overflow-wrap: break-word"></div>
                                        </div>

                                        <div class="col-6 fw-bolder text-end">
                                            <div class="fs-3 fw-bold">INVOICE</div>
                                            <div class="text-muted" id="invoice_no"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div id="address"></div>
                                    <div id="city-province"></div>
                                    <div id="zip_code"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 pt-3">
                                    <div class="row">
                                        <div class="col">
                                            Bill To
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="fw-bold" id="invoice_title"></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label id="invoice_email"></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label id="bill_to_address"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 pt-3">
                                    <div class="row">
                                        <div class="col">
                                            Date
                                        </div>
                                        <div class="col text-end">
                                            <label id="date_created"></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            Due Date
                                        </div>
                                        <div class="col text-end">
                                            <label id="show_due_date"></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            Invoice Status
                                        </div>
                                        <div class="col text-end">
                                            <label id="invoice_status"></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-sm-start">
                                            <label id="text_date_received"></label>
                                        </div>
                                        <div class="col text-end">
                                            <label id="date_received"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-6 col-sm-12"></div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="rounded-3 w-100" style="background-color: #d4d4d4;">
                                        <div class="row">
                                            <div class="col span1"
                                                style="display:flex; justify-content:space-between;align-items:center;height:40px">
                                                <label class="ms-2 fw-bold ">Balance Due:</label>
                                                <div class="col-6 text-end span1">
                                                    <label class="me-2 fw-bold " id="balance_due"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row pt-3">
                                <div class="col-sm-12 table-responsive-sm">
                                    <table class="table" id="table_invoiceItems">
                                        <thead style="border-radius: 0.3rem; background-color: #3a3a3a; color: white;">
                                            <tr>
                                                <th class=""
                                                    style="border-top-left-radius: 5px;border-bottom-left-radius: 5px;width:52%;border-right: 0px solid rgb(255,255,255);">
                                                    Description</th>
                                                <th class=""
                                                    style="width:16%;border-right: 0px solid rgb(255,255,255);text-align: end;">
                                                    Quantity</th>
                                                <th class=""
                                                    style="width:16%;border-right: 0px solid rgb(255,255,255);text-align: end;">
                                                    Rate
                                                </th>
                                                <th class=""
                                                    style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;width:16%;border-right: 0px solid rgb(255,255,255);text-align: end;">
                                                    Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="px-3">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12" id="quickInvoiceDescription"></div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-7">
                                            <label class="text-muted " style="text-align:right"> Subtotal: </label>
                                        </div>
                                        <div class="col-5 " id="sub_total" style="text-align:end"></div>
                                    </div>

                                    <div id="displayDiscountType">

                                    </div>

                                    <div class="row">
                                        <div class="col-7">
                                            <label class="h6"> Total:</label>
                                        </div>
                                        <div class="col-5 h6 " id="total" style="text-align:end"></div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="row title_deductions ">
                            </div>

                            <div class="deductions">
                            </div>

                            <div class="row total_deductions" id="total_deductions">
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12"></div>
                                <div class="col">
                                    <label class="fw-bold">Grand Total: </label>
                                </div>
                               <div class="col" style="text-align:end">
                                    <label class="h6 fw-bold" id="grand_subTotal"></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 ">Notes:</div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label style="word-wrap: break-word; text-align:right" id="notes"></label>
                                </div>

                            </div>`);

                                const month = ["January", "February", "March", "April", "May", "June",
                                    "July",
                                    "August", "September", "October", "November", "December"
                                ];
                                var newdate = new Date(data.data.created_at);
                                var mm = month[newdate.getMonth()];
                                var dd = newdate.getDate();
                                var yy = newdate.getFullYear();

                                var due_date = new Date(data.data.due_date);
                                var mm2 = month[due_date.getMonth()];
                                var dd2 = due_date.getDate();
                                var yy2 = due_date.getFullYear();

                                var date_received = new Date(data.data.date_received);
                                var mm3 = month[date_received.getMonth()];
                                var dd3 = date_received.getDate();
                                var yy3 = date_received.getFullYear();

                                $('#user_id').val(data.data.profile.user.id);
                                $('#profileId').val(data.data.profile.id);

                                $('#full_name').html(data.data.profile.user.first_name + " " + data.data
                                    .profile.user
                                    .last_name);

                                $('#email').html(data.data.profile.user.email);
                                $('#invoice_no').html("#" + data.data.invoice_no);
                                invoiceNumber = data.data.invoice_no;
                                // $('#status').html(data.data.status);
                                if (data.data.status === "Active") {
                                    $('#active_button').prop('disabled', true);
                                    $('#inactive_button').prop('disabled', false);
                                }
                                if (data.data.status === "Inactive") {
                                    $('#active_button').prop('disabled', false);
                                    $('#inactive_button').prop('disabled', true);
                                }

                                $('#address').html(data.data.profile.address);
                                $('#city-province').html(data.data.profile.city + ", " + data.data.profile
                                    .province);
                                $('#zip_code').html("Philippines " + data.data.profile.zip_code);
                                $('#invoice_status').html(data.data.invoice_status);
                                $('#date_created').html(mm + " " + dd + ", " + yy);
                                $('#show_due_date').html(mm2 + " " + dd2 + ", " + yy2);
                                $('#notes').addClass('text-start');
                                $('#notes').html(data.data.notes);

                                let quick_invoice = data.data.quick_invoice;
                                if (quick_invoice === '0') {
                                    let div = ''
                                    div += '<div class="row">';
                                    div += '<div class="col-12 align-self-start view_invoice_description">';
                                    div += '<label class="fw-bold"> Description: </label>';
                                    div += '</div>';
                                    div += ' <div class="col-12" id="view_invoice_description">' + data.data
                                        .description + '</div>';;
                                    div += '</div>';

                                    // $('#view_invoice_description').html(data.data.description);
                                    $('#quickInvoiceDescription').append(div);
                                }




                                if (data.data.invoice_status === "Paid") {
                                    $('#text_date_received').html("Date Received");
                                    $('#date_received').html(mm3 + " " + dd3 + ", " + yy3);
                                    $('#paid_button').prop('disabled', true);
                                    $('#cancel_button').prop('disabled', true);
                                    $('#delete_button').prop('disabled', false);
                                    $('#edit_invoice').prop('disabled', true);

                                } else {
                                    $('#text_date_received').html("");
                                    $('#date_received').html("");
                                    $('#paid_button').prop('disabled', false);
                                    $('#cancel_button').prop('disabled', false);
                                    $('#delete_button').prop('disabled', false);
                                    $('#edit_invoice').prop('disabled', false);
                                }

                                let redue_date = data.data.due_date;
                                let date_now = (new Date()).toISOString().split('T')[0];

                                if (data.data.invoice_status === "Pending") {
                                    if (redue_date < date_now) {
                                        let invoice_id = data.data.id;
                                        let invoice_status = 'Overdue';
                                        // console.log("INVOICE_ID", invoice_id);
                                        let data1 = {
                                            id: invoice_id,
                                            invoice_status: invoice_status,
                                        };

                                        axios.post(apiUrl + '/api/update_status', data1, {
                                            headers: {
                                                Authorization: token,
                                            },
                                        }).then(function(response) {
                                            let data = response.data;
                                            if (data.success) {
                                                console.log("SUCCESS123", data);
                                            }
                                        }).catch(function(error) {
                                            console.log("ERROR", error);
                                        })
                                    }
                                }

                                if (data.data.invoice_items.length > 0) {
                                    let balance_due = parseFloat(data.data.sub_total ? data.data.sub_total :
                                        0);
                                    let sub_total = parseFloat(data.data.sub_total) + parseFloat(data.data
                                        .discount_total ? data.data
                                        .discount_total : 0);

                                    let discount_amount = parseFloat(data.data.discount_amount);

                                    let converted_amount = parseFloat(data.data.converted_amount ? data.data
                                        .converted_amount : 0);

                                    $('#balance_due').html((balance_due)
                                        .toLocaleString('en-US', {
                                            style: 'currency',
                                            currency: 'USD'
                                        }));

                                    $('#sub_total').html(sub_total.toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }));

                                    $('#total').html(balance_due.toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }));

                                    $('#grand_subTotal').html(balance_due.toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }));

                                    if (data.data.discount_total > 0) {
                                        if (data.data.discount_type === "Fixed") {
                                            let div = "";
                                            div += "<div class='row'>"
                                            div += "<div class='col-8 discountType'>"
                                            div +=
                                                "<label class='text-muted'> Discount Type: </label><span class='text-muted'>" +
                                                data.data
                                                .discount_type + "</span> </div>";
                                            div +=
                                                "<div class='col ' id='discountAmount' style='text-align:end'>$" +
                                                PHP(data.data
                                                    .discount_total).format() + "</div>"
                                            div += "</div>";

                                            $('#displayDiscountType').append(div);
                                        } else if (data.data.discount_type === "Percentage") {
                                            let div = "";
                                            div += "<div class='row'>"
                                            div += "<div class='col-8 discountType'>"
                                            div +=
                                                "<label class='text-muted'> Discount Type: </label><span class='text-muted'> Pct.(" +
                                                discount_amount + "%) </span></div>";
                                            div +=
                                                "<div class='col ' id='discountAmount' style='text-align:end'>$" +
                                                PHP(data.data
                                                    .discount_total).format() + "</div>"
                                            div += "</div>";
                                            $('#displayDiscountType').append(div)
                                            // $('#discountType').html(" " + data.data.discount_type + " (" +
                                            //   discount_amount + "%)");
                                            // $('#discountAmount').html("$" + PHP(data.data.discount_total).format());
                                        }
                                    } else {
                                        $('#displayDiscountType').addClass('d-none');
                                    }



                                    data.data.invoice_items.map((item) => {
                                        // console.log("tem.item_description", item.item_description);
                                        let tr = '<tr >';
                                        if (item.item_description) {
                                            tr +=
                                                '<td class=" scope" style="word-wrap: break-word;">' +
                                                item.item_description + '</td>'
                                        } else {
                                            tr += '<td class=" scope">N/A</td>'
                                        }
                                        tr += '<td class=" scope" style="text-align:end">' + item
                                            .quantity +
                                            '</td>'
                                        tr += '<td class=" scope" style="text-align:end">' +
                                            item.rate.toLocaleString('en-US', {
                                                style: 'currency',
                                                currency: 'USD'
                                            }) +
                                            '</td>'
                                        tr += '<td class=" scope" style="text-align:end">' + item
                                            .total_amount.toLocaleString('en-US', {
                                                style: 'currency',
                                                currency: 'USD'
                                            }) + '</td>'
                                        tr += '</tr>';

                                        $('#table_invoiceItems tbody').append(tr);
                                        return '';
                                    })

                                    $('#convertedAmount').html('P' + PHP(converted_amount).format());

                                    $('#peso_rate').html(PHP(data.data.peso_rate).format());
                                    let grand_total_amount = parseFloat(data.data.grand_total_amount ? data
                                        .data
                                        .grand_total_amount : 0);
                                    // console.log("SUCCESS", PHP(data.data.grand_total_amount).format());

                                    $('#grand_total_amount').html('P' + PHP(grand_total_amount).format());

                                    if (data.data.deductions.length > 0) {
                                        let total_deductions = 0;

                                        let parent0 = $(this).closest('.row .title_deductions');
                                        let div_rows0 = '';
                                        div_rows0 += '<div class="col-md-6 col-sm-12 pt-3"> </div>';
                                        div_rows0 += '<div class="col-md-6 col-sm-12 pt-3">';
                                        div_rows0 +=
                                            '<label class="fs-5 fw-bold" style="color:#dc3545"> Deductions </label class="fs-5 fw-bold">';
                                        div_rows0 += '</div>';
                                        div_rows0 +=
                                            '<div class = "col " style = "text-align:end" > </div>';

                                        $(".row .title_deductions").append(div_rows0);
                                        data.data.deductions.map((item2) => {
                                            let deduction_amount = parseFloat(item2
                                                .amount ? item2.amount :
                                                0);

                                            let parent = $(this).closest('.deductions');
                                            let div_rows = '';
                                            div_rows += '<div class="row">';
                                            div_rows += '<div class="col-md-6 col-sm-12"></div>';
                                            div_rows += '<div class="col-md-6 col-sm-12">';
                                            div_rows += '<div class="row">';
                                            div_rows +=
                                                '<div class="col-7" ><label class="text-muted break-long-words">' +
                                                item2
                                                .deduction_type_name + '</label></div>';
                                            div_rows +=
                                                '<div class="col" style="text-align:end;color:#dc3545;"><label class="h6">P' +
                                                PHP(deduction_amount).format() + '</label></div>';
                                            div_rows += '</div>';
                                            div_rows += '</div>';
                                            div_rows += '</div>';


                                            total_deductions += deduction_amount;
                                            $(".row .deductions").append(div_rows);
                                            return '';
                                        })

                                        let parent1 = $(this).closest('.row .total_deductions');
                                        let div_rows1 = '';
                                        div_rows1 += '<div class="col-md-6 col-sm-12 pb-3"></div>';
                                        div_rows1 += '<div class="col">Total Deductions</div>';
                                        div_rows1 +=
                                            '<div class="col" style="text-align:end;color:#dc3545;"><label class="h6">P' +
                                            PHP(total_deductions).format() + '</label></div>';

                                        $(".row .total_deductions").append(div_rows1);
                                        return '';

                                    } else {
                                        let parent = $(this).closest('.row .deductions');
                                        let div_rows = '';
                                        div_rows += '<div class="col-md-6 col-sm-12"></div>';
                                        div_rows += '<div class="col-md-6 col-sm-12"></div>';
                                        div_rows +=
                                            '<div class="col  h6" style="text-align:end;color:#dc3545;"></div>';
                                        $(".row .deductions").append(div_rows);
                                        return '';
                                    }

                                } else {
                                    // width:' +
                                    // width +
                                    // 'px;
                                    $("#table_invoiceItems tbody").append(
                                        '<tr><td colspan="4" class="text-center"><div class="noData" style="position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                                    );
                                }
                            }
                        }).catch(function(error) {
                            console.log("ERROR", error);
                        });
                }
            }


            function show_invoice_config() {
                axios.get(apiUrl + '/api/get_invoice_config', {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        if (data.data.length > 0) {
                            data.data.map((item) => {
                                $("#invoice_logo").attr("src", item.invoice_logo);
                                // $('#invoice_logo').val(data.data.invoice_logo_name);
                                $('#invoice_title').html(item.invoice_title);
                                $('#invoice_email').html(item.invoice_email);
                                $('#bill_to_address').html(item.bill_to_address);
                            })
                        }
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                });
            }


            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var invoice_items = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.prototype.slice.call(invoice_items)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

            $('#submit_update_invoice').submit(function(e) {
                e.preventDefault();

                // BUTTON SPINNER
                var originalText = $('#update').html();
                $('#update').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                $('#update').prop("disabled", true);
                setTimeout(function() {
                    $('#update').html(originalText);
                }, 500);

                let profile_id = $('#profileId').val();
                let due_date = $('#due_date').val();
                let invoice_id = $('#update_invoice_id').val();
                let invoice_description = $('#invoice_description').val();
                let invoice_subtotal = $('#subtotal').val().replaceAll(',', '');
                let peso_rate = $('#edit_peso_rate').val().replaceAll(',', '')
                let invoice_converted_amount = $('#converted_amount').val().replaceAll(',', '');
                let invoice_discount_type = $('#discount_type:checked').val();
                let invoice_discount_amount = $('#discount_amount').val().replaceAll(',', '');
                let invoice_discount_total = $('#discount_total').val().replaceAll(',', '');
                let invoice_total_amount = $('#grand_total').val().replaceAll(',', '');
                let invoice_notes = $('textarea#notes').val();
                invoice_notes = invoice_notes.replace(/\n/g, '<br>');

                let invoiceItem = [];
                $('#show_items .row').each(function() {
                    let item_invoice_id = $(this).find('.item_id').val();
                    let item_description = $(this).find('.item_description').val();
                    let item_rate = $(this).find('.rate').val().replaceAll(',', '');
                    let item_qty = $(this).find('.quantity').val();
                    let item_total_amount = $(this).find('.amount').val().replaceAll(',', '');

                    invoiceItem.push({
                        item_invoice_id,
                        item_description,
                        item_rate,
                        item_qty,
                        item_total_amount,
                    })
                });

                // DEDUCTIONS TABLE
                let Deductions = [];
                $('#show_deduction_items .row').each(function() {
                    let deduction_id = $(this).find('.deduction_id').val();
                    let deduction_type_name = $(this).find('.deduction_type_name').val();
                    let deduction_amount = $(this).find('.deduction_amount').val().replaceAll(
                        ',',
                        '') ? $(this).find(
                        '.deduction_amount').val().replaceAll(',', '') : 0;

                    Deductions.push({
                        deduction_id,
                        deduction_type_name,
                        deduction_amount,
                    })
                });

                let data = {
                    // profile_id: profile_id,
                    invoice_id: invoice_id,
                    due_date: due_date,
                    description: invoice_description,
                    sub_total: invoice_subtotal ? invoice_subtotal : 0,
                    peso_rate: peso_rate,
                    converted_amount: invoice_converted_amount,
                    discount_type: invoice_discount_type,
                    discount_amount: invoice_discount_amount,
                    discount_total: invoice_discount_total,
                    grand_total_amount: invoice_total_amount,
                    notes: invoice_notes,
                    invoiceItem,
                    Deductions,
                    apiUrl: apiUrl,
                }
                console.log("DATA", data);
                axios.post(apiUrl + '/api/createinvoice', data, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        $('#content').empty();

                        $('#updateModal').modal('hide');
                        $("div.spanner").addClass("show");

                        var originalText = $('#content').html();
                        $('#content').html(
                            `<div id="contentSpinner">
                <span id="button-spinner" style="color:#CF8029;width:150px;height:150px" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                `
                        );
                        $('#content').addClass('d-flex');
                        $('#content').addClass('justify-content-center');
                        $('#content').css('padding', '52px');
                        $('#contentSpinner').css('width', '150px');
                        $('#contentSpinner').css('height', '150px');
                        setTimeout(function() {
                            $('#content').removeClass('d-flex');
                            $('#content').removeClass('justify-content-center');
                            $('#content').css('padding', '0px');
                            $('#contentSpinner').css('width', '0px');
                            $('#contentSpinner').css('height', '0px');
                            $('#content').html(originalText);
                        }, 1500);


                        $('#notifyIcon').html(
                            '<i class="fa-solid fa-check" style="color:green"></i>');
                        $('.toast1 .toast-title').html('Success');
                        $('.toast1 .toast-body').html(response.data.message);

                        setTimeout(function() {
                            $("div.spanner").removeClass("show");
                            $('.row .title_deductions').empty();
                            $('.row .total_deductions').empty();
                            $('.row .deductions').empty();
                            $('.row .view_invoice_description').empty();
                            $('.row #view_invoice_description').empty();
                            $('.row .discountType').empty();
                            $('.row #discountAmount').empty();
                            $('#table_invoiceItems tbody').html(show_invoice());
                            toast1.toast('show');
                            $('#update').prop("disabled", false);
                        }, 1500);
                    }
                }).catch(function(error) {
                    setTimeout(function() {
                        $('#update').prop("disabled", false);
                    }, 500);
                    console.log("ERROR", error)
                })
            })

            // ACTIVE BUTTON
            $('#active_button').on('click', function(e) {
                e.preventDefault();
                let url = window.location.pathname
                let urlSplit = url.split("/");
                if (urlSplit.length === 4) {
                    let invoice_id = urlSplit[3];
                    let status = "Active";

                    let data = {
                        id: invoice_id,
                        status: status,
                    }

                    axios.post(apiUrl + '/api/update_status_activeOrinactive', data, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#content').empty();

                            $('#activeModal').modal('hide');

                            var originalText = $('#content').html();
                            $('#content').html(
                                `<div id="contentSpinner">
                <span id="button-spinner" style="color:#CF8029;width:150px;height:150px" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                `
                            );
                            $('#content').addClass('d-flex');
                            $('#content').addClass('justify-content-center');
                            $('#content').css('padding', '52px');
                            $('#contentSpinner').css('width', '150px');
                            $('#contentSpinner').css('height', '150px');
                            setTimeout(function() {
                                $('#content').removeClass('d-flex');
                                $('#content').removeClass('justify-content-center');
                                $('#content').css('padding', '0px');
                                $('#contentSpinner').css('width', '0px');
                                $('#contentSpinner').css('height', '0px');
                                $('#content').html(originalText);
                            }, 1500);

                            $("div.spanner").addClass("show");
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(response.data.message);

                                $('#table_invoiceItems tbody').empty();
                                $('#table_invoiceItems tbody').empty();
                                $('.row .title_deductions').empty();
                                $('.row .total_deductions').empty();
                                $('.row .deductions').empty();
                                $('.row .view_invoice_description').empty();
                                $('.row #view_invoice_description').empty();
                                $('.row .discountType').empty();
                                $('.row #discountAmount').empty();
                                $('#table_invoiceItems tbody').html(show_invoice());
                                show_invoice_config();
                                toast1.toast('show');
                            }, 1500);
                        }
                    }).catch(function(error) {
                        if (error.response.data.errors) {
                            let errors = error.response.data.errors;
                            let fieldnames = Object.keys(errors);
                            Object.values(errors).map((item, index) => {
                                fieldname = fieldnames[0].split('_');
                                fieldname.map((item2, index2) => {
                                    fieldname['key'] = capitalize(
                                        item2);
                                    return ""
                                });
                                fieldname = fieldname.join(" ");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-x" style="color:#dc3545"></i>'
                                );
                                $('.toast1 .toast-title').html("Error");
                                $('.toast1 .toast-body').html(Object.values(
                                        errors)[0]
                                    .join(
                                        "\n\r"));
                            })
                            toast1.toast('show');
                        }
                    })

                }
            });

            // INACTIVE BUTTON
            $('#inactive_button').on('click', function(e) {
                e.preventDefault();
                let url = window.location.pathname
                let urlSplit = url.split("/");
                if (urlSplit.length === 4) {
                    let invoice_id = urlSplit[3];
                    let status = "Inactive";

                    let data = {
                        id: invoice_id,
                        status: status,
                    }

                    axios.post(apiUrl + '/api/update_status_activeOrinactive', data, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#content').empty();
                            $('#inactiveModal').modal('hide');

                            var originalText = $('#content').html();
                            $('#content').html(
                                `<div id="contentSpinner">
                <span id="button-spinner" style="color:#CF8029;width:150px;height:150px" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                `
                            );
                            $('#content').addClass('d-flex');
                            $('#content').addClass('justify-content-center');
                            $('#content').css('padding', '52px');
                            $('#contentSpinner').css('width', '150px');
                            $('#contentSpinner').css('height', '150px');
                            setTimeout(function() {
                                $('#content').removeClass('d-flex');
                                $('#content').removeClass('justify-content-center');
                                $('#content').css('padding', '0px');
                                $('#contentSpinner').css('width', '0px');
                                $('#contentSpinner').css('height', '0px');
                                $('#content').html(originalText);
                            }, 1500);

                            $("div.spanner").addClass("show");
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(response.data.message);

                                $('#table_invoiceItems tbody').empty();
                                $('#table_invoiceItems tbody').empty();
                                $('.row .title_deductions').empty();
                                $('.row .total_deductions').empty();
                                $('.row .deductions').empty();
                                $('.row .view_invoice_description').empty();
                                $('.row #view_invoice_description').empty();
                                $('.row .discountType').empty();
                                $('.row #discountAmount').empty();
                                $('#table_invoiceItems tbody').html(show_invoice());
                                show_invoice_config();
                                toast1.toast('show');
                            }, 1500);

                        }
                    }).catch(function(error) {
                        if (error.response.data.errors) {
                            let errors = error.response.data.errors;
                            let fieldnames = Object.keys(errors);
                            Object.values(errors).map((item, index) => {
                                fieldname = fieldnames[0].split('_');
                                fieldname.map((item2, index2) => {
                                    fieldname['key'] = capitalize(
                                        item2);
                                    return ""
                                });
                                fieldname = fieldname.join(" ");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-x" style="color:#dc3545"></i>'
                                );
                                $('.toast1 .toast-title').html("Error");
                                $('.toast1 .toast-body').html(Object.values(
                                        errors)[0]
                                    .join(
                                        "\n\r"));
                            })
                            toast1.toast('show');
                        }
                    })

                }
            });

            // PAID BUTTON
            $('#confirm_paid_button').on('click', function(e) {
                e.preventDefault();

                let url = window.location.pathname
                let urlSplit = url.split("/");
                if (urlSplit.length === 4) {
                    let invoice_id = urlSplit[3];
                    let invoice_status = "Paid";

                    let data = {
                        id: invoice_id,
                        invoice_status: invoice_status,
                    }

                    axios.post(apiUrl + '/api/update_status', data, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#content').empty();
                            $('#paidModal').modal('hide');

                            var originalText = $('#content').html();
                            $('#content').html(
                                `<div id="contentSpinner">
                <span id="button-spinner" style="color:#CF8029;width:150px;height:150px" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                `
                            );
                            $('#content').addClass('d-flex');
                            $('#content').addClass('justify-content-center');
                            $('#content').css('padding', '52px');
                            $('#contentSpinner').css('width', '150px');
                            $('#contentSpinner').css('height', '150px');
                            setTimeout(function() {
                                $('#content').removeClass('d-flex');
                                $('#content').removeClass('justify-content-center');
                                $('#content').css('padding', '0px');
                                $('#contentSpinner').css('width', '0px');
                                $('#contentSpinner').css('height', '0px');
                                $('#content').html(originalText);
                            }, 1500);

                            $("div.spanner").addClass("show");
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(response.data.message);

                                $('#table_invoiceItems tbody').empty();
                                $('#table_invoiceItems tbody').empty();
                                $('.row .title_deductions').empty();
                                $('.row .total_deductions').empty();
                                $('.row .deductions').empty();
                                $('.row .view_invoice_description').empty();
                                $('.row #view_invoice_description').empty();
                                $('.row .discountType').empty();
                                $('.row #discountAmount').empty();
                                $('#table_invoiceItems tbody').html(show_invoice());
                                show_invoice_config();
                                toast1.toast('show');
                            }, 1500);

                        }
                    }).catch(function(error) {
                        if (error.response.data.errors) {
                            let errors = error.response.data.errors;
                            let fieldnames = Object.keys(errors);
                            Object.values(errors).map((item, index) => {
                                fieldname = fieldnames[0].split('_');
                                fieldname.map((item2, index2) => {
                                    fieldname['key'] = capitalize(
                                        item2);
                                    return ""
                                });
                                fieldname = fieldname.join(" ");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-x" style="color:#dc3545"></i>'
                                );
                                $('.toast1 .toast-title').html("Error");
                                $('.toast1 .toast-body').html(Object.values(
                                        errors)[0]
                                    .join(
                                        "\n\r"));
                            })
                            setTimeout(function() {
                                toast1.toast('show');
                            }, 1500)
                        }
                    })
                }
            });

            // CANCELLED BUTTON
            $('#cancelled_button').on('click', function(e) {
                e.preventDefault();
                console.log("CANCELLED");
                let url = window.location.pathname;
                let urlSplit = url.split("/");
                if (urlSplit.length === 4) {
                    let invoice_id = urlSplit[3];
                    let invoice_status = "Cancelled";

                    let data = {
                        id: invoice_id,
                        invoice_status: invoice_status,
                    }
                    axios.post(apiUrl + '/api/update_status', data, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#content').empty();
                            $('#cancelModal').modal('hide');

                            var originalText = $('#content').html();
                            $('#content').html(
                                `<div id="contentSpinner">
                <span id="button-spinner" style="color:#CF8029;width:150px;height:150px" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                `
                            );
                            $('#content').addClass('d-flex');
                            $('#content').addClass('justify-content-center');
                            $('#content').css('padding', '52px');
                            $('#contentSpinner').css('width', '150px');
                            $('#contentSpinner').css('height', '150px');
                            setTimeout(function() {
                                $('#content').removeClass('d-flex');
                                $('#content').removeClass('justify-content-center');
                                $('#content').css('padding', '0px');
                                $('#contentSpinner').css('width', '0px');
                                $('#contentSpinner').css('height', '0px');
                                $('#content').html(originalText);
                            }, 1500);

                            $("div.spanner").addClass("show");
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(response.data.message);

                                $('#table_invoiceItems tbody').empty();
                                $('#table_invoiceItems tbody').empty();
                                $('.row .title_deductions').empty();
                                $('.row .total_deductions').empty();
                                $('.row .deductions').empty();
                                $('.row .view_invoice_description').empty();
                                $('.row #view_invoice_description').empty();
                                $('.row .discountType').empty();
                                $('.row #discountAmount').empty();
                                $('#table_invoiceItems tbody').html(show_invoice());
                                show_invoice_config();
                                toast1.toast('show');
                            }, 1500);

                        }
                    }).catch(function(error) {
                        if (error.response.data.errors) {
                            let errors = error.response.data.errors;
                            let fieldnames = Object.keys(errors);
                            Object.values(errors).map((item, index) => {
                                fieldname = fieldnames[0].split('_');
                                fieldname.map((item2, index2) => {
                                    fieldname['key'] = capitalize(
                                        item2);
                                    return ""
                                });
                                fieldname = fieldname.join(" ");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-x" style="color:#dc3545"></i>'
                                );
                                $('.toast1 .toast-title').html("Error");
                                $('.toast1 .toast-body').html(Object.values(
                                        errors)[0]
                                    .join(
                                        "\n\r"));
                            })
                            toast1.toast('show');
                        }
                    })
                }
            });

            //DELETE INVOICE
            $('#invoice_delete').on('click', function(e) {
                let url = window.location.pathname;
                let urlSplit = url.split("/")
                if (urlSplit.length === 4) {
                    let invoice_id = urlSplit[3];
                    console.log("INVICEOI", invoice_id);
                    axios.post(apiUrl + '/api/delete_invoice/' + invoice_id, {}, {
                        headers: {
                            Authorization: token,

                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#content').empty();
                            $('#deleteModal').modal('hide');
                            $("div.spanner").addClass("show");
                            setInterval(function() {
                                $("div.spanner").removeClass("show");

                                var originalText = $('#content').html();
                                $('#content').html(
                                    `<div id="contentSpinner">
                <span id="button-spinner" style="color:#CF8029;width:150px;height:150px" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                `
                                );
                                $('#content').addClass('d-flex');
                                $('#content').addClass('justify-content-center');
                                $('#content').css('padding', '52px');
                                $('#contentSpinner').css('width', '150px');
                                $('#contentSpinner').css('height', '150px');
                                setTimeout(function() {
                                    $('#content').removeClass('d-flex');
                                    $('#content').removeClass(
                                        'justify-content-center');
                                    $('#content').css('padding', '0px');
                                    $('#contentSpinner').css('width', '0px');
                                    $('#contentSpinner').css('height', '0px');
                                    $('#content').html(originalText);
                                }, 1500);

                                $("div.spanner").addClass("show");
                                setTimeout(function() {
                                    $("div.spanner").removeClass("show");
                                    $('#notifyIcon').html(
                                        '<i class="fa-solid fa-check" style="color:green"></i>'
                                    );
                                    $('.toast1 .toast-title').html('Success');
                                    $('.toast1 .toast-body').html(response.data
                                        .message);

                                    $('#table_invoiceItems tbody').empty();
                                    $('#table_invoiceItems tbody').empty();
                                    $('.row .title_deductions').empty();
                                    $('.row .total_deductions').empty();
                                    $('.row .deductions').empty();
                                    $('.row .view_invoice_description').empty();
                                    $('.row #view_invoice_description').empty();
                                    $('.row .discountType').empty();
                                    $('.row #discountAmount').empty();
                                    $('#table_invoiceItems tbody').html(
                                        show_invoice());
                                    show_invoice_config();
                                    toast1.toast('show');
                                }, 1500);
                            }, 2000)

                            setTimeout(function() {
                                // location.href = apiUrl + "/admin/current"
                                window.location = document.referrer;
                            }, 2000)
                        }

                    }).catch(function(error) {
                        if (error.response.data.errors) {
                            let errors = error.response.data.errors;
                            let fieldnames = Object.keys(errors);
                            Object.values(errors).map((item, index) => {
                                fieldname = fieldnames[0].split('_');
                                fieldname.map((item2, index2) => {
                                    fieldname['key'] = capitalize(
                                        item2);
                                    return ""
                                });
                                fieldname = fieldname.join(" ");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-x" style="color:#dc3545"></i>'
                                );
                                $('.toast1 .toast-title').html("Error");
                                $('.toast1 .toast-body').html(Object.values(
                                        errors)[0]
                                    .join(
                                        "\n\r"));
                            })
                            toast1.toast('show');
                        }
                    })
                }
            })

            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }

            function pdfContent() {
                // Set the options for html2pdf

                var options = {
                    filename: 'Invoice ' + $('#invoice_no').html() + '.pdf',
                    margin: [10, 10],
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };

                // Generate the PDF from the HTML content using html2pdf
                html2pdf().from($('#content')[0]).set(options).save();
            }

            $('#pdfDownload').on('click', function(e) {
                e.preventDefault();
                pdfContent();
            })
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
@endsection
