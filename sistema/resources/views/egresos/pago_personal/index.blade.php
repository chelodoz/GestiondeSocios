@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Categorias: </h3>
		@include('egresos.pago_personal.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Categoria</th>
					<th>Descripcion</th>
					<th>Opciones</th>
				</thead>
				@foreach($categorias as $cat)
				<tr>	
					<td>{{$cat->nombre_cat_organizacion}}</td>
					<td>{{$cat->descripcion_cat_organizacion}}</td>
					<td>
						<a href="{{URL::action('EgresoPagoPersonalController@crear_pago', $cat->id_cat_organizacion)}}"><button class="btn btn-success">Crear Pago</button></a>
						<a href="{{URL::action('EgresoPagoPersonalController@emitir_pago', $cat->id_cat_organizacion)}}"><button class="btn btn-info">Emitir Pago</button></a>
					</td>
				</tr>
				@include('egresos.pago_personal.modal')
				@endforeach
			</table>
		</div>
		{{$categorias->render()}}
	</div>
</div>

@endsection