<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .text-muted {
            color: rgba(255, 255, 255, 0.7)
        }
    </style>
    <title>Document</title>
</head>

<body>
    <main>
        <div class="div">
            <h2>Director de tesis: {{ $correo->directortesi->nombre }} {{ $correo->directortesi->apellidom }}
                {{ $correo->directortesi->apellidom }} </h2>
            <p>Credenciales para acceder como director de tesis.</p>
            <p>Email: <span class="text-muted">{{ $correo->directortesi->email }}</span> </p>
            <p>Password: <span>{{ $correo->password }}</span></p>
            <p>Ir a : <a href="http://localhost:8000/login">Login</a></p>
        </div>
    </main>

</body>

</html>
