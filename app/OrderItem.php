<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders_items';

    protected $fillable = [
        'idorder',
        'iditem',
        'item_price',
        'quantity',
        'sub_total'
    ];
}
