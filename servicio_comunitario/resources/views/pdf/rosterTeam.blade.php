<div class="col-md-10">
        <div class="row">
            <div class="col-md-6">
                <div class="content-box-large">
                    <div class="panel-heading">
                        @foreach($dataEquipo as $dataEquipo)
                        <div class="panel-title"></div>
                        <p align="center">{{ $dataEquipo->nombre_equipo }}</p>
                    <div class="panel-body">
                        <table class="table">
                            @endforeach
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dataJugadores as $user)
                                <tr>
                                    <td class="center"> <img src="{{$imageRoute.'/'.$user->cedula.'/'.$user->foto }}" height="80px" width="80px"></td> </td>
                                    <td class="center">{{ $user->cedula }}</td>
                                    <td class="center">{{ $user->primer_nombre ." ". $user->primer_apellido }}</td>
                                    @if($usus_equi_uni!=null)
                                        @foreach($usus_equi_uni as $usu_equi_uni)
                                            @if($usu_equi_uni->fk_usuario == $user->cedula)
                                                <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>