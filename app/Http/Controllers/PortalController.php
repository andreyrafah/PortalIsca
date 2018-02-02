<?php

namespace App\Http\Controllers;


//use Illuminate\Http\Request;
use Request;
use App\Link;
use App\carteira;
use App\Click;

class PortalController extends Controller
{
    function telefone($id){
        $link = Link::find($id);
        $carteira = carteira::find($link->carteira_id);
        $click = new Click();
        $click->origem = 'Telefone';
        $click->link_id = $link->id;
        $click->save();
        return redirect('tel:'.$carteira->telefone);
    }

    function portalAutoNegociacao($id){

        $link = Link::find($id);
        $click = new Click();
        $click->origem = 'Portal de Autonegociação';
        $click->link_id = $link->id;
        $click->save();
        $carteira = carteira::find($link->carteira_id);
        return view('sms',['numero' => $link->numero]);
        return redirect($link->url);
    }

    function whatsapp($id){
        $link = Link::find($id);
        $carteira = carteira::find($link->carteira_id); 
        $click = new Click();
        $click->origem = 'Whatsapp';
        $click->link_id = $link->id;
        $click->save();
        $url = 'https://api.whatsapp.com/send?phone=55'.$carteira->Whatsapp.'&text=Olá meu nome é '.$link->cliente_nome.', Quero negociar meu debito, codigo de indenficação '.$link->cliente_id;
        return redirect($url);
    }

    function sms($id){

        if(isset($id)){
            $link = Link::find($id);
            $carteira = carteira::find($link->carteira_id);
            $numero = $carteira->sms;
            $click = new Click();
            $click->origem = 'SMS';
            $click->link_id = $link->id;
            $click->save();
            
        }else{
            $numero = '41996320272';
        }
            return view('sms',['numero' => $numero]);
        //return redirect('sms:'.$carteira->sms);
    }

    function email($id){
        $link = Link::find($id);
        $carteira = carteira::find($link->carteira_id);
        $click = new Click();
        $click->origem = 'Email';
        $click->link_id = $link->id;
        $click->save();
        return redirect('mailto:'.$carteira->email."?subject=Negociação de Debito ".$link->cliente_id."&body=Ola tenho interesse em negociar meu debito meu nome é ".$link->cliente_nome);
    }

    function c2c($id){
        $telefone = Request::input('tel');
        $link = Link::find($id);
        $click = new Click();
        $click->origem = 'Click To Call';
        $click->link_id = $link->id;
        //$click->save();
        $carteira = carteira::find($link->carteira_id);
        $click->Login();
        $click->clicktocall('55312'.$telefone,$carteira->fila,$link->cliente_nome." <".$telefone.">");
        //$click->SendSMS('b1c0','41992327183','');
        $click->Logout();
        return "Ola estamos te ligando"; 
    }

    function smsSend($numero){
        
    }
    
}
