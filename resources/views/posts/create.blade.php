<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <title>Crear un post</title>
</head>
<body>
    <div class="container">
        @if($errors->any())
            {{$errors->first}}
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

        @endif
    <form action="{{route('api.posts.create')}}" method="POST" role="form">
        <legend>Nuevo post</legend>
    
        <div class="form-group">
            <label for="">Titulo</label>
            <input type="text" class="form-control" name="title" id="" placeholder="Titulo del post" >
            <label for="">Contenido</label>
            <input type="text" class="form-control" name="content" id="" placeholder="Contenido del post" >
            <input type="hidden" class="form-control" name="user_id" value="1">
        </div>
    
        <button type="submit" class="btn btn-success">Crear</button>
    </form>
    </div>
</body>
</html>