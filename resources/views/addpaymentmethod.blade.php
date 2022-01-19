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
    <div class="container {{$show}}">
        <form action="/money" method=''>
            <div class="row align-items-start">
                <label for="paymentmethod" class="form-label">Metodo de pago</label>
                <div class="input-group mb-3">
                    <select class="form-select" aria-label="Seleccione su metodo de pago" name="paymentmethod"
                        id="paymentmethod">
                        print "<option value=''>Visa</option>"
                        print "<option value=''>MasterCard</option>"
                        <!-- Metodos de pago por agregar -->
                    </select>
                </div>

                <div class="row input-group mb-3">
                    <label for="cardnumber" class="col-6 col-sm-4">Número de la tarjeta</label>
                    <label for="csc" class="col-6 col-sm-4">CSC (Número de seguridad)</label>
                    <label for="expire" class="col-6 col-sm-4">Expira</label>
                </div>
                <div class="row input-group mb-3">
                    <div class="col-6 col-sm-4">
                        <input type="tel" class="form-control" id="cardnumber" name="cardnumber"
                            placeholder="0000-0000-0000-0000" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}">
                    </div>

                    <div class="col-6 col-sm-4">
                        <input type="tel" class="form-control" id="csc" name="csc" placeholder="123" pattern="[0-9]{3}">
                    </div>

                    <div class="col-6 col-sm-4">
                        <input type="month" class="form-control" id="expire" name="expire">
                    </div>
                </div>

                <label for="name" class="form-label">Nombre del titular de la tarjeta</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <label for="mail" class="form-label">Mail personal</label>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="mail" name="mail" placeholder=123@ejemplo.com>
                </div>
                <div class="row input-group mb-3">
                    <div class="col-6 col-sm-4">
                        <a href="/money">
                            <button type="button" class="btn btn-secondary">Cancelar
                            </button>
                        </a>
                    </div>

                    <div class="col-6 col-sm-4">
                        <button type="submit" class="btn btn-secondary">Agregar
                            <!-- Agrega el metodo de pago y vueleve a /money -->
                        </button>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
    @include("includes.footer")
</body>

</html>