<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $table = 'persons';
    
//protected $dates = ['deleted_at'];
 
protected $fillable = [ 'name', 'email', 'comment'];
}
