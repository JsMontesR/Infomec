@extends('layouts.app')

@section('content')
<h1 align="center">Usuarios</h1>
<br>

 @if(session()->has('success'))

    <div class="alert alert-success" role="alert">{{session('success')}}</div>

@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                <div class="card-header" style="font-size:20px" align="center">Detalle usuario</div>

                <div class="card-body">
                    <form id="form1" name="form1" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Id:</label>

                            <div class="col-md-8">
                                <input readonly="readonly" id="id" class="form-control @error('id') is-invalid @enderror" value="{{old('id')}}" name="id" required autocomplete="iduser">
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
                                <input id="name" class="form-control @error('id') is-invalid @enderror" value="{{old('id')}}" name="name" required autocomplete="name">
                                @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Correo electrónico:</label>

                            <div class="col-md-8">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Cédula</label>

                            <div class="col-md-8">
                                <input  id="cedula" class="form-control @error('cedula') is-invalid @enderror" value="{{old('cedula')}}" name="cedula" required autocomplete>
                                @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Teléfono:</label>

                            <div class="col-md-8">
                                <input id="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono')}}" name="telefono" required autocomplete>
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Dirección:</label>

                            <div class="col-md-8">
                                <input  id="direccion" class="form-control " name="direccion" value="{{old('direccion')}}" required autocomplete>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">NIT:</label>

                            <div class="col-md-8">
                                <input  id="NIT" class="form-control" value="{{old('NIT')}}" name="NIT" required autocomplete>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Contraseña:</label>

                            <div class="col-md-8">
                                <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Rol:</label>

                            <div class="col-md-8">
                                <select id="rol" name="rol" class="form-control" style="text-transform: capitalize" value="{{old('rol')}}">
                                 @foreach($roles as $rol)
                                    @if($rol->rol === 'cliente')
                                        <option value="{{$rol->rol}}" selected="">{{$rol->rol}}</option>
                                    @else
                                        <option value="{{$rol->rol}}">{{$rol->rol}}</option>
                                    @endif
                                 @endforeach
                                </select>
                            </div>
                        </div>

                        </div>

                        <div align="center">
                           
                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Registrar" class="btn btn-primary" onclick= "registrarUsuario()" />

                            <input type="button" value="Modificar" class="btn btn-warning" onclick= "modificarUsuario()" />

                            </div>
                            <br>
                            <div class="btn-group col-md">
                            <input type="button" value="Limpiar" class="btn btn-secondary" onclick= "limpiarCampos()" />
                            
                            <input type="button" value="Eliminar" class="btn btn-danger" onclick= "eliminarUsuario()" />
                            </div>
                             <script type="text/javascript">
                                
                            
                                function registrarUsuario(){

                                    document.form1.action = '{{ route('usuarios.store') }}';
                                    document.form1.submit();
                                }

                                function modificarUsuario(){

                                    document.form1.action = '{{ route('usuarios.update') }}';
                                    document.form1.submit();
                                }

                                function eliminarUsuario(){
                                    var opcion = confirm("¿Está seguro que desea eliminar el insumo seleccionado?");
                                    if(opcion){
                                        var valor = document.getElementById('id').value;
                                        document.form1.action = '{{ route('usuarios.delete') }}';    
                                        document.form1.submit();
                                    }
                                    
                                }

                                function limpiarCampos(){
                                            document.getElementById('id').value = "";
                                            document.getElementById('name').value = "";
                                            document.getElementById('email').value = "";
                                            document.getElementById('cedula').value = "";
                                            document.getElementById('telefono').value = "";
                                            document.getElementById('direccion').value = "";
                                            document.getElementById('NIT').value = "";
                                            document.getElementById('password').value = "";
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
                        <div class="card-header" style="font-size:20px" align="center">Usuarios registrados</div>
                            <div class="card mb-3">     
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                                    @if(!$usuarios->isEmpty())
                                            <thead>
                                              <tr>
                                                <th>Seleccionar</th>
                                                @foreach ($usuarios->get(0) as $key => $value) 
                                                   
                                                    <th>{{$key}}</th>
                                                    
                                                @endforeach
                                                
                                              </tr>       
                                            </thead>
                                            <tbody>
                                               @foreach($usuarios as $registro)
                                                <tr>
                                                    <td align="center">
                                                        <a id="{{$registro->Id}}" class="btn btn-secondary text-white" href="#page-top">
                                                            <em class="fas fa-angle-up"></em> 
                                                            Ver
                                                        </a>
                                                    </td>
                                                    <script type="text/javascript">

                                                        var cambiar = function(){
                                                            document.getElementById('id').value = {!!json_encode($registro->Id)!!};
                                                            document.getElementById('name').value = {!!json_encode($registro->Name)!!};
                                                            document.getElementById('email').value = {!!json_encode($registro->Email)!!};
                                                            document.getElementById('rol').value = {!!json_encode($registro->Rol)!!};
                                                            document.getElementById('cedula').value = {!!json_encode($registro->Cedula)!!};
                                                            document.getElementById('NIT').value = {!!json_encode($registro->NIT)!!};
                                                            document.getElementById('telefono').value = {!!json_encode($registro->Telefono)!!};
                                                            document.getElementById('direccion').value = {!!json_encode($registro->Direccion)!!};

                                                        };
                                                        var input = document.getElementById({!!json_encode($registro->Id)!!});
                                                        input.addEventListener('click',cambiar);
                                                        
                                                    </script>
                                                    @foreach ($registro as $key => $value) 
                                                        
                                                        <td>{{ $value }}</td>
                                                        
                                                    @endforeach
                                                    
                                                </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                <th>Seleccionar</th>
                                                @foreach ($usuarios[0] as $key => $value) 
                                                    
                                                    <th>{{$key}}</th>
                                                    
                                                @endforeach
                                                
                                              </tr>
                                            </tfoot>
                                    @else
                                      <h3 align="center">No hay usuarios disponibles, intentelo más tarde</h3>
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
