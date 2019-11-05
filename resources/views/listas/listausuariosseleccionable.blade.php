

<div class="card mb-3">     
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="example3" width="100%" cellspacing="0">
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
                                    <td align="center"><input id={{$registro->Id}} type="radio" name="propietario"></td>
                                    <script type="text/javascript">
                                      
                                        var cambiar = function(){
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

                      $('#example3').dataTable({

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

