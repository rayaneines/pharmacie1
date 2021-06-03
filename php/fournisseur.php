<?php
include 'profil.php';
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Fournisseurs</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />

</head>
<body>
<div  class="forms">
<?php
include '../html/liste_approvis.html';
include "connectebdd.php";
?>
<br><br><br><br>	
<h2> Les Fournisseurs de la Pharmacie </h2>
<br><br>
<?php	
echo "
<form  method='post' action='fournisseur.php' >
<table class='table1'>

<td>Nom d'entreprise</td>
<td>Nomdu résponsable</td>
<td>Numero telephone</td>
<td>Numero Mobile</td>
<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAdress&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
<td>&nbsp&nbsp&nbsp&nbsp&nbspsupprimer&nbsp&nbsp&nbsp&nbsp&nbsp</td>
<tbody>";
$reqt=mysqli_query($connect,"SELECT * FROM fournisseurs where email='$email'");

while($rslt=mysqli_fetch_assoc($reqt)){
	if (isset($_POST['supp'.$rslt['nom_entreprise']])) {
				$entreprise=$rslt['nom_entreprise'];
				$query1="DELETE FROM fournisseurs where nom_entreprise='$entreprise'";
						$rslt22=mysqli_query($connect,$query1);
							if (isset($rslt22)) {
		       				    echo'<script> alert("Effectué!");</script>';
		       				    echo'<meta http-equiv="refresh" content="0">'; 
							}else echo'<script> alert("n\'ete pas Effectué!");</script>';

		}
	
echo "
	<tr>
		<td><input type='text'  name='".$rslt['nom_entreprise']."' class='modprod' value='".$rslt['nom_entreprise']."'></td>
		<td><input type='text'  name='".$rslt['nom_responsable']."' class='modprod' value='".$rslt['nom_responsable']."'></td>
		<td><input type='text'  name='".$rslt['telephone']."' class='modprod' value='0".$rslt['telephone']."'></td>
		<td><input type='text'  name='".$rslt['mobile']."' class='modprod' value='0".$rslt['mobile']."'></td>
		<td><input type='text'  name='".$rslt['adress']."' class='modprod' value='".$rslt['adress']."'></td>
		<td> <input type='submit' class='change' name='supp".$rslt['nom_entreprise']."' value='Supprimer'></td>
	</tr>
	";
	
	

}

echo "</tbody></table>
</form>";	
mysqli_close($connect);
?>


<br><br>
</div>
</body>
</html>