<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Taller;
use sistema\Personal;
use sistema\Detalle_Egreso;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\TallerFormRequest;
use sistema\Http\Requests\Detalle_TallerFormRequest;
use sistema\Http\Requests\EgresoPagoProfesionalFormRequest;
use Carbon\Carbon;
use DB;

class EgresoPagoProfesionalController extends Controller
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
            
            return view('egresos.pago_profesional.index',["taller"=>$taller, "searchText"=>$query]);
        }
    }

    public function create()
    {  
        return view("egresos.pago_profesional.create");
    }

    public function store(TallerFormRequest $request)
    {
        return Redirect::to('egresos.pago_profesional');
    }

    public function show($id)
    {
        return view("egresos.pago_profesional.show", ["taller"=>Taller::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('egresos.pago_profesional.edit');
    }

    public function update(EgresoPagoProfesionalFormRequest $request, $id)
    {   
        $id_detalle_egreso=Detalle_Egreso::orderBy('id_detalle_egreso', 'desc')->first()->id_detalle_egreso;
        $detalle_egreso=Detalle_Egreso::find($id_detalle_egreso);
        
        return Redirect::to('egresos.pago_profesional');
    }

    public function destroy($id)
    {
        $taller=taller::findOrFail($id);
        $taller->estado_taller='0';
        $taller->update();
        
        return Redirect::to('egresos.pago_profesional');
    }

    public function details(Request $request,$id_taller)
    {   
        $query=trim($request->get('searchText'));

            /*$personal=Personal::with('taller')
            ->where('nombre_personal','LIKE','%'.$query.'%')
            ->where('apellido_personal','LIKE','%'.$query.'%')
            ->where('estado_personal', '=', 'Activo')
            //->where('estado_personal', '=', 'Activo')

            ->whereHas('taller', function($q) use($query,$id_taller){$q
                ->where('id_taller','LIKE', '%'.$id_taller.'%');}) 

            ->orderBy('apellido_personal', 'asc')
            ->paginate(8);*/

            $personal=db::table('personal')
            ->join('taller_has_personal', 'personal.id_personal', '=', 'taller_has_personal.personal_id_personal')
            ->join('taller', 'taller_has_personal.taller_id_taller', '=', 'taller.id_taller')

            ->where('id_taller', 'LIKE', '%'.$id_taller.'%')

            ->select('personal.nombre_personal', 'personal.apellido_personal', 'taller_has_personal.estado_taller_personal', 'personal.id_personal', 'taller.id_taller', 'taller_has_personal.id_taller_has_personal')
            ->orderBy('id_taller_has_personal', 'asc')
            ->paginate(8);

        return view('egresos.pago_profesional.details',["personal"=>$personal, "id_taller"=>$id_taller]);

    }
    
    public function profesional(EgresoPagoProfesionalFormRequest $request,$id_taller,$id_personal)
    {
        $date=Carbon::now();

        $detalle_egreso=new Detalle_Egreso;
        $detalle_egreso->id_egreso='2';
        $detalle_egreso->fecha_detalle_egreso=$date;
        $detalle_egreso->importe_detalle_egreso=$request->get('importe_taller_personal');
        $detalle_egreso->estado_detalle_egreso='Pagado';
        $detalle_egreso->save();

        $id_detalle_egreso=Detalle_Egreso::orderBy('id_detalle_egreso', 'desc')->first()->id_detalle_egreso;

        $id_taller_has_personal=db::table('taller_has_personal')
        ->where('taller_has_personal.personal_id_personal', 'LIKE', '%'.$id_personal.'%')
        ->where('taller_has_personal.taller_id_taller', 'LIKE', '%'.$id_taller.'%')
        ->first()->id_taller_has_personal;

        db::table('taller_has_personal_has_detalle_egreso')->insert(
            ['taller_has_personal_id_taller_has_personal'=>$id_taller_has_personal,
             'detalle_egreso_id_detalle_egreso'=>$id_detalle_egreso]);

        db::table('taller_has_personal')
        ->where('taller_id_taller', '=', $id_taller)
        ->where('personal_id_personal', $id_personal)
        ->update(['estado_taller_personal'=>'Pagado']);

        return Redirect::to('egresos/pago_profesional');
    }

    public function pagar(Request $request, $id_taller, $id_personal)
    {
        $taller=Taller::findOrFail($id_taller);
        $personal=Personal::findOrFail($id_personal);

        $value=db::table('taller_has_personal')->where('taller_id_taller', $id_taller)->where('personal_id_personal', $id_personal)->get();

        $array[0]=$id_taller;
        $array[1]=$id_personal;
        
        return view('egresos.pago_profesional.pagar',["value"=>$value, "taller"=>$taller, "personal"=>$personal, "array"=>$array]);
    }

    public function info_pago(Request $request, $id_taller)
    {
        $info=db::table('detalle_egreso')
        ->join('taller_has_personal_has_detalle_egreso', 'detalle_egreso.id_detalle_egreso', '=', 'taller_has_personal_has_detalle_egreso.detalle_egreso_id_detalle_egreso')
        ->join('taller_has_personal', 'taller_has_personal_has_detalle_egreso.taller_has_personal_id_taller_has_personal', '=', 'taller_has_personal.id_taller_has_personal')
        ->join('personal', 'taller_has_personal.personal_id_personal', '=', 'personal.id_personal')
        ->join('taller', 'taller_has_personal.taller_id_taller', '=', 'taller.id_taller')

        ->where('id_taller', 'LIKE', '%'.$id_taller.'%')

        ->select('personal.nombre_personal', 'personal.apellido_personal', 'taller.nombre_taller', 'taller_has_personal.importe_taller_personal', 'taller_has_personal.estado_taller_personal', 'detalle_egreso.fecha_detalle_egreso')

        ->orderBy('detalle_egreso.fecha_detalle_egreso', 'asc')

        ->paginate();

        return view('egresos.pago_profesional.info_pago', ["info"=>$info]);
    }
}