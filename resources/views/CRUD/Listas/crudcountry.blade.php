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
    <div class="container-sm" style="width:40rem;">
        <!-- Opciones -->
        <div class="position-absolute mt-5 top-40 start-0">
            <div class="row col-5 ms-3 p-2 border rounded-top">
                <h6 class="mb-0">Opciones</h6>
            </div>
            <div class="row col-5 ms-3 p-2 border rounded">
                <button type="button" style="width:8rem;" data-bs-toggle="modal" data-bs-target="#agregarcontenido"
                    class="mb-2 btn btn-dark">Agregar</button>
                <button type="submit" onclick="enviar_formulario()" style="width:8rem;" class="btn btn-dark">Guardar
                    Cambios</button>
            </div>
        </div>


        <!-- aqui empiezan los paises  -->
        <div class="d-flex justify-content-between row">
            <div class="d-flex justify-content-between col" style="width:30rem;">
                <h4 class="col-1">País</h4>
            </div>
            <div class="col-5 my-0 ps-5 me-5">
                <h4>Moneda</h4>
            </div>
        </div>
        <div class="row text-center mb-4">
            <form id="form" action="/CRUD/countries/update" method="POST">
                @method('PUT')
                <ol id="lista" class="list-group list-group-numbered">
                    @for ($i = 0; $i < $paises->count() ; $i++)
                        <li class="list-group-item d-flex">
                            <div class="d-flex justify-content-between col me-1" style="width:30rem;">
                                <input type="hidden" class="d-none" id="modificados{{$paises[$i]->id}}" value=""
                                    name="modificados[]" autocomplete="off">
                                <input type="hidden" id="inputname{{$paises[$i]->id}}" value="{{$paises[$i]->name}}"
                                    name="name[]" autocomplete="off">
                                <h6 class="text-rigth mt-1 ms-1 mb-0 me-1" id="parraname{{$paises[$i]->id}}">
                                    {{$paises[$i]->name}}</h6>
                            </div>
                            <div class="col-1 my-0 me-3">
                                <input type="hidden" id="inputcoin{{$paises[$i]->id}}" value="{{$paises[$i]->coin}}"
                                    name="coin[]" autocomplete="off">
                                <h6 class="text-rigth mt-1 ms-1 mb-0" id="parracoin{{$paises[$i]->id}}">
                                    {{$paises[$i]->coin}}</h6>
                            </div>
                            <div class="col-1 my-0 ms-1 me-3">
                                <button type="button" class="btn btn-sm btn-light pe-0 me-0 border pe-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal{{strval($paises[$i]->id)}}">Modificar</button>
                            </div>
                            <div class="col-1 my-0 ms-3 me-4">
                                <input type="checkbox" class="btn-check" name="toerase[]" value="{{$paises[$i]->id}}"
                                    id="{{$paises[$i]->id}}" autocomplete="off">
                                <label class="btn btn-outline-danger pe-0 me-1 ms-1 pe-2"
                                    for="{{$paises[$i]->id}}">Eliminar</label><br>
                                </button>
                            </div>
                        </li>
                        <!-- ventana modal -->
                        <div class="modal fade" id="modal{{strval($paises[$i]->id)}}" tabindex="-1"
                            aria-labelledby="{{strval($paises[$i]->name)}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="{{strval($paises[$i]->name)}}Label">Cambio de
                                            Atributos - País</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text mb-2"
                                                id="namecountry{{$paises[$i]->id}}">Nombre
                                                País</span>
                                            <input id="modalinputname{{$paises[$i]->id}}" type="text"
                                                class="form-control mb-2" placeholder="Nombre País"
                                                aria-label="namecountry{{$paises[$i]->id}}"
                                                aria-describedby="namecountry{{$paises[$i]->id}}"
                                                value="{{$paises[$i]->name}}">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"
                                                    id="coincountry{{$paises[$i]->id}}">Siglas
                                                    Moneda</span>
                                                <input id="modalinputcoin{{$paises[$i]->id}}" type="text"
                                                    class="form-control" placeholder="coincountry"
                                                    aria-label="coincountry{{$paises[$i]->id}}"
                                                    aria-describedby="coincountry{{$paises[$i]->id}}"
                                                    value="{{$paises[$i]->coin}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                            onclick="cambiarcontenido({{$paises[$i]->id}})">Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor

                </ol>
            </form>
        </div>
        <!-- Ventana modal para agregar nueva tupla -->
        <div class="modal fade" id="agregarcontenido" tabindex="-1" aria-labelledby="agregarcontenidoLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarcontenidoLabel">Agregar nuevo contenido</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text mb-2" id="namecountrynew">Nombre
                                País</span>
                            <input id="modalinputnamenew" type="text" class="form-control mb-2"
                                placeholder="Nombre País" aria-label="namecountrynew" aria-describedby="namecountrynew"
                                value="">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="coincountrynew">Siglas
                                    Moneda</span>
                                <input id="modalinputcoinnew" type="text" class="form-control"
                                    placeholder="Moneda del pais" aria-label="coincountrynew"
                                    aria-describedby="coincountrynew" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            onclick="agregarcontenido({{$i++}})">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
    <script type="text/javascript">
    function cambiarcontenido(id) {
        document.getElementById("modificados" + id).value = id;
        document.getElementById("inputname" + id).value = document.getElementById("modalinputname" + id).value;
        document.getElementById("parraname" + id).innerHTML = document.getElementById("modalinputname" + id).value;
        document.getElementById("inputcoin" + id).value = document.getElementById("modalinputcoin" + id).value;
        document.getElementById("parracoin" + id).innerHTML = document.getElementById("modalinputcoin" + id).value;
    };

    function agregarcontenido(i) {
        i = i + 1;
        document.getElementById("lista").innerHTML = document.getElementById("lista").innerHTML + `
        <li class="list-group-item d-flex">
                        <div class="d-flex justify-content-between col me-1" style="width:15rem;">
                            <input type="hidden" id="inputname${i}" value="${document.getElementById("modalinputnamenew").value}"
                                name="newcoin[]">
                            <h6 class="text-rigth mt-1 ms-1 mb-0 me-1" id="parraname${i} ">
                                ${document.getElementById("modalinputnamenew").value}</h6>

                        </div>
                        <div class="col-1 my-0 me-3">
                            <input type="hidden" id="inputcoin${i}" value="${document.getElementById("modalinputnamenew").value}"
                                name="newname[]">
                            <h6 class="text-rigth mt-1 ms-1 mb-0" id="parracoin${i}">
                                ${document.getElementById("modalinputcoinnew").value}</h6>
                        </div>
                        <div class="col-1 my-0 ms-1 me-3">
                            <button type="button" class="btn btn-sm btn-light pe-0 me-0" data-bs-toggle="modal"
                                data-bs-target="#${document.getElementById("modalinputnamenew").value}">Modificar</button>
                        </div>
                        <div class="col-1 my-0 ms-3 me-4">
                            <input type="checkbox" class="btn-check" name="toerase[]"
                                value="${i}" id="${i}" autocomplete="off">
                            <label class="btn btn-outline-danger pe-0 me-1 ms-1 pe-2"
                                for="${i}">Eliminar</label><br>
                            </button>
                        </div>
                    </li>
                    <!-- ventana modal -->
                    <div class="modal fade" id="${document.getElementById("modalinputnamenew").value}" tabindex="-1"
                        aria-labelledby="${document.getElementById("modalinputnamenew").value}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="${document.getElementById("modalinputnamenew").value}Label">Cambio de
                                        Atributos - País</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text mb-2" id="namecountry${i}">Nombre
                                            País</span>
                                        <input id="modalinputname${i}" type="text"
                                            class="form-control mb-2" placeholder="Nombre País"
                                            aria-label="namecountry${i}"
                                            aria-describedby="namecountry${i}"
                                            value="${document.getElementById("modalinputnamenew").value}">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="coincountry${i}">Siglas
                                                Moneda</span>
                                            <input id="modalinputcoin${i}" type="text"
                                                class="form-control" placeholder="coincountry"
                                                aria-label="coincountry${i}"
                                                aria-describedby="coincountry${i}"
                                                value="${document.getElementById("modalinputcoinnew").value}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                        onclick="cambiarcontenido(${i})">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
        `;
        document.getElementById("modalinputnamenew").value = "";
        document.getElementById("modalinputcoinnew").value = "";
        console.log(i);
    };

    function enviar_formulario() {
        document.getElementById("form").submit()
    }
    </script>
</body>

</html>