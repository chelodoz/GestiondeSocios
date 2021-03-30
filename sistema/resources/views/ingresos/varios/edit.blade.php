@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Ingreso:</h3>
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

			{!!Form::model($ingresos,['method'=>'PATCH', 'route'=> ['varios.update', $ingresos->id_detalle_ingreso]])!!}
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
    			name="fecha_detalle_ingreso" value="{{$ingresos->fecha_detalle_ingreso}}">
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
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-8">
			<div class="form-group">
				<label for="nombre_ingreso">Se Recibe de:</label>
				<input type="text" name="nombre_detalle_ingreso" required value="{{$ingresos->nombre_detalle_ingreso}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
			<div class="form-group">
				<label for="importe_detalle_ingreso">Importe</label>
				<input type="text" name="importe_detalle_ingreso" required value="{{$ingresos->importe_detalle_ingreso}}" class="form-control">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="concepto_detalle_ingreso">En concepto de:</label>
				<input type="text" name="concepto_detalle_ingreso" required value="{{$ingresos->concepto_detalle_ingreso}}" class="form-control">
			</div>
		</div>
	</div>	
	
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion_detalle_ingreso">Notas:</label>
				<input type="text" name="descripcion_detalle_ingreso"  value="{{$ingresos->descripcion_detalle_ingreso}}" class="form-control">
			</div>
		</div>
	</div>	


		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>

			{!!Form::close()!!}

	
@endsection