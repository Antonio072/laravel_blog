<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
    <title>Editar un comentario</title>
</head>
<body>
    <div class="container">

    <form class="form" action="{{route('api.comments.update',$comment->id)}}" method="POST" role="form">
        <legend>Editar comentario {{$comment->id}} en la publicacion <b>"{{$comment->title}}"</b> de <i>{{$comment->name}}</i></legend>

        <div class="form-group">
            @if($comment->content)
            <label for="">Contenido</label>
            <input type="text" class="form-control" name="content" id="" placeholder="Contenido del comment" value="{{$comment->content}}">
                @if($comment->id)
                    <input type="hidden" class="form-control" name="user_id" value="{{$comment->id}}">
                    
                @endif
            {{ method_field('PUT') }}
            @endif
        </div>
       <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
    <form action="{{route('api.comments.delete',$comment->id)}}" method="POST" role="form">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    {{ method_field('DELETE') }}
                </form>
    </div>
</body>
</html>