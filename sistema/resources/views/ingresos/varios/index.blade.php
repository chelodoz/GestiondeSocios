@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ingresos <a href="varios/create"><button class="btn btn-success">Nuevo Ingreso</button></a></h3>
		@include('ingresos.varios.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>A Nombre De</th>
					<th>Concepto</th>
					<th>Importe</th>
					<th>Opciones</th>
				</thead>
				@foreach($ingresos as $ing)
				<tr>
					<td>{{$ing->fecha_detalle_ingreso}}</td>
					<td>{{$ing->nombre_detalle_ingreso}}</td>
					<td>{{$ing->concepto_detalle_ingreso}}</td>
					<td>{{$ing->importe_detalle_ingreso}}</td>
					<td>
						<a href="{{URL::action('IngresoVariosController@edit', $ing->id_detalle_ingreso)}}"><button class="btn btn-info">Editar</button></a>
						<a href=""><button class="btn btn-warning">Imprimir Cupón</button></a>
						<!--<a href="" data-target="#modal-delete-{{$ing->id_detalle_ingreso}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
					</td>

					
				</tr>
				@include('ingresos.varios.modal')
				@endforeach
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>

@endsection