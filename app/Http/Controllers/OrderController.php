<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order_Item;
use App\Order;
use Auth;
use Session;
class OrderController extends Controller
{
    //make new order
    public function makeOrder(Request $request)
    {
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->save();

        $cart = Session::get('items');
        for ($i = 0; $i < count($cart); $i++) {
            $items[$i] = Item::find($cart[$i]);
        }
        for ($i = 0; $i < count($cart); $i++) {
            $order_item = new Order_Item;
            $order_item->item_id = $items[$i]->id;
            $order_item->order_id = $order->id;
            $order_item->save();
        }
        $request->session()->forget('items');
        return "<h3>Your Order has made</h3><a href='/home'>back to home</a>";
    }

    //get your orders
    public function myOrder()
    {
if (Auth::user()){
        $order = Order::where('user_id', '=', Auth::user()->id)->get();
        if (isset($order)) {

            for ($i = 0; $i < count($order); $i++) {
                $order_item[$i] = Order_Item::where('order_id', '=', $order[$i]->id)->get();
            }
            if (isset($order_item)){
//exchange array 2D to 1D
            $k = 0;
            for ($i = 0; $i < count($order_item); $i++)
                for ($j = 0; $j < count($order_item[$i]); $j++) {
                    $a[$k] = $order_item[$i][$j];
                    $k++;
                }

            for ($i = 0; $i < count($a); $i++) {
                $nOrder[$i] = $a[$i]->order_id;
                $items[$i] = Item:: where('id', '=', $a[$i]->item_id)->get();
            }
            //exchange array 2D to 1D
            $k = 0;
            for ($i = 0; $i < count($items); $i++)
                for ($j = 0; $j < count($items[$i]); $j++) {
                    $b[$k] = $items[$i][$j];
                    $k++;
                }
            $items = $b;
            return view('userorders', compact('items', 'nOrder'));
        }
            else return "You dont have order <a href='/home'>back to home</a>"; }
    }
    return redirect('/home');
    }

}