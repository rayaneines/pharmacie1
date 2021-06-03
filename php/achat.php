
<?php
include 'profil.php';
include "connectebdd.php";
if(isset($_POST['client']))$fournisseur = $_POST['client'];else$fournisseur="le fournisseur n'été pas envoyé en POST Méthod";
if(isset($_POST['date']))$date = $_POST['date'];else$date="la date n'été pas envoyé en POST Méthod";

if(isset($_POST['totalprod']))$nbpro = $_POST['totalprod'];else$nbpro ="lenombre des produits n'été pas envoyé en POST Méthod";

if(isset($_POST['drone']))$ache = $_POST['drone'];else$ache="le cache/crédit n'été pas envoyé en POST Méthod";

if(isset($_POST['totalevene']))$total=$_POST['totalevene'];else$total="le totale n'été pas envoyé en POST Méthod";
if(isset($_POST['redvene']))$reduction=$_POST['redvene'];else$reduction="la reduction n'été pas envoyé en POST Méthod";
if(isset($_POST['adonner']))$payer = $_POST['adonner'];else $payer= "le nom de pharmacie n'été pas envoyé en POST Méthod";

	if (isset($_POST['annuler'])) {
	$_POST['date']='';
	$_POST['totalprod']='';
	$_POST['drone']='';
	$_POST['totalevene']='';
	$_POST['adonner']='';
	$_POST['redvene']='';
}

if (isset($_POST['enregistrer1'])) {
	if(empty($date)){echo("<div class='comment c' style='top:350px;'>Vous avez obliger de saisir la date du vente !</div>");}
	elseif(empty($fournisseur)){echo("<div class='comment c' style='top:350px;'>pas de fournisseur à acheter!</div>");}
 elseif(empty($nbpro)){echo("<div class='comment c' style='top:350px;'>pas de produit à vendre!</div>");}
  elseif(empty($ache)){echo("<div class='comment c' style='top:350px;'>cache ou crédit!</div>");}
   elseif(empty($total)){echo("<div class='comment c' style='top:350px;'>Vous avez obliger de saisir le totale du vente !</div>");}
    elseif(empty($payer)){echo("<div class='comment c' style='top:350px;'>Vous avez obliger de saisir le prix du vente totale!</div>");}
     else{

     	/* numero 	email 	fournisseur 	date_achat 	nb_produit 	total 	reduction 	pour_paye 	credit_cache */ 

$query2="INSERT INTO achat (email,fournisseur,date_achat,nb_produit,total,reduction ,pour_paye, credit_cache)VALUES ('$email','$fournisseur','$date','$nbpro','$total','$reduction', '$payer','$ache')";
			        $result = mysqli_query($connect, $query2);
			        			if (isset($result)) 	
									echo'<script>alert("Efféctué!");</script>';	
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
								//echo $fournisseur."/".$date."/".$nbpro."/".$ache."/".$total."/".$reduction."/".$payer;
								

     }}
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>les Achats</title>
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
<h2> Les Achats </h2>
<br><div  class ='btn c'  onClick='aide()' > Aide à enregistrer une opération d'achat!!</div><br>


<form method="post" action="achat.php" class="hr1"> 
<table class="table2">
	<tbody>
<tr>		<td><label class="indice"> Achat numero:</label></td>
				<?php
					$query13="SELECT MAX(numero) from achat where email='$email' ORDER BY numero DESC";
					$resut13=mysqli_query($connect,$query13);
					if (mysqli_num_rows($resut13) > 0) {
						 $rslt13=mysqli_fetch_array($resut13); 
						 $nu=(int)$rslt13['MAX(numero)']+1;
						}
					echo"<td><input type='text' readonly name='num' style='left:0px;width:100px;' class='inputtext modprod' value=".$nu." >";
				?>
			</td>
			<td><label class="indice">fournisseur:</label></td>
			<td>
				<select name='client' id='clien' class='selected select'>
		<option></option>
		<?php
		$query11="SELECT * from fournisseurs where email='$email' ";
		$resut11=mysqli_query($connect,$query11);
		while($rslt=mysqli_fetch_assoc($resut11)){
		echo"<option value=".$rslt['nom_entreprise']." >".$rslt['nom_entreprise']." </option>";
		}
		?>
		</select>
			</td>
			<td><label class="indice">Date d'achat':</label></td>
			<td><input type='date' name='date' style="left:0px;width:150px;" class='inputtext modprod' value="<?php echo date('Y-m-d'); ?>"></td>
			</td>
</tr>
</tbody>
	</table>
	<br><hr><br><br>
	<table class="table1 table2" id="tab">

		<thead>
			<td><label class="indice">Produit :</label></td>
			<td><label class="indice"> Unité :</label></td>
			<td><label class="indice">Quantit:</label></td>
			<td><label class="indice">Prix:</label></td>
			<td><label class="indice">Réduction(%):</label></td>
			<td><label class="indice">&nbsp;&nbsp;&nbsp;&nbsp;Totale:&nbsp;&nbsp;&nbsp;&nbsp; </label></td>
			<td><label class="indice">Ajout-au-fact</label></td>
		</thead>
	<tbody>	
			

<tr>
		<td>
		<select name='prod' id='prod' class='selected' onchange="determinePrix()">
		<option></option>
		<?php
		$query11="SELECT * from les_produits where email='$email' ";
		$resut11=mysqli_query($connect,$query11);
		while($rslt=mysqli_fetch_assoc($resut11)){
		echo"<option value=".$rslt['nom_prod']." >".$rslt['nom_prod']." </option>";
		}
		?>
		</select></td>


		<td>
		<select name='unit' id='unit' class='selected '>
		<option></option>
		<?php
		$query12="SELECT petit_unite from les_produits where email='$email' ";
		$resut12=mysqli_query($connect,$query12);
		while($rslt12=mysqli_fetch_assoc($resut12)){
		echo"<option value=".$rslt12['petit_unite']." >".$rslt12['petit_unite']." </option>";
		}
		?>
		</select></td>
		<td>	<input type='number' id='quant' min='0'name='quant' class='inputtext ' onchange="determineTotale1()" value='0'></td>
	<td>	
		<select name='prix' id='prix' class='selected' >
		<option></option>
		<?php
		$query11="SELECT * from les_produits where email='$email' ";
		$resut11=mysqli_query($connect,$query11);
		while($rslt=mysqli_fetch_assoc($resut11)){
		echo"<option value=".$rslt['prix_vente']." >".$rslt['prix_vente']." </option>";
		}
		?>
		</select></td>
	<td>	<input type='number'min="0" step="0.01" id='sold' name='sold' class='inputtext modprod'  onchange="determineTotale1()"></td>
	<td>	<input type='number'min="0" step="0.01" id='totale' name='totale' class='inputtext modprod' ></td>
	<td><img class="img" src="../images/icons/3.png" onclick="addRow1()"></td>

</tr>
	</tbody>
	</table>
<hr><br><br> <br>
	<table class="table2">
	<tbody>

		<tr>
			<td><label class="indice" style="font-size: 14pt;">nombre-Produits:</label><input type='text' name='totalprod' class='inputtext modprod'style="width:80px;" id='nbprod' readonly>
			   <input type="radio" id="cach" name="drone"  value="cache"checked><label for="cach">Cache</label>
			   <input type="radio" id="credit" name="drone"  value="credit"><label for="credit">Crédit</label></td>

			<td><label class="indice" style="font-size: 14pt;">Totale:</label><input type='text' id='tot'style="width:120px;" name='totalevene' class='inputtext modprod'  readonly></td>
			<td><label class="indice" style="font-size: 14pt;">Réduction(%):</label><input type='number' step="0.01" min="0"id='red'style="width:80px;" name='redvene' class='inputtext modprod' value='0' onchange="totvene1()" ></td>
			<td><label class="indice" style="font-size: 14pt;">Pour payer:</label><input type='number' min='0' step='0.01' id='donner'name='adonner' style="width:100px;" class='inputtext modprod' value="<?php echo (isset($Nom));?>"></td>
<?php
$query11="SELECT * from les_pharmacies where email='$email' ";
		$result11=mysqli_query($connect,$query11);
		$result=mysqli_fetch_assoc($result11);
		$count=mysqli_num_rows($result11);
		if ($count==1) {
			$devise=$result["devise"];
		}else $devise="echec";
?>
			<td><label class="indice">Devise:</label><input type='text' name='devisea' class='inputtext modprod' readonly value="<?php echo $devise; ?> "></td>
			<td><input type='submit' name='enregistrer1' class='change ch' value="Enregistrer" ></td>
			<td><input type='submit' name='annuler' class='change ch' value="Annuler"></td>
		</tr>

	</tbody>
	</table>

</form>
<div id="aide">
		<h2>Aide à enregistrer une opération d'achat!!</h2>
		<br>
		<ul>
			<li> Le nom de l’article est: le nom du médicament que vous voulez enregistrer.</li>
			<li> le choix d'unité: est la plus petite unité dans laquelle le produit est acheté par exemple un bar</li>
			<li> La quantité: est la quantité ou le nombre de la plus petite unité où le produit est acheté, comme 10 ampoules.</li>
			<li> Le prix d'achat: est le prix de vente de la plus petite unité du produit est vendu</li>
			<li> le totale : est leprix du plus petite unité fois la quantité et s'il ya une obligation pour élevé le prix sa se fait mannuellement</li>
			<li>la Réduction: pour moindre une poucentage depuis le totale  du prix soit de chaque produit ou bien de la facture complette </li>
			<li>aprés avoire remplir les champs tu doit ajouter ce produit au facture par une click sur la boutonne vert puis remplir les champs pour un autre produit</li>
			<li>cliquant enregistrer pour valider l'opération d'achat'</li>
			<div  class ='btn c'  onClick='annuler6()' >Annuler </div>
		</ul>
	</div>
<?php

mysqli_close($connect);

?>
<br>
</div>
</body>
</html>