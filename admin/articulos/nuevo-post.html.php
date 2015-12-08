<?php 
	
    require_once '../templates/header.php';
 ?>


   <div id="page-wrapper">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <h1 class="page-header">
	                            Articulo
	                            <small>nuevo</small>
	                        </h1>     
	                    </div>
	                </div>
	            </div>
	           
				<div class="container-fluid">
		            <div class="row">
		                <div class="col-lg-8">
		                    <div class="row">
				                <div class="col-lg-12">
									  <form method="POST" action="?addpost">

					                    <div class="form-group ">
					                        <label class="control-label" for="titulo">Titulo</label>
					                        <input type="text" class="form-control" name="titulo" placeholder="Titulo del articulo ">
					                    </div>

					                    <div class="form-group ">
					                        <label class="control-label" for="slug">slug</label>
					                        <input type="text" class="form-control" name="slug" placeholder="slug">
					                    </div>

					                    <div class="form-group">
					                        <label class="control-label" for="pass">except</label>
					                        <input type="text" class="form-control" name="except" placeholder="except del articulo">
					                    </div>

					                    <div class="form-group">
					                    	<label class="control-label" for="pass">cuerpo</label>
					                    	 <textarea type="text" class="form-control" name="cuerpo" placeholder="cuerpo del articulo" cols="60" rows="10"></textarea>
					                    </div>

						                <button type="submit" class="btn btn-primary boton">Publicar</button>
			                    
		               			</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="row">

							    <div class="form-group">
					                <label for="inputTipo" class="control-label">categorias</label>
					                    <select class="form-control" name="categoria">
					                        <option>categorias</option>
											<?php foreach($categorias as $cate): ?>
					                        	<option value="<?=$cate['id']?>"><?=$cate['name'] ?></option>
					                        <?php endforeach; ?> 
					                    </select>  
					            </div>

					            <div class="form-group">
					                <label for="inputTipo" class="control-label">estado</label>
					                    <select class="form-control" name="estado">
					                        <option>estado</option>
					                        	<option value="draft"  > draft</option>
					                        	<option value="publicado" > publicado</option>
					                    </select>  
					            </div>
								
								<div>
									<label for="">Etiquetas</label>
						            <div class="checkbox">
									    <?php foreach($etiquetas as $eti): ?>
										    <div>
											    <label>
											    	<input type="checkbox" name="etiqueta" value="<?=$eti['id']?>"> <?=$eti['name'] ?> 
											    </label>
										    </div>
									    <?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
						</form>
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
