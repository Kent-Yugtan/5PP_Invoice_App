@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
      <div class="card-border shadow p-2 bg-white" style="max-width: 40rem;">
        <form id="forgotPassword" autocomplete="off">
          <div class="row">
            <div class="col mx-3 my-3">
              <span class="fs-4 fw-bold">Forgot Password</span>
              <hr>

              <div id="error_msg"></div>
              <!-- class="alert alert-danger text-center" -->
              <div id="success_msg"></div>
              <!-- class="alert alert-success text-center" -->
              @csrf
              <p>
                Enter your email address and we will send you a link to reset your password.
              </p>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email_address" placeholder="Enter email address" name="email_address" required>
              </div>
              <div class="form-group mt-3 mb-3">
                <button type="submit" id="button-submit" style="width:100%;color:white; background-color: #CF8029;" class="btn">Send
                  Reset Password Link</button>
              </div>
              <a style="text-decoration:none;" class="input-color " href="{{ url('/') }}">Back to Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#forgotPassword').submit(function(e) {
      e.preventDefault();
      let email_address = $('#email_address').val();
      let data = {
        email_address: email_address,
      }

      var originalText = $('#button-submit').html();
      $('#button-submit').prop("disabled", true);
      // add spinner to button
      $('#button-submit').html(
        `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
      );

      axios.post(apiUrl + "/api/resetPassword", data, {
        headers: {
          Authorization: token,
        }
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          setTimeout(function() {
            $('#button-submit').html(originalText);
            $('#success_msg').addClass("alert alert-success text-center");
            $("#success_msg").html(data.message).show();
            $("#email_address").val('');
            $("#email_address").prop('disabled', true);
            $("#button-submit").prop('disabled', true);
          }, 2000);
        } else {
          $('#error_msg').addClass("alert alert-success text-center");
          $("#error_msg").html(data.message).show();
          // console.log(data);
          setTimeout(function() {
            $('#error_msg').removeClass("alert alert-success text-center");
          }, 2000)
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    });

  });
</script>
@endsection