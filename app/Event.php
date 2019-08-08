<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'idevent';

    protected $fillable=['idschool', 
                         'event_name',
                         'event_date',
                         'cutoff_date',
                         'event_time']; 
}
