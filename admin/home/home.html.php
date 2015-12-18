<?php
    // Si accedemos a la página welcome: http://localhost:8080/sesiones/welcome
    // sin habernos logueado, nos redirigirá a la página de error
    if( !isset($_SESSION['user']) ){
        header("Location: ".$base_path.'/error');
        exit();
    }else{
        // Si hay creada una sesión cargamos el nombre de usuario
        $user = $_SESSION['user'];
    } 

    require_once '../templates/header.php';
?>

        <div id="page-wrapper">

            <div class="container-fluid">


    <h1>Bienvenido al área privada</h1>
    <p>Hola <?=$user?>, estás en el área privada.</p>
    <a href="?logout">Logout</a>



              
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

</body>

</html>
