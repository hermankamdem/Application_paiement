<meta charset="utf-8">
<style type="text/css">
	font{font-family: algerian;flood-color: blue;font-size: 25px;}
	button{font-family: Castellar;color: blue;background-color: pink;font-size:2em;}
</style>
<?php

if ((!empty($_POST['nom']))&&(!empty($_POST['id']))) 
{

	
$nom=$_POST['nom'];

$identifiant=$_POST['id'];

$x=mysql_connect("localhost","root","") or die("echec de connectin au server ");
if ($x==true) {
	
	mysql_select_db("thib",$x)or die("erreur de selection de la base de donnee");
$ver=mysql_query("select nom,identifiant from professeur where nom='$nom' and identifiant='$identifiant'");
$se=mysql_fetch_row($ver);
if (($se[0]!=$nom)and($se[1]!=$identifiant)) {
	echo "<font color=red >ce professeur n'existe pas dans la base de donnée de tchonang verifier que les information que vous avez entrés sont correct</font><center><a href='suprimer.html'><button>réesayer</button></a><center>";
}else{
	$donne="
     delete from professeur
     where nom='$nom' and identifiant='$identifiant'
	";
	mysql_query($donne)or die(mysql_error());
	echo "<center style=font-family:algerian; ><font color=blue size=22px>le professeur $nom as ete suprime avec success!<br> 
	</font><center><a href='suprimer.html'><button>ok</button></a><center>";}
} else {
	echo "<center style=font-family:algerian; > 
<font color=red size=30px>desolé vous n'avez pas renseigner tous les champs vous ne serez pas enregistré dans la base de donnée";
}
}





	














?>