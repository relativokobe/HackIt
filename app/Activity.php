<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activityId', 'activityTypeId', 'activityName	', 'checker', 'dateTime', 'venue', 'activityStatusId', 'rewardId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
