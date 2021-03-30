@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoria: {{$categoria->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($categoria,['method'=>'PATCH', 'route'=> ['categoria.update', $categoria->id_cat_organizacion]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre_cat_organizacion">Nombre</label>
				<input type="text" name="nombre_cat_organizacion" class="form-control" value="{{$categoria->nombre_cat_organizacion}}" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="descripcion_cat_organizacion">Descripcion</label>
				<input type="text" name="descripcion_cat_organizacion" class="form-control" value="{{$categoria->descripcion_cat_organizacion}}" placeholder="Descripcion...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}

		</div>
	</div>
@endsection