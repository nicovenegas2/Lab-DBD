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
                    <h4 class="mb-3">Modificar el curso</h4>
                    <form action="{{action('CourseController@update', $course->id)}}" method='POST'>
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del curso</label>
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="{{$course->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">URL de la imagen del curso</label>
                            <input type="text" class="form-control" id="image" name="image" value="" placeholder="{{$course->image}}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="description" name="description" value="" placeholder="{{$course->description}}">
                        </div>
                        <div class="mb-3">
                        <label for="description" class="form-label">Identificador de asignatura</label>
                        <select class="form-select mb-4" aria-label="Seleccione una asignatura asociada:" name="id_subject" id="id_subject">
                            @foreach ($subjects as $subject)
                                @if($subject->id == $course->id_subject)
                                <option value="{{$subject->id}}" selected>{{$subject->name}}</option>
                                @else
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary mb-5">Enviar</button>
                        </div>
                    </form>
                    <form action="{{action('CourseController@destroy', $course->id)}}" method='POST'>
                        @method('DELETE')
                        <input type="text"class="form-control" id="id" name="id" value="{{$course->id}}" hidden>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-danger">Borrar curso</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </section>
    @include('includes.footer')
</body>

</html>