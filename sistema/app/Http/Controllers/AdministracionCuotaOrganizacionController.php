<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Administracion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use sistema\Http\Requests\AdministracionCuotaOrganizacionFormRequest;
use DB;

class AdministracionCuotaOrganizacionController extends Controller
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


             $administracion=Administracion::orderBy('id_administracion', 'desc')
             ->paginate(8);
         }

        return view('administracion.administrar_cuota.index',["administracion"=>$administracion, "searchText"=>$query]);
 	}

    public function create(/*Request $request*/)
    {
      /*if($request)
        {
       
            $query=trim($request->get('searchText'));

            $administracion=DB::table('Administracion')
            ->where('cuota_fija_administracion','LIKE','%'.$query.'%')
            ->orwhere('fecha_cuota_fija_inicio_administracion','LIKE','%'.$query.'%')
            ->orwhere('fecha_cuota_fija_fin_administracion','LIKE','%'.$query.'%')     
            ->orderBy('fecha_cuota_fija_inicio_administracion', 'desc')
            ->paginate(8);

            }*/

            return view('administracion.administrar_cuota.create');
    }

 	public function store(AdministracionCuotaOrganizacionFormRequest $request)
 	{
        $administracion=new Administracion;

        $administracion->cuota_fija_administracion=$request->get('cuota_fija_administracion');
       
        $administracion->fecha_cuota_fija_inicio_administracion=$request->get('fecha_cuota_fija_inicio_administracion');
          $administracion->fecha_cuota_fija_fin_administracion=$request->get('fecha_cuota_fija_fin_administracion');
        $administracion->save();
 		
        return Redirect::to('administracion/administrar_cuota');
 	}

    public function show($id)
    {
        return view("administracion.administrar_cuota", ["administrar_cuota"=>Administracion::findOrFail($id)]);
    }

    public function destroy($id)
    {
       
        $administracion=Administracion::where('id_administracion', $id)->firstOrFail();
        $administracion->destroy($id);
    

        return Redirect::to('administracion\administrar_cuota');
    }

    

 	
}
