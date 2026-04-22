<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  </head>
  <body>
    <div class='container'>
        <!--seccion de crecion-->
        <div>
            <h1>Crear receta</h1>

            <form action="{{ route('recipes.store') }}" method="POST">
                @csrf
                <label for="">Nombre: </label>
                <input type="text" name="name"><br>

                <label for="">Cantidad de proteina </label>
                <input type="number" name="proteina"><br>

                <label for="">cantidad de Carbohidratoss: </label>
                <input type="number" name="carbohidratos" ><br>

                <label for="">Cantidad de verduras: </label>
                <input type="number" name="verduras" ><br>

                <button type="submit">Guardar</button>
            </form>            
        </div>
        <!--index-->
        <div>
            <h1>Recetas</h1>

            <p>Bienvenido {{ auth()->user()->name }}</p>

            

            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Proteína</th>
                    <th>Carbohidratos</th>
                    <th>Verduras</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>

                @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->proteina }}</td>
                    <td>{{ $recipe->carbohidratos }}</td>
                    <td>{{ $recipe->verduras }}</td>
                    <td>{{ $recipe->user->name ?? '' }}</td>
                    <td>
                        <a href="{{ route('recipes.edit', $recipe->id) }}">Editar</a>

                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
  </body>
</html>