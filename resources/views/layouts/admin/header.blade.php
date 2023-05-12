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

            <span class="icons d-none" style="margin-right:30px"><i style="color:#A4A6B3;"
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
            </span>

            <span class="icons d-none" style="padding-right:20px">
                <i style="color:#A4A6B3;" class="fa-solid fa-grip-lines-vertical"></i>
            </span>

            <div class="icons mobileLayout d-none">
                <span style="margin-right:15px">{{ session('data')->first_name }}
                    {{ session('data')->last_name }}</span>
            </div>

            <ul class="navbar-nav ms-auto ms-sm-0 pe-2">
                <li class="nav-item dropdown">
                    <button class="rounded-pill border-0" data-bs-toggle="dropdown" id="navbarDropdown" href="#">
                        <img class="rounded-pill" style="border:1px solid #CF8029" role="button" aria-expanded="false"
                            src="/images/default.png"></button>
                    <ul class="dropdown-menu dropdown-menu-end" style="margin-right:15px"
                        aria-labelledby="navbarDropdown">

                        <li id="accountSetting">
                            <label for="btn-2" class="first dropdown-item">
                                <span>Account Setting</span>
                                <span><i id="rotateArrow" style="transform: rotate(-90deg)"
                                        class="fas fa-angle-down"></i></span>
                            </label>
                            <ul style="padding-left:1rem" id="change_Password">
                                <li class="dropdown-item"><a style="cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#changePassword">Change Password</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <hr class="dropdown-divider">
                        </li>

                        <li class="nav-item"><a class="dropdown-item webLayout d-none ">
                                <span>{{ session('data')->first_name }}
                                    {{ session('data')->last_name }} </span>
                            </a>
                        </li>

                        <li class="nav-item"><a class="dropdown-item">
                                <span>
                                    {{ session('data')->role }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item"><a style="cursor: pointer;" class="dropdown-item" id="logout">
                                <span>{{ __('Logout') }}</span></a>
                        </li>
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
                    $(".rounded-pill").attr("src", data.data.file_path ? data.data.file_path :
                        '/images/default.png');
                    $('#fullname').html(data.data.first_name + " " + data.data.last_name);
                    $('#role').html(data.data.role);
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
