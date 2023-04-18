@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">

        <div class="row" style="padding-top:10px;">
            <div class="col-xs-5 col-sm-12 col-md-12 col-lg-6 bottom10">
                <div class="row">
                    <div class="col-sm-6 bottom10" style="padding-right:8px;padding-left:8px;">
                        <button class="btn w-100" style="color:white; background-color: #CF8029;" data-bs-toggle="modal"
                            data-bs-target="#addModal" type="submit" id="button-addon2">
                            <i class="fa fa-plus pe-1"></i>
                            Add Deduction Type
                        </button>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6 bottom10" style="padding-right:8px;padding-left:8px;">
                        <div class="w-100">
                            <div class="has-search">
                                <span class="fa fa-search form-control-feedback" style="color:#A4A6B3"></span>
                                <input type="text" class="form-control" id="search" name="search"
                                    placeholder="Search">
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
                    <div class="col-sm-6 bottom10" style="padding-right:8px;padding-left:8px;">
                        <button class="btn w-100" style="color:white; background-color: #CF8029" id="button_search"><i
                                class="fa-solid fa-magnifying-glass"></i> Search</button>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-sm-12 bottom10" style="padding-right:5px;padding-left:5px;">
                        <div class="card-border shadow bg-white h-100">
                            <div class="card-body">
                                <div class="table-responsive" style="padding:20px">
                                    <table style="color: #A4A6B3;" class="table table-hover table-responsive"
                                        id="table_deduction">
                                        <thead>
                                            <th class="fit">Deduction Name</th>
                                            <th class="fit">Amount</th>
                                            <th colspan="2" class="fit text-center">Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center" colspan="3">
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
    </div>
    <!-- START MODAL ADD -->
    <div class="modal fade" id="addModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="hide-content">
                <div class="modal-body ">
                    <div class="row">
                        <form id="deductiontype_store" class="g-3 needs-validation" novalidate>
                            @csrf
                            <div class="card-border shadow bg-white h-100" style="padding:20px">
                                <div class="card-body">
                                    <div class="row " id="header">
                                        <div class="col-md-12 w-100">
                                            <div class="row">
                                                <div class="col bottom20">
                                                    <span class="fs-3 fw-bold">Create Deduction Type</span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mobileValidate form-group-profile">
                                                        <label for="deduction_name" style="color:#A4A6B3">Deduction
                                                            Name</label>
                                                        <input id="deduction_name" name="deduction_name" type="text"
                                                            class="form-control" placeholder="Deduction Name"
                                                            onblur="validateDeductionname(this)" required>
                                                        <div id="error_deduction_name"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 bottom10">
                                                    <div class="form-group-profile">
                                                        <label for="deduction_amount" style="color:#A4A6B3">Amount</label>
                                                        <input id="deduction_amount" name="deduction_amount"
                                                            type="text" class="form-control" maxlength="6"
                                                            placeholder="Amount" required>
                                                        <div class="invalid-feedback">This field is required.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col bottom20">
                                                    <button type="button" id="close" class="btn  w-100"
                                                        style="color:#CF8029; background-color:#f3f3f3; ">Close</button>
                                                </div>
                                                <div class="col bottom20">
                                                    <button type="submit" class="btn  w-100"
                                                        style="color:White; background-color:#CF8029; ">Save</button>
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
    <!-- END MODAL ADD -->

    <!-- START MODAL EDIT -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="hide-content ">
                <div class="modal-body ">
                    <div class="row">
                        <form id="deductiontype_update" class="g-3 needs-validation" novalidate>
                            @csrf
                            <div class="card-border shadow bg-white h-100" style="padding:20px">
                                <div class="card-body">
                                    <div class="row " id="header">
                                        <div class="col-md-12 w-100">
                                            <div class="row">
                                                <div class="col bottom20">
                                                    <span class="fs-3 fw-bold">Update Deduction Type </span>
                                                </div>
                                            </div>
                                            <input type="text" id="deduction_id" hidden>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="mobileValidate form-group-profile">
                                                        <label for="edit_deduction_name" style="color:#A4A6B3">Deduction
                                                            Name</label>
                                                        <input id="edit_deduction_name" type="text"
                                                            class="form-control" placeholder="Deduction Name"
                                                            onblur="editValidateDeductionname(this)" required>
                                                        <div id="error_edit_deduction_name" class="invalid-feedback">This
                                                            field is required.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col bottom10">
                                                    <div class="form-group-profile">
                                                        <label for="edit_deduction_amount"
                                                            style="color:#A4A6B3">Amount</label>
                                                        <input id="edit_deduction_amount" type="text"
                                                            class="form-control" placeholder="Amount" required
                                                            maxlength="6">
                                                        <div class="invalid-feedback">This field is required.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col bottom20">
                                                    <button type="button" class="btn  w-100"
                                                        style="color:#CF8029; background-color:#f3f3f3; "
                                                        id="closedeductiontype_update">Close</button>
                                                </div>
                                                <div class="col bottom20">
                                                    <button type="submit" class="btn  w-100"
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

    <!-- END MODAL EDIT -->
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

    <!-- Modal FOR DELETE -->
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
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
                            <span id="deductionType_id" hidden></span>
                            <span class="text-muted"> Do you really want to delete these record? This process cannot be
                                undone.</span>
                        </div>
                    </div>

                    <div class="row pt-3 pb-3 px-3">
                        <div class="col-6">
                            <button type="button" class="btn  w-100" data-bs-dismiss="modal"
                                style="color:white; background-color:#A4A6B3;">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="deductionType_delete"
                                class="btn btn-danger w-100">Confirm</button>
                        </div>
                    </div>
                </div>
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
        const PHP = value => currency(value, {
            symbol: '',
            decimal: '.',
            separator: ','
        });

        // VALIDATE UPDATE
        function editValidateDeductionname(e) {
            let deduction_id = $('#deduction_id').val();
            let data = {
                id: deduction_id,
                deduction_name: e.value
            }
            axios.post(apiUrl + "/api/editValidateDeductionname", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#edit_deduction_name").removeClass('is-invalid');
                    $("#error_edit_deduction_name").removeClass('invalid-feedback').html("").show();
                    $('.mobileValidate').removeClass('form-group-adjust');
                } else {
                    $("#edit_deduction_name").removeClass('is-invalid');
                    $("#error_edit_deduction_name").removeClass('invalid-feedback').html("").show();
                    $('.mobileValidate').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                console.log("ERROR", error)
                if (error.response.data.errors.deduction_name) {
                    if (error.response.data.errors.deduction_name.length > 0) {

                        $error = error.response.data.errors.deduction_name[0];
                        if ($("#edit_deduction_name").val() == "") {
                            $("#error_edit_deduction_name").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('.mobileValidate').removeClass('form-group-adjust');
                        } else {

                            if ($error == "The deduction name has already been taken.") {
                                $("#error_edit_deduction_name").addClass('invalid-feedback').html(
                                    "The deduction name has already been taken.").show();
                            }
                            $('.mobileValidate').addClass('form-group-adjust');
                        }
                        $("#edit_deduction_name").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }
        // VALIDATE ON SAVE
        function validateDeductionname(e) {
            console.log("VALIDATE", e.value);
            let data = {
                deduction_name: e.value
            }
            axios.post(apiUrl + "/api/validateDeductionname", data, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    $("#deduction_name").removeClass('is-invalid');
                    $("#error_deduction_name").removeClass('invalid-feedback').html("").show();
                    $('.mobileValidate').removeClass('form-group-adjust');
                }
            }).catch(function(error) {
                if (error.response.data.errors.deduction_name) {
                    if (error.response.data.errors.deduction_name.length > 0) {
                        $error = error.response.data.errors.deduction_name[0];
                        if ($("#deduction_name").val() == "") {
                            $("#error_deduction_name").addClass('invalid-feedback').html(
                                "This field is required.").show();
                            $('.mobileValidate').removeClass('form-group-adjust');
                        } else {

                            if ($error == "The deduction name has already been taken.") {
                                $("#error_deduction_name").addClass('invalid-feedback').html(
                                    "The deduction name has already been taken.").show();
                            }
                            $('.mobileValidate').addClass('form-group-adjust');
                        }
                        $("#deduction_name").addClass('is-invalid');
                        console.log("Error");
                    }
                }
            })
        }


        $(document).ready(function() {

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
            // Get the current page's URL path
            var path = window.location.pathname;
            // Highlight the corresponding menu item
            var segments = path.split('/');
            $('#' + segments[1] + segments[2]).addClass('active');
            // console.log("SEGMENT", segments[1] + segments[2]);

            $(window).on('load', function() {
                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $("div.spanner").removeClass("show");
                    show_data();
                }, 1500);
            })

            $(document).on('click', '#button_search', function() {
                $('html,body').animate({
                    scrollTop: $('#sb-nav-fixed').offset().top
                }, 'slow');
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $("div.spanner").removeClass("show");
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
                                    tr += '<td class="fit">' + item.deduction_name +
                                        '</td>';
                                    tr += '<td class="fit ">' + PHP(
                                        item
                                        .deduction_amount).format()
                                    '</td>';
                                    tr +=
                                        '<td class="text-end"> <button value=' +
                                        item.id +
                                        ' class="editButton border-0 bg-transparent " data-bs-toggle="modal" data-bs-target="#editModal"  ><i class="fa-solid fa-pen-to-square" style="color:#CF8029"></i></button></td>';
                                    tr += '<td class="text-start"><button value=' +
                                        item.id +
                                        ' class="deleteButton border-0 bg-transparent " data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fa-solid fa-trash" style="color:#dc3545"></i></button></td>';
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
                                    '<tr><td colspan="6" class="text-center"><div class="noData" style="width:' +
                                    width +
                                    'px;position:sticky;overflow:hidden;left: 0px;font-size:25px"><i class="fas fa-database"></i><div><label class="d-flex justify-content-center" style="font-size:14px">No Data</label></div></div></td></tr>'
                                );
                            }
                        }
                    })
                    .catch(function(error) {
                        console.log("catch error", error);
                    });
            }

            $('#close').on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: $('#sb-nav-fixed').offset().top
                }, 'slow');
                $('#addModal').modal('hide');
                $("div.spanner").addClass("show");
                setTimeout(function() {
                    $('#deductiontype_store').trigger('reset');
                    $('#deductiontype_store').removeClass('was-validated');
                    $("#error_deduction_name").removeClass('invalid-feedback').html("").show();
                    $("div.spanner").removeClass("show");
                }, 1500)


            })

            $("#closedeductiontype_update").on('click', function(e) {
                e.preventDefault();
                location.reload(true);
            });


            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var deductiontype_store = $('#deductiontype_store')
            // Loop over them and prevent submission
            Array.prototype.slice.call(deductiontype_store)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

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
                            $('#addModal').modal('hide');
                            $('div.spanner').addClass('show');
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");
                                $('#deduction_name').val('');
                                $('#deduction_amount').val('');
                                $('input').removeClass('is-invalid');
                                $('.invalid-feedback').remove();
                                show_data();

                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>');
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(response.data.message);
                                $('#deductiontype_store').trigger('reset');
                                $('#deductiontype_store').removeClass('was-validated');
                                $('.mobileValidate').removeClass('form-group-adjust');
                                toast1.toast('show');
                            }, 1500)
                        }
                    })
                    .catch(function(error) {
                        console.log("error.response.data.errors", error.response.data.errors);
                        if (error.response.data.errors) {
                            // ERROR EMAIL
                            if (error.response.data.errors.deduction_name) {
                                if (error.response.data.errors.deduction_name.length > 0) {
                                    $error_deduction_name = error.response.data.errors.deduction_name[
                                        0];
                                    console.log("DEDUCTION NAME", $error_deduction_name);
                                    if ($error_deduction_name ==
                                        "The deduction name field is required.") {
                                        $("#error_deduction_name").addClass('invalid-feedback').html(
                                            "This field is required.").show();
                                    }

                                    if ($error_deduction_name ==
                                        "The deduction name has already been taken.") {
                                        $("#error_deduction_name").addClass('invalid-feedback').html(
                                            "The deduction name has already been taken.").show();
                                    }
                                }
                            } else {
                                $check = $('#deduction_name').val();
                                if ($check.length > 0) {
                                    $("#error_deduction_name").removeClass('invalid-feedback').html("")
                                        .show();
                                } else {
                                    $("#error_deduction_name").addClass('invalid-feedback').html(
                                        "This field is required.").show();
                                }

                            }
                        }
                    });

            })

            $('#deduction_amount').focusout(function() {
                if ($(this).val().length == "") {
                    let amount = $(this).val();
                    $('#deduction_amount').val(PHP(amount).format());
                } else {
                    let amount = $(this).val();
                    $('#deduction_amount').val(PHP(amount).format());
                }
            })
            $('#edit_deduction_amount').focusout(function() {
                if ($(this).val().length == "") {
                    let amount = $(this).val();
                    $('#edit_deduction_amount').val(PHP(amount).format());
                } else {
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

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var deductiontype_update = $('#deductiontype_update')
            // Loop over them and prevent submission
            Array.prototype.slice.call(deductiontype_update)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
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
                            $('div.spanner').addClass('show');
                            setTimeout(function() {
                                $("div.spanner").removeClass("show");

                                $('#notifyIcon').html(
                                    '<i class="fa-solid fa-check" style="color:green"></i>');
                                $('.toast1 .toast-title').html('Success');
                                $('.toast1 .toast-body').html(response.data.message);
                                $('#deductiontype_update').trigger('reset');
                                $('#deductiontype_update').removeClass('was-validated');
                                $('.mobileValidate').removeClass('form-group-adjust');
                                toast1.toast('show');
                                show_data();
                            }, 1500)
                        }
                    })
                    .catch(function(error) {
                        let errors = error.response.data.errors;
                        console.log("error", errors);
                        // if (error.response.data.errors) {
                        //     let fieldnames = Object.keys(errors);
                        //     Object.values(errors).map((item, index) => {
                        //         fieldname = fieldnames[0].split('_');
                        //         fieldname.map((item2, index2) => {
                        //             fieldname['key'] = capitalize(item2);
                        //             return ""
                        //         });
                        //         fieldname = fieldname.join(" ");
                        //         $('#notifyIcon').html(
                        //             '<i class="fa-solid fa-x" style="color:red"></i>');
                        //         $('.toast1 .toast-title').html("Error");
                        //         $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                        //             "\n\r"));
                        //     })
                        //     toast1.toast('show');
                        // }
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
                            scrollTop: $('#sb-nav-fixed').offset().top
                        }, 'smooth');
                        $('div.spanner').addClass('show');
                        setTimeout(function() {
                            $("div.spanner").removeClass("show");

                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
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
