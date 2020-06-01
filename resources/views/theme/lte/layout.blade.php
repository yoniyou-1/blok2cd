<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('titulo','CERTIFICATION')|SAIR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
    <!-- My Theme style -->
  <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @yield('styles')

</head>



<body class="hold-transition sidebar-mini layout-boxed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!--inicio header -->
    @include("theme/$theme/header")
    <!--fin header-->
    <!--inicio  -->
    @include("theme/$theme/aside")
    <!-- fin aside-->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">

        @yield('contenido')

      </section>

    </div>
    <!--inicio footer-->
    @include("theme/$theme/footer")
    <!--fin footer-->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- jQuery -->
  <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset("assets/$theme/dist/js/demo.js")}}"></script>

  @yield('scrpts')

</body>