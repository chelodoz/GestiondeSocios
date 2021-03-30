<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Detalle_Egreso extends Model
{
    protected $table='detalle_egreso';

	protected $primaryKey='id_detalle_egreso';

	public $timestamps=false;


	protected $fillable = [
		'id_egreso',
		'importe_detalle_egreso',
		'id_personal',
		'fecha_detalle_egreso',
		'descripcion_detalle_egreso',
		'mes_detalle_egreso',
		'año_detalle_egreso'
	];

	protected $guarded = [
		
	];

	public function Egreso()
	{
		return $this->hasMany('sistema\Egreso', 'id_egreso');
	}

	public function Personal()
	{
		return $this->belongsToMany('sistema\Personal', 'detalle_egreso_has_personal', 'detalle_egreso_id_detalle_egreso', 'personal_id_personal');
	}
}
