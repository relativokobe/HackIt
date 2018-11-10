<?php

namespace App\Http\Controllers;

use App\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function getRewards(Request $request){        
        $rewards = Reward::all();
        return response()->json(array("status"=>config('constants.status_OK'),"rewards"=>$rewards));
    }

    public function checkSecretKey($secretKeyFromClient){
        $secretKey = env("SECRET_KEY","");

        if($secretKey == $secretKeyFromClient){
            return true;
        }else{
            return false;
        }
    }
}
