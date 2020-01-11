@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis posts</h1>

        @if($userPosts)
            <div class="row">
            @foreach($userPosts as $post)
                <div class="col-6 mt-4">
                <div class="card shadow-sm">
                        <h1 class="card-title">{{$post->title}}</h1>
                    
                    <div class="card-content">
                        <p>{{$post->content}}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-end">
                        
                        <a class="mr-2" href="{{ route('posts.show' , $post->id ) }}">
                        <button type="button" class="btn btn-success">Ver</button>
                        </a>
                        <a class="mr-2" href="{{ route('posts.edit' , $post->id ) }}">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <form class="mr-2" action="{{route('api.posts.delete',$post->id)}}" method="POST" role="form">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        {{ method_field('DELETE') }}
                        </form>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
            </div>
        @endif
    </div>


@endsection