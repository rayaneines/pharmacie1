<?php
include 'profil.php';
include "connectebdd.php";
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Acceuil</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />

</head>
<body>
<div  class="forms">
	
	<div  class="sous-forms">
		<h1> Vente <img src="../images/icons/1 (1).png"></h1>
					<a href="ventes.php">Vente au public </a>
					<a href="vente_grand.php">Ventes en gros</a>
					<a href="retourne.php">Retourne</a>
					<br><br><br>
					<a href="vente_jour.php">État des ventes de jour</a>
					<a href="credit.php">Paiement à terme de vente</a>
		<hr><br><br> <br><br> <br>
	</div>
			<div  class="sous-forms">
				<h1> Approvisionnement <img src="../images/icons/1 (2).png"></h1>
					<a href="achat.php">Ajouter un achat</a>
					<a href="liste_achat.php">Afficher les achats</a>
					<a href="fournisseur.php">Afficher les fournisseurs</a>
						<br><br> <br>
					<a href="ajoutfournisseur.php">Ajouter un  fournisseur</a>
					<hr><br><br> <br><br> <br>
			</div>
	<div  class="sous-forms">
		<h1> Médicaments <img src="../images/icons/1 (4).png"></h1>
			<a href="ajoutprod.php">Ajouter un Produit</a>
			<a href="listeprod.php">Les Produits</a>
			<a href="lacunes.php">Déclaration des lacunes</a>
				<br><br><br>
			<a href="expiration.php">Expiration bientôt</a>
			<hr><br><br> <br><br> <br>
	</div>
			<div  class="sous-forms">
			<h1> Paramètres <img src="../images/icons/1 (9).png"></h1>	
				<a href="dataph.php">Données sur la pharmacies</a>
				<a href="unite.php">Les Unités</a>
				<br><br><br>
			</div>


<?php
mysqli_close($connect);
?>

</div>
</body>
</html>