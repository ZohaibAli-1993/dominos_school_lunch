<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventItem;

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

    public function eventItems(){
        return $this->hasMany(EventItem::class);
    }
}
