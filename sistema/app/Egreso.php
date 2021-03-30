<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    protected $table='egreso';

	protected $primaryKey='id_egreso';

	public $timestamps=false;


	protected $fillable = [
		'nombre_egreso',
		'descripcion_egreso',
		'estado_egreso'
	];

	protected $guarded = [
		
	];

	public function Detalle_Egreso()
	{
		return $this->belongsToMany('sistema\Detalle_Egreso', 'id_egreso');
	}
}
