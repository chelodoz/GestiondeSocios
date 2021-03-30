<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Gasto</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::open(array('url'=>'egresos/gastos_varios', 'method'=>'POST', 'autocomplete'=> 'off'))!!}
			{{Form::token()}}
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

	<script src="{{asset('bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

<div class="row">
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
  		<div class="form-group">
    		<label>Fecha</label>
    			<input class="date form-control" type="text"
    			name="fecha_detalle_egreso">
  		</div>
		<script type="text/javascript">
    		$('.date').datepicker({  
       		format: 'yyyy/mm/dd',
       		locale: 'en',
       		autoclose: true
     		});  
		</script>

	</div>
</div>
		
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion_detalle_egreso">Descripcion</label>
				<input type="text" name="descripcion_detalle_egreso" required value="{{old('descripcion_detalle_egreso')}}" class="form-control" placeholder="Descripcion...">
			</div>
		</div>
	</div>	

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="importe_detalle_egreso">Importe</label>
				<input type="text" name="importe_detalle_egreso" required value="{{old('importe_detalle_egreso')}}" class="form-control" placeholder="$...">
			</div>
		</div>
	</div>	

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>


	

			{!!Form::close()!!}

		
@endsection