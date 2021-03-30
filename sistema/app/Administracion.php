<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Administracion extends Model
{
    protected $table='administracion';

	protected $primaryKey='id_administracion';

	public $timestamps=false;


	protected $fillable = [
		'cuota_fija_administracion',
		'mes_administracion',
		'año_administracion'
	];

	protected $guarded = [
		
	];

	public function Socio_Has_Descuento()
	{
		return $this->belongsToMany('sistema/Socio_Has_Descuento', 'administracion_has_socio_has_descuento', 'administracion_id_administracion', 'socio_has_descuento_id_socio_has_descuento');
	}
}
