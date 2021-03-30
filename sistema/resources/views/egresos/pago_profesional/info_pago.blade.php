@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		@foreach($info as $i)
		<h3>Historial de Pago de {{$i->nombre_taller}}:</h3>
		@endforeach
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre Profesional</th>
					<th>Apellido Profesional</th>
					<th>Importe</th>
					<th>Fecha de Pago</th>
					<th>Estado</th>
				</thead>
				@foreach($info as $inf)
				<tr>
					<td>{{$inf->nombre_personal}}</td>
					<td>{{$inf->apellido_personal}}</td>
					<td>{{$inf->importe_taller_personal}}</td>
					<td>{{$inf->fecha_detalle_egreso}}</td>	
					<td>{{$inf->estado_taller_personal}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$info->render()}}
	</div>
</div>

@endsection