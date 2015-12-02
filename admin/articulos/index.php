<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';


// BORRAR ARTICULOS
if (isset($_GET['deleteposts'])) {

	$id = $_POST['idposts'];

	$sql = 'DELETE FROM posts where id = :idposts';
	$ps = $pdo->prepare($sql);
	$ps->bindValue(':idposts', $id);
	$ps->execute();

}

// LISTA ARTICULOS
$sql = 'SELECT * FROM posts join autores on autores.id = posts.id_autor';

	$ps = $pdo->prepare($sql);
	$ps->execute();

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$posts[] = $row;
}

require_once 'articulos.html.php';