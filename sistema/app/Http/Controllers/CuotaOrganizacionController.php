<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Socio;
use sistema\Detalle_Ingreso;
use sistema\Ingreso;
use sistema\Administracion;
use sistema\Descuento;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\IngresoCuotaOrganizacionFormRequest;
use DB;

class CuotaOrganizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
            $nombre=Socio::with('Detalle_Ingreso')
            ->where('nombre_socio','LIKE', '%'.$query.'%')
            ->where('estado_socio', '=', '1')
            ->orwhere('apellido_socio', 'LIKE', '%'.$query.'%')
            ->where('estado_socio', '=', '1')
            ->orwhere('num_documento_socio','LIKE','%'.$query.'%')
            ->where('estado_socio', '=', '1')

            ->orderBy('apellido_socio', 'asc')
            ->paginate(8);

            return view('ingresos.cuota_organizacion.index', ["nombre"=>$nombre, "searchText"=>$query]);
    	}
    }

    public function create()
    {
        $socio=DB::table('socio')
        ->where('estado_socio', '=', '1')->get();

        return view('ingresos.cuota_organizacion.create', ["socio"=>$socio]);
    }

    public function store(IngresoCuotaOrganizacionFormRequest $request)
    {
        $socio=Socio::where('id_socio')->findOrFail();
        $socio->nombre_socio=$request->get('nombre_socio');

        $ingreso=new Ingreso;
        $ingreso->nombre_ingreso='Cuota Organizacion';
        $ingreso->estado_ingreso='Activo';
        $ingreso->save();

        $detalle_ingreso=new Detalle_Ingreso;
        $detalle_ingreso->importe_detalle_ingreso=$request->get('importe_detalle_ingreso');
        //$detalle_ingreso->descuento_detalle_ingreso=$request->get('descuento_detalle_ingreso');
        $detalle_ingreso->periodo_detalle_ingreso=$request->get('periodo_detalle_ingreso');
        $detalle_ingreso->cuota_detalle_ingreso=$request->get('cuota_detalle_ingreso');
        $detalle_ingreso->fecha_detalle_ingreso=$request->get('fecha_detalle_ingreso');
        $detalle_ingreso->id_socio=$request->get('id_socio');

        //$detalle_ingreso->id_taller='0';
        $ingreso->Detalle_Ingreso()->save($detalle_ingreso);

        return Redirect::to('ingresos/cuota_organizacion');

    }

    public function show($id)
    {
        return view("ingresos.cuota_organizacion",["cuota_organizacion"=>Detalle_Ingreso::findOrFail($id)]);
    }

    public function edit($id)
    {
        $detalle_ingreso=Detalle_Ingreso::findOrFail($id);
        $socio=Socio::where('estado_socio', '=', '1')->get();

        return view("ingresos.cuota_organizacion.edit", ["detalle_ingreso"=>$detalle_ingreso, "socio"=>$socio]);
    }

    public function update(CuotaOrganizacionController $request, $id)
    {
        $detalle_ingreso=Detalle_Ingreso::findOrFail($id);
        $socio=Socio::where('estado_socio', '=', '1')->get();

        $detalle_ingreso->importe_detalle_ingreso=$request->get('importe_detalle_ingreso');
        //$detalle_ingreso->descuento_detalle_ingreso=$request->get('descuento_detalle_ingreso');
        $detalle_ingreso->periodo_detalle_ingreso=$request->get('periodo_detalle_ingreso');
        $detalle_ingreso->cuota_detalle_ingreso=$request->get('cuota_detalle_ingreso');
        $detalle_ingreso->fecha_detalle_ingreso=$request->get('fecha_detalle_ingreso');
        $detalle_ingreso->id_socio=$request('id_socio');
        $detalle_ingreso->update();

        return Redirect::to('ingresos/cuota_organizacion');
    }

    public function destroy($id)
    {
        Detalle_Ingreso::destroy($id);

        return Redirect::to('ingresos/cuota_organizacion');
    }
}
