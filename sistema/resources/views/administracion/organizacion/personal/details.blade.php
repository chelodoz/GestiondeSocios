@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h1>Datos del Personal</h1>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Tipo Documento</th>
					<th>Numero Documento</th>
					<th>Telefono Personal</th>
					<th>Celular Personal</th>
					<th>Correo Personal</th>
					<th>Estado Personal</th>
					
				</thead>
				@foreach($personal as $per)
				<tr>
					
					<td>{{$per->nombre_personal}}</td>
					<td>{{$per->apellido_personal}}</td>
					<td>{{$per->tipo_documento_personal}}</td>
					<td>{{$per->num_documento_personal}}</td>
					<td>{{$per->telefono_personal}}</td>	
					<td>{{$per->celular_personal}}</td>
					<td>{{$per->correo_personal}}</td>
					<td>{{$per->estado_personal}}</td>
					
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$personal->render()}}
	</div>
</div>

@endsection