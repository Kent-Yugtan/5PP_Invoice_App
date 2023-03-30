@extends('layouts.private')
@section('content-dashboard')
<div class="container-fluid px-4 pb-4" id="loader_load">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
      <!-- <div class="card shadow p-2 mb-1 bg-white rounded">  -->
      <!-- <div class="card-header"> -->
      <!-- <i style="color:#CF8029" class="fas fa-users"></i>  -->
      <div class="row">
        <div class="col-xl-12 col-md-12 py-4">
          <span class="fs-3 fw-bold ">Deductions</span>
        </div>
      </div>
      <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>


  <div class="row">
    <div class="col-xs-5 col-sm-12 col-md-12 col-lg-6 px-2">
      <div class="row">
        <div class="col-sm-12 mb-3">
          <button class="btn w-100" style="color:white; background-color: #CF8029;" data-bs-toggle="modal"
            data-bs-target="#addModal" type="submit" id="button-addon2">
            <i class="fa fa-plus pe-1"></i>
            Add Deduction Type
          </button>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-6">
          <div class="w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"
                  style="height:38px;background-color: white;color: #CF8029;border-right:none"><i
                    class="fas fa-search"></i></span>
              </div>
              <input id="search" type="text" class="form-control" placeholder="Search">
            </div>
          </div>
        </div>
        <div class="col-6">
          <button type="submit" class="btn w-100" style="color:white; background-color: #CF8029" id="button_search">
            <i class="fas fa-search"></i> Search
          </button>
        </div>
      </div>

      <div class="row ">
        <div class="col-sm-12">
          <div class="card-border shadow mb-1 p-2 bg-white h-100">
            <div class="card-body table-responsive">
              <table style="color: #A4A6B3;" class="table" id="table_deduction">
                <thead>
                  <th style="width:100px">Deduction Name</th>
                  <th style="width:100px" class="text-end">Amount</th>
                  <th colspan="2" class="text-center w-5">Action</th>
                </thead>
                <tbody></tbody>
              </table>
            </div>
            <div class="row">
              <div class="col" style="margin-left:16px">
                <div style="margin-top: 15px;" class="page_showing" id="tbl_showing"></div>
              </div>
            </div>
            <div class="row mx-1">
              <div class="col">
                <ul style="display:flex;justify-content:flex-start;" class="pagination pagination-sm flex-sm-wrap"
                  id="tbl_pagination">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- START MODAL ADD -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="hide-content">
      <div class="modal-body ">
        <div class="row">
          <form id="deductiontype_store">
            @csrf
            <div class="card-border shadow mb-1 p-2 bg-white h-100">
              <div class="row px-4 py-4" id="header">
                <div class="col-md-12 px-2 w-100">
                  <div class="row">
                    <div class="col mb-3">
                      <span class="fs-3 fw-bold">Add Deduction</span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 mb-3">
                      <label for="deduction_name">Deduction Name</label>
                      <input id="deduction_name" name="deduction_name" type="text" class="form-control"
                        placeholder="Deduction Name">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 mb-3">
                      <label for="deduction_amount">Amount</label>
                      <input id="deduction_amount" name="deduction_amount" type="text" class="form-control"
                        placeholder="Amount">
                    </div>
                  </div>

                  <div class="row pt-3">
                    <div class="col">
                      <button type="button" id="close" class="btn  w-100"
                        style="color:white; background-color:#A4A6B3; ">Close</button>
                    </div>
                    <div class="col">
                      <button type="submit" class="btn  w-100"
                        style="color:White; background-color:#CF8029; ">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL ADD -->

<!-- START MODAL EDIT -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="hide-content ">
      <div class="modal-body ">
        <form id="deductiontype_update">
          @csrf
          <div class="card-border shadow mb-1 p-2 bg-white h-100">
            <div class="row px-4 py-4" id="header">
              <div class="col-md-12 px-2 w-100">
                <div class="row">
                  <div class="col mb-3">
                    <span class="fs-3 fw-bold">Update Deduction Type </span>
                  </div>
                </div>
                <input type="text" id="deduction_id" hidden>

                <div class="row">
                  <div class="col mb-3">
                    <label for="edit_deduction_name" style="color:#A4A6B3">Deduction Name</label>
                    <input id="edit_deduction_name" type="text" class="form-control" placeholder="Deduction Name">
                  </div>
                </div>

                <div class="row">
                  <div class="col mb-3">
                    <label for="edit_deduction_amount" style="color:#A4A6B3">Amount</label>
                    <input id="edit_deduction_amount" type="text" class="form-control" placeholder="Amount">
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col">
                    <button type="button" class="btn  w-100" style=" color:white; background-color:#A4A6B3; "
                      data-bs-dismiss="modal">Close</button>
                  </div>
                  <div class="col">
                    <button type="submit" class="btn  w-100"
                      style="color:White; background-color:#CF8029; ">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL EDIT -->
<div style="position: fixed; top: 60px; right: 20px; z-index:9999;">
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

<!-- Modal FOR DELETE -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <div class="row">
          <div class="col">
            <span>
              <img class="img-team" src="{{ URL('images/Delete.png')}}" style="width: 50%; padding:10px" />
            </span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span>
              <h3> Are you sure?</h3>
            </span>
          </div>
        </div>
        <div class="row pt-3 px-3">
          <div class="col">
            <span id="deductionType_id" hidden></span>
            <span class="text-muted"> Do you really want to delete these record? This process cannot be
              undone.</span>
          </div>
        </div>

        <div class="row pt-3 pb-3 px-3">
          <div class="col-6">
            <button type="button" class="btn  w-100" data-bs-dismiss="modal">Cancel</button>
          </div>
          <div class="col-6">
            <button type="button" id="deductionType_delete" class="btn btn-danger w-100">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="spanner" style="z-index: 9999;">
  <div class="loader"></div>
</div>
<script type="text/javascript">
const PHP = value => currency(value, {
  symbol: '',
  decimal: '.',
  separator: ','
});
$(document).ready(function() {
  // Get the current page's URL path
  var path = window.location.pathname;
  // Highlight the corresponding menu item
  var segments = path.split('/');
  $('#' + segments[1] + segments[2]).addClass('active');
  console.log("SEGMENT", segments[1] + segments[2]);

  $(window).on('load', function() {
    $('div.spanner').addClass('show');
    setTimeout(function() {
      $('div.spanner').removeClass('show');
      show_data();
    }, 1500);
  })


  $(document).on('click', '#button_search', function() {
    $('html,body').animate({
      scrollTop: $('#loader_load').offset().top
    }, 'slow');
    $('div.spanner').addClass('show');
    setTimeout(function() {
      $('div.spanner').removeClass('show');
      $('#tbl_pagination').empty();
      let search = $('#search').val() ? $('#search').val() : '';

      show_data();
    }, 1500);
  })

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

  function show_data(filters) {
    let filter = {
      page_size: 5,
      page: 1,
      search: $('#search').val() ? $('#search').val() : '',
      ...filters,
    }
    $('#table_deduction tbody').empty();
    axios.get(`${apiUrl}/api/settings/show_data?${new URLSearchParams(filter)}`, {
        headers: {
          Authorization: token,
        },
      })
      .then(function(res) {
        res = res.data;
        console.log("RES123", res);
        if (res.success) {
          if (res.data.data.length > 0) {
            res.data.data.map((item) => {
              let tr = '<tr style="vertical-align: middle;">';
              tr += '<td >' + item.deduction_name +
                '</td>';
              tr += '<td class="text-end">' + PHP(
                item
                .deduction_amount).format()
              '</td>';
              tr +=
                '<td class="text-center"> <button value=' +
                item.id +
                ' class="editButton btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal" ><i class="fa-solid fa-pen-to-square"></i></button></td>';
              tr += '<td class="text-center"><button value=' +
                item.id +
                ' class="deleteButton btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fa-solid fa-trash"></i></button></td>';
              tr += '</tr>';
              $("#table_deduction tbody").append(tr);

              return ''
            })

            $('#tbl_pagination').empty();
            res.data.links.map(item => {
              let li =
                `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
              $('#tbl_pagination').append(li);
              return '';
            })

            if (res.data.links.length) {
              let lastPage = res.data.links[res.data.links.length - 1];
              if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                $('#tbl_pagination .page-item:last-child').addClass('disabled');
              }
              let PreviousPage = res.data.links[0];
              if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url == null) {
                $('#tbl_pagination .page-item:first-child').addClass('disabled');
              }
            }


            $("#tbl_pagination .page-item .page-link").on('click', function() {
              let url = $(this).data('url')
              $.urlParam = function(name) {
                var results = new RegExp("[?&]" + name + "=([^&#]*)").exec(
                  url
                );

                return results !== null ? results[1] || 0 : 0;
              };

              let search = $('#search').val() ? $('#search').val() : '';
              show_data({
                search: search,
                page: $.urlParam('page')
              });
            })

            let tbl_user_showing =
              `Showing ${res.data.from} to ${res.data.to} of ${res.data.total} entries`;
            $('#tbl_showing').html(tbl_user_showing);
          } else {
            $("#table_deduction tbody").append(
              '<tr><td colspan="6" class="text-center">No data</td></tr>');
          }
        }
      })
      .catch(function(error) {
        console.log("catch error", error);
      });
  }

  $('#close').on('click', function(e) {
    e.preventDefault();
    $('#deductiontype_store').trigger('reset');
    $('#addModal').modal('hide');
  })

  $("#addModal").on('hide.bs.modal', function() {
    // window.location.reload();
    // // show_data();
    $("div.spanner").addClass("show");
    setTimeout(function() {
      $("div.spanner").removeClass("show");
    }, 1500)
  });

  $("#editModal").on('hide.bs.modal', function() {
    $("div.spanner").addClass("show");
    setTimeout(function() {
      $("div.spanner").removeClass("show");
    }, 1500)
  });

  $('#deductiontype_store').submit(function(e) {
    e.preventDefault();
    let deduction_name = $("#deduction_name").val();
    let deduction_amount = $("#deduction_amount").val().replaceAll(',', '');

    let data = {
      deduction_name: deduction_name,
      deduction_amount: deduction_amount,
    };
    axios
      .post(apiUrl + "/api/savedeductiontype", data, {
        headers: {
          Authorization: token,
        },
      })
      .then(function(response) {
        let data = response.data;
        if (data.success) {
          $('div.spanner').addClass('show');
          setTimeout(function() {
            $('#addModal').modal('hide');
            $('div.spanner').removeClass('show');
            $('#deduction_name').val('');
            $('#deduction_amount').val('');
            $('input').removeClass('is-invalid');
            $('.invalid-feedback').remove();
            show_data();
            // $('.toast1 .toast-title').html('Deduction Types');
            // $('.toast1 .toast-body').html(response.data.message);
            // toast1.toast('show');
          }, 1500)
        }
      })
      .catch(function(error) {
        console.log("error.response.data.errors", error.response.data.errors);
        if (error.response.data.errors) {
          $('input').removeClass('is-invalid');
          $('.invalid-feedback').remove();
          var errors = error.response.data.errors;
          var errorContainer = $('#error-container');
          errorContainer.empty();
          console.log("errors", errors)

          for (var key in errors) {
            var inputName = key.replace('_', ' ');
            inputName = inputName.charAt(0).toUpperCase() + inputName.slice(1);
            var errorMsg = errors[key][0];
            $('#' + key).addClass('is-invalid');
            $('#' + key).parent().append(
              '<span class="invalid-feedback">This field is required or already been taken.</span>');
          }
        } else {
          $('input').removeClass('is-invalid');
          $('.invalid-feedback').remove();
        }
        // console.log("ERROR", error);
        // if (error.response.data.errors) {
        //   let errors = error.response.data.errors;
        //   let fieldnames = Object.keys(errors);
        //   Object.values(errors).map((item, index) => {
        //     fieldname = fieldnames[0].split('_');
        //     fieldname.map((item2, index2) => {
        //       fieldname['key'] = capitalize(item2);
        //       return ""
        //     });
        //     fieldname = fieldname.join(" ");
        //     $('.toast1 .toast-title').html(fieldname);
        //     $('.toast1 .toast-body').html(Object.values(errors)[0].join(
        //       "\n\r"));
        //   })
        //   setTimeout(function() {
        //     $('div.spanner').removeClass('show');
        //     toast1.toast('show');
        //   }, 1500);
        // }
      });


  })

  $('#deduction_amount').focusout(function() {
    if ($(this).val().length > 0) {
      let amount = $(this).val();
      $('#deduction_amount').val(PHP(amount).format());
    }
  })
  $('#edit_deduction_amount').focusout(function() {
    if ($(this).val().length > 0) {
      let amount = $(this).val();
      $('#edit_deduction_amount').val(PHP(amount).format());
    }
  })

  $(document).on('click', '.editButton', function(e) {
    e.preventDefault();
    let id = $(this).val();
    $('#deduction_id').val(id);

    axios
      .get(apiUrl + '/api/settings/show_edit/' + id, {
        headers: {
          Authorization: token,
        },
      })
      .then(function(response) {
        let data = response.data;
        // console.log("SUCCESS", data.data);
        if (data.success) {

          $('#edit_deduction_name').val(data.data.deduction_name);
          $('#edit_deduction_amount').val(PHP(data.data.deduction_amount).format());

        } else {
          console.log("ERROR");
        }

      }).catch(function(error) {
        console.log("ERROR", error);
      });
  })

  $('#deductiontype_update').submit(function(e) {
    e.preventDefault();
    let deduction_id = $('#deduction_id').val();
    let deduction_name = $("#edit_deduction_name").val();
    let deduction_amount = $("#edit_deduction_amount").val().replaceAll(',', '');

    let data = {
      id: deduction_id,
      deduction_name: deduction_name,
      deduction_amount: deduction_amount,
    };

    axios
      .post(apiUrl + "/api/savedeductiontype", data, {
        headers: {
          Authorization: token,
        },
      })
      .then(function(response) {
        // console.log("then", response.data.success);
        let data = response.data;
        if (data.success) {
          $('#editModal').modal('hide');
          $('html,body').animate({
            scrollTop: $('#loader_load').offset().top
          }, 'slow');
          $('#edit_deduction_name').val('');
          $('#edit_deduction_amount').val('');
          $('div.spanner').addClass('show');
          setTimeout(function() {
            $('div.spanner').removeClass('show');
            $('.toast1 .toast-title').html('Success');
            $('.toast1 .toast-body').html(response.data.message);
            toast1.toast('show');
            show_data();
          }, 1500)
        }
      })
      .catch(function(error) {
        if (error.response.data.errors) {
          let errors = error.response.data.errors;
          console.log("error", errors);
          let fieldnames = Object.keys(errors);
          Object.values(errors).map((item, index) => {
            fieldname = fieldnames[0].split('_');
            fieldname.map((item2, index2) => {
              fieldname['key'] = capitalize(item2);
              return ""
            });
            fieldname = fieldname.join(" ");
            $('.toast1 .toast-title').html("Error");
            $('.toast1 .toast-body').html(Object.values(errors)[0].join(
              "\n\r"));
          })
          toast1.toast('show');
        }
      });
  })


  function capitalize(s) {
    if (typeof s !== 'string') return "";
    return s.charAt(0).toUpperCase() + s.slice(1);
  }

  $(document).on('click', '#table_deduction .deleteButton', function(
    e) {
    e.preventDefault();
    let row = $(this).closest("td");
    let deductionType_id = row.find(".deleteButton").val();
    $("#deductionType_id").html(deductionType_id);
  })

  $('#deductionType_delete').on('click', function(e) {
    e.preventDefault();

    let deductionType_id = $('#deductionType_id').html();
    axios.post(apiUrl + '/api/deleteDeductionType/' + deductionType_id, {}, {
      headers: {
        Authorization: token,
      },
    }).then(function(response) {
      let data = response.data
      if (data.success) {
        $('#deleteModal').modal('hide');
        $('html,body').animate({
          scrollTop: $('#loader_load').offset().top
        }, 'smooth');
        $('div.spanner').addClass('show');
        setTimeout(function() {
          $('div.spanner').removeClass('show');
          $('.toast1 .toast-title').html('Success');
          $('.toast1 .toast-body').html(response.data.message);
          toast1.toast('show');
          show_data();
        }, 1500);
      }
    }).catch(function(error) {
      console.log("ERROR", error);
    });
  });
});
</script>
@endsection