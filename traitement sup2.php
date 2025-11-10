<meta charset="utf-8">
<style type="text/css">
	button{font-family: algerian;color: blue; background-color: red; font-size: 20px}
</style>
<?php

if ((!empty($_POST['nom']))&&(!empty($_POST['id']))) 
{

	
$nom=$_POST['nom'];

$identifiant=$_POST['id'];

$x=mysql_connect("localhost","root","") or die("echec de connectin au server ");
if ($x==true) {
	
	mysql_select_db("thib",$x)or die("erreur de selection de la base de donnee");
$ver=mysql_query("select nom,identifiant from comptable where nom='$nom' and identifiant='$identifiant'");
$se=mysql_fetch_row($ver);
if (($se[0]!=$nom)and($se[1]!=$identifiant)) {
	echo "<font color=red size=50px>ce comptable n'esiste pas dans la base de donnée! verifier que les information que vous avez entrer soit correct <br>
	<a href='administrateur2.html'>
	  <button>réesayer<button><a>       </font>";
}else{
	$donne="
     delete from comptable
     where nom='$nom' and identifiant='$identifiant'
	";
	mysql_query($donne)or die(mysql_error());
	echo "<center style=font-family:algerian; ><font color=blue size=22px>le comptable $nom as ete suprime avec success! 
	<a href='administrateur2.html'>
	  <button>ok<button><a> ";}
} else {
	echo "<center style=font-family:algerian; > <font color=red size=30px>desolé vous n'avez pas entrer tout les infomation il est imposible d'effectuer cette opperation dans la base de donnée";
}
}





	?>