@extends('layouts.app')

@section('content')
<h1 align="center">Revisiones</h1>
<br>

 @if(session()->has('success'))

    <div class="alert alert-success" role="alert">{{session('success')}}</div>

@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                <div class="card-header" style="font-size:20px" align="center">Detalle revisión</div>

                <div class="card-body">
                    <form id="form1" name="form1" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Numero de orden de servicio:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="id" class="form-control" name="id" required autocomplete="id">
                            </div>
                        </div>

                        <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-header" style="font-size:20px" align="center">Ordenes de servicio registradas</div>
                                            <div class="card mb-3">     
                                              <div class="card-body">
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="example5" width="100%" cellspacing="0">
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
                                                                        <a id="{{$servicio->Id}}" class="btn btn-secondary text-white">
                                                                            <em class="fas fa-angle-up"></em>
                                                                            Cargar
                                                                        </a>
                                                                    </td>
                                                                    <script type="text/javascript">
                                                                      
                                                                        var cambiar = function(){

                                                                            document.getElementById('id').value = {!!json_encode($servicio->Id)!!};
                                                                            
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
                                                                @foreach($servicios[0] as $key => $value) 
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

                                                      $('#example5').dataTable({

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

                            <br>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Resultados revision:</label>

                            <div class="col-md-8">
                                <input id="resultadosRevision" class="form-control" name="resultadosRevision" required autocomplete="resultadosRevision">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Notas revisión:</label>

                            <div class="col-md-8">
                                <input  id="notasRevision" class="form-control" name="notasRevision" required autocomplete="notasRevision">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Fecha garantia:</label>

                            <div class="col-md-8">
                                <input id="fechaGarantia" type="date" class="form-control" name="fechaGarantia" required autocomplete="fechaGarantia">
                            </div>
                        </div>

                        </div>

                        </div>

                        <div align="center">

                           

                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Registrar" class="btn btn-primary" onclick= "registrarRevision()" />

                            <input type="button" value="Modificar" class="btn btn-warning" onclick= "modificarRevision()" />

                            </div>
                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Limpiar" class="btn btn-secondary" onclick= "limpiarCampos()" />
                            
                            <input type="button" value="Eliminar" class="btn btn-danger" onclick= "eliminarRevision()" />
                            </div>
                             <script type="text/javascript">
                                
                                function registrarRevision(){

                                    document.form1.action = '{{ route('revisiones.store') }}';
                                    document.form1.submit();
                                }

                                function modificarRevision(){

                                    document.form1.action = '{{ route('revisiones.update') }}';
                                    document.form1.submit();
                                }

                                function eliminarRevision(){
                                    var opcion = confirm("¿Está seguro que desea eliminar la revisión seleccionada?");
                                    if(opcion){
                                        var valor = document.getElementById('id').value;
                                        document.form1.action = '{{ route('revisiones.delete') }}';    
                                        document.form1.submit();
                                    }
                                    
                                }

                                function limpiarCampos(){
                                            document.getElementById('id').value = "";
                                            document.getElementById('resultadosRevision').value = "";
                                            document.getElementById('notasRevision').value = "";
                                            document.getElementById('fechaGarantia').value = "";
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
                                            <div class="card-header" style="font-size:20px" align="center">Revisiones registradas</div>
                                            <div class="card mb-3">     
                                              <div class="card-body">
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="example6" width="100%" cellspacing="0">
                                                 @if(!$revisiones->isEmpty())
                                                            <thead>
                                                              <tr>
                                                                <th>Seleccionar</th>
                                                                @foreach($revisiones->get(0) as $key => $value) 
                                                                    <th>{{$key}}</th>
                                                                @endforeach
                                                              </tr>       
                                                            </thead>
                                                            <tbody>
                                                               @foreach($revisiones as $revision)
                                                                <tr>
                                                                    <td align="center">
                                                                        <a id="{{$revision->Id}}r" class="btn btn-secondary text-white" href="#page-top">
                                                                            <em class="fas fa-angle-up"></em> 
                                                                            Ver
                                                                        </a>
                                                                    </td>
                                                                    <script type="text/javascript">
                                                                      
                                                                        var cambiar = function(){

                                                                            document.getElementById('id').value = {!!json_encode($revision->Id)!!};
                                                                            document.getElementById('resultadosRevision').value = {!!json_encode($revision->Resultados)!!};
                                                                            document.getElementById('notasRevision').value = {!!json_encode($revision->Notas)!!};
                                                                            document.getElementById('fechaGarantia').value = {!!json_encode($revision->FechaGarantia)!!};
                                                                            
                                                                        };
                                                                        var input = document.getElementById({!!json_encode($revision->Id)!!}+"r");
                                                                        input.addEventListener('click',cambiar);
                                                                        
                                                                    </script>
                                                                    @foreach($revision as $key => $value) 
                                                                        <td>{{ $value }}</td>
                                                                    @endforeach 
                                                                </tr>

                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                              <tr>
                                                                <th>Seleccionar</th>
                                                                @foreach ($revisiones[0] as $key => $value) 
                                                                    <th>{{$key}}</th>
                                                                @endforeach
                                                              </tr>
                                                            </tfoot>
                                                    @else
                                                      <h3 align="center">No hay revisiones disponibles, intentelo más tarde</h3>
                                                    @endif
                                                  </table>
                                                  
                                                  <script type="text/javascript" src="{{asset('js/spanishtable.js')}}"></script>
                                                  <script type="text/javascript">
                                                    $(document).ready(function(){

                                                      $('#example6').dataTable({

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
