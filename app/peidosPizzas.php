<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peidosPizzas extends Model
{

    protected $fillabel = ['users_id', 'pizza', 'cantidad', 'total','estado'];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
    public $timestamps = false;


}
