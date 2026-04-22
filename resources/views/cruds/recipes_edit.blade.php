<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  </head>
  <body>
    <div class='container'>
        <h1>Editar receta</h1>

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $recipe->name }}"><br>

            <input type="number" name="proteina" value="{{ $recipe->proteina }}"><br>

            <input type="number" name="carbohidratos" value="{{ $recipe->carbohidratos }}"><br>

            <input type="number" name="verduras" value="{{ $recipe->verduras }}"><br>

            <button type="submit">Actualizar</button>
        </form>

    </div>
  </body>
</html>