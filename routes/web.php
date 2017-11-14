<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//User
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@gethome');
    Route::get('/cart', 'ItemController@Cart');
    Route::get('/remove', 'ItemController@removeCart');
    Route::get('/getcart', 'ItemController@getCart');
    Route::get('/order', 'OrderController@makeOrder');
    Route::get('/search', 'ItemController@searchItem');
    Route::get('/price/{rang}', 'ItemController@priceItem');
    Route::get('/myorder', 'OrderController@myOrder');


//Admin
Route::group(['middleware'=>'auth.user'],function (){
    Route::get('/panel','HomeController@Admin');
    Route::post('/add','ItemController@Add');
    Route::get('/addItem','ItemController@getAddItem');
    Route::get('/deleteItem/{item}','ItemController@DeleteItem');
    Route::get('/editItem/{item}','ItemController@getEditItem');
    Route::post('/edit/{item}','ItemController@EditItem');
});
