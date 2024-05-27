<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear vehiculos</title>
</head>
<body>
    <form action="{{route('vehiculo.store')}}" method="post">
        @csrf
        <label for="Placa"></label>
        <input type="text" name="placa">
        <label for="Modelo"></label>
        <input type="text" name="modelo">
        <label for="Propietario"></label>
        <input type="text" name="propietario">
        <input type="submit" value="Guardar">
    </form>
</body>
</html>