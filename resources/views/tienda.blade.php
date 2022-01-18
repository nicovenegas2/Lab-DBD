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
            <div class="d-flex justify-content-between">
                <h4 class="col-1">Juegos</h4>
                <h4 class="col-1">Precio</h4>
            </div>
            <div class="row text-center mb-4">
                <ol class="list-group list-group-numbered">
                    @for ($i = 0; $i < $games->count() ; $i++)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="d-flex justify-content-start"><a href='/games/{{$games[$i]->id}}'>
                                        {{$games[$i]->name}}</a></div>
                                <div class="row p-2">
                                    @foreach ($categorias[$games->count()-$i-1] as $thecategory)
                                    <a href="" class="col mx-0 px-0"><button type="button"
                                            class="border border-1 btn btn-primary m-1 p-1 rounded-pill"
                                            style="font-size:0.8rem;">{{$thecategory->kind}}</button></a>
                                    @endforeach
                                </div>
                            </div>
                            <span class="badge rounded-pill m-4"
                                style="background-color:#003153; font-size: 1rem;">{{$precios_reverse[($games->count()-$i-1)]}}</span>
                        </li>
                        @endfor
                </ol>
            </div>
        </div>
    </section>
    @include('includes.footer')
</body>

</html>