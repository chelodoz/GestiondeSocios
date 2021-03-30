
@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Cuota de un Socio</h3>
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
				<label>Socio</label>
				<input type="text" name="nombre_socio" required value="{{$socio->nombre_socio. ' ' .$socio->apellido_socio. ' ' .$socio->tipo_documento_socio. ' ' .$socio->num_documento_socio}}" class="form-control" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label>Deuda</label>
				<input type="text" name="valor_descuento" required value=" {{$deuda}}" class="form-control" readonly>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label>Pago Parcial</label>
				<input type="checkbox" id="myCheck" onChange="myFunction()">
			</div>
		

				<script>
				function myFunction() {

  var elements = document.getElementsByClassName("form-control");
  var el = document.getElementById("myCheck");

  for (var i = 0; i < elements.length; i++) {
    if (el.checked) {
      elements[i].disabled = false;
    } else {
      elements[i].disabled = true;
    }
  }
}
</script>

<script>
function disable() {

  var elements = document.getElementsByClassName("form-control");
  for (var i = 0; i < elements.length; i++) {
    
      elements[i].disabled = true;
    
  }
}
</script>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
			<div class="form-group">
				<label>Importe</label>
				<input type="text" name="importe_detalle_ingreso" required value="{{$deuda}}" class="form-control">
			</div>
		</div>
	</div>
	
		
 <script>disable();</script>


		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>


	

			{!!Form::close()!!}

		
@endsection





