<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Home</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
         html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 300;
                height: 100vh;
                margin: 0;
            }
        .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
        }
        
        .links > a {
                color: #636b6f;
                padding: 10px 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        h1 {margin: auto; width: 50%; border: 3px solid green;padding: 10px;}
        </style>
</head>
<body >
    <div class="links flex-center">
        <a href="{{ route('home') }}" ">Laravel Home</a>
       <a href="{{ route('admin-home') }}" ">Admin Home</a>
        <a href="{{ route('admin-products') }}">Products</a>
        <a href="{{ route('admin-profile') }}">Profile</a>
        <a href="{{ route('admin-users') }}">Users</a>
    </div>
    
    <h1>
    Admin - Home
    </h1>

    
</body>
</html>