<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'province';

    protected $keyType = 'string';

    protected $fillable = ['gst_rate', 
					   'pst_rate',
					   'hst_rate',
					   'qst_rate'
					   ];
}
