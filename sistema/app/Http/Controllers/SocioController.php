<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Socio;
use sistema\Familia;
use sistema\Domicilio;
use sistema\Institucion;
use sistema\Descuento;
use sistema\Detalle_Ingreso;
use sistema\Taller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistema\Http\Requests\SocioFormRequest;
use sistema\Http\Requests\SocioInscripcionFormRequest;
use DB;

class SocioController extends Controller
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
 			->where('estado_socio', '=', '1')
 			->orwhere('apellido_socio','LIKE','%'.$query.'%')
 			->where('estado_socio', '=', '1')
 			->orwhere('fecha_de_nacimiento_socio','LIKE','%'.$query.'%')
 			->where('estado_socio', '=', '1')
 			->orwhere('num_documento_socio','LIKE','%'.$query.'%')
 			->where('estado_socio', '=', '1')

 			//->where('id_socio','LIKE','%'.$query.'%')
 			//->orwhere('tipo_documento_socio','LIKE','%'.$query.'%')

 			/*->orwhereHas('Familia', function($q) use($query){$q
 				->where('nombre_padre_familia','LIKE', '%'.$query.'%')
 				->where('nombre_madre_familia','LIKE', '%'.$query.'%')
 				->where('nombre_tutor_familia','LIKE', '%'.$query.'%')
 				->where('telefono_familia','LIKE', '%'.$query.'%')
 				->where('celular_familia','LIKE', '%'.$query.'%')
 				->where('estado_familia', '=', '1');})

 			->orwhereHas('Domicilio', function($q) use($query){$q
 				->where('direccion_domicilio','LIKE', '%'.$query.'%')
 				->where('nombre_provincia_domicilio','LIKE', '%'.$query.'%')
 				->where('nombre_localidad_domicilio','LIKE', '%'.$query.'%')
 				->where('codigo_postal_domicilio','LIKE', '%'.$query.'%')
 				->where('estado_domicilio', '=', '1');})

 			->orwhereHas('Institucion', function($q) use($query){$q
 				->where('nombre_institucion','LIKE', '%'.$query.'%')
 				->where('domicilio_institucion','LIKE', '%'.$query.'%')
 				->where('grado_institucion','LIKE', '%'.$query.'%')
 				->where('estado_institucion', '=', '1');})*/
 			
 			->orderBy('apellido_socio', 'desc')
 			->paginate(8);


 			return view('asociados.socio.index',["socios"=>$socios, "searchText"=>$query]);
 		}
 	}

 	public function create()
 	{
 		return view("asociados.socio.create");
 	}

 	public function store(SocioFormRequest $request)
 	{
 		/*$socio=new Socio;
 		$socio->nombre_socio=$request->get('nombre_socio');
 		$socio->apellido_socio=$request->get('apellido_socio');
 		$socio->fecha_de_nacimiento_socio=$request->get('fecha_de_nacimiento_socio');
 		$socio->tipo_documento_socio=$request->get('tipo_documento_socio');
 		$socio->num_documento_socio=$request->get('num_documento_socio');
 		$socio->estado_socio='1';
 		$socio->save();*/

 		//Usando Eloquent:

 		$socio= new Socio;
 		$familia= new Familia;
 		$domicilio= new Domicilio;
 		$institucion= new Institucion;
        $descuento= new Descuento;
        $detalle_ingreso= new Detalle_Ingreso;


 		$socio->nombre_socio = $request->get('nombre_socio');
 		$socio->apellido_socio = $request->get('apellido_socio');
 		$socio->fecha_de_nacimiento_socio = $request->get('fecha_de_nacimiento_socio');
 		$socio->tipo_documento_socio = $request->get('tipo_documento_socio');
 		$socio->num_documento_socio = $request->get('num_documento_socio');
 		$socio->estado_socio='1';
 		$socio->save();

		$familia->nombre_padre_familia = $request->get('nombre_padre_familia');
 		$familia->nombre_madre_familia = $request->get('nombre_madre_familia');
 		$familia->nombre_tutor_familia = $request->get('nombre_tutor_familia');
 		$familia->telefono_familia = $request->get('telefono_familia');
 		$familia->celular_familia = $request->get('celular_familia'); 
 		$familia->estado_familia='1';
 		$socio->Familia()->save($familia);

		$domicilio->direccion_domicilio = $request->get('direccion_domicilio');
 		$domicilio->nombre_provincia_domicilio = $request->get('nombre_provincia_domicilio');
 		$domicilio->nombre_localidad_domicilio = $request->get('nombre_localidad_domicilio');
 		$domicilio->codigo_postal_domicilio = $request->get('codigo_postal_domicilio');
 		$domicilio->estado_domicilio='1';
 		$socio->Domicilio()->save($domicilio);
 		
		$institucion->nombre_institucion = $request->get('nombre_institucion');
 		$institucion->domicilio_institucion = $request->get('domicilio_institucion');
 		$institucion->grado_institucion = $request->get('grado_institucion');
 		$institucion->estado_institucion='1';
 		$socio->Institucion()->save($institucion);

        

 		return Redirect::to('asociados/socio');
 	}

 	public function show($id)
 	{
 		return view("asociados.socio.show", ["socio"=>Socio::findOrFail($id)]);
 	}

 	public function edit($id)
 	{
 		return view("asociados.socio.edit", ["socio"=>Socio::findOrFail($id)]);
 	}

 	public function update(SocioFormRequest $request, $id)
 	{
 		/*$socio=Socio::findOrFail($id);
 		$socio->nombre_socio=$request->get('nombre_socio');
 		$socio->apellido_socio=$request->get('apellido_socio');
 		$socio->fecha_de_nacimiento_socio=$request->get('fecha_de_nacimiento_socio');
 		$socio->tipo_documento_socio=$request->get('tipo_documento_socio');
 		$socio->num_documento_socio=$request->get('num_documento_socio');
 		$socio->estado_socio='1';
 		$socio->update();*/

 		//Usando Eloquent:

 		/*$socio=Socio::findOrFail($id);
 		$socio->nombre_socio = $request->get('nombre_socio');
 		$socio->apellido_socio = $request->get('apellido_socio');
 		$socio->fecha_de_nacimiento_socio = $request->get('fecha_de_nacimiento_socio');
 		$socio->tipo_documento_socio = $request->get('tipo_documento_socio');
 		$socio->num_documento_socio = $request->get('num_documento_socio');
 		$socio->estado_socio='1';
 		$socio->save();

 		$familia=Familia::findOrFail($id);
 		$familia->nombre_padre_familia = $request->get('nombre_padre_familia');
 		$familia->nombre_madre_familia = $request->get('nombre_madre_familia');
 		$familia->nombre_tutor_familia = $request->get('nombre_tutor_familia');
 		$familia->telefono_familia = $request->get('telefono_familia');
 		$familia->celular_familia = $request->get('celular_familia'); 
 		$familia->estado_familia='1';
 		$socio->Familia()->save($familia);

 		$domicilio=Domicilio::findOrFail($id);
 		$domicilio->direccion_domicilio = $request->get('direccion_domicilio');
 		$domicilio->nombre_provincia_domicilio = $request->get('nombre_provincia_domicilio');
 		$domicilio->nombre_localidad_domicilio = $request->get('nombre_localidad_domicilio');
 		$domicilio->codigo_postal_domicilio = $request->get('codigo_postal_domicilio');
 		$domicilio->estado_domicilio='1';
 		$socio->Domicilio()->save($domicilio);

 		$institucion=Institucion::findOrFail($id);
 		$institucion->nombre_institucion = $request->get('nombre_institucion');
 		$institucion->domicilio_institucion = $request->get('domicilio_institucion');
 		$institucion->grado_institucion = $request->get('grado_institucion');
 		$institucion->estado_institucion='1';
 		$socio->Institucion()->save($institucion);*/

        

		$socio=Socio::with('Familia','Institucion','Domicilio'/*, 'Descuento'*/)
         ->where('id_socio', $id)->firstOrFail();

         $socio->nombre_socio = $request->get('nombre_socio');
         $socio->apellido_socio = $request->get('apellido_socio');
         $socio->fecha_de_nacimiento_socio = $request->get('fecha_de_nacimiento_socio');
         $socio->tipo_documento_socio = $request->get('tipo_documento_socio');
         $socio->num_documento_socio = $request->get('num_documento_socio');
         $socio->estado_socio='1';

         $socio->familia->nombre_padre_familia = $request->get('nombre_padre_familia');
         $socio->familia->nombre_madre_familia = $request->get('nombre_madre_familia');
         $socio->familia->nombre_tutor_familia = $request->get('nombre_tutor_familia');
         $socio->familia->telefono_familia = $request->get('telefono_familia');
         $socio->familia->celular_familia = $request->get('celular_familia'); 
         $socio->familia->estado_familia='1';

         $socio->domicilio->direccion_domicilio = $request->get('direccion_domicilio');
         $socio->domicilio->nombre_provincia_domicilio = $request->get('nombre_provincia_domicilio');
         $socio->domicilio->nombre_localidad_domicilio = $request->get('nombre_localidad_domicilio');
         $socio->domicilio->codigo_postal_domicilio = $request->get('codigo_postal_domicilio');
         $socio->domicilio->estado_domicilio='1';

         $socio->institucion->nombre_institucion = $request->get('nombre_institucion');
         $socio->institucion->domicilio_institucion = $request->get('domicilio_institucion');
         $socio->institucion->grado_institucion = $request->get('grado_institucion');
         $socio->institucion->estado_institucion='1';

         //$socio->descuento->valor_descuento=null;
         //$socio->descuento->fecha_inicio_descuento=null;
         //$socio->descuento->fecha_fin_descuento=null;

         $socio->push();


 		return Redirect::to('asociados\socio');
 	}
 	public function details(Request $request,$id)
     {

         $socios=Socio::findOrFail($id);
         if($request)
         {

             $query=trim($request->get('searchText'));


             $socios=Socio::with('Familia','Institucion','Domicilio')
             ->where('id_socio','LIKE','%'.$id.'%')
             ->orderBy('id_socio', 'asc')
             ->paginate(8);


             return view('asociados.socio.details',["socios"=>$socios, "searchText"=>$query]);
         }
     }

 	public function destroy($id)
 	{

 		$socio=Socio::with('Familia','Institucion','Domicilio')
        ->where('id_socio', $id)->firstOrFail();
        $socio->estado_socio='0';
        $socio->familia->estado_familia='0';
        $socio->domicilio->estado_domicilio='0';
        $socio->institucion->estado_institucion='0';
        $socio->push();
 	

 		return Redirect::to('asociados\socio');
 	}


    public function inscripcion(Request $request, $id)
    {
        $socios=Socio::findOrFail($id);
        $taller=Taller::where('estado_taller', '=', '1')
        ->paginate();
        return view('asociados.socio.inscribir',["socios"=>$socios,"taller"=>$taller]);
    }

    public function inscribir(SocioInscripcionFormRequest $request, $id_socio)
    {   
      
        $socios=Socio::find($id_socio);
       
        $taller=Taller::find($request->get('id_taller'));

        $socios->Taller()->attach($taller);

        return Redirect::to('asociados/socio');
    }
}
