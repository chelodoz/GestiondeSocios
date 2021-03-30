@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Descuentos <a href="descuentos/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Valor Del Descuento</th>
					<th>Opciones</th>
				</thead>
				@foreach($descuento as $d)
				<tr>
					<td>{{$d->id_descuento}}</td>
					<td>{{$d->valor_descuento}}</td>
					<td>
						<a href="{{URL::action('AdministracionDescuentoController@edit', $d->id_descuento)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$d->id_descuento}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.descuentos.modal')
				@endforeach
			</table>
		</div>
		{{$descuento->render()}}
	</div>
</div>

@endsection