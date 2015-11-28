<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';

if (isset($_GET['op']) && $_GET['op'] == "new") {
	require 'nueva-categoria.html.php';
	exit();
}

$sql = 'SELECT * FROM categories order by name asc';

	$ps = $pdo->prepare($sql);
	$ps->execute();


while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$categorias[] = $row;
}


require_once 'categorias.html.php';