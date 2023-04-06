<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <div class="d-flex">
        <img class="img-team" src="{{ URL('images/Invoices-logo.png') }}" style="width: 60px; padding:10px" />
        <a class="navbar-brand" href="{{ url('admin/dashboard') }}" style="width: 172px;">Invoicing App</a>

    </div>

    <div class="d-flex">
        <button class="btn btn-link btn-sm order-lg-0 me-lg-0" id="sidebarToggle" href="#!">
            <i style="color:#CF8029" class="fas fa-bars"></i>
        </button>
        <span id='header_title' class="fs-3 fw-bold"></span>
    </div>


    <div class="collapse navbar-collapse" style="justify-content: flex-end;">
        <div class="icons">
            <div class="form-inline ms-auto me-sm-3 my-2 my-sm-0">
                <span><i style="color:#A4A6B3;" class="fa-solid fa-magnifying-glass me-4"></i></span>
                <span><i style="color:#A4A6B3;" class="fa-solid fa-bell me-4"></i></span>
                <span><i style="color:#A4A6B3;" class="fa-sharp fa-solid fa-grip-lines-vertical me-4"></i></span>
            </div>
        </div>

        <ul class="navbar-nav ms-auto ms-sm-0 me-lg-3">
            <li class="nav-item dropdown">
                <button class="rounded-pill border-0" data-bs-toggle="dropdown" id="navbarDropdown" href="#"><img
                        class="rounded-pill" style="height:40px;width:40px;" role="button" aria-expanded="false"
                        src="/images/default.png"></button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item"></a></li>
                    <li><a class="dropdown-item">{{ session('data')->first_name }} {{ session('data')->last_name }}</a>
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
</nav>
<script>
    $(document).ready(function() {
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
                $("#header_title").html('Deductions');
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
                if (data.success) {
                    $(".rounded-pill").attr("src", data.data.file_path ? data.data.file_path :
                        '/images/default.png');
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
