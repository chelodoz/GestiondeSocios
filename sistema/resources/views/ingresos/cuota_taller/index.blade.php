@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Talleres</h3>
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
						<a href="{{URL::action('IngresoCuotaTallerController@listado_socios', $tal->id_taller)}}"><button class="btn btn-info">Listado de Socios</button></a>
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