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
    <?php
        if($choice == "t"){
            $show = "";
            $notshow = "d-none";
        }
        if($choice == ""){
            $show = "d-none";
            $notshow = "";
        }
    ?>
    @include('includes.navbar')
    <div class="container">
        <div class="col mx-2 bg-secondary rounded-3 px-3 pt-2 pb-1 mb-1">
            <h3 class="text-light">{{$thegame->name}}</h3>
        </div>
        <!--  <div class="text-light m-0 p-0" style="height:0.3rem;">.</div> -->
        <div class="row mx-2 mt-0 mb-1">
            <div class="col-9 me-1 ms-0 bg-secondary rounded">
                <div>
                    <h4 class="text-light">
                        Descripción
                    </h4>
                    <p class="text-light fs-6"> {{$thegame->description}}</p>
                </div>
            </div>
            <div class="col ms-0 order-1 bg-secondary rounded">
                <div>
                    <h5 class="text-light">
                        Requisitos
                    </h5>
                    <p class="text-light" style="font-size:0.8rem;">
                        {{$thegame->requirements}}
                    </p>
                </div>
                <div>
                    <h5 class="text-light">
                        Categorias
                    </h5>
                    @foreach($categorias as $category)
                    <a href=""><button type="button" class="border border-1 btn btn-primary m-1 p-1 rounded-pill"
                            style="font-size:0.8rem;">{{$category}}</button></a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- <div class="text-light m-0 p-0" style="height:0.3rem;">.</div> -->
        <div class="row mx-2 mt-0 mb-1">
            <div class="row col-9 me-1 ms-0 bg-secondary rounded py-2 ps-2 pe-0 justify-content-between">
                <div class="col">
                    <a href="">
                        <button type="button" class="border border-1 btn btn-primary m-1 p-1 rounded"
                            style="font-size:1.4rem;">Download
                        </button>
                    </a>
                    <a href="/like/{{$thegame->id}}" class="{{$notshow}}">
                        <i class="fa fa-heart-o fs-3 text-white mx-2" aria-hidden="true"></i>
                    </a>
                    <a href="/like/{{$thegame->id}}" class="{{$show}}">
                        <i class="fa fa-heart fs-3 text-danger mx-2" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-3 pt-2 me-0 pe-0 ">
                    <p class="me-0 pe-0 text-light" style="font-size:1.2em;">Descargas: {{$thegame->sold_units}}</p>
                </div>

            </div>
        </div>
        <div class="row mx-2 mt-0 mb-1">
            <div class="col-9 p-2 me-1 ms-0 bg-secondary rounded">
                <h4 class="text-light">Comentarios</h4>
                <div class="row col gray-600">
                    <form action="/comments/create/{{$thegame->id}}" method='POST'>
                        <input type="text" class="form-control" id="comment" name="comment"
                            placeholder="Agrega un comentario..." value="">
                        <div class="col">
                            <button type="submit" class="border border-1 btn btn-primary m-1 p-1 rounded"
                                    style="font-size:1rem;">Publicar</button>
                        </div>
                    </form>
                </div>
                @foreach($comentarios as $comentario)
                <div class="row col p-1 rounded m-1" style="background-color: #85969C;"">
                    <h5 class=" text-light">{{$comentario[0]}}</h5>
                    <div class="col mx-3 my-1 rounded py-1 px-2" style="background-color: #949BA1;">
                        <p class="text-light" style="font-size:0.9rem;">
                            {{$comentario[1]}}
                        </p>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
        @include('includes.footer')
</body>

</html>