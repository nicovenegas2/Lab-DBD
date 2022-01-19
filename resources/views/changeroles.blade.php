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
    setcookie("session","Zapatillas a luca hrmn");
    ?>
    @include('includes.navbar')
    <div class="container">
        <div class="row">
            <div class="row">
                <h4 class="mb-3 text-center">Cambio de Rol</h4>
            </div>
            <div class="col d-flex justify-content-center">
                <a href="/roles/setroles/user">
                    <button type="button" class="btn btn-primary btn-lg mx-1">User</button>
                </a>
                @foreach ($roles as $role)
                <a href="/roles/setroles/{{$role->name}}">
                    <button type="button" class="btn btn-primary btn-lg mx-1">{{$role->name}}</button>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @include('includes.footer')
</body>

</html>