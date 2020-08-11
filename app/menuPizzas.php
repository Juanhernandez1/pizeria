<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menuPizzas extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'ingredientes', 'precio', 'estado'];
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['estado'];
}
