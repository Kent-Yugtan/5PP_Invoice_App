@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">

        <div class="row" style="padding-top:10px;padding-bottom:10px">
            <div class="col-12 col-md-6 column1 bottom10" style="padding-right:5px;padding-left:5px;">
                <!-- <div class="card-hover card shadow p-2 mb-4 bg-white rounded"> -->
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-1" id="paid_invoices">
                            0
                        </Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Paid
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
                <!-- </div> -->
            </div>
            <div class="col-12 col-md-6 column2 bottom10" style="padding-right:5px;padding-left:5px;">
                <!-- <div class="card-hover card shadow p-2 mb-4 bg-white rounded"> -->
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-1" id="pending_invoices">
                            0
                        </Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Pending</div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
                <!-- </div> -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 bottom10" style="padding-right:8px;padding-left:8px;">
                <div class="w-100">
                    <div class="has-search">
                        <span class="fa fa-search form-control-feedback" style="color:#A4A6B3"></span>
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                    </div>
                    {{-- <div class="input-group" id="input-group-search">
                        <div class="input-group-prepend input-group-text" id="border-search">
                            <i style="color:#A4A6B3" class="fas fa-search"></i>
                        </div>
                        <input id="search" name="search" type="text"
                            class="search-left-icon form-control form-check-inline "
                            onfocusout="input_group_focus('out','input-group-search')"
                            onfocus="input_group_focus('in','input-group-search')" placeholder="Search">
                    </div> --}}
                </div>
            </div>

            <div class="col-sm-4 bottom10" style="padding-right:8px;padding-left:8px;">
                <div class="w-100 form-check-inline ">
                    <select class="form-select form-check-inline" id="filter_invoices">
                        <option value="All">All</option>
                        <option value="Pending">Pending</option>
                        <option value="Paid">Paid</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Overdue" hidden>Overdue</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4 bottom10" style="padding-right:8px;padding-left:8px;">
                <button type="button" class="btn w-100" style="color:white; background-color: #CF8029;width:30%"
                    id="button-submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            </div>
        </div>

        <div class="row d-none" id="invoice_inactive">
            <div class="col-sm-2 bottom10" style="padding-right:8px;padding-left:8px;">
                <button type="button" data-bs-toggle="modal" data-bs-target="#inactiveModal" class="btn w-100"
                    style="color:white; background-color: #CF8029;width:30%" id="inactiveButton">Deactivate</button>
            </div>
        </div>


        <div class="row ">
            <div class="col-12 bottom10" style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white h-100" style="padding:20px">
                    <div class="card-body">
                        <div class="table-responsive" style="max-height:617px !important">
                            <table style="color: #A4A6B3; " class="table table-hover" id="dataTable_invoice">
                                <thead>
                                    <tr>
                                        {{-- <th class="active fit" style="width: 10px">
                                            <input type="checkbox" class="d-none select-all form-check-input"
                                                id="select-all"  />
                                        </th> --}}
                                        <th class="fit">Invoice #</th>
                                        <th class="fit">Profile Name</th>
                                        <th class="fit text-center">Payment Status</th>
                                        <th class="fit text-center">Invoice Status</th>
                                        <th class="fit text-end">Total Amount</th>
                                        <th class="fit text-end">Date Created</th>
                                        <th class="fit text-end">Due Date</th>
                                        <th class="fit" style="width:10px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" colspan="8">
                                            <div class="noData"
                                                style="width:' +
                            width +
                            'px;position:sticky;overflow:hidden;left: 0px;font-size:25px">
                                                <div id="noData"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-none" id="selectCurrent">
                            <div class="input-group" style="width:145px !important">
                                <select id="tbl_showing_currentPages" class="form-select">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="75">75</option>
                                    <option value="100">100</option>
                                </select>
                                <span class="input-group-text border-0">/Page</span>
                            </div>
                        </div>

                        <div style="display:flex;justify-content:center;" class="page_showing pagination-alignment "
                            id="tbl_showing_invoice"></div>
                        <div class="pagination-alignment" style="display:flex;justify-content:center;">
                            <ul style="display:flex;justify-content:flex-start;margin-top:15px"
                                class="pagination pagination-sm flex-sm-wrap" id="tbl_pagination_invoice">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal FOR Inactive Profile -->
    <div class="modal fade" id="inactiveModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="top:30px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" style="padding:20px">
                    <div class="row">
                        <div class="col">
                            <span>
                                <img class="" src="{{ URL('images/Info.png') }}"
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
                    <div class="row">
                        <div class="col bottom20">
                            <span id="inactiveInvoice" hidden></span>
                            <span class="text-muted"> Do you really want to set this Invoice to Inactive?</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn w-100" style="color:white; background-color:#A4A6B3; "
                                id="cancelInactive" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="inactive_button" class="btn  w-100"
                                style="color:white;background-color: #CF8029;">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- START MODAL UPDATE INVOICE STATUS -->
    <div class="modal fade" id="invoice_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="hide-content ">
                <div class="modal-body ">
                    <form id="update_invoice_status">
                        @csrf
                        <div class="row">
                            <div class="card-border shadow bg-white h-100" style="padding:20px">
                                <div class="row" id="header">
                                    <div class="col-md-12 w-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col bottom20">
                                                    <span class="fs-3 fw-bold">Update Payment Status</span>
                                                </div>
                                            </div>
                                            <input type="text" id="updateStatus_invoiceNo" hidden>

                                            <div class="row">
                                                <div class="col ">
                                                    <div class="form-group">
                                                        <label for="select_invoice_status"
                                                            style="color:#A4A6B3">Status</label>
                                                        <select class="form-select" id="select_invoice_status">
                                                            <option value="" Selected disabled>Please choose status
                                                            </option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Paid">Paid</option>
                                                            <option value="Cancelled">Cancelled</option>
                                                            <option value="Overdue" hidden>Overdue</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col bottom20">
                                                    <button type="button" class="btn w-100"
                                                        style="color:#CF8029; background-color:#f3f3f3; "
                                                        data-bs-dismiss="modal" id="closePayment">Close</button>
                                                </div>
                                                <div class="col bottom20">
                                                    <button type="submit" id="update" class="btn w-100"
                                                        style="color:White; background-color:#CF8029; ">Update</button>
                                                </div>
                                            </div>
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

    <div style="position:fixed;top:60px;right:20px;z-index:99999;justify-content:flex-end;display:flex;">
        <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div id="notifyIcon"></i></div>
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

    <div class="spanner" style="display: flex;align-items: center;justify-content: center;position: fixed;">
        <div class="loader"></div>
    </div>

    <script type="text/javascript">
        function input_group_focus(option, id) {
            if (option == "out") {
                $('#border-search').removeClass('border-search2');
                $('#border-search').addClass('border-search');
                $('#' + id).removeClass('input-group-focused');
            } else {
                $('#border-search').removeClass('border-search');
                $('#border-search').addClass('border-search2');
                $('#' + id).addClass('input-group-focused');
            }
        }


        window.addEventListener("load", () => {
            width = window.innerWidth;

            if (width <= 320) {
                width = window.innerWidth - 110;
                $('.noData').css('width', width + 'px');
            }
            if (width > 320 && width <= 375) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }
            if (width > 375 && width <= 425) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }

            if (width > 425 && width <= 768) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }

            if (width > 768 && width <= 991) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width);
            }
            if (width > 992 && width <= 1127) {
                width = window.innerWidth - 341;
                $('.noData').css('width', width);
            }
            if (width > 1127) {
                width = 'auto';
                $('.noData').css('width', width);
            }

        });

        window.addEventListener("resize", () => {
            width = window.innerWidth;
            if (width <= 320) {
                width = window.innerWidth - 110;
                $('.noData').css('width', width + 'px');
            }
            if (width > 320 && width <= 375) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }
            if (width > 375 && width <= 425) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }
            if (width > 425 && width <= 768) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }
            if (width > 768 && width <= 991) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width);
            }
            if (width > 992 && width <= 1127) {
                width = window.innerWidth - 341;
                $('.noData').css('width', width);
            }
            if (width > 1127) {
                width = 'auto';
                $('.noData').css('width', width);
            }
        });

        function tableLoader() {
            var originalText = $('#noData').html();
            $('#noData').html(
                `<span id="button-spinner" style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            );
            setTimeout(function() {
                $('#noData').html(originalText);
            }, 1500);
        }


        $(document).ready(function() {
            tableLoader();
            let pageSize = 10; // initial page size
            $('div.spanner').addClass('show');
            setTimeout(function() {
                $('div.spanner').removeClass('show');
                active_count_paid();
                active_count_pending();
                check_pendingInvoicesStatus();
                show_data();
            }, 1500)

            $(document).on('click', '#inactiveButton', function(e) {
                e.preventDefault();
                // BUTTON SPINNER
                var originalText = $('#inactiveButton').html();
                $('#inactiveButton').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                setTimeout(function() {
                    $('#inactiveButton').html(originalText);
                }, 300);
            })

            $('#select-all').click(function(e) {
                $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
            });

            function selectShow() {
                var numCheckboxes = $('.select-item').length;
                console.log("numCheckboxes", numCheckboxes);
                if (numCheckboxes > 0) {
                    $('#select-all').removeClass('d-none');
                } else {
                    $('#select-all').addClass('d-none');
                }
            }

            let array_all = [];
            $(document).on('change', '#select-all', function() {
                array_all = []; // Reset the array
                $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
                if ($(this).is(":checked")) {
                    $(this).closest('table').find('td').each(function() {
                        let cellValue = $(this).text(); // get the text content of the td element
                        if ($(this).hasClass('invoice_id')) {
                            array_all.push(cellValue);
                        }
                    });
                    console.log("CHECK", array_all);

                    $('#invoice_inactive').removeClass('d-none');
                } else {
                    console.log("UNCHECK", array_all);

                    $('#invoice_inactive').addClass('d-none');
                }
            });

            $(document).on('change', '.select-item', function() {
                let profile_id_item = $(this).closest('tr').find('.invoice_id').text();
                if ($(this).is(":checked")) {
                    // Checkbox is checked, add the value to the array
                    array_all.push(profile_id_item);
                    console.log("ITEM", array_all);
                } else {
                    // Checkbox is unchecked, remove the value from the array
                    let index = array_all.indexOf(profile_id_item);
                    if (index > -1) {
                        array_all.splice(index, 1);
                    }
                    console.log("ITEM", array_all);
                }

                var numCheckboxes = $('.select-item').length;
                if ($('.select-item:checked').length === numCheckboxes) {
                    // All checkboxes are checked
                    $('#select-all').prop('checked', true);
                } else {
                    // Not all checkboxes are checked
                    $('#select-all').prop('checked', false);
                }

                if ($('.select-item:checked').length === 0) {
                    // Add your code here for when no checkbox is checked
                    $('#invoice_inactive').addClass('d-none');
                } else {
                    $('#invoice_inactive').removeClass('d-none');
                }
            });

            $(document).on('click', '#inactiveLink', function(e) {
                e.preventDefault();
                let invoice_id = $(this).closest('tr').find('.invoice_id').text();
                $("#inactiveInvoice").html(invoice_id);

            })

            $("#cancelInactive").on('click', function(e) {
                e.preventDefault();
                location.reload(true);
            })

            $("#closePayment").on('click', function(e) {
                e.preventDefault();
                var originalTextTable = $('#dataTable_invoice tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_invoice tbody').html(
                    `<tr>
                              <td class="text-center" colspan="8"><div class="text-center" colspan="8"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );

                // setTimeout(function() {
                //     show_data();
                // }, 500);
            })

            $('#inactive_button').on('click', function(e) {
                e.preventDefault();
                let invoice_id = $('#inactiveInvoice').html();
                if (invoice_id) {
                    let data = {
                        invoice_id: invoice_id
                    }
                    axios.post(apiUrl + "/api/updateInactiveInvoice", data, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#inactiveModal').modal('hide');
                            $("div.spanner").addClass("show");
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(data.message);
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");

                                $('#invoice_inactive').addClass('d-none');
                            }, 1500)
                            toast1.toast('show');
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
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
                                    '<i class="fa-solid fa-x" style="color:#dc3545"></i>'
                                );
                                $('.toast1 .toast-title').html("Error");
                                $('.toast1 .toast-body').html(Object.values(errors)[
                                        0]
                                    .join(
                                        "\n\r"));
                            })
                            toast1.toast('show');
                        }
                    })
                } else {
                    let data = {
                        multipleId: array_all
                    }
                    axios.post(apiUrl + "/api/updateInactiveInvoice", data, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#inactiveModal').modal('hide');
                            $('html,body').animate({
                                scrollTop: $('#sb-nav-fixed').offset().top
                            }, 'slow');
                            $("div.spanner").addClass("show");
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(data.message);
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");

                                $('#invoice_inactive').addClass('d-none');
                            }, 1500)
                            toast1.toast('show');
                            console.log("SUCCESS", data);
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
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
                                    '<i class="fa-solid fa-x" style="color:#dc3545"></i>'
                                );
                                $('.toast1 .toast-title').html("Error");
                                $('.toast1 .toast-body').html(Object.values(errors)[
                                        0]
                                    .join(
                                        "\n\r"));
                            })
                            toast1.toast('show');
                        }
                    })
                }

                active_count_paid();
                active_count_pending();
                var originalTextTable = $('#dataTable_invoice tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_invoice tbody').html(
                    `<tr>
                              <td class="text-center" colspan="8"><div class="text-center" colspan="8"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                setTimeout(function() {
                    check_pendingInvoicesStatus();
                    show_data();
                }, 1500)
            })


            var currentPage = window.location.href;
            $('#collapseLayouts2 a').each(function() {
                // Compare the href attribute of the link to the current page URL
                if (currentPage.indexOf($(this).attr('href')) !== -1) {
                    // If there is a match, add the "active" class to the link
                    $(this).addClass('active');

                    // Trigger a click event on the parent link to expand the collapsed section
                    $(this).parent().parent().addClass("show");
                    $(this).parent().parent().addClass("active");
                    $('[data-bs-target="#collapseLayouts2"]').addClass('active');
                }
            });

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

            function active_count_paid() {
                axios.get(apiUrl + '/api/active_paid_invoice_count', {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                        $('#paid_invoices').html(data.data.length ? data.data.length : 0);
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            }

            function active_count_pending() {
                axios.get(apiUrl + '/api/active_pending_invoice_count', {
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

            function search_statusActive_invoice(filters) {
                let page = $("#tbl_pagination_invoice .page-item.active .page-link").html();
                let filter = {
                    page_size: 10,
                    page: page ? page : 1,
                    search: $('#search').val() ? $('#search').val() : '',
                    ...filters
                }
                // console.log("page", page);
                $('#dataTable_invoice tbody').empty();
                axios.get(`${apiUrl}/api/admin/search_statusActive_invoice?${new URLSearchParams(filter)}`, {
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
                                tr += '<td id="invoice_id" class="invoice_id" hidden>' + item.id +
                                    '</td>'
                                // This is for checkbox for multiple select
                                // tr += '<td class="active fit">  <input type="checkbox" class="select-item form-check-input" id="select-item" /></td>';
                                tr += '<td class="fit">' +
                                    item.invoice_no +
                                    '</td>';
                                tr += '<td class="fit">' +
                                    item.profile.user.first_name + " " + item.profile.user
                                    .last_name +
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
                                                // show_data();
                                                window.location.reload;
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
                                                // show_data();
                                                window.location.reload;
                                            }
                                        }).catch(function(error) {
                                            console.log("ERROR", error);
                                        })
                                    }
                                }

                                if (item.invoice_status === "Cancelled") {
                                    tr +=
                                        '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-info">' +
                                        item.invoice_status + '</button></td>';

                                } else if (item.invoice_status === "Paid") {
                                    tr +=
                                        '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-success">' +
                                        item.invoice_status + '</button></td>';

                                } else if (item.invoice_status === "Pending") {
                                    tr +=
                                        '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-warning" > ' +
                                        item.invoice_status + '</button></td >';
                                } else {
                                    tr +=
                                        '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-danger">' +
                                        item.invoice_status + '</button></td>';
                                }

                                tr += '<td class="fit text-center">' + item.status +
                                    '</td>';

                                tr += '<td class="fit text-end">' + Number(
                                        parseFloat(item
                                            .sub_total).toFixed(2))
                                    .toLocaleString(
                                        'en-US', {
                                            style: 'currency',
                                            currency: 'USD'
                                        }); +
                                '</td>';

                                tr += '<td class="fit text-end">' + moment.utc(item.created_at).tz(
                                    'Asia/Manila').format(
                                    'MM/DD/YYYY') + '</td>';
                                tr += '<td class="text-end">' + moment.utc(item.due_date).tz(
                                    'Asia/Manila').format(
                                    'MM/DD/YYYY') + '</td>';

                                tr +=
                                    '<td  class="text-center">';
                                // For deactivation
                                // <li><a id="inactiveLink" data-bs-toggle="modal" data-bs-target="#inactiveModal" class="dropdown-item" href="#">Deactivate</a></li>
                                tr +=
                                    `<div class="dropdown">
                                                <a style="color:#A4A6B3;" class="btn dropdown-toggle border-0 bg-transparent" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  
                                                    <li><a class="dropdown-item" href=` + apiUrl +
                                    '/invoice/editInvoice/' +
                                    item.id +
                                    `>View</a></li>
                                                </ul>
                                            </div>`;
                                tr += '</td>';
                                tr += '</tr>';
                                $("#dataTable_invoice tbody").append(tr);
                                return ''
                            })
                            $('#tbl_pagination_invoice').empty();

                            data.data.links.map(item => {
                                let label = item.label;
                                if (label === "&laquo; Previous") {
                                    label = "&laquo;";
                                } else if (label === "Next &raquo;") {
                                    label = "&raquo;";
                                }

                                let li = `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}">
                                  <a class="page-link" data-url="${item.url}">${label}</a>
                                </li>`;

                                $('#tbl_pagination_invoice').append(li);
                                return "";
                            });

                            if (data.data.links.length) {
                                let lastPage = data.data.links[data.data.links.length - 1];
                                if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                                    $('#tbl_pagination_invoice .page-item:last-child').addClass('disabled');
                                }
                                let PreviousPage = data.data.links[0];
                                if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url == null) {
                                    $('#tbl_pagination_invoice .page-item:first-child').addClass(
                                        'disabled');
                                }
                            }

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
                                    return results !== null ? results[1] || 0 : 0;
                                };
                                $('#dataTable_invoice tbody').html(
                                    `<tr>
                                     <td class="text-center" colspan="9"><div class="text-center" colspan="9"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                                );
                                setTimeout(function() {
                                    let search = $('#search').val();
                                    search_statusActive_invoice({
                                        search: search,
                                        page: $.urlParam('page')
                                    });
                                }, 500);
                            })
                            let tbl_showing_invoice =
                                `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                            $('#tbl_showing_invoice').html(tbl_showing_invoice);
                            selectShow();
                            $('#selectCurrent').removeClass('d-none');
                            $('#dataTable_invoice').addClass('table-hover');
                        } else {
                            selectShow();
                            $("#dataTable_invoice tbody").append(
                                '<tr><td colspan="9" class="text-center"><div class="noData" style="width:' +
                                width +
                                'px;position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                            );
                            let tbl_showing_invoice =
                                `Showing 0 to 0 of 0 entries`;
                            $('#tbl_showing_invoice').html(tbl_showing_invoice);
                            $('#selectCurrent').addClass('d-none');
                            $('#dataTable_invoice').removeClass('table-hover');

                        }
                    }
                }).catch(function(error) {
                    console.log("ERROR DISPLAY", error);
                });
            }

            // CHECK PENDING INVOICES
            function check_pendingInvoicesStatus(filters) {
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
                                        // console.log("due_dateStatus", item.due_date);
                                        // console.log("date_now", date_now);
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
                                                window.location.reload
                                            }
                                        }).catch(function(error) {
                                            console.log("ERROR", error);
                                        })
                                    }
                                }

                                if (item.invoice_status === "Cancelled") {
                                    if (item.due_date < date_now) {
                                        console.log("due_dateStatus", item.due_date);
                                        console.log("date_now", date_now);
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
                                                console.log("SUCCESS Cancelled", data);
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

            $('#tbl_showing_currentPages').on('change', function() {
                let pages = $(this).val();
                pageSize = pages; // update page size variable

                var originalTextTable = $('#dataTable_invoice tbody').html();
                $('#dataTable_invoice tbody').html(
                    `<tr>
                              <td class="text-center" colspan="8"><div class="text-center" colspan="8"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );
                setTimeout(function() {
                    show_data({
                        page_size: pages
                    });
                }, 500);
            })

            function show_data(filters) {
                let page = $("#tbl_pagination_invoice .page-item.active .page-link").html();
                let filter = {
                    page_size: pageSize,
                    page: page ? page : 1,
                    filter_all_invoices: $('#filter_invoices').val(),
                    ...filters

                }
                // console.log("page", page);
                $('#dataTable_invoice tbody').empty();
                axios.get(`${apiUrl}/api/admin/show_invoice?${new URLSearchParams(filter)}`, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        console.log("SHOWDATADATA", data);
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
                                tr += '<td id="invoice_id" class="invoice_id" hidden>' + item.id +
                                    '</td>'
                                // This is for checkbox for multiple select
                                // tr += '<td class="active fit">  <input type="checkbox" class="select-item form-check-input" id="select-item" /></td>';
                                tr += '<td class="fit">' +
                                    item.invoice_no +
                                    '</td>';
                                tr += '<td class="fit">' +
                                    item.profile.user.first_name + " " + item.profile.user
                                    .last_name +
                                    '</td>';

                                // data-bs-toggle="modal" data-bs-target="#invoice_status"
                                // data-bs-toggle="modal" data-bs-target="#invoice_status"
                                // data-bs-toggle="modal" data-bs-target="#invoice_status"
                                // data-bs-toggle="modal" data-bs-target="#invoice_status"

                                if (item.invoice_status === "Cancelled") {
                                    tr +=
                                        '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-info">' +
                                        item.invoice_status + '</button></td>';

                                } else if (item.invoice_status === "Paid") {
                                    tr +=
                                        '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-success">' +
                                        item.invoice_status + '</button></td>';

                                } else if (item.invoice_status === "Pending") {
                                    tr +=
                                        '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-warning" > ' +
                                        item.invoice_status + '</button></td >';
                                } else {
                                    tr +=
                                        '<td><button  style="width:100%; height:20px; font-size:10px; padding: 0px;" data-bs-toggle="modal" data-bs-target="#invoice_status" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-danger">' +
                                        item.invoice_status + '</button></td>';
                                }

                                tr += '<td class="fit text-center">' + item.status +
                                    '</td>'

                                tr += '<td class="fit text-end">' + Number(
                                        parseFloat(item
                                            .sub_total).toFixed(2))
                                    .toLocaleString(
                                        'en-US', {
                                            style: 'currency',
                                            currency: 'USD'
                                        }); +
                                '</td>';

                                tr += '<td class="fit text-end">' + moment.utc(item.created_at).tz(
                                    'Asia/Manila').format(
                                    'MM/DD/YYYY') + '</td>';
                                tr += '<td class="text-end">' + moment.utc(item.due_date).tz(
                                    'Asia/Manila').format(
                                    'MM/DD/YYYY') + '</td>';

                                tr +=
                                    '<td  class="text-center">';
                                // For deactivation
                                // <li><a id="inactiveLink" data-bs-toggle="modal" data-bs-target="#inactiveModal" class="dropdown-item" href="#">Deactivate</a></li>
                                tr +=
                                    `<div class="dropdown">
                                                <a style="color:#A4A6B3;" class="btn dropdown-toggle border-0 bg-transparent" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li><a class="dropdown-item" href=` + apiUrl +
                                    '/invoice/editInvoice/' +
                                    item.id +
                                    `>View</a></li>
                                                </ul>
                                            </div>`;
                                tr += '</td>';
                                tr += '</tr>';
                                $("#dataTable_invoice tbody").append(tr);
                                return ''
                            })
                            $('#tbl_pagination_invoice').empty();
                            data.data.links.map(item => {
                                let label = item.label;
                                if (label === "&laquo; Previous") {
                                    label = "&laquo;";
                                } else if (label === "Next &raquo;") {
                                    label = "&raquo;";
                                }

                                let li = `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}">
                              <a class="page-link" data-url="${item.url}">${label}</a>
                            </li>`;

                                $('#tbl_pagination_invoice').append(li);
                                return "";
                            });

                            if (data.data.links.length) {
                                let lastPage = data.data.links[data.data.links.length - 1];
                                if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                                    $('#tbl_pagination_invoice .page-item:last-child').addClass('disabled');
                                }
                                let PreviousPage = data.data.links[0];
                                if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url == null) {
                                    $('#tbl_pagination_invoice .page-item:first-child').addClass(
                                        'disabled');
                                }
                            }
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

                                $('#dataTable_invoice tbody').html(
                                    `<tr>
                                     <td class="text-center" colspan="9"><div class="text-center" colspan="9"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                                );
                                setTimeout(function() {
                                    let search = $('#search').val();
                                    show_data({
                                        search: search,
                                        page: $.urlParam('page')
                                    });
                                }, 500);


                            })
                            let tbl_showing_invoice =
                                `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                            $('#tbl_showing_invoice').html(tbl_showing_invoice);
                            selectShow();
                            $('#selectCurrent').removeClass('d-none');
                            $('#dataTable_invoice').addClass('table-hover');
                        } else {
                            selectShow();
                            $("#dataTable_invoice tbody").append(
                                '<tr><td colspan="9" class="text-center"><div class="noData" style="width:' +
                                width +
                                'px;position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                            );
                            let tbl_showing_invoice =
                                `Showing 0 to 0 of 0 entries`;
                            $('#tbl_showing_invoice').html(tbl_showing_invoice);
                            $('#selectCurrent').addClass('d-none');
                            $('#dataTable_invoice').removeClass('table-hover');

                        }

                    }
                }).catch(function(error) {
                    console.log("ERROR DISPLAY", error);
                });
            }

            $('#filter_invoices').on('change', function() {
                let filter = $('#filter_invoices').val();

                var originalTextTable = $('#dataTable_invoice tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_invoice tbody').html(
                    `<tr>
                              <td class="text-center" colspan="8"><div class="text-center" colspan="8"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );

                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    $('#tbl_pagination_invoice').empty();
                    show_data();

                }, 500)
            })

            $("#invoice_status").on('hide.bs.modal', function() {
                // window.location.reload();
                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $("div.spanner").removeClass("show");
                    show_data();
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
                        let status = data.data;
                        if (status == "Paid") {
                            $('#select_invoice_status').val(data.data);
                            $('#select_invoice_status').prop('disabled', true)
                            $('#update').prop('disabled', true)

                        } else {
                            $('#select_invoice_status').val(data.data);
                            $('#select_invoice_status').prop('disabled', false)
                            $('#update').prop('disabled', false)

                        }
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            })

            // POST INVOICE STATUS
            $('#update_invoice_status').submit(function(e) {
                e.preventDefault();

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
                        var originalTextTable = $('#dataTable_invoice tbody').html();
                        // Add spinner to the remaining row and set colspan to 5
                        $('#dataTable_invoice tbody').html(
                            `<tr>
                              <td class="text-center" colspan="8"><div class="text-center" colspan="8"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                        );

                        $("div.spanner").addClass("show");
                        setTimeout(function() {
                            $("div.spanner").removeClass("show");

                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(response.data.message);
                            toast1.toast('show');
                            active_count_paid();
                            active_count_pending();
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

                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-x" style="color:#dc3545"></i>');
                            $('.toast1 .toast-title').html("Error");
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
            });

            $('#button-submit').on('click', function(e) {
                e.preventDefault();

                // BUTTON SPINNER
                var originalText = $('#button-submit').html();
                $('#button-submit').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );

                var originalTextTable = $('#dataTable_invoice tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#dataTable_invoice tbody').html(
                    `<tr>
                              <td class="text-center" colspan="8"><div class="text-center" colspan="8"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                );

                setTimeout(function() {
                    $('#button-submit').html(originalText);
                }, 1500);

                // $('html,body').animate({
                //     scrollTop: $('#sb-nav-fixed').offset().top
                // }, 'slow');
                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $("div.spanner").removeClass("show");
                    $('#tbl_pagination_invoice').empty();
                    search_statusActive_invoice();
                }, 1500)

            })
        })
    </script>
@endsection
