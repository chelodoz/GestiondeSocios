@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Gastos <a href="gastos_varios/create"><button class="btn btn-success">Nuevo Gasto</button></a></h3>
		@include('egresos.gastos_varios.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Descripcion</th>
					<th>Importe</th>
					<th>Opciones</th>
				</thead>
				@foreach($gastos as $gas)
				<tr>
					<td>{{$gas->fecha_detalle_egreso}}</td>
					<td>{{$gas->descripcion_detalle_egreso}}</td>
					<td>{{$gas->importe_detalle_egreso}}</td>
					<td>
						<a href="{{URL::action('EgresoGastosVariosController@edit', $gas->id_detalle_egreso)}}"><button class="btn btn-info">Editar</button></a>
						<!--<a href="{{URL::action('EgresoGastosVariosController@details', $gas->id_detalle_egreso)}}"><button class="btn btn-success">Detalles</button></a>-->
						<a href="" data-target="#modal-delete-{{$gas->id_detalle_egreso}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						
					</td>

					
				</tr>
				@include('egresos.gastos_varios.modal')
				@endforeach
			</table>
		</div>
		{{$gastos->render()}}
	</div>
</div>

@endsection