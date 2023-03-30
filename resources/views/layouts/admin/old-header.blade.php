<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
  <img class="img-team" src="{{ URL('images/Invoices-logo.png')}}" style="width: 60px; padding:10px" /></img>
  <!-- Navbar Brand-->
  <a class="navbar-brand" href="{{url('admin/dashboard')}}">Invoicing App</a>
  <!-- Sidebar Toggle-->
  <div>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
      <i style="color:#CF8029" class="fas fa-bars"></i>
    </button>
  </div>
  <!-- Navbar Search-->

  <div class="row">
    <div class="col-sm-12">
      <div class="icons">
        <div class="form-inline ms-auto me-sm-3 my-2 my-sm-0">
          <span><i style="color:#A4A6B3;" class="fa-solid fa-magnifying-glass me-4"></i></span>
          <span><i style="color:#A4A6B3;" class="fa-solid fa-bell me-4"></i></span>
          <span><i style="color:#A4A6B3;" class="fa-sharp fa-solid fa-grip-lines-vertical me-4"></i></span>
        </div>
      </div>

      <ul class="navbar-nav ms-auto ms-sm-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <button class="rounded-pill border-0" data-bs-toggle="dropdown" id="navbarDropdown" href="#"><img class="rounded-pill" style="height:40px;width:40px;" role="button" aria-expanded="false" src="/images/default.png"></button>
          <!-- <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false"> -->
          <!-- <i class="fas fa-user fa-fw"></i> -->
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item">
              </a>
            <li>
              <a class=" dropdown-item">{{session('data')->first_name}} {{session('data')->last_name}}</a>
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
    </div>
  </div>
</nav>

<script>
  $(document).ready(function() {
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

    function show_user_data() {
      axios.get(apiUrl + '/api/user_data', {
        headers: {
          Authorization: token
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          $(".rounded-pill").attr("src", data.data.file_path ? data.data.file_path : '/images/default.png');
        }
      }).catch(function(error) {
        console.log('error', error);
      })
    }

  })
</script>