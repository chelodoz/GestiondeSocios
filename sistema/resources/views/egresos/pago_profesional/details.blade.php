@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Profesionales <a href="{{route('info_pago',['id'=>$id_taller])}}"><button class="btn btn-warning">Historial de Pagos</button></a></h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Nombre Profesional</th>
                    <th>Apellido Profesional</th>
                    <th>Estado Pago</th>
                    <th>Opciones</th>
                </thead>
                @foreach($personal as $per)
                <tr>
                    <td>{{$per->nombre_personal}}</td>
                    <td>{{$per->apellido_personal}}</td>
                    <td>{{$per->estado_taller_personal}}</td>
                    <td>
                        <a href="{{route('pagar',['id1'=>$id_taller, 'id2'=>$per->id_personal])}}"><button class="btn btn-info">Pagar</button></a>

                        
                    </td>
                </tr>
                
                @endforeach
            </table>
        </div>
        {{$personal->render()}}
    </div>
</div>

@endsection