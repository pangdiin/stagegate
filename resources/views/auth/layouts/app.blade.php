<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stage Gate System | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="{{ asset('js/app.js') }}" defer></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
 
</head>
<body class="hold-transition login-page">
  <div id="app">
    @yield('content')
  </div>
</body>
</html>