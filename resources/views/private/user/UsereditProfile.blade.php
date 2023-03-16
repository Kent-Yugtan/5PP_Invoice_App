@extends('layouts.user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
@section('content-dashboard')

<div class="container-fluid px-4">
  <h1 class="mt-0">Edit Profile</h1>
  <ol class="breadcrumb mb-3"></ol>

  <div class="row">
    <div class="col-md-6 px-2">
      <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
        <div class="card-header">Edit Informationssssssssssssssssssssss</div>
        <div class="row px-4 pb-4">
          <form id="user_ProfileUpdate" method="POST" action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
            @csrf
            <input type="text" id="user_id" hidden value="{{$findid->id}}">
            <div class="col mb-3">
              <div class="profile-pic-div" style="position: relative; height:200px">
                <img src="/images/default.png" id="user_photo">
                <input name="file" type="file" id="user_file">
                <label for="file" id="user_uploadBtn">Choose Photo</label>
              </div>
            </div>

            <div class="col pt-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="user_profile_status" name="profile_status" checked>
                <label class="form-check-label" for="status">
                  Active
                </label>

              </div>

              <div class="mb-3">
                <label mb-2 style="color: #A4A6B3;">First Name</label>
                <input id="user_first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror " placeholder="First Name" value="{{ old('first_name') }}" required>

              </div>
              <div class="mb-3">
                <label mb-2 style="color: #A4A6B3;">Last Name</label>
                <input id="user_last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror " placeholder="Last Name" value="{{ old('last_name') }}" required>
              </div>
            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Email</label>
              <input id="user_email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Username</label>
              <input id="user_username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required>
            </div>
            <!--                         
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Password</label>
                            <input id="password" name="password" type="text"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                required>
                        </div> -->

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Position</label>
              <select class="form-select @error('position') is-invalid @enderror" id="position" name="position" aria-label="Default select example" defaultValue="select">
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
              <input id="user_phone_number" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Phone Number">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Address</label>
              <input id="user_address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Address">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Province</label>
              <input id="user_province" name="province" type="text" class="form-control @error('province') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Province">

            </div>


            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">City</label>
              <input id="user_city" name="city" type="text" class="form-control @error('city') is-invalid @enderror" id="formGroupExampleInput2" placeholder="City">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Zip Code</label>
              <input id="user_zip_code" name="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Zip Code">

            </div>


            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Account Number</label>
              <input id="user_acct_no" name="acct_no" type="text" class="form-control @error('acct_no') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Account Number">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Account Name</label>
              <input id="user_acct_name" name="acct_name" type="text" class="form-control @error('acct_name') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Account Name">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Bank Name</label>
              <select class="form-select @error('bank_name') is-invalid @enderror" id="user_bank_name" name="bank_name" aria-label="Default select example">
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
                <option value="Asia United Bank Corporation">Asia United Bank Corporation (AUB)</option>
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
              <input id="user_bank_location" name="bank_location" type="text" class="form-control @error('bank_location') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Bank Address">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
              <input id="user_gcash_no" name="gcash_no" type="text" class="form-control @error('gcash_no') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Gcash Number">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Date Hired</label>
              <input id="user_date_hired" name="date_hired" type="date" class="form-control @error('date_hired') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Date Hired">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Deduction Types</label>
              <select class="select2-multiple form-control form-select" name="deduction_types[]" multiple="multiple" id="select2Multiple">
              </select>
            </div>

            <div class="row">
              <div class="col mb-3">
                <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn ">Edit
                  Profile</button>
              </div>
              <div class="col mb-3">
                <button type="submit" style="width:100%; height:50px;color:white; background-color: #A4A6B3;" class="btn">Change Password</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6 px-1">
      <div class="row" style="height:100%">
        <div class="col">
          <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
            <!-- <div class="card-header">Profile Information</div> -->
            <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation" style="width:50%">
                <button style="width:100%" class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-selected="true">Invoices</button>
              </li>
              <li class="nav-item" role="presentation" style="width:50%">
                <button style="width:100%" class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Deductions</button>
              </li>
            </ul>
            <form id="user_CreateInvoice" method="POST" action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
              @csrf
              <div class="col-md-4">
                <div class="input-group">
                  <!-- START MODAL -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="width:200%;height:900%">
                      <div class=" modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="user_createnvoice1">Create Invoice</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">

                            <div class="col-12">
                              <div class="col pt-3">
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Invoice #</label>
                                  <input type="text" class="form-control" id="user_invoice_no" placeholder="Invoice Number">
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="col pt-3">
                                <div class="form-group">

                                  <label for="formGroupExampleInput">Description</label>
                                  <input type="text" class="form-control" id="user_description" placeholder="description">
                                </div>
                              </div>
                            </div>
                            <div id="user_show_items">
                              <div class="col-12 mb-3">
                                <div class="row">
                                  <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group" style="text-align:end">
                            </br>
                            <button class="btn" style="width:5%;color:red" id="user_add_item1">
                              <i class="fa fa-plus pe-1"></i></button>
                          </div>
                          <div class="col-12 mb-3">
                            <div class="row">
                              <div class="col" style="display: flex;flex-direction: column-reverse;align-items: center;">
                                <div class="form-group">
                                  <label class="formGroupExampleInput2">Discount
                                    Type</label>
                                  <br>
                                  <input class="form-check-input" type="radio" name="discount_type" id="user_discount_type" value="fixed">
                                  <label class="formGroupExampleInput2">
                                    Fxd &nbsp; &nbsp;
                                  </label>
                                  <input class="discount_type form-check-input" type="radio" name="discount_type" id="user_discount_type" value="percentage">
                                  <label class="formGroupExampleInput2">
                                    %
                                  </label>
                                  <!-- <input type="text" id="discount_type" class="form-control" /> -->

                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="formGroupExampleInput2 label_discount_amount">Discount
                                    Amount ($)</label>
                                  <input type="text" style="text-align:right" ; onkeypress="return onlyNumberKey(event)" id="user_discount_amount" class="form-control" />
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="formGroupExampleInput2 label_discount_total">Discount
                                    Total ($)</label>
                                  <input type="text" disabled style="text-align:right; border:0px;background-color:white;" onkeypress="return onlyNumberKey(event)" id="user_discount_total" class="form-control" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 mb-3">
                            <div class="row">
                              <div class="col-12 my-3" style="justify-content:end;display:flex">
                                <div class="form-group">
                                  <!-- border-style:none -->
                                  <label>Subtotal ($): <label>
                                      <input type="text" style="font-weight: bold;text-align:right;border:none;background-color:white" name="subtotal" id="user_subtotal" class="form-control no-outline subtotal" disabled>
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
                                  <input type="text" id="user_dollar_amount" style="font-weight: bold;border:none; text-align:right;background-color:white" class="form-control dollar_amount" disabled />

                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="formGroupExampleInput2">Peso Rate
                                    (Php)</label>
                                  <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="user_peso_rate" class="form-control" disabled />
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="formGroupExampleInput2" for="form3Example2">Converted
                                    Amount</label>
                                  <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="user_converted_amount" class="form-control converted_amount" disabled />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="row mt-5">
                              <div class="col mb-5">
                                <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                              </div>
                              <div class="col">
                                <button type="submit" class="btn btn-secondary w-100" style=" color:White; background-color:#CF8029; " data-bs-dismiss="modal">Save</button>
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


        <div class="form-group has-search">
          <div class=" tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="card-body table-responsive">
                <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover" id="user_datatablesSimple">
                  <div class="col-md-4 w-100">
                    <div class="input-group">
                      <button style="color:white; background-color: #CF8029;" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" id="button-addon2" class="btn form-check-inline pe-3 "><i class="fa fa-plus pe-1"></i>Create
                        Invoice</button>
                      <input type="text" aria-label="First name" class="form-control form-check-inline">
                      <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                    </div>
                  </div>
                  <thead>
                    <tr>
                      <th>Invoice #</th>
                      <th>Status</th>
                      <th>Due Date</th>
                      <th>Total Amount</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-danger btn-xs">Pending</button>
                      </td>
                      <td>12/31/2022</td>
                      <td>Edinburgh</td>
                      <td class="text-center" style="font-size:14px">
                        <button style="width:90px" type="button" class="fa-sharp fa-solid fa-eye view-hover"></button>
                      </td>
                    </tr>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-info">Cancelled</button></td>
                      <td>12/31/2022</td>
                      <td>Edinburgh</td>
                      <td class="text-center" style="font-size:14px">
                        <button type="button" class="fa-sharp fa-solid fa-eye view-hover"></button>
                      </td>
                    </tr>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-success">Paid</button>
                      </td>
                      <td>12/31/2022</td>
                      <td>Edinburgh</td>
                      <td class="text-center" style="font-size:14px">
                        <button type="button" class="fa-sharp fa-solid fa-eye view-hover"></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="card-body table-responsive">
                <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover" id="datatablesSimple">
                  <div class="col-md-4 w-100">
                    <div class="input-group">
                      <button type="button" style="color:white; background-color: #CF8029;" class="btn form-check-inline pe-3 "><i class="fa fa-plus pe-1"></i>Create
                        Deduction</button>
                      <input type="text" aria-label="First name" class="form-control form-check-inline">
                      <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                    </div>
                  </div>
                  <thead>
                    <tr>
                      <th>Deduction</th>
                      <th>Status</th>
                      <th>Date Created</th>
                      <th>Amount</th>
                      <th class="text-center" id="action1">Action</th>

                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-danger btn-xs">Pending</button>
                      </td>
                      <td>12/31/2022</td>
                      <td>Edinburgh</td>
                      <td class="text-center" style="font-size:14px">
                        <button style="width:90px" type="button" class="fa-sharp fa-solid fa-eye view-hover"></button>
                      </td>
                    </tr>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-info">Cancelled</button></td>
                      <td>12/31/2022</td>
                      <td>Edinburgh</td>
                      <td class="text-center" style="font-size:14px">
                        <button type="button" class="fa-sharp fa-solid fa-eye view-hover"></button>
                      </td>
                    </tr>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-success">Paid</button>
                      </td>
                      <td>12/31/2022</td>
                      <td>Edinburgh</td>
                      <td class="text-center" style="font-size:14px">
                        <button type="button" class="fa-sharp fa-solid fa-eye view-hover"></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>







<div style="position: fixed; top: 20px; right: 20px;">
  <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <div><i class="fa fa-newspaper-o"> </i></div>
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



@endsection