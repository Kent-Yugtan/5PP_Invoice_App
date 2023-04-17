<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <div id="invoiceApp" class="invoiceApp d-none">
        <img id="image" class="img-team" src="{{ URL('images/Invoices-logo.png') }}"
            style="width: 60px; padding:10px" />
        <a class="navbar-brand" href="{{ url('admin/dashboard') }}">Invoicing App</a>
        {{-- style="width: 172px;" --}}
    </div>
    <button class="btn btn-link btn-sm order-lg-0 me-lg-0" id="sidebarToggle" href="#!">
        <i style="color:#CF8029" class="fas fa-bars"></i>
    </button>
    <div class="d-flex flex-sm-wrap">
        <span id='header_title' class="fs-3 fw-bold"></span>
    </div>


    <div class="collapse navbar-collapse" style="justify-content: flex-end;margin-right:8px">
        <div class="d-flex align-items-center">
            <span class="icons d-none" style="margin-right:30px"><i style="color:#A4A6B3;"
                    class="fa-solid fa-magnifying-glass "></i></span>
            <span class="icons" style="margin-right:30px"><i style="color:#A4A6B3;" class="fa-solid fa-bell "></i>
                <div class="icons mobileLayout d-none">
                    <span class="custom-badge position-absolute"
                        style="font-size: 6px;top:16px;right:216px;background-color:#f8f9fa"><i
                            class="fa-solid fa-circle" style="color:#CF8029"></i></span>
                </div>
                <div class="icons webLayout d-none">
                    <span class="custom-badge position-absolute"
                        style="font-size: 6px;top:15px;right:141px;background-color:#f8f9fa"><i
                            class="fa-solid fa-circle" style="color:#CF8029"></i></span>
                </div>
            </span>
            <span class="icons d-none" style="padding-right:20px"><i style="color:#A4A6B3;"
                    class="fa-sharp fa-solid fa-grip-lines-vertical "></i></span>
            <div class="icons mobileLayout d-none">
                <span style="margin-right:15px">{{ session('data')->first_name }}
                    {{ session('data')->last_name }}</span>
            </div>
            <ul class="navbar-nav ms-auto ms-sm-0 pe-2">
                <li class="nav-item dropdown">
                    <button class="rounded-pill border-0" data-bs-toggle="dropdown" id="navbarDropdown" href="#">
                        <img class="rounded-pill" style="border:1px solid #CF8029" role="button" aria-expanded="false"
                            src="/images/default.png"></button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item"></a></li> --}}
                        <div class="webLayout d-none">
                            <li><a class="dropdown-item">{{ session('data')->first_name }}
                                    {{ session('data')->last_name }}</a>
                        </div>
                </li>
                <li><a class="dropdown-item">{{ session('data')->role }}</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" id="logout"><span
                            style="cursor: pointer;">{{ __('Logout') }}</span></a></li>
            </ul>
            </li>
            </ul>
        </div>
    </div>

</nav>

<script>
    $(document).ready(function() {

        var windowWidth = $(window).width();
        if (windowWidth < 445) {
            $('.icons').removeClass("d-flex").addClass("d-none");
        } else {
            $('.icons').removeClass("d-none").addClass("d-flex");
        }

        if (windowWidth < 768) {
            // console.log("<768");
            $('#invoiceApp').addClass("d-none");
            $('#header_title').removeClass("ps-3");
            $('.mobileLayout').removeClass("d-flex").addClass("d-none");
            $('.webLayout').removeClass("d-none").addClass("d-flex");
        } else {
            // console.log(">=768");
            $('#header_title').addClass("ps-3");
            $('#invoiceApp').removeClass("d-none").addClass("d-flex");
            $('.mobileLayout').removeClass("d-none").addClass("d-flex");
            $('.webLayout').removeClass("d-flex").addClass("d-none");
        }

        $(window).resize(function() {
            var windowWidth = $(window).width();
            if (windowWidth < 445) {
                $('.icons').removeClass("d-flex").addClass("d-none");
            } else {
                $('.icons').removeClass("d-none").addClass("d-flex");
            }
            if (windowWidth < 768) {
                // console.log("<768");
                $('#invoiceApp').addClass("d-none");
                $('#header_title').removeClass("ps-3");
                $('.mobileLayout').removeClass("d-flex").addClass("d-none");
                $('.webLayout').removeClass("d-none").addClass("d-flex");
            } else {
                // console.log(">=768");
                $('#header_title').addClass("ps-3");
                $('#invoiceApp').removeClass("d-none").addClass("d-flex");
                $('.mobileLayout').removeClass("d-none").addClass("d-flex");
                $('.webLayout').removeClass("d-flex").addClass("d-none");
            }
        });

        header_title();

        function header_title() {
            let url = window.location.pathname;
            let path = url.slice(1);
            let urlSplit = url.split("/");
            if (path == 'admin/dashboard') {
                $("#header_title").html('Dashboard');
            }

            if (path == 'admin/profile') {
                $("#header_title").html('Add Profile');
            }

            if (path == 'admin/current') {
                $("#header_title").html('Current Profile');
            }

            if (urlSplit[1] + urlSplit[2] == 'adminactiveProfile') {
                $("#header_title").html('View Profile');
            }

            if (urlSplit[1] + urlSplit[2] == 'admininactiveProfile') {
                $("#header_title").html('View Profile');
            }

            if (urlSplit[1] + urlSplit[2] == 'admineditInvoice') {
                $("#header_title").html('View Invoice');
            }

            if (path == 'admin/inactive') {
                $("#header_title").html('Inactive Profile');
            }

            if (path == 'invoice/addInvoice') {
                $("#header_title").html('Create Invoice');
            }

            if (path == 'invoice/current') {
                $("#header_title").html('Current Invoice');
            }
            if (path == 'invoice/inactive') {
                $("#header_title").html('Inactive Invoice');
            }
            if (path == 'settings/deductiontype') {
                $("#header_title").html('Deduction Types');
            }
            if (path == 'reports/deduction') {
                $("#header_title").html('Deduction Report');
            }
            if (path == 'reports/invoice') {
                $("#header_title").html('Invoice Report');
            }
            if (path == 'settings/emailconfig') {
                $("#header_title").html('Email Configuration');
            }
            if (path == 'settings/invoiceconfig') {
                $("#header_title").html('Invoice Configuration');
            }

            if (urlSplit[1] + urlSplit[2] == 'admineditInactiveInvoice') {
                $("#header_title").html('View Invoice');
            }

            if (urlSplit[1] + urlSplit[2] == 'invoiceeditInvoice') {
                $("#header_title").html('View Invoice');
            }
            if (urlSplit[1] + urlSplit[2] == 'invoiceeditInactiveInvoice') {
                $("#header_title").html('View Invoice');
            }

            console.log("url", urlSplit[1] + urlSplit[2]);
            console.log("path", path);

        }

        function show_user_data() {
            axios.get(apiUrl + '/api/user_data', {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data;
                if (data.data) {
                    $(".rounded-pill").attr("src", data.data.file_path ? data.data.file_path :
                        '/images/default.png');
                    $('#fullname').html(data.data.first_name + " " + data.data.last_name);
                    $('#role').html(data.data.role);
                }
            }).catch(function(error) {
                console.log('error', error);
            })
        }

        $("#logout").on("click", function() {
            axios.post(apiUrl + '/api/logout', {}, {
                    headers: {
                        Authorization: token,
                    },
                })
                .then(function(response) {
                    let data = response.data;
                    console.log('data', data);
                    if (data.success) {
                        localStorage.removeItem('token');
                        // localStorage.userdata = JSON.parse(data.user);
                        window.location.replace(apiUrl + '/');
                    }
                })
                .catch(function(error) {
                    console.log('catch', error);
                });
        })
        show_user_data();
    });
</script>
