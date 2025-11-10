<?php
if((!empty($_POST['nom']))&&(!empty($_POST['prenom']))&&(!empty($_POST['age']))&&(!empty($_POST['sexe']))&&(!empty($_POST['code']))){
echo "$_POST['code']";

$a=mysql_connect("localhost","root","");
if($a==true){echo "ok"}else{echo "echec de connection";}

}







?>