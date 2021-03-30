

@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h1>Datos del Socio</h1>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Fecha de Nacimiento</th>
					<th>Tipo Documento</th>
					<th>Numero Documento</th>
					
				</thead>
				@foreach($socios as $soc)
				<tr>
					
					<td>{{$soc->nombre_socio}}</td>
					<td>{{$soc->apellido_socio}}</td>
					<td>{{$soc->fecha_de_nacimiento_socio}}</td>
					<td>{{$soc->tipo_documento_socio}}</td>
					<td>{{$soc->num_documento_socio}}</td>	
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$socios->render()}}
	</div>
</div>

<div class="row">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h1>Datos de la Familia</h1>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombre y Apellido Padre</th>
					<th>Nombre y Apellido Madre</th>
					<th>Nombre y Apellido Padre Tutor</th>
					<th>Número de Telefono</th>
					<th>Número de Celular</th>
					
				</thead>
				@foreach($socios as $soc)
				<tr>
					
					<td>{{$soc->familia->nombre_padre_familia}}</td>
					<td>{{$soc->familia->nombre_madre_familia}}</td>
					<td>{{$soc->familia->nombre_tutor_familia}}</td>
					<td>{{$soc->familia->telefono_familia}}</td>
					<td>{{$soc->familia->celular_familia}}</td>	
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$socios->render()}}
	</div>
</div>

<div class="row">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h1>Datos del Domicilio</h1>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Dirección</th>
					<th>Provincia</th>
					<th>Localidad</th>
					<th>Código Postal</th>
					
				</thead>
				@foreach($socios as $soc)
				<tr>
					
					<td>{{$soc->domicilio->direccion_domicilio}}</td>
					<td>{{$soc->domicilio->nombre_provincia_domicilio}}</td>
					<td>{{$soc->domicilio->nombre_provincia_domicilio}}</td>
					<td>{{$soc->domicilio->codigo_postal_domicilio}}</td>
					
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$socios->render()}}
	</div>
</div>

<div class="row">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h1>Datos de la Institución</h1>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombre</th>
					<th>Domicilio</th>
					<th>Grado</th>
				
					
				</thead>
				@foreach($socios as $soc)
				<tr>
		
		
					<td>{{$soc->institucion->nombre_institucion}}</td>
					<td>{{$soc->institucion->domicilio_institucion}}</td>
					<td>{{$soc->institucion->grado_institucion}}</td>
					
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$socios->render()}}
	</div>
</div>

@endsection