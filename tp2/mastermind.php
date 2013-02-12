<!DOCTYPE html>
<html>
	<head><title>Mastermind</title></head>
	<body>
		<?php
			class Mastermind{
				private $_nombre;

				function __construct($_nombre)
				{
					$_nombre = array(rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9));
				}


				function nbBienPlace($jouer)
				{
					$countN = count($this->_nombre);
					$countJ = count($jouer);
					$nbBienPlace = 0;
					if($countJ == $countN)
					{
						for($i = 0; $i < $countN; i++)
						{
							if($this->_nombre[i] == $jouer[i])
							{
								$nbBienPlace++;
							}
						}
					}
					return $nbBienPlace;
				}

				function nbCorrect($jouer)
				{
					$nbCorrect = 0;
					$countN = count($this->_nombre);
					$countJ = count($jouer);
					if($countJ == $countN)
					{
						for($i = 0; $i < $countN; i++)
						{
							for($j = 0; $j < $countJ; j++)
							{
								if($this->_nombre[i] == $jouer[j])
								{
									$nbCorrect++;
								}
							}
						}
					}
					return $nbCorrect;
				}

				function victoire($jouer)
				{
					$count = count($this->_nombre);
					for(int i = 0; i < $count; i++)
					{
						if($jouer[i] != $this->_nombre[i])
						{
							return false;
						}
					}
					return true;
				}

			}//fin de la class
		?>
	<header>
		<h1>Mastermind v0.1</h1>
	</header>
	<section>
		<?php
			echo 'test mastermind';
		?>
	</section>
	<footer></footer>

	</body>
</html>
