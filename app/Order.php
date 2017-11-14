<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function Item()
    {
        return $this->belongsToMany(Item::class, 'Order_Item', 'item_id', 'id');
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
