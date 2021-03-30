@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Administrador: Editar Socio</h3>
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

			{!!Form::model($socio,['method'=>'PATCH', 'route'=> ['administrar_socio.update', $socio->id_socio]])!!}
			{{Form::token()}}

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_socio" required value="{{$socio->nombre_socio}}" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="apellido_socio" required value="{{$socio->apellido_socio}}" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1 col-sm-1 col-md-1 col-xs-3">
			<div class="form-group">
				<label>Documento</label>
				<select name="tipo_documento_socio" class="form-group">
					@if($socio->tipo_documento_socio=='DNI')
					<option value="DNI" selected>DNI</option>
					<option value="CUIL">CUIL</option>
					<option value="PAS">PAS</option>
					@elseif($socio->tipo_documento_socio=='CUIL')
					<option value="DNI">DNI</option>
					<option value="CUIL" selected>CUIL</option>
					<option value="PAS">PAS</option>
					@else
					<option value="DNI">DNI</option>
					<option value="CUIL">CUIL</option>
					<option value="PAS" selected>PAS</option>
					@endif
				</select>
			</div>
		</div>
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-3">
			<div class="form-group">
				<label></label>
				<input type="text" name="num_documento_socio" required value="{{$socio->num_documento_socio}}" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="fecha_de_nacimiento_socio">Fecha De Nacimiento</label>
				<input type="date" name="fecha_de_nacimiento_socio" required value="{{$socio->fecha_de_nacimiento_socio}}" id="example-date-input" readonly>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label>Valor de Descuento</label>
				<select name="id_descuento" class="form-control">
					@foreach($descuento as $des)
						<option value="{{$des->id_descuento}}">{{$des->valor_descuento.' '.'%'}}</option>
					@endforeach
				</select>
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
    				<label>Fecha Inicio Descuento</label>
    					<input class="date form-control" type="text"
    					name="fecha_inicio_socio_has_descuento">
  				</div>
				<script type="text/javascript">
    				$('.date').datepicker({  
       				format: 'yyyy/mm/dd',
       				locale: 'en',
       				autoclose: true
     				});  
				</script>
			</div>

			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
  				<div class="form-group">
    				<label>Fecha Fin Descuento</label>
    					<input class="date form-control" type="text"
    					name="fecha_fin_socio_has_descuento">
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
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
</div>

			

			{!!Form::close()!!}

		
@endsection