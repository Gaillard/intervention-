<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $fillable = [
        'id','User_id','demande_id'
    ];

}
