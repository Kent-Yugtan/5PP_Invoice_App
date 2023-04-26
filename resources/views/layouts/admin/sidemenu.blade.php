<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

        <div id="sideTitle" class="d-none">
            <img class="img-team" src="{{ URL('images/Invoices-logo.png') }}" style="width: 60px; padding:10px">
            <label class="d-flex align-items-center">Invoicing App</label>
        </div>

        <div class="sb-sidenav-menu" id="sb-sidenav-menu">
            <ul class="nav" id="nav">
                <li class="nav-item ">
                    <a class="nav-link collapsed" onmouseover="colorIcon1()" onmouseout="removeColorIcon1()"
                        id="admindashboard" href="{{ url('admin/dashboard') }}" data-bs-toggle="collapse"
                        data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <div class="sb-nav-link-icon">
                            <i style="color:#909294;width:20px;margin-right:5px" class="fa-solid fa-chart-pie"></i>
                        </div>
                        <span class="labelText">Dashboard </span>
                    </a>

                    <ul class="collapse d-none" id="dashboard" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <li><a class="nav-link" href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" id="profile" onmouseover="colorIcon2()"
                        onmouseout="removeColorIcon2()" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-users"></i>
                        </div>
                        <span class="labelText">Profiles</span>
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <ul class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/profile') }}">Add Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/current') }}">Current Profiles</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/inactive') }}">Inactive
                                Profiles</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link collapsed" id="invoice" onmouseover="colorIcon3()"
                        onmouseout="removeColorIcon3()" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                        <div class="sb-nav-link-icon">
                            <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-dollar-sign"></i>
                        </div>
                        <span class="labelText">Invoices </span>
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <ul class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <li class="nav-item"><a class="nav-link" href="{{ url('invoice/addInvoice') }}">Add Invoice</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('invoice/current') }}">Current
                                Invoices</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('invoice/inactive') }}">Inactive
                                Invoices</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" id="settingsdeductiontype" onmouseover="colorIcon4()"
                        onmouseout="removeColorIcon4()" href="{{ url('settings/deductiontype') }}"
                        data-bs-toggle="collapse" data-bs-target="#deductions" aria-expanded="false"
                        aria-controls="deductions">
                        <div class="sb-nav-link-icon">
                            <i style="color:#909294;width:20px;margin-right:5px" class="fa-solid fa-plus-minus"></i>
                        </div>
                        <span class="labelText">Deductions </span>
                    </a>

                    <ul class="collapse d-none" id="deductions" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('settings/deductiontype') }}">Deductions</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" onmouseover="colorIcon5()" onmouseout="removeColorIcon5()"
                        href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3"
                        aria-expanded="false" aria-controls="collapseLayouts3">
                        <div class="sb-nav-link-icon">
                            <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-table"></i>
                        </div>
                        <span class="labelText">Reports </span>
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <ul class="collapse" id="collapseLayouts3" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <li><a class="nav-link" href="{{ url('reports/deduction') }}">Deduction Reports</a></li>
                        <li><a class="nav-link" href="{{ url('reports/invoice') }}">Invoice Reports</a></li>
                    </ul>
                </li>
                <hr>

                <li class="nav-item">
                    <a class="nav-link collapsed" onmouseover="colorIcon6()" onmouseout="removeColorIcon6()"
                        href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts4"
                        aria-expanded="false" aria-controls="collapseLayouts4">
                        <div class="sb-nav-link-icon">
                            <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-gears"></i>
                        </div>
                        <span class="labelText"> Settings</span>
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <ul class="collapse" id="collapseLayouts4" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <li><a class="nav-link" href="{{ url('settings/emailconfig') }}">Email Configuration</a></li>
                        <li><a class="nav-link" href="{{ url('settings/invoiceconfig') }}">Invoice Configuration</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        {{-- <div class="sb-sidenav-menu">
            <div class="nav" id="nav">
                <a class="nav-link" onmouseover="colorIcon1()" onmouseout="removeColorIcon1()" id="admindashboard"
                    href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px;margin-right:5px" class="fa-solid fa-chart-pie"></i>
                    </div>
                    <span class="labelText">Dashboard </span>
                </a>

                <a class="nav-link collapsed" id="profile" onmouseover="colorIcon2()" onmouseout="removeColorIcon2()"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-users"></i>
                    </div>
                    <span class="labelText">Profiles</span>
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

                <a class="nav-link collapsed" id="invoice" onmouseover="colorIcon3()" onmouseout="removeColorIcon3()"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false"
                    aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-dollar-sign"></i>
                    </div>
                    <span class="labelText">Invoices </span>
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

                <a class="nav-link" id="settingsdeductiontype" onmouseover="colorIcon4()"
                    onmouseout="removeColorIcon4()" href="{{ url('settings/deductiontype') }}">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px;margin-right:5px" class="fa-solid fa-plus-minus"></i>
                    </div>
                    <span class="labelText">Deductions </span>
                </a>

                <a class="nav-link collapsed" onmouseover="colorIcon5()" onmouseout="removeColorIcon5()" href="#"
                    data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false"
                    aria-controls="collapseLayouts3">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-table"></i>
                    </div>
                    <span class="labelText">Reports </span>
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
                <a class="nav-link collapsed" onmouseover="colorIcon6()" onmouseout="removeColorIcon6()"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts4"
                    aria-expanded="false" aria-controls="collapseLayouts4">
                    <div class="sb-nav-link-icon">
                        <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-gears"></i>
                    </div>
                    <span class="labelText"> Settings</span>
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
        </div> --}}




    </nav>

</div>

<script>
    function colorIcon1() {
        $(".fa-chart-pie").css('color', '#CF8029');
    }

    function removeColorIcon1() {
        $(".fa-chart-pie").css('color', '#909294');
    }

    function colorIcon2() {
        $(".fa-users").css('color', '#CF8029');
    }

    function removeColorIcon2() {
        $(".fa-users").css('color', '#909294');
    }

    function colorIcon3() {
        $(".fa-dollar-sign").css('color', '#CF8029');
    }

    function removeColorIcon3() {
        $(".fa-dollar-sign").css('color', '#909294');
    }

    function colorIcon4() {
        $(".fa-plus-minus").css('color', '#CF8029');
    }

    function removeColorIcon4() {
        $(".fa-plus-minus").css('color', '#909294');
    }

    function colorIcon5() {
        $(".fa-table").css('color', '#CF8029');
    }

    function removeColorIcon5() {
        $(".fa-table").css('color', '#909294');
    }

    function colorIcon6() {
        $(".fa-gears").css('color', '#CF8029');
    }

    function removeColorIcon6() {
        $(".fa-gears").css('color', '#909294');
    }


    window.addEventListener("resize", () => {
        if (window.innerWidth >= 768) {
            sidebarToggle.classList.remove("sb-sidenav-toggled");
            localStorage.setItem("sb|sidebar-toggle", false);
        }
    });

    $(document).ready(function() {
        $("a#admindashboard").removeAttr(
            "data-bs-toggle data-bs-target"
        );
        $("a#settingsdeductiontype").removeAttr(
            "data-bs-toggle data-bs-target"
        );
        var windowWidth = $(window).width();
        if (windowWidth < 768) {
            if (windowWidth < 768) {
                console.log("<768");
                $('#sideTitle').removeClass("d-none").addClass("d-flex");

            } else {
                console.log(">768");
                $('#sideTitle').removeClass("d-flex").addClass("d-none");
            }
        }
        $(window).resize(function() {
            var windowWidth = $(window).width();

            if (windowWidth < 768) {
                console.log("<768");
                $('#sideTitle').removeClass("d-none").addClass("d-flex");

            } else {
                console.log(">768");
                $('#sideTitle').removeClass("d-flex").addClass("d-none");
            }
        });

    })
</script>
