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
    include('includes/navbar.blade.php')
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="mb-3">Inicio de Sesion</h4>
                <form action="/users/loguser" method='GET'>
                    <div class="mb-3">
                        <label for="nickname" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"value="">
                    </div>
                    <div class="mb-3">
                        <label for="id_role" class="form-label">Tipo de rol</label>
                        <select class="form-select" aria-label="Seleccione un tipo de Rol" name="id_role" id="id_role">
                        <?php
                        foreach ($roles as $role) {
                            print "<option value='$role->id'>$role->name</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="ms-3 link-secondary" href="">Olvidaste tu contraseña?<a>
                        <a class="ms-3 link-secondary" href="">Registrate YA!<a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>