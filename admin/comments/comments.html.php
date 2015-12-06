<?php 
    require_once '../templates/header.php';
 ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comentarios
                            <small>lista</small>
                        </h1>
                        
                        <table class="table table-striped">
                            <thead>
                                <th>id</th>
                                <th>nombre</th>
                                <th>email</th>
                                <th>F.creada</th>
                                <th>borrar / editar</th>
                            </thead>

                            <tbody>

                                <?php foreach($comments as $cm): ?>
                                    
                                <td><?=$cm['id']?></td>
                                <td><?=$cm['usuario']?></td>
                                <td><?=$cm['email']?></td>
                                <td><?=$cm['created_at']?></td>
                                <td>
                                    <form action="?deletecomments" method="post">
                                        <input type="hidden" name="idcomments" value="<?=$cm['id']?>">
                                        <button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-trash"></i></button>
                                    </form>
                                </td>
                                <tr>
        
                                <?php endforeach; ?> 

                            </tbody>

                        </table>

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