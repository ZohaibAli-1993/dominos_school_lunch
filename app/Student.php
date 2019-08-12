<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * Defines primary key associated with the model.
     *
     * @var string
     */

    protected $primaryKey = 'idstudent';

    protected $fillable = ['first_name', 'last_name', 'idclassroom','idparent','idschool'];
}
