<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentRegister extends Model
{
    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'idparent';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parents';
}
