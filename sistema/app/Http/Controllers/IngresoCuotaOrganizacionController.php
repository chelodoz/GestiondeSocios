<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Socio;
use sistema\Detalle_Ingreso;
use sistema\Administracion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use sistema\Http\Requests\IngresoCuotaOrganizacionFormRequest;

use DB;

class IngresoCuotaOrganizacionController extends Controller
{
    	public function __construct()
 	{

 	}   

 	public function index(Request $request)
 	{
 		if($request)
         {
			$query=trim($request->get('searchText'));

 			$nombre=DB::table('socio')
 			->where('nombre_socio','LIKE','%'.$query.'%')
 			->where('estado_socio', '=', '1')
 			->orwhere('apellido_socio','LIKE','%'.$query.'%')
 			->where('estado_socio', '=', '1')
 			->orwhere('fecha_de_nacimiento_socio','LIKE','%'.$query.'%')
 			->where('estado_socio', '=', '1')
 			->orwhere('num_documento_socio','LIKE','%'.$query.'%')
 			->where('estado_socio', '=', '1')
 			->orderBy('apellido_socio', 'desc')
 			->paginate(8);


 			return view('ingresos.cuota_organizacion.index',["nombre"=>$nombre, "searchText"=>$query]);
              
         }
       		
     
 	}

       public function create()
    {
        
        return view("ingresos.cuota_organizacion.create");
    }

 	public function store(IngresoCuotaOrganizacionFormRequest $request,$id)
 	{
 	    $detalle_ingreso=new Detalle_Ingreso;
        $detalle_ingreso->id_ingreso='1';
        $detalle_ingreso->importe_detalle_ingreso=$request->get('importe_detalle_ingreso');
        $detalle_ingreso->id_socio=$id;

        $detalle_ingreso->save();
 		
        return Redirect::to('ingresos\cuota_organizacion');
 	}

    public function edit($id)
    {   
        $date=Carbon::now()->toDateString();
        
        $socio=Socio::findOrFail($id);

        $administracion=Administracion::whereDate('fecha_cuota_fija_inicio_administracion', '<' ,Carbon::now())
        ->orwhereDate('fecha_cuota_fija_fin_administracion', '>' ,Carbon::now())
        ->orderBy('id_administracion', 'desc')
        ->first();
        
        


        $soc=Socio::with(array('descuento' => function($q)
            {
        $q->wherePivot('fecha_inicio_socio_has_descuento', '<' ,Carbon::now()->toDateString());
        $q->wherePivot('fecha_fin_socio_has_descuento', '>' ,Carbon::now()->toDateString());
            })) 
        ->where('id_socio','LIKE','%'.$id.'%')
        ->first(); 

        
        /*
        $role = Role::with(array('users' => function($q)
{
    $q->wherePivot('start', '>', date('Y-m-d H:i:s'));
    $q->wherePivot('stop', '<', date('Y-m-d H:i:s'));
    $q->where('firstname', 'NOT LIKE', '%test%');
}))
        */


        
        

        return view("ingresos.cuota_organizacion.edit", ["socio"=>$socio, "administracion"=>$administracion,"soc"=>$soc]);
    }

 	public function update(IngresoCuotaOrganizacionFormRequest $request, $id)
 	{
        
        $mytime = Carbon::now();

 	    $detalle_ingreso=new Detalle_Ingreso;
        $detalle_ingreso->id_ingreso='1';
        $detalle_ingreso->importe_detalle_ingreso=$request->get('importe_detalle_ingreso');
         $detalle_ingreso->descuento_detalle_ingreso=$request->get('descuento_detalle_ingreso');
        $detalle_ingreso->fecha_detalle_ingreso=$mytime;
        $detalle_ingreso->mes_detalle_ingreso=$request->get('mes_detalle_ingreso');
        $detalle_ingreso->año_detalle_ingreso=$mytime->year;;
        $detalle_ingreso->save();

        $id_detalle_ingreso=Detalle_Ingreso::orderBy('id_detalle_ingreso', 'desc')->first()->id_detalle_ingreso;

        $detalle_ingreso=Detalle_Ingreso::find($id_detalle_ingreso);
        $id_socio=Socio::find($id);

        $detalle_ingreso->Socio()->attach($id_socio);   

 		return Redirect::to('ingresos\cuota_organizacion');
 	}

 	public function cupon(Request $request,$id)
     {
         if($request)
         {

             $mytime = Carbon::now();
             $id_socio = Socio::where('id_socio', $id)->firstOrFail();
             
             //$id_descuento = DB::table('socio_has_descuento')->where('socio_id_socio', $id)->orderBy('socio_id_socio')->get('descuento_id_descuento');

             //$descuento=DB::table('descuento')->where('descuento_id_descuento', $id_descuento)->get('valor_descuento');

             dd($id_socio);
              
            // $users = Administracion::whereHas('Socio_Has_Descuento', function ($query) {$query-> whereRaw('? between fecha_inicio_socio_has_descuento and fecha_fin_socio_has_descuento', [$mytime]);})->get();

            //dd($administracion);

             /*
             $query->where('socio_id_socio','LIKE','%'.$id.'%');


             $socio=Socio::whereHas('Descuento', function ($query) {
             $query->where('estado_descuento', '=', 1);
             })
             ->get();
//$id_detalle_taller=Descuento::where('nombre_taller',$request->get('nombre_taller'))->first()->id_taller;
            // $deuda=$socio->administracion->cuota_fija_administracion*$socio->Descuento->valor_descuento/100;
             
             $descuento=Descuento::where('id_socio',$id)->orderBy('id_descuento','desc')->first()->valor_descuento;
             $cuota=Administracion::where('id_socio',$id)->orderBy('id_administracion','desc')->first()->cuota_fija_administracion;
             $importe=Detalle_Ingreso::where('id_socio',$id)->sum('importe_detalle_ingreso');
             //$sum = Auth::user()->cart()->products()->sum('price');
            

*/
                $deuda=$cuota*($descuento/100)-$cuota+$importe;
                
             return view('ingresos.cuota_organizacion.cupon',["deuda"=>$deuda,"socio"=>Socio::findOrFail($id)]);
         }
     }
     
     public function historial(Request $request, $id)
     {

        $historial=db::table('socio')
        
        
        ->join('socio_has_detalle_ingreso', 'socio.id_socio', '=', 'socio_has_detalle_ingreso.socio_id_socio')
        ->join('detalle_ingreso', 'socio_has_detalle_ingreso.detalle_ingreso_id_detalle_ingreso', '=', 'detalle_ingreso.id_detalle_ingreso')

        ->select('socio.id_socio', 'detalle_ingreso.importe_detalle_ingreso', 'detalle_ingreso.fecha_detalle_ingreso', 'detalle_ingreso.mes_detalle_ingreso', 'detalle_ingreso.año_detalle_ingreso', 'detalle_ingreso.descuento_detalle_ingreso')

        ->where('socio.id_socio', 'LIKE', '%'.$id.'%')
        ->orderBy('detalle_ingreso.fecha_detalle_ingreso', 'desc')
        ->paginate(8);



        return view('ingresos.cuota_organizacion.historial',["historial"=>$historial, "administracion"=>DB::table('administracion')->get()]);
     }

}