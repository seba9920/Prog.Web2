<?php 
include_once('header.php'); 

require_once('../Helpers/config.php');

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fas fa-file-invoice fa-3x mr-2"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                <li><h1 class="h3 mb-0 text-gray-800">Facturacion</h1></li>
                                </ul>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                        
                        <div class="panel panel-default mt-3">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        
                                        <h5 class="lg-title mb-3">Remitente</h5>
                                        <img src="images/themeforest.png" class="img-responsive mb10" alt="" />
                                        <address>
                                            <strong>ThemeForest Web Services, Inc.</strong><br>
                                            795 Folsom Ave, Suite 600<br>
                                            San Francisco, CA 94107<br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                        
                                    </div><!-- col-sm-6 -->
                                    
                                    <div class="col-sm-6 text-right">
                                        <h5 class="subtitle mb10">Factura Nro.</h5>
                                        <h4 class="text-primary">INV-000464F4-00</h4>
                                        
                                        <h5 class="subtitle mb10">Destinatario:</h5>
                                        <address>
                                            <strong>ThemePixels, Inc.</strong><br>
                                            795 Folsom Ave, Suite 600<br>
                                            San Francisco, CA 94107<br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                        
                                        <p><strong>Feha de la Factura:</strong> January 20, 2014</p>
                                        <p><strong>Fecha de Vencimiento:</strong> January 22, 2014</p>
                                        
                                    </div>
                                </div><!-- row -->
                                
                                <div class="table-responsive col-lg-12">
                                <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                  <tr align="center">
                                    <th>Fecha</th>                                      
                                    <th>Descripcion del producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio/unidad</th>
                                    <th>Total Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr align="center">
                                    <td>2020-10-24</td>                                      
                                    <td>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </td>
                                    <td>1</td>
                                    <td>$99.00</td>
                                    <td>$99.00</td>
                                  </tr>
                                  <tr align="center">
                                    <td>2020-10-24</td>
                                    <td>                                      
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </td>
                                    <td>3</td>
                                    <td>$150.00</td>
                                    <td>$450.00</td>
                                  </tr>
                                  <tr align="center">
                                  <td>2020-10-24</td>                                      
                                    <td>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </td>
                                    <td>2</td>
                                    <td>$35.00</td>
                                    <td>$70.00</td>
                                  </tr>
                                  <tr align="center">
                                  <td>2020-10-24</td>                                      
                                    <td>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </td>
                                    <td>1</td>
                                    <td>$230.00</td>
                                    <td>$230.00</td>
                                  </tr>
                                </tbody>
                              </table>
                              </div><!-- table-responsive -->
                                <div class="col-lg-3 float-right">
                                    <table class="table table-total">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total:</td>
                                                <td>$849.00</td>
                                            </tr>
                                            <tr>
                                                <td>IVA:</td>
                                                <td>$67.23</td>
                                            </tr>
                                            <tr>
                                                <td>TOTAL:</td>
                                                <td>$916.23</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div><br><br><br><br><br><br><br>
                                <div class="text-right btn-invoice">
                                    <button class="btn btn-primary btn-lg mr-2"><i class="fas fa-dollar-sign mr-2"></i> Realizar el Pago</button>
                                    <button class="btn btn-danger btn-lg"><i class="fas fa-print mr-2"></i>Imprimir Factura</button>
                                </div>
                                
                        
                                

                                
                                
                            </div><!-- panel-body -->
                        </div><!-- panel -->  
                    
                    </div><!-- contentpanel -->
                    
                </div>
            </div><!-- mainwrapper -->
    
</div>
</div>
</div>    

                  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>




  <?php require_once('footer.php') ?>

  


  </div>
</body>

</html>
