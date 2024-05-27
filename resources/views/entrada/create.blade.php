<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Entradas</title>
</head>
<body>
    <form action="{{route('entrada.store')}}" method="post">
        @csrf
        <label for="Placa"></label>
        <input type="text" name="placa">
        <label for="Fecha_entrada"></label>
        <input type="datetime-local" name="fecha_entrada">
        <label for="Fecha_salida"></label>
        <input type="datetime-local" name="fecha_salida">
        <input type="submit" value="Guardar">
    </form>
</body>
</html>