 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset("/assets/app/img/AdminLTELogo.png") }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SAIR 1.0.1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("assets/app/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><font style="vertical-align: inherit;"><span class="hidden-xs">{{session()->get('usuario_name') ?? 'Invitado'}}</span></font></a>
      
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
              @foreach ($menusComposer as $key => $item)
                  @if ($item["menu_id"] != 0)
                      @break
                  @endif
                  @include("theme.$theme.menu-item", ["item" => $item])
              @endforeach

                    <!-- Menu Footer-->
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link" >
              <i class="nav-icon fas fa-sign-out-alt "></i>

          <p>Salir</p>
            </a>
          </li>
        </li>
      

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>