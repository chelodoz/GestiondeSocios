<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table='taller';

	protected $primaryKey='id_taller';

	public $timestamps=false;


	protected $fillable = [
		'nombre_taller',
		'descripcion_taller',	
		'estado_taller'
	];

	protected $guarded = [
		
	];

	public function Detalle_Taller()
    {
        return $this->belongsToMany('sistema\Detalle_Taller', 'detalle_taller_has_taller', 'detalle_taller_id_detalle_taller', 'taller_id_taller');
    }    


	public function Detalle_Ingreso()
	{
		return $this->belongsTo('sistema\Detalle_Ingreso', 'id_taller');
	}

	public function Personal()
    {
        return $this->belongsToMany('sistema\Personal', 'taller_has_personal', 'taller_id_taller', 'personal_id_personal')->withPivot(['importe_taller_personal', 'estado_taller_personal']);
    }

    public function Socio()
    {
    	return $this->belongsToMany('sistema\Socio', 'socio_has_taller', 'taller_id_taller', 'socio_id_socio' );
    }
    
    
}

