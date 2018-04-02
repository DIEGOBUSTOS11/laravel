<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
   // protected  $table='my_professions'; // cambie el nombre de la tabla
	protected $fillable = ['title'];
    
	// public $timestamps=false;  // para no utilizar esos campos 
	  
	
       public function users() // una profesion tiene muchos usuarios
       {
       	// hasMany(RelatedModel, foreignKeyOnRelatedModel = profession_id, localKey = id)
       	return $this->hasMany(User::class);
       }
	  
	 
}
