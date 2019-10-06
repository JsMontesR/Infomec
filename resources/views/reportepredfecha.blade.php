@extends('layouts.app')

@section('content')

@include('pdf.reporte')

@if(!$registros->isEmpty())

    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Area Chart Example</div>
      <div class="card-body">
    
        <canvas id="myAreaChart" width="100%" height="30"></canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <center>
        <a href="{{ route('reporte1.pdf') }}" class="btn btn-sm btn-primary btndiag">
                Descargar reporte en PDF
        </a>
    </center>
    <br>

    

   


@endif


@endsection

