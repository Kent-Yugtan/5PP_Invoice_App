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
            <div class="col-sm-8 bottom10" style="padding-right:8px;padding-left:8px;">
                <div class="w-100">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"
                                style="height:38px;background-color: white;color: #CF8029;border-right:none"><i
                                    class="fas fa-search"></i></span>
                        </div>
                        <input id="search" name="search" type="text" class="form-control form-check-inline"
                            style="margin-right: 1px;border-radius: 0.25em;" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 bottom10" style="padding-right:8px;padding-left:8px;">
                <button class="btn w-100" style="color:white; background-color: #CF8029" id="button-submit"><i
                        class="fa-solid fa-magnifying-glass"></i> Search</button>
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
                    active_count_paid();
                    active_count_pending()
                    show_data();
                }, 1500)
            })

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

            // FUNCTIOIN FOR DATE DIFFERENCE
            function datediff(first, second) {
                return Math.round((second - first) / (1000 * 60 * 60 * 24));
            }

            // FUNCTIOIN FOR DATE DIFFERENCE
            function parseDate(str) {
                var mdy = str.split('/');
                return new Date(mdy[2], mdy[0] - 1, mdy[1]);
            }

            function show_data(filters) {
                let page = $("#tbl_user_pagination .page-item.active .page-link").html();
                let filter = {
                    page_size: 5,
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
                                    if (item.file_path) {
                                        tr +=
                                            '<td class="fit"><div class="row w-100" ><div class="col" ><img style="height:40px;width:40px" class="rounded-pill" src="' +
                                            item.file_path + '">&nbsp;' + item.full_name +
                                            '</div></td>';
                                    } else {
                                        tr +=
                                            '<td class="fit"><div class="row w-100" ><div class="col" ><img style="height:40px;width:40px" class="rounded-pill" src="' +
                                            item.file_path + '">&nbsp;' + item.full_name +
                                            '</div></td>';
                                    }
                                    tr += '<td class="fit">' + item.profile_status + '</td>';
                                    tr += '<td class="fit">' + item.phone_number + '</td>';
                                    tr += '<td class="fit">' + item.position + '</td>';

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
                                        tr += '<td class="fit">' + Math.round(diff ? diff : 0) +
                                            ' Days ago</td>';
                                        tr +=
                                            '<td  class="text-center"> <a href="' + apiUrl +
                                            '/admin/activeProfile/' +
                                            item.id + "/" + item.profile.id +
                                            '" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-eye"></i></a> </td>';

                                        tr += '</tr>';
                                        $("#tbl_user tbody").append(tr);
                                        return ''

                                    } else {
                                        let tr = '<tr style="vertical-align:middle;">';
                                        if (item.file_path) {
                                            tr +=
                                                '<td class="fit"><div class="row w-100" ><div class="col" ><img style="height:40px;width:40px" class="rounded-pill" src="' +
                                                item.file_path + '">&nbsp;' + item.full_name +
                                                '</div></td>';
                                        } else {
                                            tr +=
                                                '<td class="fit"><div class="row w-100" ><div class="col" ><img style="height:40px;width:40px" class="rounded-pill" src="' +
                                                item.file_path + '">&nbsp;' + item.full_name +
                                                '</div></td>';
                                        }
                                        tr += '<td class="fit">' + item.profile_status + '</td>';
                                        tr += '<td class="fit">' + item
                                            .phone_number + '</td>';
                                        tr += '<td class="fit">' + item.position + '</td>';
                                        tr += '<td class="fit"> No Latest Invoice</td>';

                                        tr +=
                                            '<td  class="text-center"> <a href="' + apiUrl +
                                            '/admin/activeProfile/' +
                                            item.id + "/" + item.profile.id +
                                            '" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-eye"></i></a> </td>';
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
                                        $('#tbl_user_pagination .page-item:last-child').addClass('disabled');
                                    }
                                    let PreviousPage = res.data.links[0];
                                    if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url == null) {
                                        $('#tbl_user_pagination .page-item:first-child').addClass('disabled');
                                    }
                                }

                                $("#tbl_user_pagination .page-item .page-link").on('click', function() {
                                    $("#tbl_user_pagination .page-item").removeClass('active');
                                    let url = $(this).data('url')
                                    $.urlParam = function(name) {
                                        var results = new RegExp("[?&]" + name + "=([^&#]*)")
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
