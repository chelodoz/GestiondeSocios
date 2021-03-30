@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Administrador: Listado de Socios</h3>
		@include('administracion.administrar_socio.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Numero Documento</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				@foreach($socios as $soc)
				<tr>
					
					<td>{{$soc->nombre_socio}}</td>
					<td>{{$soc->apellido_socio}}</td>
					<td>{{$soc->num_documento_socio}}</td>
					<td>@if($soc->estado_socio=='1')
							<dd>Activo</dd>
						@else
							<dd>Inactivo</dd>
						@endif</td>
							
					<td>
						<a href="{{URL::action('AdministracionSocioController@edit', $soc->id_socio)}}"><button class="btn btn-info">Asignar Descuento</button></a>
						<a href="" data-target="#modal-delete-{{$soc->id_socio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.administrar_socio.modal')
				@endforeach
			</table>
		</div>
		{{$socios->render()}}
	</div>
</div>

@endsection