@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Personal</h3>
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
		
		
			{!!Form::open(array('url'=>'administracion/organizacion/personal', 'method'=>'POST', 'autocomplete'=> 'off', 'files'=>'true'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre_personal">Nombre</label>
				<input type="text" name="nombre_personal" required value="{{old('nombre_personal')}}" class="form-control" placeholder="Nombre...">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="apellido_personal">Apellido</label>
				<input type="text" name="apellido_personal" required value="{{old('apellido_personal')}}" class="form-control" placeholder="Apellido...">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Documento</label>
				<select name="tipo_documento_personal" class="form-group">
					<option value="DNI">DNI</option>
					<option value="CUIL">CUIL</option>
					<option value="PAS">PAS</option>
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_documento_personal">Número Documento</label>
				<input type="text" name="num_documento_personal" required value="{{old('num_documento_personal')}}" class="form-control" placeholder="Numero Documento...">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="telefono_personal">Teléfono</label>
				<input type="text" name="telefono_personal" required value="{{old('telefono_personal')}}" class="form-control" placeholder="Telefono...">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="celular_personal">Celular</label>
				<input type="text" name="celular_personal" required value="{{old('celular_personal')}}" class="form-control" placeholder="Celular...">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Categoria</label>
				<select name="id_cat_organizacion" class="form-control">
					@foreach($categorias as $cat)
						<option value="{{$cat->id_cat_organizacion}}">{{$cat->nombre_cat_organizacion}}</option>
					@endforeach
				</select>
			</div>
		</div>


		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="correo_personal">Email</label>
				<input type="text" name="correo_personal" required value="{{old('correo_personal')}}" class="form-control" placeholder="Email...">
			</div>
		</div>
	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>	

	</div>

			{!!Form::close()!!}

@endsection