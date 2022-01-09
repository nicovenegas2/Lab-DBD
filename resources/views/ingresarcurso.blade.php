<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importación de boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    @include('includes.navbar')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="mb-3">Ingresa un nuevo curso</h4>
                    <form action="{{action('CourseController@store')}}" method='POST'>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del curso</label>
                            <input type="text" class="form-control" id="name" name="name" value="">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">URL de la imagen del curso</label>
                            <input type="text" class="form-control" id="image" name="image" value="">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="description" name="description" value="">
                        </div>
                        <div class="mb-3">
                        <label for="description" class="form-label">Identificador de asignatura</label>
                        <select class="form-select mb-4" aria-label="Seleccione una asignatura asociada:" name="id_subject" id="id_subject">
                            @foreach ($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('includes.footer')
</body>

</html>