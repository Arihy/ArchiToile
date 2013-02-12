<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head><title>Mastermind</title></head>
	<body>
		<?php
			class Mastermind{
				private $_nombre;
				private $_historique;
				private $_jouer;

				function __construct()
				{
					//$this->_nombre = array(rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9));
					$this->_historique = array();
					$this->_jouer = array();
					$this->_nombre = array(1, 2, 3, 4);
					echo 'constructeur <br>';
				}


				function nbBienPlace($jouer)
				{
					$countN = count($this->_nombre);
					$countJ = count($jouer);
					$nbBienPlace = 0;
					if($countJ == $countN)
					{
						for($i = 0; $i < $countN; $i++)
						{
							if($this->estBienPlace($jouer, $i))
							{
								$nbBienPlace++;
							}
						}
					}
					return $nbBienPlace;
				}

				function estBienPlace($jouer, $indice)
				{
					if($jouer[$indice] == $this->_nombre[$indice])
						return true;
					return false;
				}


				function appartient($valeur)
				{
					foreach($this->_nombre as $val)
					{
						if($val == $valeur)
						{
							return true;
						}
					}
					return false;
				}

				function nbCorrect($jouer)
				{
					$count = count($jouer);
					$nbCorrect = 0;
					for($i = 0; $i < $count; $i++)
					{
						if(($this->appartient($jouer[$i]) == true) && ($this->estBienPlace($jouer, $i) == false))
						{
							$nbCorrect++;
						}
					}
					return $nbCorrect;
				}

				function victoire($jouer)
				{
					$count = count($this->_nombre);
					for($i = 0; $i < $count; $i++)
					{
						if($jouer[$i] != $this->_nombre[$i])
						{
							return false;
						}
					}
					return true;
				}

				function jouer($jouer)
				{
					$count = count($jouer);
					for($i = 0; $i < $count; $i++)
					{
						$this->_jouer[$i] = $jouer[$i];
					}

					if($this->victoire($this->_jouer) == true)
					{
						echo 'vous avez gagné <br>';
					}
					else
					{
						echo 'nombre de chiffre correct = '.$this->nbCorrect($this->_jouer).'<br>';
						echo 'nombre de chiffre bien placé = '.$this->nbBienPlace($this->_jouer).'<br>';
					}
					echo 'Historique:<br>';
					$this->historique($jouer);
				}

				function historique($jouer)
				{
					$this->_historique[] = $jouer;
					$count = count($this->_historique);
					for($i = 0; $i < $count; $i++)
					{
						$count1 = count($this->_historique[$i]);
						for($j = 0; $j < $count1; $j++)
						{
							echo $this->_historique[$i][$j].' ';
						}
						echo '<br>';
					}
				}

			}//fin de la class

			if(isset($_SESSION['nombreMystere']))
			{
				$nombreMystere = $_SESSION['nombreMystere'];
			}
			else
			{
				$nombreMystere = new Mastermind();
				$_SESSION['nombreMystere'] = $nombreMystere;
			}

			if($_POST)
			{
				if(isset($_POST['chiffre1']) && isset($_POST['chiffre2']) && isset($_POST['chiffre3']) && isset($_POST['chiffre4']))
				{
					$jouer = array($_POST['chiffre1'], $_POST['chiffre2'], $_POST['chiffre3'], $_POST['chiffre4']);
					$nombreMystere->jouer($jouer);
				}
			}
		?>
	<header>
		<h1>Mastermind v0.1</h1>
	</header>
	<section>
		<form action="mastermind.php" method="post">
		<input type="number" name="chiffre1" size="3" />
		<input type="number" name="chiffre2" size="3" />
		<input type="number" name="chiffre3" size="3" />
		<input type="number" name="chiffre4" size="3" />
		<input type="submit" value="jouer" />
		</form>
	</section>
	<footer></footer>

	</body>
</html>
