<div class="content-header">
    <div class="container-fluid">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">MANTENIMIENTO INFORMACION DE PAGOS</h3>
            </div>
            <div class="card-body">
                <div class="text-right">
                    <button type="button" class="btn btn-info px-5" onclick="abrirModal();">Registrar Pago</button>
                </div>
                <table class="table table-bordered table-striped" id="tablaMantenimientoPago">

                    <thead>
                        <tr>
                            <th># Pago</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Tipo de pago</th>
                            <th>Descripcion</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- INICIO MODAL -->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">REGISTRAR UN EGRESO O GASTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_pago" name="form_pago" style="background-color: rgba(163, 168, 172, 0.507); padding: 25px; border-radius: 10px;">
                    <div class="form-group">
                        <label>Fecha del Pago</label>
                        <input type="date" name="fechaPago" id="fechaPago" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Monto</label>
                        <input type="number" name="montoPago" id="montoPago" class="form-control" placeholder="Ingrese Monto del Pago" maxlength="12">
                    </div>
                    <div class="form-group">
                        <label>Seleccione el Tipo de Gasto</label>
                        <select name="tipoGasto" id="tipoGasto" class="form-control">
                            <option value="Seguridad">Seguridad</option>
                            <option value="Aguas de San Pedro">Aguas de San Pedro</option>
                            <option value="Aseo">Aseo</option>
                            <option value="Inversiones">Inversiones o Mantenimiento</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion del gasto:</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" maxlength="100" placeholder=""></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-primary" onclick="guardarPago()">APLICAR</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL -->

<!-- INICIO MODAL  modal para editar el deposito-->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos de Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_pago" name="form_pago" style="background-color: rgba(163, 168, 172, 0.507); padding: 25px; border-radius: 10px;">
                    <input type="text" name="txtIdPago" id="txtIdPagoE" hidden>
                    <div class="form-group">
                        <label>Fecha del Pago</label>
                        <input type="date" name="fechaPago" id="fechaPagoE" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Monto</label>
                        <input type="number" name="montoPago" id="montoPagoE" class="form-control" placeholder="Ingrese Monto del Pago" maxlength="12">
                    </div>
                    <div class="form-group">
                        <label>Seleccione el Tipo de Gasto</label>
                        <select name="tipoGasto" id="tipoGastoE" class="form-control">
                            <option value="Seguridad">Seguridad</option>
                            <option value="Aguas de San Pedro">Aguas de San Pedro</option>
                            <option value="Aseo">Aseo</option>
                            <option value="Inversiones">Inversiones o Mantenimiento</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion del gasto:</label>
                        <textarea class="form-control" name="descripcion" id="descripcionE" rows="3" maxlength="100" placeholder=""></textarea>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="editarPago()">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN MODAL -->

    <script src="js/pagos.js?rev=<?php echo time(); ?>"></script>

    <script>
        $(document).ready(function() {
            listarMantenimientoPago();
        });
    </script>