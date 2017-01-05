

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

@stop

<div class="col-md-10">
        <div class="col-md-6">
            <div class="col-md-6">
                <div class="content-box-large">
                    <div class="panel-heading">
                        @foreach($dataEquipo as $dataEquipo)
                        <div class="panel-title"></div>
                        <p align="center"><font size=5 color="blue">{{ $dataEquipo->nombre_equipo }}</font></p>
                        <p></p>
                        <p align="center">Jugadores</p>
                        <p></p>
                    <div class="panel-body">
                        <table class="center">
                            @endforeach
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Fecha Nacimiento</th>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Fecha Nacimiento</th>
                            </tr>
                            </thead>
                            <tbody>                                  
                           @for($x =0 ; $x<count($dataJugadores)-1 ; $x+=2) 
                            
                                <tr>                                    
                                    <td class="center"> <img src="{{$imageRoute.'/'.$dataJugadores[$x]->cedula.'/'.$dataJugadores[$x]->foto }}" height="80px" width="80px"></td> </td>
                                    <td class="center">{{ $dataJugadores[$x]->primer_nombre ." ". $dataJugadores[$x]->primer_apellido }}</td>
                                     <td class="center">{{ $dataJugadores[$x]->cedula }}</td>
                                      <!-- Metodo para el rol : @if($usus_equi_uni!=null)
                                        @foreach($usus_equi_uni as $usu_equi_uni)
                                            @if($usu_equi_uni->fk_usuario == $dataJugadores[$x]->cedula)
                                                <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                            @endif
                                        @endforeach
                                    @endif-->
                                    <td class="center">{{$dataJugadores[$x]->fecha_nacimiento}}</td>
                                     <td class="center"> <img src="{{$imageRoute.'/'.$dataJugadores[$x+1]->cedula.'/'.$dataJugadores[$x+1]->foto }}" height="80px" width="80px"></td> </td>
                                    
                                    <td class="center">{{ $dataJugadores[$x+1]->primer_nombre ." ". $dataJugadores[$x+1]->primer_apellido }}</td>
                                     <td class="center">{{ $dataJugadores[$x+1]->cedula }}</td>
                                     <td class="center">{{$dataJugadores[$x+1]->fecha_nacimiento}}</td>
                                    
                                  <!--  @if($usus_equi_uni!=null)
                                        @foreach($usus_equi_uni as $usu_equi_uni)
                                            @if($usu_equi_uni->fk_usuario == $dataJugadores[$x+1]->cedula)
                                                <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                            @endif
                                        @endforeach
                                    @endif -->
                                    </tr>                           
                           @endfor
                            </tbody>
                        </table>
                    </div>

                <div class="panel-title"></div>
                        <br></br>
                        <p></p>
                        <p align="center">Cuerpo Técnico</p>
                        <p></p>
                 <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Rol</th>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Rol</th>
                            </tr>
                            </thead>
                            <tbody>                                  
                           @for($x =0 ; $x<count($dataCuerpoTecnico)-1 ; $x+=2) 
                            
                                <tr>                                    
                                    <td class="center"> <img src="{{$imageRoute.'/'.$dataCuerpoTecnico[$x]->cedula.'/'.$dataCuerpoTecnico[$x]->foto }}" height="80px" width="80px"></td> </td>
                                    <td class="center">{{ $dataCuerpoTecnico[$x]->primer_nombre ." ". $dataCuerpoTecnico[$x]->primer_apellido }}</td>
                                     <td class="center">{{ $dataCuerpoTecnico[$x]->cedula }}</td>
                                      @if($usus_equi_uni!=null)
                                        @foreach($usus_equi_uni as $usu_equi_uni)
                                            @if($usu_equi_uni->fk_usuario == $dataCuerpoTecnico[$x]->cedula)
                                                <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                            @endif
                                        @endforeach
                                      @endif
                                    
                                     <td class="center"> <img src="{{$imageRoute.'/'.$dataCuerpoTecnico[$x+1]->cedula.'/'.$dataCuerpoTecnico[$x+1]->foto }}" height="80px" width="80px"></td> </td>
                                    
                                    <td class="center">{{ $dataCuerpoTecnico[$x+1]->primer_nombre ." ". $dataCuerpoTecnico[$x+1]->primer_apellido }}</td>
                                     <td class="center">{{ $dataCuerpoTecnico[$x+1]->cedula }}</td>
                                     
                                    
                                   @if($usus_equi_uni!=null)
                                        @foreach($usus_equi_uni as $usu_equi_uni)
                                            @if($usu_equi_uni->fk_usuario == $dataCuerpoTecnico[$x+1]->cedula)
                                                <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                            @endif
                                        @endforeach
                                    @endif
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

