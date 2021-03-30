<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Requests;

use sistema\Ingreso;
use sistema\Detalle_Ingreso;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\IngresoVariosFormRequest;
use DB;

class IngresoVariosController extends Controller
{
    /*   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
    	}

    	return view('ingresos.varios.index',["searchText"=>$query]);
    }

    public function store(IngresoVariosFormRequest $request)
    {
    	$ingreso=new Ingreso;
    	$ingreso->nombre_ingreso=$request->get('nombre_ingreso');
    	$ingreso->descripcion_ingreso=$request->get('descripcion_ingreso');
    	$ingreso->estado_ingreso='1';
    	$ingreso->save();

    	$detalle_ingreso=new Detalle_Ingreso;
    	$detalle_ingreso->importe_detalle_ingreso=$request->get('importe_detalle_ingreso');
    	$detalle_ingreso->fecha_detalle_ingreso=$request->get('fecha_detalle_ingreso');
    	$ingreso->Detalle_Ingreso()->save($detalle_ingreso);

    	return Redirect::to('ingresos/varios');

    }*/
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $ingresos=Detalle_Ingreso::with('Ingreso')
            ->where('fecha_detalle_ingreso', 'LIKE','%'.$query.'%')
            //->where('estado_ingreso', '=', '1')

            ->orwhereHas('Ingreso', function($q) use($query){$q
                ->where('nombre_ingreso', 'LIKE', '%'.$query.'%')
                ->where('estado_ingreso', '=', '1');})

            ->orwhereHas('Ingreso', function($q) use($query){$q
                ->where('descripcion_ingreso', 'LIKE', '%'.$query.'%')
                ->where('estado_ingreso', '=', '1');})

            ->orderBy('fecha_detalle_ingreso', 'asc')
            ->paginate(8);

            return view('ingresos.varios.index',["ingresos"=>$ingresos, "searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("ingresos.varios.create");
    }

    public function store(IngresoVariosFormRequest $request)
    {
        $ingresos=new Detalle_Ingreso;
        $ingresos->importe_detalle_ingreso=$request->get('importe_detalle_ingreso');
        $ingresos->id_ingreso='3';
        $ingresos->id_taller=null;
        $ingresos->nombre_detalle_ingreso=$request->get('nombre_detalle_ingreso');
        $ingresos->concepto_detalle_ingreso=$request->get('concepto_detalle_ingreso');
        $ingresos->fecha_detalle_ingreso=$request->get('fecha_detalle_ingreso');
        $ingresos->descripcion_detalle_ingreso=$request->get('descripcion_detalle_ingreso');
        $ingresos->save();

        /*$ingreso=new Ingreso;
        $ingreso->nombre_ingreso=$request->get('nombre_ingreso');
        $ingreso->descripcion_ingreso=$request->get('descripcion_ingreso');
        $ingreso->estado_ingreso='1';
        $ingresos->Ingreso()->save($ingreso);*/

        return Redirect::to('ingresos/varios');
    }

    public function show($id)
    {
        return view("ingresos.varios.show", ["ingresos"=>Detalle_Ingreso::findOrFail($id)]); 
    }

    public function edit($id)
    {
        return view("ingresos.varios.edit", ["ingresos"=>Detalle_Ingreso::findOrFail($id)]);     
    }

    public function update(IngresoVariosFormRequest $request, $id)
    {
        $ingresos=Detalle_Ingreso::with('Ingreso')->where('id_detalle_ingreso', $id)->firstOrFail($id);

        //$ingresos->id_ingreso=;
        $ingresos->importe_detalle_ingreso=$request->get('importe_detalle_ingreso');
        $ingresos->id_taller=null;
        $ingresos->fecha_detalle_egreso=$request->get('fecha_detalle_ingreso');
        $ingresos->concepto_detalle_ingreso=$request->get('concepto_detalle_ingreso');
        $ingresos->nombre_detalle_ingreso=$request->get('nombre_detalle_ingreso');
        $ingresos->descripcion_detalle_ingreso=$request->get('descripcion_detalle_ingreso');

        /*$ingresos->ingreso->nombre_ingreso=$request->get('nombre_ingreso');
        $ingresos->ingreso->descripcion_ingreso=$request->get('descripcion_ingreso');
        $ingresos->ingreso->estado_ingreso='1';
        //$gastos->Egreso()->nombre_egreso='Gastos Varios';
        //$gastos->Egreso()->estado_egreso='1';*/

        $ingresos->push();

        return Redirect::to('ingresos/varios');
    }

    public function destroy($id)
    {
        $gastos=Detalle_Ingreso()->where('id_detalle_ingreso', $id)->firstOrFail();
        $gastos->destroy($id);

        return Redirect::to('ingresos/varios');
    }
}
