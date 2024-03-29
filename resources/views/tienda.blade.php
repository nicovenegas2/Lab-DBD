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

<body">
    <?php
    $isChecked = "checked"; 
    ?>

    @include('includes.navbar')
    <section class="mt-5">
        <div class="container ">

            <!--  barra filtrado -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded my-3 py-2">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Filtrar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Generos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <!-- inicio menu drop -->
                                    @foreach ($kinds as $k)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input " name="categoriasF[]" type="checkbox"
                                            id="{{$k->id}}" value="{{$k->kind}}" onclick="filter18()">
                                        <label class="form-check-label" for="{{$k->id}}">{{$k->kind}}</label>
                                    </div>
                                    @endforeach
                                    <!--  -->
                                </ul>
                            </li>
                            <li class="nav-item">
                                <div class="form-check form-switch align-bottom mt-2">
                                    <input class="form-check-input" type="checkbox" id="check18" onclick="filter18()">
                                    <label class="form-check-label text-light align-bottom"
                                        for="check18">Habilitar contenido +18</label>
                                </div>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                id="inputSGame" onkeyup="filter18()">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- aqui empiezan los juegos  -->
            <div class="d-flex justify-content-between">
                <h4 class="col-1 flex-grow-1">Juegos</h4>
                <h4 class="col-1 my-3" onclick="alertEdad()">Precio</h4>
                <h4 class="col-1">Restricción de edad</h4>

            </div>
            <div class="row text-center mb-4">
                <ol class="list-group list-group-numbered" id="listGames">
                    @for ($i = 0; $i < $games->count() ; $i++)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="d-flex justify-content-start fs-3"><a class="text-decoration-none"
                                        href='/games/show/{{$games[$i]->id}}' name="gameName">
                                        {{$games[$i]->name}}</a></div>
                                <div class="row p-2">
                                    @foreach ($categorias[$games->count()-$i-1] as $thecategory)
                                    <a href="" class="col mx-0 px-0"><button type="button"
                                            class="border border-1 btn btn-primary m-1 px-2 py-1 rounded-pill"
                                            style="font-size:0.8rem;">{{$thecategory->kind}}</button></a>
                                    @endforeach
                                </div>
                            </div>
                            <span class="badge rounded-pill m-4"
                                style="background-color:#003153; font-size: 1rem;">{{$precios_reverse[($games->count()-$i-1)]}}</span>
                            <span class="badge rounded-pill m-4"
                                style="background-color:#E51313; font-size: 1rem;">{{$games[$i]->age_restriction}}</span>
                        </li>
                        @endfor
                </ol>
            </div>
        </div>
    </section>
    @include('includes.footer')

    <script>
    function filterText(li) {
        var input = document.getElementById("inputSGame");
        var listos = [];
        var a, i, txtValue;
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(input.value.toUpperCase()) > -1) {
                li[i].style.setProperty("display", "flex", "important");
                listos.push(li[i]);
            } else {
                li[i].style.setProperty("display", "none", "important");
            }
        }
        filterCheck(listos, 0);
    }

    function filterCheck(li, it) {
        var categorias = document.getElementsByName("categoriasF[]");
        if (categorias.length == it) {
            for (var i = 0; i < li.length; i++) {
                li[i].style.setProperty("display", "flex", "important");
            }
            return;
        }
        var listos = [];
        for (i = 0; i < li.length; i++) {
            var a = li[i].getElementsByTagName("a")[0];
            var txtValue = a.textContent || a.innerText;
            var catGame = li[i].getElementsByTagName("a");
            for (j = 1; j < catGame.length; j++) {
                var cat = catGame[j].textContent || catGame[j].innerText;
                if (categorias[it].value == cat) {
                    // li[i].style.setProperty("display", "flex", "important");
                    listos.push(li[i]);
                } else {
                    li[i].style.setProperty("display", "none", "important");
                }
            }
        }
        if (categorias[it].checked) {
            filterCheck(listos, it + 1);
        } else {
            filterCheck(li, it + 1);
        }


    }

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }


    function alertEdad() {
        var edad = getCookie("edad");
        alert(edad);
    }

    function filter18() {
        var edad = getCookie("edad");
        var ol = document.getElementById("listGames");
        var li = ol.getElementsByTagName("li");
        var checkEdad = document.getElementById("check18");
        var listos = [];
        var a, i, txtValue;
        edad = parseInt(edad);
        console.log(edad >= 18 && checkEdad.checked);
        if (edad >= 18 && checkEdad.checked) {
            return filterText(li);
        }
        else if (edad >= 18 && !checkEdad.checked) {
            edad = 17;
        }

        if (edad < 18 && checkEdad.checked){
            alert("No puedes ver contenido +18");
            checkEdad.checked = false;
        }
        for (i=0; i < li.length; i++) {
            a = li[i].getElementsByTagName("span")[1];
            a = parseInt(a.textContent);
            if(a <= edad) {
                li[i].style.setProperty("display", "flex", "important");
                listos.push(li[i]);
            }else{
                li[i].style.setProperty("display", "none", "important");
            }
        }
        return filterText(listos);

    }
    document.addEventListener("DOMContentLoaded", function() {
        filter18();
    });
    </script>


</body>

</html>