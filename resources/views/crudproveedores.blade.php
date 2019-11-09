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
                                <input  id="email" class="form-control" name="email" type="email" required autocomplete="email">
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
                                <input  id="direccion" class="form-control" name="direccion" required autocomplete="direccion">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">NIT:</label>

                            <div class="col-md-8">
                                <input  id="NIT" class="form-control" name="NIT" required autocomplete="NIT">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Descripción:</label>

                            <div class="col-md-8">
                                <input  id="descripcion" class="form-control" name="descripcion" required autocomplete="descripcion">
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
                            <div class="card mb-3">     
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                                    @if(!$proveedores->isEmpty())
                                            <thead>
                                              <tr>
                                                <th>Seleccionar</th>
                                                 @foreach ($proveedores->get(0) as $key => $value) 
                                                    @if($key !== 'Descripcion')
                                                    <th>{{$key}}</th>
                                                    @endif
                                                @endforeach
                                              </tr>       
                                            </thead>
                                            <tbody>
                                               @foreach($proveedores as $registro)
                                                <tr>
                                                     <td align="center"><input id="{{$registro->Id}}" type="radio" name="propietario"></td>
                                                    <script type="text/javascript">
                                                      
                                                        var cambiar = function(){
                                                            document.getElementById('id').value = {!!json_encode($registro->Id)!!};
                                                            document.getElementById('nombre').value = {!!json_encode($registro->Nombre)!!};
                                                            document.getElementById('email').value = {!!json_encode($registro->Email)!!};
                                                            document.getElementById('telefono').value = {!!json_encode($registro->Telefono)!!};
                                                            document.getElementById('direccion').value = {!!json_encode($registro->Direccion)!!};
                                                            document.getElementById('NIT').value = {!!json_encode($registro->NIT)!!};
                                                            document.getElementById('descripcion').value = {!!json_encode($registro->Descripcion)!!};

                                                        };
                                                        var input = document.getElementById({!!json_encode($registro->Id)!!});
                                                        input.addEventListener('click',cambiar);
                                                        
                                                    </script>

                                                    @foreach ($registro as $key => $value) 
                                                        @if($key !== 'Descripcion')
                                                        <td>{{ $value }}</td>
                                                        @endif
                                                    @endforeach
                                                </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                <th>Seleccionar</th>
                                                 @foreach ($proveedores[0] as $key => $value) 
                                                    @if($key !== 'Descripcion')
                                                    <th>{{$key}}</th>
                                                    @endif
                                                @endforeach
                                                
                                              </tr>
                                            </tfoot>
                                    @else
                                      <h3 align="center">No hay proveedores disponibles, intentelo más tarde</h3>
                                    @endif
                                  </table>
                                  
                                  <script type="text/javascript" src="{{asset('js/spanishtable.js')}}"></script>
                                  <script type="text/javascript">
                                    $(document).ready(function(){

                                      $('#example2').dataTable({

                                        "language": {
                                            "sProcessing":     "Procesando...",
                                            "sLengthMenu":     "Mostrar _MENU_ proveedores",
                                            "sZeroRecords":    "No se encontraron resultados",
                                            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                                            "sInfo":           "Mostrando proveedores del _START_ al _END_ de un total de _TOTAL_ proveedores",
                                            "sInfoEmpty":      "Mostrando proveedores del 0 al 0 de un total de 0 proveedores",
                                            "sInfoFiltered":   "(filtrado de un total de _MAX_ proveedores)",
                                            "sInfoPostFix":    "",
                                            "sSearch":         "Buscar:",
                                            "sUrl":            "",
                                            "sInfoThousands":  ",",
                                            "sLoadingRecords": "Cargando...",
                                            "oPaginate": {
                                                "sFirst":    "Primero",
                                                "sLast":     "Último",
                                                "sNext":     "Siguiente",
                                                "sPrevious": "Anterior"
                                            },
                                            "oAria": {
                                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                            },
                                            "buttons": {
                                                "copy": "Copiar",
                                                "colvis": "Visibilidad"
                                            }
                                          }

                                      });

                                    });
                                  </script>

                                </div>
                              </div>
                            </div> 

                </div>
            </div>
        </div>
    </div>
                    

  </div>  
</div>
@endsection
