<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Item extends Model
{
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public
    function Order()
    {
        return $this->belongsToMany(Order::class, 'Order_Item', 'order_id', 'id');
    }
    public function getDollarAttribute(){
        return $this->price . " $" ;
    }

}
