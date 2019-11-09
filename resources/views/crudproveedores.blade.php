@extends('layouts.app')

@section('content')
<h1 align="center">Proveedores</h1>
<br>

 @if(session()->has('success'))

    <div class="alert alert-success" role="alert">{{session('success')}}</div>

@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                <div class="card-header" style="font-size:20px" align="center">Detalle proveedor</div>

                <div class="card-body">
                    <form id="form1" name="form1" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Id:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="id" class="form-control" name="id" required autocomplete="id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Nombre:</label>

                            <div class="col-md-8">
                                <input id="nombre" class="form-control" name="nombre" required autocomplete="nombre">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Email:</label>

                            <div class="col-md-8">
                                <input  id="email" class="form-control" name="email" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Teléfono:</label>

                            <div class="col-md-8">
                                <input id="telefono" class="form-control" name="telefono" required autocomplete="telefono">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Dirección:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="direccion" class="form-control" name="direccion" required autocomplete="direccion">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">NIT:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="NIT" class="form-control" name="NIT" required autocomplete="NIT">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Descripción:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="descripcion" class="form-control" name="descripcion" required autocomplete="descripcion">
                            </div>
                        </div>

                        </div>

                        </div>

                        <div align="center">

                           

                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Registrar" class="btn btn-primary" onclick= "registrarProveedor()" />

                            <input type="button" value="Modificar" class="btn btn-warning" onclick= "modificarProveedor()" />

                            </div>
                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Limpiar" class="btn btn-secondary" onclick= "limpiarCampos()" />
                            
                            <input type="button" value="Eliminar" class="btn btn-danger" onclick= "eliminarProveedor()" />
                            </div>
                             <script type="text/javascript">
                                
                                function registrarProveedor(){

                                    document.form1.action = '{{ route('proveedores.store') }}';
                                    document.form1.submit();
                                }

                                function modificarProveedor(){

                                    document.form1.action = '{{ route('proveedores.update') }}';
                                    document.form1.submit();
                                }

                                function eliminarProveedor(){
                                    var opcion = confirm("¿Está seguro que desea eliminar el proveedor seleccionado?");
                                    if(opcion){
                                        var valor = document.getElementById('id').value;
                                        document.form1.action = '{{ route('proveedores.delete') }}';    
                                        document.form1.submit();
                                    }
                                    
                                }

                                function limpiarCampos(){
                                            document.getElementById('id').value = "";
                                            document.getElementById('nombre').value = "";
                                            document.getElementById('email').value = "";
                                            document.getElementById('telefono').value = "";
                                            document.getElementById('direccion').value = "";
                                            document.getElementById('NIT').value = "";
                                            document.getElementById('descripcion').value = "";

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
                <div class="col-md">
                    <div class="card">
                        <div class="card-header" style="font-size:20px" align="center">Proveedores registrados</div>
                    
                    </div>
                </div>
            </div>
        </div>  

    </div>
</div>
@endsection
