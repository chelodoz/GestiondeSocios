@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pagos </h3>
		@if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
	</div>
</div>



{{Form::token()}}
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Categoría</th>
					<th>Cuota</th>
					<th>Pagado</th>
					<th>Mes</th>
					<th>Año</th>
					

				</thead>
				@foreach($personal as $per)
				<tr>	
							<td>{{$per->nombre_personal}}</td>
							<td>{{$per->nombre_cat_organizacion}}</td>
							<td>{{$per->cuota_detalle_personal}}</td>
							<td>{{$per->sum}}</td>
							<td>{{$per->mes_detalle_personal}}</td>
							<td>{{$per->año_detalle_personal}}</td>	
					<td>
						<a href="{{route('pago', ['id'=>$per->id_cat_organizacion, 'id1'=>$per->id_personal,'id2'=>$per->mes_detalle_personal,'id3'=>$per->año_detalle_personal])}}"><button class="btn btn-success">Crear Pago</button></a>
					
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$personal->render()}}
	</div>
</div>
{!!Form::close()!!}

@endsection