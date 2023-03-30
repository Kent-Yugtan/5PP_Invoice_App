@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 p-4" style="display:flex;justify-content:center">
      <div class="card-border shadow" style="min-height: 450px; width:450px">
        <div style="text-align: center;height: 100px; padding-top: 20px;font-size:40px">
          <img class="img-team" src="{{ URL('images/Invoices-logo.png')}}" style="width: 65px" />
        </div>
        <div class="input-color" style="text-align: center; font-size:30px;">
          {{ __('5PP Invoicing App') }}
        </div>
        <div style="text-align: center;font-size:25px">
          <strong> Login </strong>
        </div>

        <div class="input-color" style="text-align: center;">
          {{ __('Enter your email and password below') }}
        </div>

        <div class="card-body">
          <form id="form_login">
            <div id="error_msg" class="alert alert-danger text-center"></div>
            @csrf
            <div class="row mb-3">
              <div class="col-md-12" style="padding-top:10px">
                <label class="form-label" for="email">Email Address</label>
                <input id="email" placeholder="Enter Email Address" type="text" class="form-control" name="email" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12" style="padding-top:10px">
                <label class="form-label" for="password">Password</label>
                <input id="password" placeholder="Enter password" type="password" class="form-control" name="password" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <button type="submit" id="button-submit" style="width:100%; color:white; background-color: #CF8029;" class="btn">
                  Login
                </button>
              </div>
            </div>


            <div class="row mb-3">
              <div class="col-md-12" style="text-align: center">
                <!-- <label class="input-color">{{ __('Don\'t have an account?') }} </label> -->
                <a style="text-decoration:none;" class="input-color" href="{{ url('forgotPassword') }}">Forgot
                  password</a>
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
              $('#form_login').trigger('reset');
            }, 2000);
          } else {
            if (data.user.role === "Admin") {
              setTimeout(function() {
                $('#button-submit').html(originalText);
                localStorage.token = data.token;
                window.location.replace(apiUrl + '/admin/dashboard');
              }, 2000);
              // localStorage.userdata = JSON.parse(data.user);
            } else if (data.user.role !== "Admin" && data.profile_status.profile_status === "Inactive") {
              axios.post(apiUrl + '/api/logout', {}, {
                  headers: {
                    Authorization: token,
                  },
                })
                .then(function(response) {
                  let data = response.data;
                  console.log('data', data);
                  if (data.success) {
                    setTimeout(function() {
                      $('#button-submit').html(originalText);
                      localStorage.removeItem('token');
                      $("#error_msg").html(
                          "This profile is inactive. Please contact the system administrator.")
                        .show();
                      $('#form_login').trigger('reset');
                    }, 2000);
                  }
                })
                .catch(function(error) {
                  console.log('catch', error);
                });
            } else {
              setTimeout(function() {
                $('#button-submit').html(originalText);
                localStorage.token = data.token;
                window.location.replace(apiUrl + '/user/dashboard');
              }, 2000);
            }
          }
        })
        .catch(function(error) {
          console.log('catch', error);
        });
    })
  });
</script>

@endsection