<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    
     protected $fillable = [
        'transactionId', 'userId', 'activityId', 'transactionStatusId', 'date'
    ];

    public $timestamps = false;
}
