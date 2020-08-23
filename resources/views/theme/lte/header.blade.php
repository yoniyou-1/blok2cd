  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><font style="vertical-align: inherit;"><span class="hidden-xs">Hola, {{session()->get('usuario_name') ?? 'Invitado'}}</span></font></a>
      </li>     
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('logout')}}" class="nav-link" >Cerrar Sesion</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->