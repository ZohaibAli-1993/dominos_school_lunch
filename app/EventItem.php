<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class EventItem extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_items';

    public function event(){
        return $this->belongsTp(Event::class);
    }
}
