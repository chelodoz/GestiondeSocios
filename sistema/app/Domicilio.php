<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table='domicilio';

	protected $primaryKey='id_domicilio';

	public $timestamps=false;


	protected $fillable = [
		'direccion_domicilio',
		'nombre_provincia_domicilio',
		'nombre_localidad_domicilio',
		'codigo_postal_domicilio',
		'id_socio',
		'estado_domicilio'
		
	];

	protected $guarded = [
		
	];

		public function Socio()
    {
        return $this->belongsTo('sistema\Socio', 'id_socio');
    }	
}
