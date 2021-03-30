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

            {!!Form::model($per,['method'=>'PATCH', 'route'=> ['pago_profesional.update', $per->id_personal]])!!}
            {{Form::token()}}

    <div class="row">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-8">
            <div class="form-group">
                <input type="text" name="nombre_personal" required value="{{$per->nombre_personal}}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-8">
            <div class="form-group">
                <input type="text" name="apellido_personal" required value="{{$per->apellido_personal}}" class="form-control" readonly>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-8">
            <div class="form-group">
                <input type="text" name="nombre_taller" required value="{{$taller->nombre_taller}}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-8">
            <div class="form-group">
                <input type="text" name="importe_taller_personal" required value="{{$taller->pivot->importe_taller_personal}}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-8">
            <div class="form-group">
                <input type="text" name="estado_taller_personal" required value="{{$taller->pivot->estado_taller_personal}}" class="form-control" readonly>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Confirmar Pago</button>
                <button class="btn btn-danger" type="reset">Cancelar Pago</button>
            </div>
        </div>
    </div>    

            {!!Form::close()!!}

    
@endsection