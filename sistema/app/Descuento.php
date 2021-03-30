<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table='descuento';

	protected $primaryKey='id_descuento';

	public $timestamps=false;


	protected $fillable = [
		'id_socio',
		'valor_descuento'
	];

	protected $guarded = [
		
	];

	
    public function Socio()
    {
        return $this->belongsToMany('sistema\Socio', 'socio_has_descuento', 'socio_id_socio', 'descuento_id_descuento')->withPivot([ 'fecha_inicio_socio_has_descuento', 'fecha_fin_socio_has_descuento']);
    }    
}
