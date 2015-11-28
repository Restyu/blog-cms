<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';

if (isset($_GET['op']) && $_GET['op'] == "new") {
	require 'nuevo-autor.html.php';
	exit();
}


$sql = 'SELECT * FROM autores order by nick asc';

	$ps = $pdo->prepare($sql);
	$ps->execute();


while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$autor[] = $row;
}


require_once 'autores.html.php';