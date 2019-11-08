@extends('layouts.app')

@section('content')
<h1 align="center">Equipos</h1>
<br>

 @if(session()->has('success'))

    <div class="alert alert-success" role="alert">{{session('success')}}</div>

@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                <div class="card-header" style="font-size:20px" align="center">Detalle equipo</div>

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
                            <label class="col-md-4 col-form-label text-md-left">Marca:</label>

                            <div class="col-md-8">
                                <input id="marca" class="form-control" name="marca" required autocomplete="marca">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Serial:</label>

                            <div class="col-md-8">
                                <input  id="numeroSerie" class="form-control" name="numeroSerie" required autocomplete="numeroSerie">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Clave ingreso:</label>

                            <div class="col-md-8">
                                <input id="claveIngreso" class="form-control" name="claveIngreso" required autocomplete="claveIngreso">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Propietario:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="usuario" class="form-control" name="usuario" required autocomplete="usuario">
                            </div>
                        </div>

                         

                                <div class="card mb-3">     
                                              <div class="card-body">
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                                    @if(!$usuarios->isEmpty())
                                                            <thead>
                                                              <tr>
                                                                 @foreach ($usuarios->get(0) as $key => $value) 
                                                                    <th>{{$key}}</th>
                                                                @endforeach
                                                                <th>Seleccionar</th>
                                                              </tr>      
                                                            </thead>
                                                            <tbody>
                                                               @foreach($usuarios as $registro)
                                                                <tr>
                                                                    @foreach ($registro as $key => $value) 
                                                                        <td>{{ $value }}</td>
                                                                    @endforeach
                                                                    <td align="center"><input id={{$registro->Email}} type="radio" name="propietario"></td>
                                                                    <script type="text/javascript">
                                                                      
                                                                        var cambiar = function(){
                                                                            document.getElementById('usuario').value = {!!json_encode($registro->Email)!!};
                                                                        };
                                                                        var input = document.getElementById({!!json_encode($registro->Email)!!});
                                                                        input.addEventListener('click',cambiar);
                                                                        
                                                                    </script>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                              <tr>
                                                                 @foreach ($usuarios[0] as $key => $value) 
                                                                    <th>{{$key}}</th>
                                                                @endforeach
                                                                <th>Seleccionar</th>
                                                              </tr>
                                                            </tfoot>
                                                    @else
                                                      <h3 align="center">No hay registros disponibles, intentelo más tarde</h3>
                                                    @endif
                                                  </table>
                                                  
                                                  <script type="text/javascript" src="{{asset('js/spanishtable.js')}}"></script>
                                                  <script type="text/javascript">
                                                    $(document).ready(function(){

                                                      $('#example').dataTable({

                                                        "language": {
                                                            "sProcessing":     "Procesando...",
                                                            "sLengthMenu":     "Mostrar _MENU_ registros",
                                                            "sZeroRecords":    "No se encontraron resultados",
                                                            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                                                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
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

                        <div align="center">

                           

                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Registrar" class="btn btn-primary" onclick= "registrarEquipo()" />

                            <input type="button" value="Modificar" class="btn btn-warning" onclick= "modificarEquipo()" />

                            </div>
                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Limpiar" class="btn btn-secondary" onclick= "limpiarCampos()" />
                            
                            <input type="button" value="Eliminar" class="btn btn-danger" onclick= "eliminarEquipo()" />
                            </div>
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
                                    var opcion = confirm("¿Está seguro que desea eliminar el equipo seleccionado?");
                                    if(opcion){
                                        var valor = document.getElementById('id').value;
                                        document.form1.action = '{{ route('equipos.delete') }}';    
                                        document.form1.submit();
                                    }
                                    
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
                <div class="col-md">
                    <div class="card">
                        <div class="card-header" style="font-size:20px" align="center">Equipos registrados</div>
                   

                            <div class="card mb-3">     
                                          <div class="card-body">
                                            <div class="table-responsive">
                                              <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                                                @if(!$registros->isEmpty())
                                                        <thead>
                                                          <tr>
                                                             @foreach ($registros->get(0) as $key => $value) 
                                                                <th>{{$key}}</th>
                                                            @endforeach
                                                            <th>Seleccionar</th>
                                                          </tr>       
                                                        </thead>
                                                        <tbody>
                                                           @foreach($registros as $registro)
                                                            <tr>
                                                                @foreach ($registros[0] as $key => $value) 
                                                                    <td>{{ $registro->{$key} }}</td>
                                                                @endforeach
                                                                <td align="center"><input id="{{$registro->Id}}" type="radio" name="propietario"></td>
                                                                <script type="text/javascript">
                                                                  
                                                                    var cambiar = function(){
                                                                        document.getElementById('id').value = {!!json_encode($registro->Id)!!};
                                                                        document.getElementById('marca').value = {!!json_encode($registro->Marca)!!};
                                                                        document.getElementById('numeroSerie').value = {!!json_encode($registro->Serial)!!};
                                                                        document.getElementById('claveIngreso').value = {!!json_encode($registro->Clave)!!};
                                                                        document.getElementById('usuario').value = {!!json_encode($registro->Email)!!};

                                                                    };
                                                                    var input = document.getElementById({!!json_encode($registro->Id)!!});
                                                                    input.addEventListener('click',cambiar);
                                                                    
                                                                </script>
                                                            </tr>

                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                          <tr>
                                                             @foreach ($registros[0] as $key => $value) 
                                                                <th>{{$key}}</th>
                                                            @endforeach
                                                            <th>Seleccionar</th>
                                                          </tr>
                                                        </tfoot>
                                                @else
                                                  <h3 align="center">No hay registros disponibles, intentelo más tarde</h3>
                                                @endif
                                              </table>
                                              
                                              <script type="text/javascript" src="{{asset('js/spanishtable.js')}}"></script>
                                              <script type="text/javascript">
                                                $(document).ready(function(){

                                                  $('#example2').dataTable({

                                                    "language": {
                                                        "sProcessing":     "Procesando...",
                                                        "sLengthMenu":     "Mostrar _MENU_ registros",
                                                        "sZeroRecords":    "No se encontraron resultados",
                                                        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                                                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
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
