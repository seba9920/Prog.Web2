<?php 
include_once('header.php');
 ?>
        


<div class="container col-7 col-md-4 py-5">
    <form class="form-signin py-5" method="POST">
  <i class="fas fa-users" style="font-size: 100px;"></i>
  
  <label for="inputUser" class="sr-only">Usuario</label>
  <input type="text" name="user" id="inputUser" value="" class="form-control" placeholder="Usuario" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="pass" id="inputPassword" value="" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3 d-flex justify-content-start">
    <label>
    <input type="checkbox" value="remember-me"> Recuerdame
    </label>
  </div>  
    <p class="alert-danger"><b>
    <?php if(isset($_SESSION['error'])){if($_SESSION['error'] == "1" ){ echo "Usuario o Contraseña incorrecta" ;  }}?>
    </b></p>    
    
  
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Iniciar Sesion</button>
  
</form>

</div>

<?php 
include('footer.php'); 
?>