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
        <style>
           body {
                height:1080px;
                overflow: hidden;
            }

            .panel-corandini{
                border-color: #E51C1F;
            }
            .panel-corandini .panel-heading{
                background: linear-gradient( #E51C1F, #ff4242);
                color: white;
                
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
        <br>
        <br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-success">
                    Em poucos segundo você recebera uma ligação do numero <strong>41 3514-XXXX </strong>  
                </div>
            </div>
        </div>
        
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
