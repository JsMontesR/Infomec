@extends('layouts.app')
@section('content')
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-calendar-times"></em>
                </div>
                <div class="mr-5">Movimiento de predicciones por fecha</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('reportepredfecha')}}">
                <span class="float-left">Ver reporte</span>
                <span class="float-right">
                  <em class="fas fa-angle-right"></em>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-user-friends"></em>
                </div>
                <div class="mr-5">Usuarios que usan el servicio</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('reportusuarios')}}">
                <span class="float-left">Ver historial</span>
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
                  <em class="fas fa-fw fa-brush"></em>
                </div>
                <div class="mr-5">Daños de hardware más frecuentes</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('reportfallahard')}}">
                <span class="float-left">Ver reporte</span>
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
                  <em class="fas fa-fw fa-cross"></em>
                </div>
                <div class="mr-5">Daños de software más frecuentes</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('reportfallasoft')}}">
                <span class="float-left">Ver reporte</span>
                <span class="float-right">
                  <em class="fas fa-angle-right"></em>
                </span>
              </a>
            </div>
          </div>


        </div>
      </div>

@endsection