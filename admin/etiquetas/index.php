<?php
 
require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';


if (isset($_GET['op']) && $_GET['op'] == "new") {
	require 'nueva-etiqueta.html.php';
	exit();
}

// AÑADIR ETIQUETAS
if (isset($_GET['tagsnew'])) {
	
	$tag =	htmlspecialchars($_POST['tag'],ENT_QUOTES, 'UTF-8');
		
		$sql = "INSERT INTO tags (name) VALUES (:tag)";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':tag', $tag);
		$ps->execute();
}

// BORRAR ETIQUETAS
if (isset($_GET['deletetag'])) {
	
	$id = htmlspecialchars($_POST['idtag'],ENT_QUOTES, 'UTF-8');

		$sql = "DELETE FROM tags where id = :idtag ";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':idtag', $id);
		$ps->execute();
}

// ACTUALIZAR CATEGORIAS
if( isset($_GET['edit']) ){
    
    $newCatName = htmlspecialchars($_POST['nombre'],ENT_QUOTES, 'UTF-8');
    $idcat = $_POST['idcat'];

    try{
        $sql = "UPDATE tags SET name = :nuevonombre, modified_at = NOW() WHERE id = :idcat";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(':nuevonombre', $newCatName);
        $ps->bindValue(':idcat', $idcat);
        $ps->execute();
    }catch(PDOException $e){
        die('No se pudo actualizar la tarea. Error: '.$e->getMessage() );
    }
    header( 'Location: .');
    exit();
}


$sql = 'SELECT * FROM tags order by name asc';

	$ps = $pdo->prepare($sql);
	$ps->execute();

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$tags[] = $row;
}


require_once 'etiquetas.html.php';