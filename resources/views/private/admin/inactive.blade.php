@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">


        <div class="row bottom10">
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
            <div class="col-sm-8 bottom10" style="padding-right:8px;padding-left:8px;">
                <div class="w-100">
                    <div class="input-group" id="input-group-search">
                        <div class="input-group-prepend">
                            <span class="input-group-text search-right-icon border-search" id="border-search"><i
                                    class="fas fa-search"></i></span>
                        </div>
                        <input id="search" name="search" type="text"
                            class="search-left-icon form-control form-check-inline" placeholder="Search"
                            onfocus="input_group_focus('in','input-group-search')"
                            onfocusout="input_group_focus('out','input-group-search')">
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

                        <div id="tbl_user_wrapper" class="table-responsive" style="padding:20px">
                            <table style=" color: #A4A6B3; " class="table table-hover" id="tbl_user">
                                <thead>
                                    <tr>
                                        <th class="active fit" style="width: 10px">
                                            <input type="checkbox" class="select-all form-check-input" id="select-all" />
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
                                        <td class="text-center" colspan="6">Loading...</td>
                                    </tr>
                                </tbody>
                            </table>
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
    </div>

    <script type="text/javascript">
        function input_group_focus(option, id) {
            if (option == "out") {
                $('#' + id).removeClass('input-group-focused');
                $('#border-search').addClass('border-search');
            } else {
                $('#border-search').removeClass('border-search');
                $('#' + id).addClass('input-group-focused');
            }
        }
        $(document).ready(function() {
            $('#select-all').click(function(e) {
                $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
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

            $(window).on('load', function() {
                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $("div.spanner").removeClass("show");
                    active_profile_count();
                    inactive_profile_count();
                    show_data();
                }, 1500)
            })

            function active_profile_count() {
                axios.get(apiUrl + '/api/active_profile_count', {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                        console.log("active_profile_count", data);
                        $('#active_profile').html(data.data ? data.data : 0);
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            }

            function inactive_profile_count() {
                axios.get(apiUrl + '/api/inactive_profile_count', {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                        console.log("inactive_profile_count", data);
                        $('#inactive_profile').html(data.data ? data.data : 0);
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
                                    tr +=
                                        '<td class="active fit">  <input type="checkbox" class="select-item form-check-input" id="select-item" /></td>';
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

                                        // tr +=
                                        //     '<td  class="fit text-center"> <a href="' + apiUrl +
                                        //     '/admin/inactiveProfile/' +
                                        //     item.id + "/" + item.profile.id +
                                        //     '" class="" style="color:#CF8029"><i class="fa-sharp fa-solid fa-eye"></i></a> </td>';
                                        tr +=
                                            '<td  class=" text-center"><i class="fa-solid fa-ellipsis-vertical"></i></td>';

                                        tr += '</tr>';
                                        $(
                                            "#tbl_user tbody").append(tr);

                                    } else {
                                        let tr = '<tr style="vertical-align:middle;">';
                                        tr +=
                                            '<td class="active fit">  <input type="checkbox" class="select-item form-check-input" id="select-item" /></td>';
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

                                        // tr +=
                                        //     '<td class="text-center"> <a href="' + apiUrl +
                                        //     '/admin/inactiveProfile/' +
                                        //     item.id + "/" + item.profile.id +
                                        //     '" class="" style="color:#CF8029"><i class="fa-sharp fa-solid fa-eye"></i></a> </td>';
                                        tr +=
                                            '<td  class=" text-center"><i class="fa-solid fa-ellipsis-vertical"></i></td>';

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
