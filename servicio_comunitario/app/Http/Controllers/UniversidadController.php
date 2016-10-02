<?php

namespace servicio_comunitario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use League\Flysystem\Exception;
use servicio_comunitario\Http\Requests;

class UniversidadController extends Controller
{

    function generarCodigoUniversidad($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++)
            $key .= $pattern{rand(0,$max)};
        return $key;
    }

    public function crearUniversidad(Request $request){

        //Obtiene el nombre de los archivos (imágenes)
        $archivoFoto = $request->file('foto');
        $nombre_foto = $archivoFoto->getClientOriginalName();
        $key =  $request['acronimo']."/". $nombre_foto;

        //Guardamos las imágenes en disco local
        \Storage::disk('images')->put($key,file_get_contents($archivoFoto));

        //Verifica si la universidad existe en la BD
        $existeUniversidad = DB::table('UNIVERSIDAD')->select('*')->where('acronimo', $request['acronimo'])->first();

        $codigoUniversidad = $this->generarCodigoUniversidad(10);

        if ($existeUniversidad != null){
            Session::flash('message-error', 'La universidad ya está registrada en el Sistema');
            return Redirect::to('createUniversity');
        }
        else{
            DB::table('UNIVERSIDAD')->insertGetId([
                    'nombre_universidad' => $request->nombre,
                    'acronimo' => $request->acronimo,
                    'codigo_inscripcion' => $codigoUniversidad,
                    'direccion_universidad' => $request->direccion,
                    'rif_universidad' => $request->rif,
                    'imagen_universidad' => $nombre_foto
            ]);
            Session::flash('message', 'Universidad creada exitosamente.');
            return Redirect::to('createUniversity');
        }

    }


    public function actualizarUniversidad(Request $request){

        try{
            DB::table('UNIVERSIDAD')
                ->where('acronimo', '=', $request->acronimo)
                ->update([
                    'nombre_universidad' => $request->nombre,
                    'acronimo' => $request->acronimo,
                    'codigo_inscripcion' => $request->codigo_inscripcion,
                    'direccion_universidad' => $request->direccion,
                    'rif_universidad' => $request->rif
                ]);
            Session::flash('message', 'Se actualizó correctamente.');
        }catch (Exception $e){
            Session::flash('message-error', 'No se pudo actualizar.');
        }
        return Redirect::to('manageUniversities');
    }


    public function eliminarUniversidad($id){
        try{
            DB::table('UNIVERSIDAD')->where('id', '=', $id)->delete();
            Session::flash('message', 'Universidad eliminada satisfactoriamente');
        }catch (Exception $e){
            Session::flash('message-error', 'No se pudo eliminar la universidad');
        }
        return Redirect::to('manageUniversities');
    }



}
