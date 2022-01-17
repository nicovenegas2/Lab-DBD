<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
    @include('includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="mb-3">Detalles de cuenta</h4>
                <form action="/users/update/{{$theuser->id}}" method='POST'>
                @method('PUT')
                    <div class="mb-3">
                        <label for="nickname" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" value="{{$theuser->nickname}}">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$theuser->name}}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$theuser->email}}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"value="{{$theuser->password}}">
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="birthday" name="birthday"value="{{$theuser->birthday}}">
                    </div>


                    <div class="mb-3">
                        <label for="id_country" class="form-label">Pais</label>
                        <select class="form-select" aria-label="Seleccione su pais" name="id_country" id="id_country" value="{{$theuser->id_country}}">
                        <?php
                        print "<option value='$theuser->id_country' selected>$thecountry</option>";
                        foreach ($countries as $country) {
                            print "<option value='$country->id'>$country->name</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('includes.footer')
</body>

</html>