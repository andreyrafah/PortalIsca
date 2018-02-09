<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smsReceivedFilter extends Model
{
    protected $connection = "sms";
    protected $table = 'sms_received_filter';
}
