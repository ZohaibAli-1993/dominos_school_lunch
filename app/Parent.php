<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{ 
    protected $primaryKey = 'idparent';
    protected $fillable=['first_name','last_name','email','phone','password','captcha'];   
    //protected $table = 'parents';
}
