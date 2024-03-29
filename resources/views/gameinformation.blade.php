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
                <h4 class="mb-3">Detalles del juego</h4>
                <form action="/games/update/{{$games->id}}" method='POST'>
                @method('PUT')
                <div class="mb-3">
                        <label for="name" class="form-label">Nombre de juego</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$games->name}}">
                    </div>

                    <div class="mb-3">
                        <label for="age_restriction" class="form-label">Restricción de edad</label>
                        <input type="text" class="form-control" id="age_restriction" name="age_restriction" value="{{$games->age_restriction}}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{$games->description}}">
                    </div>

                    <div class="mb-3">
                        <label for="requirements" class="form-label">Requerimientos</label>
                        <input type="text" class="form-control" id="requirements" name="requirements" value="{{$games->requirements}}">
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link de descarga</label>
                        <input type="text" class="form-control" id="link" name="link"value="{{$games->link}}">
                    </div>

                    <div class="mb-3">
                        <label for="demo" class="form-label">Link demo</label>
                        <input type="text" class="form-control" id="demo" name="demo"value="{{$games->demo}}">
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