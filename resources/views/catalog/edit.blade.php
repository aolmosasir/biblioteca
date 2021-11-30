@extends('layouts.master')
@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar pelicula
         </div>
         <div class="card-body" style="padding:30px">

            <form action="" method="post">

                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

               <div class="form-group">
               <label for="title">Título</label>
               <input type="text" name="title" id="title" class="form-control" value="{{$pelicula->title}}">
               @if($errors->has('title'))
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
               </div>

               <div class="form-group">
                  <label for="año">Año</label>
               <input type="text" name="year" id="year" class="form-control" value="{{$pelicula->year}}">
               @if($errors->has('year'))
                  <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
               </div>

               <div class="form-group">
                     <label for="director">Director</label>
               <input type="text" name="director" id="director" class="form-control" value="{{$pelicula->director}}">
               @if($errors->has('director'))
                  <span class="text-danger">{{ $errors->first('director') }}</span>
                @endif
               </div>

               <div class="form-group">
                  <label for="poster">Poster</label>
               <input type="text" name="poster" id="poster" class="form-control" value="{{$pelicula->poster}}">
               @if($errors->has('poster'))
                  <span class="text-danger">{{ $errors->first('poster') }}</span>
                @endif
               </div>

               <div class="form-group">
               <label for="synopsis">Resumen</label>
               <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$pelicula->synopsis}}</textarea>
               @if($errors->has('synopsis'))
                  <span class="text-danger">{{ $errors->first('synopsis') }}</span>
                @endif
               </div>

               <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                  Modificar película
               </button>
               </div>

            </form>

            {{-- TODO: Cerrar formulario --}}

         </div>
      </div>
   </div>
</div>
@stop