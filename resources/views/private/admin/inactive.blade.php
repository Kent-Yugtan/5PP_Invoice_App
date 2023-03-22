@extends('layouts.private')
@section('content-dashboard')
<div class="container-fluid px-4" id="loader_load">
  <h1 class="mt-4">Inactive Profiles</h1>
  <ol class="breadcrumb mb-4"></ol>

  <div class="row">
    <div class="col-12 col-md-6">
      <div class="card-hover card shadow p-2 mb-4 bg-white rounded">
        <div>
          <div class="row text-center py-3">
            <Label class="fs-1" id="paid_invoices">
            </Label>
          </div>
          <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Paid</div>
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
    <div class="col ">
      <div class="input-group ">
        <input id="search" name="search" type="text" class="form-control form-check-inline" placeholder="Search">
        <button class="btn" style=" color:white; background-color: #CF8029;width:30%" id="button-submit">Search</button>
      </div>
    </div>
  </div>

  <div class="row pt-3">
    <div class="col">
      <div class="card mb-5">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Inactive Profile
        </div>
        <div id="tbl_user_wrapper" class="card-body table-responsive">
          <table style=" color: #A4A6B3; " class="table table-hover" id="tbl_user">
            <thead>
              <tr>
                <th>User</th>
                <th>Status</th>
                <th>Phone Number</th>
                <th>Position</th>
                <th>Latest Invoice</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

        </div>
        <div class="row mx-3">
          <div class="col-xl-6">
            <div class="page_showing" id="tbl_user_showing"></div>
          </div>
          <div class="col-xl-6">
            <ul style="float:right" class="pagination pagination-sm flex-sm-wrap" id="tbl_user_pagination">
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- LOADER SPINNER -->
<div class="spanner">
  <div class="loader"></div>
</div>

<script type="text/javascript">
$(document).ready(function() {

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
      scrollTop: $('#loader_load').offset().top
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
              let tr = '<tr>';

              if (item.file_path) {
                tr +=
                  '<td><div class="profile-pic-div_adminProfile-wrapper"> <img style="height:40px;width:40px;" class="rounded-pill " src ="' +
                  item
                  .file_path + '">&nbsp;' + item.full_name + '</div></td>';
              } else {
                tr +=
                  '<td><div class="profile-pic-div_adminProfile-wrapper"> <img style="height:40px;width:40px;" class="rounded-pill" src ="/images/default.png">&nbsp;' +
                  item.full_name + '</div></td>';
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
                let tr = '<tr style="vertical-align:sub;">';
                if (item.file_path) {
                  tr +=
                    '<td><div class="profile-pic-div_adminProfile-wrapper"> <img style="height:40px;width:40px;" class="rounded-pill " src ="' +
                    item
                    .file_path + '">&nbsp;' + item.full_name + '</div></td>';
                } else {
                  tr +=
                    '<td><div class="profile-pic-div_adminProfile-wrapper"> <img style="height:40px;width:40px;" class="rounded-pill" src ="/images/default.png">&nbsp;' +
                    item.full_name + '</div></td>';
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

            $('#tbl_user_pagination').empty();
            res.data.links.map(item => {
              let li =
                `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
              $('#tbl_user_pagination').append(li)
              return ""
            })

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
          }
        }
      })
      .catch(function(error) {
        // console.log("catch error");
      });
  }

});
</script>
@endsection