<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div id="sideTitle" class="d-none">
            <img class="img-team" src="{{ URL('images/Invoices-logo.png') }}" style="width: 60px; padding:10px">
            <label class="d-flex align-items-center">Invoicing App</label>
        </div>
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" id="admindashboard" href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px" class="fa-solid fa-chart-pie"></i>
                    </div>
                    Dashboard
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px" class="fas fa-users"></i>
                    </div>
                    Profiles
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse " id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/profile') }}">Add Profile</a>
                        <a class="nav-link" href="{{ url('admin/current') }}">Current Profiles</a>
                        <a class="nav-link" href="{{ url('admin/inactive') }}">Inactive Profiles</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px" class="fas fa-dollar-sign"></i>
                    </div>
                    Invoices
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('invoice/addInvoice') }}">Add Invoice</a>
                        <a class="nav-link" href="{{ url('invoice/current') }}">Current Invoices</a>
                        <a class="nav-link" href="{{ url('invoice/inactive') }}">Inactive Invoices</a>
                    </nav>
                </div>


                <a class="nav-link" id="settingsdeductiontype" href="{{ url('settings/deductiontype') }}">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px" class="fa-solid fa-plus-minus"></i>

                    </div>
                    Deductions
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px" class="fas fa-table"></i>
                    </div>
                    Reports
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('reports/deduction') }}">Deduction Reports</a>
                        <a class="nav-link" href="{{ url('reports/invoice') }}">Invoice Reports</a>
                    </nav>
                </div>
                <hr>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px" class="fas fa-cogs"></i>
                    </div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <!-- <a class="nav-link" href="{{ url('settings/deductiontype') }}"> Deductions Type</a> -->
                        <a class="nav-link" href="{{ url('settings/emailconfig') }}">Email Configuration</a>
                        <a class="nav-link" href="{{ url('settings/invoiceconfig') }}">Invoice Configuration</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>

<script>
    $(document).ready(function() {
        var windowWidth = $(window).width();
        if (windowWidth < 768) {
            var windowWidth = $(window).width();
            if (windowWidth < 768) {
                // console.log("<768");
                $('#sideTitle').removeClass("d-none").addClass("d-flex");
            } else {
                // console.log(">=768");
                $('#sideTitle').removeClass("d-flex").addClass("d-none");
            }
            $(window).resize(function() {
                var windowWidth = $(window).width();
                if (windowWidth < 768) {
                    // console.log("<768");
                    $('#sideTitle').removeClass("d-none").addClass("d-flex");
                } else {
                    // console.log(">=768");
                    $('#sideTitle').removeClass("d-flex").addClass("d-none");
                }
            });
        }

    })
</script>
