<?php
session_start();
extract((array)$_SESSION['auth']);
require("auth.php");
if (Auth::isLogged())echo ""; else header('location:logout.php');
//-------------------connection base de donnée--------------------
include "connectebdd.php";
?>
<html  xml:lang="fr" lang="fr">
<head>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/style_profil.css" />
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript" src="../script/phpScript.js"></script>
</head>
<body>
	<div  id="liste">
	<ul>
	 <li><a href="acceuille.php"><i class="fas fa-align-justify"></i> &nbsp Accueil</a></li>
	 <li><a href="ventes.php"><i class="fas fa-balance-scale-left"></i>  &nbsp Ventes</a></li>
	 <li><a href="listeprod.php"><i class="fas fa-sitemap"></i> &nbsp Produits</a></li>
	 <li><a href="achat.php"><i class="fas fa-concierge-bell"></i></i> &nbsp Achats</a></li>
	 <li><a href="dataph.php"><i class="fas fa-user-cog"></i> &nbsp Pramètres</a></li>
	  <li><a href="client.php"><i class="fas fa-notes-medical"></i>  &nbsp Client </a></li>
	 <li><a href="logout.php"><i class="fas fa-sign-in-alt"></i>  &nbsp Déconnecter</a></li>
	</ul>
</div>
<div id="cote">

	<div id="cote1">

<img src="../images/icons/1 (3).png">
		<div id="clock" style="text-align:center;padding:1em 0;">
		 <h4><p><span>Heure actuelle</span><br>Algérie</p></h4>
		  <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=small&timezone=Africa%2FAlgiers" width="100%" height="90" frameborder="0" seamless>
		  </iframe> 
		</div>
	</div>
	<div id="cote2">
		<?php

	   
//------------------- ------------------effacer pharmacie----------------

	    echo "<div class='action' > Cette action va efacer toutes les informations de la Pharmacie dans la base de données définitivement  <br> Continuer?
			<form method='POST' action=".'profil.php'." ><table><tr><td> 
			<input type='submit' class ='btn' name='oui1' value=' &nbsp Oui &nbsp '></td>
		     <td> <div  class ='btn'  onClick='annuler1()' >Annuler </div></td>
		     </tr></table></form></div>";
		     if(isset($_POST['oui1'])){
				$query1="DELETE  FROM les_pharmacies where email='$email'and mdp='$mdp'";
				$rslt=mysqli_query($connect,$query1);
					if (isset($rslt)) {
						session_destroy();
       				    echo'<meta http-equiv="refresh" content="2;url=../index.html"/>';exit();
					}
			}
//---------------------------------- Modifier le nom du pharmacie -----------------------------
 		 echo "<div class='action' > Saisir le nouveau nom du Pharmacie <br> Continuer?
			<form method='POST' action=".'profil.php'." ><table>
			<tr>
			<td><input type='text'  name='namef' placeholder='nouveau nom de pharmacie'></td>
			</tr>
			<tr>
			<td><input type='submit' class ='btn' name='oui2' value=' &nbsp Oui &nbsp '></td>
		    <td> <div  class ='btn'  onClick='annuler2()'>Annuler </div></td>
		     </tr></table></form></div>"; 
		     if(isset($_POST['namef']))$nouvname = $_POST['namef'];else $nouvname = "le nouveau nom du pharmacie n'été pas envoyé en POST Méthod ";
		     if(isset($_POST['oui2'])){
 			 	if(empty($nouvname))  echo'<script> alert("Saisir le nom dabord!");</script>';
  				else{
  					$query2 = "SELECT * FROM les_pharmacies where nom_pharmacie='$nouvname' " ;
			$result2 = mysqli_query($connect, $query2);
			if(mysqli_num_rows($result2)>=1)echo'<script> alert("Ce nom existe déja!");</script>';
						else{
							$query1="UPDATE les_pharmacies SET nom_pharmacie='$nouvname' WHERE email='$email' ";
							$rslt=mysqli_query($connect,$query1);
								if (isset($rslt)) 	
									echo'<script>alert("Efféctué!");</script>';
							}
       				}
			}
			

//---------------------------------- Modifier le nom du propriétaire de pharmacie ------------------------------
		 echo "<div class='action' > Saisir le nouveau nom du propriétaire du pharmacie  <br> Continuer?
			<form method='POST' action=".'profil.php'." >
			<table>
			<tr>
			<td><input type='text'  name='namep' placeholder='nouveau nom de propriétaire'></td>
			</tr>
			<tr>
			<td> <input type='submit' class ='btn' name='oui3' value=' &nbsp Oui &nbsp '></td>
		     <td> <div  class ='btn'  onClick='annuler3()' >Annuler </div></td>
		     </tr></table></form></div>";
		     if(isset($_POST['namep']))$nouvnamep = $_POST['namep'];else $nouvnamep = "le nouveau nom du propriétaire de pharmacie n'été pas envoyé en POST Méthod ";
		     if(isset($_POST['oui3'])){
 			 	if(empty($nouvname))  echo'<script> alert("Saisir le nom dabord!");</script>';
  				else
							$query2="UPDATE les_pharmacies SET nom_proprietaire='$nouvnamep' WHERE email='$email' ";
							$rslt2=mysqli_query($connect,$query2);
								if (isset($rslt2)) 	
									echo'<script>alert("Efféctué!");</script>';
			}
//---------------------------------- Modifier le numero du telephone ------------------------------
		 echo "<div class='action' > changer le numero du telephone  <br> Continuer?
			<form method='POST' action=".'profil.php'." ><table>
			<tr>
       		<td> <input type='text' name='telphon' pattern='(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}' title='format du telephone est 0xxxxxxxxx ou bien 0x.xx.xx.xx.xx' placeholder='Numéro du téléphone...'></td></tr>
			<tr><td> 
			<input type='submit' class ='btn' name='oui4' value=' &nbsp Oui &nbsp '></td>
		     <td> <div  class ='btn'  onClick='annuler4()' >Annuler </div></td>
		     </tr></table></form></div>";
		     if(isset($_POST['telphon']))$nouvnum = $_POST['telphon'];else $nouvnum = "le nouveau numero de pharmacie n'été pas envoyé en POST Méthod ";
		     if(isset($_POST['oui4'])){
 			 	if(empty($nouvname))  echo'<script> alert("Saisir le nom dabord!");</script>';
  				else
							$query3="UPDATE les_pharmacies SET n_tele='$nouvnum' WHERE email='$email' ";
							$rslt3=mysqli_query($connect,$query3);
								if (isset($rslt3)) 	
									echo'<script>alert("Efféctué!");</script>';
			}
////---------------------------------- Modifier le mot de pass ------------------------------
		echo "<div class='action' > modifier le mot de pass <br> Continuer?
			<form method='POST' action=".'profil.php'." ><table>
			<tr> <td> <input type='text' name='mdpp' pattern='^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{5}[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]*$' title='le mot de pass doit etre plus de 5 caractères' placeholder='Mot de pass ...'></td></tr>
			  <tr> <td> <input type='text' name='cmdpp' placeholder='Confirmation de Mot de pass ...'></td></tr>
			<tr><td> 
			<input type='submit' class ='btn' name='oui5' value=' &nbsp Oui &nbsp '></td>
		     <td> <div  class ='btn'  onClick='annuler5()' >Annuler </div></td>
		     </tr></table></form></div>";
		     if(isset($_POST['mdpp']))$Mdp = $_POST['mdpp'];else $Mdp = "le mdp n'été pas envoyé en POST Méthod";
				if(isset($_POST['cmdpp']))$Cmdp = $_POST['cmdpp'];else $Cmdp = "la confirmation e mdp n'été pas envoyé en POST Méthod";
				if(isset($_POST['oui5'])){
 			 	if(empty($Mdp))  echo'<script> alert("Saisir le mdp dabord!");</script>';
 			 	elseif(empty($Cmdp))  echo'<script> alert("Saisir le confirmation dabord!");</script>';
				elseif($Mdp!=$Cmdp){echo'<script> alert("le mot de pass et la confirmation doivent être identiques");</script>';
			}
  				else{
							$query4="UPDATE les_pharmacies SET mdp='$Mdp', cmdp='$Cmdp' WHERE email='$email'";
							$rslt4=mysqli_query($connect,$query4);
								if (isset($rslt4)) 	
									$_SESSION['mdp']=$Mdp;
								$_SESSION['auth']['mdp']=$Mdp;
									echo'<script>alert("Efféctué!");</script>';
									echo'<meta http-equiv="refresh" content="0">';
									}
			}
		     //-------------------------------------------------------------//

		$query = "SELECT * FROM les_pharmacies where email='$email' and mdp='$mdp'" ;
			$result = mysqli_query($connect, $query);
			while($rslt=mysqli_fetch_assoc($result)){
		$pnom=$rslt['nom_pharmacie'];
		$ppropr=$rslt['nom_proprietaire'];
		$ptele=$rslt['n_tele'];
		$ppays=$rslt['pays'];
		$pdevise=$rslt['devise'];
		$pemail=$rslt['email'];
		$pmdp=$rslt['mdp'];
		}	
		echo "<br><br><div onClick='afficher2()'><img class='modif'src='../images/icons/scalpel.png'/></div>".$pnom." <br><div onClick='afficher3()'><img class='modif'src='../images/icons/scalpel.png'/></div>".$ppropr."<br><div onClick='afficher4()'><img class='modif'src='../images/icons/scalpel.png'/></div>	".$ptele."<br>".$ppays."<br>".$pdevise."<br>".$pemail."<br><div onClick='afficher5()'><img class='modif'src='../images/icons/scalpel.png'/></div> modifier mdp";
		    echo "<div class='btn' onClick='afficher1()'>&nbsp Effacer la pharmacie &nbsp</div>";
?>

	</div>
</div>



<?php
//print_r($_SESSION['auth']) ;
mysqli_close($connect);
?>

		<a href="../index.html"><img src="../images/icons/1 (8).png" class='back' /><span id="back">Home</span></a>	
</body>
</html>