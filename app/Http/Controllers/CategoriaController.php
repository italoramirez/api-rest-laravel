<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;

class CategoriaController extends Controller
{
    public function getCategoria() 
    {
        return response()->json(categoria::all(), 200);
    }

    public function getCategoriaId ( $id )
    { 
        $cat = categoria::find( $id );

        if ( is_null($cat) ) {
            return response()->json([ 'Mensaje' => 'Registro no encontrado'], 404);
        }

        return response()->json($cat::find( $id ), 200 );
    }

    public function insertCategoria (Request $request) 
    {
        $categoria = categoria::create($request->all());
        return response($categoria, 200);
    }

    public function updateCategoria (Request $request , $id) 
    {
        $cat = categoria::find( $id );
        if ( is_null($cat) ) {
            return response()->json([ 'Mensaje' => 'Registro no encontrado'], 404);
        }
        $cat->update( $request->all() );

        return response()->json($cat, 200);
    }

    public function deleteCategoria ( $id ) {
        $cat = categoria::find( $id );
        if ( is_null($cat) ) {
            return response()->json([ 'Mensaje' => 'Registro no encontrado'], 404);
        }
        $cat->delete();
        return response()->json(['Mensaje' => 'Registro Eliminado'], 200);
    }
}
