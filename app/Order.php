<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'idorder';

    protected $fillable = [
            'idevent',
            'idstudent',
            'idschool',
            'idclassroom',
            'amount',
            'calculated_gst',
            'calculated_pst',
            'calculated_hst',
            'calculated_qst',
            'total_amount',
            'order_status',
            'calculated_gst'
    ];
}
