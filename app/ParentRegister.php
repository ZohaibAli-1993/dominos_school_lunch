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

<<<<<<< HEAD

    protected $table = 'parents_register'; 
 
    protected $fillable=['first_name','last_name','email','phone','password','captcha'];

  

=======

    protected $table = 'parents_register'; 
 
    protected $fillable=['first_name','last_name','email','phone','password','captcha'];
>>>>>>> 74c5eaccbdddfa7a05d380f17452f035414ef1b6

}
