<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
	protected $primaryKey = 'id';
	
    protected $fillable = [
        'token', 'idschool', 'idparent'
    ];
}
