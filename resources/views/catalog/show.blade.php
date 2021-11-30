@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-4">
        <img src="{{$pelicula->poster}}" style="height:470px"/>
    </div>
    <div class="col-sm-8">
        <h2 style="min-height:45px;margin:5px 0 10px 0">{{$pelicula->title}}</h4>
        <h4 style="min-height:45px;margin:5px 0 10px 0">Año: {{$pelicula->year}}</h4>
        <h4 style="min-height:45px;margin:5px 0 10px 0">Director: {{$pelicula->director}}</h4>
        <h4 style="min-height:45px;margin:5px 0 10px 0">Estado: {{$pelicula->synopsis}}</h4>
            <?php if($pelicula->rented == 1) : ?>
                <h4 style="color:green;min-height:45px;margin:5px 0 10px 0">Pelicula disponible</h4>
                <form action="{{action('App\Http\Controllers\CatalogController@putRent', $pelicula->id)}}" method="POST" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-success" style="display:inline">Alquilar película</button>
            </form>
            <?php  else: ?>
                <form action="{{action('App\Http\Controllers\CatalogController@putReturn', $pelicula->id)}}" method="POST" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" style="display:inline">Devolver película</button>
                </form>
            <?php endif?>
        </h4>
        <button type="button" class="btn btn-warning"><a href="{{ url('/catalog/edit/' . $pelicula->id)}}">Editar pelicula</button>
        <button type="button" class="btn btn-info"><a href="{{ url('/catalog')}}">Volver al listado de peliculas</button>
        
        
    </div>
</div>
@stop