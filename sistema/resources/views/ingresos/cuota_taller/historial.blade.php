@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Historial de Pagos <a href="nuevo_pago"><button class="btn btn-success">Nuevo Pago</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha de Pago</th>
					<th>Taller</th>
					<th>Nombre Socio</th>
					<th>Apellido Socio</th>
					<th>Valor Cuota</th>
					<th>Mes</th>
					<th>Año</th>
					<th>Importe Abonado</th>
					
					
				</thead>
				@foreach($historial as $h)
				<tr>
					<td>{{$h->fecha_detalle_ingreso}}</td>
					<td>{{$h->nombre_taller}}</td>
					<td>{{$h->nombre_socio}}</td>
					<td>{{$h->apellido_socio}}</td>
					<td>{{$h->cuota_taller}}</td>
					<td>{{$h->mes_detalle_ingreso}}</td>
					<td>{{$h->año_detalle_ingreso}}</td>
					<td>{{$h->importe_detalle_ingreso}}</td>
					
				</tr>
			
				@endforeach
			</table>
		</div>
		{{$historial->render()}}
	</div>
</div>

@endsection