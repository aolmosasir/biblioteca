<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use DB;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Movie::all();
        return response()->json($peliculas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelicula = new Movie;
		$pelicula->title = $request->input('title');
		$pelicula->year = $request->input('year');
		$pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
		$pelicula->save();
        return response()->json( ['error' => false, 'msg' => 'La película ha sido creada correctamente' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Movie::findOrFail($id);
        return $pelicula->toArray();
        /* return response()->json($pelicula); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*     public function edit($id)
    {
        $pelicula = Movie::find($id);
        $pelicula->title = $request->input('title');
		$pelicula->year = $request->input('year');
		$pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
        return response()->json( ['error' => false, 'msg' => 'La película ha sido actualizada' ] );
    } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula = Movie::find($id);
        $pelicula->title = $request->input('title');
		$pelicula->year = $request->input('year');
		$pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
        return response()->json( ['error' => false, 'msg' => 'La película ha sido actualizada' ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Movie::find($id);
        $pelicula->delete();
        $pelicula->save();
        return response()->json( ['error' => false, 'msg' => 'La película ha sido eliminada' ] );
    }

    public function putRent($id) {
        $pelicula = Movie::findOrFail( $id );
        $pelicula->rented = 0;
        $pelicula->save();
        return response()->json( ['error' => false, 'msg' => 'La película se ha marcado como alquilada' ] );
    }

    public function putReturn($id) {
        $pelicula = Movie::findOrFail( $id );
        $pelicula->rented = 1;
        $pelicula->save();
        return response()->json( ['error' => false, 'msg' => 'La película se ha marcado como disponible' ] );
    }
}
