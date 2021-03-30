<?php

namespace sistema;

use Illuminate\Database\Eloquent\Model;

class Cat_Organizacion extends Model
{
	protected $table='cat_organizacion';

	protected $primaryKey='id_cat_organizacion';

	public $timestamps=false;


	protected $fillable = [
		'nombre_cat_organizacion',
		'descripcion_cat_organizacion'
	];

	protected $guarded = [
		
	];

	public function Personal()
	{
		return $this->belongsToMany('sistema\Personal', 'personal_has_cat_organizacion', 'cat_organizacion_id_cat_organizacion', 'personal_id_personal');	
	}
}
