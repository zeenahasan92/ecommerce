<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Item(){
        return $this->hasMany(Item::class,'category_id','id');
    }
}
