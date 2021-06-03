<?php 
$connect=mysqli_connect("localhost", "root",NULL) or die("Impossible de se connecter : " . mysqli_error());
$bdd =mysqli_select_db($connect, "pharmacie") or die("Impossible de se connecter ". mysqli_error($connect));


 ?>