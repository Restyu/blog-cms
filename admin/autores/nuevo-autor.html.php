<?php 
    require_once '../templates/header.php';
 ?>

   <div id="page-wrapper">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <h1 class="page-header">
	                            Autores
	                            <small>nuevo</small>
	                        </h1>     
	                    </div>
	                </div>
	            </div>
	           
				<div class="container-fluid">
		            <div class="row">
		                <div class="col-lg-12">
		                    <div class="row">
				                <div class="col-lg-10">
									  <form method="POST" action="?add">

					                    <div class="form-group ">
					                        <label class="control-label" for="nick">nick</label>
					                        <input type="text" class="form-control" name="nick" placeholder="Nombre del autor ">
					                    </div>

					                    <div class="form-group ">
					                        <label class="control-label" for="pass">pass</label>
					                        <input type="text" class="form-control" name="pass1" placeholder="Introduce la contraseña">
					                    </div>

					                    <div class="form-group">
					                        <label class="control-label" for="pass">confir pass</label>
					                        <input type="text" class="form-control" name="pass2" placeholder="confirma la contraseña  ">
					                    </div>

					                    <div class="form-group">
					                        <label class="control-label" for="email">email</label>
					                        <input type="text" class="form-control" name="email" placeholder="Introduce el email  ">
					                    </div>

					                     <div class="form-group form-autores">
					                        <label for="inputTipo" class="control-label">Tipo cuenta</label>
					                            <select class="form-control" name="role">
					                                <option>Tipo cuenta</option>
					                                <option value="admin">administrador</option>
					                                <option value="editor">usuario</option>
					                            </select>  
					                    </div>
						                <button type="submit" class="btn btn-primary boton">Añadir autor</button>
						            </form>					                    
		               			</div>
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
