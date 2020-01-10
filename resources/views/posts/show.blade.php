@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="card">
            <div class="card">
            <div class="card-header">
                <h1 class="title">{{$post->title}}</h1>
                <p class="font-weight-light font-italic">Por: {{Auth::user()->name}}</p>
            </div>
            <div class="card-content">
                <p>{{$post->content}}</p>
            </div>
            </div>
        </div>
        </div>
    </div>

@endsection