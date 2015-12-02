<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';

if (isset($_GET['op']) && $_GET['op'] == "new") {
	require 'nueva-categoria.html.php';
	exit();
}

// AÑADIR  CATEGORIAS
if (isset($_GET['categorianueva'])) {
	
	$categoria = $_POST['categoria'];
		
		$sql = "INSERT INTO categories (name) VALUES (:categoria)";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':categoria', $categoria);
		$ps->execute();
}

// BORRAR CATEGORIAS
if (isset($_GET['deletecategories'])) {

	$id = $_POST['idcategories'];

		$sql = "DELETE FROM categories where id = :idcategories ";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':idcategories', $id);
		$ps->execute();

}

// LISTA CATEGORIAS
$sql = 'SELECT * FROM categories order by name asc';

	$ps = $pdo->prepare($sql);
	$ps->execute();

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$categorias[] = $row;
}


require_once 'categorias.html.php';
