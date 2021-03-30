@extends ('layouts.admin')
@section ('contenido')


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1>Datos del Taller</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Cuota del Taller</th>
                    <th>Nombre Profesional</th>
                    <th>Apellido Profesional</th>
                    <th>Pago Profesional</th>
                </thead>
                @foreach($detalle_taller as  $dt)
                <tr>
                    <td>{{$dt->taller->nombre_taller}}</td>
                    <td>{{$dt->taller->descripcion_taller}}</td>
                    <td>{{$dt->cuota_detalle_taller}}</td>
                @foreach($dt->personal as $per)
                    <td>{{$per->nombre_personal}}</td>
                    <td>{{$per->apellido_personal}}</td>
                @endforeach
                    <td>{{$dt->cuota_detalle_taller_personal}}</td>


                </tr>
                @endforeach
            </table>
        </div>
        {{$detalle_taller->render()}}
    </div>
</div>

@endsection