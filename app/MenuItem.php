<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'iditem';

    protected $fillable = ['item_name', 
    					   'description',
    					   'price',
    					   'nutrition_facts',
    					   'postal_code',
    					   'idcategory',
    					   'image'
    					   ];

}
