<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Link;
use App\Carteira;
use Keygen;

class AdminController extends Controller
{
    function cadastroLink(){
        $carteiras = Carteira::all();
        return view('admin/cadastro/link',['carteiras' => $carteiras]);
    }

    function SalvarCadastroLink(){
        $link = new Link();
        $link->cliente_nome     = Request::input('cliente_nome');
        $link->cliente_id       = Request::input('cliente_id');
        $link->tipo_envio       = Request::input('tipo_envio');
        $link->carteira_id         = Request::input('carteira');
        $link->url = Keygen::alphanum(10)->generate();
        if($link->tipo_envio == 1){
            $link->destino      = Request::input('celular');
        }else if($link->tipo_envio == 2 ){
            $link->destino      = Request::input('mail');
        }
        
        $link->save();

    }

    function cadastroCarteira(){
        return view('admin/cadastro/carteira');
    }

    function SalvarCadastroCarteira(){
        $carteira = new Carteira;
        $carteira->nome         = Request::input('nome');
        $carteira->mensagem     = Request::input('mensagem');
        $carteira->codigo       = Request::input('codigo');
        $carteira->url          = Request::input('url');
        $carteira->fila         = Request::input('fila');
        $carteira->email        = Request::input('email');
        $carteira->sms          = Request::input('sms');
        $carteira->Whatsapp     = Request::input('Whatsapp');
        $carteira->telefone     = Request::input('telefone');
        $carteira->save();
        return Request::all();
    }
}
