<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Egreso;
use sistema\Detalle_Egreso;
use sistema\Personal;
use sistema\Cat_Organizacion;
use sistema\Detalle_Personal;
//use sistema\Taller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\EgresoPagoPersonalFormRequest;
use sistema\Http\Requests\EgresoPagoPersonalPagarFormRequest;
use DB;
use Carbon\Carbon;

class EgresoPagoPersonalController extends Controller
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
            $categorias=Cat_Organizacion::where('nombre_cat_organizacion','LIKE', '%'.$query.'%')
            ->where('id_cat_organizacion', '!=', '1')
            ->where('estado_cat_organizacion', '=', '1')
            ->orderBy('nombre_cat_organizacion', 'asc')
            ->paginate(8);		
    		return view('egresos.pago_personal.index', ["categorias"=>$categorias, "searchText"=>$query]);
    	}
    }

    public function create()
    {
        
    	return view("egresos.pago_personal.create");
    }

    public function store(EgresoPagoPersonalPagarFormRequest $request)
    {
       dd($request->get('importe_detalle_egreso'));
		return Redirect::to('egresos/pago_personal');    		
    }

    public function show($id)
    {
            
        return view("egresos.gastos_personal.show"); 
    }

    public function edit(EgresoPagoPersonalFormRequest $request,$id)
    {
         
            return view('egresos.pago_personal.edit');
        
    
    }

    public function update(EgresoPagoPersonalFormRequest $request, $id)
    {
    	
    	return Redirect::to('egresos/pago_personal');
    }

    public function destroy($id)
    {
        return Redirect::to('egresos/pago_personal');
    }


    

    public function personal(EgresoPagoPersonalFormRequest $request,$id)
    {       
            $date = Carbon::now();      
           $prueba=$request->get('mes');  

           foreach ($prueba as $mes) {
            $detalle_personal=new Detalle_Personal;
            $detalle_personal->cuota_detalle_personal=$request->get('cuota_detalle_personal');
            $detalle_personal->mes_detalle_personal=$mes;
            $detalle_personal->año_detalle_personal=$date->year;;
            $detalle_personal->save();

            $id_detalle_personal=Detalle_Personal::orderBy('id_detalle_personal', 'desc')->first()->id_detalle_personal;
            $id_personal=$request->get('id_personal');

            $id_cat_organizacion=$id;

            $detalle_personal=Detalle_Personal::find($id_detalle_personal);
            $personal=Personal::find($id_personal);
            
            $detalle_personal->Personal()->attach($personal,[
                'cat_organizacion_id_cat_organizacion'=> $id_cat_organizacion,]);



            $detalle_egreso=new Detalle_Egreso;
            $detalle_egreso->id_egreso='1';
            $detalle_egreso->importe_detalle_egreso='0';
            $detalle_egreso->mes_detalle_egreso=$mes;
            $detalle_egreso->año_detalle_egreso=$date->year;;
            $detalle_egreso->fecha_detalle_egreso='1000-01-01';
            $detalle_egreso->save();
         
            $id_detalle_egreso=Detalle_Egreso::orderBy('id_detalle_egreso', 'desc')->first()->id_detalle_egreso;
           
            $detalle_egreso=Detalle_Egreso::find($id_detalle_egreso);
                       
            $detalle_egreso->Personal()->attach($personal);

           }

        return Redirect::to('egresos/pago_personal');      

    
}
public function crear_pago(Request $request,$id)
    {
        
        $cat_organizacion=Cat_Organizacion::findOrFail($id);
       // $taller=Taller::findOrFail($id);
        $personal=Personal::with('Cat_Organizacion')
        ->orwhereHas('Cat_Organizacion', function($q){$q
        ->where('id_cat_organizacion', '!=', '1');})
        ->where('estado_personal', '=', 'Activo')    
        ->get();

        /*$detalle_egreso=new Detalle_Egreso;
        $id_detalle_egreso=Detalle_Egreso::find('id_detalle_egreso');
        $detalle_egreso->id_egreso='1';
        $detalle_egreso->importe_detalle_egreso='0';
        $detalle_egreso->fecha_detalle_egreso='1000-01-01';
        $detalle_egreso->save();

        $id_personal=$request->get('id_personal');

        $detalle_egreso->Personal()->attach($id_personal);*/
        

        return view("egresos.pago_personal.crear_pago",["cat_organizacion"=>$cat_organizacion,"personal"=>$personal]);
    }

public function listado_pago(EgresoPagoPersonalFormRequest $request,$id_cat,$id_per)
    { 
        $personal=DB::table('personal')
        ->join('detalle_egreso_has_personal', 'personal.id_personal', '=', 'detalle_egreso_has_personal.personal_id_personal')
        //->paginate();

        //dd($personal);
        ->join('detalle_egreso', 'detalle_egreso.id_detalle_egreso', '=', 'detalle_egreso_has_personal.detalle_egreso_id_detalle_egreso')

        ->join('personal_has_cat_organizacion', 'personal.id_personal', '=', 'personal_has_cat_organizacion.personal_id_personal')
        ->join('cat_organizacion', 'cat_organizacion.id_cat_organizacion', '=', 'personal_has_cat_organizacion.cat_organizacion_id_cat_organizacion')

        ->join('personal_has_detalle_personal', 'personal.id_personal', '=', 'personal_has_detalle_personal.personal_id_personal')
        ->join('detalle_personal', 'detalle_personal.id_detalle_personal', '=', 'personal_has_detalle_personal.detalle_personal_id_detalle_personal')

        
        ->select('personal.id_personal','cat_organizacion.id_cat_organizacion','personal.nombre_personal','personal.apellido_personal','cat_organizacion.nombre_cat_organizacion','detalle_personal.cuota_detalle_personal','detalle_personal.mes_detalle_personal','detalle_personal.año_detalle_personal',DB::raw('sum(importe_detalle_egreso) as sum'))


        ->where('personal.id_personal','LIKE','%'.$id_per.'%')
        ->where('cat_organizacion.id_cat_organizacion','LIKE','%'.$id_cat.'%')
        ->groupBy('personal.id_personal','personal.nombre_personal','personal.apellido_personal','cat_organizacion.nombre_cat_organizacion','cat_organizacion.id_cat_organizacion','detalle_personal.cuota_detalle_personal','detalle_personal.mes_detalle_personal','detalle_personal.año_detalle_personal')
        ->orderBy('detalle_egreso.mes_detalle_egreso','detalle_egreso.año_detalle_egreso','DESC')
        ->paginate(); 

        //dd($personal);


        return view("egresos.pago_personal.listado_pago",["personal"=>$personal]);
    
}

public function emitir_pago(EgresoPagoPersonalFormRequest $request,$id)
    {
        
       if($request)
        {
            $query=trim($request->get('searchText'));
           

            $personas=Personal::with('Cat_Organizacion')
            ->orwhereHas('Cat_Organizacion', function($q){$q
            ->where('id_cat_organizacion', '!=', '1');})
            ->where('estado_personal', '=', 'Activo')    
            ->orderBy('apellido_personal', 'asc')
            ->paginate(8);

            return view('egresos.pago_personal.emitir_pago',["personas"=>$personas, "searchText"=>$query]);
        }
    
}



public function pagar($id_cat,$id_per,$mes,$año)
    {    
        $datos[0]=$id_cat;
        $datos[1]=$id_per;
        $datos[2]=$mes;
        $datos[3]=$año;


        $personas=Personal::with('Cat_Organizacion')
        ->orwhereHas('Cat_Organizacion', function($q){$q
        ->where('id_cat_organizacion', '!=', '1');})
        ->where('estado_personal', '=', 'Activo')    
        ->orwhere('id_personal','LIKE','%'.$id_per.'%')
        ->first();

           return view('egresos.pago_personal.importe_pago',["datos"=>$datos,"personas"=>$personas]);
    
}

public function importe_pago(EgresoPagoPersonalPagarFormRequest $request,$id_cat,$id_per,$mes,$año)
    {   
            $date = Carbon::now();  

            $detalle_egreso=new Detalle_Egreso;
            $detalle_egreso->id_egreso='1';
            $detalle_egreso->importe_detalle_egreso=$request->get('importe_detalle_egreso');
            $detalle_egreso->fecha_detalle_egreso=$date;
            $detalle_egreso->mes_detalle_egreso=$mes;
            $detalle_egreso->año_detalle_egreso=$año;
            $detalle_egreso->save();
            

            $id_detalle_egreso=Detalle_Egreso::orderBy('id_detalle_egreso', 'desc')->first()->id_detalle_egreso;

            $id_personal=$id_per;
           
            $detalle_egreso=Detalle_Egreso::find($id_detalle_egreso);
            $personal=Personal::find($id_personal);

                       
            $detalle_egreso->Personal()->attach($personal);


            return redirect()->to('egresos/pago_personal/'.$id_cat.'/'.$id_per.'/listado_pago');
    }
}
