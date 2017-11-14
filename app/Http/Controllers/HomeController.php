<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //get welcom page
    public function index()
    {
        return view('welcome');
    }
    //get Admin panel
    public function Admin(){
        $items = Item::paginate(3);

            return view('adminpanel',compact('items'));

    }
    //get home page
    public function gethome(){
        $items = Item::paginate(3);

        return view('home',compact('items'));
    }
}
