<?php
include "connectebdd.php";
include '../html/header.html';
if (isset($_POST['annuler'])) {
	$_POST['nom']='';
	$_POST['mobile']='';
	$_POST['adress']='';
}

  if(isset($_POST['nom']))$nom = $_POST['nom'];else $nom = "le nouveau nom client n'été pas envoyé en POST Méthod ";
    if(isset($_POST['mobile']))$tele = $_POST['mobile'];else $tele = "numero client n'été pas envoyé en POST Méthod ";
      if(isset($_POST['adress']))$adr = $_POST['adress'];else $adr = " adress n'été pas envoyé en POST Méthod ";
       if(isset($_POST['email']))$email = $_POST['email'];else $email = " email n'été pas envoyé en POST Méthod ";
            if(isset($_POST['email1']))$email1 = $_POST['email1'];else $email1 = " email de client n'été pas envoyé en POST Méthod ";
                if(isset($_POST['mdp']))$mdp = $_POST['mdp'];else $mdp = " mot de pass n'été pas envoyé en POST Méthod ";
if (isset($_POST['enregistrer'])) {
	if(empty($nom)){echo("<div class='comment'>Vous avez obliger de saisir le nom de client </div>");}
	elseif(empty($tele)){echo("<div class='comment'>Vous avez obliger de saisir le numero de client </div>");}
	elseif(empty($adr)){echo("<div class='comment'>Vous avez obliger de saisir adress</div>");}
	elseif(empty($email)){echo("<div class='comment'>Vous avez obliger de saisir l'émail</div>");}
	elseif(empty($mdp)){echo("<div class='comment'>Vous avez obliger de saisir le mot de pass</div>");}
	else {
		
  					$query = "SELECT * FROM clients where email='$email'and mdp='$mdp' and adress_client='$adr' " ;
			$result21 = mysqli_query($connect, $query);
			$count=mysqli_num_rows($result21);
			if($count<1){
			       	$query2="INSERT INTO clients (email,email1,mdp,nom_client,num_client,adress_client)VALUES ('$email','$email1','$mdp', '$nom','$tele','$adr')";
			        $result = mysqli_query($connect, $query2);
			        			if (isset($result)) 	{
									echo'<script>alert("Efféctué!");</script>';								
		       				    	echo'<meta http-equiv="refresh" content="0">';}
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
				}
	
			else{echo'<script> alert("Cette unité existe déja!");</script>';    }
}}
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Inscrier comme un client </title>
<meta charset="utf_8"/>
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/style_index.css" />
<link  rel="stylesheet"  type="text/css" href="../style/style_php.css" />
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
body {
  background-image: url('../images/2 (10).jpg');
  background-size:100%;
}

</style>
</head>
<body>

<div class="forms">
<h2> Les Clients </h2>
<br><br>
<h3>Ajouter Un Client </h3>
<?php
echo "
<form  method='post' action='inscrit_client.php' >
<table class='table1' >

	 <tr> <td class='indice' > Nom du clent:</td><td> <input type='text' style='width:300px;'name='nom' class='inputtext' placeholder=' nom du client ...'>	</td></tr>
	
	 <tr> <td class='indice' >Numéro tele : </td><td> <input type='text' style='width:300px;'name='mobile' class='inputtext' pattern='(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}' title='format du telephone est 0xxxxxxxxx ou bien 0x.xx.xx.xx.xx'placeholder='numero mobile ...'></td></tr>

	<tr> <td class='indice' >adress : </td><td> <input type='text' style='width:300px;'name='adress' class='inputtext' placeholder=' Adress ...'></td></tr>

	<tr> <td class='indice' >Email de la pharmacie cherché</td><td> <input type='text' class='inputtext' placeholder=' Email du pharmacie...'pattern='^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$' title='forme du email xxxx@xxxx'style='width:300px;'name='email' placeholder='email ...'></td></tr>

<tr> <td class='indice' >Email de client</td><td> <input type='text' class='inputtext' placeholder=' Email du pharmacie...'pattern='^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$' title='forme du email xxxx@xxxx'style='width:300px;'name='email1' placeholder='email ...'></td></tr>
<tr> <td class='indice' >mot de pass</td><td> <input type='text' class='inputtext' style='width:300px;'name='mdp' placeholder='mot de pass ...'></td></tr>

<tr>
<td>
	<input style='position:relative;'type='submit'class='change' name='enregistrer' value='Enregistrer'></td>
	<td><input type='submit'class='change'  name='annuler' value='Annuler' ></td></tr>
<table class='table1'>
	
	";
echo "</table></form>";
mysqli_close($connect);
?>

</div>
<a href="../index.html"><img src="../images/icons/giphy6852.gif" class='back'/><span id="back">Home</span></a>
</body>
</html>