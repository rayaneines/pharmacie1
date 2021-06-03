<?php
include 'profil.php';
include "connectebdd.php";
if(isset($_POST['date']))$date = $_POST['date'];else $date = "la date n'été pas envoyé en POST Méthod ";
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>état du vente du jour</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />

</head>
<body>
<div  class="forms">
<?php
include '../html/liste_vente.html';
?>

<br><br><br>
<h2> Etat de vente du jour</h2>
<form  method='post' action='vente_jour.php' >
	<table class='table2'>
		<tbody>
		<tr>
			<td><label class="indice">Date:</label></td>
			<td><input type='date' name='date' style="left:0px;width:200px;" class='inputtext modprod' value="<?php echo date('Y-m-d'); ?>"></td>
			</td>
			<td><input type="submit" name="afficher" value="afficher" class="change"></td>
		</tr>
		</tbody>
	</table><br>
	<hr><br><br> <br>
	<h2> Les vents en gros</h2>
<table class='table1 table2'>
	<th>
		 	 
		<tr><td>Numero: </td>
		  <td>nombre de produits:</td>
		      <td>Totale:</td>
		      <td>Réduction(%)</td>
		      <td>payer : </td>
		      <td>crédit/cache:</td></tr>
	</th>
	<tbody>
<?php
if (isset($_POST['afficher'])) {
$reqt16=mysqli_query($connect,"SELECT * FROM ventes_grand where email ='$email'and date_vent='$date'");

while($rslt16=mysqli_fetch_assoc($reqt16)){
	echo"<tr>
		<td><input type='text' class='inputtext' value='".$rslt16['numero_vent']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['nb_produit']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['total']."' readonly></td>
		<td><input type='text' class='inputtext ' value='".$rslt16['reduction']."' readonly></td>
		<td><input type='text' class='inputtext modprod' style='width:100px;' value='".$rslt16['pour_paye']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['credit_cache']."' readonly></td>
		</tr>";
	}	
}


?>

</tbody>
</table>
<br>
<hr><br><br> <br>
<h2>Les ventes au public</h2>

<table class='table1 table2'>
	<th>
		 	 
		<tr><td>Numero: </td>
		  <td>nombre de produits:</td>
		      <td>Totale:</td>
		      <td>payer : </td>
		      <td>crédit/cache:</td></tr>
	</th>
	<tbody>
<?php
if (isset($_POST['afficher'])) {
$reqt16=mysqli_query($connect,"SELECT * FROM ventes_public where email ='$email'and date_vente='$date'");

while($rslt16=mysqli_fetch_assoc($reqt16)){
	echo"<tr>
		<td><input type='text' class='inputtext' value='".$rslt16['numero_vente']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['nb_produits']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['totale']."' readonly></td>
		<td><input type='text' class='inputtext modprod' style='width:100px;' value='".$rslt16['pour_payer']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['credit_cache']."' readonly></td>
		</tr>";
	}	
}


?>

</tbody>
</table>
<hr><br><br> <br>
<h2>Les Retournes</h2>


<table class='table1 table2'>
	<th>
		 	 
		<tr><td>Numero: </td>
		  <td>nombre de produits:</td>
		      <td>Totale:</td>
		      <td>Réduction(%):</td>
		      <td>payer : </td>
		      <td>crédit/cache:</td></tr>
	</th>
	<tbody>
<?php
if (isset($_POST['afficher'])) {
$reqt16=mysqli_query($connect,"SELECT * FROM retournes where email ='$email'and date_vent='$date'");

while($rslt16=mysqli_fetch_assoc($reqt16)){
	echo"<tr>
		<td><input type='text' class='inputtext' value='".$rslt16['numero']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['nb_produits']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['total']."' readonly></td>

		<td><input type='text' class='inputtext ' value='".$rslt16['reduction']."' readonly></td>
		<td><input type='text' class='inputtext modprod' style='width:100px;' value='".$rslt16['pour_paye']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['credit_cache']."' readonly></td>
		</tr>";
	}	
}


?>

</tbody>
</table>


<br><br>

</div>
<?php

mysqli_close($connect);

?>
</body>
</html>