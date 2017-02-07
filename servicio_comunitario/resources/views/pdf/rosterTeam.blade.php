@section('includesHead')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="css/styles.css" rel="stylesheet">
        {!! Html::style('css/estilos.css') !!}
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <style type="text/css" rel="stylesheet">
	        img{
                padding: 0;
            }
            p{
                padding:0;
            }
	</style>

@stop

<div class="col-md-10">
        <div class="col-md-6">
            <div class="col-md-6">
                <div class="content-box-large">
                    <div class="panel-heading">
                        @foreach($dataEquipo as $dataEquipo)
                        <table class="center" id="tabla" style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="center" style="border: 1px solid transparent; text-align:center;"><img src="images/logoligaU.jpg" width="70px" height="70px"
                                                                                                                alt="logo"></td>
                                    <td class="center" style="border: 1px solid transparent; text-align:center;">
                                            <h1>Liga U</h1>
                                            <h3>Listado Atletas: {{ $dataEquipo->nombre_equipo }}</h3>
                                    </td>
                                    <td class="center" style="border: 1px solid transparent; text-align:center;">
                                                <h3>Univ: {{  $dataEquipo->acronimo }}</h3>
                                                <h3>Disc: {{ $dataEquipo->nombre_disciplina }}</h3>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                    </div>
                        @endforeach
                        <p align="center">Jugadores</p>
                        <p></p>
                    <div class="panel-body">
                        <table class="center" id="tabla" style="border-collapse: collapse; width: 100%;">

                            <thead>
                            <tr>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Foto</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Datos</th>
                                <th>&nbsp;</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Foto</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Datos</th>
                                <th>&nbsp;</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Foto</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Datos</th>
                            </tr>
                            </thead>
                            <tbody>
                           @for($x =0 ; $x<count($dataJugadores)-1 ; $x+=3)
                                <tr>                                    
                                    <td class="center" style="border: 1px solid black; text-align:center;"> <img src="{{$imageRoute.'/'.$dataJugadores[$x]->cedula.'/'.$dataJugadores[$x]->foto }}" height="60px" width="60px"></td> </td>
                                    <td class="center" style="border: 1px solid black; text-align:center;">
                                        <p style="padding:0; margin: 0;">{{ $dataJugadores[$x]->primer_nombre ." ". $dataJugadores[$x]->primer_apellido }}</p>
                                        <p style="padding:0; margin: 0;">{{ $dataJugadores[$x]->cedula }}</p>
                                        <p style="padding:0; margin: 0;">{{$dataJugadores[$x]->fecha_nacimiento}}</p>
                                    </td>
                                      <!-- Metodo para el rol : @if($usus_equi_uni!=null)
                                        @foreach($usus_equi_uni as $usu_equi_uni)
                                            @if($usu_equi_uni->fk_usuario == $dataJugadores[$x]->cedula)
                                                <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                            @endif
                                        @endforeach
                                    @endif -->


                                    <td></td>


                                    <td class="center" style="border: 1px solid black; text-align:center;"> <img src="{{$imageRoute.'/'.$dataJugadores[$x+1]->cedula.'/'.$dataJugadores[$x+1]->foto }}" height="60px" width="60px"></td> </td>
                                    <td class="center" style="border: 1px solid black; text-align:center;">
                                        <p style="padding:0; margin: 0;">{{ $dataJugadores[$x+1]->primer_nombre ." ". $dataJugadores[$x+1]->primer_apellido }}</p>
                                        <p style="padding:0; margin: 0;">{{ $dataJugadores[$x+1]->cedula }}</p>
                                        <p style="padding:0; margin: 0;">{{$dataJugadores[$x+1]->fecha_nacimiento}}</p>
                                    </td>
                                      <!-- Metodo para el rol : @if($usus_equi_uni!=null)
                                      @foreach($usus_equi_uni as $usu_equi_uni)
                                      @if($usu_equi_uni->fk_usuario == $dataJugadores[$x+1]->cedula)
                                              <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                            @endif
                                      @endforeach
                                      @endif -->


                                    <td></td>


                                    <td class="center" style="border: 1px solid black; text-align:center;"> <img src="{{$imageRoute.'/'.$dataJugadores[$x+2]->cedula.'/'.$dataJugadores[$x+2]->foto }}" height="60px" width="60px"></td> </td>
                                    <td class="center" style="border: 1px solid black; text-align:center;">
                                        <p style="padding:0; margin: 0;">{{ $dataJugadores[$x+2]->primer_nombre ." ". $dataJugadores[$x+2]->primer_apellido }}</p>
                                        <p style="padding:0; margin: 0;">{{ $dataJugadores[$x+2]->cedula }}</p>
                                        <p style="padding:0; margin: 0;">{{$dataJugadores[$x+2]->fecha_nacimiento}}</p>
                                    </td>
                                    <!-- Metodo para el rol : @if($usus_equi_uni!=null)
                                    @foreach($usus_equi_uni as $usu_equi_uni)
                                    @if($usu_equi_uni->fk_usuario == $dataJugadores[$x+2]->cedula)
                                            <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                            @endif
                                    @endforeach
                                    @endif -->
                                    </tr>                           
                           @endfor
                            </tbody>
                        </table>
                    </div>
                        <br>
                        <p></p>
                        <p align="center">Cuerpo Técnico</p>
                        <p></p>
                 <div class="panel-body">
                        <table class="center" id="tabla" style="border-collapse: collapse; width: 100%;">
                            <thead>
                            <tr>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Foto</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Datos</th>
                                <th>&nbsp;</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Foto</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Datos</th>
                                <th>&nbsp;</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Foto</th>
                                <th style="background-color: #0E90D2; color: white; border: 1px solid black; text-align:center;">Datos</th>
                            </tr>
                            </thead>
                            <tbody>                                  
                           @for($x =0 ; $x<count($dataCuerpoTecnico)-1 ; $x+=2) 
                            
                                <tr>                                    
                                    <td class="center" style="border: 1px solid black; text-align:center;"> <img src="{{$imageRoute.'/'.$dataCuerpoTecnico[$x]->cedula.'/'.$dataCuerpoTecnico[$x]->foto }}" height="60px" width="60px"></td> </td>
                                    <td class="center" style="border: 1px solid black; text-align:center;">
                                        <p style="padding:0; margin: 0;">{{ $dataCuerpoTecnico[$x]->primer_nombre ." ". $dataCuerpoTecnico[$x]->primer_apellido }}</p>
                                        <p style="padding:0; margin: 0;">{{ $dataCuerpoTecnico[$x]->cedula }}</p>
                                        @if($usus_equi_uni!=null)
                                            @foreach($usus_equi_uni as $usu_equi_uni)
                                                @if($usu_equi_uni->fk_usuario == $dataCuerpoTecnico[$x]->cedula)
                                                    <p style="padding:0; margin: 0;" >{{$usu_equi_uni->rol_equipo}}</p>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>


                                    <td></td>


                                    <td class="center" style="border: 1px solid black; text-align:center;"> <img src="{{$imageRoute.'/'.$dataCuerpoTecnico[$x+1]->cedula.'/'.$dataCuerpoTecnico[$x+1]->foto }}" height="60px" width="60px"></td> </td>
                                    <td class="center" style="border: 1px solid black; text-align:center;">
                                        <p style="padding:0; margin: 0;">{{ $dataCuerpoTecnico[$x+1]->primer_nombre ." ". $dataCuerpoTecnico[$x+1]->primer_apellido }}</p>
                                        <p style="padding:0; margin: 0;">{{ $dataCuerpoTecnico[$x+1]->cedula }}</p>
                                        @if($usus_equi_uni!=null)
                                            @foreach($usus_equi_uni as $usu_equi_uni)
                                                @if($usu_equi_uni->fk_usuario == $dataCuerpoTecnico[$x+1]->cedula)
                                                    <p style="padding:0; margin: 0;">{{$usu_equi_uni->rol_equipo}}</p>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>


                                    <td></td>


                                    <td class="center" style="border: 1px solid black; text-align:center;"> <img src="{{$imageRoute.'/'.$dataCuerpoTecnico[$x+2]->cedula.'/'.$dataCuerpoTecnico[$x+2]->foto }}" height="60px" width="60px"></td> </td>
                                    <td class="center" style="border: 1px solid black; text-align:center;">
                                        <p style="padding:0; margin: 0;">{{ $dataCuerpoTecnico[$x+2]->primer_nombre ." ". $dataCuerpoTecnico[$x+2]->primer_apellido }}</p>
                                        <p style="padding:0; margin: 0;">{{ $dataCuerpoTecnico[$x+2]->cedula }}</p>
                                        @if($usus_equi_uni!=null)
                                            @foreach($usus_equi_uni as $usu_equi_uni)
                                                @if($usu_equi_uni->fk_usuario == $dataCuerpoTecnico[$x+2]->cedula)
                                                    <p style="padding:0; margin: 0;">{{$usu_equi_uni->rol_equipo}}</p>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    </tr>                           
                           @endfor
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
        </div>
    </div>


@section('includes')
            <link href="../vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://code.jquery.com/jquery.js"></script>
            <!-- jQuery UI -->
            <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../js/bootstrap.min.js"></script>

            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../vendors/datatables/js/jquery.dataTables.min.js"></script>

            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../vendors/datatables/dataTables.bootstrap.js"></script>

            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../js/custom.js"></script>
            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../js/tables.js"></script>
@stop

