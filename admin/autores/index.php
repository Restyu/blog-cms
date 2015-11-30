<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';

if (isset($_GET['op']) && $_GET['op'] == "new") {
	require 'nuevo-autor.html.php';
	exit();
}

if (isset($_GET['newauthor'])) {
	
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];
		
		$sql = "INSERT INTO autores (nick, password, email, role) VALUES (:nombre, :email, :pass, :role)";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':nombre', $nombre);
		$ps->bindValue(':pass', $pass);
		$ps->bindValue(':email', $email);
		$ps->bindValue(':role', $role);
		$ps->execute();
}

if (isset($_GET['deleteauthor'])) {

	$id = $_POST['idauthor'];

	$sql = 'DELETE FROM autores where id = :idauthor';
	$ps = $pdo->prepare($sql);
	$ps->bindValue(':idauthor', $id);
	$ps->execute();


}


$sql = 'SELECT * FROM autores order by nick asc';

	$ps = $pdo->prepare($sql);
	$ps->execute();


while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$autor[] = $row;
}


require_once 'autores.html.php';


