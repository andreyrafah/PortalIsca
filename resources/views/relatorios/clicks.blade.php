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
                            Relatorios
                        </div>
                        <div class="panel-body">
                        
                            <table class="table table-striped table-bordered table-hover table-responsive table-condensed">
                                <thead>
                                    <th>ID</th>
                                    <th>URL</th>
                                    <th>Cliente</th>
                                    <th>Tipo Envio</th>
                                    <th>Destino</th>
                                    <th>Carteira</th>
                                    <th>Link Aberto</th>
                                    <th >Detalhes</th>
                                </thead>
                                <tbody>
                                    @foreach($links as $l)
                                    <tr>
                                        <td>{{  $l->id  }}</td>
                                        <td>{{  $l->url     }}</td>
                                        <td>{{  $l->cliente_nome  }}</td>
                                        <td>
                                            @if($l->tipo_envio == 1)
                                                SMS
                                            @elseif($l->tipo_envio == 2 )
                                                E-MAIL
                                            @endif
                                        </td>
                                        <td>{{  $l->destino }}</td>
                                        <td>{{  $l->carteira->nome   }}</td>
                                        <td>
                                            @if($l->aberto == 1)
                                                SIM
                                            @else
                                                NÃO
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <a href="{{  url('admin/relatorios/clicks')   }}/{{   $l->id }}">
                                                <span class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                    Detalhes
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            
                            
                            </table>
                        
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
