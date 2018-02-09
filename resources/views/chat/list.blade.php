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
                            Mensagens Recebidas
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <th>Canal</th>
                                    <th>Numero</th>
                                    <th>Mensagem</th>
                                    <th>Data e Hora</th>
                                </thead>
                                <tbody>
                                    @foreach($sms as $s)
                                        <tr>
                                            <td>{{$s->channel}}</td>
                                            <td>{{$s->from}}</td>
                                            <td>{{$s->body}}</td>
                                            <td>{{$s->datetime}}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            
                            </table>    

                        </div>
                        <div class="panel-footer">{{$sms}}</div>
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
