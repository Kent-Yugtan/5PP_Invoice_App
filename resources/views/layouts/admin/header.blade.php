<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <img class="img-team" src="{{ URL('images/Invoices-logo.png')}}" style="width: 60px; padding:10px" /></img>
    <!-- Navbar Brand-->
    <a class="navbar-brand" style=width:165px href="{{url('admin/dashboard')}}">Invoicing App</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search-->
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <!-- Navbar Search-->
    </div>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item">
                    </a>
                </li>
                <li><a class=" dropdown-item">Logged in as</a>
                </li>

                <li>
                    <a class=" dropdown-item fw-bold"> {{session('data')->first_name}} {{session('data')->last_name}}
                    </a>
                </li>

                <li>
                    <a class=" dropdown-item">{{session('data')->role}}</a>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" id="logout">
                        <span style="cursor: pointer;">{{ __('Logout') }}</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</nav>

<script>
$("#logout").on("click", function() {
    console.log('logout');
    axios.post(apiUrl + '/api/logout', {}, {
            headers: {
                Authorization: token,
            },
        })
        .then(function(response) {
            console.log('then', response);
            let data = response.data;
            console.log('then data', data);

            if (data.success) {
                localStorage.removeItem('token');
                // localStorage.userdata = JSON.parse(data.user);
                window.location.replace(apiUrl + '/auth/login');
            }
        })
        .catch(function(error) {
            console.log('catch', error);
        });
})
</script>