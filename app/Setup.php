<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{

    protected $primaryKey = 'id';

    protected $fillable = ['store_max_events', 
    					   'markup_default',
    					   'cutoff_days',
    					   'available_weekends'
    					   ];
}

