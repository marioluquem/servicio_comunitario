<div class="col-md-10">
        <div class="row">
            <div class="col-md-6">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title"></div>
                    <div class="panel-body">
                        <table class="table">
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
                                    <td> <img src="{{$imageRoute.'/'.$user->cedula.'/'.$user->foto }}" height="80px" width="80px"></td> </td>
                                    <td>{{ $user->cedula }}</td>
                                    <td>{{ $user->primer_nombre ." ". $user->primer_apellido }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>