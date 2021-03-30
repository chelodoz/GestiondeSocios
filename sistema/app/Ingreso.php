<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table='ingreso';

	protected $primaryKey='id_ingreso';

	public $timestamps=false;


	protected $fillable = [
		'nombre_ingreso',
		'descripcion_ingreso',
		'estado_ingreso'
	];

	protected $guarded = [
		
	];

	public function Detalle_Ingreso()
	{
		return $this->belongsToMany('sistema\Detalle_Ingreso', 'id_ingreso');
	}
}
