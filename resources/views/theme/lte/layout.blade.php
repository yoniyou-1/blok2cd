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
  <!--link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"-->
  <link rel="stylesheet" href="{{asset("assets/css/ionicons/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
<!-- tut18 -->
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"-->
<link rel="stylesheet" href="{{asset("assets/css/jcss-sweetalert/toastr.min.css")}}">

<!--datatables plugin-->
<!--link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/-->
<!--dataTables.bootstrap4.min.css-->
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<!--link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet"/-->
<!-- css/buttons.dataTables.min.css se remplazara por buttons.bootstrap4.min.css-->
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">

<!--descartado bueno para minizar el tamano de las celdas-->
<!--link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"/-->
<!--fin datatables plugin-->
    <!-- My Theme style -->
      @yield('styles')
  <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">

  <!-- Google Font: Source Sans Pro -->
  <!--link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"-->



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

  <!--AdminLTE DataTables plugin-->
<!--script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script-->
<!-- jquery.dataTables.min.js-->
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<!--script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script-->
<!--dataTables.bootstrap4.min.js-->
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<!--script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script-->
<!--dataTables.buttons.min.js-->
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<!--script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.flash.min.js"></script-->
<!--buttons.flash.min.js-->
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.flash.min.js")}}"></script>
<!--integrando nuevo-->
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script-->
<!--jszip.min.js-->
<script src="{{asset("assets/$theme/plugins/jszip/jszip.min.js")}}"></script>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/pdfmake.min.js"></script-->
<!--pdfmake.min.js-->
<script src="{{asset("assets/$theme/plugins/pdfmake/pdfmake.min.js")}}"></script>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/vfs_fonts.js"></script-->
<!--vfs_fonts.js-->
<script src="{{asset("assets/$theme/plugins/pdfmake/vfs_fonts.js")}}"></script>
<!--script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script-->
<!--buttons.html5.min.js-->
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<!--script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script-->
<!--buttons.print.min.js-->
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<!--fin datatables plugin-->
  <!-- Jquery Plugins -->
  @yield('scriptsPlugins')
  <!-- Jquery validation -->
  <script src="{{asset("assets/js/jquery-validation/jquery.validate.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery-validation/localization/messages_es.min.js")}}"></script>
 <!-- tut18 -->
    <!--script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script-->
  <script src="{{asset("assets/js/jquery-sweetalert/sweetalert.min.js")}}"></script>
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script-->
    <script src="{{asset("assets/js/jquery-sweetalert/toastr.min.js")}}"></script>
    <script src="{{asset("assets/js/scripts.js")}}"></script>

  <script src="{{asset("assets/js/funciones.js")}}"></script>

  @yield('scripts')

</body>