@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Pago Personal</h3>
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
		
		
			{!!Form::model($personal,['method'=>'PATCH', 'route'=> ['pago_personal.update', $personal->id_personal]])!!}
			{{Form::token()}}

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_personal" required value="{{$personal->nombre_personal}}" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="apellido_personal" required value="{{$personal->apellido_personal}}" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="id_cat_organizacion" required value="{{$personal->id_cat_organizacion}}" class="form-control" readonly>
			</div>
		</div>
	</div>

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

		<script src="{{asset('bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

		<div class="row">
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
  				<div class="form-group">
    				<label>Fecha de Pago Profesional</label>
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
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for=importe_detalle_egreso>Importe</label>
				<input type="text" name="importe_detalle_egreso" required value="{{$personal->importe_detalle_egreso}}" class="form-control" placeholder="$...">
			</div>
		</div>
	</div>			

		
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
</div>

			

			{!!Form::close()!!}

		
@endsection