@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Talleres <a href="taller/create"><button class="btn btn-success">Nuevo Taller</button></a></h3>
		@include('taller.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre del Taller</th>
					<th>Descripcion</th>
					<th>Cuota</th>

					<th>Opciones</th>
				</thead>
				@foreach($taller as $tal)
				<tr>
					<td>{{$tal->nombre_taller}}</td>
					<td>{{$tal->descripcion_taller}}</td>
					<td>{{$tal->cuota_taller}}</td>
						
					
					<td>
						<a href="{{URL::action('TallerController@details', $tal->id_taller)}}"><button class="btn btn-success">Asignar Profesional</button></a>
						<a href="{{URL::action('TallerController@edit', $tal->id_taller)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$tal->id_taller}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						
						
					</td>

					
				</tr>
				@include('taller.modal')
				@endforeach
			</table>
		</div>
		{{$taller->render()}}
	</div>
</div>

@endsection