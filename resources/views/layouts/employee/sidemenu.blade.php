<div id="layoutSidenav_nav">

  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

    <div class="sb-sidenav-menu">
      <div class="nav">

        <a class="nav-link" href="{{url('user/dashboard')}}">
          <div class="sb-nav-link-icon">
            <i class="fas fa-chart-line"></i>
          </div>
          Dashboard
        </a>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
          aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon">
            <i class="fas fa-users"></i>
          </div>
          Profiles
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{url('user/profile')}}">My Profile</a>
            <!-- <a class="nav-link" href="{{url('user/current')}}">Current Profiles</a>
            <a class="nav-link" href="{{url('user/inactive')}}">Inactive Profiles</a> -->
          </nav>
        </div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2"
          aria-expanded="false" aria-controls="collapseLayouts2">
          <div class="sb-nav-link-icon">
            <i class="fas fa-file-invoice"></i>
          </div>
          Invoices
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>
        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{url('user/addInvoice')}}">Add Invoice</a>
            <a class="nav-link" href="{{url('user/currentActiveInvoice')}}">Current Invoices</a>
            <a class="nav-link" href="{{url('user/currentInactiveInvoice')}}">Inactive Invoices</a>
          </nav>
        </div>

        <a class="nav-link" href="{{url('user/userdeductiontype')}}">
          <div class="sb-nav-link-icon">
            <i class="fa-solid fa-plus-minus"></i>
          </div>
          Deductions
        </a>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3"
          aria-expanded="false" aria-controls="collapseLayouts3">
          <div class="sb-nav-link-icon">
            <i class="fas fa-table"></i>
          </div>
          Reports
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>
        <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{url('userReports/deduction')}}">Deduction Reports</a>
            <a class="nav-link" href="{{url('userReports/invoice')}}">Invoice Reports</a>
          </nav>
        </div>
        <hr>
      </div>
    </div>
  </nav>
</div>