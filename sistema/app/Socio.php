<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
	

    protected $table='socio';

	protected $primaryKey='id_socio';

	public $timestamps=false;


	protected $fillable = [
		'nombre_socio',
		'apellido_socio',
		'fecha_de_nacimiento_socio',
		'tipo_documento_socio',
		'num_documento_socio',
		'estado_socio'
	];

	protected $guarded = [
		
	];

	   public function Familia()
    {
        return $this->hasOne('sistema\Familia', 'id_socio');
    }
     public function Domicilio()
    {
        return $this->hasOne('sistema\Domicilio', 'id_socio');
    }
     public function Institucion()
    {
        return $this->hasOne('sistema\Institucion', 'id_socio');
    }

    public function Detalle_Ingreso()
    {
    	return $this->belongsToMany('sistema\Detalle_Ingreso', 'socio_has_detalle_ingreso','socio_id_socio', 'detalle_ingreso_id_detalle_ingreso');
    }

    public function Descuento()
    {
        return $this->belongsToMany('sistema\Descuento', 'socio_has_descuento', 'socio_id_socio', 'descuento_id_descuento')->withPivot([ 'fecha_inicio_socio_has_descuento', 'fecha_fin_socio_has_descuento']);
    }

    public function Taller()
    {
        return $this->belongsToMany('sistema\Taller', 'socio_has_taller', 'socio_id_socio', 'taller_id_taller');
    }
}
