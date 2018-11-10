<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Transaction;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function getActivities(Request $request){   
        $activities = \DB::table('activities')->select('activities.*','activity_types.desc as activityType','activity_statuses.desc as activityStatus','rewards.rewardId', 'rewards.rewardTypeId','rewards.rewardName','rewards.rewardPoint','rewards.rewardDiscount','rewards.imageUrl as rewardsImageUrl')
                                        ->join('activity_types','activity_types.activityTypeId','=','activities.activityTypeId')
                                        ->join('activity_statuses','activity_statuses.activityStatusId','=','activities.activityStatusId')
                                        ->join('rewards','rewards.rewardId','=','activities.rewardPoint')
                                        ->where('activities.activityStatusId','<',3)
                                        ->get();

        return response()->json(array("status"=>config('constants.status_OK'),"activities"=>$activities));
    }

    public function getActivityParticipants(Request $request){
        if(!$this->checkSecretKey($request->secretKey)){
            return response()->json(array("status"=>config('constants.status_ERROR'),"message"=>config('constants.incorrect_secretKey_message')));
        }

        $activityId = $request->activityId;

        $users = \DB::table('users')->select('users.*')->join('transactions','transactions.userId','=','users.userId')->where('transactions.activityId',$activityId)->get();
        return response()->json(array("status"=>config('constants.status_OK'),"users"=>$users));
    }

    public function checkSecretKey($secretKeyFromClient){
        $secretKey = env("SECRET_KEY","");

        if($secretKey == $secretKeyFromClient){
            return true;
        }else{
            return false;
        }
    }

    public function joinActivity(Request $request){
        if(!$this->checkSecretKey($request->secretKey)){
            return response()->json(array("status"=>config('constants.status_ERROR'),"message"=>config('constants.incorrect_secretKey_message')));
        }

        $activityId = $request->activityId;
        $userId = (int)$request->userId;

        $id = substr(str_shuffle("0123456789"), 0, 5);
        Transaction::create([
            'transactionId'=>$id,
            'userId'=>$request->userId,
            'activityId'=>$request->activityId,
            'transactionStatusId'=>config('constants.transaction_status_joined'),
            'date'=>\Carbon\Carbon::now()->format('Y-m-d')
        ]);

        return response()->json(array("status"=>config('constants.status_OK')));
    }

}
