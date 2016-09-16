@extends('layouts.main')

@section('includesHead')
   {!!Html::style('css/bootstrap.min.css')!!}
   {!!Html::style('css/style.css')!!}
@stop

@section('content')
    <fieldset>
        <legend>Inicio de Sesión</legend>
        {!!Form::open(['route'=>'usuario.store','method'=>'post'])!!}
           <div class="Form-group">
               {!!Form::label('usuario: ')!!} 
               {!!Form::text('user',null,['class'=>'form-control', 'placeholder'=>'ingresa el usuario'])!!}
               
               {!!Form::label('password: ')!!} 
               {!!Form::password('password',['class'=>'form-control','placeholder'=>'ingresa el password'])!!}
               
               {!!Form::submit('iniciar sesion', ['class'=>'btn btn-default'])!!}  
            </div>
        {!!Form::close()!!}
    </fieldset>
@stop