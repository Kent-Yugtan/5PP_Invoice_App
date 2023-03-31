@extends('layouts.private')
@section('content-dashboard')

<div class="container-fluid px-4" id="loader_load">
  <h1 class="mt-4">Inactive Invoices</h1>
  <ol class="breadcrumb mb-4"></ol>
  <div class="row">
    <div class="col-12 col-md-6">
      <div class="card-hover card shadow p-2 mb-4 bg-white rounded">
        <div>
          <div class="row text-center py-3">
            <Label class="fs-1" id="paid_invoices">
            </Label>
          </div>
          <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Paid
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between"></div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card-hover card shadow p-2 mb-4 bg-white rounded">
        <div>
          <div class="row text-center py-3">
            <Label class="fs-1" id="pending_invoices">
            </Label>
          </div>
          <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Pending</div>
        </div>
        <div class="d-flex align-items-center justify-content-between"></div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="input-group has-search">
      <div class="col-4">
        <div class="form-group form-check-inline has-search" style="width:90%">
          <span class=" fa fa-search form-control-feedback"></span>
          <input id="search" name="search" type="text" class="form-control form-check-inline" placeholder="Search">
        </div>
      </div>

      <div class="col-4">
        <div class="form-group form-check-inline has-search" style="width:90%">
          <select class="form-select form-check-inline" id="filter_invoices">
            <option value="All">All</option>
            <option value="Paid">Paid</option>
            <option value="Pending">Pending</option>
            <option value="Overdue">Overdue</option>
          </select>
        </div>
      </div>

      <div class="col-4">
        <button type="button" class="btn w-100" style="color:white; background-color: #CF8029;width:30%" id="button-submit">Search</button>
      </div>
    </div>
  </div>

  <div class="row pt-3">
    <div class="col">
      <div class="card mb-5">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Inactive Invoices
        </div>
        <div class="card-body table-responsive">
          <table style="color: #A4A6B3; " class="table table-hover" id="dataTable_invoice">
            <thead>
              <tr>
                <th class="fit">Invoice #</th>
                <th class="fit">Profile Name</th>
                <th class="fit text-center">Payment Status</th>
                <th class="fit text-center">Invoice Status</th>
                <th class="fit text-end">Total Amount</th>
                <th class="fit text-end">Date Created</th>
                <th class="fit text-end">Due Date</th>
                <th class="text-center fit">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="row mx-3">
          <div class="col-xl-6">
            <div class="page_showing" id="tbl_showing_invoice"></div>
          </div>
          <div class="col-xl-6">
            <ul style="float:right" class="pagination pagination-sm flex-sm-wrap" id="tbl_pagination_invoice">
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- START MODAL UPDATE INVOICE STATUS -->
<div class="modal fade" id="invoice_status" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-body ">
          <div class="row">
            <h5>Update Invoice Status</h5>
            <form id="update_invoice_status">
              @csrf
              <input type="text" id="updateStatus_invoiceNo" hidden>
              <div class="form-floating form-group mt-3">
                <select class="form-select" id="select_invoice_status">
                  <option value="" Selected disabled>Please choose status</option>
                  <option value="Cancelled">Cancelled</option>
                  <option value="Overdue">Overdue</option>
                  <option value="Paid">Paid</option>
                  <option value="Pending">Pending</option>
                </select>
                <label for="updateStatus_invoiceNo">Status Name</label>
              </div>


              <div class="row mt-3">
                <div class="col">
                  <button type="button" class="btn  w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                </div>
                <div class="col">
                  <button type="submit" id="update" class="btn  w-100" style="color:White; background-color:#CF8029; ">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- START MODAL UPDATE INVOICE STATUS -->

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


<script type="text/javascript">
  $(document).ready(function() {
    // check_userInactiveStatusInvoice();
    $(window).on('load', function() {

      $('div.spanner').addClass('show');
      setTimeout(function() {
        $("div.spanner").removeClass("show");


        active_inactiveCount_paid();
        active_inactiveCount_pending();
        show_userstatusInactiveinvoice();
      }, 1500)
    })

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

    function active_inactiveCount_paid() {
      axios.get(apiUrl + '/api/statusInactive_paid_invoice_count', {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          // console.log("SUCCESS", data.data.length ? data.data.length : 0);
          $('#paid_invoices').html(data.data.length ? data.data.length : 0);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    function active_inactiveCount_pending() {
      axios.get(apiUrl + '/api/statusInactive_pending_invoice_count', {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          $('#pending_invoices').html(data.data.length ? data.data.length : 0);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    function search_statusInactive_invoice(filters) {
      let page = $("#tbl_pagination_invoice .page-item.active .page-link").html();
      let filter = {
        page_size: 10,
        page: page ? page : 1,
        search: $('#search').val() ? $('#search').val() : '',
        filter_all_invoices: $('#filter_invoices').val(),
        ...filters
      }
      // console.log("page", page);
      $('#dataTable_invoice tbody').empty();
      axios.get(`${apiUrl}/api/user/search_userstatusInactive_invoice?${new URLSearchParams(filter)}`, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          console.log("SHOW DATA", data);
          if (data.data.data.length > 0) {
            data.data.data.map((item) => {
              let newdate = new Date(item.created_at);
              var mm = newdate.getMonth() + 1;
              var dd = newdate.getDate();
              var yy = newdate.getFullYear();
              var due_date = item.due_date;
              var date_now = (new Date()).toISOString().split('T')[0];

              let due_date2 = new Date(item.due_date);
              var mm2 = due_date2.getMonth() + 1;
              var dd2 = due_date2.getDate();
              var yy2 = due_date2.getFullYear();

              let tr = '<tr style="vertical-align: middle;">';
              tr += '<td hidden>' + item.id + '</td>'
              tr += '<td >' +
                item.invoice_no +
                '</td>';
              tr += '<td>' +
                item.profile.user.first_name + " " + item.profile.user.last_name +
                '</td>';
              // console.log("due_date " + due_date + " date_now " + date_now);

              if (item.invoice_status === "Pending") {
                if (due_date < date_now) {
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
                      // show_userstatusInactiveinvoice();
                      location.reload(true);
                    }
                  }).catch(function(error) {
                    console.log("ERROR", error);
                  })
                }
              }

              if (item.invoice_status === "Cancelled") {
                if (due_date < date_now) {
                  let invoice_id = item.id;
                  let data = {
                    id: invoice_id,
                    invoice_status: "Cancelled",
                  }
                  axios.post(apiUrl + '/api/update_status', data, {
                    headers: {
                      Authorization: token
                    },
                  }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                      // show_userstatusInactiveinvoice();
                      location.reload(true);
                    }
                  }).catch(function(error) {
                    console.log("ERROR", error);
                  })
                }
              }

              if (item.invoice_status === "Cancelled") {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-info">' +
                  item.invoice_status + '</button></td>';

              } else if (item.invoice_status === "Paid") {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-success">' +
                  item.invoice_status + '</button></td>';

              } else if (item.invoice_status === "Pending") {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-warning" > ' +
                  item.invoice_status + '</button></td >';
              } else {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-danger">' +
                  item.invoice_status + '</button></td>';
              }

              tr += '<td class="text-center">' + item.status +
                '</td>'
              tr += '<td class="text-end">' + Number(
                  parseFloat(item
                    .grand_total_amount).toFixed(2))
                .toLocaleString(
                  'en', {
                    minimumFractionDigits: 2
                  }) +
                '</td>';
              tr += '<td class="text-end">' + moment.utc(item.created_at).tz(
                'Asia/Manila').format(
                'MM/DD/YYYY') + '</td>';
              tr += '<td class="text-end">' + moment.utc(item.due_date).tz(
                'Asia/Manila').format(
                'MM/DD/YYYY') + '</td>';

              tr +=
                '<td class="text-center"> <a href="' +
                apiUrl +
                '/user/editInvoice/' +
                item.id +
                '" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-eye"></i></a> </td>';
              tr += '</tr>';
              $("#dataTable_invoice tbody").append(tr);
              return ''
            })
            $('#tbl_pagination_invoice').empty();
            data.data.links.map(item => {
              let li =
                `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
              $('#tbl_pagination_invoice').append(li)
              return ""
            })

            $("#tbl_pagination_invoice .page-item .page-link").on('click', function() {

              $("#tbl_pagination_invoice .page-item").removeClass(
                'active');
              $(this).closest('.page-item').addClass('active');
              let url = $(this).data('url');

              $.urlParam = function(name) {
                var results = new RegExp("[?&]" + name +
                    "=([^&#]*)")
                  .exec(
                    url
                  );
                return results !== null ? results[1] || 0 :
                  0;
              };

              search_statusInactive_invoice({
                search: $('#search').val() ? $('#search').val() : '',
                page: $.urlParam('page')
              });
            })
            let tbl_showing_invoice =
              `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
            $('#tbl_showing_invoice').html(tbl_showing_invoice);
          } else {
            $("#dataTable_invoice tbody").append(
              '<tr><td colspan="8" class="text-center">No data</td></tr>'
            );
          }
        }
      }).catch(function(error) {
        console.log("ERROR DISPLAY", error);
      });
    }

    function show_userstatusInactiveinvoice(filters) {
      let page = $("#tbl_pagination_invoice .page-item.active .page-link").html();
      let filter = {
        page_size: 10,
        page: page ? page : 1,
        filter_all_invoices: $('#filter_invoices').val(),
        search: $("#search").val(),
        ...filters
      }
      // console.log("page", page);
      $('#dataTable_invoice tbody').empty();
      axios.get(`${apiUrl}/api/user/show_userstatusInactiveinvoice?${new URLSearchParams(filter)}`, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          console.log("SHOW DATA123", data);
          if (data.data.data.length > 0) {
            data.data.data.map((item) => {
              let newdate = new Date(item.created_at);
              var mm = newdate.getMonth() + 1;
              var dd = newdate.getDate();
              var yy = newdate.getFullYear();
              var due_date = item.due_date;
              var date_now = (new Date()).toISOString().split('T')[0];

              let due_date2 = new Date(item.due_date);
              var mm2 = due_date2.getMonth() + 1;
              var dd2 = due_date2.getDate();
              var yy2 = due_date2.getFullYear();

              let tr = '<tr style="vertical-align: middle;">';
              tr += '<td hidden>' + item.id + '</td>'
              tr += '<td >' +
                item.invoice_no +
                '</td>';
              tr += '<td>' +
                item.profile.user.first_name + " " + item.profile.user.last_name +
                '</td>';
              // console.log("due_date " + due_date + " date_now " + date_now);

              if (item.invoice_status === "Pending") {
                if (due_date < date_now) {
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
                      window.location.reload();
                    }
                  }).catch(function(error) {
                    console.log("ERROR", error);
                  })
                }
              }

              if (item.invoice_status === "Cancelled") {
                if (due_date < date_now) {
                  let invoice_id = item.id;
                  let data = {
                    id: invoice_id,
                    invoice_status: "Cancelled",
                  }
                  axios.post(apiUrl + '/api/update_status', data, {
                    headers: {
                      Authorization: token
                    },
                  }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                      window.location.reload();
                    }
                  }).catch(function(error) {
                    console.log("ERROR", error);
                  })
                }
              }

              if (item.invoice_status === "Cancelled") {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-info">' +
                  item.invoice_status + '</button></td>';

              } else if (item.invoice_status === "Paid") {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-success">' +
                  item.invoice_status + '</button></td>';

              } else if (item.invoice_status === "Pending") {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-warning" > ' +
                  item.invoice_status + '</button></td >';
              } else {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-danger">' +
                  item.invoice_status + '</button></td>';
              }

              tr += '<td class="text-center">' + item.status +
                '</td>'
              tr += '<td class="text-end">' + Number(
                  parseFloat(item
                    .grand_total_amount).toFixed(2))
                .toLocaleString(
                  'en', {
                    minimumFractionDigits: 2
                  }) +
                '</td>';
              tr += '<td class="text-end">' + moment.utc(item.created_at).tz(
                'Asia/Manila').format(
                'MM/DD/YYYY') + '</td>';
              tr += '<td class="text-end">' + moment.utc(item.due_date).tz(
                'Asia/Manila').format(
                'MM/DD/YYYY') + '</td>';

              tr +=
                '<td class="text-center"> <a href="' +
                apiUrl +
                '/user/editInvoice/' +
                item.id +
                '" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-eye"></i></a> </td>';
              tr += '</tr>';
              $("#dataTable_invoice tbody").append(tr);
              return ''
            })
            $('#tbl_pagination_invoice').empty();
            data.data.links.map(item => {
              let li =
                `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
              $('#tbl_pagination_invoice').append(li)
              return ""
            })

            $("#tbl_pagination_invoice .page-item .page-link").on('click', function() {

              $("#tbl_pagination_invoice .page-item").removeClass(
                'active');
              $(this).closest('.page-item').addClass('active');
              let url = $(this).data('url');

              $.urlParam = function(name) {
                var results = new RegExp("[?&]" + name +
                    "=([^&#]*)")
                  .exec(
                    url
                  );
                return results !== null ? results[1] || 0 :
                  0;
              };
              let search = $('#search').val();
              show_userstatusInactiveinvoice({
                search: search,
                page: $.urlParam('page')
              });
            })
            let tbl_showing_invoice =
              `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
            $('#tbl_showing_invoice').html(tbl_showing_invoice);
            // setTimeout(function() {
            //   show_userstatusInactiveinvoice();
            // }, 3500);
          } else {
            $("#dataTable_invoice tbody").append(
              '<tr><td colspan="8" class="text-center">No data</td></tr>'
            );
          }
        }
      }).catch(function(error) {
        console.log("ERROR DISPLAY", error);
      });
    }

    $('#filter_invoices').on('change', function() {
      let filter = $('#filter_invoices').val();
      $('html,body').animate({
        scrollTop: $('#sb-nav-fixed').offset().top
      }, 'slow');
      $('div.spanner').addClass('show');
      setTimeout(function() {
        $("div.spanner").removeClass("show");


        $('#tbl_pagination_invoice').empty();
        show_userstatusInactiveinvoice();
        $('html,body').animate({
          scrollTop: $('#sb-nav-fixed').offset().top
        }, 'slow');
      }, 1500)
    })

    $("#invoice_status").on('hide.bs.modal', function() {
      // window.location.reload();
      $("div.spanner").addClass("show");

      setTimeout(function() {
        $("div.spanner").removeClass("show");


        show_userstatusInactiveinvoice();
      }, 1500)
    });

    // SHOW CURRENT INVOICE STATUS
    $(document).on('click', '#dataTable_invoice #get_invoiceStatus', function(e) {
      e.preventDefault();
      let rowData = $(this).closest('tr');
      let invoice_no = rowData.find("td:eq(0)").text();
      $('#updateStatus_invoiceNo').val(invoice_no);
      console.log("INVOICE NO", invoice_no);

      axios.get(apiUrl + '/api/getInvoiceStatus/' + invoice_no, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          $('#select_invoice_status').val(data.data);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    })

    // POST INVOICE STATUS
    $('#update_invoice_status').submit(function(e) {
      e.preventDefault();


      var start = performance.now(); // Get the current timestamp
      // Do your processing here
      let invoice_id = $('#updateStatus_invoiceNo').val();
      let invoice_status = $('#select_invoice_status').val();

      let data = {
        id: invoice_id,
        invoice_status: invoice_status,
      };
      axios.post(apiUrl + '/api/update_status', data, {
        headers: {
          Authorization: token
        },
      }).then(function(response) {
        let data = response.data;
        console.log("DATA", data);
        if (data.success) {
          $('#invoice_status').modal('hide');
          $("div.spanner").addClass("show");

          setTimeout(function() {
            $("div.spanner").removeClass("show");


            toast1.toast('show');
            $('.toast1 .toast-title').html('Update Status');
            $('.toast1 .toast-body').html(response.data.message);
          }, 1500);


        }
      }).catch(function(error) {
        console.log("errors", error);
        if (error.response.data.errors) {
          let errors = error.response.data.errors;
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
            $('div.spanner').addClass('show');
            $('html,body').animate({
              scrollTop: $('#sb-nav-fixed').offset().top
            }, 'smooth');

            toast1.toast('show');
          }, 1500);
        }
      });

    });

    $('#button-submit').on('click', function(e) {
      e.preventDefault();
      $('html,body').animate({
        scrollTop: $('#sb-nav-fixed').offset().top
      }, 'slow');
      $("div.spanner").addClass("show");
      setTimeout(function() {
        let search = $('#search').val();
        $('#dataTable_invoice tbody').empty();
        $('#tbl_pagination_invoice').empty();
        search_statusInactive_invoice();
        $("div.spanner").removeClass("show");


      }, 1500)

    })
  })
</script>
@endsection