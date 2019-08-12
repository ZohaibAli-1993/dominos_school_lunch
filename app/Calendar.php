<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'idcalendar';

    protected $fillable = ['name', 
    					   'school_year',
    					   'begin_dt',
    					   'end_dt',
    					   'is_active'
    					   ];

}    
