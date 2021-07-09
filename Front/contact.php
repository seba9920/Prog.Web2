<?php


include_once('header.php');

require_once('vendor/autoload.php');

require_once('../Helpers/smtp.php');

?>
<section class="block block-bb">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">

          <div class="iconchunk iconchunk-top iconchunk-accent-1 text-center">
            <div class="iconchunk-content">
              <p class="mb-1" style="color: black;">
                <h1>¿Quienes Somos?</h1><br>
				Somos estudiantes en la Escuela Da Vinci de la carrera de Analista en Sistemas
              </p>


		              	<ul>
		              		<li>Jhorky Escalante Quispe</li>
		              		<li>Gilberto Ariel Prieto</li>
		              		<li>Roberto Andrés Rocco</li>
		              		<li>Rodrigo Sebastian Tolaba</li>
		              	</ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto py-5">
          <div id="google-map">
          	              <p class="mb-1" style="color: black;">
                <h1>Visitanos</h1><br>

          			<iframe style="width:100%; height:350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d820.9965489892207!2d-58.396387782290056!3d-34.60451056844648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccaea670d4e67%3A0x2198c954311ad6d9!2sDa%20Vinci!5e0!3m2!1ses!2sar!4v1600835578184!5m2!1ses!2sar"></iframe>

          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center pb-4">
        <div class="col-lg-4 col-sm-6">
          <div class="iconchunk iconchunk-left iconchunk-accent-1 mb-3 mb-sm-0">
            <div class="iconchunk-content">
              <i class="fab fa-whatsapp" style="font-size: 40px;"></i><br>
              (+54-11) 5032-0076
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="iconchunk iconchunk-left iconchunk-accent-1">
            <div class="iconchunk-content">
              <i class="fas fa-envelope" style="font-size: 40px;"></i><br>
              <a href="mailto:soporte@movie-shop.com">soporte@movie-shop.com</a>
            </div>
          </div>
        </div>
      </div>
    
  </section>

  <section class="block pb-3">
    <div class="container">
      <div class="block-heading mb-5">
        <h2 class="block-title">Contactanos</h2>
        
        <div class="d-flex justify-content-center"><h5 class="mb-3">Utilice este formulario para enviarnos un mensaje rápido.</h5></div>
      </div>

      <div class="row">
        <div class="col-md-6 mx-auto">
          <form action="#" method="POST">
            <div class="form-group">
			          	
              <input type="text" class="form-control form-control-lg"
                     id="example-input-name"
                     placeholder="Nombre" name="nombre">
            </div>

            <div class="form-group">
              <input type="email" class="form-control form-control-lg"
                     id="example-input-email"
                     placeholder="Email" name="email">
            </div>

            <div class="form-group">
              <textarea placeholder="Escrib tu mensaje..."
                        class="form-control"
                        id="example-textarea" name="mensaje" rows="7"></textarea>
            </div>

            <div class="text-right">
                <a href="#" class="btn btn-danger">
            	    <span>Reset</span>
                </a>
                <input class="btn btn-success" data-toggle="modal" data-target="#exampleModalCentered" type="submit" name="enviar" value="Enviar">
            </div>

          </form>
        </div>
      </div>
    </div>

  </section>
  <!-- Modal -->
<div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Mensaje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Se envió su mensaje correctamente
      </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
?> 