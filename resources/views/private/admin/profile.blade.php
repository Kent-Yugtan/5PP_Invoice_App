@extends('layouts.private')
@section('content-dashboard')
<div class="container-fluid px-4" id="loader_load">

  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
      <!-- <div class="card shadow p-2 mb-1 bg-white rounded"> -->
      <!-- <div class="card-header"> -->
      <!-- <i style="color:#CF8029" class="fas fa-users"></i>  -->
      <div class="row">
        <div class="col-xl-12 col-md-12 py-4">
          <span class="fs-3 fw-bold ">Add Profile</span>
        </div>
      </div>
      <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>

  <div class="row pb-3">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
      <div class="card-border shadow p-2 bg-white h-100">
        <!-- <div class="card"> -->
        <!-- <div class="card-header"> -->
        <!-- <i style="color:#CF8029" class="fa-solid fa-circle-info"></i> -->
        <!-- </div> -->
        <div class="card-body">
          <div class="row">
            <div class="col-xl-12 col-md-12 mt-3">
              <span class="fs-3 ">Profile Information</span>
            </div>
          </div>

          <form id="ProfileStore">
            <div class="row pt-3">
              @csrf
              <div class="col-md-5 ">
                <div class="profile-pic-div_adminProfile-wrapper mb-3">
                  <div class="profile-pic-div_adminProfile">
                    <img src="/images/default.png" id="photo">
                    <input name="file" type="file" id="file">
                    <label for="file" id="uploadBtn">Choose Photo</label>
                  </div>
                </div>
              </div>

              <div class="col-md-7 pt-3 mb-3">
                <div class="row">
                  <div class="col mb-3">
                    <input style="color:#CF8029" class="form-check-input" type="checkbox" id="profile_status" name="profile_status" checked>
                    <label class="form-check-label" for="status">
                      Active
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="col mb-3">
                    <label style="color: #A4A6B3;" for="first_name">*Firstname</label>
                    <input id="first_name" name="first_name" type="text" class="form-control" placeholder="Firstname">
                  </div>
                </div>


                <div class="row">
                  <div class="col">
                    <label for="last_name" style="color: #A4A6B3;">*Lastname</label>
                    <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Lastname">
                  </div>
                </div>
              </div>
            </div>

            <div class="row row_email_adminProfile">
              <div class="col-12">
                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="email" style="color: #A4A6B3;">*Email Address</label>
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="username" style="color: #A4A6B3;">*Username</label>
                    <input id="username" name="username" type="text" class="form-control" placeholder="Username">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="password" style="color: #A4A6B3;">Password</label>
                    <div class="form-group has-toggle">
                      <div class="input-group" id="show_hide_password">
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                        <div class="form-control-feedback" id="toggle_password">
                          <a href="#" id="eye" class="" style="color:#CF8029">
                            <i class="fa fa-eye-slash" id="show"></i>
                            <i class="fa fa-eye d-none" id="hide"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- <input id="password" name="password" type="password" class="form-control"> -->
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="position" style="color: #A4A6B3;">Position</label>
                    <select class="form-select" id="position" name="position">
                      <option selected disabled value="">Please Select Position</option>
                      <option value="Lead Developer">Lead Developer</option>
                      <option value="Senior Developer">Senior Developer</option>
                      <option value="Junior Developer">Junior Developer</option>
                      <option value="Web Designer">Web Designer</option>
                      <option value="Tester">Tester</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="phone_number" style="color: #A4A6B3;">Phone Number</label>
                    <input name="phone_number" id="phone_number" type="text" class="form-control" placeholder="Phone Number">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="address" style="color: #A4A6B3;">Address</label>
                    <input name="address" id="address" type="text" class="form-control" placeholder="Address">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="province" style="color: #A4A6B3;">Province</label>
                    <input name="province" id="province" type="text" class="form-control" placeholder="Province">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="city" style="color: #A4A6B3;">City</label>
                    <input id="city" name="city" type="text" class="form-control" placeholder="City">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="city" style="color: #A4A6B3;">ZIP Code</label>
                    <input id="zip_code" name="zip_code" type="text" class="form-control" placeholder="Zip Code">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="acct_no" style="color: #A4A6B3;">*Account Number</label>
                    <input name="acct_no" id="acct_no" type="text" class="form-control" placeholder="Account Number">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="acct_name" style="color: #A4A6B3;">*Account Name</label>
                    <input name="acct_name" id="acct_name" type="text" class="form-control" placeholder="Account Name">
                  </div>
                </div>


                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="bank_name" style="color: #A4A6B3;">*Bank Name</label>
                    <select class="form-select" id="bank_name" name="bank_name">
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
                </div>


                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="city" style="color: #A4A6B3;">Bank Address</label>
                    <input id="bank_address" name="bank_address" type="text" class="form-control" placeholder="Bank Address">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="city" style="color: #A4A6B3;">*Gcash Number</label>
                    <input name="gcash_no" type="text" class="form-control" id="gcash_no" placeholder="Gcash Number">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="date_hired" style="color: #A4A6B3;">Date Hired</label>
                    <input name="date_hired" type="text" onblur="(this.type='text')" class="form-control" id="date_hired" placeholder="Date Hired">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="select2Multiple" style="color: #A4A6B3;">Deduction Types</label>
                    <select style="width:100%" class="form-select" name="deductions" data-placeholder="Choose deduction" multiple="multiple" id="select2Multiple">
                    </select>
                  </div>
                </div>

                <div class="row ">
                  <div class="col-12 mt-3 mb-3">
                    <button type="submit" style="width:100%;color:white; background-color: #CF8029;" class="btn ">Add
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
      <div><i style="color:#CF8029" class="fa fa-newspaper-o"> </i></div>
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

<!-- LOADER SPINNER -->
<div class="spanner">
  <div class="loader"></div>
</div>

<!-- <button type="button" class="btn " id="showtoast">Show Toast</button> -->
<script src="{{ asset('/assets/js/adminProfile.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(e) {
      e.preventDefault();
      console.log("qweqw");
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

    $(window).on('load', function() {
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");
      }, 1500)
    })

    // START OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
    // Get the input field
    var dateInput = $("#date_hired");
    // Set the datepicker options
    dateInput.datepicker({
      dateFormat: "yy/mm/dd",
      onSelect: function(dateText, inst) {
        // Update the input value with the selected date
        dateInput.val(dateText);
      }
    });
    // Set the input value to the current system date in the specified format
    var currentDate = $.datepicker.formatDate("yy/mm/dd", new Date());
    dateInput.val(currentDate);
    // END OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd

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

    $('#ProfileStore').submit(function(e) {
      e.preventDefault();
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');

      let first_name = $("#first_name").val();
      let last_name = $("#last_name").val();
      let email = $("#email").val();
      let username = $("#username").val();
      let password = $("#password").val();
      let position = $("#position").val();
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
      formData.append('first_name', first_name);
      formData.append('last_name', last_name);
      formData.append('email', email);
      formData.append('username', username);
      formData.append('password', password);
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
          document.getElementById('file').files[0].name);
      }

      // CODE FOR FORMDATA SEE TO CONSOLE.LOG
      // for (const [key, value] of formData.entries()) {
      //   console.log(`${key}: ${value}`);
      // }
      axios.post(apiUrl + '/api/saveprofile', formData, {
          headers: {
            Authorization: token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then(function(response) {
          let data = response.data;
          console.log("SUCCESS", response);
          if (data.success === true) {
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
            $("div.spanner").addClass("show");
            setTimeout(function() {
              $("div.spanner").removeClass("show");
              toast1.toast('show');
            }, 1500)

            $('.toast1 .toast-title').html('Profile');
            $('.toast1 .toast-body').html(data.message);

          }
        })
        .catch(function(error) {
          console.log("error.response.data.errors", error);
          if (error.response.data.errors) {
            $('input').removeClass('is-invalid');
            $('input, select').removeClass('is-invalid');
            $('.invalid-feedback').remove();
            var errors = error.response.data.errors;
            var errorContainer = $('#error-container');
            errorContainer.empty();
            console.log("errors", errors)

            if ("password" in errors) {
              $('#eye').addClass('me-3');
              // Do something
            } else {
              $('#eye').removeClass('me-3');
            }
            for (var key in errors) {
              var inputName = key.replace('_', ' ');
              inputName = inputName.charAt(0).toUpperCase() + inputName.slice(1);
              var errorMsg = errors[key][0];
              $('#' + key).addClass('is-invalid');
              $('#' + key).parent().append('<span class="invalid-feedback">' + errorMsg + '</span>');
            }
          } else {
            $('input').removeClass('is-invalid');
            $('input, select').removeClass('is-invalid');
            $('.invalid-feedback').remove();
          }
          // let errors = error.response.data.errors;
          // console.log(errors);
          // if (error.response.data.errors) {
          //   let errors = error.response.data.errors;
          //   let fieldnames = Object.keys(errors);
          //   $('#' + fieldnames[0]).addClass('is-invalid');
          //   Object.values(errors).map((item, index) => {
          //     fieldname = fieldnames[0].split('_');
          //     fieldname.map((item2, index2) => {
          //       fieldname['key'] = capitalize(item2);
          //       return ""
          //     });
          //     fieldname = fieldname.join(" ");
          //     // $('.toast1 .toast-title').html(fieldname);
          //     $('#error_email').html(Object.values(errors)[0].join(
          //       "\n\r"));
          //   })
          //   // toast1.toast('show');
          // }
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
                option += "<option value=" + item.id + ">" + item.deduction_name +
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
      closeOnSelect: true,
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