<?php 
include_once('header.php'); 

require_once('../Helpers/config.php');

?>
<!-- container-fluid -->
<div class="container-fluid">

<!-- Row -->
<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
              <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fas fa-file-invoice fa-3x mr-2"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                <li><h1 class="h3 mb-0 text-gray-800">Files Facturacion</h1></li>
                                </ul>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table  display table-hover mb-30">
												<thead>
													<tr>
														<th>#Factura</th>
														<th>Descripcion</th>
														<th>Monto</th>
														<th>Estado</th>
														<th>Fecha Facturacion</th>
														<th>Fecha de Vencimiento</th>
														<th>Mostrar</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>#5012</td>
														<td>System Architect</td>
														<td>$205,500</td>
														<td>
															<span class="badge badge-danger">No Pagado</span>
														</td>
														<td>2011/04/25</td>
														<td>2012/12/02</td>
														<td>
															<a href="#">
																<i class="fas fa-file-alt" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5013</td>
														<td>Accountant</td>
														<td>$205,500</td>
														<td>
															<span class="badge badge-success">Pagado</span>
														</td>
														<td>2011/07/25</td>
														<td>2012/12/02</td>
														<td>
															<a href="#">
                              <i class="fas fa-file-alt" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5014</td>
														<td>Junior Technical Author</td>
														<td>$205,500</td>
														<td>
															<span class="badge badge-warning">Pendiente</span>
														</td>
														<td>2009/01/12</td>
														<td>2012/12/02</td>
														<td>
															<a href="#">
                                <i class="fas fa-file-alt" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5015</td>
														<td>Senior Javascript Developer</td>
														<td>$205,500</td>
														<td>
															<span class="badge badge-success">Pagado</span>
														</td>
														<td>2012/03/29</td>
														<td>2012/12/02</td>
														<td>
															<a href="#">
                                <i class="fas fa-file-alt" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5016</td>
														<td>Accountant</td>
														<td>$205,500</td>
														<td>
															<span class="badge badge-success">Pagado</span>
														</td>
														<td>2008/11/28</td>
														<td>2012/12/02</td>
														<td>
															<a href="#">
                                <i class="fas fa-file-alt" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5017</td>
														<td>Integration Specialist</td>
														<td>$205,500</td>
														<td>
															<span class="badge badge-success">Pagado</span>
														</td>
														<td>2012/12/02</td>
														<td>2016/12/02</td>
														<td>
															<a href="#">
                                <i class="fas fa-file-alt" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5017</td>
														<td>Sales Assistant</td>
														<td>$205,500</td>
														<td>
															<span class="badge badge-success">Pagado</span>
														</td>
														<td>2012/08/06</td>
														<td>2013/09/15</td>
														<td>
															<a href="#">
                                <i class="fas fa-file-alt" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5010</td>
														<td>Integration Specialist</td>
														<td>$205,500</td>
														<td>
															<span class="badge badge-success">Pagado</span>
														</td>
														<td>2010/10/14</td>
														<td>2014/09/15</td>
														<td>
															<a href="#">
                                <i class="fas fa-file-alt" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													<tr>
														<td>#5011</td>
														<td>Javascript Developer</td>
														<td>$205,500</td>
														<td>
															<span class="badge badge-success">Pagado</span>
														</td>
														<td>2009/09/15</td>
														<td>2013/09/15</td>
														<td>
															<a href="#">
                                <i class="fas fa-file-alt" aria-hidden="true"></i>
															</a>	
														</td>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Row -->

		</div>
	</div>
</div>    
<!-- Fin container-fluid -->
                    


    
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <?php require_once('footer.php'); ?>

<script>
 $(document).ready(function() {
  $('#datable_1').DataTable();
  } );
  $(document).ready(function() {
  $('#datable_1').DataTable();
  } );
 </script> 

</body>

</html>
