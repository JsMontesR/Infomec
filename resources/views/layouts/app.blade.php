<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Infomec</title>

  <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

  <!-- Custom fonts for this template -->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

  <link href="{{asset('css/styles.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{route('home')}}">Infomec</a>

    @auth
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      
      <em class="fas fa-bars"></em>
     
    </button>
    @endauth

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      

      <!-- Authentication Links -->
        @guest
            <li class="nav-item no-arrow mx-1 ">
                <a class="nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            @endif
        @else
            <li class="nav-item dropdown no-arrow mx-1">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{ route('perfil') }}">
                        {{ __('My profile') }}
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>



                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
      
    </ul>

  </nav>

  <div id="wrapper">

    @auth
    <ul class="sidebar navbar-nav">

      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
          <em class="fas fa-fw fa-tachometer-alt"></em>
          <span>Panel de control</span>
        </a>
      </li>
      
      @if(!(auth()->user()->rol === 'cliente'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('servicios')}}">
          <em class="fas fa-fw fa-tags"></em>
          <span>Ordenes de servicio</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos')}}">
          <em class="fas fa-fw fa-desktop"></em>
          <span>Equipos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('insumos')}}">
          <em class="fas fa-fw fa-archive"></em>
          <span>Insumos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ventas')}}">
          <em class="fas fa-fw fa-shopping-cart"></em>
          <span>Ventas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('proveedores')}}">
          <em class="fas fa-fw fa-users"></em>
          <span>Proveedores</span></a>
      </li>
      
      @endif

      @if((auth()->user()->rol === 'administrador') || (auth()->user()->rol === 'tecnico'))

      <li class="nav-item">
        <a class="nav-link" href="{{route('revisiones')}}">
          <em class="fas fa-fw fa-wrench"></em>
          <span>Revisiones</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('reportes')}}">
          <em class="fas fa-fw fa-clipboard"></em>
          <span>Reportes</span></a>
      </li>

      @endif

     

      @if((auth()->user()->rol === 'administrador'))

      <li class="nav-item">
        <a class="nav-link" href="{{route('usuarios')}}">
          <em class="fas fa-fw fa-address-card"></em>
          <span>Usuarios</span></a>
      </li>
        
      @endif

      <li class="nav-item">
        <a class="nav-link" href="{{route('diagnostica')}}">
          <em class="fas fa-fw fa-chart-area"></em>
          <span>Haga su diagnóstico</span></a>
      </li>

      @endauth
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        @yield('content')

      </div>
      <!-- /.container-fluid -->
      @auth
      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Campo Virtual 2019 ©</span>
          </div>
        </div>
      </footer>

      @endauth

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <em class="fas fa-angle-up"></em>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->

</body>

</html>
