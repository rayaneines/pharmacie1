<?php
include 'profil.php';
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Ajouter produits</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />

</head>
<body>
<div  class="forms">
<?php
include '../html/liste_medicaments.html';
include "connectebdd.php";
if (isset($_POST['annuler'])) {
	$_POST['ajoutunite']='';
}

if(isset($_POST['nomprod']))$nomprod=$_POST['nomprod'];else $nomprod=" la variable nomprod n'été pas envoyé en POST méthod";
if(isset($_POST['barcod']))$barcod=$_POST['barcod'];else $barcod=" la variable barcod n'été pas envoyé en POST méthod";
if(isset($_POST['min']))$min=$_POST['min'];else $min=" la variable min n'été pas envoyé en POST méthod";
if(isset($_POST['maxquan']))$maxquan=$_POST['maxquan'];else $maxquan=" la variable maxquan n'été pas envoyé en POST méthod";
if(isset($_POST['max']))$max=$_POST['max'];else $max=" la variable max n'été pas envoyé en POST méthod";
if(isset($_POST['minquant']))$minquan1=$_POST['minquant'];else $minquan1=" la variable minquat n'été pas envoyé en POST méthod";
if(isset($_POST['dedan']))$dedan=$_POST['dedan'];else $dedan=" la variable dedan n'été pas envoyé en POST méthod";
if(isset($_POST['prix']))$prix=$_POST['prix'];else $prix=" la variable prix n'été pas envoyé en POST méthod";
 if(isset($_POST['jour']))$jour = $_POST['jour'];else $jour = "le jour n'été pas envoyé en POST Méthod ";
 if(isset($_POST['mois']))$mois = $_POST['mois'];else $mois = "le mois n'été pas envoyé en POST Méthod ";
 if(isset($_POST['annees']))$annees = $_POST['annees'];else $annees = "le annees n'été pas envoyé en POST Méthod ";
$date=$annees."-".$mois."-".$jour;

if (isset($_POST['enregis'])) {
 	if(empty($nomprod)){echo("<div class='comment'>Vous avez obliger de saisir le nom de produit </div>");}
 elseif(empty($min)){echo("<div class='comment'>Vous avez obliger de saisir le min unité </div>");}
 elseif(empty($maxquan)){echo("<div class='comment'>Vous avez obliger de saisir la quantité </div>");}
 elseif(empty($max)){echo("<div class='comment'>Vous avez obliger de saisir le grand unité </div>");}
 elseif(empty($minquan1)){echo("<div class='comment'>Vous avez obliger de saisir le minimum quantité </div>");}
 elseif(empty($dedan)){echo("<div class='comment'>Vous avez obliger de saisir le nombre dans la grande quantité </div>");}
 elseif(empty($prix)){echo("<div class='comment'>Vous avez obliger de saisir le prix </div>");}

else{
  				
  					$query = "SELECT * FROM les_produits where email='$email'and nom_prod='$nomprod' " ;  					
			$result21 = mysqli_query($connect, $query);
			$nb=mysqli_num_rows($result21);
			if($nb<1){
				
$query2="INSERT INTO `les_produits` (`id_prod`, `email`, `nom_prod`, `codabar`, `petit_unite`, `quantite`, `grand_unite`, `minimum`, `nb_dans_grand_unite`, `prix_vente`, `date_expire`) VALUES (NULL, '$email', '$nomprod', '$barcod', '$min', '$maxquan', '$max', '$minquan1', '$dedan', '$prix', '$date');";
			        $result = mysqli_query($connect, $query2);
			        			if (isset($result)) {	
									echo'<script>alert("Efféctué!");</script>';}
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';

				}
			else echo'<script> alert("Ce produit existe déja!");</script>';	


		}
}


	?>
<br><br><br><br>
<h2> Ajouter Un Produit </h2>
<br><br>
<div  class ='btn c'  onClick='aide()' > Aide à enregistrer un nouvel article/produit !!</div>

<form  method='POST' action='ajoutprod.php' id="ajprod">
	
	<div class="indice">Nom du Produit :</div><input type='text' class='inputtext' name='nomprod' placeholder=' le nom de produit...'>
	<div class="indice">Bar code :</div><input type='text' name='barcod' class='inputtext' placeholder='  bar code...'>
		<br> <br><hr><br><br> <br>

<div class="indice"> Plus Petit Unité :</div>
<select name='min' class='selected'>
<option></option>
<?php
$query11="SELECT * from unite where email='$email' ";
$resut11=mysqli_query($connect,$query11);
while($rslt=mysqli_fetch_assoc($resut11)){
echo"<option value=".$rslt['unite']." >".$rslt['unite']." </option>";
}
?>
</select>
<div class="indice">Quantité :</div><input type='number' min='1' class='inputtext' name='maxquan' value="1" >

<div class="indice"> PLus Grande Unité :</div> 
<select name='max' class='selected'>
<option></option>
<?php
$query11="SELECT * from unite where email='$email' ";
$resut11=mysqli_query($connect,$query11);
while($rslt=mysqli_fetch_assoc($resut11)){
echo"<option value=".$rslt['unite']." >".$rslt['unite']." </option>";
}?>
</select>
<div class="indice"> Minimum :</div><input type='number' class='inputtext' min='1'  value='1' name='minquant' >
<div class="indice"> Nombre dans la grande unité :</div> <input type='number'  min='1' value='1'class='inputtext' name='dedan' >
<br> <br><hr><br><br> <br>

<div class="indice">Prix de vente :</div><input type='number' class='inputtext' min='0' step='0.10'name='prix' >
<div class="indice">Date d’expiration :</div>
<?php
$selected = '';
echo '<select name="jour" class="selected">',"\n";
for($i=1; $i<=31; $i++)
{
if($i == date('d'))
{
$selected = ' selected="selected"';
}
echo "\t",'<option value="', $i ,'"', $selected ,'>', $i ,'</option>',"\n";
$selected='';
}
echo '</select>',"\n";

echo '/';
$selected = '';
echo '<select name="mois" class="selected">',"\n";
for($i=1; $i<=12; $i++)
{
if($i == date('m'))
{
$selected = ' selected="selected"';
}
echo "\t",'<option value="', $i ,'"', $selected ,'>', $i,'</option>',"\n";
$selected='';
}
echo '</select>',"\n";

echo '/';
$selected = '';
echo '<select name="annees" class="selected">',"\n";
for($i=2009; $i<=2030; $i++)
{
if($i == date('Y'))
{
$selected = ' selected="selected"';
}
echo "\t",'<option value="', $i ,'"', $selected ,'>', $i ,'</option>',"\n";
$selected='';
}
echo '</select>',"\n";?>
<br> <br><hr><br><br> <br>

	<input type='submit'class='change' name='enregis' value='Enregistrer'>
	<input type='submit'class='change'  name='annuler' value='Annuler' >
</form>
	<div id="aide">
		<h2>Aide à enregistrer un nouvel article/produit !!</h2>
		<ul>
			<li> Le nom de l’article est: le nom du médicament que vous voulez enregistrer.</li>
			<li> La plus petite unité: est la plus petite unité dans laquelle le produit est vendu comme un bar</li>
			<li> La quantité: est la quantité dans la pharmacie de la plus petite unité où le produit est vendu, comme 10 ampoules.</li>
			<li> Le prix de vente: est le prix de vente de la plus petite unité du produit est vendu</li>
			<li> Le nombre minimum de quantités montre qu’il s’agit d’une carence.</li>
			<li> La plus grande unité est: le nombre dans l’unité où le produit a été acheté, par exemple si une boîte de 5 ampals est achetée à l’intérieur de chaque boîte, le nombre est de 5.</li>
			<div  class ='btn c'  onClick='annuler6()' >Annuler </div>
		</ul>
	</div>
<?php
mysqli_close($connect);
?>


<br><br>
</div>
</body>
</html>