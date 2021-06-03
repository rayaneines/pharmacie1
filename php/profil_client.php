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

	   
//------------------- ------------------effacer le profil----------------

	    echo "<div class='action' > Cette action va efacer toutes les informations de client dans la base de données définitivement  <br> Continuer?
			<form method='POST' action=".'profil_client.php'." ><table><tr><td> 
			<input type='submit' class ='btn' name='oui1' value=' &nbsp Oui &nbsp '></td>
		     <td> <div  class ='btn'  onClick='annuler1()' >Annuler </div></td>
		     </tr></table></form></div>";
		     if(isset($_POST['oui1'])){
				$query1="DELETE  FROM clients where email1='$email1'and mdp='$mdp1'";
				$rslt=mysqli_query($connect,$query1);
					if (isset($rslt)) {
						session_destroy();
       				    echo'<meta http-equiv="refresh" content="2;url=../index.html"/>';exit();
					}
			}
//---------------------------------- Modifier le nom du client -----------------------------
 		 echo "<div class='action' > Saisir le nouveau nom du client<br> Continuer?
			<form method='POST' action=".'profil_client.php'." ><table>
			<tr>
			<td><input type='text'  name='namef' placeholder='nouveau nom de client'></td>
			</tr>
			<tr>
			<td><input type='submit' class ='btn' name='oui2' value=' &nbsp Oui &nbsp '></td>
		    <td> <div  class ='btn'  onClick='annuler2()'>Annuler </div></td>
		     </tr></table></form></div>"; 
		     if(isset($_POST['namef']))$nouvname = $_POST['namef'];else $nouvname = "le nouveau nom n'été pas envoyé en POST Méthod ";
		     if(isset($_POST['oui2'])){
 			 	if(empty($nouvname))  echo'<script> alert("Saisir le nom dabord!");</script>';
  				else{
  					$query2 = "SELECT * FROM clients where nom_client='$nouvname' " ;
			$result2 = mysqli_query($connect, $query2);
			if(mysqli_num_rows($result2)>=1)echo'<script> alert("Ce nom existe déja!");</script>';
						else{
							$query1="UPDATE clients SET nom_client='$nouvname' WHERE email1='$email1' ";
							$rslt=mysqli_query($connect,$query1);
								if (isset($rslt)) 	
									echo'<script>alert("Efféctué!");</script>';
							}
       				}
			}
			

//---------------------------------- Modifier l'adress------------------------------
		 echo "<div class='action' > Saisir le nouveau adress  <br> Continuer?
			<form method='POST' action=".'profil_client.php'." >
			<table>
			<tr>
			<td><input type='text'  name='namep' placeholder='nouveau adress'></td>
			</tr>
			<tr>
			<td> <input type='submit' class ='btn' name='oui3' value=' &nbsp Oui &nbsp '></td>
		     <td> <div  class ='btn'  onClick='annuler3()' >Annuler </div></td>
		     </tr></table></form></div>";
		     if(isset($_POST['namep']))$nouvnamep = $_POST['namep'];else $nouvnamep = "le nouveau nom du propriétaire de pharmacie n'été pas envoyé en POST Méthod ";
		     if(isset($_POST['oui3'])){
 			 	if(empty($nouvname))  echo'<script> alert("Saisir le nom dabord!");</script>';
  				else
							$query2="UPDATE clients SET adress_client='$nouvnamep' WHERE email1='$email1' ";
							$rslt2=mysqli_query($connect,$query2);
								if (isset($rslt2)) 	
									echo'<script>alert("Efféctué!");</script>';
			}
//---------------------------------- Modifier le numero du telephone ------------------------------
		 echo "<div class='action' > changer le numero du telephone  <br> Continuer?
			<form method='POST' action=".'profil_client.php'." ><table>
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
							$query3="UPDATE clients SET num_client='$nouvnum' WHERE email1='$email1' ";
							$rslt3=mysqli_query($connect,$query3);
								if (isset($rslt3)) 	
									echo'<script>alert("Efféctué!");</script>';
			}
////----------------------------------
			
		     //-------------------------------------------------------------//

		$query = "SELECT * FROM clients where email1='$email1' and mdp='$mdp1'" ;
			$result = mysqli_query($connect,$query);
			while($rslt=mysqli_fetch_assoc($result)){
		$nom=$rslt['nom_client'];
		$adress=$rslt['adress_client'];
		$tele=$rslt['num_client'];
		$mdp=$rslt['mdp'];
		}	
		echo "<br><br><div onClick='afficher2()'><img class='modif'src='../images/icons/scalpel.png'/></div>".$nom." <br>
		<div onClick='afficher3()'><img class='modif'src='../images/icons/scalpel.png'/></div>".$adress."<br>
		<div onClick='afficher4()'><img class='modif'src='../images/icons/scalpel.png'/></div>".$tele."<br>
		";
		    echo "<div class='btn' onClick='afficher1()'>&nbsp Effacer le client &nbsp</div>";
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