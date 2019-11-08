
@extends('layouts.app')
@section('content')
        <!-- Icon Cards-->
@guest

@else

@if(!(auth()->user()->tipo === 'u'))
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-comments"></em>
                </div>
                <div class="mr-5">Ordenes de servicio</div>
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
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <em class="fas fa-fw fa-list"></em>
                </div>
                <div class="mr-5">Revisiones</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Ver revisiones</span>
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
                  <em class="fas fa-fw fa-square"></em>
                </div>
                <div class="mr-5">Equipos</div>
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
                  <em class="fas fa-fw fa-shopping-cart"></em>
                </div>
                <div class="mr-5">Insumos</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
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
                  <em class="fas fa-fw fa-user"></em>
                </div>
                <div class="mr-5">Clientes</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Ver clientes</span>
                <span class="float-right">
                  <em class="fas fa-angle-right"></em>
                </span>
              </a>
            </div>
          </div>
        </div>
@endif
@endauth
@endsection