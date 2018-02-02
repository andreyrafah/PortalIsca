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
                <form method="post" action="{{url('admin/cadastro/link')}}">
                    <input value="{{csrf_token()}}" name="_token" type="hidden">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">
                                Cadastro de Clientes
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="cliente_id">Codigo do Cliente:</label>
                                    <input type="number" class="form-control" name="cliente_id" id="cliente_id">
                                </div>

                                <div class="form-group">
                                    <label for="cliente_nome">Nome do Cliente:</label>
                                    <input type="text" class="form-control" name="cliente_nome" id="cliente_nome">
                                </div>

                                <div class="form-group">
                                    <label for="tipo_envio">Tipo De Envio</label>
                                    <select name="tipo_envio" id="tipo_envio" class="form-control">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="1">SMS</option>
                                        <option value="2">EMAIL</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="mail">E-Mail</label>
                                    <input type="mail" class="form-control" name="mail" id="mail">
                                </div>

                                <div class="form-group">
                                    <label for="celular">Celular:</label>
                                    <input type="number"class="form-control" name="celular" id="celular">
                                </div>

                                <div class="form-group">
                                    <label for="carteira">Carteira:</label>
                                    <select name="carteira" id="carteira" class="form-control">
                                        <option value="" disabled selected>Selecione</option>
                                        @foreach($carteiras as $c)
                                            <option value="{{ $c->id}}" >{{ $c->nome    }}</option>
                                        @endforeach
                                    </select>
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
