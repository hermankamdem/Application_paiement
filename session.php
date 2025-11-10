<?php
	$b=mysqli_connect("localhost","root","","thib");
	$id=$b->query("select identifiant from comptable where identifiant='44e'");
	$a=$id->fetch_array();
	$_SESSION['id']=$a[0];
?><script type="text/javascript">window.location.href="text.php";</script>