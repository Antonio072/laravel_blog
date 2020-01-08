@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Post del usuario</h1>

        @foreach($userPosts as $post)
            <div>
                {{$post}}
            </div>
        @endforeach
    </div>


@endsection