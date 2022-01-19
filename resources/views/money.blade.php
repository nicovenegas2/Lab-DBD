<?php
    try {
        $nickname = $_COOKIE["usuario"];
        $money = "".$_COOKIE["money"];
        $show = "";
        $notshow = "d-none";
        print  "";
    } catch (Exception $e){
        $money = "";
        $show = "d-none";
        $notshow = "";
        $nickname = "Lab-DBD";
    }
    ?>
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
    @include("includes.navbar")
    <div class="pe-1 m-1">
        <p class="text-center fs-2">Recargar</p>
    </div>
    <div class="w-10 pe-0 m-4 bg-primary text-white {{$show}} rounded">
        <p class="text-center fs-1">Saldo actual: {{$money}}</p>
    </div>

    <div class="container {{$show}}">
        <form action="/users/register" method='POST'>
            <div class="row align-items-start">
                @method('PUT')
                <div class="col ms-4">
                    <p class="m-4 fs-5">1. Medio de pago:</p>
                    <p class="m-4 fs-6">Tus tarjetas:</p>
                    <div class="m-4 form-check">
                        <input class="form-check-input" type="radio" name="tarjeta" id="tarjeta">
                        <label class="form-check-label shadow p-3 ms-3 bg-body rounded border" for="flexRadioDefault1">
                            Tarjeta 1 **1234 10/2030
                            <!-- tarjetas del usuario -->
                        </label>
                    </div>
                    <button type="button" class="btn btn-secondary ms-4">Agregar Tarjeta
                    </button>
                </div>
                <div class="col ms-4">
                    <p class="m-4 fs-5">2. Monto a cargar:</p>
                    <p class="m-4 fs-6">Ingresar monto:</p>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="number" id="monto" name="monto" class="form-control" aria-label="Amount (to the nearest dollar)">
                    </div>
                </div>
                <div class="col ms-4">
                    <p class="m-4 fs-5">3. Finalizar:</p>
                    <button type="submit" class="btn btn-secondary mt-4 mb-4 ms-5 me-4 btn-lg">Pagar
                    </button>
                </div>
            </div>
        </form>
    </div>
    @include("includes.footer")
</body>

</html>