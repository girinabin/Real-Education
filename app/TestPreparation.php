<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPreparation extends Model
{
    protected $guarded = [];
	
     public function getactiveAttribute($attribute){
        return[
            0 => 'Inactive',
            1 =>'Active'
        ][$attribute];
    }
}
