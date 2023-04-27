@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">

        <div class="row" style="padding-top:10px">
            <div class="col-sm-12 col-md-12 col-lg-4 bottom10" style="padding-right:5px;padding-left:5px">
                <div class="card-border shadow bg-white h-100" style="padding:20px">
                    <div class="card-body">
                        <div class="header fs-3">
                            <!-- <i style="color:#CF8029" class="fas fa-clock"></i> -->
                            <label> Email Information</label>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <form id="emailconfigs_store" class="g-3 needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="mobileValidateFullname" class="form-group-profile">
                                                <label for="fullname" style=" color: #A4A6B3;">Fullname</label>
                                                <input id="fullname" name="fullname" type="text"
                                                    onblur="validateFullname(this)" class="form-control"
                                                    placeholder="Fullname" required>
                                                <div id="error_fullname" class="invalid-feedback">This field is required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div id="mobileValidateEmail" class="form-group-profile">
                                                <label for="email_address" style=" color: #A4A6B3;">Email Address</label>
                                                <input id="email_address" name="email_address" type="email"
                                                    class="form-control" placeholder="Email Address"
                                                    onblur="validateEmailConfig(this)" required>
                                                <div id="error_email_address" class="invalid-feedback">This field is
                                                    required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group-profile">
                                                <label for="title" style=" color: #A4A6B3;">Position</label>
                                                <input id="title" type="text" name="title" class="form-control"
                                                    placeholder="Position" required>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 bottom10">
                                            <div class="form-group-profile ">
                                                <label for="status" style=" color: #A4A6B3;">Status</label>
                                                <select class="form-select" name="status" id="status" required>
                                                    <option selected disabled value="" style=" color: #A4A6B3;">Please
                                                        Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                                <div class="invalid-feedback">This field is required.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-6 bottom20">
                                            <button type="button" id="cancel"
                                                style="color:#CF8029; background-color:#f3f3f3; "
                                                class="btn w-100">Cancel</button>
                                        </div>
                                        <div class="col-6 bottom20">
                                            <button type="submit"
                                                style="width:100%; color:white; background-color: #CF8029;"
                                                class="btn">Save</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-8 bottom10" style="padding-right:5px;padding-left:5px">
                <div class="card-border shadow bg-white h-100" style="padding:20px">
                    <div class="card-body">
                        <div class="header ">
                            <span class="fs-3"> View Email Information</span>
                        </div>
                        <div class="row  pt-3">
                            <div class="col-sm-6 bottom20">
                                <div class="w-100">
                                    <div class="has-search">
                                        <span class="fa fa-search form-control-feedback" style="color:#A4A6B3"></span>
                                        <input type="text" class="form-control" id="search" name="search"
                                            placeholder="Search">
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6 bottom20">
                                <button type="submit" class="btn w-100" style="color:white; background-color: #CF8029"
                                    id="button_search">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="table-responsive" style="max-height:214px !important">
                                    <table style="color: #A4A6B3;" class="table table-hover table-responsive"
                                        id="table_emailconfigs">
                                        <thead>
                                            <th class="fit">Fullname</th>
                                            <th class="fit">Email Address</th>
                                            <th class="fit">Position</th>
                                            <th class="fit">Status</th>
                                            <th class="fit" colspan="2" style="text-align:center">Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center" colspan="5">
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
                                <div class="d-none" id="selectEmailConfigs">
                                    <div class="input-group" style="width:145px !important">
                                        <select id="tbl_showing_emailConfigsPages" class="form-select">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select>
                                        <span class="input-group-text border-0">/Page</span>
                                    </div>
                                </div>
                                <div style="display:flex;justify-content:center;"
                                    class="page_showing pagination-alignment " id="tbl_showing"></div>
                                <div class="pagination-alignment" style="display:flex;justify-content:center;">
                                    <ul style="display:flex;justify-content:flex-start;margin-top:15px"
                                        class="pagination pagination-sm flex-sm-wrap" id="tbl_pagination">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal FOR EDIT Email Configuration -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="hide-content">
                <div class="row">
                    <div class="modal-body ">
                        <form id="emailconfigs_update" class="g-3 needs-validation" novalidate>
                            @csrf
                            <div class="card-border shadow bg-white h-100" style="padding:20px">
                                <div class="card-body">
                                    <div class="row" id="header">
                                        <div class="col-md-12 w-100">
                                            <div class="row ">
                                                <div class="col bottom20">
                                                    <span class="fs-3 fw-bold"> Update Email Configuration</span>
                                                </div>
                                            </div>

                                            <input type="text" id="emailconfig_id" hidden>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div id="editMobileValidateFullname" class="form-group-profile">
                                                        <label for="edit_fullname" style="color:#A4A6B3">Fullname</label>
                                                        <input id="edit_fullname" name="edit_fullname" type="text"
                                                            class="form-control" placeholder="Fullname"
                                                            onblur="editValidateFullname(this)" required>
                                                        <div id="error_edit_fullname" class="invalid-feedback">This field
                                                            is
                                                            required.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div id="editMobileValidateEmail" class="form-group-profile">
                                                        <label for="edit_email_address" style="color:#A4A6B3">Email
                                                            Address</label>
                                                        <input id="edit_email_address" name="edit_email_address"
                                                            type="text" class="form-control"
                                                            placeholder="Email Address"
                                                            onblur="editValidateEmailConfig(this)" required>
                                                        <div id="error_edit_email_address" class="invalid-feedback">This
                                                            field
                                                            is
                                                            required.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group-profile">
                                                        <label for="edit_title" style="color: #A4A6B3;">Position</label>
                                                        <input id="edit_title" name="edit_title" type="text"
                                                            class="form-control" placeholder="Position" required>
                                                        <div class="invalid-feedback">This field is required.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 bottom10">
                                                    <div class="form-group-profile">
                                                        <label for="edit_status" style=" color: #A4A6B3;">Status</label>
                                                        <select class="form-select" name="edit_status" id="edit_status"
                                                            required>
                                                            <option selected disabled value="">Please Select Status
                                                            </option>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        </select>
                                                        <div class="invalid-feedback">This field is required.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col bottom20">
                                                    <button type="button" class="btn w-100"
                                                        style="color:#CF8029; background-color:#f3f3f3; "
                                                        id="closeUpdate">Close</button>
                                                </div>
                                                <div class="col bottom20">
                                                    <button type="submit" class="btn w-100"
                                                        style="color:White; background-color:#CF8029; ">Update</button>
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
    </div>

    <div style="position:fixed;top:60px;right:20px;z-index:99999;justify-content:flex-end;display:flex;">
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

    <!-- Modal FOR DELETE Email Configuration -->
    <div class="modal fade" id="deleteModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="top:30px;">
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
                            <span id="email_configId" hidden></span>
                            <span class="text-muted"> Do you really want to delete this record? This process cannot be
                                undone.</span>
                        </div>
                    </div>

                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn w-100" style="color:white; background-color:#A4A6B3;"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="email_configDelete" class="btn btn-danger w-100">Confirm</button>
                        </div>
                    </div>
                </div>
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
        // VALIDATE UPDATE
        function editValidateFullname(e) {
            console.log("FULLNAME", e.value);
            let emailconfig_id = $('#emailconfig_id').val();
            let data = {
                id: emailconfig_id,
                fullname: e.value
            }
            axios.post(apiUrl + "/api/editValidateFullname", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#edit_fullname").removeClass('is-invalid');
                    $("#error_edit_fullname").removeClass('invalid-feedback').html("").show();
                    $('#editMobileValidateFullname').removeClass('form-group-adjust');
                } else {
                    $("#edit_fullname").removeClass('is-invalid');
                    $("#error_edit_fullname").removeClass('invalid-feedback').html("").show();
                    $('#editMobileValidateFullname').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error);
                if (error.response.data.errors.fullname) {
                    if (error.response.data.errors.fullname.length > 0) {
                        $error = error.response.data.errors.fullname[0];
                        if ($("#edit_fullname").val() == "") {
                            $("#error_edit_fullname").addClass('invalid-feedback').html(
                                "This field is required.").show();
                        } else {

                            if ($error == "The fullname has already been taken.") {
                                $("#error_edit_fullname").addClass('invalid-feedback').html(
                                    "The fullname has already been taken.").show();
                                $('#editMobileValidateFullname').addClass('form-group-adjust');
                            }
                        }
                        $("#edit_fullname").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }

        function editValidateEmailConfig(e) {
            let emailconfig_id = $('#emailconfig_id').val();
            let data = {
                id: emailconfig_id,
                email_address: e.value
            }
            axios.post(apiUrl + "/api/editValidateEmailConfig", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#edit_email_address").removeClass('is-invalid');
                    $("#error_edit_email_address").removeClass('invalid-feedback').html("").show();
                    $('#editMobileValidateEmail').removeClass('form-group-adjust');
                } else {
                    $("#edit_email_address").removeClass('is-invalid');
                    $("#error_edit_email_address").removeClass('invalid-feedback').html("").show();
                    $('#editMobileValidateEmail').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error);
                if (error.response.data.errors.email_address) {
                    if (error.response.data.errors.email_address.length > 0) {
                        $error = error.response.data.errors.email_address[0];
                        if ($("#edit_email_address").val() == "") {
                            $("#error_edit_email_address").addClass('invalid-feedback').html(
                                "This field is required.").show();
                        } else {
                            if ($error == "The email address has already been taken.") {
                                $("#error_edit_email_address").addClass('invalid-feedback').html(
                                    "The email address has already been taken.").show();
                                $('#editMobileValidateEmail').addClass('form-group-adjust');
                            }
                            if ($error == "The email address must be a valid email address.") {
                                $("#error_edit_email_address").addClass('invalid-feedback').html(
                                    "The email address must be a valid").show();
                                $('#editMobileValidateEmail').removeClass('form-group-adjust');
                            }
                        }
                        $("#edit_email_address").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }

        // VALIDATE ON SAVE
        function validateFullname(e) {
            let data = {
                fullname: e.value
            }
            axios.post(apiUrl + "/api/validateFullname", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#fullname").removeClass('is-invalid');
                    $("#error_fullname").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateFullname').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error);
                if (error.response.data.errors.fullname) {
                    if (error.response.data.errors.fullname.length > 0) {
                        $error = error.response.data.errors.fullname[0];
                        if ($("#fullname").val() == "") {
                            $("#error_fullname").addClass('invalid-feedback').html(
                                "This field is required.").show();
                        } else {

                            if ($error == "The fullname has already been taken.") {
                                $("#error_fullname").addClass('invalid-feedback').html(
                                    "The fullname has already been taken.").show();
                                $('#mobileValidateFullname').addClass('form-group-adjust');
                            }
                        }
                        $("#fullname").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }

        function validateEmailConfig(e) {
            let data = {
                email_address: e.value
            }
            axios.post(apiUrl + "/api/validateEmailConfig", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#email_address").removeClass('is-invalid');
                    $("#error_email_address").removeClass('invalid-feedback').html("").show();
                    $('#mobileValidateEmail').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error);
                if (error.response.data.errors.email_address) {
                    if (error.response.data.errors.email_address.length > 0) {
                        $error = error.response.data.errors.email_address[0];
                        if ($("#email_address").val() == "") {
                            $("#error_email_address").addClass('invalid-feedback').html(
                                "This field is required.").show();
                        } else {

                            if ($error == "The email address has already been taken.") {
                                $("#error_email_address").addClass('invalid-feedback').html(
                                    "The email address has already been taken.").show();
                                $('#mobileValidateEmail').addClass('form-group-adjust');
                            }

                            if ($error == "The email address must be a valid email address.") {
                                $("#error_email_address").addClass('invalid-feedback').html(
                                    "The email address must be a valid").show();
                                $('#mobileValidateEmail').removeClass('form-group-adjust');
                            }
                        }
                        $("#email_address").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
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


            if (width > 768) {
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

            if (width > 768) {
                width = 'auto';
                $('.noData').css('width', width);
            }
        });
        $(document).ready(function() {
            let pageSize = 10; // initial page size
            $('div.spanner').addClass('show');
            setTimeout(function() {
                $("div.spanner").removeClass("show");
                show_data();
            }, 1500)




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

            let toast1 = $('.toast1');
            toast1.toast({
                delay: 5000,
                animation: true
            });

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

            $('#closeUpdate').on('click', function(e) {
                e.preventDefault();
                location.reload(true);
            })

            $('#cancel').on('click', function(e) {
                e.preventDefault();
                location.reload(true);
            })


            $('#button_search').on('click', function() {
                $("div.spanner").addClass('show');

                setTimeout(function() {
                    $("div.spanner").removeClass("show");
                    $('html,body').animate({
                        scrollTop: $('#sb-nav-fixed').offset().top
                    }, 'slow');
                    let search = $('#search').val();
                    show_data({
                        search
                    });
                }, 1500)
            })

            $('#tbl_showing_emailConfigsPages').on('change', function() {
                let pages = $(this).val();
                pageSize = pages; // update page size variable
                // Call the pendingInvoices() function with updated filters
                show_data({
                    page_size: pages
                });
            })


            // SHOW DATA
            function show_data(filters) {
                let filter = {
                    page_size: pageSize,
                    page: 1,
                    ...filters,
                }
                $('#table_emailconfigs tbody').empty();
                axios.get(`${apiUrl}/api/emailconfigs/show_data?${new URLSearchParams(filter)}`, {
                        headers: {
                            Authorization: token,
                        },
                    })
                    .then(function(response) {
                        let data = response.data;
                        console.log("SUCCES", data);
                        if (data.success) {
                            if (data.data.data.length > 0) {
                                data.data.data.map((item) => {
                                    let tr = '<tr style="vertical-align: middle;">';
                                    tr += '<td hidden>' + item.id + '</td>';
                                    tr += '<td class="fit">' + item.fullname + '</td>';
                                    tr += '<td class="fit">' + item
                                        .email_address +
                                        '</td>';
                                    tr += '<td class="fit">' + item
                                        .title +
                                        '</td>';
                                    tr += '<td class="fit">' + item
                                        .status +
                                        '</td>';
                                    tr +=
                                        '<td class="text-center" style="width:20px" > <button value=' +
                                        item.id +
                                        ' class="editButton border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#editModal" > <i style="color:#CF8029" class="fa-solid fa-pen-to-square"></i></button></td>';
                                    tr +=
                                        '<td class="text-center " style="width:20px"> <button value=' +
                                        item.id +
                                        ' class="deleteButton border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#deleteModal" ><i style="color:#dc3545" class="fa-solid fa-trash"></i></button> </td>';
                                    tr += '</tr>';
                                    $("#table_emailconfigs tbody").append(tr);

                                    return ''
                                })

                                $('#tbl_pagination').empty();
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

                                    $('#tbl_pagination').append(li);
                                    return "";
                                });

                                if (data.data.links.length) {
                                    let lastPage = data.data.links[data.data.links.length - 1];
                                    if (lastPage.label == 'Next &raquo;' && lastPage.url == null) {
                                        $('#tbl_pagination .page-item:last-child').addClass('disabled');
                                    }
                                    let PreviousPage = data.data.links[0];
                                    if (PreviousPage.label == '&laquo; Previous' && PreviousPage.url ==
                                        null) {
                                        $('#tbl_pagination .page-item:first-child').addClass('disabled');
                                    }
                                }

                                $("#tbl_pagination .page-item .page-link").on('click', function() {
                                    let url = $(this).data('url')
                                    $.urlParam = function(name) {
                                        var results = new RegExp("[?&]" + name + "=([^&#]*)")
                                            .exec(
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
                                let table_emailconfigs =
                                    `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                                $('#tbl_showing').html(table_emailconfigs);
                                $('#selectEmailConfigs').removeClass('d-none');
                            } else {
                                $("#table_emailconfigs tbody").append(
                                    '<tr style="vertical-align: middle;"><td colspan="6" class="text-center"><div class="noData" style="width:' +
                                    width +
                                    'px;position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                                );
                                let table_emailconfigs =
                                    `Showing 0 to 0 of 0 entries`;
                                $('#tbl_showing').html(table_emailconfigs);
                                $('#selectEmailConfigs').addClass('d-none');
                            }
                        }
                    })
                    .catch(function(error) {
                        console.log("catch error", error);
                    });

            }

            // CLICK TO EDIT BUTTON
            $(document).on('click', '.editButton', function(e) {
                e.preventDefault();
                let id = $(this).val();
                $('#emailconfig_id').val(id);

                axios
                    .get(apiUrl + '/api/emailconfigs/show_edit/' + id, {
                        headers: {
                            Authorization: token,
                        },
                    })
                    .then(function(response) {
                        let data = response.data;
                        console.log("SUCCESS", data.data);
                        if (data.success) {
                            $('#emailconfigs_store').trigger('reset');
                            $('#emailconfigs_store').removeClass('was-validated');
                            $('#edit_fullname').val(data.data.fullname);
                            $('#edit_email_address').val(data.data.email_address);
                            $('#edit_title').val(data.data.title);
                            $('#edit_status').val(data.data.status);

                        } else {
                            console.log("ERROR");
                        }

                    }).catch(function(error) {
                        console.log("ERROR", error);
                    });
            })

            $(document).on('click', '#table_emailconfigs .deleteButton', function(e) {
                e.preventDefault();

                $('#emailconfigs_store').trigger('reset');
                $('#emailconfigs_store').removeClass('was-validated');
                let row = $(this).closest('td');
                let email_configId = row.find(".deleteButton").val();
                $("#email_configId").html(email_configId);
            })

            // DELETE EMAIL CONFIG
            $("#email_configDelete").on('click', function(e) {

                e.preventDefault();
                let id = $('#email_configId').html();
                console.log("ID", id);
                axios
                    .post(apiUrl + '/api/email_configDelete/' + id, {}, {
                        headers: {
                            Authorization: token,
                        },
                    })
                    .then(function(response) {
                        let data = response.data;
                        console.log("SUCCESS", data.data);
                        if (data.success) {
                            $('#deleteModal').modal('hide');
                            $('div.spanner').addClass('show');
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");

                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(response.data.message);
                                toast1.toast('show');
                                show_data();
                            }, 1500)
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
                    });
            })


            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var emailconfigs_store = $('#emailconfigs_store')
            // Loop over them and prevent submission
            Array.prototype.slice.call(emailconfigs_store)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

            // CLICK TO STORE DATA
            $('#emailconfigs_store').submit(function(e) {
                e.preventDefault();

                let fullname = $('#fullname').val();
                let email_address = $('#email_address').val();
                let title = $('#title').val();
                let status = $('#status').val();

                let data = {
                    fullname: fullname,
                    email_address: email_address,
                    title: title,
                    status: status,
                }
                axios
                    .post(apiUrl + '/api/emailconfigs_store', data, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            // console.log('success', data);
                            $('div.spanner').addClass('show');
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");

                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(response.data.message);
                                $('#emailconfigs_store').trigger('reset');
                                $('#emailconfigs_store').removeClass('was-validated');
                                $('#mobileValidateFullname').removeClass('form-group-adjust');
                                $('#mobileValidateEmail').removeClass('form-group-adjust');
                                toast1.toast('show');
                                show_data();
                            }, 1500)
                        }

                    }).catch(function(error) {
                        let errors = error.response.data.errors;
                        console.log("ERROR", errors)
                        if (error.response.data.errors) {
                            // ERROR FULLNAME
                            if (error.response.data.errors.fullname) {
                                if (error.response.data.errors.fullname.length > 0) {
                                    $error_fullname = error.response.data.errors.fullname[
                                        0];
                                    if ($error_fullname ==
                                        "The fullname field is required.") {
                                        $("#error_fullname").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }

                                    if ($error_fullname ==
                                        "The fullname has already been taken.") {
                                        $("#error_fullname").addClass('invalid-feedback').html(
                                            "The fullname has already been taken.").show();
                                    }
                                }
                            } else {
                                $check = $('#fullname').val();
                                if ($check.length > 0) {
                                    $("#error_fullname").removeClass('invalid-feedback').html("")
                                        .show();
                                } else {
                                    $("#error_fullname").addClass('invalid-feedback').html(
                                        "This field is required.").show();
                                }

                            }
                            // ERROR EMAIL
                            if (error.response.data.errors.email_address) {
                                if (error.response.data.errors.email_address.length > 0) {
                                    $error_email_address = error.response.data.errors.email_address[
                                        0];
                                    console.log("DEDUCTION NAME", $error_email_address);
                                    if ($error_email_address ==
                                        "The email address field is required.") {
                                        $("#error_email_address").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }
                                    if ($error_email_address ==
                                        "The email address must be a valid email address.") {
                                        $("#error_email_address").addClass('invalid-feedback').html(
                                                "The email address must be a valid.")
                                            .show();
                                    }
                                    if ($error_email_address ==
                                        "The email address has already been taken.") {
                                        $("#error_email_address").addClass('invalid-feedback').html(
                                                "The email address has already been taken.")
                                            .show();
                                    }
                                }
                            } else {
                                $check = $('#email_address').val();
                                if ($check.length > 0) {
                                    $("#error_email_address").removeClass('invalid-feedback').html(
                                            "")
                                        .show();
                                } else {
                                    $("#error_email_address").addClass('invalid-feedback').html(
                                        "This field is required.").show();
                                }

                            }
                        }
                    });
            })

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var emailconfigs_update = $('#emailconfigs_update')
            // Loop over them and prevent submission
            Array.prototype.slice.call(emailconfigs_update)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

            // CLICK TO UPDATE DATA
            $('#emailconfigs_update').submit(function(e) {
                e.preventDefault();

                let update_id = $('#emailconfig_id').val();
                let edit_fullname = $('#edit_fullname').val();
                let edit_email_address = $('#edit_email_address').val();
                let edit_title = $('#edit_title').val();
                let edit_status = $('#edit_status').val();


                let data = {
                    id: update_id,
                    fullname: edit_fullname,
                    email_address: edit_email_address,
                    title: edit_title,
                    status: edit_status,
                }

                axios
                    .post(apiUrl + '/api/emailconfigs_store', data, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            $('#editModal').modal('hide');
                            $('div.spanner').addClass('show');
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");

                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>'
                                );
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(response.data.message);
                                $('#emailconfigs_update').trigger('reset');
                                $('#emailconfigs_update').removeClass('was-validated');
                                $('#editMobileValidateFullname').removeClass(
                                    'form-group-adjust');
                                $('#editMobileValidateEmail').removeClass('form-group-adjust');
                                toast1.toast('show');
                                show_data();
                            }, 1500)

                        }

                    }).catch(function(error) {
                        let errors = error.response.data.errors;
                        console.log("ERROR", errors)
                        if (error.response.data.errors) {
                            // ERROR FULLNAME
                            if (error.response.data.errors.fullname) {
                                if (error.response.data.errors.fullname.length > 0) {
                                    $error_edit_fullname = error.response.data.errors.fullname[
                                        0];
                                    if ($error_edit_fullname ==
                                        "The fullname field is required.") {
                                        $("#error_edit_fullname").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }

                                    if ($error_edit_fullname ==
                                        "The fullname has already been taken.") {
                                        $("#error_edit_fullname").addClass('invalid-feedback').html(
                                            "The fullname has already been taken.").show();
                                    }
                                }
                            } else {
                                $check = $('#edit_fullname').val();
                                if ($check.length > 0) {
                                    $("#error_edit_fullname").removeClass('invalid-feedback').html(
                                            "")
                                        .show();
                                } else {
                                    $("#error_edit_fullname").addClass('invalid-feedback').html(
                                        "This field is required.").show();
                                }

                            }
                            // ERROR EMAIL
                            if (error.response.data.errors.email_address) {
                                if (error.response.data.errors.email_address.length > 0) {
                                    $error_edit_email_address = error.response.data.errors
                                        .email_address[
                                            0];
                                    console.log("DEDUCTION NAME", $error_edit_email_address);
                                    if ($error_edit_email_address ==
                                        "The email address field is required.") {
                                        $("#error_edit_email_address").addClass('invalid-feedback')
                                            .html(
                                                "This field is required.").show();
                                    }
                                    if ($error_edit_email_address ==
                                        "The email address must be a valid email address.") {
                                        $("#error_edit_email_address").addClass('invalid-feedback')
                                            .html(
                                                "The email address must be a valid email address.")
                                            .show();
                                    }
                                    if ($error_edit_email_address ==
                                        "The email address has already been taken.") {
                                        $("#error_edit_email_address").addClass('invalid-feedback')
                                            .html(
                                                "The email address has already been taken.")
                                            .show();
                                    }
                                }
                            } else {
                                $check = $('#edit_email_address').val();
                                if ($check.length > 0) {
                                    $("#error_edit_email_address").removeClass('invalid-feedback')
                                        .html(
                                            "")
                                        .show();
                                } else {
                                    $("#error_edit_email_address").addClass('invalid-feedback')
                                        .html(
                                            "This field is required.").show();
                                }

                            }
                        }

                    });

            });

            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }

        })
    </script>
@endsection
