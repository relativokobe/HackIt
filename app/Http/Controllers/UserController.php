<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function login(Request $request){
    	$userId = $request->userId;
    	$password = $request->password;
    	$userExists = User::where('userId',$userId)
    					  ->where('password',$password)->first();

    	if($userExists != null) {
    		return response()->json(array("status"=>config('constants.status_OK'),"userId"=>$userId,"userName"=>$userExists->userName,
    			"userTypeId"=>$userExists->userTypeId));
    	}else{
    		return response()->json(array("status"=>config('constants.status_ERROR'),"message"=>config('constants.invalid_user')));
    	}
    }

     public function checkSecretKey($secretKeyFromClient){
        $secretKey = env("SECRET_KEY","");

        if($secretKey == $secretKeyFromClient){
            return true;
        }else{
            return false;
        }
    }

    public function getAllUsers(Request $request){
        $users = User::all();
        return response()->json(array("status"=>config('constants.status_OK'),"users"=>$users));
    }
}
