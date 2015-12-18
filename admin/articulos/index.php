<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/blog/app/config.php';

require_once '../../app/datadb.php';
require_once '../../db/connect.php';

if (isset($_GET['op']) && $_GET['op'] == "new") {
	
	// LISTA CATEGORIAS
	$sql = 'SELECT * FROM categories';
	$ps = $pdo->prepare($sql);
	$ps->execute();

	while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
		$categorias[] = $row;
	}

	//LISTA ETIQUETAS
	$sql = 'SELECT * FROM tags';
	$ps = $pdo->prepare($sql);
	$ps->execute();

	while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
		$etiquetas[] = $row;
	}

	require 'nuevo-post.html.php';
	exit();
}

// NUEVO POST //
if (isset($_GET['addpost'])) {

	$titulo = htmlspecialchars($_POST['titulo'], ENT_QUOTES, 'UTF-8');
	$slug = htmlspecialchars($_POST['slug'], ENT_QUOTES, 'UTF-8');
	$except = htmlspecialchars($_POST['except'], ENT_QUOTES, 'UTF-8');
	$cuerpo = htmlspecialchars($_POST['cuerpo'], ENT_QUOTES, 'UTF-8');
	$estado = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
	$idautor = 23;
	$categoria = htmlspecialchars($_POST['categoria'], ENT_QUOTES, 'UTF-8');
	$etiqueta = htmlspecialchars($_POST['etiqueta'], ENT_QUOTES, 'UTF-8');

	echo "titulo: ".$titulo ."<br>";
	echo "slug: " .$slug ."<br>";
	echo "eccept: " .$except ."<br>";
	echo "cuerpo: ".$cuerpo ."<br>";
	echo "estado: ".$estado ."<br>";

	echo "categorias: ".$categoria."<br>";
	echo "etiqueta: ".$etiqueta."<br>";

	print_r($_POST);

	//SE CREAR EL POST
	try {
		
		$sql = "INSERT INTO posts (title , excerpt , slug , state , content , id_autor) VALUES (:title , :excerpt , :slug , :state , :content , :idautor)";
		$ps = $pdo->prepare($sql);
	    $ps->bindValue(':title',$titulo);
	    $ps->bindValue(':slug',$slug);
	    $ps->bindValue(':excerpt',$except);
	    $ps->bindValue(':state',$estado);
	    $ps->bindValue(':content',$cuerpo);
	    $ps->bindValue(':idautor',$idautor);
	    $ps->execute(); 
			
		}catch (Exception $e) {

			die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
		}

	//SE EXTRAE EL ULTIMO ID DEL POST
	$sql = "SELECT id from posts order by id desc";	
	$ps = $pdo->prepare($sql);
	$ps->execute(); 

	$idposts = $ps->fetch(PDO::FETCH_ASSOC);

	echo "idpost: ".$idposts['id'];
	$idp = $idposts['id'];

	//SE ASOCIA EL POST CON LA CATEGORIA
	try {

		$sql = "INSERT INTO post_catg (id_catg , id_post) VALUES (:categoria , :idposts)";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':categoria',$categoria);
	    $ps->bindValue(':idposts',$idp);
	    $ps->execute(); 

	} catch (Exception $e) {

		die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
	}

	//SE ASOCIA EL POST CON LA ETIQUETA
	try {

		$sql = "INSERT INTO post_tags (id_tags , id_posts) VALUES (:etiqueta , :idposts)";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':etiqueta',$etiqueta);
	    $ps->bindValue(':idposts',$idp);
	    $ps->execute(); 

	} catch (Exception $e) {

		die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
	}


	header("Location: .");
	exit();

	
}

// BORRAR ARTICULOS //
if (isset($_GET['deleteposts'])) {

	$id = $_POST['idposts'];
	$idtag = $_POST['idtag'];
	$idcat = $_POST['idcat'];

try {


	$sql = 'DELETE FROM post_catg where id_post = :idposts and id_catg = :idcat';
	$ps = $pdo->prepare($sql);
	$ps->bindValue(':idposts', $id);
	$ps->bindValue(':idcat', $idcat);
	$ps->execute();	

	} catch (Exception $e) {
		die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
	}

try {

	$sql = 'DELETE FROM post_tags where id_posts = :idposts and id_tags = :idtag';
	$ps = $pdo->prepare($sql);
	$ps->bindValue(':idposts', $id);
	$ps->bindValue(':idtag', $idtag);
	$ps->execute();	

	} catch (Exception $e) {
		die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());	
	}

try {

	$sql = 'DELETE FROM posts where id = :idposts';
	$ps = $pdo->prepare($sql);
	$ps->bindValue(':idposts', $id);
	$ps->execute();		
		
	} catch (Exception $e) {
		die("No se ha podido guardar la tarea en la base de datos:". $e->getMessage());
	}

	header("Location: .");
	exit();
}

// LISTA ARTICULOS
$sql = 'SELECT posts.id,autores.nick,posts.title,posts.state,posts.date_pub,categories.name,tags.name as eti ,post_catg.id_catg,post_tags.id_tags from posts 
	join autores on autores.id = posts.id_autor 
	join post_catg on post_catg.id_post = posts.id 
	join categories on categories.id = post_catg.id_catg 
	join post_tags on post_tags.id_posts = posts.id 
	join tags on tags.id = post_tags.id_tags
	order by posts.id asc';

	$ps = $pdo->prepare($sql);
	$ps->execute();

	while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
		$posts[] = $row;
	}

require_once 'articulos.html.php';


