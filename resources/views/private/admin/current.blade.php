@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">

        <div class="row bottom10">
            <div class="col-12 col-md-6 column1 bottom10" style="padding-right:5px;padding-left:5px;">
                <!-- <div class=" card-hover card shadow p-2 mb-4 bg-white rounded"> -->
                <div class="row text-center py-3">
                    <Label class="fs-1" id="paid_invoices">
                        0
                    </Label>
                </div>
                <div class="card-body text-center" style="border-bottom: none; color: #A4A6B3;">Paid</div>
                <!-- </div> -->
            </div>

            <div class="col-12 col-md-6 column2 bottom10" style="padding-right:5px;padding-left:5px;">
                <!-- <div class="card-hover card shadow p-2 mb-4 bg-white rounded"> -->
                <div class="row text-center py-3">
                    <Label class="fs-1" id="pending_invoices">
                        0
                    </Label>
                </div>
                <div class="card-body text-center" style="border-bottom: none;color: #A4A6B3; ">Pending</div>
                <!-- </div> -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-9 bottom10" style="padding-right:8px;padding-left:8px;">
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
            <div class="col-sm-3 bottom10" style="padding-right:8px;padding-left:8px;">
                <button class="btn w-100" style="color:white; background-color: #CF8029" id="button-submit">
                    <i class="fas fa-search"></i> Search</button>
            </div>
        </div>

        <div class="row d-none" id="button_inactive">
            <div class="col-sm-2 bottom10" style="padding-right:8px;padding-left:8px;">
                <button type="button" data-bs-toggle="modal" data-bs-target="#inactiveModal" class="btn w-100"
                    style="color:white; background-color: #CF8029;width:30%" id="inactiveButton">Deactivate</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 bottom10" style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white h-100">
                    <div class="card-body">
                        <div class="table-responsive" style="padding:20px">
                            <table style="color:#A4A6B3;" class="table table-hover" id="tbl_user">
                                <thead>
                                    <!-- style="border-bottom: 2px solid #f7f8f9 !important;" -->
                                    <tr>
                                        <th class="active fit" style="width: 10px">
                                            <input type="checkbox" class="d-none select-all form-check-input"
                                                id="select-all" />
                                        </th>
                                        <th class="fit">User</th>
                                        <th class="fit">Status</th>
                                        <th class="fit">Phone Number</th>
                                        <th class="fit">Position</th>
                                        <th class="fit">Latest Invoice</th>
                                        <th class="fit" style="width:10px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" colspan="7">
                                            <div class="noData"
                                                style="width:' +
                                    width +
                                    'px;position:sticky;overflow:hidden;left: 0px;font-size:25px">
                                                <i class="fas fa-spinner"></i>
                                                <div></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="display:flex;justify-content:center;" class="page_showing pagination-alignment "
                            id="tbl_user_showing"></div>
                        <div class="pagination-alignment" style="display:flex;justify-content:center;">
                            <ul style="display:flex;justify-content:flex-start;margin-top:15px"
                                class="pagination pagination-sm flex-sm-wrap" id="tbl_user_pagination">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Modal FOR Inactive Profile -->
    <div class="modal fade" id="inactiveModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
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
                    <div class="row ">
                        <div class="col bottom20">
                            <span id="inactiveProfileId" hidden></span>
                            <span class="text-muted"> Do you really want to set this Profile to Deactivate?</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn w-100" style="color:white; background-color:#A4A6B3; "
                                id="cancelInactive">Cancel</button>
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

        let width = window.innerWidth; // Set the initial value of width
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

            if (width > 425 && width <= 570) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }

            if (width > 570) {
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
            if (width > 425 && width <= 570) {
                width = window.innerWidth - 115;
                $('.noData').css('width', width + 'px');
            }
            if (width > 570) {
                width = 'auto';
                $('.noData').css('width', width);
            }
        });

        $(document).ready(function() {

            $("div.spanner").addClass("show");
            setTimeout(function() {
                $("div.spanner").removeClass("show");
                active_count_paid();
                active_count_pending()
                show_data();
            }, 1500)




            let toast1 = $('.toast1');
            toast1.toast({
                delay: 3000,
                animation: true,

            });

            $('.close').on('click', function(e) {
                e.preventDefault();
                toast1.toast('hide');
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
                        if ($(this).hasClass('profile_id')) {
                            array_all.push(cellValue);
                        }
                    });
                    console.log("CHECK", array_all);

                    $('#button_inactive').removeClass('d-none');
                } else {
                    console.log("UNCHECK", array_all);

                    $('#button_inactive').addClass('d-none');
                }
            });

            $(document).on('change', '.select-item', function() {
                let profile_id_item = $(this).closest('tr').find('.profile_id').text();
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
                    $('#button_inactive').addClass('d-none');
                } else {
                    $('#button_inactive').removeClass('d-none');
                }
            });

            $(document).on('click', '#inactiveLink', function(e) {
                e.preventDefault();
                let profile_id = $(this).closest('tr').find('.profile_id').text();
                $("#inactiveProfileId").html(profile_id);

            })

            $('#inactive_button').on('click', function(e) {
                e.preventDefault();
                let profile_id = $('#inactiveProfileId').html();
                if (profile_id) {
                    let data = {
                        profile_id: profile_id
                    }
                    axios.post(apiUrl + "/api/updateInactiveProfile", data, {
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
                                // location.href = apiUrl + "/admin/current"
                                window.location.reload();
                            }, 3000)
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
                                    '<i class="fa-solid fa-x" style="color:red"></i>');
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
                    axios.post(apiUrl + "/api/updateInactiveProfile", data, {
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
                                // location.href = apiUrl + "/admin/current"
                                window.location.reload();
                            }, 3000)
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
                                    '<i class="fa-solid fa-x" style="color:red"></i>');
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
            })

            $('#cancelInactive').on('click', function(e) {
                e.preventDefault();
                $('#inactiveModal').modal('hide');
                setTimeout(function() {
                    location.reload(true);
                }, 500)
            })

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


            function active_count_paid() {
                axios.get(apiUrl + '/api/active_paid_invoice_count', {
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
                let page = $("#tbl_user_pagination .page-item.active .page-link").html();
                let filter = {
                    page_size: 10,
                    page: page ? page : 1,
                    search: $('#search').val() ? $('#search').val() : '',
                    ...filters,
                }
                axios
                    .get(`${apiUrl}/api/admin/show_data_active?${new URLSearchParams(filter)}`, {
                        headers: {
                            Authorization: token,
                        },
                    })
                    .then(function(res) {
                        res = res.data;
                        if (res.success) {
                            console.log('res123', res);
                            $('#tbl_user tbody').empty();
                            if (res.data.data.length > 0) {
                                res.data.data.map((item) => {
                                    let tr = '<tr style="vertical-align:middle;">';
                                    tr += '<td id="profile_id" class="profile_id" hidden>' + item
                                        .profile.id +
                                        '</td>';
                                    tr +=
                                        '<td class="active fit">  <input type="checkbox" class="select-item form-check-input" id="select-item" /></td>';
                                    if (item.file_path) {
                                        tr +=
                                            '<td class="fit"><div class="row w-100" ><div class="col" ><img style="height:40px;width:40px" class="rounded-pill" src="' +
                                            item.file_path + '">&nbsp;' + item.full_name +
                                            '</div></td>';
                                    } else {
                                        tr +=
                                            '<td class="fit"><div class="row w-100" ><div class="col" ><img style="height:40px;width:40px" class="rounded-pill" src="/images/default.png">&nbsp;' +
                                            item.full_name +
                                            '</div></td>';
                                    }
                                    tr += '<td class="fit">' + item.profile_status + '</td>';
                                    tr += '<td class="fit">' + item.phone_number + '</td>';
                                    tr += '<td class="fit">' + item.position + '</td>';

                                    if (item.profile.invoice.length > 0) {
                                        let latest_invoice = item.profile.invoice[item.profile
                                            .invoice
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
                                        tr += '<td class="fit">' + Math.round(diff ? diff : 0) +
                                            ' Days ago</td>';

                                        tr +=
                                            '<td  class="text-center">';
                                        tr +=
                                            `<div class="dropdown">
                                                <a style="color:#A4A6B3;" class="btn dropdown-toggle border-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"  ></i>
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li><a id="inactiveLink" data-bs-toggle="modal" data-bs-target="#inactiveModal" class="dropdown-item" href="#">Deactivate</a></li>
                                                    <li ><a class="dropdown-item" href=` + apiUrl +
                                            '/admin/activeProfile/' +
                                            item.id + "/" + item.profile.id +
                                            `>View</a></li>
                                                </ul>
                                            </div>`;
                                        tr += '</td>';
                                        tr += '</tr>';
                                        $("#tbl_user tbody").append(tr);
                                        return ''

                                    } else {
                                        let tr = '<tr style="vertical-align:middle;">';
                                        tr += '<td id="profile_id" class="profile_id" hidden>' + item
                                            .profile
                                            .id +
                                            '</td>';
                                        tr +=
                                            '<td class="active fit">  <input type="checkbox" class="select-item form-check-input" id="select-item" /></td>';
                                        if (item.file_path) {
                                            tr +=
                                                '<td class="fit"><div class="row w-100" ><div class="col" ><img style="height:40px;width:40px" class="rounded-pill" src="' +
                                                item.file_path + '">&nbsp;' + item.full_name +
                                                '</div></td>';
                                        } else {

                                            tr +=
                                                '<td class="fit"><div class="row w-100" ><div class="col" ><img style="height:40px;width:40px" class="rounded-pill"     src="/images/default.png">&nbsp;' +
                                                item.full_name +
                                                '</div></td>';
                                        }
                                        tr += '<td class="fit">' + item.profile_status +
                                            '</td>';
                                        tr += '<td class="fit">' + item
                                            .phone_number + '</td>';
                                        tr += '<td class="fit">' + item.position + '</td>';
                                        tr += '<td class="fit"> No Latest Invoice</td>';

                                        tr +=
                                            '<td  class="text-center">';
                                        tr +=
                                            `<div class="dropdown">
                                                <a style="color:#A4A6B3;" class="btn dropdown-toggle border-0 bg-transparent" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  <li><a id="inactiveLink" data-bs-toggle="modal" data-bs-target="#inactiveModal" class="dropdown-item" href="#">Deactivate</a></li>
                                                    <li><a class="dropdown-item" href=` + apiUrl +
                                            '/admin/activeProfile/' +
                                            item.id + "/" + item.profile.id +
                                            `>View</a></li>
                                                </ul>
                                            </div>`;
                                        tr += '</td>';
                                        tr += '</tr>';
                                        $("#tbl_user tbody").append(tr);
                                        return ''
                                    }
                                })

                                $('#tbl_user_pagination').empty();
                                res.data.links.map(item => {
                                    let li =
                                        `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
                                    $('#tbl_user_pagination').append(li)
                                    return ""
                                })

                                if (res.data.links.length) {
                                    let lastPage = res.data.links[res.data.links.length - 1];
                                    if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                                        $('#tbl_user_pagination .page-item:last-child').addClass(
                                            'disabled');
                                    }
                                    let PreviousPage = res.data.links[0];
                                    if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url ==
                                        null) {
                                        $('#tbl_user_pagination .page-item:first-child').addClass(
                                            'disabled');
                                    }
                                }

                                $("#tbl_user_pagination .page-item .page-link").on('click', function() {
                                    $("#tbl_user_pagination .page-item").removeClass('active');
                                    let url = $(this).data('url')
                                    $.urlParam = function(name) {
                                        var results = new RegExp("[?&]" + name +
                                                "=([^&#]*)")
                                            .exec(
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
                                $('#tbl_user_showing').html(tbl_user_showing);
                                selectShow();
                            } else {

                                $("#tbl_user tbody").append(
                                    '<tr><td colspan="7" class="text-center"><div class="noData" style="width:' +
                                    width +
                                    'px;position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                                );
                                let tbl_user_showing =
                                    `Showing 0 to 0 of 0 entries`;
                                $('#tbl_user_showing').html(tbl_user_showing);
                                selectShow();

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
