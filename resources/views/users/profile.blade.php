@extends('layouts.app')

@section('content')
    <div class="container">
        
    
    @if($userProfile)  
    <form action="" method="POST" role="form">
        <div class="row justify-content-between">
            <div class="col-10"><legend>Perfil del usuario</legend></div>
            <div class="col-2"><h3><span class="badge badge-success">Posts creados: {{$userProfile->posts}}</span></h3></div>
        </div>
        
        <div class="form-group">
            <label for="">Nombre:</label>
            <input type="text" class="form-control" value="{{$userProfile->name}}" placeholder="Input field">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" value="{{$userProfile->email}}" placeholder="Input field">
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    @endif
    
    </div>
@endsection