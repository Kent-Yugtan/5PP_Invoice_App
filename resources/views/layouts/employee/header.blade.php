<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
  <img class="img-team" src="{{ URL('images/Invoices-logo.png')}}" style="width: 60px; padding:10px" /></img>
  <!-- Navbar Brand-->
  <a class="navbar-brand" style=width:165px href="{{url('user/dashboard')}}">Invoicing App</a>
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
    <i style="color:#CF8029" class="fas fa-bars"></i>
  </button>
  <!-- Navbar Search-->
  <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    <!-- Navbar Search-->
  </div>


  <div style="width: 20%;
    height: 100%;
    display: flex;
    align-items: center;
    flex-direction: row;
    justify-content: flex-end">
    <span>{{session('data')->first_name}} {{session('data')->last_name}}&nbsp;</span>
    <img style="height:40px;width:40px;" class="rounded-pill" src="">
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <!-- <i class="fas fa-user fa-fw"></i> -->
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li>
            <a class="dropdown-item">
            </a>
          </li>
          <li><a class=" dropdown-item">Logged in as</a>
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