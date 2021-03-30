<?php
  $MonthArray = array(
    "1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril",
    "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto",
    "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre",
  );
?>

@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Pago de Socio:</h3>
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

			{!!Form::model($socio,['method'=>'PATCH', 'route'=> ['cuota_organizacion.update', $socio->id_socio]])!!}
			{{Form::token()}}

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Apellido</label>
				<input type="text" name="apellido_socio" required value="{{$socio->apellido_socio}}" class="form-control" readonly>
			</div>
		</div>
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre_socio" required value="{{$socio->nombre_socio}}" class="form-control" readonly>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Inicio de cuota</label>
				<input type="text" name="fecha_cuota_fija_inicio_administracion" required value="{{$administracion->fecha_cuota_fija_inicio_administracion}}" class="form-control" readonly>
			</div>
		</div>
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Fin de cuota</label>
				<input type="text" name="fecha_cuota_fija_fin_administracion" required value="{{$administracion->fecha_cuota_fija_fin_administracion}}" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Valor Cuota</label>
				<input type="text" name="cuota_fija_administracion" required value="{{$administracion->cuota_fija_administracion}}" class="form-control" readonly>
			</div>
		</div>

		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Mes a pagar</label>
				<select name="mes_detalle_ingreso" class="form-control">

  					<option value="">Seleccione el mes</option>
  						<?php
    						foreach ($MonthArray as $monthNum=>$month) {
      						$selected = (isset($getMonth) && $getMonth == $monthNum) ? 'selected': '';
      						
      						echo '<option ' . $selected . ' value="' . $monthNum . '">' . $month . '</option>';}
      						?>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Valor de descuento</label>
				@if($soc->descuento->count()==0)
				<input type="text" name="descuento_detalle_ingreso" 
				required value="0" class="form-control" readonly>
				@else
				<input type="text" name="descuento_detalle_ingreso" 
				required value="{{$socio->descuento->first()->valor_descuento}}"class="form-control" readonly>
				@endif
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Importe a pagar</label>
				@if($soc->descuento->count()==0)
				<input type="text" name="importe_detalle_ingreso" required value="{{$administracion->cuota_fija_administracion}}" class="form-control" readonly>

					
			@else
				<input type="text" name="importe_detalle_ingreso" required value="{{$administracion->cuota_fija_administracion-($administracion->cuota_fija_administracion
				/100)*$soc->descuento->first()->valor_descuento
				}}" class="form-control" readonly>
					@endif
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