<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Defined Variables
    |--------------------------------------------------------------------------
    |
    | This is a set of variables that are made specific to this application
    | that are better placed here rather than in .env file.
    | Use config('your_key') to get the values.
    |
    */
    'invalid_user'=>'Invalid Username or Passowrd',
    'incorrect_secretKey_message'=>'Error connecting to server. Please use Hack It Mobile Client',
    'status_OK'=>1,
    'status_ERROR'=>2,
    'user_type_admin'=> 1,
    'user_type_employee'=>2,
    'activity_type_sports'=>1,
    'activity_type_social_events'=>2,
    'activity_type_community_outreach'=>3,
    'activity_status_upcoming'=>1,
    'activity_status_ongoing'=>2,
    'activity_status_done'=>3,
    'activity_status_cancelled'=>4,
    'transaction_status_joined'=>1,
    'transaction_status_done'=>2,
    'transaction_status_cancelled'=>3,
    'reward_type_point'=>1,
    'reward_type_discount'=>2,
    'company_name' => env('COMPANY_NAME','Acme Inc'),
    'company_email' => env('COMPANY_email','contact@acme.inc'),


];