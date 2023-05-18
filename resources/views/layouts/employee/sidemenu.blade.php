<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

        <div id="sideTitle" class="d-none">
            <img class="img-team" src="{{ URL('images/Invoices-logo.png') }}" style="width: 60px; padding:10px">
            <label class="d-flex align-items-center">Invoicing App</label>
        </div>

        <div class="sb-sidenav-menu" id="sb-sidenav-menu">
            <ul class="nav" id="nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" onmouseover="colorIcon1()" onmouseout="removeColorIcon1()"
                        id="userdashboard" href="{{ url('user/dashboard') }}" data-bs-toggle="collapse"
                        data-bs-target="#dashboarduser" aria-expanded="false" aria-controls="dashboarduser">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-chart-pie" style="color:#909294;width:20px;margin-right:5px;"></i>
                        </div>
                        <span class="labelText">Dashboard</span>
                    </a>

                    <ul class="collapse d-none" id="dashboarduser" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <li><a class="nav-link" href="{{ url('user/dashboard') }}">Dashboard</a></li>
                    </ul>
                </li>




                <li class="nav-item">
                    <a class="nav-link collapsed" id="userprofile" onmouseover="colorIcon2()"
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
                        <li>
                            <a class="nav-link" href="{{ url('user/profile') }}">My Profile</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" id="userinvoice" onmouseover="colorIcon3()"
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
                        <li><a class="nav-link" href="{{ url('user/addInvoice') }}">Add Invoice</a>
                        </li>
                        <li><a class="nav-link" href="{{ url('user/currentActiveInvoice') }}">Current
                                Invoices</a></li>

                        {{-- <li><a class="nav-link" href="{{ url('user/currentInactiveInvoice') }}">Inactive Invoices</a>
                        </li> --}}
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" id="userreport" onmouseover="colorIcon5()"
                        onmouseout="removeColorIcon5()" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts33" aria-expanded="false" aria-controls="collapseLayouts3">
                        <div class="sb-nav-link-icon">
                            <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-table"></i>
                        </div>
                        <span class="labelText">Reports </span>
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <ul class="collapse" id="collapseLayouts33" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <li><a class="nav-link" href="{{ url('userReports/deduction') }}">Deduction Reports</a></li>
                        <li><a class="nav-link" href="{{ url('userReports/invoice') }}">Invoice Reports</a></li>
                    </ul>
                </li>

                {{-- ANALYTICS LINES --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" onmouseover="colorIcon11()" onmouseout="removeColorIcon11()"
                        id="useranalytics" href="{{ url('user/analytics') }}" data-bs-toggle="collapse"
                        data-bs-target="#analytics" aria-expanded="false" aria-controls="analytics">
                        <div class="sb-nav-link-icon">
                            <i style="color:#909294;width:20px;margin-right:5px" class="fas fa-chart-bar"></i>
                        </div>
                        <span class="labelText">Analytics </span>
                    </a>

                    <ul class="collapse d-none" id="analytics" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <li class="nav-item"><a class="nav-link" href="{{ url('user/analytics') }}">Analytics</a>
                        </li>
                    </ul>
                </li>
                <hr>
            </ul>
        </div>
    </nav>
</div>
<script>
    function colorIcon11() {
        $(".fa-chart-bar").css('color', '#CF8029');
    }

    function removeColorIcon11() {
        $(".fa-chart-bar").css('color', '#909294');
    }

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
        $("a#userdashboard").removeAttr(
            "data-bs-toggle data-bs-target"
        );
        $("a#useruserdeductiontype").removeAttr(
            "data-bs-toggle data-bs-target"
        );
        $("a#useranalytics").removeAttr(
            "data-bs-toggle data-bs-target"
        );
        var windowWidth = $(window).width();
        if (windowWidth < 768) {
            if (windowWidth < 768) {
                // console.log("<768");
                $('#sideTitle').removeClass("d-none").addClass("d-flex");
            } else {
                // console.log(">=768");
                $('#sideTitle').removeClass("d-flex").addClass("d-none");
            }
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
    })
</script>
