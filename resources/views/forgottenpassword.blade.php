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
    setcookie("session","Zapatillas a luca hrmn");
    ?>
    @include('includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="mb-3">Recuperación de contraseña</h4>
                <form action="/users/forgottenpassword" method='GET'>
                    <div class="mb-3">
                        <label for="nickname" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" value="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" id="email" name="email"value="">
                    </div>
                    <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>