<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinkController extends Controller
{
    function BuscoURL($url){
        $url = trim($url);
        $link = Link::where('url',$url)->get()->first();
        if(!isset($url) || $link == null){
            $link = null;
        }else{            
            $link->aberto = 1;
            $link->save();
        }
        return view('welcome',['link' => $link]);
    }

    function SemURL(){
        $link = null;
        return view('welcome',['link' => $link]);
    }
}
