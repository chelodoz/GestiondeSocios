@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Personal:</h3>
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

			{!!Form::model($personal,['method'=>'PATCH', 'route'=> ['personal.update', $personal->id_personal]])!!}
			{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre_personal">Nombre</label>
				<input type="text" name="nombre_personal" required value="{{$personal->nombre_personal}}" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="apellido_personal">Apellido</label>
				<input type="text" name="apellido_personal" required value="{{$personal->apellido_personal}}" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Documento</label>
				<select name="tipo_documento_personal" class="form-group">
					@if($personal->tipo_documento_personal=='DNI')
					<option value="DNI" selected>DNI</option>
					<option value="CUIL">CUIL</option>
					<option value="PAS">PAS</option>
					@elseif($personal->tipo_documento_personal=='CUIL')
					<option value="DNI">DNI</option>
					<option value="CUIL" selected>CUIL</option>
					<option value="PAS">PAS</option>
					@else
					<option value="DNI">DNI</option>
					<option value="CUIL">CUIL</option>
					<option value="PAS" selected>PAS</option>
					@endif
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_documento_personal">Número Documento</label>
				<input type="text" name="num_documento_personal" required value="{{$personal->num_documento_personal}}" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="telefono_personal">Teléfono</label>
				<input type="text" name="telefono_personal" required value="{{$personal->telefono_personal}}" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="celular_personal">Celular</label>
				<input type="text" name="celular_personal" required value="{{$personal->celular_personal}}" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Categoría</label>
				<select name="id_cat_organizacion" class="form-control">
					@foreach($categorias as $cat)
						@if($cat->id_cat_organizacion==$personal->id_cat_organizacion)
						<option value="{{$cat->id_cat_organizacion}}" selected>{{$cat->nombre_cat_organizacion}}</option>
						@else
						<option value="{{$cat->id_cat_organizacion}}">{{$cat->nombre_cat_organizacion}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="correo_personal">Email</label>
				<input type="text" name="correo_personal" required value="{{$personal->correo_personal}}" class="form-control">
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