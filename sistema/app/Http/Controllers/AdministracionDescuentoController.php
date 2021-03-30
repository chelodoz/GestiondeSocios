<?php

namespace sistema\Http\Controllers;

use Illuminate\Http\Request;
use sistema\Http\Requests;

use sistema\Descuento;
use sistema\Http\Requests\DescuentoFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

class AdministracionDescuentoController extends Controller
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
 			$descuento=DB::table('descuento')
            ->orderby('id_descuento', 'asc')
 			->paginate(8);


 			return view('administracion.descuentos.index',["descuento"=>$descuento, "searchText"=>$query]);
 		}
 	}

    public function create()
    {
        return view("administracion.descuentos.create");
    } 	

 	public function store(DescuentoFormRequest $request)
 	{
        $descuento=new Descuento;
        $descuento->valor_descuento=$request->get('valor_descuento');
        $descuento->save();

 		return Redirect::to('administracion/descuentos');
 	}

 	public function show($id)
 	{
 		return view("administracion.descuentos.show", ["descuento"=>Descuento::findOrFail($id)]);
 	}

 	public function edit($id)
 	{
        $descuento=Descuento::findOrFail($id);
 		return view("administracion.descuentos.edit", ["descuento"=>$descuento]);
 	}

 	public function update(DescuentoFormRequest $request, $id)
 	{
        $descuento=Descuento::find($id);
    	$descuento->valor_descuento=$request->get('valor_descuento');
    	$descuento->update();

 		return Redirect::to('administracion\descuentos');
 	}

 	public function destroy($id)
 	{
 		$descuento=Descuento::where('id_descuento', $id)->firstOrFail();
        $descuento->destroy($id);
 	
 		return Redirect::to('administracion\descuentos');
 	}
}
