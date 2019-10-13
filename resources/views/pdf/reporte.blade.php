

<!-- Page level plugin CSS-->
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

<link href="{{asset('css/styles.css')}}" rel="stylesheet">

<h1 align="center">{{$nombrereporte}}</h1>
<br>

<div class="card mb-3">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            @if(!$registros->isEmpty())
                    <thead>
                      <tr>
                         @foreach ($registros->get(0) as $key => $value) 
                            <th>{{$key}}</th>
                        @endforeach
                      </tr>       
                    </thead>
                    <tbody>
                       @foreach($registros as $registro)
                        <tr>
                            @foreach ($registros[0] as $key => $value) 
                                <td>{{ $registro->{$key} }}</td>
                            @endforeach
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                         @foreach ($registros[0] as $key => $value) 
                            <th>{{$key}}</th>
                        @endforeach
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
 <h5 align="center">Fecha y hora actual del reporte {{(new DateTime())->format('d/m/y')}}</h5>
 <br>




