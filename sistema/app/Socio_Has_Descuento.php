<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Socio_Has_Descuento extends Model
{
    protected $table='socio_has_descuento';

    /*public $incrementing = false;

	protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('socio_id_socio', '=', $this->getAttribute('socio_id_socio'))
            ->where('descuento_id_descuento', '=', $this->getAttribute('descuento_id_descuento'));
        return $query;
    }*/

    protected $primaryKey='id_socio_has_descuento';

	public $timestamps=false;


	protected $fillable = [
		'socio_id_socio',
		'descuento_id_descuento',
		'fecha_inicio_socio_has_descuento',
		'fecha_fin_socio_has_descuento'
	];

	protected $guarded = [
		
	];

	public function Administracion()
	{
		return $this->belongsToMany('sistema/Administracion', 'administracion_has_socio_has_descuento',  'administracion_id_administracion', 'socio_has_descuento_id_socio_has_descuento');
	}
}
