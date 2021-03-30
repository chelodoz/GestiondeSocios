<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $table='familia';

	protected $primaryKey='id_familia';

	public $timestamps=false;


	protected $fillable = [
		'nombre_padre_familia',
		'nombre_madre_familia',
		'nombre_tutor_familia',
		'telefono_familia',
		'celular_familia',
		'id_socio',
		'estado_familia'
	];

	protected $guarded = [
		
	];

	public function Socio()
    {
        return $this->belongsTo('sistema\Socio', 'id_socio');
    }	
}
