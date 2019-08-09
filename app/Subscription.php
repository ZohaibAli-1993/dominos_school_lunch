 <?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'idsubscription';
    protected $fillable=['subscription_email'];
}
