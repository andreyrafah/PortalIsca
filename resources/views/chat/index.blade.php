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

                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            CHAT
                        </div>
                        <div class="panel-body">
                            

                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input type="text" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="button">Enviar Mensagem </button>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>

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
