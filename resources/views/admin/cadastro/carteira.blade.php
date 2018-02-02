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
           body {background: linear-gradient( #E51C1F, #ff4242);
                height:1080px;
                overflow: hidden;
            }


        </style>
    </head>
    <body>
       
        <div class="container-fluid">
            <br>
            <div class="row">
                <form method="post" action="{{  url('admin/cadastro/carteira')   }}">
                    <input value="{{csrf_token()}}" name="_token" type="hidden">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">
                                Cadastro de Clientes
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="nome">Nome Carteira:</label>
                                    <input type="text" class="form-control" name="nome" id="nome">
                                </div>

                                <div class="form-group">
                                    <label for="codigo">Codigo Carteira CRM:</label>
                                    <input type="number" class="form-control" name="codigo" id="codigo">
                                </div>

                                <div class="form-group">
                                    <label for="mensagem">Mensagem:</label>
                                    <input type="text" class="form-control" name="mensagem" id="mensagem">
                                </div>

                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="mail" class="form-control" name="email" id="email">
                                </div>

                                <div class="form-group">
                                    <label for="telefone">Telefone de retorno:</label>
                                    <input type="number"class="form-control" name="telefone" id="telefone">
                                </div>

                                <div class="form-group">
                                    <label for="sms">Numero telefone SMS:</label>
                                    <input type="number"class="form-control" name="sms" id="sms">
                                </div>

                                <div class="form-group">
                                    <label for="fila">Fila:</label>
                                    <input type="number"class="form-control" name="fila" id="fila">
                                </div>

                                
                                <div class="form-group">
                                    <label for="url">URL:</label>
                                    <input type="text"class="form-control" name="url" id="url">
                                </div>

                                <div class="form-group">
                                    <label for="Whatsapp">Whatsapp:</label>
                                    <input type="number"class="form-control" name="Whatsapp" id="Whatsapp">
                                </div>

                                <input type="submit" class="btn btn-success btn-block" value="Salvar">
                            
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    
        </div>
        


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script language="javascript">

        </script>

    </body>
</html>
