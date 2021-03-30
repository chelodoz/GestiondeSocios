@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Socio Cuotas </h3>
		@include('ingresos.cuota_organizacion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>

					<th>Apellido Socio</th>
					<th>Nombre Socio</th>
					<th>Documento</th>
					

				</thead>
				@foreach($nombre as $nom)
				

				<tr>
					<td>{{$nom->apellido_socio}}</td>
					<td>{{$nom->nombre_socio}}</td>
					<td>{{$nom->num_documento_socio}}</td>
					
					<td>
						
						<a href="{{URL::action('IngresoCuotaOrganizacionController@historial', $nom->id_socio)}}" ><button class="btn btn-success">Nuevo Cupón</button></a>

						
						
					</td>
				</tr>
				
				
				@endforeach
			</table>
		</div>
		{{$nombre->render()}}
	</div>
</div>

@endsection