<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Detalle_Personal extends Model
{
 	protected $table='detalle_personal';

	protected $primaryKey='id_detalle_personal';

	public $timestamps=false;


	protected $fillable = [
		'cuota_detalle_personal'
	];

	protected $guarded = [
		
	]; 

	public function Personal()
	{
		return $this->belongsToMany('sistema\Personal', 'personal_has_detalle_personal', 'detalle_personal_id_detalle_personal', 'personal_id_personal')->withPivot('cat_organizacion_id_cat_organizacion');
	}
}
