<?php
session_start();

include '../html/header.html';
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Connecter à une Pharmacie</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/style_php.css" />
<script type= "text/javascript" src="../script/phpScript.js"></script> 
</head>
<body>

<div class="forms"id='f1'>
<?php
include "connectebdd.php";

if(isset($_POST['email']))$Email = $_POST['email'];else $Email = "l'email de pharmacie n'été pas envoyé en POST Méthod";
if(isset($_POST['mdp']))$Mdp = $_POST['mdp'];else $Mdp = "le mdp n'été pas envoyé en POST Méthod";

if(isset($_POST['connecter'])){
	if(empty($Email)){echo("<div class='comment'>Vous avez obliger de saisir l'email'</div>");}
  elseif(empty($Mdp)){echo("<div class='comment'>Vous avez obliger de saisir le mot de pass</div>");}
      else {
        
$query = "SELECT email,mdp FROM les_pharmacies where email='$Email' and mdp='$Mdp'" ;
	$result = mysqli_query($connect, $query);

	while($rslt=mysqli_fetch_assoc($result)){
$email=$rslt['email'];
$mdp=$rslt['mdp'];
}	
			if(mysqli_num_rows($result)<1)
						echo "<div class='comment'>ces informations ne sonts pas existe!soit l'email ou le mot de pass erroné</div>";
		elseif(mysqli_num_rows($result)==1){
		if ($Email==$email&&$Mdp==$mdp) {
		$_SESSION['auth']=array('email'=>$email,'mdp'=>$mdp );
		 ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);
			$_SESSION['email']=$email;
			$_SESSION['mdp']=$mdp;
        echo'<div class="att"><ul><li>  Attendez quelques secondes svp! ... &nbsp&nbsp&nbsp <img class="imgatt"src="../images/icons/gip21hy.gif"/></li></ul></div>';
         echo'<meta http-equiv="refresh" content="2;url=profil.php"/>';exit();
		}
		}else echo "<div class='comment'>le nombre des utilisteur est plus de 1 !</div>";
}
}

echo("<form method='post' action=".'login.php'.">
	<table>
     <tr>
       <td class='indice'> Email</td><td> <input type='text' name='email' placeholder='Email ...'></td></tr>
    <tr>
       <td class='indice'  >Mot de pass</td><td> <input type='password' name='mdp' id='pw' placeholder='Mot de pass...'></button></td></tr>
     <tr> 
     	<td colspan='2' align='center'> <button type='button' class='eye' onClick='togglePwd()'><img class='eye'src='../images/icons/giphy_s (3).gif' ></td></tr>
	<tr>
       <td colspan='2' align='right'> <input type='submit'class='change' name='connecter' value='Connecter'>
       </td></tr>
    </table></form>
");

mysqli_close($connect);
?>
<div><a href="ajoutPharmacie.php" class='change'>Ajouter une Pharmacie</a> </div>

</div>
<a href="../index.html"><img src="../images/icons/giphy6852.gif" class='back'/><span id="back">Home</span></a>
</body>

</html>