@extends('layouts.app')

@section('content')


@if(session()->has('success'))

    <div align="center" class="alert alert-info" role="alert">{{session('success')}}</div>

    <div align="center" class="alert alert-warning">
    	Nota: El sistema de predicciones arroja resultados meramente tentativos, no son completamente fiables y no reemplazan el criterio de un profesional especializado en el área.
    </div>  
    <br>

@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
        	<div class="card">
        		<div class="card-header">
        			<h2 align="center">Diagnóstico de equipos de escritorio</h2>
        		</div>
     
             	@if(!session()->has('predict'))
        			<br>
		            <h3 class="txtadvisor">Responda el siguiente cuestionario para averiguar que problemas puede tener el equipo de mesa.</h3>
		         @endif
	             	<div class="card-body">


		                    @if (session('status'))
		                        <div class="alert alert-success" role="alert">
		                            {{ session('status') }}
		                        </div>
		                    @endif

		                    <script type="text/javascript"></script>


		                 


		                    
		                    <form method="POST" action="{{route('diagnostica.predict')}}"> 
		                    @csrf
							
								@foreach($diagnostica as $problemas)
								@if($problemas->tipodato === 'yesno')
								<div class="form-group row">
		                            <label class="col-md-4 col-form-label text-md-left">{{$problemas->descripcion}}</label>
		                            <div class="col-md-8">
		                                <input class="form-control" type="checkbox" @error($problemas->nombre) is-invalid @enderror name="{{$problemas->nombre}}" autocomplete="{{$problemas->nombre}}" value="{{old($problemas->nombre)}}">
		                                @error($problemas->nombre)
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                        </div>
								@else

								@if($problemas->nombre === 'aniocompra')
								<div class="form-group row">
		                            <label class="col-md-4 col-form-label text-md-left">{{$problemas->descripcion}}</label>
		                            <div class="col-md-8">
		                                <input class="form-control" type="number" min="0" max="100" @error($problemas->nombre) is-invalid @enderror name="{{$problemas->nombre}}" autocomplete="{{$problemas->nombre}}" value="{{old($problemas->nombre)}}">
		                                @error($problemas->nombre)
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                        </div>
									
								@else
									<div class="form-group row">
		                            <label class="col-md-4 col-form-label text-md-left">{{$problemas->descripcion}}</label>
		                            <div class="col-md-8">
		                                <input class="form-control" type="number" min="0" max="24" @error($problemas->nombre) is-invalid @enderror name="{{$problemas->nombre}}" autocomplete="{{$problemas->nombre}}" value="{{old($problemas->nombre)}}">
		                                @error($problemas->nombre)
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                        </div>
								@endif
									
								@endif
								
								@endforeach

								<div align="center">
									<br>
								<button class="btndiag">Haga su diagnóstico</button> 
								</div>
								
		                    </form>
		                  
	             </div>
	            
            </div>
        </div>
    </div>
</div>
<br>
@endsection