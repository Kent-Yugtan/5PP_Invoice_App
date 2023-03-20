<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="https://shamcey.5ppsite.com/logo.png" type="image/x-icon">
  <title>5Pints Productions</title>


  @include('layouts.csslink')
  <!-- JQUERY UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
</head>

<body>
  <div id="app">
    <main class="py-5">
      @yield('content')
    </main>
  </div>
</body>
@include('layouts.script')
<!-- JQUERY UI -->
<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</html>