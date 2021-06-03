<?php
include 'profil.php';

?>
<html  xml:lang="fr" lang="fr">
<head>
<title>liste des produits</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />

</head>
<body>
<div  class="forms prodform">
<?php
include '../html/liste_medicaments.html';include "connectebdd.php";

?>
<br><br><br><br>
<h2>Affichage la liste des Produits </h2>
<br><br>
<?php

echo "
<form  method='post' action='listeprod.php' >
<table class='table1 table2'>
	<th>
		<tr><td>id</td>  <td>nom de produit</td>  <td>codabar</td>  <td>petit_unite</td><td>quantite</td><td >grand_unite</td><td>minimum</td><td>nb_unit</td><td>prix_vente</td><td>date</td><td>modif</td><td>suppr</td></tr>
	</th>
	<tbody>
	";
$reqt=mysqli_query($connect,"SELECT * FROM les_produits where email = '$email' ORDER BY nom_prod");

while($rslt=mysqli_fetch_assoc($reqt)){
	if(isset($_POST['modifprod'.$rslt['nom_prod']]))$prod = $_POST['modifprod'.$rslt['nom_prod']];else $prod = "le produit n'été pas envoyé en POST Méthod ";
	if(isset($_POST['modifcodbar'.$rslt['codabar']]))$codabar = $_POST['modifcodbar'.$rslt['codabar']];else $codabar = "le codabar n'été pas envoyé en POST Méthod ";
	if(isset($_POST['min'.$rslt['petit_unite']]))$min = $_POST['min'.$rslt['petit_unite']];else $min = "le petite unité n'été pas envoyé en POST Méthod ";
	if(isset($_POST['modifquantite'.$rslt['quantite']]))$maxquan = $_POST['modifquantite'.$rslt['quantite']];else $maxquan = "la quantité n'été pas envoyé en POST Méthod ";
	if(isset($_POST['max'.$rslt['grand_unite']]))$max = $_POST['max'.$rslt['grand_unite']];else $max = "le grand unité n'été pas envoyé en POST Méthod ";
	if(isset($_POST['modifminimum'.$rslt['minimum']]))$minimum = $_POST['modifminimum'.$rslt['minimum']];else $minimum = "le minimum quantité n'été pas envoyé en POST Méthod ";
	if(isset($_POST['modifdedan'.$rslt['nb_dans_grand_unite']]))$dedan = $_POST['modifdedan'.$rslt['nb_dans_grand_unite']];else $dedan = "le nombre dans la grande unité n'été pas envoyé en POST Méthod ";
	if(isset($_POST['modifprix'.$rslt['prix_vente']]))$prix = $_POST['modifprix'.$rslt['prix_vente']];else $prix = "le prix de vente n'été pas envoyé en POST Méthod ";	
	if(isset($_POST['modifdate'.$rslt['date_expire']]))$date = $_POST['modifdate'.$rslt['date_expire']];else $date = "la date d'expiration n'été pas envoyé en POST Méthod ";	

	if (isset($_POST['modifier'.$rslt["nom_prod"]]))
{
 	
	 if(empty($prod)){echo("<div class='comment'>Vous avez obliger de saisir le nom de produit </div>");}
 elseif(empty($codabar)){echo("<div class='comment'>Vous avez obliger de saisir le codabar </div>");}
 elseif(empty($maxquan)){echo("<div class='comment'>Vous avez obliger de saisir la quantité </div>");}
 elseif(empty($minimum)){echo("<div class='comment'>Vous avez obliger de saisir le minimum quantité </div>");}
 elseif(empty($dedan)){echo("<div class='comment'>Vous avez obliger de saisir le nombre de quantité dans la grande unité </div>");}
 elseif(empty($prix)){echo("<div class='comment'>Vous avez obliger de saisir le prix</div>");}
 elseif(empty($date)){echo("<div class='comment'>Vous avez obliger de saisir la date </div>");}

  				else{	/*$query = "SELECT * FROM les_produits where email='$email'and nom_prod='$prod'" ;
					$result23 = mysqli_query($connect, $query);
					$count=mysqli_num_rows($result23);
					if($count<1){*/
				
						$id=$rslt['id_prod'];
			       	$query24="UPDATE les_produits SET nom_prod='$prod', codabar='$codabar',petit_unite='$min' ,quantite='$maxquan',grand_unite='$max', minimum='$minimum', nb_dans_grand_unite='$dedan', prix_vente='$prix', date_expire='$date'WHERE email='$email' and id_prod='$id'";
			        $result24 = mysqli_query($connect, $query24);
			        			if (isset($result24)) {	
									echo'<script>alert("Efféctué!");</script>';									
		       				    	echo'<meta http-equiv="refresh" content="0">';} 
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
					//}
	
				//	else echo'<script> alert("Ce produit existe déja!");</script>'; 
			}
}

	if (isset($_POST['supprimer'.$rslt["nom_prod"]])) {
				$nomprod=$rslt["nom_prod"];
				$query1="DELETE  FROM les_produits where email='$email'and nom_prod='$nomprod' ";
						$rslt22=mysqli_query($connect,$query1);
							if (isset($rslt22)) {
		       				    echo'<script> alert("Effectué!");</script>';
		       				    echo'<meta http-equiv="refresh" content="0">';
							}else echo'<script> alert("n\'ete pas Effectué!");</script>';

		}

	echo "
	<tr>
		<td>".$rslt['id_prod']."</td>
		<td><input type='text' class='modprod' name='modifprod".$rslt['nom_prod']."' value='".$rslt['nom_prod']."'></td>		
		<td><input type='text' class='modprod' name='modifcodbar".$rslt['codabar']."' value='".$rslt['codabar']."'></td>
		<td>
		<select name='min".$rslt['petit_unite']."' class='selected select'>
		<option>".$rslt['petit_unite']."</option>	";	
		$query11="SELECT * from unite where email='$email' ";
		$resut11=mysqli_query($connect,$query11);
		while($rslt11=mysqli_fetch_assoc($resut11)){
		echo"<option value=".$rslt11['unite']." >".$rslt11['unite']." </option>";
		}	
		echo "</select> </td>
		<td><input type='text' class='modprod' name='modifquantite".$rslt['quantite']."' value='".$rslt['quantite']."'></td>

		<td>
		<select name='max".$rslt['grand_unite']."' class='selected select'>
		<option>".$rslt['grand_unite']."</option>	";	
		$query12="SELECT * from unite where email='$email' ";
		$resut12=mysqli_query($connect,$query12);
		while($rslt12=mysqli_fetch_assoc($resut12)){
		echo"<option value=".$rslt12['unite']." >".$rslt12['unite']." </option>";
		}	
		echo "</select> </td>
		<td><input type='text' class='modprod' name='modifminimum".$rslt['minimum']."' value='".$rslt['minimum']."'></td>
		<td ><input type='text' class='modprod'style='width:60px;' name='modifdedan".$rslt['nb_dans_grand_unite']."' value='".$rslt['nb_dans_grand_unite']."'></td>
		<td><input type='text' class='modprod' name='modifprix".$rslt['prix_vente']."' value='".$rslt['prix_vente']."'></td>
        <td><input type='date' class='modprod' style='width:110px;' name='modifdate".$rslt['date_expire']."' value='".$rslt['date_expire']."'></td>
		<td> <input type='submit'class='change ch' name='modifier".$rslt['nom_prod']."' value='Modif'></td>
		<td> <input type='submit'class='change ch' name='supprimer".$rslt['nom_prod']."' value='Suppr'></td>
	</tr>
	";
}
 //	id_prod email nom_prod codabar petit_unite quantite grand_unite minimum nb_dans_grand_unite prix_vente date_expire
echo "</tbody>
	</table></form>";
mysqli_close($connect);
?>

</tbody>
</table>
</form>
<br><br>
</div>
</body>
</html>