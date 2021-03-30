<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table='institucion';

	protected $primaryKey='id_institucion';

	public $timestamps=false;


	protected $fillable = [
		'nombre_institucion',
		'domicilio_institucion',
		'grado_institucion',
		'id_socio',
		'estado_institucion'
		
	];

	protected $guarded = [
		
	];

		public function Socio()
    {
        return $this->belongsTo('sistema\Socio', 'id_socio');
    }	
}
