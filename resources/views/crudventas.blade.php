@extends('layouts.app')
@section('content')
    <div class="py-3">
        <h1 align="center" class="m-0 font-weight-bold text-danger">
            Ventas</h1>
    </div>
    <hr>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detalle de venta</h6>
        </div>
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
                    <label class="col-md-4 col-form-label text-md-left">Cliente:</label>
                    <div class="col-md-8">
                        <input id="cliente" class="form-control" name="cliente" required autocomplete="cliente">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%"
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
                                                    document.getElementById('cliente').value = {!!json_encode($registro->Id)!!};
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
                <h3 class="col-md-4 col-form-label text-md-center">Productos:</h3>
                <div class="row">
                    <div class="card mb-3 table-sm col-md-6">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" data-name="my_table"
                                       width="100%"
                                       cellspacing="0">
                                    @if(!$usuarios->isEmpty())
                                        <thead>
                                        <tr>
                                            <th>Mover</th>
                                            @foreach ($insumos->get(0) as $key => $value)
                                                <th>{{$key}}</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($insumos as $registro)
                                            <tr id="tri" +{{$registro->Id}}>
                                                <td align="center">
                                                    <a id="i{{$registro->Id}}" class="btn btn-secondary text-white">
                                                        <em class="fas fa-angle-right"></em>
                                                    </a>
                                                </td>
                                                @foreach ($registro as $key => $value)
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Mover</th>
                                            @foreach ($insumos[0] as $key => $value)
                                                <th>{{$key}}</th>
                                            @endforeach
                                        </tr>
                                        </tfoot>
                                    @else
                                        <h3 align="center">No hay registros disponibles, intentelo más tarde</h3>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 col-md-6">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table data-name="my_table" class="table table-bordered table-sm"
                                       width="100%" cellspacing="0">
                                    @if(!$insumos->isEmpty())
                                        <thead>
                                        <tr>
                                            <th>Mover</th>
                                            @foreach ($usuarios->get(0) as $key => $value)
                                                <th>{{$key}}</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($insumos as $registro)
                                            <tr id="trc" +{{$registro->Id}}>
                                                <td align="center">
                                                    <a id="{{$registro->Id}}" class="btn btn-secondary text-white">
                                                        <em class="fas fa-angle-left"></em>
                                                    </a>
                                                </td>
                                                @foreach ($registro as $key => $value)
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Mover</th>
                                            @foreach ($insumos[0] as $key => $value)
                                                <th>{{$key}}</th>
                                            @endforeach
                                        </tr>
                                        </tfoot>
                                    @else
                                        <h3 align="center">No hay registros disponibles, intentelo más tarde</h3>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-center">
            <div align="center" class="btn-toolbar" role="toolbar">
                <br>
                <div class="btn-group col-md">
                    <input id="btnregistrar" type="button" value="Registrar" class="btn btn-primary"
                           onclick="registrarVenta()"/>
                    <input type="button" value="Limpiar" class="btn btn-secondary" onclick="limpiarCampos()"/>
                </div>
                <br>
                <div class="btn-group col-md">
                    <input type="button" value="Modificar" class="btn btn-warning" onclick="modificarVenta()"/>
                    <input type="button" value="Eliminar" class="btn btn-danger" onclick="eliminarVenta()"/>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Registro de ventas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(!$registros->isEmpty())
                    <table class="table table-bordered" data-name="my_table" width="100%"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th>Seleccionar</th>
                            @foreach ($registros->get(0) as $key => $value)
                                @if($key != "Id cliente")
                                    <td>{{$key}}</td>
                                @endif
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($registros as $registro)
                            <tr>
                                <td align="center">
                                    <a id="r{{$registro->Id}}" class="btn btn-secondary text-white"
                                       href="#page-top">
                                        <em class="fas fa-angle-up"></em>
                                        Ver
                                    </a>
                                </td>
                                <script type="text/javascript">

                                    var cambiar = function () {
                                        document.getElementById('btnregistrar').disabled = true;
                                        document.getElementById('id').value = {!!json_encode($registro->Id)!!};
                                        document.getElementById('cliente').value = {!!json_encode($registro->{'Id cliente'})!!};
                                    };
                                    var input = document.getElementById("r" +{!!json_encode($registro->Id)!!});
                                    input.addEventListener('click', cambiar);

                                </script>
                                @foreach ($registros[0] as $key => $value)
                                    @if($key != "Id cliente")
                                        <td>{{ $registro->{$key} }}</td>
                                    @endif
                                @endforeach

                            </tr>

                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Seleccionar</th>
                            @foreach ($registros[0] as $key => $value)
                                @if($key != "Id cliente")
                                    <td>{{$key}}</td>
                                @endif
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

    <script type="text/javascript">

        function seleccionarCliente(id) {
            document.getElementById('cliente').value = id;
        };

        // $('[id^=c]').click(seleccionarCliente($this.id))
        //
        // function moverAlCarrito(id) {
        //
        //     $('#tablacarrito tbody').append(fila)
        //     fila.remove()
        // }
        //
        // $('[id^=c]').click(function () {
        //     $this.addEventListener('click',moverAlCarrito($this.id))
        // })
        //
        // function sacarDelCarrito(fila) {
        //
        // }

        // let registros = $('[id^=r]');
        // registros.on("click",function () {
        //     fila = $(this)[0];
        //     console.log(fila);
        //     document.getElementById('btnregistrar').disabled = true;
        //     document.getElementById('id').value = fila.id.replace("r","");
        //     document.getElementById('cliente').value = fila.;
        // })

        // function cargarVenta(fila) {
        //     console.log(fila);
        //     document.getElementById('btnregistrar').disabled = true;
        //     document.getElementById('id').value = fila.id;
        //     document.getElementById('cliente').value = fila.cliente;
        // };

        function registrarVenta() {
            document.form1.action = '{{ route('ventas.store') }}';
            document.form1.submit();
        }

        function modificarVenta() {
            document.form1.action = '{{ route('ventas.update') }}';
            document.form1.submit();
        }

        function eliminarVenta() {
            var opcion = confirm("¿Está seguro que desea eliminar el Venta seleccionado?");
            if (opcion) {
                var valor = document.getElementById('id').value;
                document.form1.action = '{{ route('ventas.delete') }}';
                document.form1.submit();
            }

        }

        function limpiarCampos() {
            document.getElementById('id').value = "";
            document.getElementById('cliente').value = "";
            document.getElementById('btnregistrar').disabled = false;
        }

    </script>
@endsection
