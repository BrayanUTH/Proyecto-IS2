<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title">Listado de mis vehiculos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="text-right mb-4">
                    <button type="button" class="btn btn-info" onclick="abrirModal();">Registrar Vehiculo</button>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Color</th>
                            <th>Matricula</th>
                            <th>Foto</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>8</td>
                            <td>Honda Civic 2019</td>
                            <td>Negro+</td>
                            <td>ADB-00056</td>
                            <td><img src="IMG00589.jpg" alt="" width="100px"> </td>
                            <td><button class="btn btn-primary"> <i class="fa fa-edit" onclick="abrirModalEditar()"></i> </button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Color</th>
                            <th>Matricula</th>
                            <th>Foto</th>
                            <th>Accion</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<!-- INICIO MODAL -->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ingresar Vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="">Marca</label>
                        <input type="text" class="form-control" id="txtNombreUsuario" placeholder="Ingrese la marca de su vehiculo">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="">Color</label>
                        <input type="text" class="form-control" id="txtApellidosUsuario" placeholder="Ingrese el color de su vehiculo">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Matricula</label>
                        <input type="hidden" id="txtIdUsuario">
                        <input type="text" class="form-control" id="txtUsuario" placeholder="Ingrese la matricula de Vehiculo">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Fotografia</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Ingresar Fotografia</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Usuario</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL -->

<!-- INICIO MODAL -->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos del vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="">Marca</label>
                        <input type="text" class="form-control" id="txtNombreUsuario" placeholder="Ingrese la marca de su vehiculo">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="">Color</label>
                        <input type="text" class="form-control" id="txtApellidosUsuario" placeholder="Ingrese el color de su vehiculo">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Matricula</label>
                        <input type="hidden" id="txtIdUsuario">
                        <input type="text" class="form-control" id="txtUsuario" placeholder="Ingrese la matricula de Vehiculo">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Fotografia</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Ingresar Fotografia</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL -->

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    function abrirModal() {
        $("#modal_registro").modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#modal_registro").modal('show');
    }

    function abrirModalEditar() {
        $("#modal_editar").modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#modal_editar").modal('show');
    }
</script>