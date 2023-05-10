<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <div id="invoiceApp" class="invoiceApp d-none">
        <img class="img-team" src="{{ URL('images/Invoices-logo.png') }}" style="width: 60px; padding:10px" />
        <a class="navbar-brand" href="{{ url('user/dashboard') }}">Invoicing App</a>
    </div>

    <button class="btn btn-link btn-sm order-lg-0 me-lg-0" id="sidebarToggle" href="#!" style="padding-left:20px">
        <i style="color:#CF8029" class="fas fa-bars"></i>
    </button>
    <div class="d-flex flex-sm-wrap">
        <span id='header_title' class="fw-bold" style="font-size:18px"></span>
    </div>


    <div class="collapse navbar-collapse" style="justify-content: flex-end;margin-right:8px">
        <div class="icons d-flex align-items-center">
            <div class="icons mobileLayout d-none">
                <span class="icons d-none" style="margin-right:30px"><i style="color:#A4A6B3;"
                        class="fa-solid fa-magnifying-glass "></i></span>
                <span class="icons" style="margin-right:30px"><i style="color:#A4A6B3;" class="fa-solid fa-bell "></i>

                    <span class="custom-badge position-fixed"
                        style="margin-right:30px;font-size: 6px;top:16px;margin-left:7px;background-color:#f8f9fa"><i
                            class="fa-solid fa-circle" style="color:#CF8029"></i></span>
            </div>
            <div class="icons webLayout d-none">
                <span class="icons d-none" style="margin-right:30px"><i style="color:#A4A6B3;"
                        class="fa-solid fa-magnifying-glass "></i></span>
                <span class="icons" style="margin-right:30px"><i style="color:#A4A6B3;" class="fa-solid fa-bell "></i>
                    <span class="custom-badge position-fixed"
                        style="margin-right:30px;font-size: 6px;top:16px;margin-left:7px;background-color:#f8f9fa"><i
                            class="fa-solid fa-circle" style="color:#CF8029"></i></span>
            </div>
            </span>

            <span class="icons d-none" style="padding-right:20px">
                <i style="color:#A4A6B3;" class="fa-solid fa-grip-lines-vertical"></i>
            </span>

            <div class="mobileLayout d-none">
                <span style="margin-right:15px" class="fullname"></span>
            </div>

            <ul class="navbar-nav ms-auto ms-sm-0 pe-2">
                <li class="nav-item dropdown">
                    <button class=" rounded-pill border-0" data-bs-toggle="dropdown" id="navbarDropdown" href="#">
                        <img class="rounded-pill" role="button" style="border:1px solid #CF8029" aria-expanded="false"
                            src="/images/default.png">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="margin-right:10px"
                        aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item"></a></li> --}}
                        {{-- <div class="webLayout d-none">
                            <span class="fullname"></span>
                        </div> --}}
                        <li class="webLayout"><a class="dropdown-item"><span class="fullname"></span></a></li>
                        <li><a class="dropdown-item"><span id="role"></span></a></li>
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
        show_user_data();
        header_title();

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
                $('#invoiceApp').addClass("d-flex");
                $('.mobileLayout').removeClass("d-none").addClass("d-flex");
                $('.webLayout').removeClass("d-flex").addClass("d-none");
            }
        });

        function header_title() {
            let url = window.location.pathname;
            let path = url.slice(1);
            let urlSplit = url.split("/");
            if (path == 'user/dashboard') {
                $("#header_title").html('Dashboard');
            }

            if (path == 'user/profile') {
                $("#header_title").html('View Profile');
            }

            if (urlSplit[1] + urlSplit[2] == 'userprofileEditInvoice') {
                $("#header_title").html('View Invoice');
            }
            if (urlSplit[1] + urlSplit[2] == 'useractiveEditInvoice') {
                $("#header_title").html('View Invoice');
            }
            if (urlSplit[1] + urlSplit[2] == 'userinactiveEditInvoice') {
                $("#header_title").html('View Invoice');
            }

            if (path == 'user/addInvoice') {
                $("#header_title").html('Create Invoice');
            }
            if (path == 'user/currentActiveInvoice') {
                $("#header_title").html('Current Invoice');
            }
            if (path == 'user/currentInactiveInvoice') {
                $("#header_title").html('Inactive Invoice');
            }
            if (path == 'user/userdeductiontype') {
                $("#header_title").html('Deduction Types');
            }
            if (path == 'userReports/deduction') {
                $("#header_title").html('Deduction Report');
            }
            if (path == 'userReports/invoice') {
                $("#header_title").html('Invoice Report');
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
                if (data.success) {
                    $(".rounded-pill").attr("src", data.data.profile.file_path ? data.data.profile
                        .file_path :
                        '/images/default.png');
                    $('.fullname').html(data.data.first_name + " " + data.data.last_name);
                    $('#role').html(data.data.role);
                    console.log("USERDATA", data);
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

    });
</script>
