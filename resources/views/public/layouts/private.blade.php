<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('images/invoices-logo.ico') }}" type="image/x-icon">
  <title>5Pints Productions</title>

  @include('public.layouts.csslink')
</head>

<body id="sb-nav-fixed">
  @include('public.layouts.admin.header')
  <div id="layoutSidenav">
    @include('public.layouts.admin.sidemenu')
    <div id="layoutSidenav_content">
      <main>
        @yield('content-dashboard')
      </main>
      @include('public.layouts.footer')
    </div>
    @include('public.layouts.script')
  </div>
</body>

</html>