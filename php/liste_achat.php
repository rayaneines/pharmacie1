<?php
include 'profil.php';
include "connectebdd.php";
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Liste des achats</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />

</head>
<body>
<div  class="forms">
<?php
include '../html/liste_approvis.html';
?>

<br><br><br>
<h2> Liste des achats</h2>
<br>
<form  method='post' action='liste_achat.php' >
	<br>
	<hr><br><br> <br>
	<h2> Les crédits des achats</h2>
<table class='table1 table2'>
	<th>
		 	 
		<tr><td>Numero: </td>
		<td>Fournisseur: </td>
		<td>date: </td>
		  <td>nombre de produits:</td>
		      <td>Totale:</td>
		      <td>Réduction(%)</td>
		      <td>payer : </td>
		      <td>crédit/cache:</td></tr>
	</th>
	<tbody>
<?php
$reqt16=mysqli_query($connect,"SELECT * FROM achat where email ='$email'and credit_cache='credit'");

while($rslt16=mysqli_fetch_assoc($reqt16)){
	echo"<tr>
		<td><input type='text' class='inputtext' value='".$rslt16['numero']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['fournisseur']."' readonly></td>
		<td><input type='date' class='inputtext' style='width:130px;' value='".$rslt16['date_achat']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['nb_produit']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['total']."' readonly></td>
		<td><input type='text' class='inputtext ' value='".$rslt16['reduction']."' readonly></td>
		<td><input type='text' class='inputtext modprod' style='width:100px;' value='".$rslt16['pour_paye']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['credit_cache']."' readonly></td>
		<td><input type='submit' class='change ch' name='payé".$rslt16['numero']."' value='payé'></td>
		</tr>";

		if (isset($_POST['payé'.$rslt16['numero'].''])) {
					$id=$rslt16['numero'];
				$query24="UPDATE achat SET credit_cache='cache' WHERE email='$email' and numero='$id'";
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
	<h2> Les  achats</h2>
<table class='table1 table2'>
	<th>
		 	 
		<tr><td>Numero: </td>
		<td>Fournisseur: </td>
		<td>date: </td>
		  <td>nombre de produits:</td>
		      <td>Totale:</td>
		      <td>Réduction(%)</td>
		      <td>payer : </td>
		      <td>crédit/cache:</td></tr>
	</th>
	<tbody>
<?php
$reqt16=mysqli_query($connect,"SELECT * FROM achat where email ='$email'");

while($rslt16=mysqli_fetch_assoc($reqt16)){
	echo"<tr>
		<td><input type='text' class='inputtext' value='".$rslt16['numero']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['fournisseur']."' readonly></td>
		<td><input type='date' class='inputtext' style='width:130px;' value='".$rslt16['date_achat']."' readonly></td>
		<td><input type='text' class='inputtext' value='".$rslt16['nb_produit']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['total']."' readonly></td>
		<td><input type='text' class='inputtext ' value='".$rslt16['reduction']."' readonly></td>
		<td><input type='text' class='inputtext modprod' style='width:100px;' value='".$rslt16['pour_paye']."' readonly></td>
		<td><input type='text' class='inputtext modprod' value='".$rslt16['credit_cache']."' readonly></td>
		</tr>";

	
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