<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'idstore';

    protected $fillable = ['name', 
    					   'address',
    					   'city',
    					   'province',
    					   'postal_code',
    					   'phone',
    					   'email'
    					   ];

}


