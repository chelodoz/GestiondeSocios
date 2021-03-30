@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Datos del Socio</h3>
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
			{!!Form::open(array('url'=>'asociados/socio', 'method'=>'POST', 'autocomplete'=> 'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_socio" required class="form-control" placeholder="Nombre...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="apellido_socio" required  class="form-control" placeholder="Apellido...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1 col-sm-1 col-md-1 col-xs-3">
			<div class="form-group">
				<label>Documento</label>
				<select name="tipo_documento_socio" class="form-group">
					<option value="DNI">DNI</option>
					<option value="CUIL">CUIL</option>
					<option value="PAS">PAS</option>
				</select>
			</div>
		</div>
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-3">
			<div class="form-group">
				<label></label>
				<input type="text" name="num_documento_socio" required class="form-control" placeholder="Número Documento...">
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
    		<label>Fecha de Nacimiento</label>
    			<input class="date form-control" type="text"
    			name="fecha_de_nacimiento_socio">
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
			<h3>Datos Familia</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-4">
			<div class="form-group">
				<input type="text" name="nombre_padre_familia"  class="form-control" placeholder="Nombre y Apellido Padre...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_madre_familia"   class="form-control" placeholder="Nombre y Apellido Madre...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_tutor_familia"  class="form-control" placeholder="Nombre y Apellido Tutor...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="telefono_familia" required class="form-control" placeholder="Número de Telefono...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="celular_familia" required class="form-control" placeholder="Número de Celular...">
			</div>
		</div>
	</div>
			
			
			
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<h3>Domicilio</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="direccion_domicilio" required class="form-control" placeholder="Domicilio...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_provincia_domicilio" required  class="form-control" placeholder="Provincia...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_localidad_domicilio" required class="form-control" placeholder="Localidad...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="codigo_postal_domicilio" required class="form-control" placeholder="Codigo Postal...">
			</div>
		</div>
	</div>
			
			
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<h3>Institucion</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_institucion" required class="form-control" placeholder="Nombre Institucion...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="domicilio_institucion" required class="form-control" placeholder="Domicilio...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="grado_institucion" class="form-control" placeholder="Grado...">
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
			{!!Form::close()!!}

		
@endsection