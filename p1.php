<!DOCTYPE html>
<html>
<head>
	<title>thib</title>
	<style type="text/css">
	b{font-size: 20px;font-family: Cooper Black;font-style: italic;color: blue}
	t{font-size: 22px;font-style: oblique;font-family:Ravie;color: white;background-color: blue }
	j{font-family: Castellar}
	body{
		background-image: url('tchonang1.jpeg');
	 background-repeat: no-repeat;
	 background-size: 100%;
	}
</style>
</head>
<body style=" ">
	<center>
		<b>
			<?php
			$a=file_get_contents('nom.txt');
			$sx=file_get_contents('sexe.txt');
			if ($sx=='M') {
			echo"
			<b>Bienvenue <t>Mr $a </t>vous êtes le comptable de <j>tchonang univercity</j> charge d'enregistrer les professeurs et de calculer leur salaire si neccessaire les supprimer<b>
			";
			}else{
				echo "
				<b>Bienvenue <t>Mme $a </t>vous êtes la comptable de <j>tchonang univercity</j> charge d'enregistrer les professeurs et de calculer leur salaire. si neccessaire vous pouvez les supprimer </b>";
			}
			?>
		</b>
		




	</center>


</body>
</html>