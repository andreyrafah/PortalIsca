<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Click;

class RelatoriosController extends Controller
{
    function clicks(){
        $links = Link::all();
        return view('relatorios/clicks',[ 'links' => $links]);
    }

    function ClicksDetalhes($id){
        $link = Link::find($id);
        $clicks = Click::where('link_id',$id)->get();
        return view('relatorios/clicksDetalhes',['clicks' => $clicks]);
    }
}
