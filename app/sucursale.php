<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sucursale extends Model
{

     protected $fillabel = ['departamentos_id','direcion','telefono','estado'];


    public function departamento()
    {
        return $this->belongsTo('App\municipio');
    }

      public $timestamps = false;
         /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'estado'];

}
