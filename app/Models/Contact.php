<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    //accessor code

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }


    //mutator code

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    //mutator

    //relationship

}
