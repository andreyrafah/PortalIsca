<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\smsReceivedFilter;
use App\smsSend;

class ChatController extends Controller
{

    function index(){
        $smsReceivedFilter = smsReceivedFilter::all();
        return view('chat/index',['sms' => $smsReceivedFilter]);
    }

    function store(){
        $smsReceivedFilter = smsReceivedFilter::orderBy('datetime','desc')->paginate(10);
        //return $smsReceivedFilter;
        return view('chat/list',['sms' => $smsReceivedFilter]);
    }

    function smsSends(){
        $smsSends = smsSend::orderBy('SMS_DATENV','desc')->paginate(25);
        return $smsSends;
    }

}
