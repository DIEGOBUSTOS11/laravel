<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    //protected $table='users';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
  //protected $casts=[
  //  'is_admin'=> 'boolean'
  //];

    public static  function findByEmail($email){
    return static::where(compact('email') )->first();//retornar un solo resultado

    }

    
    public function profession() //profession + el sufijo _id si la tiene id_profession se pasa como segundo argumento despues de class

    //el metodo en singular 
    // que un usuario pertenece  a una profession
    {
     // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
            return $this->belongsTo(profession::class);
        
    }

    public function isAdmin(){
      return $this->email==='ferchobmg@gmail.com';
    }
}
