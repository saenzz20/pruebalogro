<div class="modal-content">
    <form id="formUpdate" action="{{$entrada->id ? route('entrada.update',$entrada) : route('entrada.store')}}"
     method="post">
    <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Entradas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form id="entradaForm">
        @if($entrada->id)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $entrada->id }}">
        @endif
        @csrf
        <div class="mb-3">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" name="placa" class="form-control" id="placa" placeholder="Ingrese placa" value="{{ $entrada->placa }}">
            <div id="msg_placa"></div>
        </div>
        <div class="mb-3">
                <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
                <input type="datetime-local" name="fecha_entrada" class="form-control" id="fecha_entrada" placeholder="Ingrese fecha de entrada" value="{{ $entrada->fecha_entrada ? (new DateTime($entrada->fecha_entrada))->format('Y-m-d\TH:i') : '' }}">

            </div>
            <div class="mb-3">
                <label for="fecha_salida" class="form-label">Fecha de Salida</label>
                <input type="datetime-local" name="fecha_salida" class="form-control" id="fecha_salida" placeholder="Ingrese fecha de salida" value="{{ $entrada->fecha_salida ? (new DateTime($entrada->fecha_salida))->format('Y-m-d\TH:i') : '' }}">
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

    </form>
</div>