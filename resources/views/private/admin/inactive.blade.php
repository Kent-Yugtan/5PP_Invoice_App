@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">

        <div class="row " style="padding-top:10px;padding-bottom:10px">
            <div class="col-12 col-md-6 column1  bottom10" style="padding-right:5px;padding-left:5px;">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-1" id="active_profile">
                            0
                        </Label>
                    </div>
                    <div class="card-body text-center" style="border-bottom: none; color: #A4A6B3;">Active</div>
                </div>
            </div>

            <div class="col-12 col-md-6 column2  bottom10" style="padding-right:5px;padding-left:5px;">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-1" id="inactive_profile">
                            0
                        </Label>
                    </div>
                    <div class="card-body text-center" style="border-bottom: none;color: #A4A6B3; ">Inactive</div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
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
                <button type="button" class="btn w-100" style="color:white; background-color: #CF8029"
                    id="button-submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            </div>
        </div>

        <div class="row d-none" id="button_active">
            <div class="col-sm-2 bottom10" style="padding-right:8px;padding-left:8px;">
                <button type="button" data-bs-toggle="modal" data-bs-target="#activeModal" class="btn w-100"
                    style="color:white; background-color: #CF8029;width:30%" id="activeButton">Activate</button>
            </div>
        </div>


        <div class="row">
            <div class="col-12 bottom10" style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white h-100" style="padding:20px">
                    <div class="card-body">

                        <div class="table-responsive" style="max-height:617px !important">
                            <table style=" color: #A4A6B3; " class="table table-hover" id="tbl_user">
                                <thead>
                                    <tr>
                                        <th class="active fit " style="width: 10px">
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
                                                <div id="noData"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-none" id="selectInactive">
                            <div class="input-group" style="width:145px !important">
                                <select id="tbl_showing_inactivePages" class="form-select">
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
                            id="tbl_user_showing"></div>
                        <div class="pagination-alignment" style="display:flex;justify-content:center;">
                            <ul style="display:flex;align-items:center;margin-top:15px"
                                class="pagination pagination-sm flex-sm-wrap" id="tbl_user_pagination">
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal FOR Active Invoice -->
    <div class="modal fade" id="activeModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
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
                    <div class="row">
                        <div class="col bottom20">
                            <span id="activeProfileId"></span>
                            <span class="text-muted"> Do you really want to set this Profile to Activate?</span>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-6">
                            <button type="button" class="btn w-100" style="color:white; background-color:#A4A6B3; "
                                id="cancelactive" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="active_button" class="btn  w-100"
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

            $("div.spanner").addClass("show");
            setTimeout(function() {
                $("div.spanner").removeClass("show");
                show_data();
                active_profile_count();
                inactive_profile_count();
            }, 1500)

            let toast1 = $('.toast1');
            toast1.toast({
                delay: 3000,
                animation: true,

            });

            $("#cancelactive").on('click', function(e) {
                e.preventDefault();
                location.reload(true);
            })

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

            $(document).on('click', '#activeButton', function(e) {
                e.preventDefault();
                // BUTTON SPINNER
                var originalText = $('#activeButton').html();
                $('#activeButton').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                setTimeout(function() {
                    $('#activeButton').html(originalText);
                }, 300);
            })

            let array_all = [];
            $(document).on('change', '#select-all', function() {
                array_all = []; // Reset the array
                $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
                if ($(this).is(":checked")) {
                    $(this).closest('table').find('td').each(function() {
                        let cellValue = $(this)
                            .text(); // get the text content of the td element
                        if ($(this).hasClass('profile_id')) {
                            array_all.push(cellValue);
                        }
                    });
                    console.log("CHECK", array_all);

                    $('#button_active').removeClass('d-none');
                } else {
                    console.log("UNCHECK", array_all);

                    $('#button_active').addClass('d-none');
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
                    $('#button_active').addClass('d-none');
                } else {
                    $('#button_active').removeClass('d-none');
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



            function active_profile_count() {
                $('#active_profile').text(0);
                axios.get(apiUrl + '/api/active_profile_count', {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                        $('#active_profile').text(data.data ? data.data : 0);
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            }

            function inactive_profile_count() {
                $('#inactive_profile').text(0);
                axios.get(apiUrl + '/api/inactive_profile_count', {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                        $('#inactive_profile').text(data.data ? data.data : 0);
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            }

            $('#button-submit').on('click', function(e) {
                e.preventDefault();

                // BUTTON SPINNER
                var originalText = $('#button-submit').html();
                $('#button-submit').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );

                var originalTextTable = $('#tbl_user tbody').html();
                // Add spinner to the remaining row and set colspan to 5
                $('#tbl_user tbody').html(
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
                    let search = $('#search').val();
                    show_data({
                        search: search ? search : ''
                    });
                    $("div.spanner").removeClass("show");
                }, 1500)
            })

            $(document).on('click', '#activeLink', function(e) {
                e.preventDefault();
                let profile_id = $(this).closest('tr').find('.profile_id').text();
                $("#activeProfileId").html(profile_id);

            })

            $('#active_button').on('click', function(e) {
                e.preventDefault();
                let profile_id = $('#activeProfileId').html();

                if (profile_id) {
                    let data = {
                        profile_id: profile_id
                    }
                    axios.post(apiUrl + "/api/updateActiveProfile", data, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#activeModal').modal('hide');

                            $("div.spanner").addClass("show");
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(data.message);

                            var originalTextTable = $('#tbl_user tbody').html();
                            // Add spinner to the remaining row and set colspan to 5
                            $('#tbl_user tbody').html(
                                `<tr>
                              <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                            );

                            setTimeout(function() {
                                console.log('setTimeout function executed single');
                                $("div.spanner").removeClass("show");
                                $('#button_active').addClass('d-none');
                                active_profile_count();
                                inactive_profile_count();
                                show_data();
                                // location.href = apiUrl + "/admin/current"
                                // window.location.reload();
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
                    axios.post(apiUrl + "/api/updateActiveProfile", data, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#activeModal').modal('hide');
                            $('html,body').animate({
                                scrollTop: $('#sb-nav-fixed').offset().top
                            }, 'slow');
                            $("div.spanner").addClass("show");
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(data.message);

                            var originalTextTable = $('#tbl_user tbody').html();
                            // Add spinner to the remaining row and set colspan to 5
                            $('#tbl_user tbody').html(
                                `<tr>
                              <td class="text-center" colspan="6"><div class="text-center" colspan="6"><span style="color:#CF8029" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></div></td></tr>`
                            );

                            setTimeout(function() {
                                console.log('setTimeout function executed multiple');
                                $("div.spanner").removeClass("show");
                                // location.href = apiUrl + "/admin/current"
                                // window.location.reload();
                                active_profile_count();
                                inactive_profile_count();
                                show_data();
                                $('#button_active').addClass('d-none');
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

            })

            $('#tbl_showing_inactivePages').on('change', function() {
                let pages = $(this).val();
                pageSize = pages; // update page size variable
                // Call the pendingInvoices() function with updated filters
                var originalTextTable = $('#tbl_user tbody').html();
                $('#tbl_user tbody').html(
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
                let page = $("#tbl_user_pagination .page-item.active .page-link").html();
                let filter = {
                    page_size: pageSize,
                    page: page ? page : 1,
                    search: $('#search').val() ? $('#search').val() : '',
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
                                    tr += '<td id="profile_id" class="profile_id" hidden>' +
                                        item
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
                                        let latest_status = item.profile.invoice[item.profile
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
                                        console.log("latest_status", latest_status.invoice_status);

                                        // console.log("DIFF", Math.round(diff));
                                        if (latest_status.invoice_status == "Paid") {
                                            tr += '<td class="fit">No Latest Invoice</td>';
                                        } else {
                                            if (Math.round(diff) > 1) {
                                                tr += '<td class="fit">' + Math.round(diff ? diff : 0) +
                                                    ' Days ago</td>';
                                            } else {
                                                tr += '<td class="fit">' + Math.round(diff ? diff : 0) +
                                                    ' Day ago</td>';
                                            }

                                        }
                                        tr +=
                                            '<td  class="text-center">';
                                        tr +=
                                            `<div class="dropdown">
                                                <a style="color:#A4A6B3;" class="btn dropdown-toggle border-0 bg-transparent" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li><a id="activeLink" data-bs-toggle="modal" data-bs-target="#activeModal" class="dropdown-item" href="#">Activate</a></li>
                                                    <li ><a class="dropdown-item" href=` + apiUrl +
                                            '/admin/inactiveProfile/' +
                                            item.id + "/" + item.profile.id +
                                            `>View</a></li>
                                                </ul>
                                            </div>`;
                                        tr += '</td>';
                                        tr += '</tr>';
                                        $(
                                            "#tbl_user tbody").append(tr);

                                    } else {
                                        let tr = '<tr style="vertical-align:middle;">';
                                        tr += '<td id="profile_id" class="profile_id" hidden>' +
                                            item
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
                                        tr += '<td class="fit"> No Invoice</td>';

                                        tr +=
                                            '<td  class="text-center">';
                                        tr +=
                                            `<div class="dropdown">
                                                <a style="color:#A4A6B3;" class="btn dropdown-toggle border-0 bg-transparent" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  <li><a id="activeLink" data-bs-toggle="modal" data-bs-target="#activeModal" class="dropdown-item" href="#">Activate</a></li>
                                                    <li><a class="dropdown-item" href=` + apiUrl +
                                            '/admin/inactiveProfile/' +
                                            item.id + "/" + item.profile.id +
                                            `>View</a></li>
                                                </ul>
                                            </div>`;
                                        tr += '</td>';
                                        tr += '</tr>';
                                        $("#tbl_user tbody").append(tr);
                                    }
                                    return ''
                                })
                                $('#tbl_user_pagination').empty();
                                res.data.links.map(item => {
                                    let label = item.label;
                                    if (label === "&laquo; Previous") {
                                        label = "&laquo;";
                                    } else if (label === "Next &raquo;") {
                                        label = "&raquo;";
                                    }
                                    let li =
                                        `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${label}</a></li>`
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
                                    let url = $(this).data('url')
                                    $.urlParam = function(name) {
                                        var results = new RegExp("[?&]" + name +
                                            "=([^&#]*)").exec(
                                            url
                                        );

                                        return results !== null ? results[1] || 0 : 0;
                                    };

                                    $('#tbl_user tbody').html(
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

                                let tbl_user_showing =
                                    `Showing ${res.data.from} to ${res.data.to} of ${res.data.total} entries`;
                                $('#tbl_user_showing').html(tbl_user_showing);
                                selectShow();
                                $('#selectInactive').removeClass('d-none');
                                $('#tbl_user').addClass('table-hover');
                            } else {
                                selectShow();

                                $("#tbl_user tbody").append(
                                    '<tr><td colspan="7" class="text-center"><div class="noData" style="width:' +
                                    width +
                                    'px;position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                                );
                                let tbl_user_showing =
                                    `Showing 0 to 0 of 0 entries`;
                                $('#tbl_user_showing').html(tbl_user_showing);
                                $('#selectInactive').addClass('d-none');
                                $('#tbl_user').removeClass('table-hover');

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
