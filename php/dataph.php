<?php
include 'profil.php';

?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Les Données de la Pharmacie</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/pages_php.css" />

</head>
<body>
<div  class="forms ">
<?php
include '../html/liste_parametre.html';
include "connectebdd.php";
?>
<br><br><br>
<h2> Les Données du Pharmacie </h2>
<br><br>
<form  method='post' action='dataph.php' >
	
<table class='table1'>
<?php

$reqt=mysqli_query($connect,"SELECT * FROM les_pharmacies where email = '$email' ");

$rslt26=mysqli_fetch_assoc($reqt);

if(isset($_POST['modifnomph']))$Nom = $_POST['modifnomph'];else $Nom = "le nom de pharmacie n'été pas envoyé en POST Méthod";
if(isset($_POST['modifnompr']))$Propre = $_POST['modifnompr'];else $Propre = "le nom de propriétaire n'été pas envoyé en POST Méthod";
if(isset($_POST['modiftele']))$Telphon = $_POST['modiftele'];else $Telphon = "le téléphone  n'été pas envoyé en POST Méthod";
if(isset($_POST['pays']))$Pays = $_POST['pays'];else $Pays = "le pays n'été pas envoyé en POST Méthod";
if(isset($_POST['devise']))$Monnaie = $_POST['devise'];else $Monnaie = "drvise n'été pas envoyé en POST Méthod";
if(isset($_POST['modifmdp']))$Mdp = $_POST['modifmdp'];else $Mdp = "le mdp n'été pas envoyé en POST Méthod";
if(isset($_POST['modifcmdp']))$Cmdp = $_POST['modifcmdp'];else $Cmdp = "la confirmation e mdp n'été pas envoyé en POST Méthod";


	if (isset($_POST['modifier']))
{
	
	 if(empty($Nom)){echo("<div class='comment'>Vous avez obliger de saisir le nom de pharmacie </div>");}
 elseif(empty($Propre)){echo("<div class='comment'>Vous avez obliger de saisir le nom du ropritaire </div>");}
 elseif(empty($Telphon)){echo("<div class='comment'>Vous avez obliger de saisir le numéro du téléphonne </div>");} elseif(empty($Mdp)){echo("<div class='comment'>Vous avez obliger de saisir le mot de pass </div>");}
 elseif(empty($Cmdp)){echo("<div class='comment'>Vous avez obliger de saisir la confirmation</div>");}
   elseif($Mdp!=$Cmdp){echo("<div class='comment'>le mot de pass et la confirmation doivent être identiques</div>");}
  				else{	
				
						$id=$rslt26['id'];
			       	$query26="UPDATE les_pharmacies SET nom_pharmacie='$Nom', nom_proprietaire='$Propre',n_tele='$Telphon' ,pays='$Pays',devise='$Monnaie', mdp='$Mdp', cmdp='$Cmdp'WHERE id='$id' and  email='$email'";
			        $result26 = mysqli_query($connect, $query26);


							$query300= "SELECT * FROM les_pharmacies where email='$email' and mdp='$mdp'" ;
			$result300 = mysqli_query($connect, $query300);
			while($rslt300=mysqli_fetch_assoc($result300)){
		$pnom=$rslt300['nom_pharmacie'];
		$ppropr=$rslt300['nom_proprietaire'];
		$ptele=$rslt300['n_tele'];
		$ppays=$rslt300['pays'];
		$pdevise=$rslt300['devise'];
		$pemail=$rslt300['email'];
		$pmdp=$rslt300['mdp'];
		}
			        
			        			if (isset($result26)) {	
									echo'<script>alert("Efféctué!");</script>';									
		       				    	echo'<meta http-equiv="refresh"  content="0">';} 
								else
								echo'<script>alert("n\'été pas Efféctué!");</script>';


			}

}
?>

<tr><td class='indice'> Identificateur du pharmacie:</td>
<td><input type="text" name="identificateur" class='modprod' value="<?php  echo$rslt26['id'];?>"></td></tr>
<tr><td class='indice'> Nom du pharmacie:</td>
<td><input type="text" name="modifnomph" class='modprod' value="<?php  echo$rslt26['nom_pharmacie'];?>"></td></tr>
<tr><td class='indice'> Nom du propriétaire:</td>
<td><input type="text" name="modifnompr" class='modprod' value="<?php  echo$rslt26['nom_proprietaire'];?>"></td></tr>
<tr><td class='indice'> Numéro Téléphone:</td>
<td><input type="text" name="modiftele" class='modprod'  pattern='(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}' title='format du telephone est 0xxxxxxxxx ou bien 0x.xx.xx.xx.xx'value="0<?php  echo $rslt26['n_tele'] ;?>"></td></tr>
<tr><td class='indice'  >Pays: </td>	<td>
<select name='pays' class='selected'>
<option><?php  echo$rslt26['pays'];?></option>
<option value='Algerie' >Algerie </option>
<option value='France'>France </option>
<option value='Afghanistan'>Afghanistan </option>
<option value='Afrique_Centrale'>Afrique_Centrale </option>
<option value='Afrique_du_sud'>Afrique_du_Sud </option>
<option value='Albanie'>Albanie </option>
<option value='Allemagne'>Allemagne </option>
<option value='Andorre'>Andorre </option>
<option value='Angola'>Angola </option>
<option value='Anguilla'>Anguilla </option>
<option value='Arabie_Saoudite'>Arabie_Saoudite </option>
<option value='Argentine'>Argentine </option>
<option value='Armenie'>Armenie </option>
<option value='Australie'>Australie </option>
<option value='Autriche'>Autriche </option>
<option value='Azerbaidjan'>Azerbaidjan </option>
<option value='Bahamas'>Bahamas </option>
<option value='Bangladesh'>Bangladesh </option>
<option value='Barbade'>Barbade </option>
<option value='Bahrein'>Bahrein </option>
<option value='Belgique'>Belgique </option>
<option value='Belize'>Belize </option>
<option value='Benin'>Benin </option>
<option value='Bermudes'>Bermudes </option>
<option value='Bielorussie'>Bielorussie </option>
<option value='Bolivie'>Bolivie </option>
<option value='Botswana'>Botswana </option>
<option value='Bhoutan'>Bhoutan </option>
<option value='Boznie_Herzegovine'>Boznie_Herzegovine </option>
<option value='Bresil'>Bresil </option>
<option value='Brunei'>Brunei </option>
<option value='Bulgarie'>Bulgarie </option>
<option value='Burkina_Faso'>Burkina_Faso </option>
<option value='Burundi'>Burundi </option>
<option value='Caiman'>Caiman </option>
<option value='Cambodge'>Cambodge </option>
<option value='Cameroun'>Cameroun </option>
<option value='Canada'>Canada </option>
<option value='Canaries'>Canaries </option>
<option value='Cap_vert'>Cap_Vert </option>
<option value='Chili'>Chili </option>
<option value='Chine'>Chine </option>
<option value='Chypre'>Chypre </option>
<option value='Colombie'>Colombie </option>
<option value='Comores'>Colombie </option>
<option value='Congo'>Congo </option>
<option value='Congo_democratique'>Congo_democratique </option>
<option value='Cook'>Cook </option>
<option value='Coree_du_Nord'>Coree_du_Nord </option>
<option value='Coree_du_Sud'>Coree_du_Sud </option>
<option value='Costa_Rica'>Costa_Rica </option>
<option value='Cote_d_Ivoire'>CÃ´te_d_Ivoire </option>
<option value='Croatie'>Croatie </option>
<option value='Cuba'>Cuba </option>
<option value='Danemark'>Danemark </option>
<option value='Djibouti'>Djibouti </option>
<option value='Dominique'>Dominique </option>
<option value='Egypte'>Egypte </option>
<option value='Emirats_Arabes_Unis'>Emirats_Arabes_Unis </option>
<option value='Equateur'>Equateur </option>
<option value='Erythree'>Erythree </option>
<option value='Espagne'>Espagne </option>
<option value='Estonie'>Estonie </option>
<option value='Etats_Unis'>Etats_Unis </option>
<option value='Ethiopie'>Ethiopie </option>
<option value='Falkland'>Falkland </option>
<option value='Feroe'>Feroe </option>
<option value='Fidji'>Fidji </option>
<option value='Finlande'>Finlande </option>
<option value='France'>France </option>
<option value='Gabon'>Gabon </option>
<option value='Gambie'>Gambie </option>
<option value='Georgie'>Georgie </option>
<option value='Ghana'>Ghana </option>
<option value='Gibraltar'>Gibraltar </option>
<option value='Grece'>Grece </option>
<option value='Grenade'>Grenade </option>
<option value='Groenland'>Groenland </option>
<option value='Guadeloupe'>Guadeloupe </option>
<option value='Guam'>Guam </option>
<option value='Guatemala'>Guatemala</option>
<option value='Guernesey'>Guernesey </option>
<option value='Guinee'>Guinee </option>
<option value='Guinee_Bissau'>Guinee_Bissau </option>
<option value='Guinee equatoriale'>Guinee_Equatoriale </option>
<option value='Guyana'>Guyana </option>
<option value='Guyane_Francaise '>Guyane_Francaise </option>
<option value='Haiti'>Haiti </option>
<option value='Hawaii'>Hawaii </option>
<option value='Honduras'>Honduras </option>
<option value='Hong_Kong'>Hong_Kong </option>
<option value='Hongrie'>Hongrie </option>
<option value='Inde'>Inde </option>
<option value='Indonesie'>Indonesie </option>
<option value='Iran'>Iran </option>
<option value='Iraq'>Iraq </option>
<option value='Irlande'>Irlande </option>
<option value='Islande'>Islande </option>
<option value='Israel'>Israel </option>
<option value='Italie'>italie </option>
<option value='Jamaique'>Jamaique </option>
<option value='Jan Mayen'>Jan Mayen </option>
<option value='Japon'>Japon </option>
<option value='Jersey'>Jersey </option>
<option value='Jordanie'>Jordanie </option>
<option value='Kazakhstan'>Kazakhstan </option>
<option value='Kenya'>Kenya </option>
<option value='Kirghizstan'>Kirghizistan </option>
<option value='Kiribati'>Kiribati </option>
<option value='Koweit'>Koweit </option>
<option value='Laos'>Laos </option>
<option value='Lesotho'>Lesotho </option>
<option value='Lettonie'>Lettonie </option>
<option value='Liban'>Liban </option>
<option value='Liberia'>Liberia </option>
<option value='Liechtenstein'>Liechtenstein </option>
<option value='Lituanie'>Lituanie </option>
<option value='Luxembourg'>Luxembourg </option>
<option value='Lybie'>Lybie </option>
<option value='Macao'>Macao </option>
<option value='Macedoine'>Macedoine </option>
<option value='Madagascar'>Madagascar </option>
<option value='MadÃ¨re'>MadÃ¨re </option>
<option value='Malaisie'>Malaisie </option>
<option value='Malawi'>Malawi </option>
<option value='Maldives'>Maldives </option>
<option value='Mali'>Mali </option>
<option value='Malte'>Malte </option>
<option value='Man'>Man </option>
<option value='Mariannes du Nord'>Mariannes du Nord </option>
<option value='Maroc'>Maroc </option>
<option value='Marshall'>Marshall </option>
<option value='Martinique'>Martinique </option>
<option value='Maurice'>Maurice </option>
<option value='Mauritanie'>Mauritanie </option>
<option value='Mayotte'>Mayotte </option>
<option value='Mexique'>Mexique </option>
<option value='Micronesie'>Micronesie </option>
<option value='Midway'>Midway </option>
<option value='Moldavie'>Moldavie </option>
<option value='Monaco'>Monaco </option>
<option value='Mongolie'>Mongolie </option>
<option value='Montserrat'>Montserrat </option>
<option value='Mozambique'>Mozambique </option>
<option value='Namibie'>Namibie </option>
<option value='Nauru'>Nauru </option>
<option value='Nepal'>Nepal </option>
<option value='Nicaragua'>Nicaragua </option>
<option value='Niger'>Niger </option>
<option value='Nigeria'>Nigeria </option>
<option value='Niue'>Niue </option>
<option value='Norfolk'>Norfolk </option>
<option value='Norvege'>Norvege </option>
<option value='Nouvelle_Caledonie'>Nouvelle_Caledonie </option>
<option value='Nouvelle_Zelande'>Nouvelle_Zelande </option>
<option value='Oman'>Oman </option>
<option value='Ouganda'>Ouganda </option>
<option value='Ouzbekistan'>Ouzbekistan </option>
<option value='Pakistan'>Pakistan </option>
<option value='Palau'>Palau </option>
<option value='Palestine'>Palestine </option>
<option value='Panama'>Panama </option>
<option value='Papouasie_Nouvelle_Guinee'>Papouasie_Nouvelle_Guinee </option>
<option value='Paraguay'>Paraguay </option>
<option value='Pays_Bas'>Pays_Bas </option>
<option value='Perou'>Perou </option>
<option value='Philippines'>Philippines </option>
<option value='Pologne'>Pologne </option>
<option value='Polynesie'>Polynesie </option>
<option value='Porto_Rico'>Porto_Rico </option>
<option value='Portugal'>Portugal </option>
<option value='Qatar'>Qatar </option>
<option value='Republique_Dominicaine'>Republique_Dominicaine </option>
<option value='Republique_Tcheque'>Republique_Tcheque </option>
<option value='Reunion'>Reunion </option>
<option value='Roumanie'>Roumanie </option>
<option value='Royaume_Uni'>Royaume_Uni </option>
<option value='Russie'>Russie </option>
<option value='Rwanda'>Rwanda </option>
<option value='Sahara Occidental'>Sahara Occidental </option>
<option value='Sainte_Lucie'>Sainte_Lucie </option>
<option value='Saint_Marin'>Saint_Marin </option>
<option value='Salomon'>Salomon </option>
<option value='Salvador'>Salvador </option>
<option value='Samoa_Occidentales'>Samoa_Occidentales</option>
<option value='Samoa_Americaine'>Samoa_Americaine </option>
<option value='Sao_Tome_et_Principe'>Sao_Tome_et_Principe </option>
<option value='Senegal'>Senegal </option>
<option value='Seychelles'>Seychelles </option>
<option value='Sierra Leone'>Sierra Leone </option>
<option value='Singapour'>Singapour </option>
<option value='Slovaquie'>Slovaquie </option>
<option value='Slovenie'>Slovenie</option>
<option value='Somalie'>Somalie </option>
<option value='Soudan'>Soudan </option>
<option value='Sri_Lanka'>Sri_Lanka </option>
<option value='Suede'>Suede </option>
<option value='Suisse'>Suisse </option>
<option value='Surinam'>Surinam </option>
<option value='Swaziland'>Swaziland </option>
<option value='Syrie'>Syrie </option>
<option value='Tadjikistan'>Tadjikistan </option>
<option value='Taiwan'>Taiwan </option>
<option value='Tonga'>Tonga </option>
<option value='Tanzanie'>Tanzanie </option>
<option value='Tchad'>Tchad </option>
<option value='Thailande'>Thailande </option>
<option value='Tibet'>Tibet </option>
<option value='Timor_Oriental'>Timor_Oriental </option>
<option value='Togo'>Togo </option>
<option value='Trinite_et_Tobago'>Trinite_et_Tobago </option>
<option value='Tristan da cunha'>Tristan de cuncha </option>
<option value='Tunisie'>Tunisie </option>
<option value='Turkmenistan'>Turmenistan </option>
<option value='Turquie'>Turquie </option>
<option value='Ukraine'>Ukraine </option>
<option value='Uruguay'>Uruguay </option>
<option value='Vanuatu'>Vanuatu </option>
<option value='Vatican'>Vatican </option>
<option value='Venezuela'>Venezuela </option>
<option value='Vierges_Americaines'>Vierges_Americaines </option>
<option value='Vierges_Britanniques'>Vierges_Britanniques </option>
<option value='Vietnam'>Vietnam </option>
<option value='Wake'>Wake </option>
<option value='Wallis et Futuma'>Wallis et Futuma </option>
<option value='Yemen'>Yemen </option>
<option value='Yougoslavie'>Yougoslavie </option>
<option value='Zambie'>Zambie </option>
<option value='Zimbabwe'>Zimbabwe </option>
</select>
</td></tr>
<tr><td class='indice'  >Devise: </td><td><select name='devise' class='selected '>
<option><?php  echo$rslt26['devise'];?> </option>
<option value='Dinar Algérien(DZD)' >Dinar Algérien(DZD)</option>
<option value='Livre égyptienne(EGP)'>Livre égyptienne(EGP)</option>
<option value='Dinar Libyen(LYD)'>Dinar Libyen(LYD)</option>
<option value='Dirham Marocain(MAD)'>Dirham Marocain(MAD)</option>
<option value='ouguiya(MRU)'>ouguiya(MRU)</option>
<option value='livre soudanaise(SDG)'>livre soudanaise(SDG)</option>
<option value='dinar tunisien(DT)'>dinar tunisien(DT)</option>
<option value='Franc CFA(XOF)'>Franc CFA(XOF)</option>
<option value='escudo du Cap-Vert(CVE)'>escudo du Cap-Vert(CVE)</option>
<option value='cedi(GHS)'>cedi(GHS)</option>
<option value='franc guinéen(GNF)'>franc guinéen(GNF)</option>
<option value='	dollar libérien(LRD)'>dollar libérien(LRD)</option>
<option value='naira(NGN)'>naira(NGN</option>
<option value='leone(SLL)'>leone(SLL)</option>
<option value='Franc CFA(XAF)'>Franc CFA(XAF)</option>
<option value='franc congolais(CDF)'>franc congolais(CDF)</option>
<option value='dobra(STD)'>dobra(STD)</option>
<option value='franc burundais(BIF)'>franc burundais(BIF)</option>
<option value='franc de Djibouti(DJF)'>franc de Djibouti(DJF)</option>
<option value='	nakfa(ERN)'>nakfa(ERN)</option>
<option value='	birr(ETB)'>birr(ETB)</option>
<option value='shilling kényan(	KES)'>shilling kényan(KES)</option>
<option value='shilling ougandais(UGX)'>shilling ougandais(UGX)</option>
<option value='franc rwandais(RWF)'>franc rwandais(RWF)</option>
<option value='roupie seychelloise(SCR)'>roupie seychelloise(SCR)</option>
<option value='shilling somalien(SOS)'>shilling somalien(SOS)</option>
<option value='livre sud-soudanaise(SSP)'>livre sud-soudanaise(SSP)'</option>
<option value='shilling tanzanien(TZS)'>shilling tanzanien(TZS)</option>
<option value='rand(ZAR)'>rand(ZAR)</option>
<option value='kwanza(AOA)'>kwanza(AOA)</option>
<option value='pula(BWP)'>pula(BWP)</option>
<option value='couronne norvégienne(NOK)'>couronne norvégienne(NOK)</option>
<option value='ranc comorien(KMF)'>ranc comorien(KMF)</option>
<option value='euro(EUR)'>euro(EUR)</option>
<option value='tenge(KZT)'>tenge(KZT)</option>
<option value='som(KGS)'>som(KGS)</option>
<option value='manat turkmène(TMT)'>manat turkmène(TMT)</option>
<option value='rouble russe(RUB)'>rouble russe(RUB)</option>
<option value='won sud-coréen(KRW)'>won sud-coréen(KRW)</option>
<option value='yuan renminbi(CNY)'>yuan renminbi(CNY)</option>
<option value='nouveau dollar de Taïwan(TWD)'>nouveau dollar de Taïwan(TWD)</option>
<option value='riyal qatari(QAR)'>riyal qatari(QAR)</option>
<option value='livre turque(TRY)'>livre turque(TRY)</option>
<option value='dollar américain(USD)'>dollar américain(USD)</option>
<option value='dollar des Caraïbes orientales(XCD)'>dollar des Caraïbes orientales(XCD)</option>
<option value='réal brésilien(BRL)'>réal brésilien(BRL)</option>
</select></td></tr>
		<tr><td class='indice'  >Mot de passe: </td><td><input type='text' pattern='^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{5}[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]*$' title='le mot de pass doit etre plus de 5 caractères' name='modifmdp' class='modprod' value='<?php echo$rslt26['mdp'];?>'></td></tr>
		<tr><td class='indice'  >Confirmation Mot de passe: </td><td><input type='text'  name='modifcmdp' class='modprod' value='<?php  echo$rslt26['cmdp'];?>'></td></tr>
		<tr><td colspan='2'> <input type='submit'class='change' name='modifier' value='Modifier'></td>
	</tr>
	</tbody>
	</table></form>

<?php
// pays devise modifmdp modifcmdp 
mysqli_close($connect);
?>
  

<br><br>
</div>
</body>
</html>