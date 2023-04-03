@extends('layouts.private')
@section('content-dashboard')
<div class="container-fluid px-4" id="loader_load">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
      <div class="row">
        <div class="col-xl-12 col-md-12 py-4">
          <span class="fs-3 fw-bold ">Inactive Profile</span>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-12 col-md-6 column1">
      <div>
        <div class="row text-center py-3">
          <Label class="fs-1" id="paid_invoices">
            0
          </Label>
        </div>
        <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Paid</div>
      </div>
    </div>

    <div class="col-12 col-md-6 column2">
      <div>
        <div class="row text-center py-3">
          <Label class="fs-1" id="pending_invoices">
            0
          </Label>
        </div>
        <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Pending</div>
      </div>
      <div class="d-flex align-items-center justify-content-between"></div>
    </div>
  </div>

  <div class="row ">
    <div class="col-sm-8 mb-3">
      <div class="w-100">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" style="height:38px;background-color: white;color: #CF8029;border-right:none"><i class="fas fa-search"></i></span>
          </div>
          <input id="search" name="search" type="text" class="form-control form-check-inline" style="margin-right: 1px;border-radius: 0.25em;" placeholder="Search">
        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
      <button class="btn w-100" style="color:white; background-color: #CF8029" id="button-submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
    </div>
  </div>

  <div class="row pb-4">
    <div class="col-12">
      <div class="card-border shadow p-2 bg-white h-100">
        <div class="card-body">

          <div id="tbl_user_wrapper" class="table-responsive">
            <table style=" color: #A4A6B3; " class="table table-hover" id="tbl_user">
              <thead>
                <tr>
                  <th class="fit">User</th>
                  <th class="fit">Status</th>
                  <th class="fit">Phone Number</th>
                  <th class="fit">Position</th>
                  <th class="fit">Latest Invoice</th>
                  <th class="fit text-center">Action</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
          <div class="row pt-3">
            <div class="col" style="display: flex; align-content: stretch; justify-content: space-between;">
              <div style="margin-top: 10px;" class="page_showing" id="tbl_user_showing"></div>
              <ul style="display:flex;align-items:center" class="pagination pagination-sm flex-sm-wrap" id="tbl_user_pagination">
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {

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

    $(window).on('load', function() {
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");


        inactive_count_paid();
        inactive_count_pending();
        show_data();
      }, 1500)
    })

    function inactive_count_paid() {
      axios.get(apiUrl + '/api/inactive_paid_invoice_count', {
        headers: {
          Authorization: token
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          console.log("SUCCESS", data);
          $('#paid_invoices').html(data.data.length ? data.data.length : 0)
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    function inactive_count_pending() {
      axios.get(apiUrl + '/api/inactive_pending_invoice_count', {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          console.log("SUCCESS", data);
          $('#pending_invoices').html(data.data.length ? data.data.length : 0);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    $('#button-submit').on('click', function(e) {
      e.preventDefault();
      $('html,body').animate({
        scrollTop: $('#sb-nav-fixed').offset().top
      }, 'slow');
      $("div.spanner").addClass("show");
      setTimeout(function() {
        let search = $('#search').val();
        $('#tbl_user_pagination').empty();
        show_data();
        $("div.spanner").removeClass("show");


      }, 1500)


    })

    function show_data(filters) {
      let filter = {
        page_size: 5,
        page: 1,
        search: $('#search').val(),
        ...filters,
      }
      $('#tbl_user tbody').empty();
      axios
        .get(`${apiUrl}/api/admin/show_data_inactive?${new URLSearchParams(filter)}`, {
          headers: {
            Authorization: token,
          },
        })
        .then(function(res) {
          res = res.data;
          console.log('res', res);
          if (res.success) {
            if (res.data.data.length > 0) {
              res.data.data.map((item) => {
                let tr = '<tr style="vertical-align:middle;">';
                if (item.file_path) {
                  tr += '<td><div class="row ps-3 w-100" style="align-items:center"><div class="col-sm-2" style="display:flex;justify-content:center;align-items:center;"><img style="height:40px;width:40px" class="rounded-pill" src="' + item.file_path + '">&nbsp;</div><div class="col-sm-10">' + item.full_name + '</div></div></td>';
                } else {
                  tr += '<td><div class="row ps-3 w-100" style="align-items:center"><div class="col-sm-2" style="display:flex;justify-content:center;align-items:center;"><img style="height:40px;width:40px" class="rounded-pill" src="' + item.file_path + '">&nbsp;</div><div class="col-sm-10">' + item.full_name + '</div></div></td>';
                }
                tr += '<td>' + item.profile_status + '</td>';
                tr += '<td>' + item.phone_number + '</td>';
                tr += '<td>' + item.position + '</td>';
                if (item.profile.invoice.length > 0) {
                  let latest_invoice = item.profile.invoice[item.profile.invoice
                    .length - 1]
                  var date_1 = new Date(latest_invoice.created_at);
                  var todate1 = new Date(date_1).getDate();
                  var tomonth1 = new Date(date_1).getMonth() + 1;
                  var toyear1 = new Date(date_1).getFullYear();
                  var from = tomonth1 + '/' + todate1 + '/' + toyear1;

                  var date_2 = new Date();
                  var todate2 = new Date(date_2).getDate();
                  var tomonth2 = new Date(date_2).getMonth() + 1;
                  var toyear2 = new Date(date_2).getFullYear();
                  var to = tomonth2 + '/' + todate2 + '/' + toyear2;

                  var diff = date_2 - date_1;
                  diff = diff / (1000 * 3600 * 24);
                  // console.log("DIFF", Math.round(diff));
                  tr += '<td>' + Math.round(diff ? diff : 0) +
                    ' Days ago</td>';

                  tr +=
                    '<td  class="text-center"> <a href="' + apiUrl +
                    '/admin/inactiveProfile/' +
                    item.id + "/" + item.profile.id +
                    '" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-eye"></i></a> </td>';

                  tr += '</tr>';
                  $(
                    "#tbl_user tbody").append(tr);

                } else {
                  let tr = '<tr style="vertical-align:middle;">';
                  if (item.file_path) {
                    tr += '<td><div class="row ps-3 w-100" style="align-items:center"><div class="col-sm-2" style="display:flex;justify-content:center;align-items:center;"><img style="height:40px;width:40px" class="rounded-pill" src="' + item.file_path + '">&nbsp;</div><div class="col-sm-10">' + item.full_name + '</div></div></td>';
                  } else {
                    tr += '<td><div class="row ps-3 w-100" style="align-items:center"><div class="col-sm-2" style="display:flex;justify-content:center;align-items:center;"><img style="height:40px;width:40px" class="rounded-pill" src="' + item.file_path + '">&nbsp;</div><div class="col-sm-10">' + item.full_name + '</div></div></td>';
                  }
                  tr += '<td>' + item.profile_status + '</td>';
                  tr += '<td>' + item
                    .phone_number + '</td>';
                  tr += '<td>' + item.position + '</td>';
                  tr += '<td> No Latest Invoice</td>';

                  tr +=
                    '<td  class="text-center"> <a href="' + apiUrl +
                    '/admin/inactiveProfile/' +
                    item.id + "/" + item.profile.id +
                    '" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-eye"></i></a> </td>';

                  tr += '</tr>';
                  $("#tbl_user tbody").append(tr);
                }
                return ''
              })

              res.data.links.map(item => {
                let li =
                  `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
                $('#tbl_user_pagination').append(li)
                return ""
              })

              if (res.data.links.length) {
                let lastPage = res.data.links[res.data.links.length - 1];
                if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                  $('#tbl_user_pagination .page-item:last-child').addClass('disabled');
                }
                let PreviousPage = res.data.links[0];
                if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url == null) {
                  $('#tbl_user_pagination .page-item:first-child').addClass('disabled');
                }
              }

              $("#tbl_user_pagination .page-item .page-link").on('click', function() {
                let url = $(this).data('url')
                $.urlParam = function(name) {
                  var results = new RegExp("[?&]" + name + "=([^&#]*)").exec(
                    url
                  );

                  return results !== null ? results[1] || 0 : 0;
                };
                let search = $('#search').val();
                show_data({
                  search: search,
                  page: $.urlParam('page')
                });
              })

              let tbl_user_showing =
                `Showing ${res.data.from} to ${res.data.to} of ${res.data.total} entries`;
              $('#tbl_user_showing').html(tbl_user_showing);
            } else {
              $("#tbl_user tbody").append(
                '<tr><td colspan="6" class="text-center">No data</td></tr>');
              let tbl_user_showing =
                `Showing 0 to 0 of 0 entries`;
              $('#tbl_user_showing').html(tbl_user_showing);
            }
          }
        })
        .catch(function(error) {
          console.log("catch error", error);
        });
    }

  });
</script>
@endsection