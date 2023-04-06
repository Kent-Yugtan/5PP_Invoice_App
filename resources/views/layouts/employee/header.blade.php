<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <div id="invoiceApp" class="d-flex">
        <img class="img-team" src="{{ URL('images/Invoices-logo.png') }}" style="width: 60px; padding:10px" />
        <a class="navbar-brand" href="{{ url('admin/dashboard') }}" style="width: 172px;">Invoicing App</a>
    </div>
    <div class="d-flex flex-sm-wrap">
        <button class="btn btn-link btn-sm order-lg-0 me-lg-0" id="sidebarToggle" href="#!">
            <i style="color:#CF8029" class="fas fa-bars"></i>
        </button>
        <span id='header_title' class="fs-3 fw-bold"></span>
    </div>


    <div class="collapse navbar-collapse" style="justify-content: flex-end;margin-right:8px">
        <div class="icons d-flex align-items-center">
            <span style="margin-right:10px"><i style="color:#A4A6B3;" class="fa-solid fa-magnifying-glass "></i></span>
            <span style="margin-right:10px"><i style="color:#A4A6B3;" class="fa-solid fa-bell "></i>
                <span class="badge bg-danger position-absolute" style="font-size: 8px;top:8px;right:65px">1</span>
            </span>
            <span style="margin-right:10px"><i style="color:#A4A6B3;"
                    class="fa-sharp fa-solid fa-grip-lines-vertical "></i></span>

            <ul class="navbar-nav ms-auto ms-sm-0 ">
                <li class="nav-item dropdown">
                    <button class="rounded-pill border-0" data-bs-toggle="dropdown" id="navbarDropdown"
                        href="#"><img class="rounded-pill" style="height:40px;width:40px;" role="button"
                            aria-expanded="false" src="/images/default.png"></button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item"></a></li>
                        <li><a class="dropdown-item"><span id="fullname"></span></a></li>
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

        $(window).resize(function() {
            var windowWidth = $(window).width();
            if (windowWidth < 768) {
                // console.log("<768");
                $('#invoiceApp').removeClass("d-flex").addClass("d-none");
            } else {
                // console.log(">=768");
                $('#invoiceApp').removeClass("d-none").addClass("d-flex");
            }
        });

        header_title();

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

            if (urlSplit[1] + urlSplit[2] == 'usereditInvoice') {
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
                    $('#fullname').html(data.data.user.first_name + " " + data.data.user.last_name);
                    $('#role').html(data.data.user.role);
                    // console.log("USERDATA", data);
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
