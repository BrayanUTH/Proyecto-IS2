<div class="content-header">
    <div class="container-fluid border p-3 shadow-lg rounded">
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="ibox ibox-default">

                    <div class="row mb-3">
                        <div class="col-sm-12 mb-4" style="background-color: rgba(163, 168, 172, 0.507); padding: 25px; border-radius: 10px;">
                            <h2 class="text-center">VECINOS - ESTADOS DE CUENTA</h2>
                        </div>

                        <div class="col-sm-6">
                            <label for="">Seleccione el vecino:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="txtNombreVecino" id="txtNombreVecino" placeholder="Nombre del vecino" readonly aria-describedby="txtNombreVecino">
                                <input type="text" class="form-control" name="txtIdVecino" id="txtIdVecino" hidden>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="txtNombreVecino" onclick="abrirModal()"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 form-group form-check" hidden>
                        <input type="checkbox" class="form-check-input" id="checkFecha">
                        <label class="form-check-label" for="checkFecha">Filtrar por fecha de cargo</label>
                    </div>


                    <div class="col-sm-4 mb-3" style="background-color: rgba(163, 168, 172, 0.507); padding: 25px; border-radius: 10px;">
                        <h5><b> Cargos totales: L. </b><span id="txtcargo" style="font-weight: 550; color: green;"></span></h5>
                        <h5><b> Depositos realizados: L. </b><span id="txtdeposito" style="font-weight: 550; color: green;"></span></h5>
                        <h5><b> Total de deuda: L. </b><span id="txttotal" style="font-weight: 550; color: red;"></span></h5>
                    </div>

                    <div id="div_fechas" style="display: none;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <label for=""><b>Fecha Inicio</b></label>
                                    <input type="date" id="txtFechaInicio" class="form-control">
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <label for=""><b>Fecha Fin</b></label>
                                    <input type="date" id="txtFechaFin" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox-body">
                        <table class="table table-bordered table-striped" id="tablaEstadoCuenta">

                            <thead>
                                <tr>
                                    <th>Id cargo</th>
                                    <th>Fecha cargo</th>
                                    <th>Monto cargo</th>
                                    <th>Descripcion</th>
                                    <th>Fecha de deposito</th>
                                    <th>Agencia bancaria</th>
                                    <th>Numero de referencia</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyDetalle">
                                <!--Detalle de la tabla vecinos -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- INICIO MODAL -->
    <div class="modal fade" id="modal_seleccionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">SELECCIONE UN VECINO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped" id="tablaSeleccionarVecino">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FIN MODAL -->

    <script src="js/estados_cuenta.js?rev=<?php echo time(); ?>"></script>

    <script>
        var fecha = new Date();
        var year = fecha.getFullYear();
        var mes = fecha.getMonth() + 1;
        var dia = fecha.getDate();

        if (dia < 10) {
            dia = '0' + dia;
        }
        if (mes < 10) {
            mes = '0' + mes;
        }
        document.querySelector('#txtFechaInicio').value = (year) + '-' + mes + '-' + dia;
        document.querySelector('#txtFechaFin').value = (year) + '-' + mes + '-' + dia;


        $(document).ready(function() {
            // listarEstadoCuenta();
            listarVecinoParaSeleccionar();
        });

        $('#checkFecha').change(function() {

            if ($('#checkFecha').prop('checked')) {
                document.getElementById('div_fechas').style.display = 'block';
            } else {
                document.getElementById('div_fechas').style.display = 'none';
                document.querySelector('#txtFechaInicio').value = (year) + '-' + mes + '-' + dia;
                document.querySelector('#txtFechaFin').value = (year) + '-' + mes + '-' + dia;

            }
        });
    </script>