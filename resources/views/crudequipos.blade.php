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
                <div class="card">
                    <div class="card-header" style="font-size:20px" align="center">Detalle equipo</div>

                    <div class="card-body">
                        <form id="form1" name="form1" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-left">Id:</label>

                                <div class="col-md-8">
                                    <input readonly="readonly" id="id"
                                           class="form-control @error('id') is-invalid @enderror" name="id" required
                                           autocomplete="idEquipo" value="{{old('id')}}">
                                    @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-left">Marca:</label>

                                <div class="col-md-8">
                                    <input id="marca" class="form-control @error('marca') is-invalid @enderror"
                                           name="marca" required autocomplete="marcaEquipo" value="{{old('marca')}}"
                                           autofocus>
                                    @error('marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-left">Serial:</label>

                                <div class="col-md-8">
                                    <input id="numeroSerie"
                                           class="form-control @error('numeroSerie') is-invalid @enderror"
                                           name="numeroSerie" required autocomplete="numeroSerie"
                                           value="{{old('numeroSerie')}}" autofocus>
                                    @error('numeroSerie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-left">Clave ingreso:</label>

                                <div class="col-md-8">
                                    <input id="claveIngreso"
                                           class="form-control @error('claveIngreso') is-invalid @enderror"
                                           name="claveIngreso" required autocomplete="claveIngreso"
                                           value="{{old('claveIngreso')}}" autofocus>
                                    @error('claveIngreso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-left">Propietario:</label>

                                <div class="col-md-8">
                                    <input readonly="readonly" id="user_id"
                                           class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                           required autocomplete="user_id" value="{{old('user_id')}}" autofocus>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" data-name="my_table" width="100%"
                                               cellspacing="0">
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
                                                        <td align="center"><a id="{{$registro->Id}}"
                                                                              class="btn btn-secondary text-white"><em
                                                                    class="fas fa-angle-up"></em> Cargar</a></td>
                                                        <script type="text/javascript">

                                                            var cambiar = function () {
                                                                document.getElementById('user_id').value = {!!json_encode($registro->Id)!!};
                                                            };
                                                            var input = document.getElementById({!!json_encode($registro->Id)!!});
                                                            input.addEventListener('click', cambiar);

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
                                                <h3 align="center">No hay registros disponibles, intentelo más
                                                    tarde</h3>
                                            @endif
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

                <div align="center">


                    <br>
                    <div class="btn-group col-md">
                        <input id="registrar" type="button" value="Registrar" class="btn btn-primary"
                               onclick="registrarEquipo()"/>

                        <input type="button" value="Modificar" class="btn btn-warning" onclick="modificarEquipo()"/>

                    </div>
                    <br>
                    <div class="btn-group col-md">
                        <input type="button" value="Limpiar" class="btn btn-secondary" onclick="limpiarCampos()"/>

                        <input type="button" value="Eliminar" class="btn btn-danger" onclick="eliminarEquipo()"/>
                    </div>
                    <script type="text/javascript">

                        function registrarEquipo() {

                            document.form1.action = '{{ route('equipos.store') }}';
                            document.form1.submit();
                        }

                        function modificarEquipo() {

                            document.form1.action = '{{ route('equipos.update') }}';
                            document.form1.submit();
                        }

                        function eliminarEquipo() {
                            var opcion = confirm("¿Está seguro que desea eliminar el equipo seleccionado?");
                            if (opcion) {
                                var valor = document.getElementById('id').value;
                                document.form1.action = '{{ route('equipos.delete') }}';
                                document.form1.submit();
                            }

                        }

                        function limpiarCampos() {
                            document.getElementById('id').value = "";
                            document.getElementById('marca').value = "";
                            document.getElementById('numeroSerie').value = "";
                            document.getElementById('claveIngreso').value = "";
                            document.getElementById('user_id').value = "";
                            document.getElementById('registrar').disabled = false;

                        }

                    </script>


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
                                @if(!$registros->isEmpty())
                                    <table class="table table-bordered" data-name="my_table" width="100%"
                                           cellspacing="0">

                                        <thead>
                                        <tr>
                                            <th>Seleccionar</th>
                                            @foreach ($registros->get(0) as $key => $value)
                                                <th>{{$key}}</th>
                                            @endforeach

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($registros as $registro)
                                            <tr>
                                                <td align="center"><a id="{{$registro->Id}}e"
                                                                      class="btn btn-secondary text-white"
                                                                      href="#page-top"><em class="fas fa-angle-up"></em>
                                                        Ver</a></td>
                                                <script type="text/javascript">

                                                    var cambiar2 = function () {
                                                        document.getElementById('registrar').disabled = true;
                                                        document.getElementById('id').value = {!!json_encode($registro->Id)!!};
                                                        document.getElementById('marca').value = {!!json_encode($registro->Marca)!!};
                                                        document.getElementById('numeroSerie').value = {!!json_encode($registro->Serial)!!};
                                                        document.getElementById('claveIngreso').value = {!!json_encode($registro->Clave)!!};
                                                        document.getElementById('user_id').value = {!!json_encode($registro->{'Id propietario'})!!};

                                                    };
                                                    var input = document.getElementById({!!json_encode($registro->Id)!!}+"e");
                                                    input.addEventListener('click', cambiar2);

                                                </script>
                                                @foreach ($registros[0] as $key => $value)
                                                    <td>{{ $registro->{$key} }}</td>
                                                @endforeach

                                            </tr>

                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Seleccionar</th>
                                            @foreach ($registros[0] as $key => $value)
                                                <th>{{$key}}</th>
                                            @endforeach
                                        </tr>
                                        </tfoot>

                                    </table>
                                @else
                                    <h3 align="center">No hay registros disponibles, intentelo más tarde</h3>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
