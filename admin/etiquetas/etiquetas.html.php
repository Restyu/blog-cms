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
                                <th>borrar / editar</th>
                            </thead>

                            <tbody>

                                <?php foreach($tags as $tg): ?>
                                    
                                <td><?=$tg['id']?></td>
                                <td>

                                   <form action="?edit" method="post">
                                        <input type="hidden" name="idcat" value="<?=$tg['id']?>">
                                        <input type="text" id="tg-<?=$tg['id']?>" name="nombre" value="<?=$tg['name']?>" disabled>
                                        <button type="submit" class="btn btn-link btn-sm listiconbutton">
                                            <i class="fa fa-check hidden" id="updateok-<?=$tg['id']?>"></i>
                                        </button>
                                        <i class="fa fa-times hidden" id="updatenook-<?=$tg['id']?>"></i>
                                    </form>

                                </td>
                                <td><?=$tg['created_at']?></td>
                                <td>
                                    <div class="linea">
                                        <form action="?deletetag" method="post">
                                            <input type="hidden" name="idtag" value="<?=$tg['id']?>">
                                            <button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
                                    </div>
                                    <div class="linea">
                                        <i class="fa fa-pencil-square-o" id="updatebutton-<?=$tg['id']?>"></i>
                                    </div>
                                </td>

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


   <?php

    if(strpos($_SERVER['REQUEST_URI'],'etiquetas') ) : ?>
   
    <script>
        $(document).ready(function() {
        <?php foreach($tags as $tg): ?>
        $('#updatebutton-<?=$tg['id']?>').click(function () {
            $('#updateok-<?=$tg['id']?>').removeClass('hidden');
            $('#updatenook-<?=$tg['id']?>').removeClass('hidden');
            $('#deletebutton-<?=$tg['id']?>').addClass('hidden');
            $('#tg-<?=$tg['id']?>').removeAttr('disabled');
            $(this).addClass('hidden');
        });

        $('#updateok-<?=$tg['id']?>').click(function () {
            $(this).addClass('hidden');
        });

        $('#updatenook-<?=$tg['id']?>').click(function() {
            $('#tg-<?=$tg['id']?>').attr('disabled');
            $('#updateok-<?=$tg['id']?>').addClass('hidden');
            $('#updatebutton-<?=$tg['id']?>').removeClass('hidden');
            $('#deletebutton-<?=$tg['id']?>').removeClass('hidden');
            $(this).addClass('hidden');
        });
        <?php endforeach; ?>
        });
    </script>

<?php endif; ?>

</html>