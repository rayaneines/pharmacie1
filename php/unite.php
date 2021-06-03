<?php
include 'profil.php';

?>
<html  xml:lang="fr" lang="fr">
<head>
<title>les unités</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />

</head>
<body>
<div  class="forms">
<?php
include '../html/liste_parametre.html';
include "connectebdd.php";
if (isset($_POST['annuler'])) {
	$_POST['ajoutunite']='';
}

  if(isset($_POST['ajoutunite']))$ajout = $_POST['ajoutunite'];else $ajout = "le nouveau nom unit n'été pas envoyé en POST Méthod ";
if (isset($_POST['enregistrer'])) {
	if (empty($ajout)) echo'<script>alert("Ecrit un nom dabord!");</script>';	
	else {
		
  					$query = "SELECT * FROM unite where email='$email'and unite='$ajout' " ;
			$result21 = mysqli_query($connect, $query);
			$count=mysqli_num_rows($result21);
			if($count<1){
			       	$query2="INSERT INTO unite (unite,email)VALUES ('$ajout', '$email')";
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
<h2> Les unités </h2>
<br><br>
<h3>Ajouter Unité </h3>
<?php
echo "
<form  method='post' action='unite.php' >
	<input type='text' name='ajoutunite' class='inputtext' placeholder=' Ajouter unité ...'>
	<input type='submit'class='change' name='enregistrer' value='Enregistrer'>
	<input type='submit'class='change'  name='annuler' value='Annuler' >
<table class='table1'>
	<th>
		<tr><td>id</td>  <td>Unité</td>  <td>Modifier</td>  <td>Supprimer</td></tr>
	</th>
	<tbody>
	";
$reqt=mysqli_query($connect,"SELECT * FROM unite where email = '$email' ORDER BY unite");

while($rslt=mysqli_fetch_assoc($reqt)){
		if (isset($_POST['supprimer'.$rslt["unite"]])) {
				$unit=$rslt["unite"];
				$query1="DELETE  FROM unite where email='$email'and unite='$unit' ";
						$rslt22=mysqli_query($connect,$query1);
							if (isset($rslt22)) {
		       				    echo'<script> alert("Effectué!");</script>';
		       				    echo'<meta http-equiv="refresh" content="0">'; 
							}else echo'<script> alert("n\'ete pas Effectué!");</script>';

		}



	if(isset($_POST['modifunite'.$rslt['id']]))$unit = $_POST['modifunite'.$rslt['id']];else $unite = "l\'unité n'été pas envoyé en POST Méthod ";	
if (isset($_POST['modifier'.$rslt["unite"]])) 
{	
			if (empty($unit)) echo'<script>alert("Ecrit un nom dabord!");</script>';
  				else{	$query = "SELECT * FROM unite where email='$email'and unite='$unit'" ;
					$result23 = mysqli_query($connect, $query);
					$count=mysqli_num_rows($result23);
					if($count<1){
						$id=$rslt['id'];
			       	$query24="UPDATE unite SET unite='$unit' WHERE email='$email' and id='$id'";
			        $result24 = mysqli_query($connect, $query24);
			        			if (isset($result24)) {	
									echo'<script>alert("Efféctué!");</script>';									
		       				    	echo'<meta http-equiv="refresh" content="0">';} 
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';
					}
	
					else{echo'<script> alert("Cette unité existe déja!");</script>';    }
			}
}
	

	echo "
	<tr>
		<td>".$rslt['id']."</td>
		<td><input type='text'  name='modifunite".$rslt['id']."' class='inputtext' value='".$rslt['unite']."'></td>
		<td> <input type='submit'class='change ' name='modifier".$rslt['unite']."' value='Modifier'></td>
		<td> <input type='submit'class='change ' name='supprimer".$rslt['unite']."' value='Supprimer'></td>
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