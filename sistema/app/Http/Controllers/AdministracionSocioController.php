<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Socio;
//use sistema\Familia;
//use sistema\Domicilio;
//use sistema\Institucion;
use sistema\Descuento;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\AdministracionSocioFormRequest;
use DB;

class AdministracionSocioController extends Controller
{
    public function __construct()
 	{
        $this->middleware('auth');
 	}   

 	public function index(Request $request)
 	{
 		if($request)
 		{
 			/*$query=trim($request->get('searchText'));
 			$socios=DB::table('socio')->where('nombre_socio','LIKE', '%'.$query.'%')
 			->where('estado_socio', '=', '1')
 			->orderBy('id_socio', 'asc')
 			->paginate(8);*/


 			//Usando Eloquent:         NO TENGO IDEA DE LO QUE ESTOY HACIENDO =D

 			$query=trim($request->get('searchText'));

 			$socios=DB::table('socio')
 			->where('nombre_socio','LIKE','%'.$query.'%')
 			//->where('estado_socio', '=', '1')
 			->orwhere('apellido_socio','LIKE','%'.$query.'%')
 			//->where('estado_socio', '=', '1')
 			->orwhere('fecha_de_nacimiento_socio','LIKE','%'.$query.'%')
 			//->where('estado_socio', '=', '1')
 			->orwhere('num_documento_socio','LIKE','%'.$query.'%')
 			//->where('estado_socio', '=', '1')

 			
 			->orderBy('apellido_socio', 'asc')
 			->paginate(8);


 			return view('administracion.administrar_socio.index',["socios"=>$socios, "searchText"=>$query]);
 		}
 	}

 	

 	public function store(AdministracionSocioFormRequest $request)
 	{
 		/*
 		$socio= new Socio;
        $descuento=new Descuento;

 		$socio->nombre_socio = $request->get('nombre_socio');
 		$socio->apellido_socio = $request->get('apellido_socio');
 		//$socio->fecha_de_nacimiento_socio = $request->get('fecha_de_nacimiento_socio');
 		$socio->tipo_documento_socio = $request->get('tipo_documento_socio');
 		$socio->num_documento_socio = $request->get('num_documento_socio');
 		$socio->estado_socio='1';
 		$socio->save();

        $descuento->valor_descuento=$request->get('valor_descuento');
        $descuento->fecha_inicio_descuento=$request->get('fecha_inicio_descuento');
        $descuento->fecha_fin_descuento=$request->get('fecha_fin_descuento');
        $socio->Descuento()->save($descuento);*/

 		return Redirect::to('administracion/administrar_socio');
 	}

 	public function show($id)
 	{
 		return view("administracion.administrar_socio.show", ["socio"=>Socio::findOrFail($id)]);
 	}

 	public function edit($id)
 	{
        //$descuento=DB::table('Descuento')->get();
        $descuento=Descuento::get();

 		return view("administracion.administrar_socio.edit", ["socio"=>Socio::findOrFail($id),"descuento"=>$descuento]);
 	}

 	public function update(AdministracionSocioFormRequest $request, $id)
 	{
        $id_socio =$id;
        $id_descuento=$request->get('id_descuento');      
        $socio=Socio::find($id_socio);
        $descuento=Descuento::find($id_descuento); 
        
        $inicio=$request->get('fecha_inicio_socio_has_descuento');
        $fin=$request->get('fecha_fin_socio_has_descuento');

        //dd($request);

        $socio->descuento()->attach($descuento,[
        'fecha_inicio_socio_has_descuento' =>$inicio,
        'fecha_fin_socio_has_descuento' => $fin
        ]);

 		return Redirect::to('administracion\administrar_socio');
 	}

 	public function destroy($id)
 	{
 		$socio=Socio::with('Descuento')
        ->where('id_socio', $id)->firstOrFail();
        $socio->destroy($id);
 
 		return Redirect::to('administracion\administrar_socio');
 	}
}