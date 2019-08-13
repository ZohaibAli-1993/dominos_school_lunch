<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model{
    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'idcontact';
    protected $fillable = ['name','email','subject','message'];
}
