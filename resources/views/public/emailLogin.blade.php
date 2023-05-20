@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 p-4" style="display:flex;justify-content:center">
                <div class="card-border shadow" style="min-height: 450px; width:375px; background-color:white">
                    <div
                        style="text-align: center;height: 100px;font-size:40px;display: flex;justify-content: center;align-items: center;">
                        <img src="{{ URL('images/Invoices-logo.png') }}" style="width: 65px" />
                    </div>
                    <div class="input-color bottom10" style="text-align: center; font-size:22px;font-weight:600">
                        {{ __('5PP Invoicing App') }}
                    </div>
                    <div style="text-align: center;font-size:22px">
                        <label style="color: black;" class="fw-bold"> Login </label>
                    </div>

                    <div class="input-color" style="text-align: center;">
                        {{ __('Enter your email and password below') }}
                    </div>

                    <div class="card-body">
                        <form id="form_login" style="padding:20px">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div id="error_msg" class="alert alert-danger text-center"></div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="email"
                                        style="color: #A4A6B3;font-size:12px;font-weight:600">EMAIL</label>
                                    <input id="email" placeholder="Email address" type="text" autocomplete="off"
                                        class="form-control" name="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="has-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label for="password"
                                                style="color: #A4A6B3;font-size:12px;font-weight:600">PASSWORD</label>
                                            <a style="text-decoration:none;color: #A4A6B3;font-size:12px;font-weight:600"
                                                class="input-color" href="{{ url('forgotPassword') }}">Forgot
                                                password?</a>
                                        </div>

                                        <div class="input-group" id="show_hide_password">
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="Password" style="border-radius: 0.25rem" autocomplete="off">
                                            <div class="invalid-feedback">This field is required.</div>
                                            <div class="form-control-feedback" id="toggle_password">
                                                <a href="#" id="eye" class="" style="color:#A4A6B3">
                                                    <i class="fa fa-eye-slash" id="show"></i>
                                                    <i class="fa fa-eye d-none" id="hide"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <button type="submit" id="button-submit"
                                        style="width:100%; color:white; background-color: #CF8029;" class="btn">
                                        Login
                                    </button>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12" style="text-align: center;padding-top:10px">
                                    <label class="input-color">{{ __('Don\'t have an account?') }} <label
                                            style="color: #CF8029">Signup</label>
                                    </label>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#error_msg").hide();
        $(document).ready(function() {

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

            $('#form_login').submit(function(e) {
                e.preventDefault();
                $("#error_msg").hide();
                let email = $("#email").val();
                let password = $("#password").val();
                let data = {
                    email,
                    password
                };

                var originalText = $('#button-submit').html();
                // add spinner to button
                $('#button-submit').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                axios.post(apiUrl + '/api/login', data, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;

                    if (!data.succcess) {
                        setTimeout(function() {
                            $('#button-submit').html(originalText);
                            $("#error_msg").html(data.message).show();
                            $("#error_msg").addClass('mt-3');
                            $('#form_login').trigger('reset');
                        }, 1000);
                    } else {
                        if (data.user.role === "Admin") {
                            // Get the current URL
                            var currentUrl = decodeURIComponent(getQueryVariable("redirect"));
                            // Extract the value of the 'user_id' parameter using regular expressions
                            var regex = /[?&]user_id(=([^&#]*)|&|#|$)/;
                            var match = regex.exec(currentUrl);
                            var user_id = match && decodeURIComponent(match[2].replace(/\+/g, " "));

                            // console.log('data', data);

                            if (data.user.id == user_id) {
                                setTimeout(function() {
                                    $('#button-submit').html(originalText);
                                    localStorage.token = data.token;
                                    // Redirect to the desired URL
                                    window.location.href = decodeURIComponent(
                                        getQueryVariable(
                                            "redirect"));
                                }, 1000);
                            } else {
                                setTimeout(function() {
                                    $('#button-submit').html(originalText);
                                    localStorage.removeItem('token');
                                    $("#error_msg").html(
                                        "The profile of this invoice doesn`t match."
                                ).show();
                                $('#form_login').trigger('reset');
                            }, 1000);
                        }
                    } else if (data.user.role !== "Admin" && data.profile_status
                        .profile_status === "Inactive") {
                        axios.post(apiUrl + '/api/logout', {}, {
                            headers: {
                                Authorization: token,
                            },
                        }).then(function(response) {
                            let data = response.data;
                            if (data.success) {
                                setTimeout(function() {
                                    $('#button-submit').html(originalText);
                                    localStorage.removeItem('token');
                                    $("#error_msg").html(
                                        "This profile is inactive. Please contact the system administrator."
                                    ).show();
                                    $('#form_login').trigger('reset');
                                }, 1000);
                            }
                        }).catch(function(error) {
                            console.log('catch', error);
                        });
                    } else {

                        // Get the current URL
                        var currentUrl = decodeURIComponent(getQueryVariable("redirect"));
                        // Extract the value of the 'user_id' parameter using regular expressions
                        var regex = /[?&]user_id(=([^&#]*)|&|#|$)/;
                        var match = regex.exec(currentUrl);
                        var user_id = match && decodeURIComponent(match[2].replace(/\+/g, " "));

                        // console.log('data', data);

                        if (data.user.id == user_id) {
                            setTimeout(function() {
                                $('#button-submit').html(originalText);
                                localStorage.token = data.token;
                                // Redirect to the desired URL
                                window.location.href = decodeURIComponent(
                                    getQueryVariable(
                                        "redirect"));
                            }, 1000);
                        } else {
                            setTimeout(function() {
                                $('#button-submit').html(originalText);
                                localStorage.removeItem('token');
                                $("#error_msg").html(
                                    "The profile of this invoice doesn`t match."
                                    ).show();
                                    $('#form_login').trigger('reset');
                                }, 1000);
                            }
                        }
                    }
                }).catch(function(error) {
                    console.log('catch', error);
                    setTimeout(function() {
                        $("#error_msg").html('Unrecognized credentials.').show();
                        $("#error_msg").addClass('mt-3');
                        $('#button-submit').html(originalText);
                    }, 1000);
                });
            });

            function getQueryVariable(variable) {
                var query = window.location.search.substring(1);
                var vars = query.split('&');
                for (var i = 0; i < vars.length; i++) {
                    var pair = vars[i].split('=');
                    if (decodeURIComponent(pair[0]) === variable) {
                        return decodeURIComponent(pair[1]);
                    }
                }
                return null; // Variable not found
            }

        });
    </script>
@endsection
