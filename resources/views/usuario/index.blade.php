@extends('admin.main')
@section('contenido')
 <!--CONTENIDO-->
      <!-- TABLA -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="m-0">Usuarios <button class="btn btn-primary" onclick="nuevo()"><i class="fas fa-file"></i> Nuevo</button> <a href=""
                      class="btn btn-success"><i class="fas fa-file-csv"></i> CSV</a></h5>
                </div>
                <div class="card-body">
                  <div>
                    <form action="{{route('usuario.index')}}" method="get">
                      <div class="input-group">
                          <input name="texto" type="text" class="form-control" value="{{$texto}}">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-info"><i class="fas fa-search"></i>
                               Buscar</button>                      
                          </div>
                      </div>
                    </form>
                  </div>
                  <div class="mt-2">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th width="8%">Opciones</th>
                            <th width="5%">ID</th>
                            <th width="15%">Nombre</th>
                            <th width="15%">Apellidos</th>
                            <th width="10%">Imagen</th>
                            <th width="5%">Activo</th>                                                        
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($registros as $reg)
                          <tr>
                          <td>
                              <div class="btn-group mb-1" role="group" aria-label="Acciones">
                                  <button type="button" class="btn btn-sm btn-primary me-1" onclick="editar({{ $reg->id }})">
                                      <i class="fas fa-edit"></i> Editar
                                  </button>
                                  <button type="button" class="btn btn-sm btn-danger" onclick="eliminar({{ $reg->id }})">
                                      <i class="fas fa-trash"></i> Eliminar
                                  </button>
                              </div>
                         </td>
                            <td>{{$reg->id}}</td>
                            <td>{{$reg->nombre}}</td>
                            <td>{{$reg->apellidos}}</td>
                            <td>{{$reg->imagen}}</td>
                            <td>{{$reg->activo}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{$registros->appends(["texto" => $texto])}}
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- FIN TABLA -->
      <!--MODAL UPDATE-->
      <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-lg">
          
        </div>
      </div>
      <!--FIN MODAL UPDATE-->
<!--FIN CONTENIDO-->
@endsection
@push('scripts')
  <script>
    function nuevo(){
      $.ajax({
            method: 'get',
            url: `{{url('usuario/create')}}`,
            success: function(res){
              $('#modal-update').find('.modal-dialog').html(res);
              $("#textoBoton").text("Guardar");
              $('#modal-update').modal("show");
              guardar();
            }
          });
    }
    function editar(id){
      $.ajax({
            method: 'get',
            url: `{{url('usuario')}}/${id}/edit`,
            success: function(res){
              $('#modal-update').find('.modal-dialog').html(res);
              $("#textoBoton").text("Actualizar");
              $('#modal-update').modal("show");
              guardar();
            }
          });
    }
    function guardar(){
        $('#formUpdate').on('submit',function(e){
          e.preventDefault();
          const _form= this;
          const formData=new FormData(_form);
          const url= this.getAttribute('action');
          $.ajax({
            method: 'POST',
            url,
            headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function(res){
              window.location.reload();
              $('#modal-update').modal("hide");
              Swal.fire({
                  icon: res.status,
                  title: res.message,
                  showConfirmButton: false,
                  timer: 1500
              });
            },
            error: function (res){
              let errors = res.responseJSON?.errors;
              $(_form).find(`[name]`).removeClass('is-invalid');
              $(_form).find('.invalid-feedback').remove();
              if(errors){
                for(const [key, value] of Object.entries(errors)){
                    $(_form).find(`[name='${key}']`).addClass('is-invalid')
                    $(_form).find(`#msg_${key}`).parent().append(`<span class="invalid-feedback">${value}</span>`);
                }
              }
            }
          });
        })
    }
    function eliminar(id) {
      Swal.fire({
            title: 'Eliminar registro',
            text: "¿Esta seguro de querer eliminar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
          }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    url: `{{url('usuario')}}/${id}`,
                    headers:{
                      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res){
                      window.location.reload();
                      Swal.fire({
                          icon: res.status,
                          title: res.message,
                          showConfirmButton: false,
                          timer: 1500
                      });
                    },
                    error: function (res){

                    }
                });
              }
          })
        
      }
  </script>
@endpush