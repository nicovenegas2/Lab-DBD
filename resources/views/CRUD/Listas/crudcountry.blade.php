<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <!-- Fontawesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>

    @include('includes.navbar')
    <section class="mt-5">
        <div class="container ">
            <!-- aqui empiezan los paises  -->
            <div class="d-flex justify-content-between">
                <h4 class="col-1">País</h4>
                <h4 class="col-1">Moneda</h4>

            </div>
            <div class="row text-center mb-4">
                <ol class="list-group list-group-numbered">
                    @for ($i = 0; $i < $paises->count() ; $i++)
                        <li class="list-group-item d-flex">
                            <div class="d-flex justify-content-between col">
                                <h6 class="text-left mt-1 ms-2 mb-0">
                                    <a class="badge bg-light text-dark" style="text-decoration:none" href='/paises/show/{{$paises[$i]->id}}'>
                                        {{$paises[$i]->name}}</a>
                                </h6>
                                <h6 class="text-righ">
                                    <a class="badge bg-dark" style="text-decoration:none" href='/paises/show/{{$paises[$i]->id}}'>
                                        {{$paises[$i]->coin}}</a>
                                </h6>
                            </div>
                        </li>
                        @endfor
                </ol>
            </div>
        </div>
    </section>
    @include('includes.footer')
</body>

</html>