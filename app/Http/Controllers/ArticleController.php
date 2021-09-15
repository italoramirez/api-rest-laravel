<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all(['description', 'price', 'stock']);
        if ( count($article) > 0 ) { 
            return response()->json(
                $article
            );
        } else {
            return response()->json(
                ['Mensaje' => 'No se encontraron Registros']
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->description = $request->description;
        $article->price = $request->price;
        $article->stock = $request->stock;

        $article->save();
        return response()->json([
            'Mensaje' => 'Producto agregado',
            'Articulo' => $article
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $article = Article::findOrFail($request->id);
        $article = new Article();
        $article->description = $request->description;
        $article->price = $request->price;
        $article->stock = $request->stock;

        $article->save();

        // return $article;
        return response()->json([
            'Mensaje' => 'Articulo Actualizado',
            'Articulo' => $article
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $article = Article::destroy($request->id);

        return $article;
    }
}
