@extends('layouts.app')

@section('content')
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


		                    
		                    @if(session()->has('predict'))
		                    <div align="center">
		                    	<h3 class="row justify-content-center">{{session('predict')}}</h3>
		                    	<label class="row justify-content-center">Nota: El sistema de predicciones arroja resultados meramente tentativos, no son completamente fiables y no reemplazan el criterio de un profesional especializado en el área.</label>
		                    </div>  
		                    <br>
  							@endif


		                    
		                    <form method="POST" action="{{route('diagnostica.predict')}}"> 
		                    @csrf
							
								@foreach($diagnostica as $problemas)
								@if($problemas->tipodato === 'yesno')
									<label><input type="checkbox" name={{$problemas->nombre}} > {{ $problemas->descripcion }} </label><br>
								@else
									<label >{{$problemas->descripcion}} <input type="number" min="0" name= {{ $problemas->nombre }}> </label><br>
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