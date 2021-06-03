<?php
include 'profil.php';
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Expiration bientôt</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />
</head>
<body>
<div  class="forms">
<?php
include '../html/liste_medicaments.html';
include "connectebdd.php";
?>
<br><br><br><br>
<h2> Les Produits Expirent bientôt </h2>
<p class="note">	
&nbsp &nbsp Note: Dans cette page seulment les produits qui s'expirent dans un mois ou moins qui apparaissent</p>
<br>
<?php	
echo "<table class='table1'>

<td>identificateur</td>
<td>Nom_Produit</td>
<td>date_expire</td>
<tbody>";
$reqt=mysqli_query($connect,"SELECT * FROM les_produits where email = '$email' ORDER BY nom_prod");

	$startdate = strtotime("tomorrow");
	$d = strtotime("+4 weeks", $startdate);
while($rslt=mysqli_fetch_assoc($reqt)){	
	$date=date("Y-m-d", $d);
	if ($rslt['date_expire']<=$date) {
echo "
	<tr>
		<td>".$rslt['id_prod']."</td>
		<td><input type='text'  name='".$rslt['nom_prod']."' class='modprod' value='".$rslt['nom_prod']."'></td>
		<td><input type='text'  name='".$rslt['date_expire']."' class='modprod' value='".$rslt['date_expire']."'></td>
	</tr>
	";}
}
echo "</tbody>
	</table>";
mysqli_close($connect);
?>


<br><br>
</div>
</body>
</html>