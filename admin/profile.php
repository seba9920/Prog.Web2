<?php 
include_once('header.php'); 

require_once('../Helpers/config.php');



?>

<div class="container-fluid">               
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fas fa-user fa-3x mr-2"></i>
                            </div>
                                <div class="media-body">
                                    <ul class="breadcrumb">
                                        <li><h1 class="h3 mb-0 text-gray-800">Perfil</h1></li>
                                    </ul>
                                    
                                </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                        
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="text-center">
                                    <img src="../Front/team/User_icon_2.png" width="150" height="150" class="img-circle img-offline img-responsive img-profile" alt="" />
                                    <h4 class="profile-name mb-2 mt-3">Jhorky Escalante</h4>
                                    <div><i class="fa fa-map-marker"></i> San Francisco, California, USA</div>
                                    <div><i class="fa fa-briefcase"></i> Analista de Sistemas <a href="">Da Vinci.</a></div>                                
                                    <div class="mb20"></div>                                
                                    <div class="btn-group">
                                        <!--<button class="btn btn-primary btn-bordered">Following</button>
                                        <button class="btn btn-primary btn-bordered">Followers</button>-->
                                    </div>
                                </div><!-- text-center -->
                                
                                <br />
                              
                                <h5 class="md-title">Acerca de mi:</h5>
                                <p class="mb30">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat... <a href="">Show More</a></p>
                              
                                <h5 class="md-title">Redes Sociales</h5>
                                <ul class="list-unstyled social-list">
                                    <li><i class="fa fa-twitter"></i> <a href="">twitter.com/eileensideways</a></li>
                                    <li><i class="fa fa-facebook"></i> <a href="">facebook.com/eileen</a></li>
                                    <li><i class="fa fa-linkedin"></i> <a href="">linkedin.com/4ever-eileen</a></li> 
                                    <li><i class="fa fa-instagram"></i> <a href="">instagram.com/eiside</a></li>
                                </ul>
                              
                                <div class="mb30"></div>
                              
                                <h5 class="md-title">Direccion</h5>
                                <address>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                              
                            </div><!-- col-sm-4 col-md-3 -->
                            
                            <div class="col-sm-8 col-md-9">
                              
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-line">
                                    <li class="active"><a href="#comentarios" data-toggle="tab"><strong>Comentarios</strong></a></li>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <li><a href="#pedidos" data-toggle="tab"><strong>Pedidos</strong></a></li>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <li><a href="#new" data-toggle="tab"><strong>New</strong></a></li>

                                </ul><br>
                            
                                <!-- Tab panes -->
                                <div class="tab-content nopadding noborder">
                                    <div class="tab-pane active" id="comentarios">
                                        <div class="activity-list">  
                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" src="../Front/team/User_icon_2.png" width="50" height="50" alt="" />
                                                </a>
                                                <div class="media-body ml-3">
                                                    <strong>Ray Sin</strong> started following <strong>Eileen Sideways</strong>. <br />
                                                    <small class="text-muted">Yesterday at 3:30pm</small>
                                                </div>
                                            </div><!-- media -->
                                

                                        </div><!-- activity-list -->
                                
                                        <button class="btn btn-white btn-block">Mostrar Mas</button>
                                    </div><!-- tab-pane -->
                                    
                                    <div class="tab-pane" id="pedidos">
                                
                                        <div class="follower-list">
                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" src="holder.js/100x100" alt="" />
                                                </a>
                                                <div class="media-body"><!--
                                                    <div class="table-responsive">
                                                        <table class="table table-xl-responsive-borderless" id="tablajson2" width="100%" cellspacing="0">
                                                            <thead class="thead-dark">
                                                                <tr align="center">
                                                                <th>ID</th>
                                                                <th>Fecha</th>
                                                                <th>Producto</th>
                                                                <th>Importe</th>
                                                                <th>Accion</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>  
                                                                <tr align="center">
                                                                <td>hola</td>
                                                                <td>hola</td>
                                                                <td>hola</td>
                                                                <td>hola</td>                                                     
                                                                <td><center>
                                                                <i class="fas fa-edit"></a></i>&nbsp;&nbsp;
                                                                <i class="fas fa-trash-alt"></i></a></i></center>
                                                                </td>
                                                                </tr>
                                                            
                                                            </tbody>
                                                        </table>
                                                    </div>-->
                                                                                                   
                                                    
                                            <div class="col-lg-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Mis Pedidos</h4>
                                                        <p class="card-description">
                                                            Actuales
                                                        </p>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead class="thead-dark">
                                                                    <tr align="center">
                                                                    <th>ID</th>
                                                                    <th>Fecha</th>
                                                                    <th>Producto</th>
                                                                    <th>Status</th>
                                                                    <th>Importe</th>
                                                                    <th>Accion</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr align="center">
                                                                    <td>1</td>
                                                                    <td>2020-04-20</td>
                                                                    <td class="text-danger"> Meteoro <i class="icon-arrow-down"></i></td>
                                                                    <td><label class="badge badge-danger">Pendiente</label></td>
                                                                    <td class="text-danger"> $1000.00 <i class="icon-arrow-down"></i></td>
                                                                    <td><center>
                                                                        <a href="#"><i class="fas fa-edit"></a></i></a>&nbsp;&nbsp;
                                                                        <a href="#"><i class="fas fa-trash-alt"></i></a></i></center>
                                                                    </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                    <td>2</td>
                                                                    <td>2020-05-10</td>
                                                                    <td class="text-danger"> Kong <i class="icon-arrow-down"></i></td>
                                                                    <td><label class="badge badge-warning">En progreso</label></td>
                                                                    <td class="text-danger"> $2000.00 <i class="icon-arrow-down"></i></td>
                                                                    <td><center>
                                                                    <a href="#"><i class="fas fa-edit"></a></i></a>&nbsp;&nbsp;
                                                                        <a href="#"><i class="fas fa-trash-alt"></i></a></i></center>
                                                                    </td>                                                                    
                                                                    </tr align="center">
                                                                    <tr align="center">
                                                                    <td>3</td>
                                                                    <td>2020-06-2</td>
                                                                    <td class="text-danger"> Iroman <i class="icon-arrow-down"></i></td>
                                                                    <td><label class="badge badge-success">Entregado</label></td>
                                                                    <td class="text-danger"> $2000.00 <i class="icon-arrow-down"></i></td>
                                                                    <td><center>
                                                                    <a href="#"><i class="fas fa-edit"></a></i></a>&nbsp;&nbsp;
                                                                        <a href="#"><i class="fas fa-trash-alt"></i></a></i></center>
                                                                    </td>                                                                    
                                                                    </tr>                                                                      
                                                                                                                                                                                                       
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            


                                                </div><!-- media-body -->
                                            </div><!-- media -->

                                        </div><!--follower-list -->
                                    </div><!-- tab-pane -->
                                    
                                    <div class="tab-pane" id="new">
                                
                                        <div class="activity-list">
                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" src="images/photos/user2.png" alt="" />
                                                </a>
                                            <div class="media-body">
                                                <strong>Chris Anthemum</strong> liked a photos<br />
                                                <small class="text-muted">Today at 12:30pm</small>
                                      
                                                <ul class="uploadphoto-list">
                                                    <li><a href="images/photos/media5.png" data-rel="prettyPhoto"><img src="images/photos/media5.png" class="thumbnail img-responsive" alt="" /></a></li>
                                                    <li><a href="images/photos/media4.png" data-rel="prettyPhoto"><img src="images/photos/media4.png" class="thumbnail img-responsive" alt="" /></a></li>
                                                </ul>
                                            </div>
                                        </div><!-- media -->

                                  
                                    </div><!-- activity-list -->
                                    <button class="btn btn-white btn-block">Show More</button>
                                   
                                </div><!-- tab-content -->
                              
                            </div><!-- col-sm-9 -->
                        </div><!-- row -->  
                    
                    </div><!-- contentpanel -->
                    
                </div>

</div>
<!-- /.container-fluid -->
</div>
</div>
</div>
</div>



<!--######################################################################################################################-->
    

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <?php require_once('footer.php'); ?>

<script>
 $(document).ready(function() {
  $('#tablajson').DataTable();
  } );
  $(document).ready(function() {
  $('#tablajson2').DataTable();
  } );
 </script> 

</body>

</html>
