<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Ingreso;
use sistema\Detalle_Ingreso;
use sistema\Socio;
use sistema\Taller;
use sistema\Detalle_Taller;
use Carbon\Carbon;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\IngresoCuotaTallerFormRequest;
use DB;

class IngresoCuotaTallerController extends Controller
{
    public function __construct()
    {

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
        }

        return view('ingresos.cuota_taller.index', ["taller"=>$taller, "searchText"=>$query]);
    }

    public function create()
    {
        
        $socios1=DB::table('socio')->where('estado_socio', '=', '1')->get();

        return view("ingresos.cuota_taller.index", ["socios1"=>$socios1]);
    }

    public function store(IngresoCuotaTallerFormRequest $request)
    {
        
        $detalle_ingreso=new Detalle_Ingreso;
        $detalle_ingreso->id_ingreso='2';
        $detalle_ingreso->importe_detalle_ingreso=$request->get('importe_detalle_ingreso');
        $detalle_ingreso->fecha_detalle_ingreso=$request->get('fecha_detalle_ingreso');
        $detalle_ingreso->deuda_detalle_ingreso=null;    
        $detalle_ingreso->save();

        $socio=DB::table('Socio');
        $socio->id_socio=$request->get('id_socio');
        $detalle_ingreso->id_socio->save($socio);


        return Redirect::to('ingresos/cuota_taller');
    }
    public function update(IngresoCuotaTallerFormRequest $request,$id)
    {
       
        return Redirect::to('ingresos/cuota_taller');
    }
    public function importe_pago(IngresoCuotaTallerFormRequest $request, $id_taller,$id_socio)
    {
        $mytime = Carbon::now();

        $detalle_ingreso=new Detalle_Ingreso;
        $detalle_ingreso->id_ingreso='2';
        $detalle_ingreso->importe_detalle_ingreso=$request->get('importe_detalle_ingreso');
        $detalle_ingreso->descuento_detalle_ingreso=$request->get('descuento_detalle_ingreso');
        $detalle_ingreso->fecha_detalle_ingreso=$mytime;
        $detalle_ingreso->mes_detalle_ingreso=$request->get('mes_detalle_ingreso');
        $detalle_ingreso->año_detalle_ingreso=$mytime->year;;
        $detalle_ingreso->save();

        $id_detalle_ingreso=Detalle_Ingreso::orderBy('id_detalle_ingreso', 'desc')->first()->id_detalle_ingreso;
        

        $id_socio_has_taller=db::table('socio_has_taller')
        ->where('socio_has_taller.socio_id_socio', 'LIKE', '%'.$id_socio.'%')
        ->orwhere('socio_has_taller.taller_id_taller', 'LIKE', '%'.$id_taller.'%')
        ->first()->id_socio_has_taller;

       
        DB::table('socio_has_taller_has_detalle_ingreso')->insert(
            ['socio_has_taller_id_socio_has_taller' => $id_socio_has_taller,
             'detalle_ingreso_id_detalle_ingreso' =>$id_detalle_ingreso]

        );
       
        return Redirect::to('ingresos\cuota_organizacion');
    }

    public function listado_socios(Request $request, $id_taller)
    {   
            $query=trim($request->get('searchText'));
            
            $socios=Socio::with('taller')
            ->where('nombre_socio','LIKE','%'.$query.'%')
            ->where('estado_socio', '=', '1')
            //->orwhere('apellido_socio','LIKE','%'.$query.'%')
            //->where('estado_socio', '=', '1')
            //->orwhere('fecha_de_nacimiento_socio','LIKE','%'.$query.'%')
            //->where('estado_socio', '=', '1')
            //->orwhere('num_documento_socio','LIKE','%'.$query.'%')
            //->where('estado_socio', '=', '1')

            ->whereHas('taller', function($q) use($query,$id_taller){$q
                ->where('id_taller','LIKE', '%'.$id_taller.'%');}) 

            ->orderBy('apellido_socio', 'asc')
            ->paginate(8);


            return view('ingresos.cuota_taller.listado_socios',["socios"=>$socios, "searchText"=>$query,"id_taller"=>$id_taller]);
       
    }

public function nuevo_cupon(Request $request, $id_taller,$id_socio)
    {   
       
         
       $historial=db::table('socio')
        ->join('socio_has_taller', 'socio.id_socio', '=', 'socio_has_taller.socio_id_socio')
        ->join('socio_has_taller_has_detalle_ingreso', 'socio_has_taller.id_socio_has_taller', '=', 'socio_has_taller_has_detalle_ingreso.socio_has_taller_id_socio_has_taller')
        ->join('detalle_ingreso','socio_has_taller_has_detalle_ingreso.detalle_ingreso_id_detalle_ingreso', '=', 'detalle_ingreso.id_detalle_ingreso')
        ->join('taller','socio_has_taller.taller_id_taller', '=', 'taller.id_taller')

        ->select('socio.id_socio',
            'taller.cuota_taller',
            'taller.nombre_taller',
            'socio.nombre_socio',
            'socio.apellido_socio',
            'detalle_ingreso.importe_detalle_ingreso',
            'detalle_ingreso.fecha_detalle_ingreso', 
            'detalle_ingreso.mes_detalle_ingreso', 
            'detalle_ingreso.año_detalle_ingreso', 
            'detalle_ingreso.descuento_detalle_ingreso')

        ->where('socio.id_socio', 'LIKE', '%'.$id_socio.'%')
        ->orwhere('taller.id_taller', 'LIKE', '%'.$id_taller.'%')

        ->orderBy('detalle_ingreso.fecha_detalle_ingreso', 'desc')
        ->paginate(8);



        return view('ingresos.cuota_taller.historial',["historial"=>$historial]);
    }

 public function nuevo_pago(Request $request, $id_taller,$id_socio)
    {   
         
        $socio=Socio::find($id_socio);
        $taller=Taller::find($id_taller);
        $datos[0]=$id_taller;
        $datos[1]=$id_socio;
        return view('ingresos.cuota_taller.nuevo_pago',["datos"=>$datos,"socio"=>$socio,"taller"=>$taller]);
    }



}
