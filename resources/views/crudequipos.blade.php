@extends('layouts.app')

@section('content')
<h1 align="center">Equipos</h1>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-70">
            <div class="card">
                <div class="card-header">Detalle equipos</div>

                <div class="card-body">
                    <form id="form1" name="form1" method="POST">
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
                            <input type="button" value="Registrar equipo" class="btn btn-primary" onclick= "registrarEquipo()" />

                            <input type="button" value="Modificar equipo" class="btn btn-warning" onclick= "modificarEquipo()" />

                            <input type="button" value="Limpiar campos" class="btn btn-secondary" onclick= "limpiarCampos()" />
                            
                            <input type="button" value="Eliminar equipo" class="btn btn-danger" onclick= "eliminarEquipo()" />

                             <script type="text/javascript">
                                
                                function registrarEquipo(){

                                    document.form1.action = '{{ route('equipos.store') }}';
                                    document.form1.submit();
                                }

                                function modificarEquipo(){

                                    document.form1.action = '{{ route('equipos.update') }}';
                                    document.form1.submit();
                                }

                                function eliminarEquipo(){
                                    var valor = document.getElementById('id').value;
                                    document.form1.action = '{{ route('equipos.delete') }}';    
                                    document.form1.submit();
                                }

                                function limpiarCampos(){
                                            document.getElementById('id').value = "";
                                            document.getElementById('marca').value = "";
                                            document.getElementById('numeroSerie').value = "";
                                            document.getElementById('claveIngreso').value = "";
                                            document.getElementById('usuario').value = "";

                                        }

                            </script>

                        </form>


                        </div>

                        <br>
                    
                </div>
            </div>
        </div>

       
        <br>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-70">
                    <div class="card">
                        <div class="card-header">Equipos registrados</div>
                    @include('listas.listaequiposseleccionable')
                    </div>
                </div>
            </div>
        </div>  

    </div>
</div>
<br>
@endsection
