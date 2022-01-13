<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    setcookie("session","0");
    ?>
    @include('includes.navbar')
    <section class="mt-5">
        <div class="container ">
                <h4 class="position-relative top-50">Tendencias</h4>
            <div class="row text-center mb-4">
                <?php
                foreach ($games as $game){
                $subdescription = substr($game->description, 0, 150)." . . .";
                print "<div class='col-3 justify-content-center my-3'>
                    <div class='card' style='width: 17rem;height: 18rem;'>
                        <div class='card-body pb-1'>
                            <h5 class='card-title'>$game->name</h5>
                            <p class='card-text' style='font-size: 1rem;'>$subdescription</p>
                            <div class='row justify-content-md-center my-2 mr-2'>
                                <a href='#' class='btn btn-secondary col-5 pt-2 ms-3 mb-3 position-absolute bottom-0 start-0'>Comprar</a>
                                <p class='card-text col-5 me-3 mb-3 position-absolute bottom-0 end-0'>Vendidos: $game->sold_units</p>
                            </div>
                        </div>
                    </div>
                </div>";}
                ?>
            </div>
        </div>
    </section>
</body>

</html>