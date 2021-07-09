
<?php include('header.php'); ?>
        
    <section>      
        <div class="container">
                <div class="texto-bienvenida">
                    <h1>Bienvenido a nuestra tienda de Peliculas  </h1>
                </div>    
        </div>
    </section>

    <section>
        <div class="container">
            <div class="carrousel">
                <div class="row">
                    <div class="col">
                         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <a href="product-details.php?id=48"><img style="width:100%" src="images/carrusel/bohemian_rhapsody_carrusel.jpg" alt="Bohemian Rhapsody"></a>
                            </div>
                            <div class="carousel-item">
                              <a href="product-details.php?id=1"><img style="width:100%" src="images/carrusel/the_godfather_carrusel.jpg" alt="The Godfather"></a>
                            </div>
                            <div class="carousel-item">
                              <a href="product-details.php?id=66"><img style="width:100%" src="images/carrusel/the_shawshank_redemption_carrusel.jpg" alt="The Shawshank Redemption"></a>
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>           
    </section>

    <section>

        <div class="container">
            <h3>Destacados </h3>
            <div class="row">
                    <?php include('destacados.php'); ?>
            </div>
        </div>  
    </section>

    <section>

        <div class="container">
            <h3>Mejores Peliculas </h3>
            <div class="row">
                    <?php include('carrusel2019.php'); ?>
            </div>
            <div class="row">
                    <?php include('carrusel2020.php'); ?> 
            </div>
        </div>  
    </section>

    <section>

        <div class="container">
            <h3>Ultimos Lanzamientos </h3>
            <div class="row">
                    <?php include('pelis-nuevas.php'); ?>
            </div>
        </div>  
    </section>
    
<?php include('footer.php'); ?>