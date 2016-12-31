<div class="col-md-10">
        <div class="col-md-6">
            <div class="col-md-6">
                <div class="content-box-large">
                    <div class="panel-heading">
                        @foreach($dataEquipo as $dataEquipo)
                        <div class="panel-title"></div>
                        <p align="center">{{ $dataEquipo->nombre_equipo }}</p>
                    <div class="panel-body">
                        <table class="center">
                            @endforeach
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
                            @for($x =0 ; $x< ($numero-1) ; $x++)
                                <tr>
                                    
                                    <td class="center"> <img src="{{$imageRoute.'/'.$dataJugadores[$x]->cedula.'/'.$dataJugadores[$x]->foto }}" height="80px" width="80px"></td> </td>
                                    <td class="center">{{ $dataJugadores[$x]->primer_nombre ." ". $dataJugadores[$x]->primer_apellido }}</td>
                                     <td class="center">{{ $dataJugadores[$x]->cedula }}</p>
                                      @if($usus_equi_uni!=null)
                                        @foreach($usus_equi_uni as $usu_equi_uni)
                                            @if($usu_equi_uni->fk_usuario == $dataJugadores[$x]->cedula)
                                                <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                     <td class="center"> <img src="{{$imageRoute.'/'.$dataJugadores[$x+1]->cedula.'/'.$dataJugadores[$x+1]->foto }}" height="80px" width="80px"></td> </td>
                                    <td class="center">{{ $dataJugadores[$x+1]->primer_nombre ." ". $dataJugadores[$x+1]->primer_apellido }}</td>
                                     <td class="center">{{ $dataJugadores[$x+1]->cedula }}</p>
                                    
                                    @if($usus_equi_uni!=null)
                                        @foreach($usus_equi_uni as $usu_equi_uni)
                                            @if($usu_equi_uni->fk_usuario == $dataJugadores[$x+1]->cedula)
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
