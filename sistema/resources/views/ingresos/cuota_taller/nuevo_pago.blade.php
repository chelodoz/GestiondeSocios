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

		

			{!!Form::model($datos,['method'=>'PATCH', 'route'=> ['ingresos.cuota_taller.importe_pago', $datos[0],$datos[1]]])!!}
			{{Form::token()}}

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label for="nombre">Taller</label>
				<input type="text" name="nombre_taller" required value="{{$taller->nombre_taller}}" class="form-control" readonly>
			</div>
		</div>
		
	</div>

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
				<label for="nombre">Valor Cuota</label>
				<input type="text" name="cuota_taller" required value="{{$taller->cuota_taller}}" class="form-control" readonly>
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
				<label for="nombre">Importe a pagar</label>
				<input type="text" name="importe_detalle_ingreso" required value="{{$taller->cuota_taller}}" class="form-control" readonly>
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