<?php
include 'profil.php';
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Déclaration des Lacunes</title>
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
<h2> Déclaration des lacunes </h2>
<p class="note">	
&nbsp &nbsp Note: Dans cette page seulment les produits d'un minimum quantité ou moins qui apparaissent</p>
<br><br>
<?php	
echo "<table class='table1'>

<td>identificateur</td>
<td>Nom_Produit</td>
<td>minimum_quantite</td>
<tbody>";
$reqt=mysqli_query($connect,"SELECT * FROM les_produits where email = '$email' ORDER BY nom_prod");
while($rslt=mysqli_fetch_assoc($reqt)){
	if ($rslt['quantite']<=$rslt['minimum']) {
echo "
	<tr>
		<td>".$rslt['id_prod']."</td>
		<td><input type='text'  name='".$rslt['nom_prod']."' class='modprod' value='".$rslt['nom_prod']."'></td>
		<td><input type='text'  name='".$rslt['minimum']."' class='modprod' value='".$rslt['minimum']."'></td>
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