@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12" style="display:flex;justify-content:center">
      <div class="card shadow" style="min-height: 450px; width:450px">
        <div style="text-align: center;height: 100px; padding-top: 20px;font-size:40px">
          <img class="img-team" src="{{ URL('images/Invoices-logo.png')}}" style="width: 65px" />
        </div>
        <div class="input-color" style="text-align: center; font-size:30px;padding-top:20px">
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
            <div class="row">
              <div class="col-md-12" style="padding-top:10px">
                <div class="form-floating mb-3">
                  <input id="email" placeholder="Enter Email Address" type="text" class="form-control" name="email">
                  <label class="form-label" for="email">Email Address</label>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12" style="padding-top:10px">
                <div class="form-floating">
                  <input id="password" placeholder="Enter password" type="password" class="form-control" name="password">
                  <label class="form-label" for="password">Password</label>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn">
                  Login
                </button>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12" style="text-align: center">
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
      axios.post(apiUrl + '/api/login', data, {
          Headers: {
            Authorization: token,
          },
        }).then(function(response) {
          let data = response.data;

          if (!data.succcess) {
            $("#error_msg").html(data.message).show();
          } else {
            if (data.user.role === "Admin") {
              localStorage.token = data.token;
              console.log("DATA", data)

              // localStorage.userdata = JSON.parse(data.user);
              window.location.replace(apiUrl + '/admin/dashboard');
            } else if (data.user.role !== "Admin" && data.profile_status.profile_status === "Inactive") {
              $("#error_msg").html("This profile is inactive. Please contact the system administrator.").show();
            } else {
              localStorage.token = data.token;
              window.location.replace(apiUrl + '/user/dashboard');
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