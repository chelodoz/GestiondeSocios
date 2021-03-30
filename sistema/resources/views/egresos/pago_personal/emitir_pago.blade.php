@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado del Personal</h3>
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
						<a href="{{route('listado_pago', ['id'=>$cat->id_cat_organizacion,'id2'=>$per->id_personal])}}"><button class="btn btn-info">Listado Pago</button></a>
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