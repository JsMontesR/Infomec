@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Equipos</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('equipos.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Id</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="id" class="form-control" name="id" required autocomplete="id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Marca</label>

                            <div class="col-md-8">
                                <input id="marca" class="form-control" name="marca" required autocomplete="marca">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Serial</label>

                            <div class="col-md-8">
                                <input  id="numeroSerie" class="form-control" name="numeroSerie" required autocomplete="numeroSerie">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Clave ingreso</label>

                            <div class="col-md-8">
                                <input id="claveIngreso" class="form-control" name="claveIngreso" required autocomplete="claveIngreso">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Propietario</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="usuario" class="form-control" name="usuario" required autocomplete="usuario">
                            </div>
                        </div>

                        @include('listas.listausuariosseleccionable')

                        </div>

                        </div>

                        <div align="center">

                            @if(session()->has('success'))

                            <div class="alert alert-success" role="alert">{{session('success')}}</div>

                           @endif

                            <br>
                            <button type="submit" class="btn btn-primary">
                                Registrar equipo
                            </button>
                        </form>
                            <button type="submit" class="btn btn-warning">
                                Modificar equipo
                            </button>
                            <button type="submit" class="btn btn-secondary">
                                Limpiar campos
                            </button>
                            <button type="submit" class="btn btn-danger">
                                Eliminar equipo
                            </button>
                            
                        </div>

                        <br>
                    
                </div>
            </div>
        </div>

       
        <br>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Equipos registrados</div>
                    @include('listas.lista')
                    </div>
                </div>
            </div>
        </div>  

    </div>
</div>
<br>
@endsection
