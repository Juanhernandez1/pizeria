<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peidosPizzas extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sucursales_id','users_id', 'pizza', 'cantidad', 'total','estado'];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
    public $timestamps = false;


}
