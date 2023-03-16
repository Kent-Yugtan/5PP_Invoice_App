@extends('layouts.private')
@section('content-dashboard')
<div class="container-fluid px-4" id="loader_load">
  <h1 class="mt-4">Dashboard</h1>
  <ol class="breadcrumb mb-4"></ol>

  <div class="row">
    <div class="col-xl-3 col-md-6">
      <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
        <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Paid</div>
        <div>
          <div class="row text-center py-3">
            <Label class="fs-1" id="paid_invoices">
            </Label>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">

        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
        <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Pending</div>
        <div>
          <div class="row text-center py-3">
            <Label class="fs-1" id="pending_invoices">
            </Label>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">

        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
        <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Overdue</div>
        <div>
          <div class="row text-center py-3">
            <Label class="fs-1" id="overdue_invoices">
            </Label>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">

        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
        <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Cancelled</div>
        <div>
          <div class="row text-center py-3">
            <Label class="fs-1" id="cancelled_invoices">
            </Label>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-6">
      <div class="card shadow p-2 mb-4 bg-white rounded">
        <div class="card mb-4">
          <div class="card-header">
            <h5>
              <i class="fa-sharp fa-solid fa-file-invoice-dollar"></i>
              Quick Invoice
            </h5>
          </div>
          <div class="card-body">
            <form id="quick_invoice">
              <div class="row">
                <div class="col-xl-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="selectProfile">
                      <option value="" selected disabled>Select Profile</option>
                    </select>
                    <label for="selectProfile" style="color: #A4A6B3;">Profile</label>
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="form-floating mb-3">
                    <input type="text" placeholder="Due Date" onblur="(this.type='text')" id="due_date" name="due_date" class="form-control">
                    <label for="due_date" style="color: #A4A6B3;">Due Date</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" placeholder="Description">
                    <label for="description" style="color: #A4A6B3;">Description</label>
                  </div>

                </div>
                <div class="col-xl-6">
                  <div class="form-floating mb-3">
                    <input type="text" pattern="^\d{1,3}(,\d{3})*(\.\d{1,2})?$" class="form-control" id="sub_total" placeholder="SubTotal">
                    <label for="sub_total" style="color: #A4A6B3; ">Subtotal ($)</label>
                  </div>
                </div>
              </div>

              <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn" class="btn">Create Invoice</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-6">
      <div class="card shadow mb-4 p-2" style="height:100%" id="pendingInvoices_card">
        <div class="card">
          <div class="card-header">
            <h5>
              <i class="fas fa-clock"></i>
              Pending Invoices
            </h5>
          </div>
          <div class="card-body ">
            <table style="color: #A4A6B3;font-size: 14px;" class="table-responsive table table-hover" id="pendingInvoices">
              <thead>
                <tr>
                  <th>Invoice #</th>
                  <th>Profile Name</th>
                  <th>Due Date</th>
                  <th class="text-center w-5">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="row mx-3">
            <div class="col-xl-6">
              <div class="page_showing" id="tbl_showing_pendingInvoice"></div>
            </div>
            <div class="col-xl-6">
              <ul style="float:right" class="pagination pagination-sm flex-sm-wrap" id="tbl_pagination_pendingInvoice">
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6">
      <div class="card shadow mb-4 p-2" style="height:100%" id="overdueInvoices_card">
        <div class="card">
          <div class="card-header">
            <h5>
              <i class="fas fa-clock"></i>
              Overdue Invoices
            </h5>
          </div>
          <div class="card-body">
            <!-- <div class="text-end">
              <label mb-2 style="color: #A4A6B3;text-align: right;">View All</label>
            </div> -->
            <table style="color: #A4A6B3;font-size: 14px;" class="table table-hover table-responsive" id="overdueInvoices">
              <thead>
                <tr>
                  <th>Invoice #</th>
                  <th>Profile Name</th>
                  <th>Due Date</th>
                  <th class="text-center w-5">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="row mx-3">
            <div class="col-xl-6">
              <div class="page_showing" id="tbl_showing_overdueInvoice"></div>
            </div>
            <div class="col-xl-6">
              <ul style="float:right" class=" pagination pagination-sm flex-sm-wrap" id="tbl_pagination_overdueInvoice">
              </ul>
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

<!-- LOADER SPINNER -->
<div class="spanner">
  <div class="loader"></div>
</div>


<script type="text/javascript">
  const PHP = value => currency(value, {
    symbol: '',
    decimal: '.',
    separator: ','
  });
  $(document).ready(function() {
    let Deductions = [];
    let dollar_rate = 0;
    let peso_rate = 0;
    let fromRate = 0;
    let toRate = 0;
    let converted_amount = 0;
    let sumObj = 0;
    //  For creating invoice codes
    const api = "https://api.exchangerate-api.com/v4/latest/USD";
    $("div.spanner").addClass("show");
    $(window).on('load', function() {
      setTimeout(function() {
        $("div.spanner").removeClass("show");
        selectProfile();
        check_ActivependingInvoices();
        pendingInvoices();
        overdueInvoices();
        active_count_paid();
        active_count_pending();
        active_count_overdue();
        active_count_cancelled();
        due_date();
        // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
        getResults_Converted();
      }, 1500);

    });

    function due_date() {
      // START OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
      // Get the input field
      var dateInput = $("#due_date");
      // Set the datepicker options
      dateInput.datepicker({
        dateFormat: "yy/mm/dd",
        onSelect: function(dateText, inst) {
          // Update the input value with the selected date
          dateInput.val(dateText);
        }
      });
      // Set the input value to the current system date in the specified format
      // var currentDate = $.datepicker.formatDate("yy/mm/dd", new Date());
      // dateInput.val(currentDate);
      // END OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
    }

    let toast1 = $('.toast1');
    toast1.toast({
      delay: 3000,
      animation: true,

    });

    $('.close').on('click', function(e) {
      e.preventDefault();
      toast1.toast('hide');
    });
    $("#error_msg").hide();
    $("#success_msg").hide();

    // COUNT PAID INVOICES
    function active_count_paid() {
      axios.get(apiUrl + '/api/active_paid_invoice_count', {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          console.log("PAID", data);
          $('#paid_invoices').html(data.data.length ? data.data.length : 0);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    // COUNT PENDING INVOICES
    function active_count_pending() {
      axios.get(apiUrl + '/api/active_pending_invoice_count', {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          console.log("PENDING", data);
          $('#pending_invoices').html(data.data.length ? data.data.length : 0);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    // COUNT OVERDUE INVOICES
    function active_count_overdue() {
      axios.get(apiUrl + '/api/active_overdue_invoice_count', {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          $('#overdue_invoices').html(data.data.length ? data.data.length : 0);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    // COUNT CANCELLED INVOICES
    function active_count_cancelled() {
      axios.get(apiUrl + '/api/active_cancelled_invoice_count', {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          $('#cancelled_invoices').html(data.data.length ? data.data.length : 0);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    // $("#tbl_pagination_pendingInvoice").on('click', '.page-item', function() {
    //   $('html,body').animate({
    //     scrollTop: $('#loader_load').offset().top
    //   }, 'slow');

    //   $("div.spanner").addClass("show");
    //   setTimeout(function() {
    //     $("div.spanner").removeClass("show");
    //     $('html,body').animate({
    //       scrollTop: $('#pendingInvoices_card').offset().top
    //     }, 'slow');
    //   }, 1500);
    // })

    // $("#tbl_pagination_overdueInvoice").on('click', '.page-item', function() {
    //   $('html,body').animate({
    //     scrollTop: $('#loader_load').offset().top
    //   }, 'slow');

    //   $("div.spanner").addClass("show");
    //   setTimeout(function() {
    //     $("div.spanner").removeClass("show");
    //     $('html,body').animate({
    //       scrollTop: $('#overdueInvoices_card').offset().top
    //     }, 'slow');
    //   }, 1500);
    // })

    // CHECK PENDING INVOICES
    function check_ActivependingInvoices(filters) {
      axios.get(`${apiUrl}/api/admin/check_ActivependingInvoices?${new URLSearchParams(filters)}`, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          if (data.data.length > 0) {
            data.data.map((item) => {
              var due_dateStatus = item.due_date;
              var today = new Date();
              formatDue_date = moment(due_dateStatus).format('L');
              formatDate_now = moment(today).format('L');

              if (item.invoice_status === "Pending") {
                if (formatDue_date < formatDate_now) {
                  let invoice_id = item.id;
                  let data = {
                    id: invoice_id,
                    invoice_status: "Overdue",
                  }
                  axios.post(apiUrl + '/api/update_status', data, {
                    headers: {
                      Authorization: token
                    },
                  }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                      console.log("SUCCESS Overdue", data);
                      location.reload(true); // refresh the page
                    }
                  }).catch(function(error) {
                    console.log("ERROR", error);
                  })
                }
              }
            })
          }
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    // View Pending Invoices
    function pendingInvoices(filters) {
      let page = $("#tbl_pagination_pendingInvoice .page-item.active .page-link").html();
      let filter = {
        page_size: 5,
        page: page ? page : 1,
        ...filters,
      }
      $('#pendingInvoices tbody').empty();

      axios.get(`${apiUrl}/api/admin/show_pendingInvoices?${new URLSearchParams(filter)}`, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          console.log("PENDINGSUCCESS", data);
          if (data.data.data.length > 0) {
            data.data.data.map((item) => {
              let due_date = new Date(item.due_date);
              var mm = due_date.getMonth() + 1;
              var dd = due_date.getDate();
              var yy = due_date.getFullYear();

              let tr = '<tr style="vertical-align: middle;">';
              tr += '<td hidden>' + item.id + '</td>'
              tr +=
                '<td>' +
                item.invoice_no +
                '</td>';
              tr +=
                '<td>' +
                item.profile.user.first_name + " " + item.profile.user.last_name +
                '</td>';
              tr += '<td>' + moment(item.due_date).format('L') + '</td>';
              tr +=
                '<td style="text-align:center"><a href = "' +
                apiUrl +
                '/admin/editInvoice/' +
                item.id +
                '" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass "></i> </a></td>';
              tr += '</tr>';

              $('#pendingInvoices tbody').append(tr);
            })
            $('#tbl_pagination_pendingInvoice').empty();
            data.data.links.map(item => {
              let li =
                `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}">
              <a class="page-link" data-url="${item.url}">${item.label}</a>
            </li>`
              $('#tbl_pagination_pendingInvoice').append(li)
              return ""
            })

            $("#tbl_pagination_pendingInvoice .page-item .page-link").on('click', function() {
              $("#tbl_pagination_pendingInvoice .page-item").removeClass(
                'active');
              let url = $(this).data('url')
              $.urlParam = function(name) {
                let results = new RegExp("[?&]" + name + "=([^&#]*)").exec(
                  url
                );
                return results !== null ? results[1] || 0 : 0;
              };
              pendingInvoices({
                page: $.urlParam('page')
              });
            })

            let tbl_showing_pendingInvoice =
              `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
            $('#tbl_showing_pendingInvoice').html(tbl_showing_pendingInvoice);
          } else {
            $("#pendingInvoices tbody").append(
              '<tr><td colspan="4" class="text-center">No data</td></tr>'
            );
          }
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    function overdueInvoices(filters) {
      let page = $("#tbl_pagination_overdueInvoice .page-item.active .page-link").html();
      let filter = {
        page_size: 5,
        page: page ? page : 1,
        ...filters
      }
      $('#overdueInvoices tbody').empty();

      axios.get(`${apiUrl}/api/admin/show_overdueInvoices?${new URLSearchParams(filter)}`, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          if (data.data.data.length > 0) {
            data.data.data.map((item) => {
              let due_date = new Date(item.due_date);
              var mm = due_date.getMonth() + 1;
              var dd = due_date.getDate();
              var yy = due_date.getFullYear();
              let tr = '<tr style="vertical-align: middle;">';
              tr += '<td hidden>' + item.id + '</td>'
              tr +=
                '<td>' +
                item.invoice_no +
                '</td>';
              tr +=
                '<td>' +
                item.profile.user.first_name + " " + item.profile.user.last_name +
                '</td>';
              tr += '<td>' + moment(item.due_date).format('L') + '</td>';
              tr +=
                '<td style="text-align:center"><a href = "' +
                apiUrl +
                '/admin/editInvoice/' +
                item.id +
                '" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass "></i> </a></td>';
              tr += '</tr>';
              $('#overdueInvoices tbody').append(tr);
            })
            $('#tbl_pagination_overdueInvoice').empty();
            data.data.links.map(item => {
              let li =
                `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}"><a class="page-link " data-url="${item.url}">${item.label}</a></li>`
              $('#tbl_pagination_overdueInvoice').append(li)
              return ""
            })

            $("#tbl_pagination_overdueInvoice .page-item .page-link").on('click', function() {
              $("#tbl_pagination_overdueInvoice .page-item").removeClass(
                'active');
              let url = $(this).data('url')
              $.urlParam = function(name) {
                var results = new RegExp("[?&]" + name + "=([^&#]*)").exec(
                  url
                );
                return results !== null ? results[1] || 0 : 0;
              };
              overdueInvoices({
                page: $.urlParam('page')
              });
            })

            let tbl_showing_overdueInvoice =
              `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
            $('#tbl_showing_overdueInvoice').html(tbl_showing_overdueInvoice);
          } else {
            $("#overdueInvoices tbody").append(
              '<tr><td colspan="4" class="text-center">No data</td></tr>'
            );
          }
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }


    function selectProfile() {
      axios.get(apiUrl + '/api/show_profile', {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          if (data.data.length > 0) {
            // console.log("SUCCESS", data.data);
            data.data.map((item) => {
              let option = '';
              option += '<option value=' + item.profile.id + ' >' + item.full_name +
                '</option>';
              $('#selectProfile').append(option);
            })
          }
        }

      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    function getResults_Converted() {
      fetch(`${api}`)
        .then(currency => {
          return currency.json();
        }).then(displayResults);
    }


    function displayResults(currency) {
      fromRate = currency.rates['USD'];
      toRate = currency.rates['PHP'];
      peso_rate = (toRate / fromRate);
      // converted_amount = ((toRate / fromRate) * sub_total);
      // console.log("peso_rate", peso_rate);
      // console.log("converted_amount", converted_amount);
    }

    $('#selectProfile').on('change', function() {
      let profile_id = $('#selectProfile').val();
      console.log("PROFILE", profile_id);
      axios.get(apiUrl + '/api/get_quickInvoice_PDT/' + profile_id, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        Deductions = []; // set back to 0 on Deductions.push
        let data = response.data;
        if (data.success) {
          if (data.data.length > 0) {
            data.data.map((item) => {
              let profile_deduction_type_id = item.id ? item.id : '';
              let profile_deduction_type_name = item.deduction_type_name ?
                item.deduction_type_name :
                '';
              let deduction_amount = item.amount ? item.amount : '';
              let sum01 = item.sum ? item.sum : '';
              Deductions.push({
                profile_deduction_type_id,
                profile_deduction_type_name,
                deduction_amount,
                sum01,
              })
            });
            let sum02 = Deductions.map(function(item) {
              var remove = {
                sum: item.sum01
              };
              delete item.sum01;
              return remove;
            });
            sumObj = $(sum02)['prop']('sum'); // get the value of {sum:6000}
            console.log("sumObj", sumObj);
            console.log("Deductions", Deductions);

          }
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    })

    $('#sub_total').focusout(function() {
      if ($('#sub_total').val() == "") {
        $('#discount_amount').val('0.00');
      } else {
        let sub_total = $('#sub_total').val().replaceAll(',', '');
        $('#sub_total').val(PHP(sub_total).format());
      }
    })


    $('#quick_invoice').submit(function(e) {
      e.preventDefault();

      let profile_id = $('#selectProfile').val();
      let description = $('#description').val();
      let sub_total = $('#sub_total').val().replaceAll(',', '');
      let due_date = $('#due_date').val();

      converted_amount = parseFloat(((toRate / fromRate) * sub_total));
      converted_amount = PHP(converted_amount).format();
      converted_amount = converted_amount.replaceAll(',', '');

      // remove the column name array object  AND DEDUCTIONS
      // INVOIE ITEMS
      let invoiceItem = [];
      let item_description = $('#description').val();
      let item_qty = 1;
      let item_rate = $('#sub_total').val().replaceAll(',', '') ? $('#sub_total').val().replaceAll(
        ',', '') : 0;
      let item_total_amount = $('#sub_total').val().replaceAll(',', '') ? $('#sub_total').val()
        .replaceAll(
          ',', '') : 0;

      invoiceItem.push({
        item_description,
        item_rate,
        item_qty,
        item_total_amount,
      })

      let data = {
        profile_id: profile_id,
        description: description,
        sub_total: sub_total,
        peso_rate: peso_rate ? peso_rate : 0,
        converted_amount: converted_amount ? converted_amount : 0,
        grand_total_amount: parseFloat(converted_amount - sumObj),
        due_date: due_date,
        invoiceItem,
        Deductions,
      };
      console.log("DATA", data);
      axios.post(apiUrl + "/api/add_invoices", data, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          console.log("SUCCES", data.success);
          $('html,body').animate({
            scrollTop: $('#loader_load').offset().top
          }, 'slow');
          $("div.spanner").addClass("show");

          setTimeout(function() {
            $("div.spanner").removeClass("show");
            $('#quick_invoice').trigger('reset');
            $('.toast1 .toast-title').html('Create Invoices');
            $('.toast1 .toast-body').html(response.data.message);
            active_count_paid();
            active_count_pending();
            active_count_overdue();
            active_count_cancelled();
            pendingInvoices();
            overdueInvoices();
            getResults_Converted();
            // location.reload(true); // refresh the page
            due_date();
            toast1.toast('show');
          }, 1500)
        }
      }).catch(function(error) {
        console.log("ERROR", error);
        if (error.response.data.errors) {
          let errors = error.response.data.errors;
          console.log("errors", errors);
          let fieldnames = Object.keys(errors);

          Object.values(errors).map((item, index) => {
            fieldname = fieldnames[0].split('_');
            fieldname.map((item2, index2) => {
              fieldname['key'] = capitalize(item2);
              return ""
            });
            fieldname = fieldname.join(" ");

            $('.toast1 .toast-title').html(fieldname);
            $('.toast1 .toast-body').html(Object.values(errors)[
              0].join(
              "\n\r"));
          })
          setTimeout(function() {
            $('div.spanner').removeClass('show');
            toast1.toast('show');
          }, 1500);
        }
      });
    })

    function capitalize(s) {
      if (typeof s !== 'string') return "";
      return s.charAt(0).toUpperCase() + s.slice(1);
    }
  })
</script>
@endsection