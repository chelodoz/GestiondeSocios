@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Historial de Pagos <a href="cuota_organizacion/edit"><button class="btn btn-success">Nuevo Pago</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha de Pago</th>
					<th>Valor Cuota</th>
					<th>Inicio de Cuota</th>
					<th>Fin de Cuota</th>
					<th>Mes Abonado</th>
					<th>Año Abonado</th>
					<th>Importe Abonado</th>
					<th>Descuento</th>
					
				</thead>
				@foreach($historial as $h)
				@foreach($administracion as $a)
				<tr>
					<td>{{$h->fecha_detalle_ingreso}}</td>
					<td>{{$a->cuota_fija_administracion}}</td>
					<td>{{$a->fecha_cuota_fija_inicio_administracion}}</td>
					<td>{{$a->fecha_cuota_fija_fin_administracion}}</td>
					<td>{{$h->mes_detalle_ingreso}}</td>
					<td>{{$h->año_detalle_ingreso}}</td>
					<td>{{$h->importe_detalle_ingreso}}</td>
					@if($h->descuento_detalle_ingreso==0)
					<td>Ninguno</td>
					@else
					<td>{{$h->descuento_detalle_ingreso}} %</td>
					@endif
				</tr>
				@endforeach
				@endforeach
			</table>
		</div>
		{{$historial->render()}}
	</div>
</div>

@endsection