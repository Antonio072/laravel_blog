<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
</head>
<body>
    <h1>Ejemplo de una vista</h1>
    <?php
    echo "Ciclo for con php";
    for ($i=0; $i <10 ; $i++) { 
        echo "<br>";
        echo $i;
    }
    ?>

    <h3>Si envio un parametro estara aqui: {{ $param }}</h3>
    <h1>
    @if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif
    </h1>
</body>
</html>