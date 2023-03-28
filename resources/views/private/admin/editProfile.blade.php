@extends('layouts.private')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
@section('content-dashboard')

<div class="container-fluid px-4">
  <h1 class="mt-0">Edit Profile</h1>
  <ol class="breadcrumb mb-3"></ol>

  <div class="row">
    <div class="col-md-6 px-2">
      <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
        <div class="card-header">Edit Information</div>
        <div class="row px-4 pb-4">
          <form id="ProfileUpdate" method="POST" action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
            @csrf
            <input type="text" id="user_id" hidden value="{{$findid->id}}">
            <div class="col mb-3">
              <div class="profile-pic-div" style="position: relative; height:200px">
                <img src="/images/default.png" id="photo">
                <input name="file" type="file" id="file">
                <label for="file" id="uploadBtn">Choose Photo</label>
              </div>
            </div>

            <div class="col pt-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="profile_status" name="profile_status" checked>
                <label class="form-check-label" for="status">
                  Active
                </label>

              </div>

              <div class="mb-3">
                <label mb-2 style="color: #A4A6B3;">First Name</label>
                <input id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror " placeholder="First Name" value="{{ old('first_name') }}" required>

              </div>
              <div class="mb-3">
                <label mb-2 style="color: #A4A6B3;">Last Name</label>
                <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror " placeholder="Last Name" value="{{ old('last_name') }}" required>
              </div>
            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Email</label>
              <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Username</label>
              <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required>
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
              <input id="phone_number" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Phone Number">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Address</label>
              <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Address">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Province</label>
              <input id="province" name="province" type="text" class="form-control @error('province') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Province">

            </div>


            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">City</label>
              <input id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror" id="formGroupExampleInput2" placeholder="City">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Zip Code</label>
              <input id="zip_code" name="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Zip Code">

            </div>


            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Account Number</label>
              <input id="acct_no" name="acct_no" type="text" class="form-control @error('acct_no') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Account Number">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Account Name</label>
              <input id="acct_name" name="acct_name" type="text" class="form-control @error('acct_name') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Account Name">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Bank Name</label>
              <select class="form-select @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" aria-label="Default select example">
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
              <input id="bank_address" name="bank_address" type="text" class="form-control @error('bank_address') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Bank Address">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
              <input id="gcash_no" name="gcash_no" type="text" class="form-control @error('gcash_no') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Gcash Number">

            </div>

            <div class="mb-3">
              <label mb-2 style="color: #A4A6B3;">Date Hired</label>
              <input id="date_hired" name="date_hired" type="date" class="form-control @error('date_hired') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Date Hired">

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
            <form id="CreateInvoice" method="POST" action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
              @csrf
              <div class="col-md-4">
                <div class="input-group">
                  <!-- START MODAL -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="width:200%;height:900%">
                      <div class=" modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="createnvoice1">Create Invoice</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">

                            <div class="col-12">
                              <div class="col pt-3">
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Invoice #</label>
                                  <input type="text" class="form-control" id="invoice_no" placeholder="Invoice Number">
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="col pt-3">
                                <div class="form-group">

                                  <label for="formGroupExampleInput">Description</label>
                                  <input type="text" class="form-control" id="description" placeholder="description">
                                </div>
                              </div>
                            </div>
                            <div id="show_items">
                              <div class="col-12 mb-3">
                                <div class="row">
                                  <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group" style="text-align:end">
                            </br>
                            <button class="btn" style="width:5%;color:red" id="add_item1">
                              <i class="fa fa-plus pe-1"></i></button>
                          </div>
                          <div class="col-12 mb-3">
                            <div class="row">
                              <div class="col" style="display: flex;flex-direction: column-reverse;align-items: center;">
                                <div class="form-group">
                                  <label class="formGroupExampleInput2" style="color: #A4A6B3;">Discount
                                    Type</label>
                                  <br>
                                  <input class="form-check-input" type="radio" name="discount_type" id="discount_type" value="fixed">
                                  <label class="formGroupExampleInput2">
                                    Fxd &nbsp; &nbsp;
                                  </label>
                                  <input class="discount_type form-check-input" type="radio" name="discount_type" id="discount_type" value="percentage">
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
                                  <input type="text" style="text-align:right" ; onkeypress="return onlyNumberKey(event)" id="discount_amount" class="form-control" />
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="formGroupExampleInput2 label_discount_total">Discount
                                    Total ($)</label>
                                  <input type="text" disabled style="text-align:right; border:0px;background-color:white;" onkeypress="return onlyNumberKey(event)" id="discount_total" class="form-control" />
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
                                      <input type="text" style="font-weight: bold;text-align:right;border:none;background-color:white" name="subtotal" id="subtotal" class="form-control no-outline subtotal" disabled>
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
                                  <input type="text" id="dollar_amount" style="font-weight: bold;border:none; text-align:right;background-color:white" class="form-control dollar_amount" disabled />

                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="formGroupExampleInput2">Peso Rate
                                    (Php)</label>
                                  <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="peso_rate" class="form-control" disabled />
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="formGroupExampleInput2" for="form3Example2">Converted
                                    Amount</label>
                                  <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="converted_amount" class="form-control converted_amount" disabled />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="row mt-5">
                              <div class="col mb-5">
                                <button type="button" class="btn  w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                              </div>
                              <div class="col">
                                <button type="submit" class="btn  w-100" style=" color:White; background-color:#CF8029; " data-bs-dismiss="modal">Save</button>
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
                <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover" id="datatablesSimple">
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

<script type="text/javascript">
  $(document).ready(function() {
    display_rows();
    show_edit();

    function show_edit() {
      let user_id = $('#user_id').val();
      axios.get(apiUrl + '/api/admin/show_edit/' + user_id, {
          headers: {
            Authorization: token,
          },
        })
        .then(function(response) {
          let data = response.data;
          console.log("response", data);
          if (data.success) {
            // console.log("SUCCESS");
            // console.log("GENERAL", data.data.email);
            console.log("PROFILE", data.data.profile);
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
            // $("#photo").attr("src", data.data.profile.file_path);
            if (data.data.profile.file_path) {
              $('#photo').val(data.data.profile.file_path);
            } else {
              $("#photo").attr("src", "/images/default.png");
            }

            // console.log('profile_deduction_types', data.data.profile.profile_deduction_types);
            let profile_deduction_types_reduce = data.data.profile.profile_deduction_types.reduce((
              a, b) => {
              a.push(b.deduction_type_id)
              return a
            }, [])
            // console.log('profile_deduction_types_reduce', profile_deduction_types_reduce);
            setTimeout(() => {
              $('#select2Multiple').val(profile_deduction_types_reduce).change();
            }, 1000)
          }
        })
        .catch(function(error) {
          console.log("ERROR", error);
        });
    }
    show_edit();

    let toast1 = $('.toast1');
    toast1.toast({
      delay: 3000,
      animation: true
    });

    $('.close').on('click', function(e) {
      e.preventDefault();
      toast1.toast('hide');
    })

    $('#ProfileUpdate').submit(function(e) {
      e.preventDefault();
      let user_id = $("#user_id").val();
      let profile_id = $("#profile_id").val();
      let first_name = $("#first_name").val();
      let last_name = $("#last_name").val();
      let email = $("#email").val();
      let position = $("#position").val();
      // let password = $("#password").val();
      let username = $("#username").val();
      let phone_number = $("#phone_number").val();
      let address = $("#address").val();
      let province = $("#province").val();
      let city = $("#city").val();
      let zip_code = $("#zip_code").val();
      let profile_status = $("#profile_status").val();
      let acct_no = $("#acct_no").val();
      let acct_name = $("#acct_name").val();
      let bank_name = $("#bank_name").val();
      let bank_address = $("#bank_address").val();
      let gcash_no = $("#gcash_no").val();
      let date_hired = $("#date_hired").val();
      let deduction_type_id = $('#select2Multiple').val();
      let formData = new FormData();
      formData.append('id', user_id);
      formData.append('profile_id', profile_id);
      formData.append('first_name', first_name);
      formData.append('last_name', last_name);
      formData.append('email', email);
      formData.append('username', username);
      // formData.append('password', "");
      formData.append('position', position ?? "");
      formData.append('phone_number', phone_number);
      formData.append('address', address);
      formData.append('province', province);
      formData.append('city', city);
      formData.append('zip_code', zip_code);
      if (document.getElementById('profile_status').checked == true) {
        formData.append('profile_status', 'Active');
      } else {
        formData.append('profile_status', 'Inactive');
      }
      formData.append('acct_no', acct_no);
      formData.append('acct_name', acct_name);
      formData.append('bank_name', bank_name ?? "");
      formData.append('bank_address', bank_address);
      formData.append('gcash_no', gcash_no);
      formData.append('date_hired', date_hired);
      formData.append('deduction_type_id', JSON.stringify(deduction_type_id));
      if (document.getElementById('file').files.length > 0) {
        formData.append('profile_picture', document.getElementById('file').files[0],
          "picture.png");
      }
      axios.post(apiUrl + '/api/saveprofile', formData, {
          headers: {
            Authorization: token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then(function(response) {
          let data = response.data;
          console.log("SUCCESS", data);
          if (data.success == true) {
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
            $("#photo").attr("src", "/images/default.png");
            show_deduction();
            // select2Multiple
            $('.toast1 .toast-title').html('Profile');
            $('.toast1 .toast-body').html(data.message);
            toast1.toast('show');
          }
        })
        .catch(function(error) {
          // console.log('CATCH ERROR', error);
          // if (error.response.data.message) {
          //     $('#error_full_name').text(error.response.data.errors.full_name[0]);
          // }
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
              $('.toast1 .toast-title').html(fieldname);
              $('.toast1 .toast-body').html(Object.values(errors)[0]
                .join(
                  "\n\r"));
            })
            toast1.toast('show');
          }
        });
    })

    $('.close').on('click', function(e) {
      e.preventDefault();
      toast1.toast('hide');
    })
    $("#error_msg").hide();
    $("#success_msg").hide();

    show_edit();

    $('.close').on('click', function(e) {
      e.preventDefault();
      toast1.toast('hide');
    })
    $("#error_msg").hide();
    $("#success_msg").hide();

    function show_deduction() {
      axios
        .get(apiUrl + '/api/show_deduction_type', {
          headers: {
            Authorization: token,
          }
        }).then(function(response) {
          response = response.data
          // console.log('RESPONSE SELECT', response);
          if (response.success) {
            // console.log('SUCCESS');
            if (response.data.length > 0) {
              $('#select2Multiple').empty();
              response.data.map((item) => {
                let option = '<option>';
                option += "<option value=" + item.id + ">" + item.id + " - " + item
                  .deduction_name +
                  " - " + item.deduction_amount +
                  "</option>"
                $("#select2Multiple").append(option);
                return '';
              })
            }
          }
        }).catch(function(error) {
          console.log('ERROR', error);
        });
    }
    show_deduction();
    $('.select2-multiple').select2({
      placeholder: "Select",
      // allowClear: true
    });

    function capitalize(s) {
      if (typeof s !== 'string') return "";
      return s.charAt(0).toUpperCase() + s.slice(1);
    }
    // FUNCTION CLICK FOR REMOVING INVOICE ITEMS ROWS
    $(document).on('click', '.remove_items', function(e) {
      e.preventDefault();
      let parent = $(this).closest('.row');
      let sub_total = parent.find('.subtotal').val();
      let row_item = $(this).parent().parent().parent();
      console.log("subTOTAL", sub_total);
      $(row_item).remove();
      x--;
      GrandTotal();
      getResults_Converted();

      if ($('#show_items > .row').length === 1) {
        $('#show_items > .row').find('.col-remove-item').removeClass('d-none')
          .addClass(
            'd-none');
      }
    });

    $("#add_item1").click(function(e) {
      e.preventDefault();
      display_rows()
    });

    $('#show_items').on("keyup", ".multi", function() {
      let sub_total = 0;
      let parent = $(this).closest('.row');
      let quantity = parent.find('.quantity').val() ? parent.find('.quantity').val() :
        0;
      let rate = parent.find('.rate').val() ? parent.find('.rate').val() : 0;
      sub_total = parseFloat(quantity) * parseFloat(rate);
      parent.find('.amount').val(sub_total.toFixed(2));
      GrandTotal();
      getResults_Converted();
    });

    function display_rows() {
      let max_fields = 10;
      let wrapper = $('#show_items');
      add_rows = '';
      add_rows += '<div class="row">';

      add_rows += '<div class="col-md-4 mb-3">';
      add_rows += '<div class="form-group">';
      add_rows += '<label class="formGroupExampleInput2">Item Desctiption</label>';
      add_rows +=
        '<input type="text" name="item_description" id="item_description" class="form-control item_description" />';
      add_rows += '</div>';
      add_rows += '</div>';

      add_rows += '<div class="col-md-2 mb-3">';
      add_rows += '<div class="form-group">';
      add_rows += '<label class="formGroupExampleInput2">Quantity</label>';
      add_rows +=
        '<input type="number" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
      add_rows += '</div>';
      add_rows += ' </div>';

      add_rows += '<div class="col-md-2 mb-3">';
      add_rows += '<div class="form-group">';
      add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Rate</label>';
      add_rows +=
        '<input type="text" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
      add_rows += '</div>';
      add_rows += '</div>';

      add_rows += '<div class="col-md-3 mb-3">';
      add_rows += '<div class="form-group">';
      add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Amount</label>';
      add_rows +=
        '<input type="text" style="text-align:right;border:none;background-color:white" disabled name="amount" id="amount" class="form-control amount" />';
      add_rows += '</div>';
      add_rows += '</div>';

      add_rows += '<div class="col-md-1 col-remove-item d-none">';
      add_rows += '<div class="form-group">';
      add_rows += '</br>';
      add_rows +=
        '<button class="btn remove_items" style="display: flex;justify-content: center;"><i class="fa fa-trash pe-1" style="color:red"></i></button>';
      add_rows += '</div>';
      add_rows += '</div>';

      add_rows += '</div>';



      $(wrapper).append(add_rows);

      if ($('#show_items > .row').length > 1) {
        $('#show_items > .row').each(function() {
          $(this).find('.col-remove-item').removeClass('d-none');
        })
      } else {
        $('#show_items > .row').find('.col-remove-item').removeClass('d-none').addClass(
          'd-none');
      }
    }
    // CHECK IF THE USER HAVE THE PROFILE
    check_profile();

    function check_profile() {
      let toast1 = $('.toast1');
      axios
        .get(apiUrl + '/api/invoice/createinvoice', {
          headers: {
            Authorization: token,
          }
        }).then(function(response) {
          let data = response.data;
          console.log("response", data);
          if (!data.success) {
            console.log("TRUE", data.success);
            $('.whole_row').addClass('d-none');
            $('.toast1 .toast-title').html('Invoices');
            $('.toast1 .toast-body').html(data.message);
            toast1.toast('show');
          } else {
            $('.whole_row').removeClass('d-none');
            $('#profile_id').val(data.data.id);
            $('#invoice_no').val(data.invoice_no);
          }
        }).catch(function(error) {
          console.log("error", error);
        });
    }

    $('#ProfileUpdate').submit(function(e) {
      e.preventDefault();
      let user_id = $("#user_id").val();
      let profile_id = $("#profile_id").val();
      let first_name = $("#first_name").val();
      let last_name = $("#last_name").val();
      let email = $("#email").val();
      let position = $("#position").val();
      // let password = $("#password").val();
      let username = $("#username").val();
      let phone_number = $("#phone_number").val();
      let address = $("#address").val();
      let province = $("#province").val();
      let city = $("#city").val();
      let zip_code = $("#zip_code").val();
      let profile_status = $("#profile_status").val();
      let acct_no = $("#acct_no").val();
      let acct_name = $("#acct_name").val();
      let bank_name = $("#bank_name").val();
      let bank_address = $("#bank_address").val();
      let gcash_no = $("#gcash_no").val();
      let date_hired = $("#date_hired").val();
      let deduction_type_id = $('#select2Multiple').val();
      let formData = new FormData();
      formData.append('id', user_id);
      formData.append('profile_id', profile_id);
      formData.append('first_name', first_name);
      formData.append('last_name', last_name);
      formData.append('email', email);
      formData.append('username', username);
      // formData.append('password', "");
      formData.append('position', position ?? "");
      formData.append('phone_number', phone_number);
      formData.append('address', address);
      formData.append('province', province);
      formData.append('city', city);
      formData.append('zip_code', zip_code);
      if (document.getElementById('profile_status').checked == true) {
        formData.append('profile_status', 'Active');
      } else {
        formData.append('profile_status', 'Inactive');
      }
      formData.append('acct_no', acct_no);
      formData.append('acct_name', acct_name);
      formData.append('bank_name', bank_name ?? "");
      formData.append('bank_address', bank_address);
      formData.append('gcash_no', gcash_no);
      formData.append('date_hired', date_hired);
      formData.append('deduction_type_id', JSON.stringify(deduction_type_id));
      if (document.getElementById('file').files.length > 0) {
        formData.append('profile_picture', document.getElementById('file').files[0],
          "picture.png");
      }
      axios.post(apiUrl + '/api/saveprofile', formData, {
          headers: {
            Authorization: token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then(function(response) {
          let data = response.data;
          console.log("SUCCESS", data);
          if (data.success == true) {
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
            $("#photo").attr("src", "/images/default.png");
            show_deduction();
            // select2Multiple
            $('.toast1 .toast-title').html('Profile');
            $('.toast1 .toast-body').html(data.message);
            toast1.toast('show');
          }
        })
        .catch(function(error) {
          // console.log('CATCH ERROR', error);
          // if (error.response.data.message) {
          //     $('#error_full_name').text(error.response.data.errors.full_name[0]);
          // }
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
              $('.toast1 .toast-title').html(fieldname);
              $('.toast1 .toast-body').html(Object.values(errors)[0]
                .join(
                  "\n\r"));
            })
            toast1.toast('show');
          }
        });
    })

    $('.close').on('click', function(e) {
      e.preventDefault();
      toast1.toast('hide');
    })
    $("#error_msg").hide();
    $("#success_msg").hide();


  });
</script>




@endsection