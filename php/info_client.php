<?php
include 'profil_client.php';
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Les Clients</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />

</head>
<body>

<div  class="forms">
	
<h2>informations personnels</h2>
<?php 
include "connectebdd.php";
echo "
<form  method='post' action='info_client.php' >
<table>
<tr><td>
<label class='indice'>Date d'achat':</label></td>
<td><input type='text' name='date'  class='modprod' value='". date('Y-m-d')."'></td></tr>
<br>
<tr><td><label class='indice'>utliser carte_eldahabiya?:</label></td>
<td><input type='text' class='modprod' name='eldahabiya'pattern='[0-9]{9}' title='forme du numéro_assurance xxxxxxxxx'placeholder='numéro eldahabiya...' ></td></tr>

<br>
<tr><td><label class='indice'>utliser carte_chifa?:</label></td>
<td><input type='text' class='modprod' name='numéro_assurance' pattern='[0-9]{9}' title='forme du numéro_assurance xxxxxxxxx'placeholder='numéro_assurance...'></td></tr>

<br>
<tr><td><label class='indice'>importer ordenance:</label></td>
<td><input type='submit'class='change ch' style='left:50%;'name='ok' value='ok'></td>
<td><input type='file' name='ordenance' class='modprod' accept='image/*,.jpg,.jpeg,.png'></td>
</tr>
<table>
";
if(isset($_POST['eldahabiya']))$eldahabiya = $_POST['eldahabiya'];else $eldahabiya = "eldahabiya n'été pas envoyé en POST Méthod ";
if(isset($_POST['date']))$date = $_POST['date'];else $date = "la date n'été pas envoyé en POST Méthod ";
if(isset($_POST['numéro_assurance']))$numéro_assurance = $_POST['numéro_assurance'];else $eldahabiya = "numéro_assurance n'été pas envoyé en POST Méthod ";
if(isset($_POST['ordenance'])){$ordenance = $_POST['ordenance'];
$target_dir = "../ordenances/";
$target_file = $target_dir.basename($_FILES["$ordenance"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
} 
}else $ordenance = "ordenance n'été pas envoyé en POST Méthod ";
if (isset($_POST['ok']))
{
 	
	if(empty($ordenance)){echo("<div class='comment'>Vous avez obliger d'importer' l'ordenance </div>");}

  				else{
				if(empty($eldahabiya))$eldahabiya='cache';
				if(empty($numéro_assurance))$numéro_assurance='0';
			     $query25="INSERT INTO commandes (id,email_client,nom_produit,quantite,date_cmm,pret_pas_encore,envoye,ordenance,carte_eldahabiya,numero_assurance) VALUES (NULL,'$email1','null','0','$date','pas_encore','non','$ordenance','$eldahabiya','$numéro_assurance');";
			        $result25 = mysqli_query($connect, $query25);
			        			if (isset($result25)) {	
								echo'<script>alert("Efféctué!");</script>';								//echo'<meta http-equiv="refresh" content="0">';
		       				    } 

								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
					//}
	
				//	else echo'<script> alert("Ce produit existe déja!");</script>'; 
			}
}
echo"


<h2>mes commandes</h2>
<table class='table1 table2'>
	<th>
		<tr><td>id_commande</td>  <td>nom de produit</td>  <td>quantité</td><td>date_commande</td><td>commande_prêt</td><td>command envoyé</td><td>annuler</td></tr>
	</th>
	<tbody>
	";
$reqt1=mysqli_query($connect,"SELECT * FROM commandes where email_client= '$email1' ");
while($rslt1=mysqli_fetch_assoc($reqt1)){
echo "
	<tr>
		<td>".$rslt1['id']."</td>
		<td><input type='text' class='modprod' name='annulercommmande".$rslt1['nom_produit']."' value='".$rslt1['nom_produit']."'></td>	
		<td><input type='text' class='modprod' name='annulercommmande".$rslt1['quantite']."' value='".$rslt1['quantite']."'></td>
		<td><input type='text' class='modprod' name='annulercommmande".$rslt1['date_cmm']."' value='".$rslt1['date_cmm']."'></td>
		<td><input type='text' class='modprod' name='annulercommmande".$rslt1['pret_pas_encore']."' value='".$rslt1['pret_pas_encore']."'></td>
		<td><input type='text' class='modprod' name='annulercommmande".$rslt1['envoye']."' value='".$rslt1['envoye']."'></td>		
		
		<td> <input type='submit'class='change ch' style='width:100px;'name='annuler".$rslt1['nom_produit']."' value='annuler'></td>
     
	</tr>
	";

	if (isset($_POST['annuler'.$rslt1["nom_produit"]])) {
				$nomprod=$rslt["nom_produit"];
				$query11="DELETE  FROM commandes where email_client='$email1'and nom_produit='".$rslt1['nom_produit']."' ";
						$rslt22=mysqli_query($connect,$query11);
							if (isset($rslt22)) {
		       				    echo'<script> alert("Effectué!");</script>';
		       				    echo'<meta http-equiv="refresh" content="0">';
							}else echo'<script> alert("n\'ete pas Effectué!");</script>';

		}

}










echo "
</tbody>
</table>
<h2>produits du pharmacie</h2>
<table class='table1 table2'>
	<th>
		<tr><td>id</td>  <td>nom de produit</td>  <td>codabar</td><td>unité</td><td>quantité</td><td>prix_vente</td><td>commander</td></tr>
	</th>
	<tbody>
	";

	$reqt=mysqli_query($connect,"SELECT * FROM les_produits where email = '$email' ORDER BY nom_prod");

while($rslt=mysqli_fetch_assoc($reqt)){
	if(isset($_POST['modifprod'.$rslt['nom_prod']]))$prod = $_POST['modifprod'.$rslt['nom_prod']];else $prod = "le produit n'été pas envoyé en POST Méthod ";
	if(isset($_POST['modifquantite'.$rslt['quantite']]))$maxquan = $_POST['modifquantite'.$rslt['quantite']];else $maxquan = "la quantité n'été pas envoyé en POST Méthod ";	
	if(isset($_POST['eldahabiya']))$eldahabiya = $_POST['eldahabiya'];else $eldahabiya = "la carte eldahabiya n'été pas envoyé en POST Méthod ";	
	if(isset($_POST['date']))$date = $_POST['date'];else $date = "la date n'été pas envoyé en POST Méthod ";
	if(isset($_POST['ordenance']))$ordenance = $_POST['ordenance'];else $ordenance = "ordenancen'été pas envoyé en POST Méthod ";	
	if(isset($_POST['date']))$date = $_POST['date'];else $date = "la date n'été pas envoyé en POST Méthod ";

	if (isset($_POST['commander'.$rslt["nom_prod"]]))
{
 	
	 if(empty($prod)){echo("<div class='comment'>Vous avez obliger de saisir le nom de produit </div>");}
 elseif(empty($maxquan)){echo("<div class='comment'>Vous avez obliger de saisir la quantité </div>");}

  				else{	/*$query = "SELECT * FROM les_produits where email='$email'and nom_prod='$prod'" ;
					$result23 = mysqli_query($connect, $query);
					$count=mysqli_num_rows($result23);
					if($count<1){*/
				if(empty($eldahabiya))$eldahabiya='cache';
				if(empty($ordenance))$ordenance='null';
				if(empty($numéro_assurance))$numéro_assurance='0';
			       	$query24="INSERT INTO commandes (id,email_client,nom_produit,quantite,date_cmm,pret_pas_encore,envoye,ordenance,carte_eldahabiya,numero_assurance) VALUES (NULL, '$email1','$prod','$maxquan','$date','pas_encore','non','$ordenance','$eldahabiya','$numéro_assurance');";
			        $result24 = mysqli_query($connect, $query24);
			        			if (isset($result24)) {	
									echo'<script>alert("Efféctué!");</script>';									
		       				    	echo'<meta http-equiv="refresh" content="0">';
		       				    } 

								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
					//}
	
				//	else echo'<script> alert("Ce produit existe déja!");</script>'; 
			}
}

	
echo "
	<tr>
		<td>".$rslt['id_prod']."</td>
		<td><input type='text' class='modprod' name='modifprod".$rslt['nom_prod']."' value='".$rslt['nom_prod']."'></td>		
		<td><input type='text' class='modprod' name='modifcodbar".$rslt['codabar']."' value='".$rslt['codabar']."'></td>
		
			<td><input type='text' class='modprod' name='modifquantite".$rslt['petit_unite']."' value='".$rslt['petit_unite']."'></td>
			<td><input type='text' class='modprod' name='modifquantite".$rslt['quantite']."' ></td>
		<td><input type='text' class='modprod' name='modifprix".$rslt['prix_vente']."' value='".$rslt['prix_vente']."'></td>
		<td> <input type='submit'class='change ch' style='width:100px;'name='commander".$rslt['nom_prod']."' value='commander'></td>
     
	</tr>
	";
}
 //	id_prod email nom_prod codabar petit_unite quantite grand_unite minimum nb_dans_grand_unite prix_vente date_expire
echo "</tbody>
	</table></form>";
mysqli_close($connect);
?>
<br><br>
</div>
</body>
</html>