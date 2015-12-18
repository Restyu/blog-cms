<?php
require_once '../data.php';

session_start();

if( isset($_GET['login']) ){

    if( $_POST['nombre'] == 'homer' && $_POST['password'] == 'simpson' ){
        $nombre = $_POST['nombre'];
        // Si el usuario es homer y la contraseña simpson los datos son correctos
        // Por lo que se crea la sesión


        // Se crean los datos en el array $_SESSION
        $_SESSION['user'] = $nombre;

        // Se redirige a la página welcome
        header('Location: '.$base_path.'/home');
    }else{
        echo 'Datos incorrectos';
    }
    exit();
}else{
    require_once 'login.html.php';
}