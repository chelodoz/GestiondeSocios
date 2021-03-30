<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Requests;

use sistema\Egreso;
use sistema\Detalle_Egreso;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\EgresoGastosVariosFormRequest;
use DB;

class EgresoGastosVariosController extends Controller
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
 			$gastos=Detalle_Egreso::with('Egreso')
 			->where('fecha_detalle_egreso', 'LIKE','%'.$query.'%')
 			->where('id_egreso','=','3')

 			->orderBy('fecha_detalle_egreso', 'asc')
 			->paginate(8);

 			return view('egresos.gastos_varios.index',["gastos"=>$gastos, "searchText"=>$query]);
 		}
 	}

 	public function create()
 	{
 		return view("egresos.gastos_varios.create");
 	}

 	public function store(EgresoGastosVariosFormRequest $request)
 	{
 		$gastos=new Detalle_Egreso;
 		$gastos->id_egreso='3';
 		$gastos->importe_detalle_egreso=$request->get('importe_detalle_egreso');
 		$gastos->id_personal=null;
 		$gastos->id_taller=null;
 		$gastos->fecha_detalle_egreso=$request->get('fecha_detalle_egreso');
 		$gastos->descripcion_detalle_egreso=$request->get('descripcion_detalle_egreso');
 		$gastos->save();

 		/*$egreso=new Egreso;
 		$egreso->nombre_egreso='Gastos Varios';
 		$egreso->descripcion_egreso=$request->get('descripcion_egreso');
 		$egreso->estado_egreso='1';
 		$gastos->Egreso()->save($egreso);*/

 		return Redirect::to('egresos/gastos_varios');
 	}

 	public function show($id)
 	{
 		return view("egresos.gastos_varios.show", ["gastos"=>Detalle_Egreso::findOrFail($id)]);	
 	}

 	public function edit($id)
 	{
 		return view("egresos.gastos_varios.edit", ["gastos"=>Detalle_Egreso::findOrFail($id)]);		
 	}

 	public function update(EgresoGastosVariosFormRequest $request, $id)
 	{
 		$gastos=Detalle_Egreso::with('Egreso')->where('id_egreso', '=', '3')->firstOrFail($id);

 		$gastos->importe_detalle_egreso=$request->get('importe_detalle_egreso');
 		$gastos->id_personal=null;
 		$gastos->id_taller=null;
 		$gastos->fecha_detalle_egreso=$request->get('fecha_detalle_egreso');
 		$gastos->descripcion_detalle_egreso=$request->get('descripcion_detalle_egreso');

 		//$gastos->Egreso()->nombre_egreso='Gastos Varios';
 		//$gastos->Egreso()->estado_egreso='1';
 		$gastos->push();

 		return Redirect::to('egresos/gastos_varios');
 	}

 	public function destroy($id)
 	{
 		$gastos=Detalle_Egreso::with('Egreso')->where('id_detalle_egreso', $id)->firstOrFail();
 		$gastos->destroy($id);

 		return Redirect::to('egresos\gastos_varios');
 	}
}
