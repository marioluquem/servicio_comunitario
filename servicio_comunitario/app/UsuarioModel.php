<?php

namespace servicio_comunitario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class UsuarioModel extends Model implements AuthenticatableContract
{

    use Authenticatable;
    protected $table = "USUARIO";

    protected $fillable = [
            'cedula',
            'usuario',
            'password',
            'primer_nombre',
            'segundo_nombre',
            'primer_apellido',
            'segundo_apellido',
            'correo',
            'fecha_nacimiento',
            'sexo',
            'foto',
            'dni',
            'fk_rol'];

    protected $hidden = [
        'password'
    ];
}
