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
                            <small>lista</small>
                        </h1>
 
                        <table class="table table-striped">
                            <thead>
                                <th>id</th>
                                <th>nombre</th>
                                <th>F.creada</th>
                                <th>borrar / editar</th>
                            </thead>

                            <tbody>

                                <?php foreach($categorias as $cate): ?>
                                    
                                <td><?=$cate['id']?></td>
                                
                                <td>
                                    <form action="?edit" method="post">
                                      <input type="hidden" name="idcat" value="<?=$cate['id']?>">
                                      <input type="text" id="cate-<?=$cate['id']?>" name="nombre" value="<?=$cate['name']?>" disabled>
                                      <button type="submit" class="btn btn-link btn-sm listiconbutton">
                                          <i class="fa fa-check hidden" id="updateok-<?=$cate['id']?>"></i>
                                      </button>
                                      <i class="fa fa-times hidden" id="updatenook-<?=$cate['id']?>"></i>
                                    </form>
                                </td>

                                <td><?=$cate['created_at']?></td>

                                <td>
                                   <div class="linea">
                                        <form action="?deletecategories" method="post">
                                            <input type="hidden" name="idcategories" value="<?=$cate['id']?>">
                                            <button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
                                    </div>
                                    <div class="linea">
                                        <i class="fa fa-pencil-square-o" id="updatebutton-<?=$cate['id']?>"></i>
                                    </div>
                                </td>
                                <tr>
        
                                <?php endforeach; ?> 

                            </tbody>

                        </table>

                        <a class="btn btn-default" href="<?=$base_url?>admin/categorias/?op=new" role="button">Nueva categoria</a>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>


   <?php

    if(strpos($_SERVER['REQUEST_URI'],'categorias') ) : ?>
   
    <script>
        $(document).ready(function() {
        <?php foreach($categorias as $categoria): ?>
        $('#updatebutton-<?=$categoria['id']?>').click(function () {
            $('#updateok-<?=$categoria['id']?>').removeClass('hidden');
            $('#updatenook-<?=$categoria['id']?>').removeClass('hidden');
            $('#deletebutton-<?=$categoria['id']?>').addClass('hidden');
            $('#cate-<?=$categoria['id']?>').removeAttr('disabled');
            $(this).addClass('hidden');
        });

        $('#updateok-<?=$categoria['id']?>').click(function () {
            $(this).addClass('hidden');
        });

        $('#updatenook-<?=$categoria['id']?>').click(function() {
            $('#categoria-<?=$categoria['id']?>').attr('disabled');
            $('#updateok-<?=$categoria['id']?>').addClass('hidden');
            $('#updatebutton-<?=$categoria['id']?>').removeClass('hidden');
            $('#deletebutton-<?=$categoria['id']?>').removeClass('hidden');
            $(this).addClass('hidden');
        });
        <?php endforeach; ?>
        });
    </script>

<?php endif; ?>

</html>

