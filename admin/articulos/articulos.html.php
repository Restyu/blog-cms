<?php 
    require_once '../templates/header.php';
 ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Articulos
                            <small>lista</small>
                        </h1>
                     
                         <table class="table table-striped">
                           
                            <thead>
                                <th>id</th>
                                <th>autor</th>
                                <th>title</th>
                                <th>estado</th>
                                <th>creado</th>
                                <th>borrar / actualizar</th>
                            </thead>

                            <tbody>

                                <?php foreach($posts as $pt): ?>
                                    
                                    <td><?=$pt['id']?></td>
                                    <td><?=$pt['nick']?></td>
                                    <td><?=$pt['title']?></td>
                                    <td><?=$pt['state']?></td>
                                    <td><?=$pt['created_at']?></td>
                                    <td>
                                        <form action="?deleteposts" method="post">
                                            <input type="hidden" name="idposts" value="<?=$pt['id']?>">
                                            <button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
                                    </td>

                                    <tr>
        
                                <?php endforeach; ?> 

                            </tbody>

                        </table>
                        
                        <a class="btn btn-default" href="<?=$base_url?>admin/articulos/?op=new" role="button">añadir nuevo articulo</a>
                         
                     
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

</html>
