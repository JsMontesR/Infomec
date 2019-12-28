@extends('layouts.app')

@section('content')
<h1 align="center">Ordenes de servicio</h1>
<br>

 @if(session()->has('success'))

    <div class="alert alert-success" role="alert">{{session('success')}}</div>

@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                <div class="card-header" style="font-size:20px" align="center">Detalle de la orden de servicio</div>

                <div class="card-body">
                    <form id="form1" name="form2" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Id:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="id" class="form-control @error('id') is-invalid @enderror" value="{{old('id')}}" name="id" required autocomplete="id">
                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Problema reportado:</label>

                            <div class="col-md-8">
                                <input  id="problemas" class="form-control @error('problema_reportado') is-invalid @enderror" value="{{old('problema_reportado')}}" name="problema_reportado" required>
                                @error('problema_reportado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Notas:</label>

                            <div class="col-md-8">
                                <input id="notas" class="form-control" name="notas" required autocomplete>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Equipo:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="equipo_id" class="form-control @error('id_del_equipo') is-invalid @enderror" value="{{old('id_del_equipo')}}" name="id del equipo" required autocomplete>
                                @error('id_del_equipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="card mb-3">     
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-bordered" id="example3" width="100%" cellspacing="0">
                                    @if(!$equipos->isEmpty())
                                            <thead>
                                              <tr>
                                                <th>Seleccionar</th>
                                                @foreach ($equipos->get(0) as $key => $value) 
                                                    <th>{{$key}}</th>
                                                @endforeach
                                                
                                              </tr>       
                                            </thead>
                                            <tbody>
                                               @foreach($equipos as $equipo)
                                                <tr>
                                                    <td align="center">
                                                        <a id="{{$equipo->Id}}e" class="btn btn-secondary text-white">
                                                            <em class="fas fa-angle-up"></em>
                                                            Cargar
                                                        </a>
                                                    </td>
                                                    <script type="text/javascript">
                                                      
                                                        var cambiar = function(){
                                                            document.getElementById('equipo_id').value = {!!json_encode($equipo->Id)!!};
                                                        };
                                                        var input = document.getElementById({!!json_encode($equipo->Id)!!}+"e");
                                                        input.addEventListener('click',cambiar);
                                                        
                                                    </script>
                                                    @foreach ($equipos[0] as $key => $value) 
                                                        <td>{{ $equipo->{$key} }}</td>
                                                    @endforeach
                                                </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                <th>Seleccionar</th>
                                                @foreach ($equipos[0] as $key => $value) 
                                                    <th>{{$key}}</th>
                                                @endforeach
                                              </tr>
                                            </tfoot>
                                    @else
                                      <h3 align="center">No hay equipos disponibles, intentelo más tarde</h3>
                                    @endif
                                  </table>
                                  
                                  <script type="text/javascript" src="{{asset('js/spanishtable.js')}}"></script>
                                  <script type="text/javascript">
                                    $(document).ready(function(){

                                      $('#example3').dataTable({

                                        "language": {
                                            "sProcessing":     "Procesando...",
                                            "sLengthMenu":     "Mostrar _MENU_ equipos",
                                            "sZeroRecords":    "No se encontraron resultados",
                                            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                                            "sInfo":           "Mostrando equipos del _START_ al _END_ de un total de _TOTAL_ equipos",
                                            "sInfoEmpty":      "Mostrando equipos del 0 al 0 de un total de 0 equipos",
                                            "sInfoFiltered":   "(filtrado de un total de _MAX_ equipos)",
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
                            <input id="registrar" type="button" value="Registrar" class="btn btn-primary" onclick= "registrarServicio()" />

                            <input type="button" value="Modificar" class="btn btn-warning" onclick= "modificarServicio()" />

                            </div>
                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Limpiar" class="btn btn-secondary" onclick= "limpiarCampos()" />
                            
                            <input type="button" value="Eliminar" class="btn btn-danger" onclick= "eliminarServicio()" />
                            </div>
                             <script type="text/javascript">
                                
                                function registrarServicio(){

                                    document.form2.action = '{{ route('servicios.store') }}';
                                    document.form2.submit();
                                }

                                function modificarServicio(){

                                    document.form2.action = '{{ route('servicios.update') }}';
                                    document.form2.submit();
                                }

                                function eliminarServicio(){
                                    var opcion = confirm("¿Está seguro que desea eliminar la orden de servicio seleccionada?");
                                    if(opcion){
                                        var valor = document.getElementById('id').value;
                                        document.form2.action = '{{ route('servicios.delete') }}';    
                                        document.form2.submit();
                                    }
                                    
                                }

                                function limpiarCampos(){
                                            document.getElementById('id').value = "";
                                            document.getElementById('problemas').value = "";
                                            document.getElementById('notas').value = "";
                                            document.getElementById('equipo_id').value = "";
                                            document.getElementById('registrar').disabled = false;
                                        }

                                function imprimirOrdenDeServicio(){
                                    document.form2.action = '{{ route('servicios.pdf') }}';    
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
                        <div class="card-header" style="font-size:20px" align="center">Ordenes de servicio registradas</div>
                        <div class="card mb-3">     
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-bordered" id="example4" width="100%" cellspacing="0">
                                @if(!$servicios->isEmpty())
                                        <thead>
                                          <tr>
                                            <th>Seleccionar</th>
                                            @foreach ($servicios->get(0) as $key => $value) 
                                                <th>{{$key}}</th>
                                            @endforeach
                                            
                                          </tr>       
                                        </thead>
                                        <tbody>
                                           @foreach($servicios as $servicio)
                                            <tr>
                                                <td align="center">
                                                    <a id="{{$servicio->Id}}" class="btn btn-secondary text-white" href="#page-top">
                                                        <em class="fas fa-angle-up"></em> 
                                                        Ver
                                                    </a>
                                                </td>

                                                <script type="text/javascript">
                                                    
                                                    var cambiar = function(){
                                                        document.getElementById('registrar').disabled = true;
                                                        document.getElementById('id').value = {!!json_encode($servicio->Id)!!};
                                                        document.getElementById('problemas').value = {!!json_encode($servicio->Problemas)!!};
                                                        document.getElementById('notas').value = {!!json_encode($servicio->Notas)!!};
                                                        document.getElementById('equipo_id').value = {!!json_encode($servicio->IdEquipo)!!};
                                                        
                                                    };
                                                    var input = document.getElementById({!!json_encode($servicio->Id)!!});
                                                    input.addEventListener('click',cambiar);
                                                    
                                                </script>
                                                @foreach ($servicio as $key => $value) 
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            </tr>

                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <th>Seleccionar</th>
                                            @foreach ($servicios[0] as $key => $value) 
                                                <th>{{$key}}</th>
                                            @endforeach
                                          </tr>
                                        </tfoot>
                                @else
                                  <h3 align="center">No hay servicios disponibles, intentelo más tarde</h3>
                                @endif
                              </table>
                              
                              <script type="text/javascript" src="{{asset('js/spanishtable.js')}}"></script>
                              <script type="text/javascript">
                                $(document).ready(function(){

                                  $('#example4').dataTable({

                                    "language": {
                                        "sProcessing":     "Procesando...",
                                        "sLengthMenu":     "Mostrar _MENU_ servicios",
                                        "sZeroRecords":    "No se encontraron resultados",
                                        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                                        "sInfo":           "Mostrando servicios del _START_ al _END_ de un total de _TOTAL_ servicios",
                                        "sInfoEmpty":      "Mostrando servicios del 0 al 0 de un total de 0 servicios",
                                        "sInfoFiltered":   "(filtrado de un total de _MAX_ servicios)",
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
