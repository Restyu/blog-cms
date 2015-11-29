<?php 
    require_once '../templates/header.php';
 ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Etiquetas
                            <small>lista</small>
                        </h1>
                       
                        <table class="table table-striped">
                            <thead>
                                <th>id</th>
                                <th>nombre</th>
                                <th>F.creada</th>
                            </thead>

                            <tbody>

                                <?php foreach($tags as $tg): ?>
                                    
                                <td><?=$tg['id']?></td>
                                <td><?=$tg['name']?></td>
                                <td><?=$tg['created_at']?></td>
                                
                                <tr>
        
                                <?php endforeach; ?> 

                            </tbody>

                        </table>

                        <a class="btn btn-default" href="<?=$base_url?>admin/etiquetas/?op=new" role="button">Nueva etiqueta</a>
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