<div class="content-header">

    <div class="card">
        <div class="card-header color-dark-blue text-light card-title">
            Registrar un Convenio de Pago
        </div>
        <div class="card-body row justify-content-center">
            <div class="col-8 ">
                <form name="form_convenio" id="form_convenio" method="POST">
                    <div class="">
                        <div class="">

                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Fecha Inicial:</label>
                                    <input type="date" name="fechaInicial" id="fechaInicial" class="form-control" placeholder="Ingrese Fecha AAAA-MM-DD" >
                                </div>

                                <div class="form-group col">
                                    <label>Fecha del ultimo pago:</label>
                                    <input type="date" name="fechaFin"  id="fechaFin" class="form-control" placeholder="Ingrese Fecha Ultimo Pago AAAA-MM-DD" >
                                </div>

                            </div>

                           <div class="form-row">
                                <div class="form-group col-md">
                                <label>Monto inicial:</label>
                                <input type="text" name="monto" id="monto" class="form-control" placeholder="Ingrese Monto Inicial Convenio" readonly>
                            </div>
                            <div class="form-group col-md">
                                <label>Prima:</label>
                                <input type="text" name="prima" id="prima" class="form-control" placeholder="Ingrese Prima" >
                            </div>
                            <div class="form-group col-md">
                                <label>Descuento:</label>
                                <input type="text" name="descuento" id="descuento" class="form-control" placeholder="Ingrese Descuento en Deuda" >
                            </div>
                           </div>


                      <div class="form-group">
                        <label for="inputEmail3">Cargo mensual:</label>
                        <div class="row">
                                <div class="col-10">
                                        <input type="hidden" name="txtIdCargo" id="txtIdCargo">
                                        <input type="hidden" name="txtIdCargo" id="txtMontoCargo">
                                    <textarea class="form-control" name="descripcion_cargo" id="descripcion_cargo" rows="3" maxlength="250" readonly></textarea>
                                </div>
                                <div class="col-2">
                                    <input name="" id="" onclick="abrirModalCargo();" class="seleccionar btn color-dark-blue p-1 btn-block" type="button" value="Seleccionar">
                                </div>
                        </div>
                    </div> 
                           
                            <div class="form-group">
                                <label>Numero de Cuotas</label>
                                <input type="text" name="cuotas" id="cuotas" class="form-control" placeholder="Ingrese Cuotas Plazo" >
                            </div>
                            
                            
                            <div class="form-group">
                        <label for="inputEmail3">Vecino(a):</label>
                        <div class="row">
                                
                                <div class="col-10">
                                        <input type="hidden" name="txtIdVecino" id="txtIdVecino">
                                        <input type="text" name="txtNombre" id="txtNombre" class="form-control col-9" placeholder="Nombre del Vecino"  readonly>
                                </div>
                                 
                                <div class="col-2">

                                    <input name="" id="" onclick="abrirModal();" class="seleccionar btn color-dark-blue p-1 btn-block" type="button" value="Seleccionar">
                                </div>
                       
                        </div>
                    </div>


                            <div class="form-group">
                                <label>Detalles:</label>
                                <!-- <input type="text" name="detalle" class="form-control" placeholder="Ingrese Detalles del Convenio" > -->

                                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                            
                            </div>

                        </div>

                    </div>
                    <!-- <input type="submit" class="btn  color-dark-blue" name="registrar_convenio" value="Guardar"> -->
                    <input type="button" class="btn  color-dark-blue" value="Guardar" onclick="guardarConvenio()">
                </form>
            </div>
        </div>

    </div>

</div>



<div class="modal fade" id="modal_seleccionar_cargo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Seleccion un cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="content-header">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header color-dark-blue">
                                <!-- <h3 class="card-title">Mantenimiento de Usuarios</h3> -->
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-striped" id="tablaSeleccionarCargo">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripcion</th>
                                            <th>Monto</th>
                                            <th>Estado</th>
                                            <th>Seleccionar</th>
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
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- INICIO MODAL -->
<div class="modal fade" id="modal_seleccionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Seleccione un Vecino</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header color-dark-blue">
                                <!-- <h3 class="card-title">Mantenimiento de Usuarios</h3> -->
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-striped" id="tablaSeleccionarVecino">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                            <th>Seleccionar</th>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
</div>

    <script src="js/convenios.js?rev=<?php echo time(); ?>"></script>
    <script>

        $(document).ready(function() {
            listarCargoParaSeleccionar();
            listarVecinoParaSeleccionar();
        });

    </script>