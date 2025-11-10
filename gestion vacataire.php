<meta charset="utf-8">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
	function cacher() {
		$('table').show();
		$('div').hide();
	}
</script>
<style type="text/css">
	center{font-size: 40px;font-weight: bold;color: blue;}
	b{font-style: oblique;color: turquoise; font-size: 50px}
	button{font-family: algerian;color: blue; background-color: red; font-size: 20px}
	f{font-style: oblique;color:red; font-size: 40px}
	table{background-color:orange;}
	th{font-family: Castellar;color: white;background-color:blue;font-size: 1em}
	td{font-family: Castellar;color: blue;background-color: violet;font-style: oblique;font-weight: bold;font-size: 20px}
</style>
<?php
$x=mysql_connect("localhost","root","") or die("erreur de connection");
$y=mysql_select_db("thib",$x) or die("imposible de faire cette action vous devez dabord enregister le professeur sur l'option enregistrer un professeur");

//Definition et affichage de cookies
setcookie("nom",$_GET['nom']);
//Fin d'affichage

$a=$_GET['nom'];
$b=$_GET['prenom'];
$c=$_GET['heure'];
$identifiant=$_GET['id'];


if (($a==true)&&($b==true)&&($c==true)&&($identifiant==true)) {

	$s=mysql_query("select nom,identifiant,grade,statut from professeur where nom='$a' and identifiant='$identifiant'");
$se=mysql_fetch_row($s);
 if ($se[3]=="vacataire") {
 	

 	

settype($res,"int");$req=mysql_query("select heure_par_mois from professeur where identifiant='$identifiant' and nom='$a' ")or die("erreur de verification dans la base de donnée" );
$res=mysql_fetch_row($req);
$res=$res[0]; 

	if ($c<=$res) {



if (($se[0]==$a)and($se[1]==$identifiant)) {
		$e="select nom,prenom,identifiant,sexe,grade,statut,matier_enseigner,heure_par_mois from professeur where nom='$a' and identifiant='$identifiant'";
		$t=mysql_query($e)or die(mysql_error());
		$tt=mysql_fetch_array($t);
		?><table border="0" hidden="true">
			<tr>
				<th>
					NOM
				</th>
				<th>PRENOM</th>
				<th>identifiant</th>
				<th>sexe</th>
				<th>grade</th>
				<th>statut</th>
				<th>matiere</th>
				<th>heures dûes</th>
				<th>heures effectuées</th>
				<th>salaire de ce mois</th>	
			</tr>
			<tr>
				<td>
					<?php echo $tt['nom'];   ?>
				</td>
				<td>
					<?php echo $tt['prenom'];   ?>
				</td>
				<td>
					<?php echo $tt['identifiant'];   ?>
				</td>
				<td>
					<?php echo $tt['sexe'];   ?>
				</td>
				<td>
					<?php echo $tt['grade'];   ?>
				</td>
				<td>
					<?php echo $tt['statut'];   ?>
				</td>
				<td>
					<?php echo $tt['matier_enseigner'];   ?>
				</td>
				<td>
					<?php $h=$tt['heure_par_mois']; echo"$h h";   ?>
				</td>
				<td>
					<?php echo "$c h";   ?>
				</td>
				
		  	
		<?php	

	if ($se[2]=="licence") {
		$f=$c*2000;
	echo "<div><center style=font-family:algerian;> le professeur <b>$a $b </b>a fait<b> $c </b>heures ce mois sont salaire est<b>  $f frcfa</b><br><button onclick='cacher()'>Generer l'etat de vacation</button><a href=vacataire.html><button>ok</button><a></div>";
		     echo "  <td>
				 $f frcfa
				</td>
			</tr></table><br>";

	}elseif ($se[2]=="licence 2") {
	$f=$c*2500;
	echo "<div><center style=font-family:algerian;> le professeur <b>$a $b </b>a fait<b> $c </b>heures ce mois sont salaire est<b>  $f frcfa</b><br><br><button onclick='cacher()'>Generer l'etat de vacation</button><a href=vacataire.html><button>ok</button><a></div>"; echo " <td>
				 $f frcfa
				</td>
			</tr></table><br>";
	}elseif ($se[2]=="master 2") {
	$f=$c*3000;
	echo "<div><center style=font-family:algerian;> le professeur <b>$a $b </b>a fait<b> $c </b> heures ce mois sont salaire est<b>  $f frcfa</b><br><br><button onclick='cacher()'>Generer l'etat de vacation</button><a href=vacataire.html><button>ok</button><a></div>";echo " <td>
				 $f frcfa
				</td>
			</tr></table><br>";
	
	}elseif ($se[2]=="doctora") {
	$f=$c*3500;
	echo "<div><center style=font-family:algerian;> le professeur <b>$a $b </b>a fait<b> $c </b> heures ce mois sont salaire est<b>  $f frcfa</b><br><br><button onclick='cacher()'>Generer l'etat de vacation</button><a href=vacataire.html><button>ok</button><a></div>";echo " <td>
				 $f frcfa
				</td>
			</tr></table><br>";
	
	}
		
	}else{
		echo "<f>les informations que vous avez entré sont totalement ou parcielement incorecte!</f><br><a href=vacataire.html><button>réesayer</button></a>";
	}
 }else{
		echo "<f>le nombre d'heures que vous avez entré est superieur au nombre alloué pour ce professeur par mois !</f> <br><a href=vacataire.html><button>réesayer</button></a>";
	}
 }else { echo "<f>ce professeur n'est pas reconue comme vacataire rasurez vous qu'il le soit</f> <br><a href=vacataire.html><button>réesayer</button></a>";} 
}else {
	echo "<b style=color:red >vous n'avez pas renseigner toutes les informations <a href=vacataire.html><button>réesayer</button></a>";
}




?>