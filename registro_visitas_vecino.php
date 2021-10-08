<?php 
require_once('navbar_vecino.php');
include("databaseconnect.php");  
?>


<div class="container p-4">
  <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">ANUNCIAR VISITA</h3>
          <h6>Apreciado vecino(a) debe enviar un registro por cada persona que le visita.</h6>
        </div>
        <form action="action_registro_visitas_vecino.php" method="POST">
          <div class="card-body">
              <div class="form-group row"> 
                <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha:</label>
                <div class="col-sm-10">
                  <input type="date" name="fechaVisita" class="form-control" autofocus>
                </div>
              </div>
              <div class="form-group row"> 
                <label for="inputEmail3" class="col-sm-2 col-form-label"> Nombre del Visitante:</label>
                <div class="col-sm-10">
                   <input name="visitante" class="form-control" placeholder="¿Quién lo visita?" autofocus> 
                </div>           
                </input>
              </div> 
              <div class="form-group row"> 
                <label for="inputEmail3" class="col-sm-2 col-form-label"> Cédula</label>
                <div class="col-sm-10">
                  <input type="text" name="visitante" class="form-control" placeholder="Número de identificación del visitante" autofocus>               
                </div>
              </div> 
              <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-success btn-block" name ="registrar_visita" value ="Anunciar"> 
                </div>
              </div>
            </form>  
          </div>
  </div>
</div>

<?php 
  require_once('footer.php');
?>