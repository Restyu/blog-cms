<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';


if (isset($_GET['op']) && $_GET['op'] == "new") {
	require 'nuevo-autor.html.php';
	exit();
}

// LISTA AUTORES
$sql = 'SELECT * FROM autores order by nick asc';

	$ps = $pdo->prepare($sql);
	$ps->execute();

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$autor[] = $row;
}

// NUEVO AUTOR 
if (isset($_GET['add'])) {

	$errores = [];

	$nick = htmlspecialchars($_POST['nick'], ENT_QUOTES, 'UTF-8');
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
	$role = htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8');
	$pass1 = htmlspecialchars($_POST['pass1'], ENT_QUOTES, 'UTF-8');
	$pass2 = htmlspecialchars($_POST['pass2'], ENT_QUOTES, 'UTF-8');


	if ($nick == "") {
		$errores  ['no has introducido el nombre'] = true;
	}

	if ($pass1 != $pass2) {
		$errores  ['el pass es diferente'] = true;
	}

	if(strlen($pass1) < 5 ) {
		$errores  ['el pass es diferente o tiene menos de 5 caracteres'] = true;
	}

	if ($email == "" ) {
		$errores  ['el email esta vacio'] = true;
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$errores ['el email es incorrecto'] = true;
	}

	if ($role != "admin" && $role != "editor") {
		$errores ['elige una opcion'] = true;
	}

	$pass1 = md5($pass1.$salt);

	if (empty($errores)) {
		
		try {
			
			 $sql = "INSERT INTO autores (nick , email , role , password) VALUES (:nick , :email , :role , :pass1)";
			 $ps = $pdo->prepare($sql);
	         $ps->bindValue(':nick',$nick);
	         $ps->bindValue(':email',$email);
	         $ps->bindValue(':role',$role);
	         $ps->bindValue(':pass1',$pass1);
	         $ps->execute(); 
			
		}catch (Exception $e) {

			die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
		}
	}else{

		require_once 'autores.html.php';
		exit();
		
	}
	
	header("Location: .");
	exit();
}

// BORRAR AUTORES
if (isset($_GET['deleteauthor'])) {

	$id = $_POST['idauthor'];

	$sql = 'DELETE FROM autores where id = :idauthor';
	$ps = $pdo->prepare($sql);
	$ps->bindValue(':idauthor', $id);
	$ps->execute();

	header("Location: .");
	exit();
}

require_once 'autores.html.php';


