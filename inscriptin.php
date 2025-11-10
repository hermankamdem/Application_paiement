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
$sexe=$_POST["s"];
$grade=$_POST["d"];
$statut=$_POST['st'];
$nom=$_POST['nom'];
$prenom=$_POST['pnom'];
$adresse=$_POST['adres'];
$ville=$_POST['ville'];
$mot_de_pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$poste=$_POST["poste"];
$heure=$_POST["heure"];
$identifiant=$_POST["id"];
$erreur="Duplicate entry '".$_POST['id']."' for key 'PRIMARY'";
	function verifer($q,$erreur)
	{
		if(mysql_error()==$erreur) {echo "<t>l'identifiant que vous avez entré existe déjà il ne peut plus être ulisisé</t><br><center>
		<a href='formulaire.html'><button>réenregistrer</button></a></center>";}
	}

if  (($sexe==true)&&($grade==true)&&($statut==true)&&($nom==true)&&($prenom==true)&&($adresse==true)&&($ville==true)&&($mot_de_pass==true)&&($cpass==true)&&($poste==true)&&($heure==true)&&($identifiant==true)) {

$datep=array('an' => $_POST['dateA'],'jour' => $_POST['dateJ'], 'mois' => $_POST['dateM']);
$date_naissance=$datep['an']."-".$datep['mois']."-".$datep['jour'];

$donne="value('".$identifiant."','".$nom."','".$prenom."','".$adresse."','".$ville."','".$mot_de_pass."','".$date_naissance."','".$sexe."','".$grade."','".$statut."','".$poste."','".$heure."')";

$x=mysql_connect("localhost","root","")or die("echec de connection au serveur");

	mysql_query("create database THIB");
	mysql_select_db("thib");
	mysql_query("create table professeur(`identifiant` int(5) NOT NULL ,`nom` varchar(15) NOT NULL,`prenom` varchar(15),`adresse` varchar(20),`ville_de_residence` varchar(30),`mot_de_pass` varchar(10),`date_naissance` date,`sexe` char(1),`grade` varchar(10),`statut` varchar(10),`matier_enseigner` varchar(30),`heure_par_mois` int(2) )");
	mysql_query("alter table professeur add primary key(`identifiant`)" );
	$s=mysql_query("insert into professeur(identifiant,nom,prenom,adresse,ville_de_residence,mot_de_pass,date_naissance,sexe,grade,statut,matier_enseigner,heure_par_mois) ".$donne)or die(verifer(mysql_error(),$erreur));

	echo "<center style=font-family:algerian; ><font color=blue size=10px> $nom $prenom </font>residant a<font color=red size=10px> $ville </font> est enseignent de<font color=maganta size=10px> $poste </font>ayant le<font color=turquoise size=10px> $grade </font>avec le statut de <font color=blue size=10px>$statut </font>est enregistré dans la base de donnée avec<font color=blue size=10px> $mot_de_pass </font>comme mot de pass il devra faire <font color=blue size=10px>$heure</font>H par mois <br><a href=vacataire.html><button>ok</button><a>";

} else {
	echo "<center style=font-family:algerian; > <font color=red size=30px>desolé vous n'avez pas renseigner tous les champs vous ne serez pas enregistré dans la base de donnée";
}
?>