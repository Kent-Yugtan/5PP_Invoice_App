@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">
        <div class="row" style="padding-top:10px">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 bottom10" style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white h-100" style="padding:20px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <span class="fs-3 ">Profile Information</span>
                            </div>
                        </div>

                        <form id="ProfileStore" class="g-3 needs-validation" novalidate>
                            <div class="row pt-3">
                                @csrf

                                <div class="col-md-6" style="display:flex;justify-content:center;align-items:center">
                                    <div class="profile-pic-div_adminProfile-wrapper">
                                        <div class="profile-pic-div_adminProfile">
                                            <img src="/images/default.png" id="photo">
                                            <!-- id="file" ORIGINAL ID -->
                                            <!-- <input name="file" type="file" id="profilePicture"> -->
                                            <label for="file" id="uploadBtn">Choose Photo</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 pt-3 ">
                                    <div class="row">
                                        <div class="col">
                                            <input style="color:#CF8029" class="form-check-input" type="checkbox"
                                                id="profile_status" name="profile_status" checked>
                                            <label class="form-check-label" for="status">
                                                Active
                                            </label>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col ">
                                            <div class="form-group-profile">
                                                <label style="color: #A4A6B3;" for="first_name">Firstname</label>
                                                <input id="first_name" name="first_name" type="text" class="form-control"
                                                    placeholder="Firstname" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group-profile">
                                                <label for="last_name" style="color: #A4A6B3;">Lastname</label>
                                                <input id="last_name" name="last_name" type="text" class="form-control"
                                                    placeholder="Lastname" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row_email_adminProfile">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateEmail" class="form-group-profile">
                                                <label for="email" style="color: #A4A6B3;">Email Address</label>
                                                <input id="email" name="email" type="email" class="form-control"
                                                    placeholder="Email Address" onblur="validateEmail(this)" required>
                                                <div id="error_email" class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateUsername" class="form-group-profile">
                                                <label for="username" style="color: #A4A6B3;">Username</label>
                                                <input id="username" name="username" onblur="validateUsername(this)"
                                                    type="text" class="form-control" placeholder="Username" required>
                                                <div id="error_username" class="invalid-feedback"> This field is required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidatePassword" class="form-group-profile has-toggle">
                                                <label for="password" style="color: #A4A6B3;">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input class="form-control" id="password" name="password"
                                                        type="password" placeholder="Password" required>
                                                    <div id="error_password" class="invalid-feedback"></div>
                                                    <div class="form-control-feedback" id="toggle_password">
                                                        <a href="#" id="eye" class=""
                                                            style="color:#CF8029">
                                                            <i class="fa fa-eye-slash" id="show"></i>
                                                            <i class="fa fa-eye d-none" id="hide"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateConfirmPassword" class="form-group-profile has-toggle">
                                                <label for="confirm-password" style="color: #A4A6B3;">Confirm
                                                    Password</label>
                                                <div class="input-group" id="confirm_show_hide_password">
                                                    <input class="form-control" id="password_confirmation"
                                                        name="password_confirmation" type="password"
                                                        placeholder="Confirm password" required>
                                                    <div id="error_confirm_password" class="invalid-feedback"></div>
                                                    <div class="form-control-feedback" id="confirm_toggle_password">
                                                        <a href="#" id="eye" class=""
                                                            style="color:#CF8029">
                                                            <i class="fa fa-eye-slash" id="confirm_show"></i>
                                                            <i class="fa fa-eye d-none" id="confirm_hide"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="position" style="color: #A4A6B3;">Position</label>
                                                <select class="form-select" id="position" name="position" required>
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
                                                <input name="phone_number" id="phone_number" type="text"
                                                    class="form-control" placeholder="Phone Number" required
                                                    maxlength="11">
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="address" style="color: #A4A6B3;">Address</label>
                                                <input name="address" id="address" type="text" class="form-control"
                                                    placeholder="Address" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="province" style="color: #A4A6B3;">Province</label>
                                                <input name="province" id="province" type="text"
                                                    class="form-control" placeholder="Province" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="city" style="color: #A4A6B3;">City</label>
                                                <input id="city" name="city" type="text" class="form-control"
                                                    placeholder="City" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="city" style="color: #A4A6B3;">ZIP Code</label>
                                                <input id="zip_code" name="zip_code" type="text"
                                                    class="form-control" placeholder="Zip Code" required maxlength="10">
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateAcctno" class="form-group-profile">
                                                <label for="acct_no" style="color: #A4A6B3;">Account Number</label>
                                                <input name="acct_no" id="acct_no" type="text" class="form-control"
                                                    placeholder="Account Number" onblur="validateAcctno(this)" required
                                                    maxlength="15">
                                                <div id="error_acct_no" class="invalid-feedback">This field is required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateAcctname" class="form-group-profile">
                                                <label for="acct_name" style="color: #A4A6B3;">Account Name</label>
                                                <input name="acct_name" id="acct_name" type="text"
                                                    class="form-control" onblur="validateAcctname(this)"
                                                    placeholder="Account Name" required>
                                                <div id="error_acct_name" class="invalid-feedback">This field is required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="bank_name" style="color: #A4A6B3;">Bank Name</label>
                                                <select class="form-select" id="bank_name" name="bank_name" required>
                                                    <option selected disabled value="">Please Select Bank Name
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
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="city" style="color: #A4A6B3;">Bank Address</label>
                                                <input id="bank_address" name="bank_address" type="text"
                                                    class="form-control" placeholder="Bank Address" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div id="mobileValidateGCASHno" class="form-group-profile">
                                                <label for="city" style="color: #A4A6B3;">Gcash Number</label>
                                                <input name="gcash_no" type="text" class="form-control"
                                                    id="gcash_no" onblur="validateGcashno(this)"
                                                    placeholder="Gcash Number" required maxlength="11">
                                                <div id="error_gcash_no" class="invalid-feedback">This field is required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group-profile">
                                                <label for="date_hired" style="color: #A4A6B3;">Date Hired</label>
                                                <input type="text" id="date_hired" name="date_hired"
                                                    class="datepicker_input form-control" placeholder="Date Hired"
                                                    required autocomplete="off">
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 bottom20">
                                            <label for="select2Multiple" style="color: #A4A6B3;">Deduction Types</label>
                                            <select style="width:100%" class="form-select" name="deductions"
                                                data-placeholder="Choose deduction" multiple="multiple"
                                                id="select2Multiple">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-12 bottom20">
                                            <button type="submit" id="button-submit"
                                                style="width:100%;color:white; background-color: #CF8029;"
                                                class="btn ">Add
                                                Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="error-container"></div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

    <div style="position:fixed;top:60px;right:20px;z-index:99999;justify-content:flex-end;display:flex;">
        <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div id='notifyIcon'></div>
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

    <!-- Modal FOR CROPING IMAGE-->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
        data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="hide-content">
                <div class="modal-body">
                    <div class="card-border shadow p-2 bg-white h-100">
                        <div class="row px-4 py-4 " id="header">
                            <div class="col-md-12 w-100">
                                <div class="row ">
                                    <div class="col" style="margin-bottom:15px">
                                        <span class="fs-3 fw-bold"> Set Profile Image</span>
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

    <script src="{{ asset('/assets/js/adminProfile.js') }}"></script>
    <script type="text/javascript">
        function validateEmail(e) {
            console.log("VALIDATE", e.value);
            let data = {
                email: e.value
            }
            axios.post(apiUrl + "/api/validateEmail", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#email").removeClass('is-invalid');
                    $("#error_email").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateEmail').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                if (error.response.data.errors.email) {
                    if (error.response.data.errors.email.length > 0) {
                        $email_error = error.response.data.errors.email[0];
                        if ($("#email").val() == "") {
                            $("#error_email").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidateEmail').removeClass('form-group-adjust');
                        } else {
                            if ($email_error == "The email must be a valid email address.") {
                                $("#error_email").addClass('invalid-feedback').html(
                                    "The email address must be valid.").show();
                                $('#mobileValidateEmail').removeClass('form-group-adjust');
                            }
                            if ($email_error == "The email has already been taken.") {
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

        function validateUsername(e) {
            console.log("VALIDATE", e.value);
            let data = {
                username: e.value
            }
            axios.post(apiUrl + "/api/validateUsername", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
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

        function vallidateConfirmPassword(a, b) {
            console.log("A", a.val());
            console.log("B", b.val());
            let data = {
                password: $(a).val(),
                password_confirmation: $(b).val(),
            }
            axios.post(apiUrl + "/api/vallidateConfirmPassword", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#password").removeClass('is-invalid');
                    $("#password_confirmation").removeClass('is-invalid');

                    $("#error_password").removeClass('invalid-feedback').html("").show();
                    $("#error_confirm_password").removeClass('invalid-feedback').html("").show();

                    $('#mobileValidatePassword').removeClass('form-group-adjust');
                    $('#mobileValidateConfirmPassword').removeClass('form-group-adjust');

                    $("#toggle_password").css("margin-right", "0px");
                    $("#confirm_toggle_password").css("margin-right", "0px");

                }
            }).catch(function(error) {
                console.log("Error", error);

                if (error.response.data.errors.password && error.response.data.errors.password_confirmation) {
                    $error_password = error.response.data.errors.password[0];
                    $error_confirm_password = error.response.data.errors.password_confirmation[0];
                    if (error.response.data.errors.password.length > 0 && error.response.data.errors
                        .password_confirmation.length > 0) {
                        if ($error_password == "The password field is required." && $error_confirm_password ==
                            "The password confirmation field is required.") {

                            $("#error_password").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $("#error_confirm_password").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('#mobileValidatePassword').removeClass('form-group-adjust');

                            $('#mobileValidateConfirmPassword').removeClass('form-group-adjust');

                            $("#password").addClass('is-invalid');
                            $("#password_confirmation").addClass('is-invalid');
                            $("#toggle_password").css("margin-right", "20px");
                            $("#confirm_toggle_password").css("margin-right", "20px");
                            console.log(
                                "The password field is required. && The password confirmation field is required."
                            );
                        } else if ($error_password == "The password field is required." &&
                            $error_confirm_password ==
                            "The password does not match.") {
                            $("#error_password").addClass('invalid-feedback').html(
                                "").show();
                            $("#error_confirm_password").addClass('invalid-feedback').html(
                                "").hide();
                            $("#password").addClass('is-invalid');
                            $("#password_confirmation").removeClass('is-invalid');
                            $('#mobileValidateConfirmPassword').removeClass('form-group-adjust');
                            $("#toggle_password").css("margin-right", "20px");
                            $("#confirm_toggle_password").css("margin-right", "20px");
                            console.log("The password field is required. && The password does not match.");
                        } else if ($error_password == "The password confirmation does not match." &&
                            $error_confirm_password ==
                            "The password confirmation field is required.") {

                            $("#error_password").addClass('invalid-feedback').html(
                                "The password confirmation does not match.").show();
                            $("#error_confirm_password").addClass('invalid-feedback').html(
                                "This field is required.").show();

                            $("#password").addClass('is-invalid');
                            $("#password_confirmation").addClass('is-invalid');
                            $('#mobileValidatePassword').addClass('form-group-adjust');

                            $("#toggle_password").css("margin-right", "20px");
                            $("#confirm_toggle_password").css("margin-right", "20px");
                            console.log(
                                "The password confirmation does not match. && The password confirmation field is required."
                            );
                        }
                    }
                } else {
                    $error_password = error.response.data.errors.password[0];
                    if (error.response.data.errors.password.length > 0) {
                        if ($error_password == "The password field is required.") {
                            $("#error_password").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $("#error_confirm_password").addClass('invalid-feedback').html(
                                "").show();

                            $("#password").addClass('is-invalid');
                            $("#password_confirmation").removeClass('is-invalid');
                            $("#toggle_password").css("margin-right", "20px");
                            $("#confirm_toggle_password").css("margin-right", "0px");
                            console.log(
                                "This field is required."
                            );
                        } else if ($error_password == "The password confirmation does not match.") {
                            $("#error_password").addClass('invalid-feedback').html(
                                "").show();
                            $("#error_confirm_password").addClass('invalid-feedback').html(
                                "The password confirmation does not match.").show();

                            $('#mobileValidateConfirmPassword').addClass('form-group-adjust');

                            $("#password").removeClass('is-invalid');
                            $("#password_confirmation").addClass('is-invalid');
                            $("#toggle_password").css("margin-right", "0px");
                            $("#confirm_toggle_password").css("margin-right", "20px");
                        }
                    }
                }
            })
        }

        function validateAcctno(e) {
            console.log("VALIDATE", e.value);
            let data = {
                acct_no: e.value
            }
            axios.post(apiUrl + "/api/validateAcctno", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
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

        function validateAcctname(e) {
            console.log("VALIDATE", e.value);
            let data = {
                acct_name: e.value
            }
            axios.post(apiUrl + "/api/validateAcctname", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
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

        function validateGcashno(e) {
            console.log("VALIDATE", e.value);
            let data = {
                gcash_no: e.value
            }
            axios.post(apiUrl + "/api/validateGcashno", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
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
                                    "The given data was invalid").show();
                                $('#mobileValidateGCASHno').removeClass('form-group-adjust');
                            }
                        }
                        $("#gcash_no").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }

        $(document).ready(function() {
            $('#password, #password_confirmation').on('blur', function() {
                // Call vallidateConfirmPassword with the input fields as arguments
                vallidateConfirmPassword($('#password'), $('#password_confirmation'));

            });

            $("div.spanner").addClass("show");
            setTimeout(function() {
                $("div.spanner").removeClass("show");
            }, 1500)


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


            let file_original_name;
            let file_name;
            let file_path;
            let file_size;

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
                                file_original_name = data.image;
                                file_name = data.image;
                                file_path = data.path;
                                file_size = data.size;
                                document.getElementById("upload_image").value = "";
                                $('#imageRow').addClass('d-none')
                                // toast1.toast('show');
                            }, 1500)
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
                        $('#imageCrop').html(originalText);
                        $('#notifyIcon').html(
                            '<i class="fa-solid fa-x" style="color:#dc3545"></i>');
                        $('.toast1 .toast-title').html('Success');
                        $('.toast1 .toast-body').html("Something went wrong.");
                        toast1.toast('show');
                    });
                })
            });
            // END CODE FOR CROPING IMAGE

            $("#show_hide_password a").on('click', function(e) {
                e.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#hide').addClass("d-none");
                    $('#show').removeClass("d-none");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show').addClass("d-none");
                    $('#hide').removeClass("d-none");
                }
            });

            $("#confirm_show_hide_password a").on('click', function(e) {
                e.preventDefault();
                if ($('#confirm_show_hide_password input').attr("type") == "text") {
                    $('#confirm_show_hide_password input').attr('type', 'password');
                    $('#confirm_hide').addClass("d-none");
                    $('#confirm_show').removeClass("d-none");
                } else if ($('#confirm_show_hide_password input').attr("type") == "password") {
                    $('#confirm_show_hide_password input').attr('type', 'text');
                    $('#confirm_show').addClass("d-none");
                    $('#confirm_hide').removeClass("d-none");
                }
            });


            var currentPage = window.location.href;
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

            const PHP = value => currency(value, {
                symbol: '',
                decimal: '.',
                separator: ','
            });


            let toast1 = $('.toast1');
            toast1.toast({
                delay: 3000,
                animation: true
            });

            $('.close').on('click', function(e) {
                e.preventDefault();
                toast1.toast('hide');
            })

            $("#error_msg").hide();
            $("#success_msg").hide();

            $('.close').on('click', function(e) {
                e.preventDefault();
                toast1.toast('hide');
            })



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



            $('#ProfileStore').submit(function(e) {
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


                // $('html,body').animate({
                //     scrollTop: $('#sb-nav-fixed').offset().top
                // }, 'slow');
                if ($('#password').val() == "" && $('#password_confirmation').val() == "") {
                    $("#toggle_password").css("margin-right", "20px");
                    $("#confirm_toggle_password").css("margin-right", "20px");
                }

                let first_name = $("#first_name").val();
                let last_name = $("#last_name").val();
                let email = $("#email").val();
                let username = $("#username").val();
                let password = $("#password").val();
                let password_confirmation = $("#password_confirmation").val();
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
                console.log($('#profile_status').val());
                let profile_status = $("#profile_status").val();
                let acct_no = $("#acct_no").val();
                let acct_name = $("#acct_name").val();
                let bank_name = $("#bank_name").val();
                let bank_address = $("#bank_address").val();
                let gcash_no = $("#gcash_no").val();
                let date_hired = $("#date_hired").val();
                let deduction_type_id = $('#select2Multiple').val();

                // let formData = new FormData();
                // formData.append('first_name', first_name);
                // formData.append('last_name', last_name);
                // formData.append('email', email);
                // formData.append('username', username);
                // formData.append('password', password);
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
                // formData.append('deduction_type_id', JSON.stringify(deduction_type_id));
                // if (document.getElementById('profilePicture').files.length > 0) {
                //   formData.append('profile_picture', document.getElementById('profilePicture').files[0],
                //     document.getElementById('profilePicture').files[0].name);
                // }
                // console.log(formData.get('profile_picture'));
                // CODE FOR FORMDATA SEE TO CONSOLE.LOG
                // for (const [key, value] of formData.entries()) {
                //   console.log(`${key}: ${value}`);
                // }


                let data = {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    username: username,
                    password: password,
                    password_confirmation: password_confirmation,
                    position: position ? position : "",
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
                    file_original_name: file_original_name ? file_original_name : "",
                    file_name: file_name ? file_name : "",
                    file_path: file_path ? file_path : "",
                }
                console.log("data", data);

                axios.post(apiUrl + '/api/saveprofile', data, {
                        headers: {
                            Authorization: token,
                            "Content-Type": "multipart/form-data",
                        },
                    })
                    .then(function(response) {
                        let data = response.data;
                        // console.log("SUCCESS", response);
                        if (data.success === true) {
                            $("div.spanner").addClass("show");
                            $('html,body').animate({
                                scrollTop: $('#sb-nav-fixed').offset().top
                            }, 'slow');
                            $('input').removeClass('is-invalid');
                            $('.invalid-feedback').remove();
                            $('input, select').removeClass('is-invalid');
                            $("#first_name").val("");
                            $("#last_name").val("");
                            $("#email").val("");
                            $("#username").val("");
                            $("#password").val("");
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
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");
                                toast1.toast('show');
                            }, 1500)
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(data.message);
                            $('#ProfileStore').trigger('reset');
                            $('#ProfileStore').removeClass('was-validated');
                            $('#button-submit').prop("disabled", false);
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
                                        $("#email").addClass('is-invalid');
                                        $("#error_email").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }
                                    if ($email_error == "The email must be a valid email address.") {
                                        $("#email").addClass('is-invalid');
                                        $("#error_email").addClass('invalid-feedback').html(
                                            "The email address must be valid.").show();
                                    }
                                    if ($email_error == "The email has already been taken.") {
                                        $("#email").addClass('is-invalid');
                                        $("#error_email").addClass('invalid-feedback').html(
                                            "The email has already been taken.").show();
                                    }

                                }
                            } else {
                                $check = $('#email').val();
                                if ($check.length > 0) {
                                    $("#email").removeClass('is-invalid');
                                    $("#error_email").removeClass('invalid-feedback').html("").show();
                                } else {
                                    // $("#email").addClass('is-invalid');
                                    $("#error_deduction_name").addClass('invalid-feedback').html(
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
                                    if ($username_error == "The username has already been taken.") {
                                        $("#error_username").addClass('invalid-feedback').html(
                                            "The username has already been taken.").show();
                                    }
                                }
                            } else {
                                $("#error_username").removeClass('invalid-feedback').html("").show();
                            }

                            // ERROR PASSWORD
                            if (error.response.data.errors.password) {
                                if (error.response.data.errors.password.length > 0) {
                                    $error_password = error.response.data.errors.password[0];
                                    if ($error_password == "The password field is required.") {
                                        $("#error_password").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }
                                }
                            } else {
                                $("#error_password").removeClass('invalid-feedback').html("").show();
                            }

                            // ERROR CONFIRM PASSWORD
                            if (error.response.data.errors.password_confirmation) {
                                if (error.response.data.errors.password_confirmation.length > 0) {
                                    $error_confirm_password = error.response.data.errors
                                        .password_confirmation[0];
                                    if ($error_confirm_password ==
                                        "The password confirmation field is required.") {
                                        $("#error_confirm_password").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }
                                }
                            } else {
                                $("#error_confirm_password").removeClass('invalid-feedback').html("")
                                    .show();
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
                                $("#error_acct_no").removeClass('invalid-feedback').html("").show();
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
                                $("#error_acct_name").removeClass('invalid-feedback').html("").show();
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
                                $("#error_gcash_no").removeClass('invalid-feedback').html("").show();
                            }
                        }

                    });
            })


            function show_deduction() {
                $('#select2Multiple').empty();
                axios
                    .get(apiUrl + '/api/show_deduction_type', {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        response = response.data
                        // console.log('RESPONSE SELECT', response);
                        if (response.success) {
                            // console.log('SUCCESS');
                            if (response.data.length > 0) {
                                response.data.map((item) => {
                                    let option = '<option>';
                                    option += "<option value = " + item.id + " > " + item
                                        .deduction_name +
                                        " - " + PHP(item.deduction_amount).format() +
                                        "</option>"
                                    $("#select2Multiple").append(option);
                                    return ''
                                })

                            }

                        }
                    }).catch(function(error) {
                        console.log('ERROR', error);
                    });
            }
            show_deduction();
            $('#select2Multiple').select2({
                placeholder: $(this).data('placeholder'),
                // closeOnSelect: true,
                closeOnSelect: false,
            });
            $('#select2Multiple').on('select2:opening select2:closing', function(event) {
                var $searchfield = $(this).parent().find('.select2-search__field');
                $searchfield.prop('disabled', true);
            });

            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }
        });
    </script>
@endsection
