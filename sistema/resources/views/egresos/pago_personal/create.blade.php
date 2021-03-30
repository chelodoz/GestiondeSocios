@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Asignar Pago A:</h3>
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
		
		
			{!!Form::open(array('url'=>'egresos/pago_personal', 'method'=>'POST', 'autocomplete'=> 'off', 'files'=>'true'))!!}
			{{Form::token()}}

	<div class="row">
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-8">
			<div class="form-group">
				<label>Apellido, Nombre y Categoria del Personal:</label>
				<select name="id_personal" class="form-control">
					@foreach($personal as $per)
						@foreach($per->cat_organizacion as $cat)
							<option value="{{$per->id_personal, $cat->id_cat_organizacion}}">{{$per->apellido_personal.', '.$per->nombre_personal.':  '.$cat->nombre_cat_organizacion}}</option>
						@endforeach
					@endforeach
					</output>
				</select>
			</div>
		</div>
	</div>		

	<div class="row">
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-8">
			<div class="form-group">
				<label>Importe de Pago</label>
				<input type="text" name="cuota_detalle_personal" class="form-control" required value="{{old('cuota_detalle_personal')}}" placeholder="$...">
			</div>
		</div>
	</div>	
	
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>	
	</div>

			{!!Form::close()!!}

@endsection