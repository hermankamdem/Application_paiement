<?php
    mysql_connect("localhost","root","");
    mysql_select_db("thib")or die(mysql_error());
	$s=mysql_query("select nom,identifiant,grade,statut from professeur where nom='foko' and identifiant='111'");
	var_dump($s);
$se=mysql_fetch_row($s);
 echo "$se[0]<br>$se[1]";
?>