<div class="modal-content">
    <form id="formUpdate" action="{{$usuario->id ? route('usuario.update',$usuario) : route('usuario.store')}}"
     method="post">
    <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        @if($usuario->id)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $usuario->id }}">
        @endif
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre" value="{{$usuario->nombre}}">
            <div id="msg_nombre"></div>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingrese Apellidos" value="{{$usuario->apellidos}}">
            <div id="msg_apellidos"></div>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="text" name="imagen" class="form-control" id="imagen" placeholder="Ingrese imagen" value="{{$usuario->imagen}}">
            <div id="msg_imagen"></div>
        </div>
        <div class="form-group">
            <label for="activo">Activo</label>
            <input type="text" name="activo" class="form-control" id="activo" placeholder="Ingrese activo" value="{{$usuario->activo}}">
            <div id="msg_activo"></div>
        </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary" id="guardar"><span id="textoBoton">Guardar</span></button>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    </form>
</div>