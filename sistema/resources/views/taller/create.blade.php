<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Taller</h3>
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

			{!!Form::open(array('url'=>'taller', 'method'=>'POST', 'autocomplete'=> 'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre_taller" required class="form-control" placeholder="Nombre...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
			<div class="form-group">
				<label for="descripcion_taller">Descripción</label>
				<input type="text" name="descripcion_taller"  class="form-control" placeholder="Descripción...">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-8">
			<div class="form-group">
				<label for="cuota_taller">Cuota Taller</label>
				<input type="text" name="cuota_taller" required  class="form-control" placeholder="$...">
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