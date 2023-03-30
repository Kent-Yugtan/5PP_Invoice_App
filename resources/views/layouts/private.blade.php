<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="https://shamcey.5ppsite.com/logo.png" type="image/x-icon">
  <title>5Pints Productions</title>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  @include('layouts.csslink')
  <!-- JQUERY UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
  <!-- CDN FOR JQUERY CONFIRM -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body id="sb-nav-fixed" style="background-color: #f8f9fa;">
  @if(session('data')->role == 'Admin')
  @include('layouts.admin.header')
  @else
  @include('layouts.employee.header')
  @endif
  <div id="layoutSidenav">
    @if(session('data')->role == 'Admin')
    @include('layouts.admin.sidemenu')
    @else
    @include('layouts.employee.sidemenu')
    @endif
    <div id="layoutSidenav_content">
      <main>
        @yield('content-dashboard')
      </main>
      @include('layouts.footer')
    </div>


  </div>
</body>
@include('layouts.script')


<!-- JQUERY UI -->
<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- CDN FOR JQUERY CONFIRM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!-- CDN FOR FORM VALIDATION -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

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


</html>