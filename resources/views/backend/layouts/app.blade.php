<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('AdminLTE/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <link href="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></link>
  {{-- <link href="{{ asset('plugins/select2/select2.min.css') }}"></link> --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  @stack('styles')
 
</head>

<body class="sidebar-mini" style="height: auto;">
  <div class="wrapper">

    <!-- Navbar -->
    @include('backend.includes.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('backend.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 201px;">
      <!-- Content Header (Page header) -->
      @yield('breadcrumb-links')
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid" id="app">
          <!-- Small boxes (Stat box) -->
          @yield('content')
          
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('backend.includes.footer')

  </div>
  
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- <script src="{{ asset('plugins/select2/select2.min.js') }}"></script> --}}
  <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <script src="{{ asset('js/all.js') }}"></script>

  @stack('scripts')

</body>
</html>
