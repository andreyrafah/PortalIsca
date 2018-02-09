<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smsSend extends Model
{
    protected $connection = "sms";
    protected $table = 'enviado';
}
