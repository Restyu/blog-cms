<?php
 
require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';


if (isset($_GET['op']) && $_GET['op'] == "new") {
	require 'nueva-etiqueta.html.php';
	exit();
}

if (isset($_GET['tagsnew'])) {
	
	$tag = $_POST['tag'];
		
		$sql = "INSERT INTO tags (name) VALUES (:tag)";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':tag', $tag);
		$ps->execute();
}

if (isset($_GET['deletetag'])) {
	
	$id = $_POST['idtag'];

		$sql = "DELETE FROM tags where id = :idtag ";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':idtag', $id);
		$ps->execute();
}

$sql = 'SELECT * FROM tags order by name asc';

	$ps = $pdo->prepare($sql);
	$ps->execute();

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$tags[] = $row;
}


require_once 'etiquetas.html.php';