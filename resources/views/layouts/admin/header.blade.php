<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <div id="invoiceApp" class="invoiceApp d-none">
        <img id="image" class="img-team" src="{{ URL('images/Invoices-logo.png') }}"
            style="width: 60px; padding:10px" />
        <a class="navbar-brand" href="{{ url('admin/dashboard') }}">Invoicing App</a>
    </div>

    <button class="btn btn-link btn-sm order-lg-0 me-lg-0" id="sidebarToggle" href="#!" style="padding-left:20px">
        <i style="color:#CF8029" class="fas fa-bars"></i>
    </button>
    <div class="d-flex flex-sm-wrap">
        <span id='header_title' class="fw-bold" style="font-size:18px"></span>
    </div>

    <div class="collapse navbar-collapse" style="justify-content: flex-end;margin-right:8px">
        <div class="d-flex align-items-center">

            {{-- <span class="icons d-none" style="margin-right:30px"><i style="color:#A4A6B3;"
                    class="fa-solid fa-magnifying-glass "></i></span>
            <span class="icons" style="margin-right:30px"><i style="color:#A4A6B3;" class="fa-solid fa-bell "></i>
                <div class="icons mobileLayout d-none">
                    <span class="custom-badge position-absolute"
                        style="font-size: 6px;top:16px;right:216px;background-color:#f8f9fa"><i
                            class="fa-solid fa-circle" style="color:#CF8029"></i></span>
                </div>
                <div class="icons webLayout d-none">
                    <span class="custom-badge position-absolute"
                        style="font-size: 6px;top:15px;right:109px;background-color:#f8f9fa"><i
                            class="fa-solid fa-circle" style="color:#CF8029"></i></span>
                </div>
            </span> --}}
            <div class="icons mobileLayout d-none">
                <span class="icons d-none" style="margin-right:30px"><i style="color:#A4A6B3;"
                        class="fa-solid fa-magnifying-glass "></i></span>
                <span class="icons" style="margin-right:30px"><i style="color:#A4A6B3;" class="fa-solid fa-bell "></i>

                    <span class="custom-badge position-fixed"
                        style="margin-right:30px;font-size: 6px;top:16px;margin-left:7px;background-color:#f8f9fa"><i
                            class="fa-solid fa-circle" style="color:#CF8029"></i></span>
            </div>

            <div class="icons webLayout d-none">
                <span class="icons d-none" style="margin-right:30px"><i style="color:#A4A6B3;"
                        class="fa-solid fa-magnifying-glass "></i></span>
                <span class="icons" style="margin-right:30px"><i style="color:#A4A6B3;" class="fa-solid fa-bell "></i>
                    <span class="custom-badge position-fixed"
                        style="margin-right:30px;font-size: 6px;top:16px;margin-left:7px;background-color:#f8f9fa"><i
                            class="fa-solid fa-circle" style="color:#CF8029"></i></span>
            </div>

            <span class="icons d-none" style="padding-right:20px;font-size:12px;color:#A4A6B3;">
                {{-- <i style="color:#A4A6B3;" class="fa-solid fa-grip-lines-vertical"></i> --}}
                |
            </span>

            <div class="icons mobileLayout d-none">
                <span style="margin-right:15px" class="fullname"></span>
            </div>

            <ul class="navbar-nav ms-auto ms-sm-0 pe-2">
                <li class="nav-item dropdown">
                    <button class="rounded-pill border-0" data-bs-toggle="dropdown" id="navbarDropdown" href="#">
                        <img class="rounded-pill" style="border:1px solid #CF8029" role="button" aria-expanded="false"
                            src="/images/default.png"></button>

                    <ul class="dropdown-menu dropdown-menu-end" id="adminMenu"
                        style="padding:5px;width: 230px;margin-right:14px;border-radius:1rem"
                        aria-labelledby="navbarDropdown">

                        <div class="container" style="padding:10px">
                            <div class="row">
                                <div class="col-3 bottom10">
                                    <button class="rounded-pill border-0" data-bs-toggle="modal"
                                        data-bs-target="#changeAdminDetails" style="cursor: pointer;" href="#">
                                        {{-- <a style="cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#changeAdminDetails"> --}}
                                        <img class="rounded-pill" style="border:1px solid #CF8029;" role="button"
                                            aria-expanded="false" src="/images/default.png">
                                    </button>
                                    {{-- </a> --}}
                                </div>
                                <div class="col-9 bottom10" style="padding-left:15px">
                                    <p style="margin-bottom:0px" class="fullname"></p>
                                    <p style="margin-bottom:0px;color:#A4A6B3"> {{ session('data')->role }} </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col bottom10">
                                    <li class="nav-item" style="margin:0 5px">
                                        <hr class="dropdown-divider">
                                    </li>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2 bottom10">
                                    <i class="fa-solid fa-gear" style="padding-left:5px"></i>
                                </div>
                                <div class="col-10 bottom10">
                                    <li id="accountSetting">
                                        <p style="margin-bottom:0px;cursor: pointer;">
                                            Account Settings
                                            <i id="rotateArrow" style="transform: rotate(-90deg);margin-left:20px"
                                                class="fas fa-angle-down"></i>
                                        </p>
                                    </li>
                                    <ul style="padding-left:0" id="change_Password">
                                        <p style="margin-bottom:0px;color:#A4A6B3"><a style="cursor: pointer;"
                                                data-bs-toggle="modal" data-bs-target="#changePassword">Change
                                                Password</a>
                                        </p>
                                    </ul>
                                </div>
                            </div>


                            {{-- ACCOUNT SETTING WITH DROPDOWN --}}
                            {{-- <li id="accountSetting">
                            <label for="btn-2" class="first dropdown-item">
                                <span>Account Setting</span>
                                <span><i id="rotateArrow" style="transform: rotate(-90deg)"
                                        class="fas fa-angle-down"></i></span>
                            </label>
                            <ul style="padding-left:1rem" id="change_Password">
                                <li class="dropdown-item"><a style="cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#changePassword">Change Password</a></li>
                            </ul>
                            </li> --}}

                            <div class="row">
                                <div class="col bottom10">
                                    <li class="nav-item" style="margin:0 5px">
                                        <hr class="dropdown-divider">
                                    </li>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2 bottom10">
                                    <i class="fa-solid fa-arrow-right-from-bracket" style="padding-left:5px"></i>
                                </div>
                                <div class="col-10 bottom10">
                                    <a style="cursor: pointer;" id="logout">
                                        Logout</a>
                                </div>
                            </div>
                        </div>
                    </ul>

                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- START MODAL ADD -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="hide-content">
            <div class="modal-body ">
                <div class="row">

                    <div class="card-border shadow bg-white h-100" style="padding:20px">
                        <div class="card-body">
                            <div class="row " id="header">
                                <div class="col-md-12 w-100">
                                    <div class="row">
                                        <div class="col bottom20">
                                            <span class="fs-3 fw-bold">Change Password</span>
                                        </div>
                                    </div>
                                    <form id="adminChangePassword" class="g-3 needs-validation" novalidate>
                                        @csrf

                                        <input type="text" id="userId" value="{{ session('data')->id }}"
                                            hidden>
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div id="mobileValidatePassword"
                                                    class="form-group-profile has-toggle">
                                                    <label for="currentPassword" style="color: #A4A6B3;">Current
                                                        Password</label>
                                                    <div class="input-group" id="show_hide_currentPassword">
                                                        <input class="form-control" id="currentPassword"
                                                            name="currentPassword" type="password"
                                                            placeholder="Current Password" required>
                                                        {{-- onblur="changePassword(this)"  --}}
                                                        <div id="error_currentPassword" class="invalid-feedback">This
                                                            field is required.</div>
                                                        <div class="form-control-feedback"
                                                            id="toggle_currentPassword">
                                                            <a href="#" id="eye" class=""
                                                                style="color:#CF8029">
                                                                <i class="fa fa-eye-slash" id="currentShow"></i>
                                                                <i class="fa fa-eye d-none" id="currentHide"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 ">
                                                <div id="mobileNewValidatePassword"
                                                    class="form-group-profile has-toggle">
                                                    <label for="newPassword" style="color: #A4A6B3;">New
                                                        Password</label>
                                                    <div class="input-group" id="show_hide_newPassword">
                                                        <input class="form-control" id="newPassword"
                                                            name="newPassword" type="password"
                                                            placeholder="New Password" required>
                                                        <div id="error_newPassword" class="invalid-feedback">This
                                                            field is required.</div>
                                                        <div class="form-control-feedback" id="toggle_newPassword">
                                                            <a href="#" id="newEye" class=""
                                                                style="color:#CF8029">
                                                                <i class="fa fa-eye-slash" id="newShow"></i>
                                                                <i class="fa fa-eye d-none" id="newHide"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 bottom10">
                                                <div id="mobileConfirmValidatePassword"
                                                    class="form-group-profile has-toggle">
                                                    <label for="confirmPassword" style="color: #A4A6B3;">Confirm
                                                        Password</label>
                                                    <div class="input-group" id="show_hide_confirmPassword">
                                                        <input class="form-control" id="confirmPassword"
                                                            name="confirmPassword" type="password"
                                                            placeholder="Confirm Password" required>
                                                        <div id="error_confirmPassword" class="invalid-feedback">This
                                                            field is required.
                                                        </div>
                                                        <div class="form-control-feedback"
                                                            id="toggle_confirmPassword">
                                                            <a href="#" id="confirmEye" class=""
                                                                style="color:#CF8029">
                                                                <i class="fa fa-eye-slash" id="confirmShow"></i>
                                                                <i class="fa fa-eye d-none" id="confirmHide"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 bottom20">
                                                <button type="button" data-bs-dismiss="modal" class="btn  w-100"
                                                    style="color:#CF8029; background-color:#f3f3f3; ">Close</button>
                                            </div>
                                            <div class="col-sm-6 bottom20">
                                                <button type="submit" id="changePassword_button" class="btn  w-100"
                                                    style="color:White; background-color:#CF8029; ">Change
                                                    Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->

<!-- START MODAL ADD -->
<div class="modal fade" id="changeAdminDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="hide-content">
            <div class="modal-body ">
                <div class="row">

                    <div class="card-border shadow bg-white h-100" style="padding:20px">
                        <div class="card-body">
                            <div class="row " id="header">
                                <div class="col-md-12 w-100">
                                    <div class="row">
                                        <div class="col bottom20">
                                            <span class="fs-3 fw-bold">Change Admin Details</span>
                                        </div>
                                    </div>
                                    <input type="text" id="adminUserId" value="{{ session('data')->id }}" hidden>
                                    <form id="updateAdminDetails" class="g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6"
                                                style="display:flex;justify-content:center;align-items:center">
                                                <div class="profile-pic-div_superadminProfile-wrapper ">
                                                    <div class="profile-pic-div_superadminProfile">
                                                        <img src="/images/default.png" id="admin_photo">
                                                        <!-- id="file" ORIGINAL ID -->
                                                        <!-- <input name="file" type="file" id="profilePicture"> -->
                                                        <label for="file" id="admin_uploadBtn">Choose
                                                            Photo</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col ">
                                                        <div id="mobileValidateAdminFirst_name"
                                                            class="form-group-profile">
                                                            <label style="color: #A4A6B3;"
                                                                for="admin_first_name">Firstname</label>
                                                            <input id="admin_first_name" name="admin_first_name"
                                                                type="text" class="form-control"
                                                                placeholder="Firstname"
                                                                onblur="editValidateAdminFirst_name(this)" required>
                                                            <div id="error_admin_first_name" class="invalid-feedback">
                                                                This field is required.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col ">
                                                        <div id="mobileValidateAdminLast_name"
                                                            class="form-group-profile">
                                                            <label style="color: #A4A6B3;"
                                                                for="admin_last_name">Lastname</label>
                                                            <input id="admin_last_name" name="admin_last_name"
                                                                type="text" class="form-control"
                                                                placeholder="Lastname"
                                                                onblur="editValidateAdminLast_name(this)" required>
                                                            <div id="error_admin_Last_name" class="invalid-feedback">
                                                                This field is required.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div id="mobileValidateAdminEmail" class="form-group-profile">
                                                            <label for="admin_email_address"
                                                                style="color: #A4A6B3;">Email
                                                                Address</label>
                                                            <input id="admin_email_address" name="admin_email_address"
                                                                type="text" class="form-control"
                                                                placeholder="Email Address"
                                                                onblur="editValidateEmail(this)" required>
                                                            <div id="error_admin_email" class="invalid-feedback">This
                                                                field
                                                                is required.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col bottom10">
                                                        <div id="mobileValidateAdminUsername"
                                                            class="form-group-profile">
                                                            <label for="admin_username"
                                                                style="color: #A4A6B3;">Username</label>
                                                            <input id="admin_username" name="admin_username"
                                                                type="text" class="form-control"
                                                                onblur="editValidateUsername(this)"
                                                                placeholder="Username" required>
                                                            <div id="error_admin_username" class="invalid-feedback">
                                                                This field is required.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 bottom10">
                                                <button type="button" data-bs-dismiss="modal" class="btn  w-100"
                                                    style="color:#CF8029; background-color:#f3f3f3; ">Close</button>
                                            </div>
                                            <div class="col-sm-6 bottom20">
                                                <button type="submit" id="button_admin_submit" class="btn  w-100"
                                                    style="color:White; background-color:#CF8029; ">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->

<!-- Modal FOR CROPING IMAGE-->
<div class="modal fade" id="previewAdminModal" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="hide-content">
            <div class="modal-body">
                <div class="card-border shadow p-2 bg-white h-100">
                    <div class="row px-4 py-4 " id="header">
                        <div class="col-md-12 w-100">
                            <div class="row ">
                                <div class="col" style="margin-bottom:15px">
                                    <span class="fs-3 fw-bold"> Set Admin Image</span>
                                </div>
                            </div>


                            <div class="row d-none" id="adminImageRow">
                                <div class="col" style="margin-top:15px">
                                    <div id="admin_image_demo"></div>
                                    <div id="admin_uploaded_image" style="width: 350px;"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col" style="display: flex;justify-content: center;">
                                    <label class="label">
                                        <input type="file" name="admin_upload_image" id="admin_upload_image" />
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
                                    <button type="button" id="admin_imageCrop" class="btn"
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

<script src="{{ asset('/assets/js/superadminProfile.js') }}"></script>
<script>
    function changePassword(a, b, c) {
        let userId = $('#userId').val();
        let currentPassword = $('#currentPassword').val();

        let data = {
            currentPassword: $(a).val(),
            newPassword: $(b).val(),
            confirmPassword: $(c).val(),
        }
        console.log('DATA', data);
        axios.post(apiUrl + "/api/admin/validateCurrentPassword", data, {
            headers: {
                Authorization: token
            },
        }).then(function(response) {
            let data = response.data;
            if (data.success) {
                console.log("ValidateCurrentPassword", data);
                // CURRENT PASSWORD
                $("#currentPassword").removeClass('is-invalid');
                $("#error_currentPassword").removeClass('invalid-feedback').html("").show();
                $("#toggle_currentPassword").css("margin-right", "0px");
                $('#mobileValidatePassword').removeClass('form-group-adjust');

                $("#newPassword").removeClass('is-invalid');
                $("#error_newPassword").removeClass('invalid-feedback').html("").show();
                $("#toggle_newPassword").css("margin-right", "0px");
                $('#mobileNewValidatePassword').removeClass('form-group-adjust');

                $("#confirmPassword").removeClass('is-invalid');
                $("#error_confirmPassword").removeClass('invalid-feedback').html("").show();
                $("#toggle_confirmPassword").css("margin-right", "0px");
                $('#mobileConfirmValidatePassword').removeClass('form-group-adjust');

            }
        }).catch(function(error) {
            let errors = error.response.data.errors;
            console.log("ERRORS", errors);
            if (errors) {
                // ERROR CURRENTPASSWORD
                if (error.response.data.errors.currentPassword) {
                    if (error.response.data.errors.currentPassword.length > 0) {
                        let error_currentPassword = error.response.data.errors.currentPassword[0];
                        if (error_currentPassword == "The current password field is required.") {
                            $("#error_currentPassword").addClass('invalid-feedback').html(
                                "This field is required.").show();
                        }
                        if (error_currentPassword == "Password doesn't match with the old password.") {
                            $("#error_currentPassword").addClass('invalid-feedback').html(
                                "Password doesn't match with the old password.").show();
                        }
                        $("#currentPassword").addClass('is-invalid');
                        $("#toggle_currentPassword").css("margin-right", "20px");
                        $('#mobileValidatePassword').removeClass('form-group-adjust');
                    }
                } else {
                    $("#currentPassword").removeClass('is-invalid');
                    $("#error_currentPassword").removeClass('invalid-feedback').html("").show();
                    $("#toggle_currentPassword").css("margin-right", "0px");
                    $('#mobileValidatePassword').removeClass('form-group-adjust');
                }

                // ERROR NEW PASSWORD
                if (error.response.data.errors.newPassword) {
                    if (error.response.data.errors.newPassword.length > 0) {
                        let error_newPassword = error.response.data.errors.newPassword[0];
                        if (error_newPassword == "The new password field is required.") {
                            $("#error_newPassword").addClass('invalid-feedback').html(
                                "This field is required.").show();
                        }

                        if (error_newPassword == "The new password and current password must be different.") {
                            $("#error_newPassword").addClass('invalid-feedback').html(
                                "The new password and current password must be different.").show();
                        }

                        $("#newPassword").addClass('is-invalid');
                        $("#toggle_newPassword").css("margin-right", "20px");
                        $('#mobileNewValidatePassword').removeClass('form-group-adjust');
                    }
                } else {
                    $("#newPassword").removeClass('is-invalid');
                    $("#error_newPassword").removeClass('invalid-feedback').html("").show();
                    $("#toggle_newPassword").css("margin-right", "0px");
                    $('#mobileNewValidatePassword').removeClass('form-group-adjust');
                }

                // ERROR CONFIRM PASSWORD
                if (error.response.data.errors.confirmPassword) {
                    if (error.response.data.errors.confirmPassword.length > 0) {
                        let error_confirmPassword = error.response.data.errors.confirmPassword[0];
                        if (error_confirmPassword == "The new password field is required.") {
                            $("#error_confirmPassword").addClass('invalid-feedback').html(
                                "This field is required.").show();
                        }

                        if (error_confirmPassword == "The confirm password and new password must match.") {
                            $("#error_confirmPassword").addClass('invalid-feedback').html(
                                "The confirm password must match to the new password.").show();
                        }

                        $("#confirmPassword").addClass('is-invalid');
                        $("#toggle_confirmPassword").css("margin-right", "20px");
                        $('#mobileConfirmValidatePassword').removeClass('form-group-adjust');
                    }
                } else {
                    $("#confirmPassword").removeClass('is-invalid');
                    $("#error_confirmPassword").removeClass('invalid-feedback').html("").show();
                    $("#toggle_confirmPassword").css("margin-right", "0px");
                    $('#mobileConfirmValidatePassword').removeClass('form-group-adjust');
                }
            }
        })
    }

    function editValidateEmail(e) {
        let user_id = $("#adminUserId").val();
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
                $("#admin_email_address").removeClass('is-invalid');
                $("#error_admin_email").removeClass('invalid-feedback').html("").show();
                $('#mobileValidateAdminEmail').removeClass('form-group-adjust-admin');


            } else {
                $("#admin_email_address").removeClass('is-invalid');
                $("#error_admin_email").removeClass('invalid-feedback').html("").show();
                $('#mobileValidateAdminEmail').removeClass('form-group-adjust-admin');
            }
        }).catch(function(error) {
            console.log("ERRORE ADMIN EMAIL", error);
            if (error.response.data.errors.email) {
                if (error.response.data.errors.email.length > 0) {
                    $error = error.response.data.errors.email[0];
                    if ($("#admin_email_address").val() == "") {
                        $("#error_admin_email").addClass('invalid-feedback').html(
                            "This field is required.").show();
                        $('#mobileValidateAdminEmail').removeClass('form-group-adjust-admin');
                    } else {
                        if ($error ==
                            "The email must be a valid email address."
                        ) {
                            $("#error_admin_email").addClass('invalid-feedback').html(
                                "The email address must be valid.").show();
                            $('#mobileValidateAdminEmail').removeClass('form-group-adjust-admin');
                        }
                        if ($error == "The email has already been taken.") {
                            $("#error_admin_email").addClass('invalid-feedback').html(
                                    "The email address has already been taken.")
                                .show();
                            $('#mobileValidateAdminEmail').addClass('form-group-adjust-admin');
                        }
                    }
                    $("#admin_email_address").addClass('is-invalid');
                    console.log("Error");
                }
            }
        })
    }

    function editValidateUsername(e) {
        let user_id = $("#adminUserId").val();
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
                $("#admin_username").removeClass('is-invalid');
                $("#error_admin_username").removeClass('invalid-feedback').html("").show();
                $('#mobileValidateAdminUsername').removeClass('form-group-adjust-admin');

            } else {
                $("#admin_username").removeClass('is-invalid');
                $("#error_admin_username").removeClass('invalid-feedback').html("").show();
                $('#mobileValidateAdminUsername').removeClass('form-group-adjust-admin');
            }
        }).catch(function(error) {
            if (error.response.data.errors.username) {
                if (error.response.data.errors.username.length > 0) {
                    $error = error.response.data.errors.username[0];
                    if ($("#admin_username").val() == "") {
                        $("#error_admin_username").addClass('invalid-feedback').html(
                            "This field is required.").show();
                        $('#mobileValidateAdminUsername').removeClass('form-group-adjust-admin');
                    } else {

                        if ($error == "The username has already been taken.") {
                            $("#error_admin_username").addClass('invalid-feedback').html(
                                "The username has already been taken.").show();
                            $('#mobileValidateAdminUsername').addClass('form-group-adjust-admin');
                        }
                    }
                    $("#admin_username").addClass('is-invalid');
                    console.log("Error");
                }
            }
        })
    }

    function editValidateAdminFirst_name(e) {
        let user_id = $("#adminUserId").val();
        let data = {
            user_id: user_id,
            first_name: e.value
        }
        axios.post(apiUrl + "/api/editValidateFirstname/", data, {
            headers: {
                Authorization: token
            },
        }).then(function(response) {
            let data = response.data;
            if (data.success) {
                $("#admin_first_name").removeClass('is-invalid');
                $("#error_admin_first_name").removeClass('invalid-feedback').html("").show();

            } else {
                $("#admin_first_name").removeClass('is-invalid');
                $("#error_admin_first_name").removeClass('invalid-feedback').html("").show();
            }
        }).catch(function(error) {
            if (error.response.data.errors.first_name) {
                if (error.response.data.errors.first_name.length > 0) {
                    $error = error.response.data.errors.first_name[0];
                    if ($("#admin_first_name").val() == "") {
                        $("#error_admin_first_name").addClass('invalid-feedback').html(
                            "This field is required.").show();
                    }
                    $("#admin_first_name").addClass('is-invalid');
                    console.log("Error");
                }
            }
        })
    }


    function editValidateAdminLast_name(e) {
        let user_id = $("#adminUserId").val();
        let data = {
            user_id: user_id,
            last_name: e.value
        }
        axios.post(apiUrl + "/api/editValidateLastname/", data, {
            headers: {
                Authorization: token
            },
        }).then(function(response) {
            let data = response.data;
            if (data.success) {
                $("#admin_last_name").removeClass('is-invalid');
                $("#error_admin_last_name").removeClass('invalid-feedback').html("").show();

            } else {
                $("#admin_last_name").removeClass('is-invalid');
                $("#error_admin_last_name").removeClass('invalid-feedback').html("").show();
            }
        }).catch(function(error) {
            if (error.response.data.errors.last_name) {
                if (error.response.data.errors.last_name.length > 0) {
                    $error = error.response.data.errors.last_name[0];
                    if ($("#admin_last_name").val() == "") {
                        $("#error_admin_last_name").addClass('invalid-feedback').html(
                            "This field is required.").show();
                    }
                    $("#admin_last_name").addClass('is-invalid');
                    console.log("Error");
                }
            }
        })
    }


    $(document).ready(function() {


        // $('#accountSetting').hover(
        //     function() {
        //         $('#change_Password').show();
        //         $(this).find('span #rotateArrow').css('transform', '');

        //     },
        //     function() {
        //         $('#change_Password').hide();
        //         $(this).find('span #rotateArrow').css('transform', 'rotate(-90deg)');

        //     }
        // );



        // START CODE FOR CROPING IMAGE
        $('#admin_uploadBtn').on('click', function() {
            $('#previewAdminModal').modal('show');
            $('#changeAdminDetails').modal('hide');

        })

        $("#previewAdminModal").on('hide.bs.modal', function() {
            document.getElementById("admin_upload_image").value = "";
            $('#adminImageRow').removeClass('d-none')
            $('#changeAdminDetails').modal('show');
        });

        $('#admin_upload_image').on('change', function() {
            $('#adminImageRow').removeClass('d-none')
            var admin_reader = new FileReader();
            admin_reader.onload = function(event) {
                $admin_uploadCrop.croppie('bind', {
                    url: event.target.result
                })
            }
            admin_reader.readAsDataURL(this.files[0]);
        })

        $admin_uploadCrop = $('#admin_image_demo').croppie({
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

        $('#admin_imageCrop').on('click', function(e) {
            e.preventDefault();
            var originalText = $('#admin_imageCrop').html();
            // add spinner to button
            $('#admin_imageCrop').html(
                `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
            );

            $admin_uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                let formData = new FormData();
                formData.append('image', response);
                console.log('formData', formData);

                axios.post(apiUrl + "/api/imagePreview", formData, {
                    headers: {
                        Authorization: token,
                        "Content-Type": "multipart/form-data",
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        console.log("data.image", data);
                        $('#admin_imageCrop').html(originalText);
                        $('#previewModal').modal('hide');
                        $('#previewAdminModal').modal('hide');
                        $('#changeAdminDetails').modal('show');
                        $('div.spanner').addClass('show');
                        setTimeout(function() {
                            $('div.spanner').removeClass('show');
                            // $('#notifyIcon').html(
                            //     '<i class="fa-solid fa-check" style="color:green"></i>'
                            // );
                            // $('.toast1 .toast-title').html('Success');
                            // $('.toast1 .toast-body').html(data.message);
                            $('#admin_photo').attr('src',
                                '{{ asset('storage/images') }}/' + data
                                .image);
                            // console.log("data.image", data);
                            file_original_name = data.image;
                            file_name = data.image;
                            file_path = data.path;
                            file_size = data.size;
                            document.getElementById("admin_upload_image")
                                .value = "";
                            $('#adminImageRow').addClass('d-none')
                            // toast1.toast('show');
                        }, 1500)
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                    $('#admin_imageCrop').html(originalText);
                    $('#notifyIcon').html(
                        '<i class="fa-solid fa-x" style="color:#dc3545"></i>');
                    $('.toast1 .toast-title').html('Success');
                    $('.toast1 .toast-body').html("Something went wrong.");
                    toast1.toast('show');
                });
            })
        });

        $('#navbarDropdown').on('click', function() {
            const isVisible = window.getComputedStyle(adminMenu).getPropertyValue("display") !== "none";
            var rotateArrow = $('#rotateArrow');
            if (isVisible) {
                rotateArrow.css('transform', 'rotate(-90deg)');
                console.log("The adminMenu is currently hidden.");
            }
        })

        $('#accountSetting').on('click', function(event) {
            event.stopPropagation();
            var changePassword = $('#change_Password');
            var rotateArrow = $('#rotateArrow');

            var isVisible = changePassword.is(':visible');
            changePassword.toggle();

            if (isVisible) {
                rotateArrow.css('transform', 'rotate(-90deg)');
            } else {
                rotateArrow.css('transform', '');
            }
        });

        $(document).on('click', function() {
            $('#change_Password').hide();
        });

        $('#currentPassword,#newPassword, #confirmPassword').on('blur', function() {
            changePassword($('#currentPassword'), $('#newPassword'), $('#confirmPassword'));
        });

        show_user_data();
        header_title();

        let toast1 = $('.toast1');
        toast1.toast({
            delay: 5000,
            animation: true
        });

        toast1.toast({
            delay: 3000,
            animation: true
        });

        $('.close').on('click', function(e) {
            e.preventDefault();
            toast1.toast('hide');
        })

        $("#show_hide_currentPassword a").on('click', function(e) {
            e.preventDefault();
            if ($('#show_hide_currentPassword input').attr("type") == "text") {
                $('#show_hide_currentPassword input').attr('type', 'password');
                $('#currentHide').addClass("d-none");
                $('#currentShow').removeClass("d-none");
            } else if ($('#show_hide_currentPassword input').attr("type") == "password") {
                $('#show_hide_currentPassword input').attr('type', 'text');
                $('#currentShow').addClass("d-none");
                $('#currentHide').removeClass("d-none");
            }
        });

        $("#show_hide_newPassword a").on('click', function(e) {
            e.preventDefault();
            if ($('#show_hide_newPassword input').attr("type") == "text") {
                $('#show_hide_newPassword input').attr('type', 'password');
                $('#newHide').addClass("d-none");
                $('#newShow').removeClass("d-none");
            } else if ($('#show_hide_newPassword input').attr("type") == "password") {
                $('#show_hide_newPassword input').attr('type', 'text');
                $('#newShow').addClass("d-none");
                $('#newHide').removeClass("d-none");
            }
        });

        $("#show_hide_confirmPassword a").on('click', function(e) {
            e.preventDefault();
            if ($('#show_hide_confirmPassword input').attr("type") == "text") {
                $('#show_hide_confirmPassword input').attr('type', 'password');
                $('#confirmHide').addClass("d-none");
                $('#confirmShow').removeClass("d-none");
            } else if ($('#show_hide_confirmPassword input').attr("type") == "password") {
                $('#show_hide_confirmPassword input').attr('type', 'text');
                $('#confirmShow').addClass("d-none");
                $('#confirmHide').removeClass("d-none");
            }
        });

        $("#changePassword").on('hide.bs.modal', function() {
            $("div.spanner").addClass("show");
            setTimeout(function() {
                $('#adminChangePassword').trigger('reset');
                $('#adminChangePassword').removeClass('was-validated');
                $('#currentPassword').removeClass('is-invalid');
                $('#newPassword').removeClass('is-invalid');
                $('#confirmPassword').removeClass('is-invalid');
                $("#error_currentPassword").removeClass('invalid-feedback').html("").show();
                $("#error_newPassword").removeClass('invalid-feedback').html("").show();
                $("#error_confirmPassword").removeClass('invalid-feedback').html("").show();

                $("#toggle_currentPassword").css("margin-right", "0px");
                $("#toggle_newPassword").css("margin-right", "0px");
                $("#toggle_confirmPassword").css("margin-right", "0px");

                $("div.spanner").removeClass("show");
            }, 1500)
        })


        $("#changeAdminDetails").on('hide.bs.modal', function() {
            $("div.spanner").addClass("show");
            setTimeout(function() {
                $('#changeAdminDetails').trigger('reset');
                $('#changeAdminDetails').removeClass('was-validated');
                // $('#currentPassword').removeClass('is-invalid');
                // $('#newPassword').removeClass('is-invalid');
                // $('#confirmPassword').removeClass('is-invalid');
                // $("#error_currentPassword").removeClass('invalid-feedback').html("").show();
                // $("#error_newPassword").removeClass('invalid-feedback').html("").show();
                // $("#error_confirmPassword").removeClass('invalid-feedback').html("").show();

                $("div.spanner").removeClass("show");
            }, 1500)
        })

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var updateAdminDetails = document.querySelectorAll('.needs-validation')
        // Loop over them and prevent submission
        Array.prototype.slice.call(updateAdminDetails)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })

        $('#updateAdminDetails').submit(function(e) {
            e.preventDefault();

            // BUTTON SPINNER
            var originalText = $('#button_admin_submit').html();
            $('#button_admin_submit').html(
                `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
            );
            $('#button_admin_submit').prop("disabled", true);
            setTimeout(function() {
                $('#button_admin_submit').html(originalText);
            }, 500);

            let admin_userId = $('#adminUserId').val();
            let admin_first_name = $('#admin_first_name').val();
            let admin_last_name = $('#admin_last_name').val();
            let admin_email_address = $('#admin_email_address').val();
            let admin_username = $('#admin_username').val();

            let data = {
                user_id: admin_userId,
                first_name: admin_first_name,
                last_name: admin_last_name,
                email: admin_email_address,
                username: admin_username,
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

            console.log("USER ADMIN", result);
            axios.post(apiUrl + '/api/updateAdminDetails', result, {
                headers: {
                    Authorization: token,
                    "Content-Type": "multipart/form-data",
                },
            }).then(function(response) {
                console.log("RESPONSE", response);
                let data = response.data;
                if (data.success) {
                    console.log("SUCCESS", data);
                    $('#changeAdminDetails').modal("hide");
                    $("div.spanner").addClass("show");

                    $('#notifyIcon').html(
                        '<i class="fa-solid fa-check" style="color:green"></i>');
                    $('.toast1 .toast-title').html('Success');
                    $('.toast1 .toast-body').html(data.message);
                    $('#updateAdminDetails').trigger('reset');
                    $('#updateAdminDetails').removeClass('was-validated');
                    $('#button_admin_submit').prop("disabled", false);
                    setTimeout(function() {
                        $("div.spanner").removeClass("show");
                        // location.href = apiUrl + "/admin/current"
                        window.location.reload();
                    }, 2500)
                    toast1.toast('show');


                }
            }).catch(function(error) {
                console.log("error.response.data.errors", error);
                setTimeout(function() {
                    $('#button_admin_submit').prop("disabled", false);
                }, 500);
            })

        })


        var adminChangePasswordForms = document.querySelectorAll('.needs-validation');
        // Loop over them and prevent submission
        Array.prototype.slice.call(adminChangePasswordForms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        $('#currentPassword').on('keyup', function() {
            var isFormValidated = $('.needs-validation').hasClass('was-validated');
            if (isFormValidated) {
                if ($('#currentPassword').val() == "") {
                    $("#toggle_currentPassword").css("margin-right", "20px");
                } else {
                    $("#toggle_currentPassword").css("margin-right", "0px");
                }
            }
        })

        $('#newPassword').on('keyup', function() {
            var isFormValidated = $('.needs-validation').hasClass('was-validated');
            if (isFormValidated) {
                if ($('#newPassword').val() == "") {
                    $("#toggle_newPassword").css("margin-right", "20px");
                } else {
                    $("#toggle_newPassword").css("margin-right", "0px");
                }
            }
        })

        $('#confirmPassword').on('keyup', function() {
            var isFormValidated = $('.needs-validation').hasClass('was-validated');
            if (isFormValidated) {
                if ($('#confirmPassword').val() == "") {
                    $("#toggle_confirmPassword").css("margin-right", "20px");
                } else {
                    $("#toggle_confirmPassword").css("margin-right", "0px");
                }
            }
        })


        $('#adminChangePassword').submit(function(e) {
            e.preventDefault();

            // BUTTON SPINNER
            var originalText = $('#changePassword_button').html();
            $('#changePassword_button').html(
                `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
            );
            $('#changePassword_button').prop("disabled", true);
            setTimeout(function() {
                $('#changePassword_button').html(originalText);
            }, 500);

            if ($('#currentPassword').val() == "") {
                $("#toggle_currentPassword").css("margin-right", "20px");
            }

            if ($('#newPassword').val() == "") {
                $("#toggle_newPassword").css("margin-right", "20px");
            }

            if ($('#confirmPassword').val() == "") {
                $("#toggle_confirmPassword").css("margin-right", "20px");
            }

            let currentPassword = $("#currentPassword").val();
            let newPassword = $("#newPassword").val();
            let confirmPassword = $('#confirmPassword').val();

            let data = {
                currentPassword: currentPassword,
                newPassword: newPassword,
                confirmPassword: confirmPassword,
            };

            axios.post(apiUrl + '/api/admin/changePassword', data, {
                headers: {
                    Authorization: token,
                }
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    console.log("SUCCESS", data);
                    $('#changePassword').modal('hide');
                    $("div.spanner").addClass("show");
                    setTimeout(function() {
                        $("div.spanner").removeClass("show");

                        $('#notifyIcon').html(
                            '<i class="fa-solid fa-check" style="color:green"></i>'
                        );
                        $('.toast1 .toast-title').html('Success');
                        $('.toast1 .toast-body').html(response.data.message);

                        $('#adminChangePassword').trigger('reset');
                        $('#adminChangePassword').removeClass('was-validated');
                        $('#currentPassword').removeClass('is-invalid');
                        $('#newPassword').removeClass('is-invalid');
                        $('#confirmPassword').removeClass('is-invalid');
                        $("#error_currentPassword").removeClass('invalid-feedback')
                            .html("").show();
                        $("#error_newPassword").removeClass('invalid-feedback').html("")
                            .show();
                        $("#error_confirmPassword").removeClass('invalid-feedback')
                            .html("").show();

                        $("#toggle_currentPassword").css("margin-right", "0px");
                        $("#toggle_newPassword").css("margin-right", "0px");
                        $("#toggle_confirmPassword").css("margin-right", "0px");

                        $('#changePassword_button').prop("disabled", false);
                        toast1.toast('show');
                    }, 1500)
                }
            }).catch(function(error) {
                console.log("validation error", error);
                $('#adminChangePassword').addClass('was-validated');
                $('#currentPassword').addClass('is-invalid');
                $('#newPassword').addClass('is-invalid');
                $('#confirmPassword').addClass('is-invalid');

                $("#error_currentPassword").addClass('invalid-feedback')
                    .html("This field is required.").show();
                $("#error_newPassword").addClass('invalid-feedback').html(
                        "This field is required.")
                    .show();
                $("#error_confirmPassword").addClass('invalid-feedback')
                    .html("This field is required.").show();
                setTimeout(function() {
                    $('#changePassword_button').prop("disabled", false);
                }, 500);
            })
        })


        var windowWidth = $(window).width();
        if (windowWidth < 445) {
            $('.icons').removeClass("d-flex").addClass("d-none");
        } else {
            $('.icons').removeClass("d-none").addClass("d-flex");
        }

        if (windowWidth < 768) {
            // console.log("<768");
            $('#invoiceApp').addClass("d-none");
            $('#header_title').removeClass("ps-3");
            $('.mobileLayout').removeClass("d-flex").addClass("d-none");
            $('.webLayout').removeClass("d-none").addClass("d-flex");
        } else {
            // console.log(">=768");
            $('#header_title').addClass("ps-3");
            $('#invoiceApp').removeClass("d-none").addClass("d-flex");
            $('.mobileLayout').removeClass("d-none").addClass("d-flex");
            $('.webLayout').removeClass("d-flex").addClass("d-none");
        }

        $(window).resize(function() {
            var windowWidth = $(window).width();
            if (windowWidth < 445) {
                $('.icons').removeClass("d-flex").addClass("d-none");
            } else {
                $('.icons').removeClass("d-none").addClass("d-flex");
            }
            if (windowWidth < 768) {
                // console.log("<768");
                $('#invoiceApp').addClass("d-none");
                $('#header_title').removeClass("ps-3");
                $('.mobileLayout').removeClass("d-flex").addClass("d-none");
                $('.webLayout').removeClass("d-none").addClass("d-flex");
            } else {
                // console.log(">=768");
                $('#header_title').addClass("ps-3");
                $('#invoiceApp').removeClass("d-none").addClass("d-flex");
                $('#invoiceApp').addClass("d-flex");
                $('.mobileLayout').removeClass("d-none").addClass("d-flex");
                $('.webLayout').removeClass("d-flex").addClass("d-none");
            }
        });



        function header_title() {
            let url = window.location.pathname;
            let path = url.slice(1);
            let urlSplit = url.split("/");
            if (path == 'admin/dashboard') {
                $("#header_title").html('Dashboard');
            }

            if (path == 'admin/profile') {
                $("#header_title").html('Add Profile');
            }

            if (path == 'admin/current') {
                $("#header_title").html('Current Profile');
            }

            if (urlSplit[1] + urlSplit[2] == 'adminactiveProfile') {
                $("#header_title").html('View Profile');
            }

            if (urlSplit[1] + urlSplit[2] == 'admininactiveProfile') {
                $("#header_title").html('View Profile');
            }

            if (urlSplit[1] + urlSplit[2] == 'admineditInvoice') {
                $("#header_title").html('View Invoice');
            }

            if (path == 'admin/inactive') {
                $("#header_title").html('Inactive Profile');
            }

            if (path == 'invoice/addInvoice') {
                $("#header_title").html('Create Invoice');
            }

            if (path == 'invoice/current') {
                $("#header_title").html('Current Invoice');
            }
            if (path == 'invoice/inactive') {
                $("#header_title").html('Inactive Invoice');
            }
            if (path == 'settings/deductiontype') {
                $("#header_title").html('Deduction Types');
            }
            if (path == 'reports/deduction') {
                $("#header_title").html('Deduction Report');
            }
            if (path == 'reports/invoice') {
                $("#header_title").html('Invoice Report');
            }
            if (path == 'settings/emailconfig') {
                $("#header_title").html('Email Configuration');
            }
            if (path == 'settings/invoiceconfig') {
                $("#header_title").html('Invoice Configuration');
            }

            if (urlSplit[1] + urlSplit[2] == 'admineditInactiveInvoice') {
                $("#header_title").html('View Invoice');
            }

            if (urlSplit[1] + urlSplit[2] == 'invoiceeditInvoice') {
                $("#header_title").html('View Invoice');
            }
            if (urlSplit[1] + urlSplit[2] == 'invoiceeditInactiveInvoice') {
                $("#header_title").html('View Invoice');
            }

            console.log("url", urlSplit[1] + urlSplit[2]);
            console.log("path", path);

        }

        function show_user_data() {
            axios.get(apiUrl + '/api/user_data', {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;

                if (data.data) {
                    // $(".rounded-pill").attr("src", data.data.file_path ? data.data.file_path :
                    //     '/images/default.png');
                    $('.fullname').html(data.data.first_name + " " + data.data.last_name);
                    $('#role').html(data.data.role);
                    $('#userId').html(data.data.id);

                    $('#admin_first_name').val(data.data.first_name);
                    $('#admin_last_name').val(data.data.last_name);
                    $('#admin_email_address').val(data.data.email);
                    $('#admin_username').val(data.data.username);

                    if (data.data.profile) {
                        $(".rounded-pill").attr("src", data.data.profile.file_path ? data.data.profile
                            .file_path :
                            '/images/default.png');
                        $("#admin_photo").attr("src", data.data.profile.file_path ? data.data.profile
                            .file_path :
                            '/images/default.png');
                        console.log("show_user_data", data);
                    } else {
                        $(".rounded-pill").attr("src", data.data.profile.file_path ? data.data.profile
                            .file_path :
                            '/images/default.png');
                        $("#admin_photo").attr("src", "/images/default.png");
                    }

                    old_file_original_name = data.data.profile.file_original_name ? data.data
                        .profile
                        .file_original_name :
                        "";
                    old_file_name = data.data.profile.file_name ? data.data.profile.file_name : "";
                    old_file_path = data.data.profile.file_path ? data.data.profile.file_path : "";

                }
            }).catch(function(error) {
                console.log('error', error);
            })
        }

        $("#logout").on("click", function() {
            axios.post(apiUrl + '/api/logout', {}, {
                    headers: {
                        Authorization: token,
                    },
                })
                .then(function(response) {
                    let data = response.data;
                    console.log('data', data);
                    if (data.success) {
                        localStorage.removeItem('token');
                        // localStorage.userdata = JSON.parse(data.user);
                        window.location.replace(apiUrl + '/');
                    }
                })
                .catch(function(error) {
                    console.log('catch', error);
                });
        })

    });
</script>
