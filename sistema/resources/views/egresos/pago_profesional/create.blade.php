@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Confirmar Pago:</h3>
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
			{!!Form::open(array('url'=>'egresos/pago_profesional', 'method'=>'POST', 'autocomplete'=> 'off'))!!}
			{{Form::token()}}
	<div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
            <div class="form-group">
                <input type="text" name="nombre_personal" required value="{{$personal->nombre_personal}}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
            <div class="form-group">
                <input type="text" name="apellido_personal" required value="{{$personal->apellido_personal}}" class="form-control" readonly>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
            <div class="form-group">
                <input type="text" name="nombre_taller" required value="{{$personal->nombre_taller}}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
            <div class="form-group">
                <input type="text" name="importe_taller_personal" required value="{{$personal->importe_taller_personal}}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-10">
            <div class="form-group">
                <input type="text" name="estado_taller_personal" required value="{{$personal->estado_taller_personal}}" class="form-control" readonly>
            </div>
        </div>
    </div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	


	

			{!!Form::close()!!}

		
@endsection