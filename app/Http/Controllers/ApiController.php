<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use Illuminate\Http\Request;
use Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class ApiController extends Controller
{
    //get All Items
    public function getItems(){
        $items = Item::all();
        return response()->json(['items'=>$items]);
    }
    //log in function
    public function  login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()->all()], 422);

        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = JWTAuth::toUser($token);
        $user->token = $token;
        // all good so return the token
        return response()->json(compact('user'));

    }

//create new account
public function Create(Request $request){
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        're_password' => 'required|same:password',
        'name' => 'required',
    ]);
    if ($validator->fails())
        return response()->json([
                'errors' => $validator->errors()->all()], 422);
    $user = new User;
    $user->name = $request->name;
    $user->password = bcrypt($request->password);
    $user->email = $request->email;
    $user->save();

    $credentials = $request->only('email', 'password');
    try {
        // attempt to verify the credentials and create a token for the user
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
    } catch (JWTException $e) {
        // something went wrong whilst attempting to encode the token
        return response()->json(['error' => 'could_not_create_token'], 500);
    }
    $user = JWTAuth::toUser($token);
    $user->token = $token;
    return response()->json(compact('user'));
}
}


