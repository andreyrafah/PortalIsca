<?php

namespace App\Http\Controllers;


//use Illuminate\Http\Request;
use Request;
use Validator;  
use App\Http\Requests\TelefoneRequest;
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

    function autoNegociacao($id){

        $link = Link::find($id);
        $click = new Click();
        $click->origem = 'Portal de Autonegociação';
        $click->link_id = $link->id;
        $click->save();
        $carteira = carteira::find($link->carteira_id);
        return redirect($carteira->url);
    }

    function whatsapp($id){
        $link = Link::find($id);
        $carteira = carteira::find($link->carteira_id); 
        $click = new Click();
        $click->origem = 'Whatsapp';
        $click->link_id = $link->id;
        $click->save();
        $url = 'https://api.whatsapp.com/send?phone=55'.$carteira->Whatsapp.'&text=Olá meu nome é '.$link->cliente_nome.', Quero negociar meu debito, código de identificação '.$link->cliente_id;
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
            return view('sms',['numero' => $numero,'click' => $click]);
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

    function c2c($id, TelefoneRequest $request){
        $link = Link::find($id);
        $request->all();
        
        $click = new Click();
        $click->origem = 'Click To Call';
        $click->link_id = $link->id;
        $click->save();
        $carteira = carteira::find($link->carteira_id);
        $click->Login();
        $click->clicktocall('55312'.$telefone,$carteira->fila,$link->cliente_nome." <".$telefone.">");
        //$click->SendSMS('b1c0','41992327183','');
        $click->Logout();

        return view('modelo/clicktocallmensagem');
        
        
    }

    function chat($id){
        $link = Link::find($id);
        $click = new Click();
        $click->origem = 'Chat';
        $click->link_id = $link->id;
        $click->save();
        return redirect("https://www.smartsuppchat.com/widget?key=a6fefc2a618f225d02d365ab4195157d1547222d&vid=8tO15SiGkll9uJ2i0qCS80W4InegHLT4Zu28141515122017&group=&lang=pt&pageTitle=Corandini%20Assessoria&pageUrl=http%3A%2F%2Fcorandini.com.br%2F&domain=corandini.com.br&referer=");
  }

    function facebook(){

    }
    
}
