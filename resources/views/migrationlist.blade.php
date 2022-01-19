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
    <div class="container">
        <h4>Tablas</h4>
        <div class="row">
            @for($i=0;$i<$listaModels->count();$i++)
                <a href="/CRUD/showlist/{{$listaModels[$i]}}" class="list-group-item list-group-item-action flex-row">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-1">{{$listaModels[$i]}}</h6>
                        <div class="col-1 border-start my-0">
                        <h6 class="my-1 text-center">{{$listaCantidades[$i]}}</h6>
                        </div>
                    </div>
                    
                </a>
                @endfor
        </div>
    </div>
</body>

</html>