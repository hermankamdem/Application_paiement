<meta charset="utf-8">
<?php

if ((!empty($_POST['nom']))&&(!empty($_POST['id']))) 
{

	
$nom=$_POST['nom'];

$identifiant=$_POST['id'];

$x=mysql_connect("localhost","root","") or die("echec de connectin au server ".mysql_error());
	mysql_select_db("thib",$x)or die("erreur de selection de la base de donnee");

	$donne="
     select nom,identifiant from `comptable`
     where nom='$nom' and identifiant='$identifiant'";

	$a=mysql_query($donne)or die(mysql_error());
	$res=mysql_fetch_row($a);
	if (($res[0]!=$_POST['nom'])||($_POST['id']!=$res[1])) {
		echo "
<script language=javascript>alert('Vous n\'ete pas dans notre base de donnees faites vous enregistrer par l\' administrateur');</script>
		";
	}else{
	echo "Ok";
	file_put_contents('nom.txt',$_POST['nom']);
	}
	
} else {
	echo "<center style=font-family:algerian; > <font color=red size=30px>desolé vous n'avez pas renseigner tous les champs vous ne serez pas enregistré dans la base de donnée";
}





	














?>