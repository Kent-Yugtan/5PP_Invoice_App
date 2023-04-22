@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <div class="card-border shadow" style="min-height: 450px; width:375px; background-color:white;padding:20px">
                    <div class="card-body">


                        <h4 class="text-muted">Reset password</h4>
                        <hr>
                        <form id="resetPassword" autocomplete="off">
                            <div id="error_msg"></div>
                            <!-- class="alert alert-danger text-center" -->
                            <div id="success_msg"></div>
                            <!-- class="alert alert-success text-center" -->
                            @csrf
                            <input type="hidden" id="token" value="{{ $token }}">
                            <div class="form-group ">
                                <label for="email" class="text-muted">Email Address</label>
                                <input type="email" class="form-control" id="email_address" name="email_address"
                                    placeholder="Enter email address" disabled required
                                    value="{{ $email_address ?? old('email_address') }}">
                            </div>
                            <div class="form-group ">
                                <label for="password" class="text-muted">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter password" required>
                                <div id="password_error1" style="color:red;"></div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="text-muted">Confirm password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Enter password" required>
                                <div id="password_error2" style="color:red;"></div>
                            </div>
                            <div class="form-group ">
                                <button type="submit" id="confirm"
                                    style="width:100%;color:white; background-color: #CF8029;" class="btn">Reset
                                    password</button>
                            </div>
                            <a style="text-decoration:none;" class="input-color" href="{{ url('/') }}">Back to
                                Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#confirm").prop('disabled', true);

            $('#password_confirmation').on('keyup', function() {
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();

                if (password != password_confirmation) {
                    $('#password_error1').html('Passwords do not match');
                    $('#password_error2').html('Passwords do not match');
                    $("#confirm").prop('disabled', true);
                } else {
                    $('#password_error1').html('');
                    $('#password_error2').html('');
                    $("#confirm").prop('disabled', false);
                }
            });

            $('#resetPassword').submit(function(e) {
                e.preventDefault();


                let email_address = $('#email_address').val();
                let password = $('#password').val();
                let token = $('#token').val();
                let data = {
                    email_address: email_address,
                    password: password,
                    token: token
                }

                var originalText = $('#confirm').html();
                $('#confirm').prop("disabled", true);
                // add spinner to button
                $('#confirm').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );

                axios.post(apiUrl + "/api/password/reset", data, {
                    headers: {
                        Authorization: token
                    }
                }).then((response) => {
                    let res = response.data;
                    if (res.success == true) {
                        console.log("TRue", data);
                        setTimeout(function() {
                            $('#confirm').html(originalText);
                            $('#success_msg').addClass("alert alert-success text-center");
                            $("#success_msg").html(res.message).show();
                            $("#email_address").prop('disabled', true);
                            $("#password").val('');
                            $("#password").prop('disabled', true);
                            $("#password_confirmation").val('');
                            $("#password_confirmation").prop('disabled', true);
                            $("#confirm").prop('disabled', true);
                        }, 2000)
                    }
                    if (res.success == false) {
                        console.log("FALSE", res.message);

                        setTimeout(function() {
                            $('#confirm').html(originalText);
                            $('#error_msg').addClass("alert alert-danger text-center");
                            $("#error_msg").html(res.message).show();
                            $("#email_address").prop('disabled', true);
                            $("#password").val('');
                            $("#password").prop('disabled', true);
                            $("#password_confirmation").val('');
                            $("#password_confirmation").prop('disabled', true);
                            $("#confirm").prop('disabled', true);
                        }, 2000)
                    }
                }).catch((error) => {
                    let errors = error.response.data;
                    setTimeout(function() {
                        $('#button-submit').html(originalText);
                        $('#error_msg').addClass("alert alert-danger text-center");
                        $("#error_msg").html(errors.message).show();
                        $('#error_msg').removeClass("alert alert-danger text-center");
                    }, 2000)
                });
            })

        })
    </script>
@endsection
