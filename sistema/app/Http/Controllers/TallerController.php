<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Taller;
use sistema\Detalle_Taller;
use sistema\Personal;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\TallerFormRequest;
use sistema\Http\Requests\Detalle_TallerFormRequest;

use DB;

class TallerController extends Controller
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
 			$taller=Taller::where('nombre_taller','LIKE', '%'.$query.'%')
 			->where('estado_taller','=', '1')
 			->orderBy('nombre_taller', 'asc')
 			->paginate(8);
 			
 			return view('taller.index',["taller"=>$taller, "searchText"=>$query]);
 		}
 	}

 	public function create()
 	{		
        return view("taller.create");
 	}

 	public function store(TallerFormRequest $request)
 	{
 		
 		$taller=new Taller;
 		$taller->nombre_taller=$request->get('nombre_taller');
 		$taller->descripcion_taller=$request->get('descripcion_taller');
        $taller->cuota_taller=$request->get('cuota_taller');
 		$taller->estado_taller='1';
 		$taller->save();
		
 		return Redirect::to('taller');
 	}

 	public function show($id)
 	{
 		return view("taller.show", ["taller"=>Taller::findOrFail($id)]);
 	}

 	public function edit($id)
 	{
 		
 		$taller=Taller::findOrFail($id);

 		return view("taller.edit",["taller"=>$taller]);
 	}

 	public function update(TallerFormRequest $request, $id)
 	{
 		
 		$taller=Taller::where('id_taller', $id)->firstOrFail();

 		$taller->nombre_taller=$request->get('nombre_taller');
 		$taller->descripcion_taller=$request->get('descripcion_taller');
        $taller->cuota_taller=$request->get('cuota_taller');
 		$taller->estado_taller='1';
        $taller->update();
 		



 		return Redirect::to('taller');
 	}

 	public function destroy($id)
 	{

 		$taller=taller::findOrFail($id);
        $taller->estado_taller='0';
        $taller->update();
 		

 		return Redirect::to('taller');
 	}

 	public function details(Request $request,$id)
 	{
		
		$taller=Taller::findOrFail($id);

        /*$personal=Personal::with('Cat_Organizacion')
        ->orwhereHas('Cat_Organizacion', function($q){$q
        ->where('id_cat_organizacion', '=', '1');})
        ->where('estado_personal', '=', '1')    
        ->get();*/

        $personal=db::table('personal')

        ->join('personal_has_cat_organizacion', 'personal.id_personal', '=', 'personal_has_cat_organizacion.personal_id_personal')
        ->join('Cat_Organizacion', 'personal_has_cat_organizacion.cat_organizacion_id_cat_organizacion', '=', 'cat_organizacion.id_cat_organizacion')

        ->select('personal.id_personal','personal.nombre_personal', 'personal.apellido_personal')
        ->where('cat_organizacion.id_cat_organizacion', '=', '1')
        ->where('personal.estado_personal', '=', 'Activo')
        ->get();

             return view('taller.details',["taller"=>$taller,"personal"=>$personal]);

	}
    
    public function profesional(Detalle_TallerFormRequest $request,$id)
    {
        
       
        /*$detalle_taller=new Detalle_Taller;
        $detalle_taller->cuota_detalle_taller_personal=$request->get('cuota_detalle_taller_personal');
        $detalle_taller->estado_detalle_taller='1';
        $detalle_taller->save();

        
        $id_detalle_taller= Detalle_Taller::orderBy('id_detalle_taller', 'desc')->first()->id_detalle_taller;*/


        $id_taller=$id;
        $id_personal=$request->get('id_personal');


        //$detalle_taller=Detalle_Taller::find($id_detalle_taller);
        $taller=Taller::find($id_taller);
        

        //$detalle_taller->taller()->attach($taller,['personal_id_personal' => $id_personal,]);
       
        $importe=$request->get('importe_taller_personal');
        $estado='Impago';
        $taller->Personal()->attach($id_personal,['importe_taller_personal'=>$importe, 'estado_taller_personal'=>$estado]);



        
        return Redirect::to('taller');

    }

    
}
