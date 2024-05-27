<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuarios</title>
</head>
<body>
    <form action="{{route('usuario.store')}}" method="post">
        @csrf       
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos">
        <label for="imagen">Imagen</label>
        <input type="text" name="imagen" id="imagen">
        <label for="activo">Activo</label>
        <input type="text" name="activo" id="activo">
                                      
        <input type="submit" value="Guardar">
    </form>
</body>
</html>