<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use function Sodium\compare;
use Validator;
use App\Item;
use Session;
use Illuminate\Support\Facades\DB;
class ItemController extends Controller
{
    //Add new item
    public function Add(REQUEST $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'image'=>'mimes:jpeg,png'
        ]);
        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
else {

    $item = new  Item;
        $category = new Category;
        $item->name = $request->name;
        $item->price = $request->price;
    if(isset($request->image)){
    if ($request->hasFile('image')) {
        $file_name = str_random(10).".png";
        $request->file('image')->move('image/',$file_name);
    }
        $item->image = $file_name;}
        else
            $item->image='http://www.curezone.org/upload/Members/new03/white.jpg';
        $category->name = $request->category;
        $category->save();
        $item->category_id = $category->id;
        $item->save();
    if ( $item->save())
        return redirect('/panel');
}}

//get insert items page
    public  function  getAddItem(){
        $item = new  Item;
     return   view('AddItem',compact('item'));
    }
    //delete item
    public function DeleteItem(Item $item){
        $item->delete();
return redirect('/panel');
    }
    //get edit item page
    public function getEditItem(Item $item)
    {
        return   view('EditItem',compact('item'));
    }
    //edit item
    public function EditItem(Request $request,Item $item){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'image'=>'mimes:jpeg,png'
        ]);
        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        else {

            $category = new Category;
            $item->name = $request->name;
            $item->price = $request->price;
            if ($request->hasFile('image')) {
                $file_name = str_random(10).".png";
                $request->file('image')->move('image/',$file_name);
                $item->image = $file_name;
            }

            $category->name = $request->category;
            $category->save();
            $item->category_id = $category->id;
            $item->save();
            if ( $item->save())
                return redirect('/panel');
        }
    }
    //Add item in cart
    public function Cart(Request $request){

        Session::push('items', $request->item);
return redirect('/home');
    }
    //clear cart
    public function removeCart(Request $request){

        $request->session()->forget('items');
        return redirect('/getcart  ');
    }
    //get your cart
    public function getCart(){
       $cart =  Session::get('items');
        for ($i=0;$i<count($cart);$i++) {
            $items[$i] = Item::find($cart[$i]);
        }
if(isset($items))
        return view('cart',compact('items'));
else
    return "Your Cart is empty<a href='/home'>back to home</a>";
    }
    //search item
    public function searchItem(Request $request){
        $validator = Validator::make($request->all(),[
            'search'=>'required',
        ]);
        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        else
        {$items = Item::where('name', 'LIKE', '%'.$request->search.'%')->get();
    return view('filter',compact('items'));}
    }
    //filter the prices
    public function priceItem($rang){
        if ($rang>=1000)
            $items = Item::where('price', '>', $rang)->get();
       else if ($rang<=100)
           $items = Item::where('price', '<', $rang)->get();
else  {
//    $items = Item::where('price', '<', $rang,'and','price','>',$rang)->get();
$item = Item::all();
for ($i=0;$i<count($item);$i++)
    if($item[$i]->price<1000&&$item[$i]->price>100)
        $items[$i]= $item[$i];
}
        return view('filter',compact('items'));

        }

}
