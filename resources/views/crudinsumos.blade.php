@extends('layouts.app')

@section('content')
<h1 align="center">Insumos</h1>
<br>

 @if(session()->has('success'))

    <div class="alert alert-success" role="alert">{{session('success')}}</div>

@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                <div class="card-header" style="font-size:20px" align="center">Detalle insumo</div>

                <div class="card-body">
                    <form id="form1" name="form1" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Id:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="id" class="form-control @error('id') is-invalid @enderror" name="id" required autocomplete value="{{old('id')}}">
                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Nombre:</label>

                            <div class="col-md-8">
                                <input id="nombre" class="form-control @error('nombre') is-invalid @enderror" name="nombre" required autocomplete value="{{old('nombre')}}">
                                 @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Precio de compra:</label>

                            <div class="col-md-8">
                                <input  id="precioCompra" class="form-control @error("precio_de_compra") is-invalid @enderror" name="precio de compra" required autocomplete onkeyup="calcularPrecio()" value="{{old('precio_de_compra')}}">
                                @error("precio_de_compra")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Utilidad(%):</label>

                            <div class="col-md-8">
                                <input id="utilidad" class="form-control @error('utilidad') is-invalid @enderror" name="utilidad" required autocomplete onkeyup="calcularPrecio()" value="{{old('utilidad')}}">
                                @error('utilidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Cantidad en stock:</label>

                            <div class="col-md-8">
                                <input  id="cantidad" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" required autocomplete value="{{old('cantidad')}}">
                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Precio de venta:</label>

                            <div class="col-md-8">
                                <input  id="precioVenta" class="form-control @error('precio_de_venta') is-invalid @enderror" name="precio de venta" required autocomplete value="{{old('precio_de_venta')}}" >
                                @error('precio_de_venta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <script type="text/javascript">
                            
                             function calcularPrecio(){
                                var precioCompra = parseInt(document.getElementById('precioCompra').value,10);
                                var utilidad = parseInt(document.getElementById('utilidad').value,10);
                                if(!isNaN(precioCompra) && !isNaN(utilidad)){
                                    document.getElementById('precioVenta').value = Math.round(precioCompra * (1 + utilidad / 100));
                                }
                                    
                            }
                            

                        </script>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Proveedor:</label>

                            <div class="col-md-8">
                                <input  id="proveedor_id" readonly="readonly" class="form-control @error('id_del_proveedor') is-invalid @enderror" name="id del proveedor" required autocomplete value="{{old('id_del_proveedor')}}">
                                @error('id_del_proveedor')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong class="m_title" >{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                            <div class="card mb-3">     
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-bordered" id="example" width="100%" cellspacing="0">
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
                                                    <td align="center"><a id="{{$registro->Id}}" class="btn btn-secondary text-white"><em class="fas fa-angle-up"></em> Cargar</a></td>
                                                    <script type="text/javascript">
                                                      
                                                        var cambiar = function(){
                                                            document.getElementById('proveedor_id').value = {!!json_encode($registro->Id)!!};
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

                                      $('#example').dataTable({

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

                        <div align="center">

                           

                            <br>
                            <div class="btn-group col-md">
                            <input id="registrar" type="button" value="Registrar" class="btn btn-primary" onclick= "registrarInsumo()" />

                            <input type="button" value="Modificar" class="btn btn-warning" onclick= "modificarInsumo()" />

                            </div>
                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Limpiar" class="btn btn-secondary" onclick= "limpiarCampos()" />
                            
                            <input type="button" value="Eliminar" class="btn btn-danger" onclick= "eliminarInsumo()" />
                            </div>
                             <script type="text/javascript">
                                
                            
                                function registrarInsumo(){

                                    document.form1.action = '{{ route('insumos.store') }}';
                                    document.form1.submit();
                                }

                                function modificarInsumo(){

                                    document.form1.action = '{{ route('insumos.update') }}';
                                    document.form1.submit();
                                }

                                function eliminarInsumo(){
                                    var opcion = confirm("¿Está seguro que desea eliminar el insumo seleccionado?");
                                    if(opcion){
                                        var valor = document.getElementById('id').value;
                                        document.form1.action = '{{ route('insumos.delete') }}';    
                                        document.form1.submit();
                                    }
                                    
                                }

                                function limpiarCampos(){
                                            document.getElementById('id').value = "";
                                            document.getElementById('nombre').value = "";
                                            document.getElementById('proveedor_id').value = "";
                                            document.getElementById('precioCompra').value = "";
                                            document.getElementById('cantidad').value = "";
                                            document.getElementById('utilidad').value = "";
                                            document.getElementById('precioVenta').value = "";
                                            document.getElementById('registrar').disabled = false;
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
                        <div class="card-header" style="font-size:20px" align="center">Insumos registrados</div>
                            <div class="card mb-3">     
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                                    @if(!$insumos->isEmpty())
                                            <thead>
                                              <tr>
                                                <th>Seleccionar</th>
                                                @foreach ($insumos->get(0) as $key => $value) 
                                                    @if($key !== 'Descripcion')
                                                    <th>{{$key}}</th>
                                                    @endif
                                                @endforeach
                                                
                                              </tr>       
                                            </thead>
                                            <tbody>
                                               @foreach($insumos as $registro)
                                                <tr>
                                                    <td align="center"><a id="{{$registro->Id}}p" class="btn btn-secondary text-white" href="#page-top"><em class="fas fa-angle-up"></em> Ver</a></td>
                                                    <script type="text/javascript">

                                                        var cambiar = function(){
                                                            document.getElementById('registrar').disabled = true;
                                                            document.getElementById('id').value = {!!json_encode($registro->Id)!!};
                                                            document.getElementById('nombre').value = {!!json_encode($registro->Nombre)!!};
                                                            document.getElementById('proveedor_id').value = {!!json_encode($registro->Proveedor)!!};
                                                            document.getElementById('precioCompra').value = {!!json_encode($registro->{'Precio de compra'})!!};
                                                            document.getElementById('cantidad').value = {!!json_encode($registro->Cantidad)!!};
                                                            document.getElementById('utilidad').value = {!!json_encode($registro->Utilidad)!!};
                                                            document.getElementById('precioVenta').value = {!!json_encode($registro->{'Precio de venta'})!!};

                                                        };
                                                        var input = document.getElementById({!!json_encode($registro->Id)!!}+"p");
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
                                                @foreach ($insumos[0] as $key => $value) 
                                                    @if($key !== 'Descripcion')
                                                    <th>{{$key}}</th>
                                                    @endif
                                                @endforeach
                                                
                                              </tr>
                                            </tfoot>
                                    @else
                                      <h3 align="center">No hay insumos disponibles, intentelo más tarde</h3>
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
