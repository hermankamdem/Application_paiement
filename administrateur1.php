<?php
	$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>

	<title>vous etes vacataire</title>
	<style type="text/css">
		.s{font-family: algerian; size: 44px; background-color: blue;padding-left: 41px;padding-right:41px; padding-top: 51px;padding-bottom: 20px;border-bottom-left-radius: 8px; border-bottom-right-radius: 8px}
		div{font-family: algerian; size:28px; color: #ff00ff}
		input{background-color: #aabbaf ;color: blue;font-style: oblique; font-size: 20px;font-weight: bold}
		#ss{background-color: #ff0;color: blue;font-weight: bold;}
	</style>
</head>
<body background="tchonang.jpeg">
	<center>
	<dfn style="cursor: pointer;color: magenta;font-size:40px " class="s">
	     enregistrez un comptable
    </dfn><br><br><br><br><br>
	<script type="text/javascript">

		 function verifier() {
		 	a=document.ens.nom.value;
		 	b=document.ens.prenom.value;d="thib";e="THIB";
		 	c=document.ens.code.value;
		 	f=document.ens.id.value;
		 	if ((a!='')&&(b!='')&&(c!='')&&(f!='')) 
		 	{
		 		er=true;
		 	} 
		 	else 
		 		{alert("veillez entrer tout les information");er=false;}
		 	return er;
		   }
	</script>
	<div style="display: grid;grid-template-columns: 1fr 2fr 1fr  ">
		<div></div>
		<div style=" background-color: turquoise; margin-top: 80px;">
			<form method="POST" action="traitement.php" onsubmit="return verifier()" name="ens"><center>
	 		 nom &nbsp<input type="text" name="nom"><br><br><div id="cause"></div>
	 		 prenom &nbsp<input type="text" name="prenom"><br><br>
	 		  identifiant &nbsp<input type="text" name="id"><br><br>
	 		 age &nbsp<input type="text" maxlength="3" name="age"><br><br>
	 		 sexe: &nbsp m<input type="radio" name="sexe" value="M"> f<input type="radio" name="sexe" value="F"><br>
	 		 code de service &nbsp<input type="text" name="code"><br>

	 		<input type="submit" value="enregistrer" id="ss"></center>
	 	</form>
		</div>
		<div></div>
	</div>
</center>
</body>
</html>