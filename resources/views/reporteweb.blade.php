@extends('layouts.app')

@section('content')

@include('pdf.reporte')

@if(!$registros->isEmpty())

    <div align="center">
        <a href="{{ route($rutapdf) }}" class="btn btn-sm btn-primary btndiag">
                Descargar reporte en PDF
        </a>
        
    </div>
    <br>

@endif
@endsection

