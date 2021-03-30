@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Inscripcion de Socio: {{$socios->apellido_socio}}, {{$socios->nombre_socio}}</h3>
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

			{!!Form::model($socios,['method'=>'PATCH', 'route'=> ['asociados.socio.inscribir', $socios->id_socio]])!!}
			{{Form::token()}}

	

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Listado de Talleres</label>
				<select name="id_taller" class="form-control">
					@foreach($taller as $tal)
						<option value="{{$tal->id_taller}}">{{$tal->nombre_taller}}</option>
					@endforeach
				</select>
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