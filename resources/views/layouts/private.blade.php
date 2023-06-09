<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL('images/Invoices-logo.png') }}" type="image/x-icon" style="border-radius:50%">
    <title>5Pints Productions</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" defer />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/css/tooltipster.min.css"
        defer />

    @include('layouts.csslink')

    <!-- JQUERY UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css" defer>

    {{-- DATEPICKER --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.1/dist/css/datepicker.min.css"
        defer>

    <!-- CDN FOR JQUERY CONFIRM -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"
        defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" defer>

</head>

<body class="sb-nav-fixed" id="sb-nav-fixed" style="background-color: #f8f9fa;">
    <!-- LOADER SPINNER -->
    <div class="spanner" style="display: flex;align-items: center;justify-content: center;position: fixed;">
        <div class="loader"></div>
    </div>
    <div id="layoutSidenav">
        @if (isset(session('data')->role) && session('data')->role == 'Admin')
            @include('layouts.admin.sidemenu')
        @elseif (isset(session('data')->role) && session('data')->role == 'Staff')
            @include('layouts.employee.sidemenu')
        @else
            @include('layouts.public.sidemenu')
        @endif


        <div id="layoutSidenav_content">

            @if (isset(session('data')->role) && session('data')->role == 'Admin')
                @include('layouts.admin.header')
            @elseif (isset(session('data')->role) && session('data')->role == 'Staff')
                @include('layouts.employee.header')
            @else
                @include('layouts.public.header')
            @endif
            <main>
                @yield('content-dashboard')
            </main>
            @include('layouts.footer')
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("div.spanner").addClass("show");
        document.body.style.overflow = 'hidden';
        setTimeout(function() {
            document.body.style.overflow = 'auto';
            $("div.spanner").removeClass("show");
        }, 1500)
    })
</script>
<!-- JQUERY UI -->

@include('layouts.script')
<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- CDN FOR JQUERY CONFIRM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!-- CDN FOR FORM VALIDATION -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.js">
</script>

<!-- DATATABLE -->
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script src=" https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


{{-- DATEPICKER --}}
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.1/dist/js/datepicker.min.js"></script>

</html>
