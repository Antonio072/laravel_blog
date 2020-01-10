@extends('layouts.app')

@section('content')
    <div class="container">
    <form class="form" action="{{route('api.posts.update',$post->id)}}" method="POST" role="form">
        <legend>Editar post {{$post->id}}</legend>

        <div class="form-group">
            @if($post->title)
            <label for="">Titulo</label>
            <input type="text" class="form-control" name="title" id="" placeholder="Titulo del post" value="{{$post->title}}">
            @endif
            @if($post->content)
            <label for="">Contenido</label>
            <input type="text" class="form-control" name="content" id="" placeholder="Contenido del post" value="{{$post->content}}">
                @if($post->id)
                    <input type="hidden" class="form-control" name="user_id" value="{{$post->id}}">
                    
                @endif
            {{ method_field('PUT') }}
            @endif
        </div>
       <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
    </div>
@endsection