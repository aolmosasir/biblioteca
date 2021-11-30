<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use DB;


class CatalogController extends Controller {

    public function getIndex(){
        $peliculas = Movie::all();
        return view('catalog.index', compact('peliculas'));
    }

    public function getShow($id){
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', compact('pelicula'));
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit($id){
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', compact('pelicula'));
    }

    public function postCreate(Request $request){
        $pelicula = new Movie;
		$pelicula->title = $request->input('title');
		$pelicula->year = $request->input('year');
		$pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');

        //validar
        request()->validate([
            'title' => 'required',
            'year' => 'required',
            'synopsis' => 'required',
            'poster' => 'required',
            'director' => 'required',
        ]);

		$pelicula->save();
        notify()->success('La pelicula ha sido creada correctamente');
        return redirect()->route('catalog');
    }

    public function putEdit(Request $request, $id){
        $pelicula = Movie::find($id);
        $pelicula->title = $request->input('title');
		$pelicula->year = $request->input('year');
		$pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');

        //validar
        request()->validate([
            'title' => 'required',
            'year' => 'required',
            'synopsis' => 'required',
            'poster' => 'required',
            'director' => 'required',
        ]);
        
        $pelicula->save();
        notify()->success('La pelicula ha sido editada correctamente');
        return redirect()->route('show', $pelicula->id);
    }

    public function putRent($id){
        $pelicula = Movie::find($id);
        $pelicula->rented = 0;
        $pelicula->save();
        notify()->success('La pelicula ha sido alquilada');
        return redirect()->route('show', $pelicula->id);
    }

    public function putReturn($id){
        $pelicula = Movie::find($id);
        $pelicula->rented = 1;
        $pelicula->save();
        notify()->success('La pelicula ha sido devuelta');
        return redirect()->route('show', $pelicula->id);
    }

    public function deleteMovie($id){
        $pelicula = Movie::find($id);
        $pelicula->delete();
        $pelicula->save();
        notify()->success('La pelicula ha sido eliminada');
        return redirect()->route('catalog');
    }


}
