@extends('layouts.app')

@section('content')

@include('pdf.reporte')

@if(!$registros->isEmpty())

    <center>
        <a href="{{ route('reportusuarios.pdf') }}" class="btn btn-sm btn-primary btndiag">
                Descargar reporte en PDF
        </a>
    </center>

@endif

@endsection