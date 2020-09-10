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
                                <input id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}" name="nombre" required autocomplete >
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Email:</label>

                            <div class="col-md-8">
                                <input  id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" type="email" required autocomplete>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Teléfono:</label>

                            <div class="col-md-8">
                                <input id="telefono" class="form-control  @error('telefono') is-invalid @enderror" value="{{old('telefono')}}" name="telefono" required autocomplete>
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
                                <input  id="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{old('direccion')}}" name="direccion" required autocomplete>
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">NIT:</label>

                            <div class="col-md-8">
                                <input id="NIT" class="form-control @error('NIT') is-invalid @enderror" value="{{old('NIT')}}" name="NIT" required autocomplete>
                                @error('NIT')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">Descripción:</label>

                            <div class="col-md-8">
                                <input  id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}" name="descripcion" required autocomplete>
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        </div>

                        </div>

                        <div align="center">



                            <br>
                            <div class="btn-group col-md">
                            <input id = "registrar" type="button" value="Registrar" class="btn btn-primary" onclick= "registrarProveedor()" />

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
                        <div class="card-header" style="font-size:20px" align="center">Proveedores registrados</div>
                            <div class="card mb-3">
                              <div class="card-body">
                                <div class="table-responsive">

                                    @if(!$proveedores->isEmpty())
                                    <table class="table table-bordered" data-name="my_table" width="100%" cellspacing="0">
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
                                                     <td align="center">
                                                        <a id="{{$registro->Id}}" class="btn btn-secondary text-white" href="#page-top">
                                                            <em class="fas fa-angle-up"></em>
                                                            Ver
                                                        </a>
                                                    </td>
                                                    <script type="text/javascript">

                                                        var cambiar = function(){
                                                            document.getElementById('registrar').disabled = true;
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

                                  </table>
                                    @else
                                      <h3 align="center">No hay proveedores disponibles, intentelo más tarde</h3>
                                    @endif

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
