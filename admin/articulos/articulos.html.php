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
                                <th>autor</th>
                                <th>title</th>
                                <th>estado</th>
                                <th>F.publicacion</th>
                                <th>categoria</th>
                                <th>etiqueta</th>
                                <th>borrar / actualizar</th>
                            </thead>

                            <tbody>

                                <?php foreach($posts as $pt): ?>
                                    
                                    <td><?=$pt['nick']?></td>
                                    <td><?=$pt['title']?></td>
                                    <td><?=$pt['state']?></td>
                                    <td><?=$pt['date_pub']?></td>
                                    <td><?=$pt['name']?></td>
                                    <td><?=$pt['eti']?></td>
                                    <td>
                                        <form action="?deleteposts" method="post">
                                            <input type="hidden" name="idposts" value="<?=$pt['id']?>">
                                            <input type="hidden" name="idcat" value="<?=$pt['id_catg']?>">
                                            <input type="hidden" name="idtag" value="<?=$pt['id_tags']?>">
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
