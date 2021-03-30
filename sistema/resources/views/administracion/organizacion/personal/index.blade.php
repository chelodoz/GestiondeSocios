@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado del Personal <a href="personal/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('administracion.organizacion.personal.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Número Documento</th>
					<th>Categoría</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				@foreach($personas as $per)
				<tr>
					<td>{{$per->apellido_personal}}</td>
					<td>{{$per->nombre_personal}}</td>
					<td>{{$per->num_documento_personal}}</td>
						@foreach($per->cat_organizacion as $cat)
							<td>{{$cat->nombre_cat_organizacion}}</td>
						@endforeach	
					<td>{{$per->estado_personal}}</td>
					<td>
						<a href="{{URL::action('AdministracionPersonalController@edit', $per->id_personal)}}"><button class="btn btn-info">Editar</button></>
						<a href="{{URL::action('AdministracionPersonalController@details', $per->id_personal)}}" ><button class="btn btn-info">Detalles</button></a>

						<a href="{{URL::action('AdministracionPersonalController@alta', $per->id_personal)}}" ><button class="btn btn-success">Dar Alta</button></a>
						<a href="{{URL::action('AdministracionPersonalController@baja', $per->id_personal)}}" ><button class="btn btn-warning">Dar Baja</button></a>

						<a href="" data-target="#modal-delete-{{$per->id_personal}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.organizacion.personal.modal')     
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>

@endsection