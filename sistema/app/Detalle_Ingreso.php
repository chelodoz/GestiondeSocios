<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Detalle_Ingreso extends Model
{
    protected $table='detalle_ingreso';

	protected $primaryKey='id_detalle_ingreso';

	public $timestamps=false;


	protected $fillable = [
		'id_ingreso',
		'importe_detalle_ingreso',
		'id_socio',
		'id_taller',
		'fecha_detalle_ingreso',
		'deuda_detalle_ingreso'
	];

	protected $guarded = [
		
	];

	public function Ingreso()
	{
		return $this->hasMany('sistema\Ingreso', 'id_ingreso');
	}

	public function Socio()
	{
		return $this->belongsToMany('sistema\Socio', 'socio_has_detalle_ingreso','detalle_ingreso_id_detalle_ingreso','socio_id_socio' );
	}

	public function Taller()
	{
		return $this->hasOne('sistema\Taller', 'id_taller');
	}
}
