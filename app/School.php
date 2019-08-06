<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'idschool';


    protected $fillable = ['school_name', 'city', 'idstore','province','address','postal_code','coordinator_first_name', 'coordinator_last_name', 'email', 'phone', 'password'];
}

