<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{

    protected $fillabel = ['nombre','estado'];
    public $timestamps = false;
    public function municipios()
    {
        return $this->hasMany('App\municipio');
    }

      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['estado'];

}
