<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> Factorielle </title>
</head>
<body>
<h1>Factorielle</h1>
<form method="post" action="factorielle.php">
	Nombre <input type="number" name="nombre"/>
	<input type="submit" value="calculer" />
</form>

<?php
function factorielle($nombre)
{
	if($nombre <= 1)
		return 1;
	else
		return $nombre * factorielle($nombre - 1);
}

if(isset($_POST["nombre"]))
{
	$nombre = $_POST["nombre"];
	echo "<p>".$nombre."! = ".factorielle($nombre)."</p>";
}
else
{
	echo "<p>Entrez un nombre pour calculer sa factorielle.</p>";
}

?>

</body>
</html>
