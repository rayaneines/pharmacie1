<?php
include 'profil.php';

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
	<?php
include '../html/liste_client.html';
?>

<?php
include "connectebdd.php";
if (isset($_POST['annuler'])) {
	$_POST['nom']='';
	$_POST['mobile']='';
	$_POST['adress']='';
}

  if(isset($_POST['nom']))$nom = $_POST['nom'];else $nom = "le nouveau nom client n'été pas envoyé en POST Méthod ";
    if(isset($_POST['mobile']))$tele = $_POST['mobile'];else $tele = "numero client n'été pas envoyé en POST Méthod ";
      if(isset($_POST['adress']))$adr = $_POST['adress'];else $adr = " adress n'été pas envoyé en POST Méthod ";
if (isset($_POST['enregistrer'])) {
	if(empty($nom)){echo("<div class='comment'>Vous avez obliger de saisir le nom de client </div>");}
	elseif(empty($tele)){echo("<div class='comment'>Vous avez obliger de saisir le numero de client </div>");}
	elseif(empty($adr)){echo("<div class='comment'>Vous avez obliger de saisir adress</div>");}
	else {
		
  					$query = "SELECT * FROM clients where email='$email'and nom_client='$nom' and adress_client='$adr' " ;
			$result21 = mysqli_query($connect, $query);
			$count=mysqli_num_rows($result21);
			if($count<1){
			       	$query2="INSERT INTO clients (email,nom_client,num_client,adress_client)VALUES ('$email', '$nom','$tele','$adr')";
			        $result = mysqli_query($connect, $query2);
			        			if (isset($result)) 	{
									echo'<script>alert("Efféctué!");</script>';								
		       				    	echo'<meta http-equiv="refresh" content="0">';}
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
				}
	
			else{echo'<script> alert("Cette unité existe déja!");</script>';    }
}}
?><br><br>
<h2> Les Clients </h2>
<br><br>
<h3>Ajouter Un Client </h3>
<?php
echo "
<form  method='post' action='client.php' >
	<input type='text' name='nom' class='inputtext' placeholder=' nom du client ...'>	
	<input type='text' name='mobile' class='inputtext' pattern='(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}' title='format du telephone est 0xxxxxxxxx ou bien 0x.xx.xx.xx.xx'placeholder='numero mobile ...'>
	<input type='text' name='adress' class='inputtext' placeholder=' Adress ...'>
	<input type='submit'class='change' name='enregistrer' value='Enregistrer'>
	<input type='submit'class='change'  name='annuler' value='Annuler' >
<table class='table1'>
	<th>
		<tr><td>id_client</td>  <td>nom_client</td>  <td>num_client</td>  <td>adress_client</td><td>modifier</td><td>supprimer</td></tr>
	</th>
	<tbody>
	";
	//id_client 	email 	nom_client 	num_client 	adress_client  .$rslt['nom_client']..$rslt['num_client']..$rslt['adress_client'].
$reqt=mysqli_query($connect,"SELECT * FROM clients where email = '$email' ");

while($rslt=mysqli_fetch_assoc($reqt)){
		if (isset($_POST['supprimer'.$rslt["id_client"]])) {
				$id=$rslt["id_client"];
				$query1="DELETE  FROM clients where email='$email'and id_client='$id' ";
						$rslt22=mysqli_query($connect,$query1);
							if (isset($rslt22)) {
		       				    echo'<script> alert("Effectué!");</script>';
		       				    echo'<meta http-equiv="refresh" content="0">'; 
							}else echo'<script> alert("n\'ete pas Effectué!");</script>';

		}



	if(isset($_POST[$rslt['nom_client']]))$nomc = $_POST[$rslt['nom_client']];else $nomc = "nom n'été pas envoyé en POST Méthod ";
	if(isset($_POST[$rslt['num_client']]))$numc = $_POST[$rslt['num_client']];else $numc = "numero n'été pas envoyé en POST Méthod ";
	if(isset($_POST[$rslt['adress_client']]))$adrc = $_POST[$rslt['adress_client']];else $adrc = "adress n'été pas envoyé en POST Méthod ";	
if (isset($_POST['modifier'.$rslt["id_client"]])) 
{	
			if (empty($nomc)) echo"<div class='comment'>Vous avez obliger de saisir le nom de client </div>";
			elseif (empty($numc)) echo"<div class='comment'>Vous avez obliger de saisir le numero de client </div>";
			elseif (empty($adrc)) echo"<div class='comment'>Vous avez obliger de saisir adress</div>";
  				else{	/*$query = "SELECT * FROM clients where email='$email'and nom_client='$nomc'" ;
					$result23 = mysqli_query($connect, $query);
					$count=mysqli_num_rows($result23);
					if($count<1){*/
						echo $nomc.$numc.$adrc;
						$id=$rslt['id_client'];
			       	$query24="UPDATE clients SET nom_client='$nomc',num_client='$numc',adress_client='$adrc' WHERE email='$email' and id_client='$id'";
			        $result24 = mysqli_query($connect, $query24);
			        			if (isset($result24)) {	
									echo'<script>alert("Efféctué!");</script>';									
		       				    	echo'<meta http-equiv="refresh" content="0">';} 
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
					////}
	
					//else{echo'<script> alert("Cette unité existe déja!");</script>';    }
			}
}
	

	echo "
	<tr>
		<td>".$rslt['id_client']."</td>
<td><input type='text'  name='".$rslt['nom_client']."' class='modprod' value='".$rslt['nom_client']."'></td>
<td><input type='text'  name='".$rslt['num_client']."' class='modprod' pattern='(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}' title='format du telephone est 0xxxxxxxxx ou bien 0x.xx.xx.xx.xx'placeholder='numero mobile ...'value='0".$rslt['num_client']."'></td>
<td> <input type='text'class='modprod' name='".$rslt['adress_client']."' value='".$rslt['adress_client']."'></td>
		<td> <input type='submit'class='change ch' name='modifier".$rslt['id_client']."' value='Modif'></td>
		<td> <input type='submit'class='change ch' name='supprimer".$rslt['id_client']."' value='Suppr'></td>
	</tr>
	";
	
}
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