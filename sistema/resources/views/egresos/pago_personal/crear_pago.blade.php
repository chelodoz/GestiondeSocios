<style>
.form-check-label {

  padding-right: 20px;
  padding-bottom: 20px;
  padding-top: 20px;
} 
</style>

<style>
.form-check-input {
    
  padding-right: 20px;
  padding-bottom: 20px;
  padding-top: 20px;
} 
</style>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Asignar Personal:</h3>
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
           
            
    {!!Form::model($cat_organizacion,['method'=>'PATCH', 'route'=> ['egresos.pago_personal.personal', $cat_organizacion->id_cat_organizacion]])!!}

            {{Form::token()}}
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-8">
            <div class="form-group">
                <label>Seleccione el personal a cargo</label>
                    <select name='id_personal' class="form-control">

                        array
                        @foreach($personal as $per)
                            <option value="{{$per->id_personal}}">
                            {{$per->apellido_personal. ', ' .$per->nombre_personal}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
    </div>

    
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="mes[1]" value="1">
        <label class="form-check-label" for="mes[1]">Ene</label>
    
    
        <input class="form-check-input" type="checkbox" name="mes[2]" value="2">
        <label class="form-check-label" for="mes[2]">Feb</label>


        <input class="form-check-input" type="checkbox" name="mes[3]" value="3">
        <label class="form-check-label" for="mes[3]">Mar</label>


        <input class="form-check-input" type="checkbox" name="mes[4]" value="4">
        <label class="form-check-label" for="mes[4]">Abr</label>


        <input class="form-check-input" type="checkbox" name="mes[5]" value="5">
        <label class="form-check-label" for="mes[5]">May</label>

        <input class="form-check-input" type="checkbox" name="mes[6]" value="6">
        <label class="form-check-label" for="mes[6]">Jun</label>

        <input class="form-check-input" type="checkbox" name="mes[7]" value="7">
        <label class="form-check-label" for="mes[7]">Jul</label>

        <input class="form-check-input" type="checkbox" name="mes[8]" value="8">
        <label class="form-check-label" for="mes[8]">Ago</label>

        <input class="form-check-input" type="checkbox" name="mes[9]" value="9">
        <label class="form-check-label" for="mes[9]">Sep</label>

        <input class="form-check-input" type="checkbox" name="mes[10]" value="10">
        <label class="form-check-label" for="mes[10]">Oct</label>

        <input class="form-check-input" type="checkbox" name="mes[11]" value="11">
        <label class="form-check-label" for="mes[11]">Nov</label>

        <input class="form-check-input" type="checkbox" name="mes[12]" value="12">
        <label class="form-check-label" for="mes[12]">Dic</label>
    </div>
    





    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-8">
            <div class="form-group">
                <label for="cuota_detalle_personal">Cuota Personal</label>
                <input type="text" name="cuota_detalle_personal" required  class="form-control" placeholder="$...">
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
