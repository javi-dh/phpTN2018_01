<?php
	require_once('conection.php');

	if (count($_POST) != 0) {
		$title = $_POST['title'];
		$rating = $_POST['rating'];
		$awards = $_POST['awards'];
		$length = $_POST['length'];
		$genre_id = $_POST['genre_id'];
		$release_date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];

		try {
			$sql = "INSERT INTO movies (title, rating, release_date, awards, length, genre_id) VALUES ('$title', $rating, '$release_date', $awards, $length, $genre_id)";
			$query = $db->prepare($sql);

			$query->execute();
			$message = '¡Película insertada con éxito!';
		}
		catch( PDOException $Exception ) {
			$message = '¡Problemas al insertar el registro!';
			// echo $Exception->getMessage();
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Película Agregada</title>
	</head>
	<body>
		<h2><?=$message?></h2>
		<a href="agregarPelicula.php">Volver al formulario</a>
	</body>
</html>
