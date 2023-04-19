@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid px-4">
        <h1 class="mt-0">View Profile</h1>
        <ol class="breadcrumb mb-3"></ol>
        <div class="row">
            <div class="col-6 px-2">
                <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                    <div class="card-header">View Information</div>
                    <div class="row px-4 pb-4">
                        <form id="user_ProfileUpdate" method="POST" action="javascript:void(0)"
                            class="row g-3 needs-validation" novalidate>
                            @csrf
                            <span hidden>user id</span>
                            <input type="text" id="user_user_id" value="{{ $findid->id }}" hidden>
                            <input type="text" id="user_profile_id_show" name="profile_id_show" hidden>

                            <div class="col mb-3">
                                <div class="profile-pic-div" style="position: relative; height:200px">
                                    <img src="/images/default.png" id="photo">
                                    <input name="file" type="file" id="file" disabled="true">
                                    <label for="file" id="uploadBtn">Choose Photo</label>
                                </div>
                            </div>

                            <div class="col pt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="user_profile_status"
                                        name="profile_status" checked disabled="true">
                                    <label class="form-check-label" for="status">
                                        Active
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label mb-2 style="color: #A4A6B3;">First Name</label>
                                    <input id="user_first_name" name="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror "
                                        placeholder="First Name" value="{{ old('first_name') }}" disabled="true">
                                </div>
                                <div class="mb-3">
                                    <label mb-2 style="color: #A4A6B3;">Last Name</label>
                                    <input id="user_last_name" name="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror "
                                        placeholder="Last Name" value="{{ old('last_name') }}" disabled="true">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Email</label>
                                <input id="user_email" name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    disabled="true">
                            </div>
                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Username</label>
                                <input id="user_username" name="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                                    disabled="true">
                            </div>
                            <!--
                                            <div class="mb-3">
                                                <label mb-2 style="color: #A4A6B3;">Password</label>
                                                <input id="password" name="password" type="text"
                                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                                >
                                            </div> -->

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Position</label>
                                <select class="form-select @error('position') is-invalid @enderror" id="user_position"
                                    name="position" aria-label="Default select example" defaultValue="select"
                                    disabled="true">
                                    <option selected disabled value="">Please Select Position</option>
                                    <option value="Lead Developer">Lead Developer</option>
                                    <option value="Senior Developer">Senior Developer</option>
                                    <option value="Junior Developer">Junior Developer</option>
                                    <option value="Web Designer">Web Designer</option>
                                    <option value="Tester">Tester</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Phone Number</label>
                                <input id="user_phone_number" name="phone_number" type="text"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    id="formGroupExampleInput2" placeholder="Phone Number" disabled="true">
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Address</label>
                                <input id="user_address" name="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror"
                                    id="formGroupExampleInput2" placeholder="Address" disabled="true">
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Province</label>
                                <input id="user_province" name="province" type="text"
                                    class="form-control @error('province') is-invalid @enderror"
                                    id="formGroupExampleInput2" placeholder="Province" disabled="true">
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">City</label>
                                <input id="user_city" name="city" type="text"
                                    class="form-control @error('city') is-invalid @enderror" id="formGroupExampleInput2"
                                    placeholder="City" disabled="true">
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Zip Code</label>
                                <input id="user_zip_code" name="zip_code" type="text"
                                    class="form-control @error('zip_code') is-invalid @enderror"
                                    id="formGroupExampleInput2" placeholder="Zip Code" disabled="true">
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Account Number</label>
                                <input id="user_acct_no" name="acct_no" type="text"
                                    class="form-control @error('acct_no') is-invalid @enderror"
                                    id="formGroupExampleInput2" placeholder="Account Number" disabled="true">
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Account Name</label>
                                <input id="user_acct_name" name="acct_name" type="text"
                                    class="form-control @error('acct_name') is-invalid @enderror"
                                    id="formGroupExampleInput2" placeholder="Account Name" disabled="true">
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Bank Name</label>
                                <select class="form-select @error('bank_name') is-invalid @enderror" id="user_bank_name"
                                    name="bank_name" aria-label="Default select example" disabled="true">
                                    <option selected disabled value="">Please Select Bank Name</option>
                                    <option value="BDO Unibank Inc.">BDO Unibank Inc. (BDO)</option>
                                    <option value="Land Bank of the Philippines">Land Bank of the Philippines (LANDBANK)
                                    </option>
                                    <option value="Metropolitan Bank & Trust Company">Metropolitan Bank & Trust Company
                                        (Metrobank)</option>
                                    <option value="Bank of the Philippine Islands">Bank of the Philippine Islands (BPI)
                                    </option>
                                    <option value="Philippine National Bank">Philippine National Bank (PNB)</option>
                                    <option value="Development Bank of the Philippines">Development Bank of the Philippines
                                        (DBP)</option>
                                    <option value="China Banking Corporation">China Banking Corporation (CBC)</option>
                                    <option value="Rizal Commercial Banking Corporation">Rizal Commercial Banking
                                        Corporation (RCBC)</option>
                                    <option value="Union Bank of the Philippines, Inc.">Union Bank of the Philippines, Inc.
                                    </option>
                                    <option value="Security Bank Corporation">Security Bank Corporation</option>
                                    <option value="EastWest Bank">EastWest Bank</option>
                                    <option value="Citibank, N.A.">Citibank, N.A. (Philippine Branch)</option>
                                    <option value="United Coconut Planters Bank">United Coconut Planters Bank (UCPB)
                                    </option>
                                    <option value="Asia United Bank Corporation">Asia United Bank Corporation (AUB)
                                    </option>
                                    <option value="Bank of Commerce">Bank of Commerce (BankCom)</option>
                                    <option value="Hongkong and Shanghai Banking Corporation">Hongkong and Shanghai Banking
                                        Corporation (HSBC)</option>
                                    <option value="Robinsons Bank Corporation">Robinsons Bank Corporation</option>
                                    <option value="Philtrust Bank">Philtrust Bank</option>
                                    <option value="Philippine Bank of Communications">Philippine Bank of Communications
                                        (PBCOM)</option>
                                    <option value="Maybank Philippines Inc.">Maybank Philippines Inc.</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Bank Location</label>
                                <input id="user_bank_address" name="bank_address" type="text"
                                    class="form-control @error('bank_address') is-invalid @enderror"
                                    id="formGroupExampleInput2" placeholder="Bank Address" disabled="true">
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
                                <input id="user_gcash_no" name="gcash_no" type="text"
                                    class="form-control @error('gcash_no') is-invalid @enderror"
                                    id="formGroupExampleInput2" placeholder="Gcash Number" disabled="true">
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Date Hired</label>
                                <input id="user_date_hired" name="date_hired" type="date"
                                    class="form-control @error('date_hired') is-invalid @enderror"
                                    id="formGroupExampleInput2" placeholder="Date Hired" disabled="true">
                            </div>

                            <div class="col mb-3">
                                <button type="button" id="user_edit_profile"
                                    style="width:100%; height:50px;color:white; background-color: #A4A6B3;"
                                    class="btn">Edit
                                    Profile</button>
                            </div>
                            <div class="col mb-3">
                                <button type="submit"
                                    style="width:100%; height:50px;color:white; background-color: #CF8029;"
                                    class="btn ">Update Profile</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-6 px-1">
                <div class="row">
                    <div class="col">
                        <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                            <!-- <div class="card-header">Profile Information</div> -->
                            <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">

                                <li class="nav-item" role="presentation" style="width:50%">
                                    <button style="width:100%" class="nav-link active" id="pills-home-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                        aria-selected="true">Invoices</button>
                                </li>

                                <li class="nav-item" role="presentation" style="width:50%">
                                    <button style="width:100%" class="nav-link" id="pills-profile-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                                        role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Deductions</button>
                                </li>
                            </ul>
                            <form id="user_CreateInvoice" method="POST" action="javascript:void(0)"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-4">
                                    <div class="input-group">

                                    </div>
                                </div>
                            </form>

                            <div class="form-group has-search">
                                <div class=" tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">

                                        <div class="col-md-4 w-100">
                                            <div class="input-group">
                                                <button style="color:white; background-color: #CF8029;"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit"
                                                    id="button-addon2" name="button-addon2"
                                                    class="btn form-check-inline pe-3 "><i
                                                        class="fa fa-plus pe-1"></i>Create Invoice</button>
                                                <input type="text" aria-label="First name"
                                                    class="form-control form-check-inline">
                                                <div class="form-group has-search">
                                                    <span class="fa fa-search form-control-feedback"></span>
                                                    <input type="text" class="form-control" id="user_search_invoice"
                                                        placeholder="Search">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover"
                                                id="user_dataTable_invoice">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:right;">Invoice #</th>
                                                        <th style="text-align:center;">Status</th>
                                                        <th style="text-align:center;">Date Created</th>
                                                        <th style="text-align:right;">Total Amount</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center" colspan="5">Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="display: flex; justify-content: space-between;">
                                                <div class="page_showing" id="tbl_showing_invoice"></div>
                                                <ul class="pagination pagination-sm" id="tbl_pagination_invoice"></ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">

                                        <div class="col-md-4 w-100">
                                            <div class="input-group">
                                                <button type="button" id="user_submit-create-deduction"
                                                    class="btn form-check-inline pe-3" data-bs-toggle="modal"
                                                    data-bs-target="#modal-create-deduction"
                                                    style="color:white; background-color: #CF8029;">
                                                    <i class="fa fa-plus pe-1"></i>
                                                    Create Deduction
                                                </button>
                                                <input type="text" aria-label="First name"
                                                    class="form-control form-check-inline">

                                                <div class="form-group has-search">
                                                    <span class="fa fa-search form-control-feedback"></span>
                                                    <input type="text" class="form-control" id="search_deduction"
                                                        placeholder="Search">
                                                </div>

                                                <div class="col-12 pt-3">
                                                    <table class="table-responsive" id="tableDeleteProfileDeductioType">
                                                        <thead></thead>
                                                        <tbody>
                                                            <tr>

                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table style="color: #A4A6B3;font-size: 14px;" class="table table-hover"
                                                id="user_dataTable_deduction">
                                                <thead>
                                                    <tr>
                                                        <th>Invoice #</th>
                                                        <th>Status</th>
                                                        <th>Deduction Name</th>
                                                        <th>Amount</th>
                                                        <th class="text-center">Date Created</th>
                                                        <th class="text-center" id="action1">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center" colspan="6">Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="display: flex; justify-content: space-between;">
                                                <div class="page_showing" id="tbl_showing_deduction"></div>
                                                <ul class="pagination pagination-sm" id="tbl_pagination_deduction"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START CREATE INVOICE MODAL -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:100%;">
                <div class=" modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createnvoice1">Create Invoice</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row whole_row">
                            <form id="user_invoice_items">
                                @csrf
                                <div class="row px-4 pb-4" id="header">
                                    <div class="col-md-6 px-2 w-100">
                                        <div class="card shadow p-2 mb-5 bg-white rounded">

                                            <div class="row px-4 pb-4" id="header">
                                                <div class="col-12 mb-3">
                                                    <span hidden>profile id</span>
                                                    <div class="form-group w-50">
                                                        <!-- <label class="formGroupExampleInput2">Invoice #</label> -->
                                                        <input id="user_invoice_no"
                                                            style="font-weight: bold;border:none;background-color:white"
                                                            disabled name="invoice_no" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class=" form-group">
                                                                <label class=" formGroupExampleInput2">Description</label>
                                                                <input id="user_invoice_description"
                                                                    name="invoice_description" type="text"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12" id="show_items">
                                                    <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                                                </div>

                                                <div class="col-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-sm-4">
                                                            <button class="btn "
                                                                style="width:100%;color:white; background-color: #CF8029;"
                                                                id="add_item">Add
                                                                Item</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col"
                                                            style="display: flex;flex-direction: column-reverse;align-items: center;">
                                                            <div class="form-group">
                                                                <label class="formGroupExampleInput2"
                                                                    style="color: #A4A6B3;">Discount
                                                                    Type</label>
                                                                <br>
                                                                <input class="form-check-input" type="radio"
                                                                    name="discount_type" id="user_discount_type"
                                                                    value="fixed">
                                                                <label class="formGroupExampleInput2">
                                                                    Fixed &nbsp; &nbsp;
                                                                </label>
                                                                <input class="discount_type form-check-input"
                                                                    type="radio" name="discount_type"
                                                                    id="discount_type" value="percentage">
                                                                <label class="formGroupExampleInput2">
                                                                    %
                                                                </label>
                                                                <!-- <input type="text" id="discount_type" class="form-control" /> -->

                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label
                                                                    class="formGroupExampleInput2 label_discount_amount">Discount
                                                                    Amount ($)</label>
                                                                <input type="number" step="any"
                                                                    style="text-align:right;" name="discount_amount"
                                                                    id="user_discount_amount" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label
                                                                    class="formGroupExampleInput2 label_discount_total">Discount
                                                                    Total ($)</label>
                                                                <input type="text" disabled
                                                                    style="text-align:right; border:0px;background-color:white;"
                                                                    onkeypress="return onlyNumberKey(event)"
                                                                    name="discount_total" id="discount_total"
                                                                    class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-12 my-3" style="justify-content:end;display:flex">
                                                            <div class="form-group">
                                                                <!-- border-style:none -->
                                                                <label>Subtotal ($): </label>
                                                                <input type="text"
                                                                    style="font-weight: bold;text-align:right;border:none;background-color:white"
                                                                    name="subtotal" id="user_subtotal"
                                                                    class="form-control no-outline subtotal" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="formGroupExampleInput2">Dollar Amount
                                                                    ($)</label>
                                                                <input type="text" id="user_dollar_amount"
                                                                    style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                                    class="form-control dollar_amount" disabled />

                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="formGroupExampleInput2">Peso Rate
                                                                    (Php)</label>
                                                                <input type="text"
                                                                    style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                                    onkeypress="return onlyNumberKey(event)"
                                                                    id="user_peso_rate" class="form-control" disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="formGroupExampleInput2"
                                                                    for="form3Example2">Converted
                                                                    Amount (Php)</label>
                                                                <input type="text"
                                                                    style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                                    onkeypress="return onlyNumberKey(event)"
                                                                    id="user_converted_amount"
                                                                    class="form-control converted_amount" disabled />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h3> DEDUCTIONS </h3>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12" id="user_show_deduction_items">
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-8"></div>
                                                        <div class="col-4 text-center mb-3">
                                                            <h4> Grand Total </h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-8" style="text-align:right;">
                                                            <label style="vertical-align: -webkit-baseline-middle">Total
                                                                (Php):
                                                                <label>
                                                        </div>
                                                        <div class="col-4 mb-3" style="justify-content:end;display:flex">
                                                            <!-- border-style:none -->
                                                            <input type="text" id="user_grand_total"
                                                                class="form-control no-outline"
                                                                style="text-align:right;border:0;background-color:white;"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-12 form-control">
                                                            <label for="floatingTextarea">Notes</label>
                                                            <textarea class="form-control" placeholder="Leave a notes here" id="user_notes" name="notes"></textarea>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <div class="pb-3">
                                                        <button type="button" class="btn  w-100"
                                                            style=" color:#CF8029; background-color:white; "
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <div class="pb-3">
                                                        <button type="submit" id="save" class="btn  w-100"
                                                            style="color:White; background-color:#CF8029;">Save</button>
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

        <div style="position:fixed;top:60px;right:20px;z-index:99999;justify-content:flex-end;display:flex;">
            <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <div><i class="fa fa-newspaper-o"> </i></div>
                    <div><strong class="mr-auto m-l-sm toast-title">Notification</strong></div>
                    <div>
                        <button type="button" class="ml-2 mb-1 close float-end" data-dismiss="toast"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="toast-body">
                    Hello, you can push notifications to your visitors with this toast feature.
                </div>
            </div>
        </div>

        <!-- START MODAL ADD -->
        <div class="modal fade" id="user_modal-create-deduction" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-body ">
                            <div class="row">
                                <h5> Create Deduction </h5>
                                <form id="user_deductiontype_store" method="POST" action="javascript:void(0)"
                                    class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <input type="text" id="user_createDeduction_profile_id" hidden>
                                    <div class="form-group mt-3" id="select_deduction_name">
                                        <label for="formGroupExampleInput">Deduction Name</label>
                                        <select class="createDeduction_deduction_name form-select"
                                            name="createDeduction_deduction_name"
                                            id="user_createDeduction_deduction_name">
                                            <option selected disabled value="">Please Select Deductions</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Amount</label>
                                        <input id="user_createDeduction_deduction_amount"
                                            name="createDeduction_deduction_amount" type="text"
                                            class="createDeduction_deduction_amount form-control" placeholder="Amount">

                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="btn  w-100"
                                                    style=" color:#CF8029; background-color:white; "
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                            <div class="col">
                                                <button type="submit" id="user_createDeduction_button"
                                                    class="btn  w-100"
                                                    style="color:White; background-color:#CF8029;">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL ADD -->

        <!-- START MODAL DEDUCTION EDIT -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-body ">
                            <div class="row">
                                <h5> Update Deduction</h5>
                                <form id="user_deductiontype_update">
                                    @csrf
                                    <input type="text" id="user_deduction_id" hidden>

                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput">Deduction Name</label>
                                        <input id="user_edit_deduction_name" type="text" class="form-control"
                                            placeholder="Deduction Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Amount</label>
                                        <input id="user_edit_deduction_amount" type="text" class="form-control"
                                            placeholder="Amount">

                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="btn  w-100"
                                                    style=" color:#CF8029; background-color:white; "
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn  w-100"
                                                    style="color:White; background-color:#CF8029; "
                                                    data-bs-dismiss="modal">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START MODAL DEDUCTION EDIT -->

        <!-- START MODAL PROFILE DEDUCTION TYPE EDIT -->
        <div class="modal fade" id="user_ProfileDeductioneditModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-body ">
                            <div class="row">
                                <h5> Update Profile Deduction</h5>
                                <form id="user_ProfileDeductiontype_update">
                                    @csrf
                                    <input type="text" id="profileDeductionType_id" hidden>

                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput">Profile Deduction Name</label>
                                        <input type="text" id="user_edit_profileDeductionType_name"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Amount</label>
                                        <input id="user_edit_profileDeductionType_amount" type="text"
                                            class="form-control" placeholder="Amount">

                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="btn  w-100"
                                                    style=" color:#CF8029; background-color:white; "
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn  w-100"
                                                    style="color:White; background-color:#CF8029; "
                                                    data-bs-dismiss="modal">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START MODAL DEDUCTION EDIT -->

        <!-- START MODAL UPDATE INVOICE STATUS -->
        <div class="modal fade" id="user_invoice_status" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-body ">
                            <div class="row">
                                <h5>Update Invoice Status</h5>
                                <form id="user_update_invoice_status">
                                    @csrf
                                    <input type="text" id="user_updateStatus_invoiceNo" hidden>
                                    <div class="form-group mt-3">
                                        <label for="formGroupExampleInput">Status Name</label>
                                        <select class="form-select" id="select_invoice_status">
                                            <option value="" Selected disabled>Please choose status</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Overdue">Overdue</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col">
                                            <button type="button" class="btn  w-100"
                                                style=" color:#CF8029; background-color:white; "
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn  w-100"
                                                style="color:White; background-color:#CF8029; "
                                                data-bs-dismiss="modal">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START MODAL UPDATE INVOICE STATUS -->
    @endsection
