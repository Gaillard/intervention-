<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
       'id','User_id','App_id','type_id','status_id'
    ];

}
