@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">

        <div class="row" style="padding-top:10px">
            <div class="col-md-12 col-lg-12 col-xl-4 bottom10" style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white h-100" style="padding:20px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 ">
                                <span class="fs-3 ">Profile Information</span>
                            </div>
                        </div>

                        <form id="ProfileUpdate" class="g-3 needs-validation" novalidate>
                            <div class="row pt-3">
                                @csrf
                                <span hidden>user id</span>
                                <input type="text" id="user_id" value="{{ $findid->id }}" hidden>
                                <input type="text" id="profile_id_show" hidden>

                                <div class="col-md-6 col-lg-6"
                                    style="display:flex;justify-content:center;align-items:center">
                                    <div class="profile-pic-div_adminProfile-wrapper  ">
                                        <div class="profile-pic-div_adminActiveProfile">
                                            <img src="/images/default.png" id="photo">
                                            <!-- id="file" ORIGINAL ID -->
                                            <!-- <input name="file" type="file" id="file" disabled="true"> -->
                                            <label for="file" id="uploadBtn">Choose Photo</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 pt-3 ">
                                    <div class="row">
                                        <div class="col ">
                                            <input class="form-check-input" type="checkbox" id="profile_status"
                                                name="profile_status" disabled="true">
                                            <label class="form-check-label" for="status">
                                                Active
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group-profile">
                                                <label style="color: #A4A6B3;" for="first_name">Firstname</label>
                                                <input id="first_name" name="first_name" type="text" class="form-control"
                                                    placeholder="Firstname" disabled="true" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group-profile">
                                                <label for="last_name" style="color: #A4A6B3;">Lastname</label>
                                                <input id="last_name" name="last_name" type="text" class="form-control"
                                                    placeholder="Lastname" disabled="true" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row_email_adminActiveProfile">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateEmail" class="form-group-profile">
                                                <label for="email" style="color: #A4A6B3;">Email Address</label>
                                                <input id="email" name="email" type="email" class="form-control"
                                                    placeholder="Email" disabled="true" onblur="editValidateEmail(this)"
                                                    required>
                                                <div id="error_email" class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateUsername" class="form-group-profile">
                                                <label for="username" style="color: #A4A6B3;">Username</label>
                                                <input id="username" name="username" type="text" class="form-control"
                                                    placeholder="Username" disabled="true"
                                                    onblur="editValidateUsername(this)" required>
                                                <div id="error_username" class="invalid-feedback">This field is required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="position" style="color: #A4A6B3;">Position</label>
                                                <select class="form-select" id="position" name="position"
                                                    defaultValue="select" disabled="true" required>
                                                    <option selected disabled value="">Please Select Position
                                                    </option>
                                                    <option value="Lead Developer">Lead Developer</option>
                                                    <option value="Senior Developer">Senior Developer</option>
                                                    <option value="Junior Developer">Junior Developer</option>
                                                    <option value="Web Designer">Web Designer</option>
                                                    <option value="Tester">Tester</option>
                                                </select>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="phone_number" style="color: #A4A6B3;">Phone Number</label>
                                                <input id="phone_number" name="phone_number" type="text"
                                                    class="form-control" placeholder="Phone Number"
                                                    disabled="true"required maxlength="11">
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="address" style="color: #A4A6B3;">Address</label>
                                                <input id="address" name="address" type="text" class="form-control"
                                                    placeholder="Address" disabled="true" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="province" style="color: #A4A6B3;">Province</label>
                                                <input id="province" name="province" type="text"
                                                    class="form-control" placeholder="Province" disabled="true" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="city" style="color: #A4A6B3;">City</label>
                                                <input id="city" name="city" type="text" class="form-control"
                                                    placeholder="City" disabled="true" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="zip_code" style="color: #A4A6B3;">Zip Code</label>
                                                <input id="zip_code" name="zip_code" type="text"
                                                    class="form-control" placeholder="Zip Code" disabled="true" required
                                                    maxlength="10">
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateAcctno" class="form-group-profile">
                                                <label for="acct_no" style="color: #A4A6B3;">Account Number</label>
                                                <input id="acct_no" name="acct_no" type="text" class="form-control"
                                                    placeholder="Account Number" disabled="true" maxlength="15">
                                                {{-- onblur="editValidateAcctno(this)" --}}
                                                {{-- <div id="error_acct_no" class="invalid-feedback">This field is required.</div> --}}

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateAcctname" class="form-group-profile">
                                                <label for="acct_name" style="color: #A4A6B3;">Account Name</label>
                                                <input id="acct_name" name="acct_name" type="text"
                                                    class="form-control" placeholder="Account Name" disabled="true">
                                                {{-- onblur="editValidateAcctname(this)" --}}
                                                {{-- <div id="error_acct_name" class="invalid-feedback">This field is required. </div> --}}

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="bank_name" style="color: #A4A6B3;">Bank Name</label>
                                                <select class="form-select" id="bank_name" name="bank_name"
                                                    aria-label="Default select example" disabled="true">
                                                    <option selected value="">Please Select Bank Name
                                                    </option>
                                                    <option value="BDO Unibank Inc.">BDO Unibank Inc. (BDO)</option>
                                                    <option value="Land Bank of the Philippines">Land Bank of the
                                                        Philippines
                                                        (LANDBANK)
                                                    </option>
                                                    <option value="Metropolitan Bank & Trust Company">Metropolitan Bank &
                                                        Trust
                                                        Company
                                                        (Metrobank)</option>
                                                    <option value="Bank of the Philippine Islands">Bank of the Philippine
                                                        Islands (BPI)
                                                    </option>
                                                    <option value="Philippine National Bank">Philippine National Bank (PNB)
                                                    </option>
                                                    <option value="Development Bank of the Philippines">Development Bank of
                                                        the
                                                        Philippines
                                                        (DBP)</option>
                                                    <option value="China Banking Corporation">China Banking Corporation
                                                        (CBC)
                                                    </option>
                                                    <option value="Rizal Commercial Banking Corporation">Rizal Commercial
                                                        Banking
                                                        Corporation (RCBC)</option>
                                                    <option value="Union Bank of the Philippines, Inc.">Union Bank of the
                                                        Philippines, Inc.
                                                    </option>
                                                    <option value="Security Bank Corporation">Security Bank Corporation
                                                    </option>
                                                    <option value="EastWest Bank">EastWest Bank</option>
                                                    <option value="Citibank, N.A.">Citibank, N.A. (Philippine Branch)
                                                    </option>
                                                    <option value="United Coconut Planters Bank">United Coconut Planters
                                                        Bank
                                                        (UCPB)
                                                    </option>
                                                    <option value="Asia United Bank Corporation">Asia United Bank
                                                        Corporation
                                                        (AUB)</option>
                                                    <option value="Bank of Commerce">Bank of Commerce (BankCom)</option>
                                                    <option value="Hongkong and Shanghai Banking Corporation">Hongkong and
                                                        Shanghai Banking
                                                        Corporation (HSBC)</option>
                                                    <option value="Robinsons Bank Corporation">Robinsons Bank Corporation
                                                    </option>
                                                    <option value="Philtrust Bank">Philtrust Bank</option>
                                                    <option value="Philippine Bank of Communications">Philippine Bank of
                                                        Communications
                                                        (PBCOM)</option>
                                                    <option value="Maybank Philippines Inc.">Maybank Philippines Inc.
                                                    </option>
                                                </select>
                                                {{-- <div class="invalid-feedback">This field is required.</div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="bank_address" style="color: #A4A6B3;">Bank Address</label>
                                                <input id="bank_address" name="bank_address" type="text"
                                                    class="form-control" placeholder="Bank Address" disabled="true">
                                                {{-- <div class="invalid-feedback">This field is required.</div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateGCASHno" class="form-group-profile">
                                                <label for="gcash_no" style="color: #A4A6B3;">Gcash Number</label>
                                                <input id="gcash_no" name="gcash_no" type="text"
                                                    class="form-control" placeholder="Gcash Number" disabled="true"
                                                    maxlength="11">
                                                {{-- onblur="editValidateGCASHno(this)" --}}
                                                {{-- <div id="error_gcash_no" class="invalid-feedback">This field is required.</div> --}}

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 bottom10">
                                            <div class="form-group-profile">
                                                <label for="date_hired" style="color: #A4A6B3;">Date Hired</label>
                                                <input type="text" id="date_hired" name="date_hired"
                                                    class="datepicker_input form-control" placeholder="Date Hired"
                                                    required autocomplete="off" disabled="true">
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 bottom20">
                                            <button type="button" id="edit_profile"
                                                style="width:100%;color:white; background-color: #CF8029;"
                                                class="btn">Edit
                                                Profile</button>
                                            <button type="button" id="cancel_edit_profile"
                                                style="width:100%;color:#CF8029; background-color: #f3f3f3;"
                                                class="btn d-none">Cancel</button>
                                        </div>
                                        <div class="col-sm-6 bottom20">
                                            <button type="submit" id="button-submit"
                                                style="width:100%;color:white; background-color: #CF8029;"
                                                class="btn">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-8 bottom10" style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white h-100" style="padding:20px">
                    <div class="card-body">
                        <ul class="nav nav-pills bottom20" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation" style="width:50%;" id="pills-invoice-tab">
                                <a href="#pills-invoice" data-bs-toggle="pill" data-bs-target="#pills-invoice"
                                    class="nav-link active text-center" data-toggle="tab">Invoices</a>
                            </li>

                            <li class="nav-item" role="presentation" style="width:50%" id="pills-deduction-tab">
                                <a style="width:100%" href="#pills-deduction" data-bs-toggle="pill"
                                    data-bs-target="#pills-deduction" class="nav-link text-center"
                                    data-toggle="tab">Deductions</a>
                            </li>
                        </ul>

                        <div class="has-search">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-invoice" role="tabpanel"
                                    aria-labelledby="pills-invoice-tab">

                                    <div class="row">
                                        <div class="col-lg-4 bottom20">
                                            <button style="color:white; background-color: #CF8029;" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" type="submit" id="button-addon2"
                                                name="button-addon2" class="btn form-check-inline pe-3 w-100 "><i
                                                    class="fa fa-plus pe-1"></i>Create Invoice</button>
                                        </div>
                                        <div class="col-lg-4 bottom20">
                                            <select class="form-check-inline form-select" id="filter_all_invoices">
                                                <!-- <option selected value="" disabled>Filter</option> -->
                                                <option value="All">All</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Overdue" hidden>Overdue</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 bottom20">
                                            <div class="has-search">
                                                <span class="fa fa-search form-control-feedback"
                                                    style="color:#A4A6B3"></span>
                                                <input type="text" class="form-control" id="search_invoice"
                                                    placeholder="Search">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive" style="max-height:1232px !important">
                                                <table style="color: #A4A6B3;font-size: 14px;" class="table table-hover"
                                                    id="dataTable_invoice">
                                                    <thead>
                                                        <tr>
                                                            <th class="fit">Invoice #</th>
                                                            <th class="fit text-center">Payment Status</th>
                                                            <th class="fit text-end">Total Amount</th>
                                                            <th class="fit text-end">Date Created</th>
                                                            <th class="fit text-end">Due Date</th>
                                                            <th class="fit text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center" colspan="6">
                                                                <div class="noData"
                                                                    style="width:' +
                                                  width +
                                                  'px;position:sticky;overflow:hidden;left: 0px;font-size:25px">
                                                                    <div class="noDataLoader"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-none" id="selectActive">
                                                <div class="input-group" style="width:145px !important">
                                                    <select id="tbl_showing_activeProfilePages" class="form-select">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="75">75</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                    <span class="input-group-text border-0">/Page</span>
                                                </div>
                                            </div>
                                            <div style="display:flex;justify-content:center;"
                                                class="page_showing pagination-alignment " id="tbl_showing_invoice"></div>
                                            <div class="pagination-alignment"
                                                style="display:flex;justify-content:center;">
                                                <ul style="display:flex;justify-content:flex-start;margin-top:15px"
                                                    class="pagination pagination-sm flex-wrap"
                                                    id="tbl_pagination_invoice">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-deduction" role="tabpanel"
                                    aria-labelledby="pills-deduction-tab">

                                    <div class="row">
                                        <div class="col-lg-4 bottom20">
                                            <button type="button" id="submit-create-deduction"
                                                class="btn form-check-inline pe-3" data-bs-toggle="modal"
                                                data-bs-target="#modal-create-deduction"
                                                style="color:white; background-color: #CF8029;width:100%">
                                                <i class="fa fa-plus pe-1"></i>
                                                Custom Deduction
                                            </button>
                                        </div>

                                        <div class="col-lg-4 bottom20">
                                            <select id="deductionDropSearch" class="form-select">
                                            </select>
                                        </div>

                                        <div class="col-lg-4 bottom20">
                                            <div class=" has-search">
                                                <span class="fa fa-search form-control-feedback"
                                                    style="color:#A4A6B3"></span>
                                                <input type="text" class="form-control" id="search_deduction"
                                                    placeholder="Search">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 d-flex align-items-center justify-content-between">
                                            <label class="d-flex align-items-center" for="deductionButton"
                                                style="color: #A4A6B3;">Deduction
                                                Types</label>
                                            {{-- </div>
                                        <div class="col-sm-1"> --}}
                                            {{-- style="color:white; background-color: #CF8029;" --}}
                                            <button type="button" id="submit-customize-create-deduction"
                                                class="border-0 bg-transparent " data-bs-toggle="modal"
                                                data-bs-target="#modal-customize-create-deduction">
                                                <i class="fa fa-plus-circle" style="font-size:25px;color:#CF8029"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="deductionButton" style="word-wrap: break-word;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive" style="max-height:1147px !important">
                                                <table style="color: #A4A6B3;font-size: 14px;" class="table table-hover"
                                                    id="dataTable_deduction">
                                                    <thead>
                                                        <tr>
                                                            <th class="fit" hidden>ID</th>
                                                            <th class="fit">Invoice #</th>
                                                            <th class="fit text-center">Payment Status</th>
                                                            <th class="fit text-end">Deduction Name</th>
                                                            <th class="fit text-end">Amount</th>
                                                            <th class="fit text-end">Date Created</th>
                                                            <th class="fit text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center" colspan="5">
                                                                <div class="noData"
                                                                    style="width:' +
                                                  width +
                                                  'px;position:sticky;overflow:hidden;left: 0px;font-size:25px">
                                                                    <div class="noDataLoader"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-none" id="selectDeductionTypes">
                                                <div class="input-group" style="width:145px !important">
                                                    <select id="tbl_showing_deductionTypesPages" class="form-select">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="75">75</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                    <span class="input-group-text border-0">/Page</span>
                                                </div>
                                            </div>
                                            <div style="display:flex;justify-content:center;"
                                                class="page_showing pagination-alignment " id="tbl_showing_deduction">
                                            </div>
                                            <div class="pagination-alignment"
                                                style="display:flex;justify-content:center;">
                                                <ul style="display:flex;justify-content:flex-start;margin-top:15px"
                                                    class="pagination pagination-sm flex-wrap"
                                                    id="tbl_pagination_deduction"></ul>
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
    </div>

    <!-- START CREATE INVOICE MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="hide-content">
                <div class="modal-body">
                    <div class="row">
                        <form id="invoice_items" class="g-3 needs-validation" novalidate>
                            @csrf
                            <div class="row " id="header">
                                <div class="col-md-6 w-100" style="padding-right:5px;padding-left:5px;">
                                    <div class="card-border shadow bg-white h-100" style="padding:20px">
                                        <div class="card-body">

                                            <div class="row" id="header">
                                                <input id="profile_id" type="text" hidden>
                                                <!-- <label class="formGroupExampleInput2">Invoice #</label> -->
                                                <div class="row">
                                                    <div class="col-sm-12 bottom20">
                                                        <span class="fs-3 fw-bold">Create Invoice</span>
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
                                                                <div class="invalid-feedback">This field is required.</div>
                                                            </div>
                                                            <!-- <input id="due_date" name="due_date" type="date" class="form-control"> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <div class="col ">
                                                            <div class="form-group-profile">
                                                                <label for="description"
                                                                    style="color:#A4A6B3">Description</label>
                                                                <input id="description" placeholder="Description"
                                                                    name="description" type="text"
                                                                    class="form-control" required>
                                                                <div class="invalid-feedback">This field is required.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12  " id="show_items">
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

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-lg-4 bottom20"
                                                            style="display: flex;align-items: start;">
                                                            <div>
                                                                <label class="formGroupExampleInput2"
                                                                    style="color:#A4A6B3">Discount Type</label>
                                                                <br>
                                                                {{-- name="discount_type" id="discount_type" --}}
                                                                <input class="form-check-input" type="radio"
                                                                    name="discount_type" id="discount_type"
                                                                    value="Fixed">
                                                                <label class="formGroupExampleInput2">
                                                                    Fixed &nbsp;
                                                                </label>
                                                                {{-- name="discount_type" id="discount_type" --}}
                                                                <input class="form-check-input" type="radio"
                                                                    name="discount_type" id="discount_type"
                                                                    value="Percentage">
                                                                <label class="formGroupExampleInput2">
                                                                    Percentage
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 bottom20">
                                                            <div id="col_discount_amount" class="">
                                                                <label for="discount_amount" class="label_discount_amount"
                                                                    style="color:#A4A6B3">Discount
                                                                    Amount ($)</label>
                                                                <input type="text" step="any"
                                                                    style="text-align:right;" name="discount_amount"
                                                                    id="discount_amount" class="form-control"
                                                                    maxlength="6" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 bottom20">
                                                            <div id="col_discount_total" class="">
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
                                                </div>

                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <div class="col-lg-12" style="justify-content:end;display:flex">
                                                            <div class="topBottom20" style="width: 290px !important;">
                                                                <div class="input-group">
                                                                    <label class="d-flex align-items-center"
                                                                        for="sub_total" style="color:#A4A6B3">Subtotal
                                                                        ($):
                                                                    </label>
                                                                    <input type="text"
                                                                        style="font-weight: bold;text-align:right;border:none;background-color:white"
                                                                        name="sub_total" id="sub_total"
                                                                        class="form-control no-outline sub_total"
                                                                        tabindex="-1" readonly>
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
                                                                    style="font-weight: bold;border:none;background-color:white"
                                                                    class="text-start form-control dollar_amount"
                                                                    disabled />
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div>
                                                                <label for="peso_rate" style="color:#A4A6B3">Peso Rate
                                                                    (Php)</label>
                                                                <input type="text"
                                                                    style="font-weight: bold;border:none;background-color:white"
                                                                    onkeypress="return onlyNumberKey(event)"
                                                                    id="peso_rate" class="text-start form-control"
                                                                    disabled />
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div>
                                                                <label for="converted_amount"
                                                                    style="color:#A4A6B3">Converted
                                                                    Amount (Php)</label>
                                                                <input type="text"
                                                                    style="font-weight: bold;border:none;background-color:white"
                                                                    onkeypress="return onlyNumberKey(event)"
                                                                    id="converted_amount"
                                                                    class="text-start form-control converted_amount"
                                                                    disabled />
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

                                                <div class="col-12" id="show_deduction_items">
                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <div class="input-group" style="width: 290px">
                                                                <label for="grand_subTotal"
                                                                    class="fw-bold d-flex align-items-center">Grand
                                                                    Total($):</label>

                                                                <input type="text" id="grand_subTotal"
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

                                                    <div class="col-12">
                                                        <div class="row ">
                                                            <div class="col-sm-6 bottom20">
                                                                <button type="button" id="closeAddDeduction"
                                                                    class="btn w-100"
                                                                    style="color:#CF8029; background-color:#f3f3f3;"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                            </div>
                                                            <div class="col-sm-6 bottom20 ">
                                                                <button type="submit" id="save" class="btn w-100"
                                                                    style="color:White; background-color:#CF8029;">Save</button>
                                                            </div>
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

    <div style="position:fixed;top:60px;right:20px;z-index:99999;justify-content:flex-end;display:flex;">
        <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div id="notifyIcon"></i></div>
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

    <!-- MODAL FOR CREATING DEDUCTION -->
    <div class="modal fade" id="modal-create-deduction"role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="hide-content">
                <div class="modal-body">
                    <form id="deduction_Store" class="g-3 needs-validation" novalidate>
                        @csrf
                        <div class="card-border shadow bg-white h-100" style="padding:20px">
                            <div class="card-body">
                                <div class="row " id="header">
                                    <div class="col-md-12  w-100">
                                        <div class="row">
                                            <div class="col bottom20">
                                                <span class="fs-3 fw-bold">Add Custom Deduction</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div id="mobileValidateSelectDeductionname" class="form-group-profile">
                                                    <input type="text" id="Deduction_profile_id" hidden>
                                                    <label for="deduction_name" style="color:#A4A6B3">Deduction
                                                        Name:</label>
                                                    <input type="text" id="deduction_name"
                                                        class="deduction_name form-control"
                                                        onblur="validateCreateDeduction(this)"
                                                        placeholder="Deduction name" required>
                                                    {{-- THIS IS ORIGINAL --}}
                                                    {{-- <select class="Deduction_deduction_name form-select"
                                                        onblur="validateSelectProfileDeduction(this)"
                                                        id="Deduction_deduction_name" required>
                                                    </select> --}}
                                                    <div id="invalid-feedback-Deduction-name" class="invalid-feedback">
                                                        This field is required.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 bottom10">
                                                <div class="form-group-profile">
                                                    <label for="Deduction_deduction_amount"
                                                        style="color:#A4A6B3">Amount</label>
                                                    <input id="Deduction_deduction_amount"
                                                        name="Deduction_deduction_amount" maxlength="6" type="text"
                                                        class="Deduction_deduction_amount form-control"
                                                        placeholder="Amount" required>
                                                    <div class="invalid-feedback">
                                                        This field is required.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 bottom20">
                                                <button type="button" class="btn w-100"
                                                    style="color:#CF8029; background-color:#f3f3f3; "
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col-sm-6 bottom20">
                                                <button type="submit" id="Deduction_button" class="btn w-100"
                                                    style="color:White; background-color:#CF8029;">Add</button>
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
    <!-- MODAL FOR CREATING DEDUCTION -->

    <!-- NEW START MODAL ADD CUSTOMIZE FOR PROFILE DEDUCTION -->
    <div class="modal fade" id="modal-customize-create-deduction" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="hide-content">
                <div class="modal-body">
                    <form id="custom_deductiontype_store" class="g-3 needs-validation" novalidate>
                        @csrf
                        <div class="card-border shadow bg-white h-100" style="padding:20px">
                            <div class="card-body">
                                <div class="row" id="header">
                                    <div class="col-md-12 w-100">
                                        <div class="row">
                                            <div class="col bottom20">
                                                {{-- <span class="fs-3 fw-bold">Add Custom Deduction</span> --}}
                                                <span class="fs-3 fw-bold">Add Deduction</span>
                                            </div>
                                        </div>
                                        <input type="text" id="custom_profile_id" hidden>
                                        <div class="row">
                                            <div class="col-12  ">
                                                <div id="mobileValidateStoreDeductionname" class="form-group-profile">
                                                    <div class="form-group-profile">
                                                        <label for="createDeduction_deduction_name"
                                                            style="color:#A4A6B3">Dedution Name:</label>

                                                        <select class="Deduction_deduction_name form-select"
                                                            onblur="validateSelectProfileDeduction(this)"
                                                            id="Deduction_deduction_name" required>
                                                        </select>
                                                        {{-- <input id="createDeduction_deduction_name"
                                                            name="createDeduction_deduction_name" type="text"
                                                            class="createDeduction_deduction_name form-control"
                                                            onblur="validateProfileDeduction(this)"
                                                            placeholder="Deduction Name" required> --}}
                                                        <div id="invalid-feedback-Deduction-name"
                                                            class="invalid-feedback">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 bottom10">
                                                <div class="form-group-profile">
                                                    <label for="createDeduction_deduction_amount"
                                                        style="color:#A4A6B3">Amount</label>
                                                    <input id="createDeduction_deduction_amount"
                                                        name="createDeduction_deduction_amount" type="text"
                                                        class="createDeduction_deduction_amount form-control"
                                                        placeholder="Amount" maxlength="6" required>
                                                    <div id="invalid-feedback-deduction-amount" class="invalid-feedback">
                                                        This field is required.</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 bottom20">
                                                <button type="button" class="btn w-100"
                                                    style="color:#CF8029; background-color:#f3f3f3; "
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col-sm-6 bottom20">
                                                <button type="submit" id="createDeduction_button" class="btn w-100"
                                                    style="color:White; background-color:#CF8029;">Add</button>
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
    <!-- NEW START MODAL ADD CUSTOMIZE FOR PROFILE DEDUCTION -->

    <!-- MODAL FOR EDITING DEDUCTION -->
    <div class="modal fade" id="modal-edit-deduction"role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="hide-content">
                <div class="modal-body">
                    <form id="deduction_update" class="g-3 needs-validation" novalidate>
                        @csrf
                        <div class="card-border shadow bg-white h-100" style="padding:20px">
                            <div class="card-body">
                                <div class="row " id="header">
                                    <div class="col-md-12  w-100">
                                        <div class="row">
                                            <div class="col bottom20">
                                                <span class="fs-3 fw-bold">Update Deduction</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div id="mobileValidateSelectDeductionname" class="form-group-profile">
                                                    <input type="text" id="deduction_id" hidden>
                                                    <label for="edit_deduction_name" style="color:#A4A6B3">Deduction
                                                        Name:</label>
                                                    <input type="text" id="edit_deduction_name"
                                                        class="edit_deduction_name form-control"
                                                        onblur="editValidateCreateDeduction(this)"
                                                        placeholder="Deduction name" required>
                                                    {{-- <select class="Deduction_deduction_name form-select"
                                                      onblur="validateSelectProfileDeduction(this)"
                                                      id="Deduction_deduction_name" required>
                                                  </select> --}}
                                                    <div id="invalid-feedback-edit-Deduction-name"
                                                        class="invalid-feedback">
                                                        This field is required.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 bottom10">
                                                <div class="form-group-profile">
                                                    <label for="edit_deduction_amount"
                                                        style="color:#A4A6B3">Amount</label>
                                                    <input id="edit_deduction_amount" name="edit_deduction_amount"
                                                        maxlength="6" type="text"
                                                        class="edit_deduction_amount form-control" placeholder="Amount"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        This field is required.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col bottom20">
                                                <button type="button" class="btn w-100"
                                                    style="color:#CF8029; background-color:#f3f3f3; "
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col bottom20">
                                                {{-- id="Deduction_button" --}}
                                                <button type="submit" class="btn w-100"
                                                    style="color:White; background-color:#CF8029;">Update</button>
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
    <!-- MODAL FOR EDITING DEDUCTION -->



    <!-- START MODAL PROFILE DEDUCTION TYPE EDIT -->
    <div class="modal fade" id="ProfileDeductioneditModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="hide-content ">
                <div class="modal-body ">
                    <form id="ProfileDeductiontype_update" class="g-3 needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="card-border shadow bg-white h-100" style="padding:20px">
                                <div class="card-body">
                                    <div class="row " id="header">
                                        <div class="col-md-12 w-100">
                                            <div class="row">
                                                <div class="col bottom20">
                                                    <span class="fs-3 fw-bold"> Update Profile Deduction</span>
                                                </div>
                                            </div>
                                            <input type="text" id="profileDeductionType_id" hidden>
                                            <input type="text" id="profileDeductionType_profileId" hidden>

                                            <div class="row">
                                                <div class="col ">
                                                    <div id="mobileValidateDeductionname" class="form-group-profile">
                                                        <label for="edit_profileDeductionType_name"
                                                            style="color:#A4A6B3">Profile Deduction Name</label>
                                                        <input type="text" id="edit_profileDeductionType_name"
                                                            name="edit_profileDeductionType_name"
                                                            onblur="editValidateProfileDeductionname(this)"
                                                            class="form-control" required>
                                                        <div id="error_edit_deduction_name" class="invalid-feedback">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col ">
                                                    <div class="form-group-profile">
                                                        <label for="edit_profileDeductionType_amount"
                                                            style="color:#A4A6B3">Amount</label>
                                                        <input id="edit_profileDeductionType_amount"
                                                            name="edit_profileDeductionType_amount" type="text"
                                                            class="form-control" placeholder="Amount" maxlength="6"
                                                            required>
                                                        <div class="invalid-feedback">This field is required.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4 bottom20">
                                                    <button type="button" class="btn w-100" id="cancelProfileDeduction"
                                                        data-bs-dismiss="modal"
                                                        style="color:#CF8029; background-color:#f3f3f3;">Cancel</button>
                                                </div>

                                                <div class="col-sm-4 bottom20">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal" id="deleteProfileDeduction"
                                                        class="btn btn-danger w-100"
                                                        style="color:White; background-color:#dc3545;">Delete</button>
                                                </div>
                                                <div class="col-sm-4 bottom20">
                                                    <button type="submit" class="btn w-100"
                                                        id="profile_deduction_update"
                                                        style="color:White; background-color:#CF8029; ">Update</button>
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
    <!-- END MODAL PROFILE DEDUCTION TYPE EDIT -->

    <!-- START MODAL UPDATE INVOICE STATUS -->
    <div class="modal fade" id="invoice_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="hide-content ">
                <div class="modal-body ">
                    <form id="update_invoice_status">
                        @csrf
                        <div class="row">
                            <div class="card-border shadow bg-white h-100" style="padding:20px">
                                <div class="row " id="header">
                                    <div class="col-md-12 w-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col bottom20">
                                                    <span class="fs-3 fw-bold">Update Payment Status</span>
                                                </div>
                                            </div>
                                            <input type="text" id="updateStatus_invoiceNo" hidden>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="select_invoice_status"
                                                            style="color:#A4A6B3">Status</label>
                                                        <select class="form-select" id="select_invoice_status">
                                                            <option value="" Selected disabled>Please choose status
                                                            </option>

                                                            <option value="Pending">Pending</option>
                                                            <option value="Paid">Paid</option>
                                                            <option value="Cancelled">Cancelled</option>
                                                            <option value="Overdue" hidden>Overdue</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col bottom20">
                                                    <button type="button" class="btn w-100"
                                                        style="color:#CF8029; background-color:#f3f3f3; "
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                                <div class="col bottom20">
                                                    <button type="submit" id="update" class="btn w-100"
                                                        style="color:White; background-color:#CF8029; ">Update</button>
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
    <!-- START MODAL UPDATE INVOICE STATUS -->

    <!-- Modal FOR DELETE -->
    <div class="modal fade" style="z-index: 999999" id="deleteModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
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
                            <span id="profilededuction_id" hidden></span>
                            <span class="text-muted"> Do you really want to delete this record? This process cannot be
                                undone.</span>
                        </div>
                    </div>

                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn  w-100" data-bs-dismiss="modal"
                                style="color:white; background-color:#A4A6B3;">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="profilededuction_delete"
                                class="btn btn-danger w-100">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal FOR DEDUCTION DELETE -->
    <div class="modal fade" style="z-index: 999999" id="deleteDeductionModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
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
                            <span id="delete_deduction_id" hidden></span>
                            <span class="text-muted"> Do you really want to delete this record? This process cannot be
                                undone.</span>
                        </div>
                    </div>

                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn  w-100" data-bs-dismiss="modal"
                                style="color:white; background-color:#A4A6B3;">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="deduction_delete" class="btn btn-danger w-100">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="hide-content">
                <div class="modal-body">
                    <div class="card-border shadow p-2 bg-white h-100">
                        <div class="row px-4 py-4 " id="header">
                            <div class="col-md-12 w-100">
                                <div class="row ">
                                    <div class="col" style="margin-bottom:15px">
                                        <span class="fs-3 fw-bold"> Update Profile Image</span>
                                    </div>
                                </div>
                                <div class="row d-none" id="imageRow">
                                    <div class="col" style="margin-top:15px">
                                        <div id="image_demo"></div>
                                        <div id="uploaded_image" style="width: 350px;"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="display: flex;justify-content: center;">
                                        <label class="label">
                                            <input type="file" name="upload_image" id="upload_image" />
                                            <span>Select a file</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6" style="margin-top:15px">

                                        <button type="button" class="btn w-100"
                                            style="background-color: #A4A6B3; color: white;"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-6" style="margin-top:15px">
                                        <button type="button" id="imageCrop" class="btn"
                                            style="width: 100%; background-color: #CF8029; color: white;">Crop</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        let x = 1;

        const PHP = value => currency(value, {
            symbol: '',
            decimal: '.',
            separator: ','
        });

        // VALIDATE PROFILE DEDUCTION TYPE NAME
        // invalid-feedback-storeDeduction-name
        function validateSelectProfileDeduction(e) {
            let PDT = $('#custom_profile_id').val();
            let data = {
                id: PDT,
                deduction_type_id: e.value
            }
            console.log("Deduction_deduction_name", data);
            axios.post(apiUrl + "/api/validateSelectProfileDeduction", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#Deduction_deduction_name").removeClass('is-invalid');
                    $("#invalid-feedback-Deduction-name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                } else {
                    $("#Deduction_deduction_name").removeClass('is-invalid');
                    $("#invalid-feedback-Deduction-name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error)
                console.log("ERROR", $("#Deduction_deduction_name").val());
                if (error.response.data.errors.deduction_type_id) {
                    if (error.response.data.errors.deduction_type_id.length > 0) {
                        $error = error.response.data.errors.deduction_type_id[0];
                        if ($("#Deduction_deduction_name").val() === null) {
                            $("#invalid-feedback-Deduction-name").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                        }
                        $("#Deduction_deduction_name").addClass('is-invalid');
                    }
                }
            })
        }

        // VALIDATE DEDUCTION TYPE NAME
        function validateCreateDeduction(e) {
            let PDT = $('#Deduction_profile_id').val();
            let data = {
                id: PDT,
                deduction_type_name: e.value
            }
            console.log("Deduction_deduction_name", data);
            axios.post(apiUrl + "/api/validateCreateDeduction", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#deduction_name").removeClass('is-invalid');
                    $("#invalid-feedback-Deduction-name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                } else {
                    $("#deduction_name").removeClass('is-invalid');
                    $("#invalid-feedback-Deduction-name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error)
                console.log("ERROR", $("#deduction_name").val());
                if (error.response.data.errors.deduction_type_name) {
                    if (error.response.data.errors.deduction_type_name.length > 0) {
                        error = error.response.data.errors.deduction_type_name[0];
                        if (error === "The deduction type name field is required.") {
                            $("#invalid-feedback-Deduction-name").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                        } else if (error === "The deduction type name has already been taken.") {
                            $("#invalid-feedback-Deduction-name").addClass('invalid-feedback').html(
                                "The deduction name has already been taken.").show();
                            $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                        }
                        $("#deduction_name").addClass('is-invalid');
                    }
                }
            })
        }
        // VALIDATE EDIT DEDUCTION TYPE NAME
        function editValidateCreateDeduction(e) {
            let deduction_id = $('#deduction_id').val();
            let data = {
                deduction_id: deduction_id,
                deduction_type_name: e.value
            }
            console.log("Deduction_deduction_name", data);
            axios.post(apiUrl + "/api/editValidateCreateDeduction", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#edit_deduction_name").removeClass('is-invalid');
                    $("#invalid-feedback-edit-Deduction-name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                } else {
                    $("#edit_deduction_name").removeClass('is-invalid');
                    $("#invalid-feedback-edit-Deduction-name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error)
                console.log("ERROR", $("#edit_deduction_name").val());
                if (error.response.data.errors.deduction_type_name) {
                    if (error.response.data.errors.deduction_type_name.length > 0) {
                        error = error.response.data.errors.deduction_type_name[0];
                        if (error === "The deduction type name field is required.") {
                            $("#invalid-feedback-edit-Deduction-name").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                        } else if (error === "The deduction type name has already been taken.") {
                            $("#invalid-feedback-edit-Deduction-name").addClass('invalid-feedback').html(
                                "The deduction name has already been taken.").show();
                            $('#mobileValidateSelectDeductionname').removeClass('form-group-adjust');
                        }
                        $("#edit_deduction_name").addClass('is-invalid');
                    }
                }
            })
        }

        // VALIDATE STORE PROFILE DEDUCTION TYPE NAME
        function validateProfileDeduction(e) {
            let PDT = $('#custom_profile_id').val();
            let data = {
                id: PDT,
                deduction_type_name: e.value
            }
            console.log("createDeduction_deduction_name", data);
            axios.post(apiUrl + "/api/validateProfileDeduction", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#createDeduction_deduction_name").removeClass('is-invalid');
                    $("#invalid-feedback-storeDeduction-name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateStoreDeductionname').removeClass('form-group-adjust');
                } else {
                    $("#createDeduction_deduction_name").removeClass('is-invalid');
                    $("#invalid-feedback-storeDeduction-name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateStoreDeductionname').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error)
                if (error.response.data.errors.deduction_type_name) {
                    if (error.response.data.errors.deduction_type_name.length > 0) {
                        $error = error.response.data.errors.deduction_type_name[0];
                        if ($("#createDeduction_deduction_name").val() == "") {
                            $("#invalid-feedback-storeDeduction-name").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateStoreDeductionname').removeClass('form-group-adjust');
                        } else {

                            if ($error == "The deduction type name has already been taken.") {
                                $("#invalid-feedback-storeDeduction-name").addClass('invalid-feedback').html(
                                    "The deduction name has already been taken.").show();
                                $('#mobileValidateStoreDeductionname').addClass('form-group-adjust');
                            }
                        }
                        $("#createDeduction_deduction_name").addClass('is-invalid');
                    }
                }
            })
        }

        // VALIDATE UPDATE
        function editValidateProfileDeductionname(e) {
            let pdt = $('#profileDeductionType_id').val();
            let profile_id = $('#profileDeductionType_profileId').val();
            let data = {
                id: pdt,
                profile_id: profile_id,
                deduction_type_name: e.value
            }
            console.log("PDT", data);
            axios.post(apiUrl + "/api/editValidateProfileDeductionname", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#edit_profileDeductionType_name").removeClass('is-invalid');
                    $("#error_edit_deduction_name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateDeductionname').removeClass('form-group-adjust');
                } else {
                    $("#edit_profileDeductionType_name").removeClass('is-invalid');
                    $("#error_edit_deduction_name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateDeductionname').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error)
                if ($("#edit_profileDeductionType_name").val() == "") {
                    $("#error_edit_deduction_name").addClass('invalid-feedback').html(
                        "This field is required.").show();
                    $('#edit_profileDeductionType_name').addClass('is-invalid');
                    $('#mobileValidateDeductionname').removeClass('form-group-adjust');
                }
                if (error.response.data.errors.deduction_type_name) {
                    if (error.response.data.errors.deduction_type_name.length > 0) {
                        $error = error.response.data.errors.deduction_type_name[0];
                        if ($("#edit_profileDeductionType_name").val() ==
                            "The deduction type name field is required.") {
                            $("#error_edit_deduction_name").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateDeductionname').removeClass('form-group-adjust');
                        } else {
                            if ($error == "The deduction type name has already been taken.") {
                                $("#error_edit_deduction_name").addClass('invalid-feedback').html(
                                    "The deduction name has already been taken.").show();
                                $('#mobileValidateDeductionname').addClass('form-group-adjust');
                            }
                        }
                        $("#edit_profileDeductionType_name").addClass('is-invalid');
                    }
                } else {
                    $("#edit_profileDeductionType_name").removeClass('is-invalid');
                    $("#error_edit_deduction_name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateDeductionname').removeClass('form-group-adjust');
                }
            })
        }

        function editValidateEmail(e) {
            let user_id = $("#user_id").val();
            let data = {
                user_id: user_id,
                email: e.value
            }
            axios.post(apiUrl + "/api/editValidateEmail", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    console.log("VALIDATE", e.value);
                    console.log("VALIDATE", data);
                    $("#email").removeClass('is-invalid');
                    $("#error_email").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateEmail').removeClass('form-group-adjust');


                } else {
                    $("#email").removeClass('is-invalid');
                    $("#error_email").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateEmail').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                if (error.response.data.errors.email) {
                    if (error.response.data.errors.email.length > 0) {
                        $error = error.response.data.errors.email[0];
                        if ($("#email").val() == "") {
                            $("#error_email").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateEmail').removeClass('form-group-adjust');
                        } else {
                            if ($error == "The email must be a valid email address.") {
                                $("#error_email").addClass('invalid-feedback').html(
                                    "The email address must be valid.").show();
                                $('#mobileValidateEmail').removeClass('form-group-adjust');
                            }
                            if ($error == "The email has already been taken.") {
                                $("#error_email").addClass('invalid-feedback').html(
                                    "The email address has already been taken.").show();
                                $('#mobileValidateEmail').addClass('form-group-adjust');
                            }
                        }
                        $("#email").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }

        function editValidateUsername(e) {
            let user_id = $("#user_id").val();
            let data = {
                user_id: user_id,
                username: e.value
            }
            axios.post(apiUrl + "/api/editValidateUsername", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#username").removeClass('is-invalid');
                    $("#error_username").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateUsername').removeClass('form-group-adjust');

                } else {
                    $("#username").removeClass('is-invalid');
                    $("#error_username").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateUsername').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                if (error.response.data.errors.username) {
                    if (error.response.data.errors.username.length > 0) {
                        $error = error.response.data.errors.username[0];
                        if ($("#username").val() == "") {
                            $("#error_username").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateUsername').removeClass('form-group-adjust');
                        } else {

                            if ($error == "The username has already been taken.") {
                                $("#error_username").addClass('invalid-feedback').html(
                                    "The username has already been taken.").show();
                                $('#mobileValidateUsername').addClass('form-group-adjust');
                            }
                        }
                        $("#username").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }

        function editValidateAcctno(e) {
            let user_id = $("#user_id").val();
            let data = {
                user_id: user_id,
                acct_no: e.value
            }
            axios.post(apiUrl + "/api/editValidateAcctno", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#acct_no").removeClass('is-invalid');
                    $("#error_acct_no").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateAcctno').removeClass('form-group-adjust');
                } else {
                    $("#acct_no").removeClass('is-invalid');
                    $("#error_acct_no").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateAcctno').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                if (error.response.data.errors.acct_no) {
                    if (error.response.data.errors.acct_no.length > 0) {
                        $error = error.response.data.errors.acct_no[0];
                        if ($("#acct_no").val() == "") {
                            $("#error_acct_no").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateAcctno').removeClass('form-group-adjust');
                        } else {

                            if ($error == "The acct no has already been taken.") {
                                $("#error_acct_no").addClass('invalid-feedback').html(
                                    "The account number has already been taken.").show();
                                $('#mobileValidateAcctno').addClass('form-group-adjust');
                            }
                        }
                        $("#acct_no").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }

        function editValidateAcctname(e) {
            let user_id = $("#user_id").val();
            let data = {
                user_id: user_id,
                acct_name: e.value
            }
            axios.post(apiUrl + "/api/editValidateAcctname", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#acct_name").removeClass('is-invalid');
                    $("#error_acct_name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateAcctname').removeClass('form-group-adjust');

                } else {
                    $("#acct_name").removeClass('is-invalid');
                    $("#error_acct_name").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateAcctname').removeClass('form-group-adjust');

                }
            }).catch(function(error) {
                if (error.response.data.errors.acct_name) {
                    if (error.response.data.errors.acct_name.length > 0) {
                        $error = error.response.data.errors.acct_name[0];
                        if ($("#acct_name").val() == "") {
                            $("#error_acct_name").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateAcctname').removeClass('form-group-adjust');

                        } else {

                            if ($error == "The acct name has already been taken.") {
                                $("#error_acct_name").addClass('invalid-feedback').html(
                                    "The account name has already been taken.").show();
                                $('#mobileValidateAcctname').addClass('form-group-adjust');

                            }
                        }
                        $("#acct_name").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }

        function editValidateGCASHno(e) {
            let user_id = $("#user_id").val();
            let data = {
                user_id: user_id,
                gcash_no: e.value
            }
            axios.post(apiUrl + "/api/editValidateGCASHno", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#gcash_no").removeClass('is-invalid');
                    $("#error_gcash_no").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateGCASHno').removeClass('form-group-adjust');

                } else {
                    $("#gcash_no").removeClass('is-invalid');
                    $("#error_gcash_no").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateGCASHno').removeClass('form-group-adjust');

                }
            }).catch(function(error) {
                if (error.response.data.errors.gcash_no) {
                    if (error.response.data.errors.gcash_no.length > 0) {
                        $error = error.response.data.errors.gcash_no[0];
                        if ($("#gcash_no").val() == "") {
                            $("#error_gcash_no").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateGCASHno').removeClass('form-group-adjust');

                        } else {

                            if ($error == "The gcash no has already been taken.") {
                                $("#error_gcash_no").addClass('invalid-feedback').html(
                                    "The GCASH number has already been taken.").show();
                                $('#mobileValidateGCASHno').addClass('form-group-adjust');

                            }
                            if ($error == "The gcash no must be a number.") {
                                $("#error_gcash_no").addClass('invalid-feedback').html(
                                    "The given data is invalid.").show();
                                $('#mobileValidateGCASHno').removeClass('form-group-adjust');

                            }
                        }
                        $("#gcash_no").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }


        window.addEventListener("load", () => {
            width = window.innerWidth;

            if (width <= 320) {
                width = window.innerWidth - 110;
                $('.noData').css('width', width + 'px');
            }
            if (width > 320 && width <= 375) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }
            if (width > 375 && width <= 425) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }

            if (width > 425 && width <= 570) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }

            if (width > 570) {
                width = 'auto';
                $('.noData').css('width', width);
            }

        });

        window.addEventListener("resize", () => {
            width = window.innerWidth;
            if (width <= 320) {
                width = window.innerWidth - 110;
                $('.noData').css('width', width + 'px');
            }
            if (width > 320 && width <= 375) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }
            if (width > 375 && width <= 425) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }
            if (width > 425 && width <= 570) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }
            if (width > 570) {
                width = 'auto';
                $('.noData').css('width', width);
            }
        });

        function tableLoader() {
            var originalText = $('.noDataLoader').html();
            $('.noDataLoader').html(
                `<span id="button-spinner" style="color:#CF8029"  class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            );
            setTimeout(function() {
                $('.noDataLoader').html(originalText);
            }, 1500);
        }
        // INVOICE SEARCH AND DISPLAY
        $(document).ready(function() {
            tableLoader();
            let pageSize = 10; // initial page size
            //  For creating invoice codes
            const api = "https://api.exchangerate-api.com/v4/latest/USD";
            // due_datee();
            // date_hired();
            setTimeout(function() {
                display_item_rows();
                check_ActivependingInvoices();
                show_profileDeductionType_Button();
                show_Profilededuction_Table_Active();
                show_profileDeductionType_select();
                show_profile_deductions_onSelect();
                show_edit()
                show_data();
            }, 1500)

            $(document).on('click', '#edit_profile', function(e) {
                e.preventDefault();
                // BUTTON SPINNER
                var originalText = $(this).html();
                $(this).html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                setTimeout(function() {
                    $(this).html(originalText);
                }, 300);
            })

            $(document).on('click', '#cancel_edit_profile', function(e) {
                e.preventDefault();
                // BUTTON SPINNER
                var originalText = $(this).html();
                $(this).html(
                    `<span id="button-spinner" style="backgound-color:#f3f3f3;color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                setTimeout(function() {
                    $(this).html(originalText);
                }, 300);
            })

            function show_profileDeductionType_select() {
                let url = window.location.pathname;
                let urlSplit = url.split('/');

                if (urlSplit.length === 5) {
                    let profile_id = urlSplit[4];
                    // console.log("profile_id", profile_id);
                    $('#deductionDropSearch').empty();
                    axios.get(apiUrl + '/api/settings/show_profileDeductionType_Button/' + profile_id, {
                            headers: {
                                Authorization: token,
                            },
                        })
                        .then(function(response) {
                            let data = response.data;
                            if (data.success) {
                                let label = '';
                                label +=
                                    `<option value="">Please Select Deduction Types</option>`;
                                if (data.data.profile_deduction_types.length > 0) {

                                    data.data.profile_deduction_types.map((item) => {
                                        label +=
                                            "<option value=" +
                                            item.deduction_type_name + ">" + item.deduction_type_name +
                                            "</option>";
                                    })
                                    $("#deductionDropSearch").append(label);
                                    return '';
                                } else {
                                    let label = '';
                                    label +=
                                        `<option value="">Please Select Deduction Types</option>`;
                                    label +=
                                        `<option value="" class="text-start">No Data</option>`;
                                    $("#deductionDropSearch").append(label);
                                    return '';
                                }
                            }
                        })
                        .catch(function(error) {

                            console.log("catch error", error);
                        });
                }
            }

            $('#due_date').each(function() {
                const datepicker = new Datepicker(this, {
                    'format': 'yyyy/mm/dd',
                });
                $(this).on('changeDate', function() {
                    datepicker.hide();
                });
            });

            $('#date_hired').each(function() {
                const datepicker = new Datepicker(this, {
                    'format': 'yyyy/mm/dd',
                });
                $(this).on('changeDate', function() {
                    datepicker.hide();
                });
            });

            // START CODE FOR CROPING IMAGE
            $('#uploadBtn').on('click', function() {
                $('#previewModal').modal('show');
            })

            $("#previewModal").on('hide.bs.modal', function() {
                document.getElementById("upload_image").value = "";
                $('#imageRow').addClass('d-none')
            });

            $('#upload_image').on('change', function() {
                $('#imageRow').removeClass('d-none')
                var reader = new FileReader();
                reader.onload = function(event) {
                    $uploadCrop.croppie('bind', {
                        url: event.target.result
                    })
                }
                reader.readAsDataURL(this.files[0]);
            })

            $uploadCrop = $('#image_demo').croppie({
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'circle'
                },
                boundary: {
                    width: $('#container').width(),
                    height: 300
                }
            });

            let old_file_original_name = "";
            let old_file_name = "";
            let old_file_path = "";

            let file_original_name = "";
            let file_name = "";
            let file_path = "";

            $('#imageCrop').on('click', function(e) {
                e.preventDefault();
                var originalText = $('#imageCrop').html();
                // add spinner to button
                $('#imageCrop').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    let formData = new FormData();
                    formData.append('image', response);

                    axios.post(apiUrl + "/api/imagePreview", formData, {
                        headers: {
                            Authorization: token,
                            "Content-Type": "multipart/form-data",
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#imageCrop').html(originalText);
                            $('#previewModal').modal('hide');
                            $('div.spanner').addClass('show');
                            setTimeout(function() {
                                $('div.spanner').removeClass('show');
                                // $('#notifyIcon').html(
                                //     '<i class="fa-solid fa-check" style="color:green"></i>'
                                // );
                                // $('.toast1 .toast-title').html('Success');
                                // $('.toast1 .toast-body').html(data.message);
                                $('#photo').attr('src',
                                    '{{ asset('storage/images') }}/' + data
                                    .image);
                                // console.log("data.image", data);
                                file_original_name = data.image ? data.image :
                                    "";
                                file_name = data.image ? data.image : "";;
                                file_path = data.path ? data.path : "";
                                document.getElementById("upload_image").value =
                                    "";
                                $('#imageRow').addClass('d-none')
                                // toast1.toast('show');
                            }, 1500)
                        }
                    }).catch(function(error) {
                        $('#notifyIcon').html(
                            '<i class="fa-solid fa-x" style="color:#dc3545"></i>');
                        $('.toast1 .toast-title').html('Error');
                        $('.toast1 .toast-body').html("Something went wrong.");
                        toast1.toast('show');
                    });
                })
            });
            // END CODE FOR CROPING IMAGE

            $('#cancel_edit_profile').addClass('d-none');
            // REFRESH WHEN THIS PAGE IS LOAD

            var currentPage = apiUrl + "/admin/current";
            $('#collapseLayouts a').each(function() {
                // Compare the href attribute of the link to the current page URL
                if (currentPage.indexOf($(this).attr('href')) !== -1) {
                    // If there is a match, add the "active" class to the link
                    $(this).addClass('active');

                    // Trigger a click event on the parent link to expand the collapsed section
                    $(this).parent().parent().addClass("show");
                    $(this).parent().parent().addClass("active");
                    $('[data-bs-target="#collapseLayouts"]').addClass('active');
                }
            });


            let toast1 = $('.toast1');
            toast1.toast({
                delay: 3000,
                animation: true,

            });

            $('.close').on('click', function(e) {
                e.preventDefault();
                toast1.toast('hide');
            });

            $('#cancel_edit_profile').on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $('#sb-nav-fixed').offset().top
                }, 'slow');
                setTimeout(function() {
                    location.reload(true); // refresh the page
                }, 1500);
                $('#cancel_edit_profile').addClass('d-none');
                $('#edit_profile').removeClass('d-none');
            })

            $('#edit_profile').on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $('#sb-nav-fixed').offset().top
                }, 'slow');

                $('div.spanner').addClass("show");
                setTimeout(function() {
                    $('div.spanner').removeClass("show");
                    const imgDiv = document.querySelector(
                        ".profile-pic-div_adminActiveProfile");
                    //if user hover on img div
                    imgDiv.addEventListener("mouseenter", function() {
                        uploadBtn.style.display = "block";
                    });

                    //if we hover out from img div
                    imgDiv.addEventListener("mouseleave", function() {
                        uploadBtn.style.display = "none";
                    });
                    $('#file').prop('disabled', false);
                    $('#profile_status').prop('disabled', false);
                    $('#first_name').prop('disabled', false);
                    $("#last_name").prop('disabled', false);
                    $("#email").prop('disabled', false);
                    $("#position").prop('disabled', false);
                    $("#username").prop('disabled', false);
                    $("#phone_number").prop('disabled', false);
                    $("#address").prop('disabled', false);
                    $("#province").prop('disabled', false);
                    $("#city").prop('disabled', false);
                    $("#zip_code").prop('disabled', false);
                    $("#profile_status").prop('disabled', false);
                    $("#acct_no").prop('disabled', false);
                    $("#bank_name").prop('disabled', false);
                    $("#acct_name").prop('disabled', false);
                    $("#bank_address").prop('disabled', false);
                    $("#gcash_no").prop('disabled', false);
                    $("#date_hired").prop('disabled', false);
                    $('#edit_profile').addClass('d-none');
                    $('#cancel_edit_profile').removeClass('d-none');
                }, 1500);
            })

            // UPDATE INVOICE STATUS

            // SHOW CURRENT INVOICE STATUS
            $(document).on('click', '#dataTable_invoice #get_invoiceStatus', function(e) {
                e.preventDefault();
                let rowData = $(this).closest('tr');
                let invoice_no = rowData.find("td:eq(0)").text();
                $('#updateStatus_invoiceNo').val(invoice_no);
                // let invoice_status = $('#select_invoice_status').val();
                // console.log("INVOICE NO", invoice_no + " " + invoice_status);

                axios.get(apiUrl + '/api/getInvoiceStatus/' + invoice_no, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        console.log("DATA", data);
                        let status = data.data;
                        if (status == "Paid") {
                            $('#select_invoice_status').val(data.data);
                            $('#select_invoice_status').prop('disabled', true);
                            $('#update').prop('disabled', true);
                        } else {
                            $('#select_invoice_status').val(data.data);
                            $('#select_invoice_status').prop('disabled', false);
                            $('#update').prop('disabled', false);
                        }
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            })

            // POST INVOICE STATUS
            $('#update_invoice_status').submit(function(e) {
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

                $('div.spanner').addClass('show');
                $().animate({
                    scrollTop: $('#sb-nav-fixed').offset().top
                }, 'smooth');

                let invoice_id = $('#updateStatus_invoiceNo').val();
                let invoice_status = $('#select_invoice_status').val();

                let data = {
                    id: invoice_id,
                    invoice_status: invoice_status,
                };
                axios.post(apiUrl + '/api/update_status', data, {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data;
                    console.log("DATA", data);
                    if (data.success) {
                        var invoiceTable = $('#dataTable_invoice tbody').html();
                        // Add spinner to the remaining row and set colspan to 5
                        $('#dataTable_invoice tbody').html(
                            `<tr>
                              <td class="text-center" colspan="5"><div class="text-center" colspan="5"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                        );

                        $('#invoice_status').modal('hide');
                        $("div.spanner").addClass("show");
                        setTimeout(function() {
                            $("div.spanner").removeClass("show");
                            $('#dataTable_invoice tbody').html(invoiceTable);

                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>'
                            );
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(response.data.message);
                            // show_data();
                            $('#dataTable_deduction tbody').empty();
                            $('#dataTable_deduction tbody').html(
                                show_Profilededuction_Table_Active());
                            toast1.toast('show');
                            show_data();
                            $('#update').prop("disabled", false);
                        }, 1500);

                    }
                }).catch(function(error) {
                    setTimeout(function() {
                        $('#button-submit').prop("disabled", false);
                    }, 500);
                    if (error.response.data.errors) {
                        let errors = error.response.data.errors;
                        console.log("errors", errors);
                        let fieldnames = Object.keys(errors);

                        Object.values(errors).map((item, index) => {
                            fieldname = fieldnames[0].split('_');
                            fieldname.map((item2, index2) => {
                                fieldname['key'] = capitalize(item2);
                                return ""
                            });
                            fieldname = fieldname.join(" ");
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-x" style="color:#dc3545"></i>');
                            $('.toast1 .toast-title').html("Error");
                            $('.toast1 .toast-body').html(Object.values(errors)[
                                0].join(
                                "\n\r"));
                        })
                        setTimeout(function() {
                            $('div.spanner').removeClass('show');
                            toast1.toast('show');
                        }, 1500);
                    }
                })

            })

            function show_edit() {
                let user_id = $('#user_id').val();
                axios.get(apiUrl + '/api/admin/show_edit/' + user_id, {
                        headers: {
                            Authorization: token,
                        },
                    })
                    .then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            // console.log("SUCCESS");
                            // console.log("GENERAL", data.data.email);
                            // console.log("PROFILE SHOW EDIT", data.data.profile);
                            if (data.data.profile.profile_status === "Active") {
                                $('#profile_status').prop('checked', true);
                            } else {
                                $('#profile_status').prop('checked', false);
                                location.href = apiUrl + "/admin/current"
                            }
                            $('#profile_id_show').val(data.data.profile.id);
                            $('#first_name').val(data.data.first_name);
                            $('#last_name').val(data.data.last_name);
                            $('#email').val(data.data.email);
                            $('#username').val(data.data.username);
                            // $('#password').val(data.data.password);
                            $('#position').val(data.data.profile.position);
                            $('#phone_number').val(data.data.profile.phone_number);
                            $('#address').val(data.data.profile.address);
                            $('#province').val(data.data.profile.province);
                            $('#city').val(data.data.profile.city);
                            $('#zip_code').val(data.data.profile.zip_code);
                            $('#acct_no').val(data.data.profile.acct_no);
                            $('#acct_name').val(data.data.profile.acct_name);
                            $('#bank_name').val(data.data.profile.bank_name);
                            $('#bank_address').val(data.data.profile.bank_address);
                            $('#gcash_no').val(data.data.profile.gcash_no);
                            $('#date_hired').val(data.data.profile.date_hired);
                            $("#photo").attr("src", data.data.profile.file_path);
                            if (data.data.profile.file_path) {
                                $('#photo').val(data.data.profile.file_path);
                            } else {
                                $("#photo").attr("src", "/images/default.png");
                            }
                            old_file_original_name = data.data.profile.file_original_name ? data.data
                                .profile
                                .file_original_name :
                                "";
                            old_file_name = data.data.profile.file_name ? data.data.profile.file_name : "";
                            old_file_path = data.data.profile.file_path ? data.data.profile.file_path : "";

                        }
                    })
                    .catch(function(error) {
                        console.log("ERROR", error);
                    });
            }

            $('#search_invoice').on('change', function() {
                var originalTextTable = $('#dataTable_invoice tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_invoice tbody').html(
                    `<tr>
                    <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $("div.spanner").removeClass("show");
                    $('#tbl_pagination_invoice').empty();
                    show_data();
                }, 500);
            })

            $('#search_deduction').on('change', function() {
                // $('html,body').animate({
                //     scrollTop: $('#sb-nav-fixed').offset().top
                // }, 'slow');
                var originalTextTable = $('#dataTable_deduction tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_deduction tbody').html(
                    `<tr>
                  <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $("div.spanner").removeClass("show");
                    $('#tbl_pagination_deduction').empty();
                    show_Profilededuction_Table_Active();
                }, 500);
            })

            $('#deductionDropSearch').on('change', function() {
                // $('html,body').animate({
                //     scrollTop: $('#sb-nav-fixed').offset().top
                // }, 'slow');
                var originalTextTable = $('#dataTable_deduction tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_deduction tbody').html(
                    `<tr>
                <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $("div.spanner").removeClass("show");
                    $('#tbl_pagination_deduction').empty();
                    show_Profilededuction_Table_Active_Select();
                }, 500);
            })

            // $("#tbl_pagination_invoice").on('click', '.page-item', function() {
            //   $('html,body').animate({
            //     scrollTop: $('#sb-nav-fixed').offset().top
            //   }, 'slow');
            //   $("div.spanner").addClass("show");
            //   setTimeout(function() {
            //     $("div.spanner").removeClass("show")
            //   }, 1500);
            // })
            // $("#tbl_pagination_deduction").on('click', '.page-item', function() {
            //   $('html,body').animate({
            //     scrollTop: $('#sb-nav-fixed').offset().top
            //   }, 'slow');
            //   $("div.spanner").addClass("show");
            //   setTimeout(function() {
            //           $("div.spanner").removeClass("show");
            // 
            // 
            //   }, 1500);
            // })

            $('#filter_all_invoices').on('change', function() {
                // Call the pendingInvoices() function with updated filters

                var originalTextTable = $('#dataTable_invoice tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_invoice tbody').html(
                    `<tr>
                    <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    $('#tbl_pagination_invoice').empty();
                    show_data();
                }, 500);
            });

            // CHECK PENDING INVOICES
            function check_ActivependingInvoices(filters) {
                axios.get(`${apiUrl}/api/admin/check_ActivependingInvoices?${new URLSearchParams(filters)}`, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        if (data.data.length > 0) {
                            data.data.map((item) => {
                                var today = new Date();
                                var due_dateStatus = item.due_date;
                                formatDue_date = moment(due_dateStatus).format('L');
                                formatDate_now = moment(today).format('L');

                                if (item.invoice_status === "Pending") {
                                    if (formatDue_date < formatDate_now) {
                                        let invoice_id = item.id;
                                        let data = {
                                            id: invoice_id,
                                            invoice_status: "Overdue",
                                        }
                                        axios.post(apiUrl + '/api/update_status', data, {
                                            headers: {
                                                Authorization: token
                                            },
                                        }).then(function(response) {
                                            let data = response.data
                                            if (data.success) {
                                                console.log("SUCCESS Overdue", data);
                                                window.location.reload();
                                            }
                                        }).catch(function(error) {
                                            console.log("ERROR", error);
                                        })
                                    }
                                }

                                if (item.invoice_status === "Cancelled") {
                                    if (item.due_date < date_now) {
                                        console.log("due_dateStatus", item.due_date);
                                        console.log("date_now", date_now);
                                        let invoice_id = item.id;
                                        let data = {
                                            id: invoice_id,
                                            invoice_status: "Cancelled",
                                        }
                                        axios.post(apiUrl + '/api/update_status', data, {
                                            headers: {
                                                Authorization: token
                                            },
                                        }).then(function(response) {
                                            let data = response.data
                                            if (data.success) {
                                                console.log("SUCCESS Cancelled", data);
                                            }
                                        }).catch(function(error) {
                                            console.log("ERROR", error);
                                        })
                                    }
                                }

                            })

                        }
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            }

            $('#tbl_showing_activeProfilePages').on('change', function() {
                let pages = $(this).val();
                pageSize = pages; // update page size variable
                var originalTextTable = $('#dataTable_invoice tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_invoice tbody').html(
                    `<tr>
                    <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                setTimeout(function() {
                    show_data({
                        page_size: pages
                    });
                }, 500);
            })

            function show_profile_deductions_onSelect() {
                let profile_id = $('#custom_profile_id').val();
                console.log("show_profile_deductions_onSelect", profile_id);
                if (profile_id) {

                    $('#Deduction_deduction_name').empty();
                    console.log("PEST");
                    axios.get(apiUrl + '/api/settings/show_deduction_data/' + profile_id, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        let option = '';
                        // THIS CODE IS FOR FILTERING PROFILE DEDUCTIONS AND CHECK IF ALL THE DEDUCIIONS HAS ALREADY BEEN ADDED.
                        option += '<option selected disabled value="">Please Select Deductions</option>'
                        if (data.success) {
                            console.log("data.data.length");
                            if (data.data.length > 0) {
                                const result = data.data.map(item => item.profile_deduction_types
                                    .length ===
                                    1);
                                if (result.every(item => item === true)) {
                                    console.log("TRUE"); // "TRUE"
                                    option +=
                                        '<option value="" disabled >All deductions has been already added.</option>';
                                    // $('#Deduction_deduction_name').append(
                                    //     option
                                    // );
                                } else {
                                    console.log("FALSE"); // "TRUE"
                                    data.data.filter(f => f.profile_deduction_types.length === 0)
                                        .map((item) => {
                                            option += "<option value=" + item.id + ">" +
                                                item
                                                .deduction_name + "</option>";

                                        })
                                    // $('#Deduction_deduction_name').append(
                                    //     option);
                                }
                            } else {
                                option +=
                                    '<option value="" disabled >No Data</option>';
                            }
                            $('#Deduction_deduction_name').append(
                                option);
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error.response.data);

                    })
                }
            }

            // SHOW DATA ON TABLE
            function show_data(filters) {
                let url = window.location.pathname;
                let urlSplit = url.split('/');

                if (urlSplit.length === 5) {
                    // console.log("sddsadsa", urlSplit.length);
                    let page = $("#tbl_pagination_invoice .page-item.active .page-link").html();
                    let filter = {
                        page_size: pageSize,
                        page: page ? page : 1,
                        user_id: urlSplit[3],
                        search: $('#search_invoice').val(),
                        filter_all_invoices: $('#filter_all_invoices').val(),
                        ...filters

                    }
                    // console.log("page", page);
                    $('#dataTable_invoice tbody').empty();
                    axios.get(`${apiUrl}/api/admin/show_invoice?${new URLSearchParams(filter)}`, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        console.log("SHOW DATA", data);
                        if (data.success) {
                            if (data.data.data.length > 0) {
                                data.data.data.map((item) => {
                                    let newdate = new Date(item.created_at);
                                    var mm = newdate.getMonth() + 1;
                                    var dd = newdate.getDate();
                                    var yy = newdate.getFullYear();
                                    var due_date = item.due_date;
                                    var date_now = (new Date()).toISOString().split('T')[0];

                                    let due_date2 = new Date(item.due_date);
                                    var mm2 = due_date2.getMonth() + 1;
                                    var dd2 = due_date2.getDate();
                                    var yy2 = due_date2.getFullYear();

                                    let tr = '<tr style="vertical-align: middle;">';
                                    tr += '<td hidden>' + item.id + '</td>'
                                    tr += '<td class="fit">' +
                                        item.invoice_no +
                                        '</td>';
                                    // console.log("due_date " + due_date + " date_now " + date_now);

                                    // data-bs-toggle="modal" data-bs-target="#invoice_status"
                                    // data-bs-toggle="modal" data-bs-target="#invoice_status"
                                    // data-bs-toggle="modal" data-bs-target="#invoice_status"
                                    // data-bs-toggle="modal" data-bs-target="#invoice_status"

                                    if (item.invoice_status === "Cancelled") {
                                        tr +=
                                            '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-info">' +
                                            item.invoice_status + '</button></td>';

                                    } else if (item.invoice_status === "Paid") {
                                        tr +=
                                            '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-success">' +
                                            item.invoice_status + '</button></td>';

                                    } else if (item.invoice_status === "Pending") {
                                        tr +=
                                            '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-warning" > ' +
                                            item.invoice_status + '</button></td >';
                                    } else {
                                        tr +=
                                            '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-danger">' +
                                            item.invoice_status + '</button></td>';
                                    }



                                    tr += '<td class="fit text-end">' + Number(
                                            parseFloat(item
                                                .sub_total).toFixed(2))
                                        .toLocaleString(
                                            'en-US', {
                                                style: 'currency',
                                                currency: 'USD'
                                            }); +
                                    '</td>';

                                    tr += '<td class="fit text-end">' + moment.utc(item
                                            .created_at)
                                        .tz('Asia/Manila')
                                        .format('MM/DD/YYYY') +
                                        '</td>';
                                    tr += '<td class="fit text-end">' + moment(item.due_date)
                                        .format('L') + '</td>';
                                    tr +=
                                        '<td class="fit text-center"> <a href="' +
                                        apiUrl +
                                        '/admin/editInvoice/' +
                                        item.id +
                                        '" style="color: #cf8029" ><i class="fa-solid fa-eye"></i></a> </td>';
                                    tr += '</tr>';
                                    $("#dataTable_invoice tbody").append(tr);
                                    return ''
                                })
                                $('#tbl_pagination_invoice').empty();

                                data.data.links.map(item => {
                                    let label = item.label;
                                    if (label === "&laquo; Previous") {
                                        label = "&laquo;";
                                    } else if (label === "Next &raquo;") {
                                        label = "&raquo;";
                                    }

                                    let li = `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}">
    <a class="page-link" data-url="${item.url}">${label}</a>
  </li>`;

                                    $('#tbl_pagination_invoice').append(li);
                                    return "";
                                });

                                if (data.data.links.length) {
                                    let lastPage = data.data.links[data.data.links.length - 1];
                                    if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                                        $('#tbl_pagination_invoice .page-item:last-child').addClass(
                                            'disabled');
                                    }
                                    let PreviousPage = data.data.links[0];
                                    if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url ==
                                        null) {
                                        $('#tbl_pagination_invoice .page-item:first-child').addClass(
                                            'disabled');
                                    }
                                }

                                $("#tbl_pagination_invoice .page-item .page-link").on('click',
                                    function() {
                                        $("#tbl_pagination_invoice .page-item").removeClass('active');
                                        let url = $(this).data('url');

                                        var originalTextTable = $('#dataTable_invoice tbody').html();
                                        // Add spinner to the remaining row and set colspan to 5
                                        $('#dataTable_invoice tbody').html(
                                            `<tr>
                                            <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                                        );
                                        setTimeout(function() {
                                            $.urlParam = function(name) {
                                                var results = new RegExp("[?&]" + name +
                                                        "=([^&#]*)")
                                                    .exec(
                                                        url
                                                    );
                                                return results !== null ? results[1] || 0 :
                                                    0;
                                            };

                                            let search = $('#search_invoice').val();
                                            show_data({
                                                search: search,
                                                page: $.urlParam('page')
                                            });
                                        }, 500);
                                    })

                                let tbl_showing_invoice =
                                    `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                                $('#tbl_showing_invoice').html(tbl_showing_invoice);
                                $('#selectActive').removeClass('d-none');
                                $('#dataTable_invoice').addClass('table-hover');
                            } else {
                                $("#dataTable_invoice tbody").append(
                                    '<tr><td colspan="6" class="text-center"><div class="noData" style="width:' +
                                    width +
                                    'px;position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                                );
                                let tbl_showing_invoice =
                                    `Showing 0 to 0 of 0 entries`;
                                $('#tbl_showing_invoice').html(tbl_showing_invoice);
                                $('#selectActive').addClass('d-none');
                                $('#dataTable_invoice').removeClass('table-hover');
                            }
                        }
                    }).catch(function(error) {
                        console.log("ERROR DISPLAY", error);
                    });
                }
            }

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

            $('#ProfileUpdate').submit(function(e) {
                e.preventDefault();

                // BUTTON SPINNER
                var originalText = $('#button-submit').html();
                $('#button-submit').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                $('#button-submit').prop("disabled", true);
                setTimeout(function() {
                    $('#button-submit').html(originalText);
                }, 500);


                if (document.getElementById("profile_status").disabled) {
                    $('#notifyIcon').html('<i class="fa-solid fa-x" style="color:#dc3545"></i>');
                    $('.toast1 .toast-title').html("Error");
                    $('.toast1 .toast-body').html("Please click edit profile to update.");
                    $('#button-submit').prop("disabled", false);
                    toast1.toast('show');
                } else {
                    let user_id = $("#user_id").val();
                    let profile_id = $("#profile_id_show").val();
                    let first_name = $("#first_name").val();
                    let last_name = $("#last_name").val();
                    let email = $("#email").val();
                    let username = $("#username").val();
                    // let password = $("#password").val();
                    let position = $("#position").val();
                    let phone_number = $("#phone_number").val();
                    let address = $("#address").val();
                    let province = $("#province").val();
                    let city = $("#city").val();
                    let zip_code = $("#zip_code").val();
                    if ($('#profile_status').is(':checked')) {
                        $('#profile_status').val('Active');
                    } else {
                        $('#profile_status').val('Inactive');
                    }
                    let profile_status = $("#profile_status").val();
                    let acct_no = $("#acct_no").val();
                    let acct_name = $("#acct_name").val();
                    let bank_name = $("#bank_name").val();
                    let bank_address = $("#bank_address").val();
                    let gcash_no = $("#gcash_no").val();
                    let date_hired = $("#date_hired").val();
                    let deduction_type_id = $('#select2Multiple').val();

                    // let formData = new FormData();
                    // formData.append('id', user_id);
                    // formData.append('profile_id', profile_id);
                    // formData.append('first_name', first_name);
                    // formData.append('last_name', last_name);
                    // formData.append('email', email);
                    // formData.append('username', username);
                    // // formData.append('password', "");
                    // formData.append('position', position ?? "");
                    // formData.append('phone_number', phone_number);
                    // formData.append('address', address);
                    // formData.append('province', province);
                    // formData.append('city', city);
                    // formData.append('zip_code', zip_code);
                    // if (document.getElementById('profile_status').checked == true) {
                    //   formData.append('profile_status', 'Active');
                    // } else {
                    //   formData.append('profile_status', 'Inactive');
                    // }
                    // formData.append('acct_no', acct_no);
                    // formData.append('acct_name', acct_name);
                    // formData.append('bank_name', bank_name ?? "");
                    // formData.append('bank_address', bank_address);
                    // formData.append('gcash_no', gcash_no);
                    // formData.append('date_hired', date_hired);
                    // // SENDING ARRAY IN API
                    // if (document.getElementById('file').files.length > 0) {
                    //   formData.append('profile_picture', document.getElementById('file')
                    //     .files[0],
                    //     document.getElementById('file').files[0].name);
                    // }

                    let data = {
                        user_id: user_id,
                        profile_id: profile_id,
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        username: username,
                        password: "",
                        position: position,
                        phone_number: phone_number,
                        address: address,
                        province: province,
                        city: city,
                        zip_code: zip_code,
                        profile_status: profile_status,
                        acct_no: acct_no,
                        acct_name: acct_name,
                        bank_name: bank_name,
                        bank_address: bank_address,
                        gcash_no: gcash_no,
                        date_hired: date_hired,
                        deduction_type_id: JSON.stringify(deduction_type_id),
                    }

                    let data2 = {};

                    if (file_original_name == "" && file_name == "" && file_path == "") {
                        data2 = {
                            file_original_name: old_file_original_name,
                            file_name: old_file_name,
                            file_path: old_file_path,
                        }
                    } else {
                        data2 = {
                            file_original_name: file_original_name,
                            file_name: file_name,
                            file_path: file_path,
                        }
                    }

                    let result = Object.assign({}, data, data2);
                    // console.log("DATA", result);

                    axios.post(apiUrl + '/api/saveprofile', result, {
                            headers: {
                                Authorization: token,
                                "Content-Type": "multipart/form-data",
                            },
                        })
                        .then(function(response) {
                            let data = response.data;
                            // console.log("SUCCESS", data);
                            if (data.success == true) {
                                $('html,body').animate({
                                    scrollTop: $('#sb-nav-fixed').offset().top
                                }, 'slow');
                                $("div.spanner").addClass("show");

                                $('input').removeClass('is-invalid');
                                $('input, select').removeClass('is-invalid');
                                $('.invalid-feedback').remove();
                                $("#first_name").val("");
                                $("#last_name").val("");
                                $("#email").val("");
                                $("#username").val("");
                                $("#position").val("");
                                $("#phone_number").val("");
                                $("#address").val("");
                                $("#province").val("");
                                $("#city").val("");
                                $("#zip_code").val("");
                                $("#profile_status").val("");
                                $("#acct_no").val("");
                                $("#acct_name").val("");
                                $("#bank_name").val("");
                                $("#bank_address").val("");
                                $("#gcash_no").val("");
                                $("#date_hired").val("");
                                // $("#photo").attr("src", "/images/default.png");
                                // select2Multiple
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>');
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(data.message);
                                $('#ProfileUpdate').trigger('reset');
                                $('#ProfileUpdate').removeClass('was-validated');
                                $('#button-submit').prop("disabled", false);
                                setTimeout(function() {
                                    $("div.spanner").removeClass("show");
                                    // location.href = apiUrl + "/admin/current"
                                    window.location.reload();
                                }, 3000)
                                toast1.toast('show');
                            }
                        })
                        .catch(function(error) {
                            console.log("error.response.data.errors", error);
                            setTimeout(function() {
                                $('#button-submit').prop("disabled", false);
                            }, 500);
                            if (error.response.data.errors) {
                                // ERROR EMAIL
                                if (error.response.data.errors.email) {
                                    if (error.response.data.errors.email.length > 0) {
                                        $email_error = error.response.data.errors.email[0];
                                        if ($email_error == "The email field is required.") {
                                            $("#error_email").addClass('invalid-feedback').html(
                                                "This field is required.").show();
                                        }
                                        if ($email_error ==
                                            "The email must be a valid email address.") {
                                            $("#error_email").addClass('invalid-feedback').html(
                                                "The email address must be valid.").show();
                                        }
                                        if ($email_error == "The email has already been taken.") {
                                            $("#error_email").addClass('invalid-feedback').html(
                                                "The email has already been taken.").show();
                                        }
                                    }
                                } else {
                                    $check = $('#email').val();
                                    if ($check.length > 0) {
                                        $("#error_email").removeClass('invalid-feedback').html("")
                                            .show();
                                    } else {
                                        $("#error_email").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }

                                }

                                // ERROR USERNAME
                                if (error.response.data.errors.username) {
                                    if (error.response.data.errors.username.length > 0) {
                                        $username_error = error.response.data.errors.username[0];
                                        if ($username_error == "The username field is required.") {
                                            $("#error_username").addClass('invalid-feedback').html(
                                                "This field is required.").show();
                                        }
                                        if ($username_error ==
                                            "The username has already been taken.") {
                                            $("#error_username").addClass('invalid-feedback').html(
                                                "The username has already been taken.").show();
                                        }
                                    }
                                } else {
                                    $check = $('#username').val();
                                    if ($check.length > 0) {
                                        $("#error_username").removeClass('invalid-feedback').html(
                                                "")
                                            .show();
                                    } else {
                                        $("#error_username").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }
                                }

                                // ERROR ACCT_NO
                                if (error.response.data.errors.acct_no) {
                                    if (error.response.data.errors.acct_no.length > 0) {
                                        $acct_no = error.response.data.errors.acct_no[0];
                                        // console.log("ACCT_NO", $acct_no);
                                        if ($acct_no == "The acct no field is required.") {
                                            $("#error_acct_no").addClass('invalid-feedback').html(
                                                "This field is required.").show();
                                        }
                                        if ($acct_no == "The acct no has already been taken.") {
                                            $("#error_acct_no").addClass('invalid-feedback').html(
                                                "The acct no has already been taken.").show();
                                        }
                                    }
                                } else {
                                    $check = $('#acct_no').val();
                                    if ($check.length > 0) {
                                        $("#error_acct_no").removeClass('invalid-feedback').html("")
                                            .show();
                                    } else {
                                        $("#error_acct_no").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }
                                }

                                // ERROR ACCT_NAME
                                if (error.response.data.errors.acct_name) {
                                    if (error.response.data.errors.acct_name.length > 0) {
                                        $acct_name = error.response.data.errors.acct_name[0];
                                        // console.log("ACCT_NAME", $acct_name);
                                        if ($acct_name == "The acct name field is required.") {
                                            $("#error_acct_name").addClass('invalid-feedback').html(
                                                "This field is required.").show();
                                        }
                                        if ($acct_name == "The acct name has already been taken.") {
                                            $("#error_acct_name").addClass('invalid-feedback').html(
                                                "The acct name has already been taken.").show();
                                        }
                                    }
                                } else {
                                    $check = $('#acct_name').val();
                                    if ($check.length > 0) {
                                        $("#error_acct_name").removeClass('invalid-feedback').html(
                                                "")
                                            .show();
                                    } else {
                                        $("#error_acct_name").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }
                                }

                                // ERROR GCASH
                                if (error.response.data.errors.gcash_no) {
                                    if (error.response.data.errors.gcash_no.length > 0) {
                                        $gcash_no = error.response.data.errors.gcash_no[0];
                                        // console.log("GCASH", $gcash_no);
                                        if ($gcash_no == "The gcash no field is required.") {
                                            $("#error_gcash_no").addClass('invalid-feedback').html(
                                                "This field is required.").show();
                                        }
                                        if ($gcash_no == "The gcash no has already been taken.") {
                                            $("#error_gcash_no").addClass('invalid-feedback').html(
                                                "The gcash no has already been taken.").show();
                                        }
                                    }
                                } else {
                                    $check = $('#gcash_no').val();
                                    if ($check.length > 0) {
                                        $("#error_gcash_no").removeClass('invalid-feedback').html(
                                                "")
                                            .show();
                                    } else {
                                        $("#error_gcash_no").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }
                                }
                            }
                        });
                }

            })

            $('#deleteProfileDeduction').on('click', function(e) {
                e.preventDefault();

                // BUTTON SPINNER
                var originalText = $(this).html();
                $(this).html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                setTimeout(function() {
                    $(this).html(originalText);
                }, 500);

                let profileDeductionType_id = $('#profileDeductionType_id').val();
                $("#profilededuction_id").html(profileDeductionType_id);
                console.log("delete", profileDeductionType_id);
                $(this).html('Delete');

            })

            // SHOW EDIT PROFILE DEDUCTION TYPE
            $(document).on('click', '#deductionButton .editProfileDeduction', function(
                e) {
                e.preventDefault();
                $('#profileDeductionType_id').val($(this).val());
                let profileDeductionType_id = $('#profileDeductionType_id').val();

                axios.get(apiUrl + '/api/showProfileDeductionTypes/' +
                    profileDeductionType_id, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                    let data = response.data;
                    console.log("EDIT FOR UPATE", data);

                    if (data.success) {
                        if (data.foreign == true) {
                            $('#profileDeductionType_profileId').val(data.data.profile_id);
                            $('#edit_profileDeductionType_name').val(data.data.deduction_type_name);
                            $('#edit_profileDeductionType_amount').val(PHP(data.data.amount)
                                .format());

                            $('#edit_profileDeductionType_name').prop("disabled", true);
                            $('#deleteProfileDeduction').prop("disabled", true);
                        } else {
                            $('#profileDeductionType_profileId').val(data.data.profile_id);
                            $('#edit_profileDeductionType_name').val(data.data.deduction_type_name);
                            $('#edit_profileDeductionType_amount').val(PHP(data.data.amount)
                                .format());
                            $('#edit_profileDeductionType_name').prop("disabled", false);
                            $('#deleteProfileDeduction').prop("disabled", false);
                        }
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            })

            $('.select2-multiple').select2({
                placeholder: "Select",
                // allowClear: true
            });



            $("#col_discount_amount").addClass('d-none');
            $("#col_discount_total").addClass('d-none');
            $(
                ".label_discount_amount").addClass('d-none');
            $(".label_discount_total").addClass('d-none');

            $('input[type=radio][id=discount_type]').change(function() {
                console.log("DISCOUNT TYPE", $(this).val());
                if (sub_total == 0) {
                    $("#col_discount_amount").addClass('d-none');
                    $("#col_discount_total").addClass('d-none');
                    $(".label_discount_amount").addClass('d-none');
                    $(".label_discount_total").addClass('d-none');
                } else {
                    if ($(this).val() === 'Fixed') {
                        //write your logic here
                        // console.log("FIXED");
                        $("#col_discount_amount").removeClass('d-none');
                        $("#col_discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');

                        $('#discount_amount').val('0.00');
                        $('#discount_total').val('0.00');

                    } else if ($(this).val() === 'Percentage') {
                        //write your logic here
                        // console.log("PERCENTAGE");
                        $("#col_discount_amount").removeClass('d-none');
                        $("#col_discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');

                        $('#discount_amount').val('0.00');
                        $('#discount_total').val('0.00');
                    }
                }
                subtotal();
                Additems_total();
            })

            $('#discount_amount').on('keyup', function() {
                subtotal();
            })

            function subtotal() {
                let discount_type = $("input[id='discount_type']:checked").val();
                let discount_amount = $('#discount_amount').val();
                let newDiscount_amount = discount_amount.replace(/[^\d.]/g,
                    ''); // Remove non-numeric characters
                let discount_total = $('#discount_total').val();
                let sub_total = $('#sub_total').val();
                var sum = 0;

                $('#show_items .amount').each(function() {
                    sum += Number($(this).val().replace(/[^\d.]/g, ''));
                });

                if (discount_type == 'Fixed') {
                    $('#discount_total').val(PHP(parseFloat(newDiscount_amount * 1) ? parseFloat(
                            newDiscount_amount * 1) : 0)
                        .format());

                    let sub_total = (sum - $('#discount_total').val().replace(/[^\d.]/g, ''));
                    $('#sub_total').val(PHP(sub_total).format());
                    $('#grand_subTotal').val(PHP(sub_total).format());
                    let dollar_amount = $('#sub_total').val();
                    $('#dollar_amount').val(PHP(dollar_amount).format());
                    DeductionItems_total()

                } else if (discount_type == 'Percentage') {

                    let percentage = parseFloat(((newDiscount_amount ? newDiscount_amount : 0) / 100) * sum);
                    $('#discount_total').val(PHP(percentage).format());
                    let sub_total = (parseFloat(sum) - parseFloat(percentage));
                    $('#sub_total').val(PHP(sub_total).format());
                    $('#grand_subTotal').val(PHP(sub_total).format());
                    $('#dollar_amount').val(PHP(sub_total).format());
                    DeductionItems_total()
                }
                getResults_Converted();
            }

            $('#profilededuction_delete').on('click', function(e) {
                e.preventDefault();
                let id = $('#profilededuction_id').html();
                axios.post(apiUrl + '/api/deleteProfileDeductionTypes/' +
                    id, {}, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        console.log("SUCCCESS", data);

                        $('#deleteModal').modal('hide');
                        $('div.spanner').addClass("show");

                        setTimeout(function() {
                            $('div.spanner').removeClass("show");
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>'
                            );
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(data.message);

                            // PROFILE DEDUCTION BUTTON
                            $('#deductionButton').empty();
                            $('#deductionButton').html(
                                show_profileDeductionType_Button());
                            // PROFILE DEDUCTION TABLE
                            $('#dataTable_deduction tbody').empty();
                            $('#dataTable_deduction tbody').html(
                                show_Profilededuction_Table_Active());
                            // PROFILE INVOICES TABLE
                            $('#dataTable_invoice tbody').empty();
                            $('#dataTable_invoice tbody').html(
                                show_data());
                            show_profileDeductionType_select();
                            toast1.toast('show');
                        }, 1500);
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                    if (error.response.data.errors) {
                        let errors = error.response.data.errors;
                        let fieldnames = Object.keys(errors);
                        Object.values(errors).map((item, index) => {
                            fieldname = fieldnames[0].split('_');
                            fieldname.map((item2, index2) => {
                                fieldname['key'] = capitalize(item2);
                                return ""
                            });
                            fieldname = fieldname.join(" ");
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-x" style="color:#dc3545"></i>');
                            $('.toast1 .toast-title').html("Error");
                            $('.toast1 .toast-body').html(Object.values(errors)[
                                    0]
                                .join(
                                    "\n\r"));
                        })
                        toast1.toast('show');
                    }
                })
            });

            $('#deduction_delete').on('click', function(e) {
                e.preventDefault();
                let id = $('#delete_deduction_id').html();
                axios.post(apiUrl + '/api/deleteDeduction/' +
                    id, {}, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                    let data = response.data;
                    console.log("SUCCCESS", data);
                    if (data.success) {

                        $('#deleteDeductionModal').modal('hide');
                        $('div.spanner').addClass("show");

                        setTimeout(function() {
                            $('div.spanner').removeClass("show");
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>'
                            );
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(data.message);

                            // PROFILE DEDUCTION BUTTON
                            $('#deductionButton').empty();
                            $('#deductionButton').html(
                                show_profileDeductionType_Button());
                            // PROFILE DEDUCTION TABLE
                            $('#dataTable_deduction tbody').empty();
                            $('#dataTable_deduction tbody').html(
                                show_Profilededuction_Table_Active());
                            // PROFILE INVOICES TABLE
                            $('#dataTable_invoice tbody').empty();
                            $('#dataTable_invoice tbody').html(
                                show_data());
                            show_profileDeductionType_select();
                            toast1.toast('show');
                        }, 1500);
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                    if (error.response.data.errors) {
                        let errors = error.response.data.errors;
                        let fieldnames = Object.keys(errors);
                        Object.values(errors).map((item, index) => {
                            fieldname = fieldnames[0].split('_');
                            fieldname.map((item2, index2) => {
                                fieldname['key'] = capitalize(item2);
                                return ""
                            });
                            fieldname = fieldname.join(" ");
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-x" style="color:#dc3545"></i>');
                            $('.toast1 .toast-title').html("Error");
                            $('.toast1 .toast-body').html(Object.values(errors)[
                                    0]
                                .join(
                                    "\n\r"));
                        })
                        toast1.toast('show');
                    }
                })
            });

            // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
            function getResults_Converted() {
                fetch(`${api}`)
                    .then(currency => {
                        return currency.json();
                    }).then(displayResults);
            }

            // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
            function displayResults(currency) {
                let dollar_amount = $("#dollar_amount").val().replaceAll(',', '');
                let peso_rate = 0;
                let converted_amount = 0;
                let fromRate = currency.rates['USD'];
                let toRate = currency.rates['PHP'];
                peso_rate = (toRate / fromRate);
                converted_amount = ((toRate / fromRate) * dollar_amount);
                $('#peso_rate').val(PHP(parseFloat(peso_rate)).format());
                $('#converted_amount').val(PHP(parseFloat(converted_amount)).format());

            }

            $('#show_deduction_items').focusout('.multi2', function() {
                let deduction_sum = 0;
                $('#show_deduction_items .deduction_amount').each(function() {
                    let parent = $(this).closest('.row');
                    let deduction_amount = parent.find('.deduction_amount').val();
                    parent.find('.deduction_amount').val(PHP(deduction_amount)
                        .format());
                })
            })

            // FUNCTION FOR KEYUP CLASS DEDUCTIONS FOR DEDUCTIONS
            $('#show_deduction_items').on("keyup", ".multi2", function() {
                DeductionItems_total();
            });

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

            // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
            function Additems_total() {
                var sum = 0;
                let converted_amount = 0;
                $('#show_items .amount').each(function() {
                    sum += Number($(this).val().replace(/[^\d.]/g, ''));
                });


                $('#sub_total').val(PHP(parseFloat(sum)).format());
                $('#grand_subTotal').val(PHP(parseFloat(sum)).format());
                $('#dollar_amount').val(PHP(parseFloat(sum)).format());

            }

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

                peso_rate = $('#peso_rate').val().replaceAll(',', '') ? $('#peso_rate').val()
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

            // FUNCTION CLICK FOR REMOVING INVOICE ITEMS ROWS
            $(document).on('click', '.remove_items', function(e) {
                e.preventDefault();
                // $('#exampleModal').addClass('d-none');
                let parent = $(this).closest('.row');
                let sub_total = parent.find('.sub_total').val();
                let row_item = $(this).parent().parent().parent();
                // console.log("row_item", row_item);
                if (row_item) {
                    $('input').prop('disabled', true);
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
                                    if ($('#show_items > .row').length === 1) {
                                        $('#show_items > .row').find('.col-remove-item')
                                            .removeClass('d-none')
                                            .addClass(
                                                'd-none');
                                    }
                                    $(row_item).remove();
                                    getResults_Converted();
                                    Additems_total();
                                    subtotal();
                                    DeductionItems_total();
                                    x--;
                                }
                            },
                            Cancel: function() {}
                        },
                        onClose: function() {
                            // before the modal is hidden.
                            $('#exampleModal').removeClass('d-none');
                            $('input').prop('disabled', false);
                        },

                    });
                }
            });

            // FUNCTION CLICK FOR REMOVING INVOICE DEDUCTIONS ROWS
            $(document).on('click', '.remove_deductions', function(e) {
                e.preventDefault();
                // $('#exampleModal').addClass('d-none');
                let parent = $(this).closest('.row');
                let row_item = $(this).parent().parent().parent();
                if (row_item) {
                    $('input').prop('disabled', true);
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
                                    getResults_Converted();
                                    Additems_total();
                                    subtotal();
                                    DeductionItems_total();
                                    x--;
                                }
                            },
                            Cancel: function() {}
                        },
                        onClose: function() {
                            // before the modal is hidden.
                            $('#exampleModal').removeClass('d-none');
                            $('input').prop('disabled', false);
                        },
                    });
                }

            });

            // FUNCTION CLICK FOR DISPLAY INVOICE ITEM ROWS
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
                if (x <= max_fields) {
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
                        '<input type="text" step="any" maxlength="4" placeholder="Quantity" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
                    // add_rows += '</div>';
                    add_rows += '<div class="invalid-feedback">This field is required.</div>';
                    add_rows += '</div>';
                    add_rows += ' </div>';

                    add_rows += '<div class="col-lg-3">';
                    add_rows += '<div class="form-group-profile">';
                    // add_rows += '<div class="form-floating form-group">';
                    add_rows += '<label for="rate" style="color:#A4A6B3">Rate</label>';
                    add_rows +=
                        '<input type="text" step="any" name="rate" placeholder="Rate" id="rate" style="text-align:right;" class="form-control multi rate" maxlength="6"/>';
                    // add_rows += '</div>';
                    add_rows += '<div class="invalid-feedback">This field is required.</div>';
                    add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows += '<div class="col-lg-2 bottom20">';
                    // add_rows += '<div class="form-floating form-group">';
                    // style="text-align:right;border:none;background-color:white"
                    add_rows +=
                        '<label for="amount" style="color:#A4A6B3;display:grid;justify-content:end">Amount</label>';
                    add_rows +=
                        '<input type="text" style="text-align:right;border:none;background-color:white" readonly name="amount" id="amount" class="form-control amount" />';
                    // add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows += '<div class="col-lg-1 topbottom20">';
                    add_rows +=
                        '<div class="col-remove-item d-none" style="display:flex;justify-content:center">';
                    // add_rows += '<label></label>';
                    add_rows +=
                        '<button class="btn remove_items "><i class="fa fa-trash" style="color:#dc3545"></i></button>';
                    add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows += '</div>'

                    $(wrapper).append(add_rows);

                    if ($('#show_items > .row').length > 1) {
                        $('#show_items > .row').each(function() {
                            $(this).find('.col-remove-item').removeClass('d-none');
                        })
                    } else {
                        $('#show_items > .row').find('.col-remove-item').removeClass('d-none').addClass(
                            'd-none');
                    }

                    x++;
                }
            }

            // ONLY NUMBERS FOR NUMBER INPUTS
            function onlyNumberKey(evt) {
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }

            // CHECK IF THE USER HAVE THE PROFILE
            $("#exampleModal").on('hide.bs.modal', function() {

                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $("div.spanner").removeClass("show");

                    $("#col_discount_amount").addClass('d-none');
                    $("#col_discount_total").addClass('d-none');
                    $("div.spanner").removeClass("show");
                    $('#invoice_items').trigger('reset'); // reset the form
                    $('#invoice_items').removeClass('was-validated');
                    $('input').removeClass('is-invalid');
                    $('#show_deduction_items').empty();
                    $('textarea').val('');

                    if ($('#show_items > .row').length > 1) {
                        $('#show_items').empty();
                        display_item_rows();
                    }
                }, 1500)
            });

            $('#deleteModal').on('hide.bs.modal', function() {
                // $('html,body').animate({
                //     scrollTop: $('#sb-nav-fixed').offset().top
                // }, 'slow');
                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $("div.spanner").removeClass("show");

                }, 1500)
            })

            $("#modal-create-deduction").on('hide.bs.modal', function() {
                $('#deduction_Store').trigger('reset');
                $('#deduction_Store').removeClass('was-validated');
                $('#deduction_name').removeClass('is-invalid');
                $("#invalid-feedback-Deduction-name").removeClass('invalid-feedback')
                    .html(
                        "").show();
                // $('#Deduction_deduction_amount').removeClass('is-invalid');
                // $('select').removeClass('is-invalid');
            });

            $("#modal-edit-deduction").on('hide.bs.modal', function() {
                $('#deduction_update').trigger('reset');
                $('#deduction_update').removeClass('was-validated');
                $('#edit_deduction_name').removeClass('is-invalid');
                $("#invalid-feedback-edit-Deduction-name").removeClass('invalid-feedback')
                    .html(
                        "").show();
                // $('#Deduction_deduction_amount').removeClass('is-invalid');
                // $('select').removeClass('is-invalid');
            });

            $("#modal-customize-create-deduction").on('hide.bs.modal', function() {
                $('#custom_deductiontype_store').removeClass('was-validated');
                $('#custom_deductiontype_store').trigger('reset');
                $('#Deduction_deduction_name').removeClass('is-invalid');
                // $('#createDeduction_deduction_amount').removeClass('is-invalid');
                // $('input').removeClass('is-invalid');
                $("#invalid-feedback-Deduction-name").removeClass('invalid-feedback')
                    .html(
                        "").show();
            });

            $("#ProfileDeductioneditModal").on('hide.bs.modal', function() {
                // $('html,body').animate({
                //     scrollTop: $('#sb-nav-fixed').offset().top
                // }, 'slow');
                $("div.spanner").addClass("show");

                setTimeout(function() {
                    $("div.spanner").removeClass("show");
                    $('#ProfileDeductiontype_update').trigger('reset');
                    $('#ProfileDeductiontype_update').removeClass('was-validated');
                    $('input').removeClass('is-invalid');
                    $("#error_edit_deduction_name").removeClass('invalid-feedback').html(
                        "").show();

                }, 1500)
            });

            $("#cancelProfileDeduction").on('click', function(e) {
                e.preventDefault();
                $('#ProfileDeductiontype_update').trigger('reset');
                $('#ProfileDeductiontype_update').removeClass('was-validated');
                $("#error_deduction_name").removeClass('invalid-feedback').html("").show();
                // $('html,body').animate({
                //     scrollTop: $('#sb-nav-fixed').offset().top
                // }, 'slow');
                // $('#ProfileDeductioneditModal').modal('hide');
                // $("div.spanner").addClass("show");
                // setTimeout(function() {
                // $("div.spanner").removeClass("show");
                // }, 1500)
            });

            $("#button-addon2").click(function(e) {

                var originalText = $('#button-addon2').html();
                $('#button-addon2').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                setTimeout(function() {
                    $('#button-addon2').html(originalText);
                    let toast1 = $('.toast1');
                    let id = $('#user_id').val();
                    axios
                        .get(apiUrl + '/api/invoice/check_profile/' + id, {
                            headers: {
                                Authorization: token,
                            },
                        }).then(function(response) {
                            let data = response.data;

                            if (!data.success) {

                                $('.whole_row').addClass('d-none');
                                $('.toast1 .toast-title').html('Invoices');
                                $('.toast1 .toast-body').html(data.message);
                                toast1.toast('show');

                            } else {
                                let deduction_count = data.data.profile_deduction_types.length;
                                console.log("profile_deduction_types", data);
                                $("#profile_id").val(data.data.id);
                                if (deduction_count > 0) {
                                    data.data.profile_deduction_types.map((item) => {
                                        let wrapper = $('#show_deduction_items');
                                        add_rows = '';
                                        add_rows += '<div class="row">';
                                        add_rows += '<div class="col-sm-6 bottom20">';
                                        add_rows += '<div class=" w-100">';
                                        add_rows +=
                                            '<input type="text" class="profile_deduction_type_id" value=' +
                                            item.id +
                                            ' hidden>';
                                        add_rows +=
                                            '<label for="deduction_type_name" style="color:#A4A6B3">Deduction Type</label>';
                                        add_rows +=
                                            '<input type="text" class="form-control deduction_type_name" name="deduction_type_name" id="deduction_type_name" value="' +
                                            item.deduction_type_name + '" readonly>'
                                        add_rows += '</div>';
                                        add_rows += '</div>';

                                        add_rows += '<div class="col-sm-5 bottom20">';
                                        add_rows += '<div class=" ">';
                                        add_rows +=
                                            '<label for="deduction_amount" style="color:#A4A6B3">Deduction Amount (Php)</label>';
                                        add_rows +=
                                            '<input type="text" value="' + PHP(item
                                                .amount)
                                            .format() +
                                            '" style="text-align:right;" id="deduction_amount" name="deduction_amount" class="form-control multi2 deduction_amount" maxlength="6" />';
                                        add_rows += '</div>';
                                        add_rows += '</div>';

                                        add_rows +=
                                            '<div class="col-sm-1 col-remove-deductions " style="display:flex;justify-content:center;align-items:center">';
                                        add_rows += '<div class="">';
                                        add_rows +=
                                            '<button type="button" class="btn remove_deductions"><i class="fa fa-trash pe-1" style="color:#dc3545"></i></button>';
                                        add_rows += '</div>';
                                        add_rows += '</div>';


                                        add_rows += '</div>';

                                        $(wrapper).append(add_rows);
                                        return '';
                                    })
                                    $('.whole_row').removeClass('d-none');
                                    $('#profile_id').val(data.data.id);
                                }
                            }
                        }).catch(function(error) {
                            console.log("error", error);
                        });
                }, 500);
            });

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

            $('#invoice_items').submit(function(e) {
                e.preventDefault();

                // BUTTON SPINNER
                var originalText = $('#save').html();
                $('#save').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                $('#save').prop("disabled", true);
                setTimeout(function() {
                    $('#save').html(originalText);
                }, 500);



                // Do your processing here
                // CONDITION IF THERE IS BLANK ROW
                $('#show_items .row1').each(function() {
                    let parent = $(this).closest('.row1');
                    let row_item = $(this).parent();
                    let item_rate = $(this).find('.rate').val();
                    let item_qty = $(this).find('.quantity').val();
                    if (item_rate == "" && item_qty == "") {
                        // console.log("row_item", parent);
                        if ($('#show_items > .row').length === 1) {
                            $('#show_items > .row').find('.col-remove-item')
                                .removeClass(
                                    'd-none')
                                .addClass(
                                    'd-none');
                        } else {
                            $(parent).remove();
                        }
                    }
                    x--;
                });

                let profile_id = $('#profile_id').val();
                // let invoice_no = $('#invoice_no').val();
                // INVOICE TABLE
                let due_date = $('#due_date').val();
                let description = $('#description').val();
                let invoice_subtotal = $('#sub_total').val().replaceAll(',', '');
                let peso_rate = $('#peso_rate').val().replaceAll(',', '')
                let invoice_converted_amount = $('#converted_amount').val().replaceAll(',', '');
                let invoice_discount_type = $('#discount_type:checked').val();
                let invoice_discount_amount = $('#discount_amount').val().replaceAll(',', '');
                let invoice_discount_total = $('#discount_total').val().replaceAll(',', '');
                let invoice_total_amount = $('#grand_total').val().replaceAll(',', '');
                let invoice_notes = $('#notes').val();
                invoice_notes = invoice_notes.replace(/\n/g, '<br>');

                // INVOICE ITEMS TABLE
                let invoiceItem = [];
                $('#show_items .row').each(function() {
                    let item_description = $(this).find('.item_description').val() ? $(
                            this)
                        .find(
                            '.item_description').val() : "";
                    let item_rate = $(this).find('.rate').val().replaceAll(',', '') ? $(
                            this)
                        .find(
                            '.rate').val().replaceAll(',', '') : 0;
                    let item_qty = $(this).find('.quantity').val() ? $(this)
                        .find('.quantity').val() : 0;
                    let item_total_amount = $(this).find('.amount').val().replaceAll(
                            ',', '') ?
                        $(
                            this).find('.amount')
                        .val().replaceAll(',', '') : 0;

                    invoiceItem.push({
                        item_description,
                        item_rate,
                        item_qty,
                        item_total_amount,
                    })
                });

                // DEDUCTIONS TABLE
                let Deductions = [];
                $('#show_deduction_items .row').each(function() {
                    let profile_deduction_type_id = $(this).find('.profile_deduction_type_id')
                        .val();
                    let deduction_type_name = $(this).find('.deduction_type_name').val();
                    let deduction_amount = $(this).find('.deduction_amount').val().replaceAll(
                        ',',
                        '');

                    Deductions.push({
                        profile_deduction_type_id,
                        deduction_type_name,
                        deduction_amount,
                    })
                });

                let data = {
                    profile_id: profile_id,
                    // invoice_no: invoice_no,
                    due_date: due_date,
                    description: description,
                    peso_rate: peso_rate ? peso_rate : 0,
                    sub_total: invoice_subtotal,
                    converted_amount: invoice_converted_amount ? invoice_converted_amount : 0,
                    discount_type: invoice_discount_type,
                    discount_amount: invoice_discount_amount ? invoice_discount_amount : 0,
                    discount_total: invoice_discount_total ? invoice_discount_total : 0,
                    grand_total_amount: invoice_total_amount ? invoice_total_amount : 0,
                    notes: invoice_notes,
                    invoiceItem,
                    Deductions,
                }
                console.log("DATA", data);

                axios.post(apiUrl + "/api/createinvoice", data, {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        console.log("SUCCES", data.success);
                        $('html,body').animate({
                            scrollTop: $('#sb-nav-fixed').offset().top
                        }, 'slow');
                        $('#exampleModal').modal('hide');

                        var originalTextTable = $('#dataTable_invoice tbody').html();
                        // Add spinner to the remaining row and set colspan to 5
                        $('#dataTable_invoice tbody').html(
                            `<tr>
                            <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                        );

                        $('div.spanner').addClass('show');
                        setTimeout(function() {
                            $('div.spanner').removeClass('show');

                            $('#invoice_items').trigger('reset'); // reset the form
                            $('#show_deduction_items').empty();
                            $('textarea').val('');
                            $('#dataTable_deduction tbody').empty();
                            $('#dataTable_deduction tbody').html(
                                show_Profilededuction_Table_Active());
                            $(".label_discount_amount").addClass('d-none');
                            $(".label_discount_total").addClass('d-none');
                            toast1.toast('show');
                            $('input').removeClass('is-invalid');
                            $('input, select').removeClass('is-invalid');
                            $('.invalid-feedback').remove();

                            $("#col_discount_amount").addClass('d-none');
                            $("#col_discount_total").addClass('d-none');
                            $("div.spanner").removeClass("show");
                            $('#invoice_items').removeClass('was-validated');
                            if ($('#show_items > .row').length > 1) {
                                $('#show_items').empty();
                                display_item_rows();
                            }
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(response.data.message);
                            show_data();
                            $('#save').prop("disabled", false);
                        }, 1500)
                    }
                }).catch(function(error) {
                    setTimeout(function() {
                        $('#save').prop("disabled", false);
                    }, 500);
                    console.log("error.response.data.errors", error.response.data.errors);

                });

            });

            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var deduction_Store = $('#deduction_Store')
            // Loop over them and prevent submission
            Array.prototype.slice.call(deduction_Store)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

            // ADD CREATE DEDUCTION
            $('#deduction_Store').submit(function(e) {
                e.preventDefault();

                var originalText = $('#Deduction_button').html();
                $('#Deduction_button').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                // $('#Deduction_button').prop("disabled", true);
                setTimeout(function() {
                    $('#Deduction_button').html(originalText);
                }, 500);


                let profile_id = $("#Deduction_profile_id").val();
                let deduction_type_name = $("#deduction_name").val();
                let amount = $("#Deduction_deduction_amount").val().replaceAll(',', '');

                let data = {
                    profile_id: profile_id,
                    deduction_type_name: deduction_type_name,
                    amount: amount,
                };
                console.log("DATADATA", data);
                axios
                    .post(apiUrl + '/api/createDeduction', data, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#modal-create-deduction').modal('hide');
                            var originalTextTable = $('#dataTable_deduction tbody').html();
                            // Add spinner to the remaining row and set colspan to 5
                            $('#dataTable_deduction tbody').html(
                                `<tr>
                                <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                            );
                            $("div.spanner").addClass("show");
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(data.message);
                                $('#deduction_Store').trigger('reset');
                                $('#deduction_Store').removeClass('was-validated');
                                $('#Deduction_deduction_name').removeClass('is-invalid');
                                $('#deductionDropSearch').empty();
                                show_profileDeductionType_select();
                                show_Profilededuction_Table_Active();
                                show_profileDeductionType_Button();
                                $('#Deduction_button').prop("disabled", false);
                                toast1.toast('show');
                            }, 1500)
                        } else {
                            console.log("ERROR");
                        }
                    }).catch(function(error) {
                        setTimeout(function() {
                            $('#Deduction_button').prop("disabled", false);
                        }, 500);
                        let errors = error.response.data.errors;
                        console.log(errors);
                        $("#invalid-feedback-Deduction-name").addClass('invalid-feedback')
                            .html(
                                "This field is required.").show();

                    });
            })

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var deduction_update = $('#deduction_update')
            // Loop over them and prevent submission
            Array.prototype.slice.call(deduction_update)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

            // ADD UPDATE DEDUCTION
            $('#deduction_update').submit(function(e) {
                e.preventDefault();

                var originalText = $('#Deduction_button').html();
                $('#Deduction_button').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                // $('#Deduction_button').prop("disabled", true);
                setTimeout(function() {
                    $('#Deduction_button').html(originalText);
                }, 500);


                let deduction_id = $("#deduction_id").val();
                let deduction_type_name = $("#edit_deduction_name").val();
                let amount = $("#edit_deduction_amount").val().replaceAll(',', '');

                let data = {
                    deduction_id: deduction_id,
                    deduction_type_name: deduction_type_name,
                    amount: amount,
                };
                console.log("DATADATA", data);
                axios
                    .post(apiUrl + '/api/createDeduction', data, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            console.log("SAVE");
                            $('#modal-edit-deduction').modal('hide');
                            $("div.spanner").addClass("show");
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(data.message);
                                $('#deduction_Store').trigger('reset');
                                $('#deduction_Store').removeClass('was-validated');
                                $('#Deduction_deduction_name').removeClass('is-invalid');
                                toast1.toast('show');
                                $('#deductionDropSearch').empty();
                                show_profileDeductionType_select();
                                show_Profilededuction_Table_Active();
                                show_profileDeductionType_Button();
                                $('#Deduction_button').prop("disabled", false);
                                toast1.toast('show');
                            }, 1500)
                        } else {
                            console.log("ERROR");
                        }
                    }).catch(function(error) {
                        setTimeout(function() {
                            $('#Deduction_button').prop("disabled", false);
                        }, 500);
                        let errors = error.response.data.errors;
                        console.log(errors);
                        $("#invalid-feedback-Deduction-name").addClass('invalid-feedback')
                            .html(
                                "This field is required.").show();

                    });
            })


            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var custom_deductiontype_store = $('#custom_deductiontype_store')
            // Loop over them and prevent submission
            Array.prototype.slice.call(custom_deductiontype_store)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

            // CREATE CUSTOM DEDUCTION TYPE
            $('#custom_deductiontype_store').submit(function(e) {
                e.preventDefault();
                var originalText = $('#createDeduction_button').html();
                $('#createDeduction_button').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                $('#createDeduction_button').prop("disabled", true);
                setTimeout(function() {
                    $('#createDeduction_button').html(originalText);
                }, 500);

                let profile_id = $("#custom_profile_id").val();
                let deduction_type_id = $("#Deduction_deduction_name").val();
                let amount = $("#createDeduction_deduction_amount").val().replaceAll(',', '');

                let data = {
                    profile_id: profile_id,
                    amount: amount,
                    deduction_type_id: deduction_type_id,
                };
                axios
                    .post(apiUrl + '/api/saveProfileDeductionTypes', data, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#modal-customize-create-deduction').modal('hide');
                            $("div.spanner").addClass("show");
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");
                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(data.message);
                                $('#custom_deductiontype_store').trigger('reset');
                                $('#custom_deductiontype_store').removeClass(
                                    'was-validated');
                                toast1.toast('show');
                                $('#deductionButton').html(
                                    show_profileDeductionType_Button());
                                $('#deductionDropSearch').empty();
                                show_profileDeductionType_select();
                                $('#createDeduction_button').prop("disabled", false);
                            }, 1500)
                        }
                    }).catch(function(error) {
                        setTimeout(function() {
                            $('#createDeduction_button').prop("disabled", false);
                        }, 500);

                        if (error.response.data.errors.deduction_type_name) {
                            if (error.response.data.errors.deduction_type_name.length > 0) {
                                $error = error.response.data.errors.deduction_type_name[0];
                                if ($("#Deduction_deduction_name").val() == "") {
                                    $("#invalid-feedback-storeDeduction-name").addClass(
                                        'invalid-feedback').html(
                                        "This field is required.").show();
                                    $('#mobileValidateStoreDeductionname').removeClass(
                                        'form-group-adjust');
                                } else {

                                    if ($error == "The deduction type name has already been taken.") {
                                        $("#invalid-feedback-storeDeduction-name").addClass(
                                            'invalid-feedback').html(
                                            "The deduction name has already been taken.").show();
                                        $('#mobileValidateStoreDeductionname').addClass(
                                            'form-group-adjust');
                                    }
                                }
                                $("#Deduction_deduction_name").addClass('is-invalid');
                            }
                        }
                    });
            })

            $('#submit-create-deduction').on('click', function(e) {
                e.preventDefault();
                var originalText = $('#submit-create-deduction').html();
                $('#submit-create-deduction').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                setTimeout(function() {
                    $('#submit-create-deduction').html(originalText);

                    let url = window.location.pathname;
                    let urlSplit = url.split('/');

                    if (urlSplit.length === 5) {
                        let profile_id = urlSplit[4];
                        $('#Deduction_profile_id').val(profile_id);
                        console.log('custom_pro123file_id', profile_id);
                        show_profile_deductions_onSelect();
                    }
                }, 500);
            })

            $('#submit-customize-create-deduction').on('click', function(e) {
                e.preventDefault();

                e.preventDefault();
                let url = window.location.pathname;
                let urlSplit = url.split('/');

                if (urlSplit.length === 5) {
                    let profile_id = urlSplit[4];
                    $("#custom_profile_id").val(profile_id);
                    $('#createDeduction_deduction_amount').val('');
                    show_profile_deductions_onSelect();
                }

            })


            $(document).on('change', '#Deduction_deduction_name', function() {
                let deduction_id = $(this).val();
                console.log("SELECT", deduction_id);
                if (deduction_id) {
                    axios.get(apiUrl + '/api/settings/get_deduction/' + deduction_id, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        console.log("SUCCESS", data);
                        if (data.success) {
                            {
                                $('#createDeduction_deduction_amount').val(PHP(data.data
                                    .deduction_amount).format());
                            }
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
                    })

                }
            })

            $('#tbl_showing_deductionTypesPages').on('change', function() {
                let pages = $(this).val();
                pageSize = pages; // update page size variable
                // Call the pendingInvoices() function with updated filters
                $('#dataTable_deduction tbody').html(
                    `<tr>
                    <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                // Call the pendingInvoices() function with updated filters
                setTimeout(function() {
                    show_Profilededuction_Table_Active({
                        page_size: pages
                    });
                }, 500);
            })

            // ORIGINAL
            function show_Profilededuction_Table_Active(filters) {
                let url = window.location.pathname;
                let urlSplit = url.split('/');
                // console.log(urlSplit.length);
                if (urlSplit.length === 5) {
                    let page = $("#tbl_pagination_deduction .page-item.active .page-link").html();

                    let filter = {
                        page_size: pageSize,
                        page: page ? page : 1,
                        profile_id: urlSplit[4],
                        search: $('#search_deduction').val() ? $('#search_deduction').val() : '',
                        ...filters
                    }

                    $('#dataTable_deduction tbody').empty();
                    axios.get(
                            `${apiUrl}/api/admin/show_Profilededuction_Table_Active?${new URLSearchParams(filter)}`, {
                                headers: {
                                    Authorization: token,
                                },
                            })
                        .then(function(response) {
                            data = response.data;
                            if (data.success) {
                                if (data.data.data.length > 0) {
                                    data.data.data.map((item) => {
                                        let newdate = new Date(item.created_at);
                                        var mm = newdate.getMonth() + 1;
                                        var dd = newdate.getDate();
                                        var yy = newdate.getFullYear();

                                        let tr = '<tr style="vertical-align: middle;">';
                                        tr += '<td class="fit" hidden>' + item.id + '</td>';
                                        if (item.invoice && item.invoice.invoice_no !== null) {
                                            tr += '<td class="fit">' + item.invoice.invoice_no +
                                                '</td>';

                                        } else {
                                            tr += '<td class="fit"></td>';
                                        }

                                        if (item.invoice && item.invoice.invoice_no !== null) {
                                            if (item.invoice.invoice_status == "Cancelled") {
                                                tr +=
                                                    '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-info btn-xs" > Cancelled </button></td >';
                                            } else if (item.invoice.invoice_status ==
                                                "Paid") {

                                                tr +=
                                                    '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-success">Paid</button></td>';
                                            } else if (item.invoice.invoice_status ==
                                                "Pending") {

                                                tr +=
                                                    '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-warning">Pending</button></td>';
                                            } else {
                                                tr +=
                                                    '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-danger">Overdue</button></td>';
                                            }
                                        } else {
                                            tr += '<td class="fit"></td>';
                                        }


                                        tr += '<td class="fit text-end edit_deduction_name">' + (item
                                                .deduction_type_name ?
                                                item.deduction_type_name : "N/A") +
                                            '</td>';
                                        tr += '<td class="fit text-end edit_deduction_amount">' + PHP(
                                                item
                                                .amount)
                                            .format() + '</td>';
                                        tr += '<td class="fit text-end">' + moment.utc(item
                                                .created_at)
                                            .tz(
                                                'Asia/Manila').format(
                                                'MM/DD/YYYY') + '</td>';

                                        if (item.invoice && item.invoice.invoice_no !== null) {
                                            tr += '<td class="fit text-center"> <a href="' +
                                                apiUrl +
                                                '/admin/editInvoice/' +
                                                item.invoice.id +
                                                '" style="color: #cf8029" ><i class="fa-solid fa-eye"></i></a> </td>';

                                        } else {
                                            tr +=
                                                '<td class="text-center" style="display:flex;justify-content:space-evenly;"><button value=' +
                                                item.id +
                                                ' class="editButton border-0 bg-transparent " data-bs-toggle="modal" data-bs-target="#modal-edit-deduction"  ><i class="fa-solid fa-pen-to-square" style="color:#CF8029"></i></button><button value=' +
                                                item.id +
                                                ' class="deleteDeductionButton border-0 bg-transparent " data-bs-toggle="modal" data-bs-target="#deleteDeductionModal" ><i class="fa-solid fa-trash" style="color:#dc3545"></i></button></td>';
                                        }

                                        tr += '</tr>';

                                        $("#dataTable_deduction tbody").append(tr);
                                        return ''
                                    })
                                    $('#tbl_pagination_deduction').empty();

                                    data.data.links.map(item => {
                                        let label = item.label;
                                        if (label === "&laquo; Previous") {
                                            label = "&laquo;";
                                        } else if (label === "Next &raquo;") {
                                            label = "&raquo;";
                                        }

                                        let li = `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}">
                                          <a class="page-link" data-url="${item.url}">${label}</a>
                                        </li>`;

                                        $('#tbl_pagination_deduction').append(li);
                                        return "";
                                    });

                                    if (data.data.links.length) {
                                        let lastPage = data.data.links[data.data.links.length - 1];
                                        if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                                            $('#tbl_pagination_deduction .page-item:last-child').addClass(
                                                'disabled');
                                        }
                                        let PreviousPage = data.data.links[0];
                                        if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url ==
                                            null) {
                                            $('#tbl_pagination_deduction .page-item:first-child').addClass(
                                                'disabled');
                                        }
                                    }
                                    $("#tbl_pagination_deduction .page-item .page-link").on('click',
                                        function() {
                                            $("#tbl_pagination_deduction .page-item")
                                                .removeClass(
                                                    'active');
                                            $(this).closest('.page-item').addClass('active');
                                            let url = $(this).data('url')

                                            var originalTextTable = $('#dataTable_deduction tbody').html();
                                            // Add spinner to the remaining row and set colspan to 5
                                            $('#dataTable_deduction tbody').html(
                                                `<tr>
                                            <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                                            );

                                            setTimeout(function() {
                                                $.urlParam = function(name) {
                                                    var results = new RegExp("[?&]" + name +
                                                            "=([^&#]*)")
                                                        .exec(
                                                            url
                                                        );
                                                    return results !== null ? results[1] || 0 :
                                                        0;
                                                };
                                                let search = $('#search_deduction').val();
                                                show_Profilededuction_Table_Active({
                                                    search: search,
                                                    page: $.urlParam('page')
                                                });
                                            }, 500);
                                        })
                                    let tbl_showing_deduction =
                                        `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                                    $('#tbl_showing_deduction').html(tbl_showing_deduction);
                                    $('#selectDeductionTypes').removeClass('d-none');
                                    $('#dataTable_deduction').addClass('table-hover');
                                } else {
                                    $("#dataTable_deduction tbody").append(
                                        '<tr><td colspan="6" class="text-center pb-2"><div class="noData" style="width:' +
                                        width +
                                        'px;position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                                    );
                                    let tbl_showing_deduction =
                                        `Showing 0 to 0 of 0 entries`;
                                    $('#tbl_showing_deduction').html(tbl_showing_deduction);
                                    $('#selectDeductionTypes').addClass('d-none');
                                    $('#dataTable_deduction').removeClass('table-hover');
                                }
                            }
                        })
                        .catch(function(error) {
                            console.log("catch error", error);
                        });
                }
            }

            function show_Profilededuction_Table_Active_Select(filters) {
                let url = window.location.pathname;
                let urlSplit = url.split('/');
                // console.log(urlSplit.length);
                if (urlSplit.length === 5) {
                    let page = $("#tbl_pagination_deduction .page-item.active .page-link").html();

                    let filter = {
                        page_size: pageSize,
                        page: page ? page : 1,
                        profile_id: urlSplit[4],
                        search: $('#deductionDropSearch').val() ? $('#deductionDropSearch').val() : '',
                        ...filters
                    }

                    $('#dataTable_deduction tbody').empty();
                    axios.get(
                            `${apiUrl}/api/admin/show_Profilededuction_Table_Active?${new URLSearchParams(filter)}`, {
                                headers: {
                                    Authorization: token,
                                },
                            })
                        .then(function(response) {
                            data = response.data;
                            if (data.success) {
                                console.log("PROFILE DEDUCTION SUCCESS", data);
                                if (data.data.data.length > 0) {
                                    data.data.data.map((item) => {
                                        let newdate = new Date(item.created_at);
                                        var mm = newdate.getMonth() + 1;
                                        var dd = newdate.getDate();
                                        var yy = newdate.getFullYear();

                                        let tr = '<tr style="vertical-align: middle;">';
                                        tr += '<td class="fit" hidden>' + item.id + '</td>';
                                        if (item.invoice && item.invoice.invoice_no !== null) {
                                            tr += '<td class="fit">' + item.invoice.invoice_no +
                                                '</td>';

                                        } else {
                                            tr += '<td class="fit"></td>';
                                        }

                                        if (item.invoice && item.invoice.invoice_no !== null) {
                                            if (item.invoice.invoice_status == "Cancelled") {
                                                tr +=
                                                    '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-info btn-xs" > Cancelled </button></td >';
                                            } else if (item.invoice.invoice_status ==
                                                "Paid") {

                                                tr +=
                                                    '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-success">Paid</button></td>';
                                            } else if (item.invoice.invoice_status ==
                                                "Pending") {

                                                tr +=
                                                    '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-warning">Pending</button></td>';
                                            } else {
                                                tr +=
                                                    '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-danger">Overdue</button></td>';
                                            }
                                        } else {
                                            tr += '<td class="fit"></td>';
                                        }


                                        tr += '<td class="fit text-end edit_deduction_name">' + (item
                                                .deduction_type_name ?
                                                item.deduction_type_name : "N/A") +
                                            '</td>';
                                        tr += '<td class="fit text-end edit_deduction_amount">' + PHP(
                                                item
                                                .amount)
                                            .format() + '</td>';
                                        tr += '<td class="fit text-end">' + moment.utc(item
                                                .created_at)
                                            .tz(
                                                'Asia/Manila').format(
                                                'MM/DD/YYYY') + '</td>';

                                        if (item.invoice && item.invoice.invoice_no !== null) {
                                            tr += '<td class="fit text-center"> <a href="' +
                                                apiUrl +
                                                '/admin/editInvoice/' +
                                                item.invoice.id +
                                                '" style="color: #cf8029" ><i class="fa-solid fa-eye"></i></a> </td>';

                                        } else {
                                            tr +=
                                                '<td class="text-center" style="display:flex;justify-content:space-evenly;"><button value=' +
                                                item.id +
                                                ' class="editButton border-0 bg-transparent " data-bs-toggle="modal" data-bs-target="#modal-edit-deduction"  ><i class="fa-solid fa-pen-to-square" style="color:#CF8029"></i></button><button value=' +
                                                item.id +
                                                ' class="deleteDeductionButton border-0 bg-transparent " data-bs-toggle="modal" data-bs-target="#deleteDeductionModal" ><i class="fa-solid fa-trash" style="color:#dc3545"></i></button></td>';
                                        }

                                        tr += '</tr>';

                                        $("#dataTable_deduction tbody").append(tr);
                                        return ''
                                        // let newdate = new Date(item.created_at);
                                        // var mm = newdate.getMonth() + 1;
                                        // var dd = newdate.getDate();
                                        // var yy = newdate.getFullYear();

                                        // let tr = '<tr style="vertical-align: middle;">';
                                        // if (item.invoice && item.invoice.invoice_no !== null) {
                                        //     tr += '<td class="fit">' + item.invoice.invoice_no +
                                        //         '</td>';

                                        // } else {
                                        //     tr += '<td class="fit"></td>';
                                        // }

                                        // if (item.invoice && item.invoice.invoice_no !== null) {
                                        //     if (item.invoice.invoice_status == "Cancelled") {
                                        //         tr +=
                                        //             '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-info btn-xs" > Cancelled </button></td >';
                                        //     } else if (item.invoice.invoice_status ==
                                        //         "Paid") {

                                        //         tr +=
                                        //             '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-success">Paid</button></td>';
                                        //     } else if (item.invoice.invoice_status ==
                                        //         "Pending") {

                                        //         tr +=
                                        //             '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-warning">Pending</button></td>';
                                        //     } else {
                                        //         tr +=
                                        //             '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-danger">Overdue</button></td>';
                                        //     }
                                        // } else {
                                        //     tr += '<td class="fit"></td>';
                                        // }


                                        // tr += '<td class="fit text-end">' + (item.deduction_type_name ?
                                        //         item.deduction_type_name : "N/A") +
                                        //     '</td>';
                                        // tr += '<td class="fit text-end">' + PHP(item
                                        //         .amount)
                                        //     .format() + '</td>';
                                        // tr += '<td class="fit text-end">' + moment.utc(item
                                        //         .created_at)
                                        //     .tz(
                                        //         'Asia/Manila').format(
                                        //         'MM/DD/YYYY') + '</td>';

                                        // tr += '</tr>';

                                        // $("#dataTable_deduction tbody").append(tr);
                                        // return ''
                                    })
                                    $('#tbl_pagination_deduction').empty();

                                    data.data.links.map(item => {
                                        let label = item.label;
                                        if (label === "&laquo; Previous") {
                                            label = "&laquo;";
                                        } else if (label === "Next &raquo;") {
                                            label = "&raquo;";
                                        }

                                        let li = `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}">
                                            <a class="page-link" data-url="${item.url}">${label}</a>
                                          </li>`;

                                        $('#tbl_pagination_deduction').append(li);
                                        return "";
                                    });

                                    if (data.data.links.length) {
                                        let lastPage = data.data.links[data.data.links.length - 1];
                                        if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                                            $('#tbl_pagination_deduction .page-item:last-child').addClass(
                                                'disabled');
                                        }
                                        let PreviousPage = data.data.links[0];
                                        if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url ==
                                            null) {
                                            $('#tbl_pagination_deduction .page-item:first-child').addClass(
                                                'disabled');
                                        }
                                    }
                                    $("#tbl_pagination_deduction .page-item .page-link").on('click',
                                        function() {
                                            $("#tbl_pagination_deduction .page-item")
                                                .removeClass(
                                                    'active');
                                            $(this).closest('.page-item').addClass('active');
                                            let url = $(this).data('url')

                                            var originalTextTable = $('#dataTable_deduction tbody').html();
                                            // Add spinner to the remaining row and set colspan to 5
                                            $('#dataTable_deduction tbody').html(
                                                `<tr>
                                            <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                                            );
                                            setTimeout(function() {
                                                $.urlParam = function(name) {
                                                    var results = new RegExp("[?&]" + name +
                                                            "=([^&#]*)")
                                                        .exec(
                                                            url
                                                        );
                                                    return results !== null ? results[1] || 0 :
                                                        0;
                                                };
                                                let search = $('#deductionDropSearch').val();
                                                show_Profilededuction_Table_Active_Select({
                                                    search: search,
                                                    page: $.urlParam('page')
                                                })
                                            }, 500);
                                        })
                                    let tbl_showing_deduction =
                                        `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                                    $('#tbl_showing_deduction').html(tbl_showing_deduction);
                                    $('#dataTable_deduction').addClass('table-hover');
                                } else {
                                    $("#dataTable_deduction tbody").append(
                                        '<tr><td colspan="6" class="text-center pb-2"><div class="noData" style="width:' +
                                        width +
                                        'px;position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                                    );
                                    let tbl_showing_deduction =
                                        `Showing 0 to 0 of 0 entries`;
                                    $('#tbl_showing_deduction').html(tbl_showing_deduction);
                                    $('#dataTable_deduction').removeClass('table-hover');
                                }
                            }
                        })
                        .catch(function(error) {
                            console.log("catch error", error);
                        });
                }
            }

            $(document).on('click', '#dataTable_deduction .deleteButton', function(
                e) {
                e.preventDefault();
                let row = $(this).closest("td");
                let deleteProfileDeductionType_id = row.find(".deleteButton").val();
                $("#deleteProfileDeductionType_id").html(deleteProfileDeductionType_id);
                console.log("deleteProfileDeductionType_id", deleteProfileDeductionType_id);
            })

            $(document).on('click', '#dataTable_deduction .deleteDeductionButton', function(
                e) {
                e.preventDefault();
                let row = $(this).closest("td");
                let deduction_id = row.find(".deleteDeductionButton").val();
                $("#delete_deduction_id").html(deduction_id);
            })

            $(document).on('click', '#dataTable_deduction .editButton', function(
                e) {
                e.preventDefault();
                let row = $(this).closest("tr");
                let deduction_id = row.find(".editButton").val();
                let edit_deduction_name = row.find(".edit_deduction_name").text();
                let edit_deduction_amount = row.find(".edit_deduction_amount").text();
                $("#deduction_id").val(deduction_id);
                $("#edit_deduction_name").val(edit_deduction_name);
                $("#edit_deduction_amount").val(edit_deduction_amount);

            })

            $('#deleteProfileDeductionTypeButton').on('click', function(e) {
                e.preventDefault();

                let deductionType_id = $('#deductionType_id').html();
                axios.post(apiUrl + '/api/deleteDeductionType/' + deductionType_id, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                        $('#deleteModal').modal('hide');
                        $('html,body').animate({
                            scrollTop: $('#sb-nav-fixed').offset().top
                        }, 'smooth');
                        $('div.spanner').addClass('show');
                        setTimeout(function() {
                            $('div.spanner').removeClass('show');
                            $('.toast1 .toast-title').html('Invoice Configuration');
                            $('.toast1 .toast-body').html(response.data.message);
                            toast1.toast('show');
                            show_data();
                        }, 1500);
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                });
            });


            $("#createDeduction_deduction_amount").focusout(function() {
                let amount = $(this).val();
                $('#createDeduction_deduction_amount').val(PHP(amount).format());
            });

            $("#Deduction_deduction_amount").focusout(function() {
                let amount = $(this).val();
                $('#Deduction_deduction_amount').val(PHP(amount).format());
            });

            $("#edit_deduction_amount").focusout(function() {
                let amount = $(this).val();
                $('#edit_deduction_amount').val(PHP(amount).format());
            });

            $("#edit_profileDeductionType_amount").focusout(function() {
                let amount = $(this).val();
                $('#edit_profileDeductionType_amount').val(PHP(amount).format());
            });

            // SHOW DEDUCTIONS DATA IN TABLE
            function show_profileDeductionType_Button() {
                let url = window.location.pathname;
                let urlSplit = url.split('/');

                if (urlSplit.length === 5) {
                    let profile_id = urlSplit[4];
                    // console.log("profile_id", profile_id);
                    $("#deductionButton").empty();
                    axios.get(apiUrl + '/api/settings/show_profileDeductionType_Button/' + profile_id, {
                            headers: {
                                Authorization: token,
                            },
                        })
                        .then(function(response) {
                            let data = response.data;
                            console.log("show_profileDeductionType_Button", data);
                            if (data.success) {
                                if (data.data.profile_deduction_types.length > 0) {
                                    data.data.profile_deduction_types.map((item) => {
                                        let label = '<label>';
                                        label +=
                                            "<button type='button' data-bs-toggle='modal' style='background-color:#CF8029;color:white;' data-bs-target='#ProfileDeductioneditModal' id='editProfileDeduction' class='btn btn-sm editProfileDeduction my-2 mx-2' value=" +
                                            item.id + ">" + item.deduction_type_name +
                                            "</button>";
                                        label += '</label>';
                                        $("#deductionButton").append(label);
                                        return '';
                                    })
                                }
                            }
                        })
                        .catch(function(error) {
                            console.log("catch error", error);
                        });
                }
            }

            var ProfileDeductiontype_update = $('#ProfileDeductiontype_update')
            // Loop over them and prevent submission
            Array.prototype.slice.call(ProfileDeductiontype_update)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

            // MODAL OF PROFILE DEDUCTION TYPE BUTTON
            $('#ProfileDeductiontype_update').submit(function(e) {
                e.preventDefault();

                // BUTTON SPINNER
                var originalText = $('#profile_deduction_update').html();
                $('#profile_deduction_update').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                $('#profile_deduction_update').prop("disabled", true);
                setTimeout(function() {
                    $('#profile_deduction_update').html(originalText);
                }, 500);

                let profileDeductionType_id = $('#profileDeductionType_id').val();
                let profile_id = $('#profileDeductionType_profileId').val();
                let profileDeductionType_name = $('#edit_profileDeductionType_name').val();
                let profileDeductionType_amount = $('#edit_profileDeductionType_amount').val()
                    .replaceAll(
                        ',',
                        '');

                let data = {
                    id: profileDeductionType_id,
                    profile_id: profile_id,
                    amount: profileDeductionType_amount,
                    deduction_type_name: profileDeductionType_name
                };
                axios.post(apiUrl + '/api/editProfileDeductionTypes', data, {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        $('#ProfileDeductioneditModal').modal('hide');

                        $("div.spanner").addClass("show");
                        setTimeout(function() {
                            $("div.spanner").removeClass("show");

                            $('#deductionButton').empty();
                            $('#deductionButton').html(
                                show_profileDeductionType_Button());

                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>'
                            );
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(data.message);
                            toast1.toast('show');
                            $('#ProfileDeductiontype_update').trigger('reset');
                            $('#ProfileDeductiontype_update').removeClass(
                                'was-validated');
                            show_Profilededuction_Table_Active();
                            show_profileDeductionType_select();
                            $('#profile_deduction_update').prop("disabled", false);
                        }, 1500)

                    }
                }).catch(function(error) {
                    setTimeout(function() {
                        $('#profile_deduction_update').prop("disabled", false);
                    }, 500);
                    console.log("error.response.data.errors", error);
                    if (error.response.data.errors) {
                        if (error.response.data.errors.deduction_type_name) {
                            if (error.response.data.errors.deduction_type_name.length > 0) {
                                $deduction_type_name_error = error.response.data.errors
                                    .deduction_type_name[0];
                                if ($deduction_type_name_error ==
                                    "The deduction type name field is required.") {
                                    $("#error_edit_deduction_name").addClass('invalid-feedback')
                                        .html(
                                            "This field is required.").show();
                                }

                                if ($deduction_type_name_error ==
                                    "The deduction type name has already been taken.") {
                                    $("#error_edit_deduction_name").addClass('invalid-feedback')
                                        .html(
                                            "The deduction name has already been taken.").show();
                                }
                            }
                        } else {
                            $("#error_edit_deduction_name").removeClass('invalid-feedback').html("")
                                .show();
                        }
                    }

                })

            })

            $('#pills-invoice-tab').on('click', function(e) {
                e.preventDefault();
                var originalTextTable = $('#dataTable_invoice tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_invoice tbody').html(
                    `<tr>
                <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    show_data();
                }, 500);
            })

            $('#pills-deduction-tab').on('click', function(e) {
                e.preventDefault();
                var originalTextTable = $('#dataTable_deduction tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_deduction tbody').html(
                    `<tr>
                <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    show_Profilededuction_Table_Active();
                }, 500);
            })

            Tabs();
            // TABS SELECTOR WONT CHANGE IF REFRESH
            function Tabs() {
                let url = window.location.pathname
                let urlSplit = url.split('/');
                if (urlSplit.length === 5) {
                    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                        localStorage.setItem('activeTab', $(e.target).attr('href'));
                    });
                    var activeTab = localStorage.getItem('activeTab');
                    if (activeTab) {
                        $('#pills-tab a[href="' + activeTab + '"]').tab('show');
                    }
                }
            }

            window.addEventListener('load', function() {
                // Remove the 'activeTab' item from localStorage
                localStorage.removeItem('activeTab');
            });
        });
    </script>
@endsection
