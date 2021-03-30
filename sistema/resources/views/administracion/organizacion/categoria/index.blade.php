@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Categorias <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('administracion.organizacion.categoria.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				@foreach($categorias as $cat)
				<tr>
					
					<td>{{$cat->nombre_cat_organizacion}}</td>
					<td>{{$cat->descripcion_cat_organizacion}}</td>
					<td>@if($cat->estado_cat_organizacion=='1')
							<dd>Activo</dd>
						@else
							<dd>Inactivo</dd>
						@endif</td>
					<td>
						<a href="{{URL::action('AdministracionCategoriaController@edit', $cat->id_cat_organizacion)}}"><button class="btn btn-info">Editar</button></a>
						<a href="{{URL::action('AdministracionCategoriaController@alta', $cat->id_cat_organizacion)}}"><button class="btn btn-success">Dar Alta</button></a>
						<a href="{{URL::action('AdministracionCategoriaController@baja', $cat->id_cat_organizacion)}}"><button class="btn btn-warning">Dar Baja</button></a>
						<a href="" data-target="#modal-delete-{{$cat->id_cat_organizacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.organizacion.categoria.modal')
				@endforeach
			</table>
		</div>
		{{$categorias->render()}}
	</div>
</div>

@endsection