<meta charset="utf-8">
<style type="text/css">
	t{
		font-size: 3em;font-family: cambria;
		text-decoration-color: blue;
		text-decoration: underline;
		color: red;
	}
	button{
		font-size: 2em;
		color: blue;
		font-family: algerian;
		font-style: oblique;
		text-align: center;
		background-image: linear-gradient(blue,aqua;white);
	}
</style>
<?php

if ((!empty($_POST['nom']))&&(!empty($_POST['prenom']))&&(!empty($_POST['age']))&&(!empty($_POST['sexe']))&&(!empty($_POST['code']))&&(!empty($_POST['id']))) 
{

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];	
$sexe=$_POST["sexe"];
$age=$_POST['age'];
$code=$_POST['code'];
$identifiant=$_POST['id'];

$erreur="Duplicate entry '".$_POST['id']."' for key 'identifiant'";
$x=mysql_connect("localhost","root","") or die("echec de connectin au server ");
if ($x==true) {
	mysql_query("create database IF NOT EXISTS THIB");
	mysql_select_db("thib") or die("echec d'enregistrement");
	mysql_query("create table IF NOT EXISTS comptable (`nom` varchar(15),`prenom` varchar(15),`sexe` char(1),`age` int(2),`code_compt` char(10),`identifiant` varchar(11))");
	mysql_query("ALTER TABLE `comptable` ADD UNIQUE(`identifiant`);")or die();
	$donne="value('".$nom."','".$prenom."','".$sexe."','".$age."','".$code."','".$identifiant."')";
	function verifer($q,$erreur)
	{
		if(mysql_error()==$erreur) {echo "<t>l'identifiant que vous avez entrer existe déjà il ne peut plus être ulisiser</t><br><center>
		<a href='administrateur1.html'><button>réenregistrer</button></a></center>";}
	}

	$s=mysql_query("insert into comptable(nom,prenom,sexe,age,code_compt,identifiant) ".$donne)or die(verifer(mysql_error(),$erreur));
	?>
		<center style=font-family:algerian; ><font color=blue size=22px>le comptable<?php echo " $nom $prenom" ?> a été enregistré dans la base de donnée avec succès!<br>
		<input type='submit' value='ok' onclick=window.location.href='index.html' style='font-size:40px;font-family: algerian;' style='color=blue;' size='80px'><?php
}else{ ?>
	<center style="font-family:algerian"; > <font color=red size=30px>desolé vous n'avez pas renseigner tous les information le comptable ne serez pas enregistré dans la base de donnée 
	<input type='submit' value='réenregistrer' onclick=window.location.href='index.html' style='font-size:80px;' style='color=blue;' size='80px'>";
	<?php
}
}




	














?>