@extends('layouts.app')
@section('content')
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-calendar-times"></i>
                </div>
                <div class="mr-5">Movimiento de predicciones por fecha</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('reportepredfecha')}}">
                <span class="float-left">Ver reporte</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-friends"></i>
                </div>
                <div class="mr-5">Usuarios que usan el servicio</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('reportusuarios')}}">
                <span class="float-left">Ver historial</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-cross"></i>
                </div>
                <div class="mr-5">Daños más frecuentes</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Ver reporte</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>

@endsection