<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingredientes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ingrediente', 'precio', 'popularida', 'estado'];
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['estado'];
}
