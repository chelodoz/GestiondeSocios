<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;

use sistema\Http\Requests;

use sistema\Cat_Organizacion;
use Illuminate\Support\Facades\Redirect;
use sistema\Http\Requests\AdministracionCategoriaFormRequest;
use DB;

class AdministracionCategoriaController extends Controller
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
 			//->where('estado_cat_organizacion', '=', '1')
 			->orderBy('nombre_cat_organizacion', 'asc')
 			->paginate(8);

 			return view('administracion.organizacion.categoria.index',["categorias"=>$categorias, "searchText"=>$query]);
 		}
 	}

 	public function create()
 	{
 		return view("administracion.organizacion.categoria.create");
 	}

 	public function store(AdministracionCategoriaFormRequest $request)
 	{
 		$categoria=new Cat_Organizacion;
 		$categoria->nombre_cat_organizacion=$request->get('nombre_cat_organizacion');
 		$categoria->descripcion_cat_organizacion=$request->get('descripcion_cat_organizacion');
 		$categoria->estado_cat_organizacion='1';
 		$categoria->save();

 		return Redirect::to('administracion/organizacion/categoria');
 	}

 	public function show($id)
 	{
 		return view("administracion.organizacion.categoria.show", ["categoria"=>Cat_Organizacion::findOrFail($id)]);
 	}

 	public function edit($id)
 	{
 		return view("administracion.organizacion.categoria.edit", ["categoria"=>Cat_Organizacion::findOrFail($id)]);
 	}

 	public function update(AdministracionCategoriaFormRequest $request, $id)
 	{
 		$categoria=Cat_Organizacion::findOrFail($id);
 		$categoria->nombre_cat_organizacion=$request->get('nombre_cat_organizacion');
 		$categoria->descripcion_cat_organizacion=$request->get('descripcion_cat_organizacion');
 		$categoria->estado_cat_organizacion='1';
 		$categoria->update();

 		return Redirect::to('administracion\organizacion\categoria');
 	}

 	public function destroy($id)
 	{
 		$categoria=Cat_Organizacion::findOrFail($id);
 		$categoria->destroy($id);

 		return Redirect::to('administracion\organizacion\categoria');
 	}

 	public function baja($id)
 	{
 		$categoria=Cat_Organizacion::findOrFail($id);
 		$categoria->estado_cat_organizacion='0';
 		$categoria->update();

 		return Redirect::to('administracion\organizacion\categoria');	
 	}

 	public function alta($id)
 	{
 		$categoria=Cat_Organizacion::findOrFail($id);
 		$categoria->estado_cat_organizacion='1';
 		$categoria->update();

 		return Redirect::to('administracion\organizacion\categoria');	
 	}
}
