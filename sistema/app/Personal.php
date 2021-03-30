<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
	protected $table='personal';

	protected $primaryKey='id_personal';

	public $timestamps=false;


	protected $fillable = [
		'nombre_personal',
		'apellido_personal',
		'tipo_documento_personal',
		'num_documento_personal',
		'telefono_personal',
		'celular_personal',
		'correo_personal',
		'estado_personal',
		'id_cat_organizacion'
	];

	protected $guarded = [
		
	];

	public function detalle_taller()
	{
		//return $this->belongsToMany("Detalle_Taller","detalle_taller_personal", "id_personal" , "id_detalle_taller");
		return $this->belongsToMany('sistema\Detalle_Taller', 'detalle_taller_personal', 'id_personal', 'id_detalle_taller')->withPivot('id_personal');
	}

	public function Detalle_Egreso()
	{
		return $this->belongsToMany('sistema\Detalle_Egreso', 'detalle_egreso_has_personal', 'personal_id_personal', 'detalle_egreso_id_detalle_egreso');
	}

	public function Cat_Organizacion()
	{
		return $this->belongsToMany('sistema\Cat_Organizacion', 'personal_has_cat_organizacion', 'personal_id_personal', 'cat_organizacion_id_cat_organizacion');
	}

	public function Detalle_Personal()
	{
		return $this->belongsToMany('sistema\Detalle_Personal', 'personal_has_detalle_personal', 'personal_id_personal', 'detalle_personal_id_detalle_personal')->withPivot('cat_organizacion_id_cat_organizacion');
	}

	public function Taller()
    {
        return $this->belongsToMany('sistema\Taller', 'taller_has_personal', 'personal_id_personal', 'taller_id_taller')->withPivot(['importe_taller_personal', 'estado_taller_personal']);
    }
}


