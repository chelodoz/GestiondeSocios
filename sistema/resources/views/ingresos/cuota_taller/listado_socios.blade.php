@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Socios</h3>
		@include('asociados.socio.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Fecha de Nacimiento</th>
					<th>Tipo Documento</th>
					<th>Numero Documento</th>
					<th>Opciones</th>
				</thead>
				@foreach($socios as $soc)
				<tr>
					
					<td>{{$soc->nombre_socio}}</td>
					<td>{{$soc->apellido_socio}}</td>
					<td>{{$soc->fecha_de_nacimiento_socio}}</td>
					<td>{{$soc->tipo_documento_socio}}</td>
					<td>{{$soc->num_documento_socio}}</td>
					<td>				
						<a href="{{route('nuevo_cupon', ['id'=>$id_taller,'id2'=>$soc->id_socio])}}"><button class="btn btn-success">Nuevo Cupón</button></a>
					</td>
				</tr>
				@include('asociados.socio.modal')
				@endforeach
			</table>
		</div>
		{{$socios->render()}}
	</div>
</div>

@endsection