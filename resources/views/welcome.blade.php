<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Corandini</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        <!--
            Cores Corandini
            Padrão          FF120F
            Site:           E51C1F
            Composta:       FF4700
            Sombra:         540000
            Iluminação:     F1F1F1
            Complementar    01b351
            
        -->
        <style>
           body {
                overflow: hidden;
                background: linear-gradient( to bottom right ,#FF120F ,#540000);
                background-repeat: no-repeat;
                height:680px;
            }

            .panel-corandini{
                border:0;
            }
            .panel-corandini .panel-heading{
                background: #540000;
                color: #fff;
                
            }

            .btn-custon-1{
                color: #fff;
                background-color: #3f3db9;
                border-color: #4cae4c;
            }
            @media screen and (min-width: 813px) {
                .mobile {
                    display:none
                }
            }

        </style>
    </head>
    <body>
        <!--<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </div>-->

        @if($link != null)
        
            <div class="container-fluid">
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-corandini">
                            <div class="panel-heading text-center cor-corandini">
                                <p>Olá <strong>{{$link->cliente_nome}}</strong> temos uma excelente proposta de Negociação do seu debito junto a {{ $link->carteira->nome }}, basta escolher um dos canais de atendimento abaixo</p>
                            </div> 
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                        <a href="{{ url('portal/whatsapp')}}/{{$link->id}}">
                                                <span class="btn btn-success btn-block">Quero Negociar pelo Whatsapp</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                    <a href="{{ url('portal/autoNegociacao')}}/{{$link->id}}">
                                            <div class="form-group">
                                                <span class="btn btn-primary btn-block"> Quero Negociar sozinho</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <a href="{{ url('portal/telefone')}}/{{$link->id}}">
                                                <span class="btn btn-info btn-block">
                                                    Quero ligar e negociar por telefone
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                        <a href="{{ url('portal/chat')}}/{{$link->id}}">
                                                <span class="btn btn-custon-1 btn-block">Quero Negociar pelo Chat</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mobile">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <a href="{{ url('portal/sms')}}/{{$link->id}}">
                                                <span class="btn btn-default btn-block">
                                                    Quero negociar por SMS
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <a href="{{ url('portal/email')}}/{{$link->id}}">
                                                <span class="btn btn-warning btn-block">
                                                    Quero negociar via E-mail
                                                </span>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <span class="btn btn-danger btn-block" id="MostrarEsconderMensagem">
                                                Quero Receber uma ligação (gratis)
                                            </span>
                                        </div>
                                        
                                        <div id="Mensagem" 
                                            @if(count($errors) > 0)
                                                
                                            @else
                                                hidden
                                            @endif
                                            >
                                            <form method="post" action="{{ url('portal/c2c')}}/{{$link->id}}">
                                                <input value="{{    csrf_token()    }}" name="_token" type="hidden">
                                                <div class="input-group">
                                                    
                                                    <input type="tel" id="tel" name="tel" class="form-control" placeholder="DDD + NUMERO" value="{{ $link->destino }}">
                                                
                                                
                                                    <span class="input-group-btn">
                                                        <input type="submit" class="btn btn-success" value=" Receber Ligação ">
                                                    </span>
                                                    </a>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                @if(count($errors) > 0)
                                    <br>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{  $error   }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>

        @else

            <div class="container-fluid">
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary">
                            
                            <div class="panel-heading text-center"><p>Olá, temos uma excelente proposta de Negociação do seu debito, basta escolher um dos canais de atendimento abaixo</p></div> 
                           
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                        <a href="{{ url('portal/whatsapp')}}">
                                                <span class="btn btn-success btn-block">Quero Negociar pelo Whatsapp</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <a href="{{ url('portal/autoNegociacao')}}">
                                            <div class="form-group">
                                                <span class="btn btn-primary btn-block"> Quero Negociar sozinho</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <a href="{{ url('portal/telefone')}}">
                                                <span class="btn btn-info btn-block">
                                                    Quero ligar e negociar por telefone
                                                </span>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <a href="{{ url('portal/sms')}}">
                                                <span class="btn btn-default btn-block">
                                                    Quero negociar por SMS
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <a href="{{ url('portal/email')}}">
                                                <span class="btn btn-warning btn-block">
                                                    Quero ligar e negociar por e-mail
                                                </span>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <span class="btn btn-danger btn-block" id="MostrarEsconderMensagem">
                                                Quero Receber uma ligação (gratis)
                                            </span>
                                        </div>
                                        
                                        <div id="Mensagem" hidden>
                                            <form method="post" action="{{ url('portal/c2c')}}">
                                                <input value="{{    csrf_token()    }}" name="_token" type="hidden">
                                                <div class="input-group">
                                                    
                                                    <input type="tel" id="tel" name="tel" class="form-control" placeholder="DDD + NUMERO">
                                                   
                                                    
                                                    <span class="input-group-btn">
                                                        <input type="submit" class="btn btn-success" value=" Receber Ligação ">
                                                    </span>
                                                    </a>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>

        @endif
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script language="javascript">
            $(document).ready(function() {
                $("#MostrarEsconderMensagem").click(MostrarEsconderMensagem);
                });

            function MostrarEsconderMensagem(){
                $("#Mensagem").toggle('fast');
            }
        </script>

    </body>
</html>
