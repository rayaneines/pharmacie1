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

if (isset($_POST['annuler'])) {
$_POST['nomsoc']='';
$_POST['nomres']='';
$_POST['telephone']='';
$_POST['Mobile']='';
$_POST['adress']='';
}


if(isset($_POST['nomsoc']))$Nomfourn = $_POST['nomsoc'];else $Nomfourn = "le nom de pharmacie n'été pas envoyé en POST Méthod";
if(isset($_POST['nomres']))$Nomres = $_POST['nomres'];else $Nomres = "le nom de responsable n'été pas envoyé en POST Méthod";
if(isset($_POST['telephone']))$numtele = $_POST['telephone'];else $numtele = "le num de pharmacie n'été pas envoyé en POST Méthod";
if(isset($_POST['Mobile']))$nummobil = $_POST['Mobile'];else $nummobil = "le num de mobile n'été pas envoyé en POST Méthod";
if(isset($_POST['adress']))$adress = $_POST['adress'];else $adress = "Adress n'été pas envoyé en POST Méthod";

if (isset($_POST['enregistrer'])) {
	if(empty($Nomfourn)){echo("<div class='comment'>Vous avez obliger de saisir le nom de Entreprise </div>");}
	elseif(empty($Nomres)){echo("<div class='comment'>Vous avez obliger de saisir le nom de Résponsable </div>");}
	elseif(empty($numtele)){echo("<div class='comment'>Vous avez obliger de saisir le numero du telphone </div>");}
	elseif(empty($nummobil)){echo("<div class='comment'>Vous avez obliger de saisir le numéro du mobile </div>");}	
	elseif(empty($adress)){echo("<div class='comment'>Vous avez obliger de saisir adress </div>");}	
	else {
		
  					$query = "SELECT * FROM fournisseurs where email='$email'and nom_entreprise='$Nomfourn' and adress='$adress'" ;
			$result21 = mysqli_query($connect, $query);
			$count=mysqli_num_rows($result21);
			if($count<1){
			       	$query2="INSERT INTO fournisseurs (email,nom_entreprise,nom_responsable,telephone,mobile,adress)VALUES ('$email','$Nomfourn','$Nomres', '$numtele', '$nummobil', '$adress')";
			        $result = mysqli_query($connect, $query2);
			        			if (isset($result)) 	
									echo'<script>alert("Efféctué!");</script>';
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
				}
	
			else{echo'<script> alert("Cette unité existe déja!");</script>';    }
}}
?>
<br><br><br><br>	
<h2> Ajouter Des Fournisseurs </h2>
<br>
<?php
echo "
<form  method='post' action='ajoutfournisseur.php' >
	";
	?>
<table class='table1'>
<tbody>
	<tr>
	<td class='indice'> Nom du société</td><td><input type='text'  name='nomsoc' class='modprod' title=' utiliser le caractère "_" au lieu d espace'pattern="[a-zA-Z_0-9]*" placeholder="nom du société... " ></td></tr>
	<tr><td class='indice'> Nom de Résponsable</td><td><input type='text'  name='nomres' class='modprod' placeholder="nom du résponsable..." ></td></tr>
	<tr>	<td class='indice'> Téléphone</td><td><input type='text'  name='telephone' class='modprod'  pattern='(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{1}' title='format du telephone est 0xxxxxxxx ou bien 0x.xx.xx.xx.x'placeholder="numero du telephone..." ></td>
	</tr>
	<tr>	<td class='indice'> Mobile</td><td><input type='text'  name='Mobile' class='modprod'  pattern='(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}' title='format du telephone est 0xxxxxxxxx ou bien 0x.xx.xx.xx.xx'placeholder='numéro de mobile ...'></td>
	</tr>
	<tr>	<td class='indice'> Adress</td><td><input type='text'  name='adress' class='modprod' placeholder="adress..."></td>
	</tr>
	<?php echo "
	<tr >
		<td colspan='2'> <input type='submit' class='change ' name='enregistrer' value='Enregistrer'><input type='submit' class='change ' name='annuler' value='Annuler'></td>
	</tr>
	";?>
</form>
</tbody>
	</table>
<?php	
mysqli_close($connect);
?>


<br><br>
</div>
</body>
</html>