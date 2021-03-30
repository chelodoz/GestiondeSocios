@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Socio: {{$socio->apellido_socio}}, {{$socio->nombre_socio}}</h3>
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

			{!!Form::model($socio,['method'=>'PATCH', 'route'=> ['socio.update', $socio->id_socio]])!!}
			{{Form::token()}}

		<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_socio" required value="{{$socio->nombre_socio}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="apellido_socio" required value="{{$socio->apellido_socio}}" class="form-control">
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
				<input type="text" name="num_documento_socio" required value="{{$socio->num_documento_socio}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="fecha_de_nacimiento_socio">Fecha De Nacimiento</label>
				<input type="date" name="fecha_de_nacimiento_socio" required value="{{$socio->fecha_de_nacimiento_socio}}" id="example-date-input">
			</div>
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
				<input type="text" name="nombre_padre_familia"  value="{{$socio->familia->nombre_padre_familia}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_madre_familia"  value="{{$socio->familia->nombre_madre_familia}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_tutor_familia"  value="{{$socio->familia->nombre_tutor_familia}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="telefono_familia" required value="{{$socio->familia->telefono_familia}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="celular_familia" required value="{{$socio->familia->celular_familia}}" class="form-control">
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
				<input type="text" name="direccion_domicilio" required value="{{$socio->domicilio->direccion_domicilio}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_provincia_domicilio" required value="{{$socio->domicilio->nombre_provincia_domicilio}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="nombre_localidad_domicilio" required value="{{$socio->domicilio->nombre_localidad_domicilio}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="codigo_postal_domicilio" required value="{{$socio->domicilio->codigo_postal_domicilio}}" class="form-control">
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
				<input type="text" name="nombre_institucion" required value="{{$socio->institucion->nombre_institucion}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="domicilio_institucion" required value="{{$socio->institucion->domicilio_institucion}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<input type="text" name="grado_institucion" required value="{{$socio->institucion->grado_institucion}}" class="form-control">
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