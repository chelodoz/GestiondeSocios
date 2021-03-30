<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Personal;
use sistema\Cat_Organizacion;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\AdministracionPersonalFormRequest;
use DB;

class AdministracionPersonalController extends Controller
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
            $personas=Personal::with('Cat_Organizacion')
            ->where('nombre_personal', 'LIKE', '%'.$query.'%')
            //->where('estado_personal', '=', 'Activo')
            ->orwhere('num_documento_personal', '=', '%'.$query.'%')
            //->where('estado_personal', '=', 'Activo')
            ->orwhereHas('Cat_Organizacion', function($q) use($query){$q
                ->where('nombre_cat_organizacion', 'LIKE', '%'.$query.'%');})

 			->orderBy('apellido_personal', 'asc')
 			->paginate(8);

 			return view('administracion.organizacion.personal.index',["personas"=>$personas, "searchText"=>$query]);
 		}
 	}

 	public function create()
 	{
 		$categorias=Cat_Organizacion::where('estado_cat_organizacion', '=', '1')->get();
 		return view("administracion.organizacion.personal.create", ["categorias"=>$categorias]);
 	}

 	public function store(AdministracionPersonalFormRequest $request)
 	{
 		$personal=new Personal;
 		$personal->nombre_personal=$request->get('nombre_personal');
 		$personal->apellido_personal=$request->get('apellido_personal');
 		$personal->tipo_documento_personal=$request->get('tipo_documento_personal');
 		$personal->num_documento_personal=$request->get('num_documento_personal');
 		$personal->telefono_personal=$request->get('telefono_personal');
 		$personal->celular_personal=$request->get('celular_personal');
 		$personal->correo_personal=$request->get('correo_personal');
 		$personal->estado_personal='Activo';
 		$personal->save();

        //$categoria=Cat_Organizacion::where('id_cat_organizacion', $request);
        //$categoria->nombre_cat_organizacion=$request->get('nombre_cat_organizacion');
        //$categoria->estado_cat_organizacion='1';
        //$personal->Cat_Organizacion()->save($categoria);

        $id_personal=Personal::where('nombre_personal', $request->get('nombre_personal'))->first()->id_personal;
        $id_cat_organizacion=$request->get('id_cat_organizacion');

        $personal=Personal::find($id_personal);
        $cat_organizacion=Cat_Organizacion::find($id_cat_organizacion);

        $personal->Cat_Organizacion()->attach($cat_organizacion);

 		return Redirect::to('administracion/organizacion/personal');
 	}

 	public function show($id)
 	{
 		return view("administracion.organizacion.personal.show", ["personal"=>Personal::findOrFail($id)]);
 	}

 	public function edit($id)
 	{
 		$personal=Personal::findOrFail($id);
 		$categorias=Cat_Organizacion::where('estado_cat_organizacion', '=', '1')->get();
 		return view("administracion.organizacion.personal.edit", ["personal"=>$personal, "categorias"=>$categorias]);
 	}

 	public function update(AdministracionPersonalFormRequest $request, $id)
 	{
 		$personal=Personal::findOrFail($id);
 		$personal->nombre_personal=$request->get('nombre_personal');
 		$personal->apellido_personal=$request->get('apellido_personal');
 		$personal->tipo_documento_personal=$request->get('tipo_documento_personal');
 		$personal->num_documento_personal=$request->get('num_documento_personal');
 		$personal->telefono_personal=$request->get('telefono_personal');
 		$personal->celular_personal=$request->get('celular_personal');
 		$personal->correo_personal=$request->get('correo_personal');
 		$personal->estado_personal='Activo';
        $personal->push();

        $id_personal=Personal::where('nombre_personal', $request->get('nombre_personal'))->first()->id_personal;
        $id_cat_organizacion=$request->get('id_cat_organizacion');

        $personal=Personal::find($id_personal);
        $cat_organizacion=Cat_Organizacion::find($id_cat_organizacion);
 		
 		$personal->Cat_Organizacion()->sync($cat_organizacion);

 		return Redirect::to('administracion\organizacion\personal');
 	}

 	public function destroy($id)
 	{
 		$personal=Personal::findOrFail($id);
 		$personal->destroy($id);

 		return Redirect::to('administracion\organizacion\personal');
 	}


    public function baja($id)
    {
        $personal=Personal::findOrFail($id);
        $personal->estado_personal='Inactivo';
        $personal->update();

        return Redirect::to('administracion\organizacion\personal');
    }


    public function alta($id)
    {
        $personal=Personal::findOrFail($id);
        $personal->estado_personal='Activo';
        $personal->update();

        return Redirect::to('administracion\organizacion\personal');
    }

 	public function details(Request $request,$id)
     {

         $personal=Personal::findOrFail($id);
         if($request)
         {

             $query=trim($request->get('searchText'));


             $personal=Personal::findOrFail($id)
             ->where('id_personal','LIKE','%'.$id.'%')
             ->orderBy('id_personal', 'asc')
             ->paginate(8);


             return view('administracion.organizacion.personal.details',["personal"=>$personal, "searchText"=>$query]);
         }
     }
}
