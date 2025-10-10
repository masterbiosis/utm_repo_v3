<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    @vite(['resources/css/styles.css'])
    <title>UTM-REPOSITORIO</title>
</head>

<body class="">
    <div class="container-fluid shadow mb-5 rounded">
        <header class="p-3">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-sm-12 col-lg-2 d-flex justify-content-center"">
                    <img src="{{ asset('storage/images/utm_logo.png') }}" style="width: 40%" alt="">
                </div>
                <div class="col-12 col-lg-8 text-center text-lg-start">
                    <span class="p-1 fs-2  fw-bold">Tecnologías de la Informcaión e Innovación Digital</span>
                </div>
                <div class="col-12 col-lg-2 d-flex justify-content-center justify-content-lg-end px-5">
                    @auth
                    @else
                        <a class="btn btn-blue" href="{{ route('login') }}">Iniciar Sesión</a>

                    @endauth
                </div>
            </div>
        </header>
    </div>

    <div class="container-fluid">
        <div class="row px-3">
            <div class="col-12">
                <img class="img-fluid rounded" src="{{ asset('storage/images/utm_banner4.png') }}" alt="">
                <div
                    class="bg-white-50 w-50 h-200 position rounded p-3 fs-2 fw-bold text-center aclonica-regular text-blue">
                    <div class="">REPOSITORIO INSTITUCIONAL</div>
                    <div class="">DE LA</div>
                    <div class="">UNIVERSIDAD TECNOLÓGICA DE MORELIA</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
