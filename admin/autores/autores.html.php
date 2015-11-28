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
                            <small>lista</small>
                        </h1>
                       
                        <table class="table table-striped">
                            <thead>
                                <th>id</th>
                                <th>nick</th>
                                <th>email</th>
                                <th>role</th>
                            </thead>

                            <tbody>

                                <?php foreach($autor as $auto): ?>
                                    
                                    <td><?=$auto['id']?></td>
                                    <td><?=$auto['nick']?></td>
                                    <td><?=$auto['email']?></td>
                                    <td><?=$auto['role']?></td>
                                    <tr>
        
                                <?php endforeach; ?> 

                            </tbody>

                        </table>
                        
                        <a class="btn btn-default" href="<?=$base_url?>admin/autores/?op=new" role="button">añadir nuevo autor</a>
                        
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
