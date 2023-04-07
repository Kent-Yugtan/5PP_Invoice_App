@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">
        <div class="row" style="padding-top:10px">
            <div class="col-sm-12 col-md-12 col-lg-4 bottom10" style="padding-right:5px;padding-left:5px">
                <div class="card-border shadow bg-white h-100" style="padding:20px">
                    <div class="card-body">
                        <div class="header fs-3">
                            <label> Invoice Information</label>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <form name="invoiceconfigs_store" id="invoiceconfigs_store" method="post"
                                    action="javascript:void(0)">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 bottom20">
                                            <label for="invoice_logo" style="color: #A4A6B3;">Invoice Logo</label>
                                            <input class="form-control" id="invoice_logo" name="invoice_logo"
                                                type="file">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 bottom20">
                                            <label for="invoice_title" style="color: #A4A6B3;">Invoice Title</label>
                                            <input id="invoice_title" name="invoice_title" type="text"
                                                class="form-control" placeholder="Invoice Title">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 bottom20">
                                            <label for="invoice_email" style="color: #A4A6B3;">Invoice Email</label>
                                            <input id="invoice_email" name="invoice_email" type="text"
                                                class="form-control" placeholder="Invoice Email">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 bottom20">
                                            <label for="bill_to_address" style="color: #A4A6B3;">Bill From Address</label>
                                            <input id="bill_to_address" name="bill_to_address" type="text"
                                                class="form-control" placeholder="Bill from Address">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" id="close"
                                                style="width:100%; color:white; background-color: #A4A6B3;"
                                                class="btn">Close</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit"
                                                style="width:100%; color:white; background-color: #CF8029;"
                                                class="btn ">Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-8 bottom10" style="padding-right:5px;padding-left:5px">
                <div class="card-border shadow bg-white h-100" style="padding:20px">
                    <div class="card-body ">
                        <div class="header bottom20" style="padding-left:5px">
                            <span class="fs-3"> View Invoice Information</span>
                        </div>
                        <div class="row">
                            <div class="col" style="padding-right:8px;padding-left:8px;">
                                <div class="table-responsive" id="tbl_invoiceConfig_wrapper">
                                    <table style="color: #A4A6B3;" class="table table-hover table-responsive"
                                        id="table_invoiceconfig">
                                        <thead>
                                            <th class="fit">Invoice Title</th>
                                            <th class="fit">Invoice Email</th>
                                            <th class="fit">Bill from Address</th>
                                            <th class="fit text-center" colspan="2">Action</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div style="display:flex;justify-content:center;" class="page_showing pagination-alignment "
                            id="tbl_showing"></div>
                        <div class="pagination-alignment" style="display:flex;justify-content:center;">
                            <ul style="display:flex;justify-content:flex-start;margin-top:15px"
                                class="pagination pagination-sm flex-sm-wrap" id="tbl_pagination">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="hide-content">
                    <div class="modal-body ">
                        <form id="invoice_config_update">
                            @csrf

                            <div class="card-border shadow p-2 bg-white h-100">
                                <div class="row px-4 py-4 " id="header">
                                    <div class="col-md-12 w-100">
                                        <div class="row">
                                            <div class="col">
                                                <span class="fs-3 fw-bold"> Update Email Configuration</span>
                                            </div>
                                        </div>

                                        <input type="text" id="invoice_config_id" hidden>

                                        <div class="row">
                                            <div class="col-12 bottom20 mt-3">
                                                <input class="form-control" id="edit_invoice_logo"
                                                    name="edit_invoice_logo" type="file">
                                                <div style="margin-left: 5px;" id="edit_invoice_path"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 bottom20">
                                                <label for="edit_invoice_title" style="color:#A4A6B3">Invoice
                                                    Title</label>
                                                <input id="edit_invoice_title" name="edit_invoice_title" type="text"
                                                    class="form-control" placeholder="Invoice Title">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 bottom20">
                                                <label for="edit_invoice_email" style="color:#A4A6B3">Invoice
                                                    Email</label>
                                                <input id="edit_invoice_email" name="edit_invoice_email" type=" text"
                                                    class="form-control" placeholder="Invoice Email">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 bottom20">
                                                <label for="edit_to_bill" style="color:#A4A6B3">Bill from Address</label>
                                                <input id="edit_to_bill" name="edit_to_bill" type=" text"
                                                    class="form-control" placeholder="Bill from Address">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="btn w-100"
                                                    style=" color:white; background-color:#A4A6B3;"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn w-100"
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
    </div>

    <div style="position: fixed; top: 60px; right: 20px;z-index:9999;">
        <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div id='notifyIcon'></div>
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
                                <img class="" src="{{ URL('images/Delete.png') }}"
                                    style="width: 50%; padding:10px" />
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
                            <span id="invoiceConfig_id" hidden></span>
                            <span class="text-muted"> Do you really want to delete these record? This process cannot be
                                undone.</span>
                        </div>
                    </div>

                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn w-100" style="color:white; background-color:#A4A6B3;"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="invoiceConfig_delete"
                                class="btn btn-danger w-100">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {


            var currentPage = window.location.href;
            $('#collapseLayouts4 a').each(function() {
                // Compare the href attribute of the link to the current page URL
                if (currentPage.indexOf($(this).attr('href')) !== -1) {
                    // If there is a match, add the "active" class to the link
                    $(this).addClass('active');

                    // Trigger a click event on the parent link to expand the collapsed section
                    $(this).parent().parent().addClass("show");
                    $(this).parent().parent().addClass("active");
                    $('[data-bs-target="#collapseLayouts4"]').addClass('active');
                }
            });

            $(window).on('load', function() {
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    show_data();
                }, 1500)
            })
            let toast1 = $('.toast1');

            $('#editModal').on('hide.bs.modal', function() {
                $('html,body').animate({
                    scrollTop: $('#sb-nav-fixed').offset().top
                }, 'slow');
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    show_data();
                }, 1500)
            })

            $('#button_search').on('click', function() {
                $('html,body').animate({
                    scrollTop: $('#sb-nav-fixed').offset().top
                }, 'slow');
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    let search = $('#search').val();
                    show_data({
                        search
                    });
                }, 1500)

            })

            $('#close').on('click', function(e) {
                e.preventDefault();
                $("div.spanner").addClass("show");

                setTimeout(function() {
                    $("div.spanner").removeClass("show");


                    $('#invoiceconfigs_store').trigger("reset");
                }, 1500)
            })

            toast1.toast({
                delay: 5000,
                animation: true
            });

            $('.close').on('click', function(e) {
                e.preventDefault();
                toast1.toast('hide');
            })

            $("#error_msg").hide();
            $("#success_msg").hide();



            // CLICK TO UPDATE
            $('#invoice_config_update').on('submit', function(e) {
                e.preventDefault();

                let invoice_config_id = $('#invoice_config_id').val();
                let edit_invoice_title = $('#edit_invoice_title').val();
                let edit_invoice_email = $('#edit_invoice_email').val();
                let edit_bill_to_address = $('#edit_to_bill').val();

                let formData = new FormData();
                formData.append('id', invoice_config_id);
                formData.append('invoice_title', edit_invoice_title);
                formData.append('invoice_email', edit_invoice_email);
                formData.append('bill_to_address', edit_bill_to_address);

                if (document.getElementById('edit_invoice_logo').files.length > 0) {
                    formData.append('edit_invoice_logo', document.getElementById('edit_invoice_logo').files[
                            0],
                        document.getElementById('edit_invoice_logo').files[0].name);
                } else {
                    formData.append('invoice_logo', edit_invoice_path);
                }

                axios.post(apiUrl + '/api/saveInvoiceConfig', formData, {
                    headers: {
                        Authorization: token,
                        // "Content-Type": "multipart/form-data",
                    }
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        // console.log('success', data);
                        $('#editModal').modal('hide');
                        $('div.spanner').addClass('show');
                        setTimeout(function() {
                            $('div.spanner').removeClass('show');
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(response.data.message);
                            toast1.toast('show');
                            // show_data();
                        }, 1500)
                    }

                }).catch(function(error) {
                    console.log(error);
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
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-x" style="color:red"></i>');
                            $('.toast1 .toast-title').html("Error");
                            $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                                "\n\r"));
                        })
                        toast1.toast('show');
                    }
                });

            })

            // CLICK TO EDIT BUTTON
            $(document).on('click', '.editButton', function(e) {
                e.preventDefault();
                let id = $(this).val();
                $('#invoice_config_id').val(id);

                axios
                    .get(apiUrl + '/api/invoice_config/show_edit/' + id, {
                        headers: {
                            Authorization: token,
                        },
                    })
                    .then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            if (data.data.invoice_logo) {
                                // $('#edit_invoice_logo').val(url);
                                $('#edit_invoice_path').html(data.data.invoice_logo);
                            }

                            $('#edit_invoice_title').val(data.data.invoice_title);
                            $('#edit_invoice_email').val(data.data.invoice_email);
                            $('#edit_to_bill').val(data.data.bill_to_address);

                        } else {
                            console.log("ERROR");
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
                    });
            })

            // STORE DATA
            $('#invoiceconfigs_store').on('submit', function(e) {
                e.preventDefault();
                let invoice_title = $('#invoice_title').val();
                let invoice_email = $('#invoice_email').val();
                let bill_to_address = $('#bill_to_address').val();

                let formData = new FormData();
                formData.append('invoice_title', invoice_title);
                formData.append('invoice_email', invoice_email);
                formData.append('bill_to_address', bill_to_address);

                if (document.getElementById('invoice_logo').files.length > 0) {
                    formData.append('invoice_logo', document.getElementById('invoice_logo').files[0],
                        document.getElementById('invoice_logo').files[0].name);
                }

                axios.post(apiUrl + '/api/saveInvoiceConfig', formData, {
                    headers: {
                        Authorization: token,
                        // "Content-Type": "multipart/form-data",

                    }
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        // console.log('success', data);
                        $('div.spanner').addClass('show');
                        setTimeout(function() {
                            $('div.spanner').removeClass('show');
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(response.data.message);
                            $('#invoiceconfigs_store').trigger('reset');
                            toast1.toast('show');
                            show_data();
                        }, 1500)
                    }

                }).catch(function(error) {
                    console.log(error);
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
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-x" style="color:red"></i>');
                            $('.toast1 .toast-title').html("Error");
                            $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                                "\n\r"));
                        })
                        toast1.toast('show');
                    }
                });

            })


            function show_data(filters) {
                let filter = {
                    page_size: 4,
                    page: 1,
                    ...filters,
                }
                $('#table_invoiceconfig tbody').empty();
                axios.get(`${apiUrl}/api/show_invoiceConfig_data?${new URLSearchParams(filter)}`, {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                        console.log("SUCCESS", data);
                        if (data.data.data.length > 0) {
                            data.data.data.map((item) => {
                                let tr = '<tr style="vertical-align:middle;">';

                                tr += '<td class="fit">' + item.invoice_title + '</td>';
                                tr += '<td class="fit">' + item.invoice_email + '</td>';
                                tr += '<td class="wrap">' + item.bill_to_address + '</td>';
                                tr +=
                                    '<td class="text-center" style="width:20px"><button value=' +
                                    item.id +
                                    ' class="editButton btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal" > <i class="fa-solid fa-pen-to-square"></i></button></td>';
                                tr +=
                                    '<td class="text-center" style="width:20px"><button value=' +
                                    item.id +
                                    ' class="deleteButton btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fa-solid fa-trash"></i></button></td>';

                                tr += '</tr>';

                                $('#table_invoiceconfig tbody').append(tr);
                                return '';
                            })
                            $('#tbl_pagination').empty();
                            data.data.links.map(item => {
                                let li =
                                    `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
                                $('#tbl_pagination').append(li)
                                return ""
                            })

                            if (data.data.links.length) {
                                let lastPage = data.data.links[data.data.links.length - 1];
                                if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                                    $('#tbl_pagination .page-item:last-child').addClass('disabled');
                                }
                                let PreviousPage = data.data.links[0];
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

                                let search = $('#search').val();
                                show_data({
                                    search,
                                    page: $.urlParam('page')
                                });
                            })

                            let table_invoieConfig =
                                `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                            $('#tbl_showing').html(table_invoieConfig);

                        } else {
                            $("#table_invoiceconfig tbody").append(
                                '<tr style="vertical-align: middle;"><td colspan="5" class="text-center">No data</td></tr>'
                            );
                            let table_invoieConfig =
                                `Showing 0 to 0 of 0 entries`;
                            $('#tbl_showing').html(table_invoieConfig);
                        }


                    }
                }).catch(function(error) {
                    console.log("catch error", error);
                });


            }

            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }


            $(document).on('click', '#tbl_invoiceConfig_wrapper .deleteButton', function(
                e) {
                e.preventDefault();
                let row = $(this).closest("td");
                let invoiceConfig_id = row.find(".deleteButton").val();
                $("#invoiceConfig_id").html(invoiceConfig_id);
                // console.log("delete", invoiceConfig_id);
            })

            $('#invoiceConfig_delete').on('click', function(e) {
                e.preventDefault();

                let invoiceConfig_id = $('#invoiceConfig_id').html();
                axios.post(apiUrl + '/api/invoiceConfig_delete/' + invoiceConfig_id, {}, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                        $('#deleteModal').modal('hide');
                        $('div.spanner').addClass('show');
                        setTimeout(function() {
                            $('div.spanner').removeClass('show');
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(response.data.message);
                            toast1.toast('show');
                        }, 1500);
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                });
            });

            $('#deleteModal').on('hide.bs.modal', function() {
                $('html,body').animate({
                    scrollTop: $('#sb-nav-fixed').offset().top
                }, 'smooth');
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    show_data();
                }, 1500);
            })
        })
    </script>
@endsection
