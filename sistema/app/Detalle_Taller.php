<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Detalle_Taller extends Model
{
    protected $table='detalle_taller';

	protected $primaryKey='id_detalle_taller';

	public $timestamps=false;


	protected $fillable = [
		'cuota_detalle_taller_personal',
		'estado_detalle_taller'
	];

	protected $guarded = [
		
	];


	 public function Taller()
    {
        return $this->belongsToMany('sistema\Taller', 'detalle_taller_has_taller', 'detalle_taller_id_detalle_taller', 'taller_id_taller');
    }    
}