@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Cuotas Organizacion: <a href="administrar_cuota\create"><button class="btn btn-success">Nueva Cuota</button></a></h3>
		@include('administracion.administrar_cuota.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Valor de Cuota</th>
					<th>Fecha de Inicio de Cuota</th>
					<th>Fecha de Fin de Cuota</th>
			
				</thead>
				@foreach($administracion as $adm)
				<tr>
				
					<td>{{$adm->cuota_fija_administracion}}</td>
					<td>{{$adm->fecha_cuota_fija_inicio_administracion}}</td>
					<td>{{$adm->fecha_cuota_fija_fin_administracion}}</td>
					
					<td>
						<a href="" data-target="#modal-delete-{{$adm->id_administracion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.administrar_cuota.modal')
				@endforeach
			</table>
		</div>
		{{$administracion->render()}}
	</div>
</div>

@endsection

