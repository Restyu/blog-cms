<?php 
    require_once '../templates/header.php';
 ?>

 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categorias
                            <small>añadir</small>
                        </h1>     
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

			<div class="container-fluid">
	            <div class="row">
	                <div class="col-lg-8">
	                    <div class="row">   	
				            <form class="form-horizontal" action="?categorianueva" method="POST">	 
								<div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">categoria</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="categoria" placeholder="nombre de la categoria" value="">
								    </div>
								</div>	
								<div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" class="btn btn-default">Añadir categoria</button>
								    </div>
								</div>
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
