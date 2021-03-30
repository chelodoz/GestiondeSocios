<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Asignar Profesional</h3>
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
           
            {!!Form::model($taller,['method'=>'PATCH', 'route'=> ['taller.profesional', $taller->id_taller]])!!}

            {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Seleccione el profesional a cargo</label>
                    <select name='id_personal' class="form-control">

                        array
                        @foreach($personal as $per)
                            <option value="{{$per->id_personal}}">
                            {{$per->apellido_personal. ' ' .$per->nombre_personal}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="importe_taller_personal">Cuota Profesional</label>
                <input type="text" name="importe_taller_personal" required  class="form-control" placeholder="$...">
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