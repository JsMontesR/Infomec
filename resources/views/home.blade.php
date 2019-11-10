
@extends('layouts.app')
@section('content')
 

@auth



  <!-- Icon Cards-->
        <div class="row">
          @if(!(auth()->user()->rol === 'cliente'))
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-tags"></em>
                </div>
                <div class="mr-5" style="font-size:20px">Ordenes de servicio</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('servicios') }}">
                <span class="float-left">Ver ordenes de servicio</span>
                <span class="float-right">
                  <em class="fas fa-angle-right"></em>
                </span>
              </a>
            </div>
          </div>
          
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-desktop"></em>
                </div>
                <div class="mr-5" style="font-size:20px">Equipos</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('equipos') }}">
                <span class="float-left">Ver equipos</span>
                <span class="float-right">
                  <em class="fas fa-angle-right"></em>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-archive"></em>
                </div>
                <div class="mr-5" style="font-size:20px">Insumos</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('insumos') }}">
                <span class="float-left">Ver insumos</span>
                <span class="float-right">
                  <em class="fas fa-angle-right"></em>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-shopping-cart"></em>
                </div>
                <div class="mr-5" style="font-size:20px">Ventas</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('ventas') }}">
                <span class="float-left">Ver ventas</span>
                <span class="float-right">
                  <em class="fas fa-angle-right"></em>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-users"></em>
                </div>
                <div class="mr-5" style="font-size:20px">Proveedores</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('proveedores') }}">
                <span class="float-left">Ver proveedores</span>
                <span class="float-right">
                  <em class="fas fa-angle-right"></em>
                </span>
              </a>
            </div>
          </div>

          @if((auth()->user()->rol === 'administrador') || (auth()->user()->rol === 'tecnico'))

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-wrench"></em>
                </div>
                <div class="mr-5" style="font-size:20px">Revisiones</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('revisiones') }}">
                <span class="float-left">Ver revisiones</span>
                <span class="float-right">
                  <em class="fas fa-angle-right"></em>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-clipboard"></em>
                </div>
                <div class="mr-5 text-white" style="font-size:20px">Reportes</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('reportes') }}">
                <span class="float-left text-white">Ver reportes</span>
                <span class="float-right">
                  <em class="fas fa-angle-right text-white"></em>
                </span>
              </a>
            </div>
          </div>


          @endif

          @if((auth()->user()->rol === 'administrador'))

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-address-card"></em>
                </div>
                <div class="mr-5 text-dark" style="font-size:20px">Usuarios</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{ route('usuarios') }}">
                <span class="float-left text-dark">Ver usuarios</span>
                <span class="float-right">
                  <em class="fas fa-angle-right text-dark"></em>
                </span>
              </a>
            </div>
          </div>
          @endif
@endif

<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-secondary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <em class="fas fa-fw fa-chart-area"></em>
        </div>
        <div class="mr-5 text-white" style="font-size:20px">Haga su diagnóstico</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('diagnostica') }}">
        <span class="float-left text-white">Hacer diagnóstico</span>
        <span class="float-right">
          <em class="fas fa-angle-right text-white"></em>
        </span>
      </a>
    </div>
  </div>
</div>

@endauth
@endsection