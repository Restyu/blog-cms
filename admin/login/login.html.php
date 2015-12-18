<?php

    if( isset($_SESSION['user']) ){
        // Si tenemos configurado el usuario en el array de sesión
        // quiere decir que ya estamos logueado, por lo que no cargamos el formulario de login
        // y redirigimos a la página welcome

        header("Location: ".$base_path.'/home');
        exit();
    }else{

    }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Introduce tus datos</h1>
    <form action="?login" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Log in">
    </form>
</body>
</html>