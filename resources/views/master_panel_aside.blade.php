  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-success">
    <!-- Brand Logo -->
    <a href="{{ url('dashboard') }}" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <div class="brand-text font-weight-light text-center"><b class="text-uppercase">Kemenag</b> Sawahlunto</div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ (empty(auth()->user()->foto))? url('img/user.png') : url('img/'.auth()->user()->foto) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header text-uppercase">Navigation Panel</li>
          {!! Helper::single_menu('dashboard','dashboard','fa fa-dashboard', 'Dashboard') !!}
          
          {!!
            Helper::multiple_menu([
              'menu' => 'user',
              'submenu' => ['level_user','data_user']
            ],[
              'menu' => '#',
              'submenu' => ['level_user','data_user']
            ],[
              'menu' => 'fa fa-users',
              'submenu' => ['fa fa-circle-o','fa fa-circle-o']
            ],[
              'menu' => 'User',
              'submenu' => ['Level User','Data User']
            ]);
          !!}

          {!! Helper::single_menu('unit_pengolah','unit_pengolah','fa fa-asl-interpreting', 'Unit Pengolah') !!}
          
          {!!
            Helper::multiple_menu([
              'menu' => 'layanan',
              'submenu' => ['jenis_layanan','output_layanan','data_layanan','syarat_layanan']
            ],[
              'menu' => '#',
              'submenu' => ['jenis_layanan','output_layanan','data_layanan','syarat_layanan']
            ],[
              'menu' => 'fa fa-book',
              'submenu' => ['fa fa-circle-o','fa fa-circle-o','fa fa-circle-o','fa fa-circle-o']
            ],[
              'menu' => 'Layanan',
              'submenu' => ['Jenis Layanan','Output Layanan','Data Layanan','Syarat Layanan']
            ]);
          !!}

          {!! Helper::single_menu('pelayanan','pelayanan','fa fa-bullhorn', 'Pelayanan') !!}
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>