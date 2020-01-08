@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis posts</h1>

        @if($userPosts)
            <div class="row">
            @foreach($userPosts as $post)
                <div class="col-4 mt-3">
                <div class="card shadow-sm">
                    <h1>{{$post->title}}</h1>
                    <p>{{$post->content}}</p>
                </div>
                </div>
            @endforeach
            </div>
        @endif
    </div>


@endsection