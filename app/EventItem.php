<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use App\Event;
=======
>>>>>>> Daphne

class EventItem extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_items';

<<<<<<< HEAD
    public function event(){
        return $this->belongsTp(Event::class);
    }
=======
>>>>>>> Daphne
}
