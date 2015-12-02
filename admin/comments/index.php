<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';

// BORRAR COMENTARIO
if (isset($_GET['deletecomments'])) {

	$id = $_POST['idcomments'];

		$sql = "DELETE FROM comments where id = :idcomments ";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':idcomments', $id);
		$ps->execute();

}

// LISTA COMENTARIOS
$sql = 'SELECT * FROM comments order by created_at asc';

	$ps = $pdo->prepare($sql);
	$ps->execute();

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$comments[] = $row;
}


require_once 'comments.html.php';
