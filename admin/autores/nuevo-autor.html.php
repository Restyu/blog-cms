<?php 
    require_once '../templates/header.php';
 ?>

   <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Autores
                            <small>nuevo</small>
                        </h1>     
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

			<div class="container-fluid">
	            <div class="row">
	                <div class="col-lg-8">
	                    <div class="row">
		                    <form action="">
		                    	
				               <form class="form-horizontal">
								  
								<div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">nick</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputPassword3" placeholder="nick">
								    </div>
								  </div>	

								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
								    <div class="col-sm-10">
								      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
								    <div class="col-sm-10">
								      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
								    </div>
								  </div>
								 
								 <div class="form-group">
								 	<label for="radio" class="col-sm-2 control-label">Role</label>
									<div class="radio-inline">
									  <label><input type="radio" name="optradio">Administrador</label>
									</div>
									<div class="radio-inline">
									  <label><input type="radio" name="optradio">Editor</label>
									</div>
								</div>


								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" class="btn btn-default">Añadir</button>
								    </div>
								  </div>

								</form>
							</form>
						</div>
					</div>
				</div>
			</div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
