<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> Panier </title>
</head>
<body>
<h1>Panier</h1>
<?php
$larticle = array('marteau'=>10, 'tenaille'=>5, 'vis'=>5.2, 'clou'=>5.8, 'tournevis'=>7, 'ciseau'=>4, 'toileemeri'=>3);
$totalArticle = 0;
$totalPrix = 0;

foreach($larticle as $article=>$prix)
{
	if(isset($_POST[$article]))
	{
		$articlePrefixe = $article."Quant";
		$prixPrefixe = $article."Prix";
		$totalArticle = $_POST[$articlePrefixe] + $_POST[$article];
		$totalPrix = $_POST[$prixPrefixe] + $_POST[$article] * $prix;	
	}
}

foreach($larticle as $article=>$prix)
{
	$articlePrefixe = $article."Quant";
	$prixPrefixe = $article."Prix";
	echo $article." ----- ".$prix."€ 
		<form method=\"post\" action=\"panier.php\" >
		<input type=\"number\" name=$article /> 
		<input type=\"submit\" value=\"ajouter\"/>
	 	<input type=\"hidden\" name=$articlePrefixe value=$totalArticle />	
	 	<input type=\"hidden\" name=$prixPrefixe value=$totalPrix />	
		</form><br>";
}


echo "vous avez ".$totalArticle." article(s) d'une valeur de ".$totalPrix;
?>

</body>
</html>
