@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar talleres: {{$taller->nombre_taller}}</h3>
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

			{!!Form::model($taller,['method'=>'PATCH', 'route'=> ['taller.profesional', $taller->id_taller]])!!}
			{{Form::token()}}

	<div class="row">
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
			<div class="form-group">
				<label for="nombre_taller">Nombre</label>
				<input type="text" name="nombre_taller" required value="{{$taller->nombre_taller}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
			<div class="form-group">
				<label for="descripcion_taller">Descripción</label>
				<input type="text" name="descripcion_taller"  required value="{{$taller->descripcion_taller}}" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-8">
			<div class="form-group">
				<label for="cuota_taller">Cuota Taller</label>
				<input type="text" name="cuota_taller" required value="{{$taller->cuota_taller}}"  class="form-control">
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