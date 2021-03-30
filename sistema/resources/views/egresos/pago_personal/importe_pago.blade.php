<style>
.form-group {
    
  padding-right: 20px;
  padding-bottom: 20px;
  padding-top: 20px;
} 
</style>

<style>
.h3 {
    
  padding-right: 20px;
  padding-bottom: 20px;
  padding-top: 20px;
} 
</style>

@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Pago a personal: {{$personas->apellido_personal}},{{$personas->nombre_personal}}</h3>
            <h3>Periodo: {{$datos[1]}} / {{$datos[2]}} </h3>

          
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
           
            

{!!Form::model($datos,['method'=>'PATCH', 'route'=> ['egresos.pago_personal.importe_pago', $datos[0],$datos[1],$datos[2], $datos[3]]])!!}

            {{Form::token()}}
                       
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-8">
            <div class="form-group">
                <label for="importe_detalle_egreso">Importe a pagar</label>
               <input type="text" name="importe_detalle_egreso" class="form-control" placeholder="$...">
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
