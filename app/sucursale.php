<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sucursale extends Model
{

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =  ['departamentos_id','direcion','telefono','estado'];


    public function departamento()
    {
        return $this->belongsTo('App\municipio');
    }

      public $timestamps = false;


}
