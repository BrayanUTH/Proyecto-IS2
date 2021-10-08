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
              <div class="form-group"> 
                <label> Ingrese Fecha Eje: 2021-08-31</label>
                <input type="text" name="fechaVisita" class="form-control" placeholder="AAAA-MM-DD" autofocus>
              </div>
              <div class="form-group"> 
                <label> Nombre del Visitante:</label>
                <input name="visitante" class="form-control" placeholder="¿Quién lo visita?" autofocus>               
                </input>
              </div> 
            <input type="submit" class="btn btn-success btn-block" name ="registrar_visita" value ="Anunciar"> 
            </form>  
          </div>
  </div>
</div>

<?php 
  require_once('footer.php');
?>