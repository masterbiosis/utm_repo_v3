<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .text-muted{
            color: rgba(255, 255, 255, 0.7)
        }
    </style>
    <title>Document</title>
</head>
<body>
    <main>
        <div class="div">
            <h2>Alumno: {{$correo->alumno->nombre}} {{$correo->alumno->apellidom}} {{$correo->alumno->apellidom}} </h2>
            <p>Credenciales para acceder a la plataforma y subir la tesis/tesina.</p>
            <p>Email: <span class="text-muted">{{$correo->alumno->email}}</span> </p>
            <p>Password: <span>{{$correo->password}}</span></p>
            <p>Verificar correo: </p>
        </div>
    </main>

</body>
</html>





