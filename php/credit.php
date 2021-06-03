<?php
include 'profil.php';
include "connectebdd.php";
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Les Crédits</title>
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
<h2> Les Crédits</h2>
<br>
<form  method='post' action='credit.php' >
	<br>
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
$reqt16=mysqli_query($connect,"SELECT * FROM ventes_grand where email ='$email'and credit_cache='credit'");

while($rslt16=mysqli_fetch_assoc($reqt16)){
	echo"<tr>
		<td><input type='text' class='inputtext' value='".$rslt16['numero_vent']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['nb_produit']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['total']."' readonly></td>
		<td><input type='text' class='inputtext ' value='".$rslt16['reduction']."' readonly></td>
		<td><input type='text' class='inputtext modprod' style='width:100px;' value='".$rslt16['pour_paye']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['credit_cache']."' readonly></td>
		<td><input type='submit' class='change ch' name='payé".$rslt16['numero_vent']."' value='payé'></td>
		</tr>";

		if (isset($_POST['payé'.$rslt16['numero_vent'].''])) {
					$id=$rslt16['numero_vent'];
				$query24="UPDATE ventes_grand SET credit_cache='cache' WHERE email='$email' and numero_vent='$id'";
			        $result24 = mysqli_query($connect, $query24);
			        			if (isset($result24)) {	
									echo'<script>alert("Efféctué!");</script>';									
		       				    	echo'<meta http-equiv="refresh" content="0">';} 
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
		}
	}	

?>

</tbody>
</table>

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
$reqt16=mysqli_query($connect,"SELECT * FROM ventes_public where email ='$email'and credit_cache='credit'");

while($rslt16=mysqli_fetch_assoc($reqt16)){
	echo"<tr>
		<td><input type='text' class='inputtext' value='".$rslt16['numero_vente']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['nb_produits']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['totale']."' readonly></td>
		<td><input type='text' class='inputtext modprod' style='width:100px;' value='".$rslt16['pour_payer']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['credit_cache']."' readonly></td>
		<td><input type='submit' class='change ch' name='payé".$rslt16['numero_vente']."' value='payé'></td>
		</tr>";

		if (isset($_POST['payé'.$rslt16['numero_vente'].''])) {
					$id=$rslt16['numero_vente'];
				$query24="UPDATE ventes_public SET credit_cache='cache' WHERE email='$email' and numero_vente='$id'";
			        $result24 = mysqli_query($connect, $query24);
			        			if (isset($result24)) {	
									echo'<script>alert("Efféctué!");</script>';									
		       				    	echo'<meta http-equiv="refresh" content="0">';} 
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
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
$reqt16=mysqli_query($connect,"SELECT * FROM retournes where email ='$email'and credit_cache='credit'");

while($rslt16=mysqli_fetch_assoc($reqt16)){
	echo"<tr>
		<td><input type='text' class='inputtext' value='".$rslt16['numero']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['nb_produits']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['total']."' readonly></td>

		<td><input type='text' class='inputtext ' value='".$rslt16['reduction']."' readonly></td>
		<td><input type='text' class='inputtext modprod' style='width:100px;' value='".$rslt16['pour_paye']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['credit_cache']."' readonly></td>
		<td><input type='submit' class='change ch' name='payé".$rslt16['numero']."' value='payé'></td>
		</tr>";
		if (isset($_POST['payé'.$rslt16['numero'].''])) {
					$id=$rslt16['numero'];
				$query24="UPDATE retournes SET credit_cache='cache' WHERE email='$email' and numero='$id'";
			        $result24 = mysqli_query($connect, $query24);
			        			if (isset($result24)) {	
									echo'<script>alert("Efféctué!");</script>';									
		       				    	echo'<meta http-equiv="refresh" content="0">';} 
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
		}
	}	

?>

</tbody>
</table>

</form>

<br><br>

</div>
<?php

mysqli_close($connect);

?>
</body>
</html>