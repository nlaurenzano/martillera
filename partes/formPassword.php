<?php 
//session_start();
?>

<style>
  input { margin-top: 10px; }
</style>

<?php 
if(isset($_SESSION['registrado'])){  ?>

    <div class="row">
      <div class="col-md-3">
      </div>
    
      <div class="col-md-6">
        <h3>Ingrese los datos del usuario a modificar</h3>

        <input type="email" id="correo" placeholder="Nombre de usuario" 
          class="form-control input-lg" required="" autofocus="" 
          value="<?php  if(isset($_COOKIE["registro"])){echo $_COOKIE["registro"];}?>" />
        
        <input type="password" id="claveActual" placeholder="Contraseña Actual" minlength="8"
          class="form-control input-lg" required="" />
        
        <input type="password" id="claveNueva" placeholder="Nueva Contraseña" minlength="8"
                  class="form-control input-lg" required="" />
                
        <input type="password" id="claveNuevaRep" placeholder="Confirme Nueva Contraseña" minlength="8"
                  class="form-control input-lg" required="" />

      </div>

      <div class="col-md-3">
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
      </div>
    
      <div class="col-md-6">
        <input type="button" class="btn btn-lg btn-block btn-success" name="guardar" value="Guardar"
          onclick="validarPassChange();return false;" />
      </div>

      <div class="col-md-3">
      </div>
    </div>

    <div class="row" style="margin-top: 10px;">
      <div class="col-md-3">
      </div>
    
      <div class="col-md-6">
        <div class="alert alert-warning text-left" hidden id="mensajesLogin">
        </div>
      </div>

      <div class="col-md-3">
      </div>
    </div>
        
<script type="text/javascript">
  MostrarUltimo();
</script>

  <?php
} else {
  echo"<h3>Debe ingresar como Administrador para ver este contenido.</h3>";?>

  <button onclick="MostrarHeader('MostrarHeaderLogin');Mostrar('MostrarLogin')" class="btn btn-lg btn-block btn-success" type="button">
    <span class="glyphicon glyphicon-off">&nbsp;</span>Ingresar
  </button>

<?php  }  ?>