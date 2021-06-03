<?php
session_start();

include '../html/header.html';
?>
<html  xml:lang="fr" lang="fr">
<head>
<title>Ajouter une Pharmacie</title>
<meta charset="utf_8"  />
<link rel="shortcut icon" href="../images/icons/giphy111.gif">
<link  rel="stylesheet"  type="text/css" href="../style/style_php.css" />
</head>
<body>

<div  class="forms">
<?php
include "connectebdd.php";


if(isset($_POST['nom']))$Nom = $_POST['nom'];else $Nom = "le nom de pharmacie n'été pas envoyé en POST Méthod";
if(isset($_POST['propre']))$Propre = $_POST['propre'];else $Propre = "le nom de propriétaire n'été pas envoyé en POST Méthod";
if(isset($_POST['telphon']))$Telphon = $_POST['telphon'];else $Telphon = "le téléphone  n'été pas envoyé en POST Méthod";
if(isset($_POST['pays']))$Pays = $_POST['pays'];else $Pays = "le pays n'été pas envoyé en POST Méthod";
if(isset($_POST['monnaie']))$Monnaie = $_POST['monnaie'];else $Monnaie = "devise n'été pas envoyé en POST Méthod";
if(isset($_POST['email']))$Email = $_POST['email'];else $Email = "l'email de pharmacie n'été pas envoyé en POST Méthod";
if(isset($_POST['mdp']))$Mdp = $_POST['mdp'];else $Mdp = "le mdp n'été pas envoyé en POST Méthod";
if(isset($_POST['cmdp']))$Cmdp = $_POST['cmdp'];else $Cmdp = "la confirmation e mdp n'été pas envoyé en POST Méthod";

if(isset($_POST['enregistrer'])){
  if(empty($Nom))       {echo("<div class='comment'>Vous avez obliger de saisir le Nom du pharmacie </div>");}
  elseif(empty($Propre)){echo("<div class='comment'>Vous avez obliger de saisir le nom du propriétaire</div>");}
  elseif(empty($Telphon)){echo("<div class='comment'>Vous avez obliger de saisir le numero du téléphonne</div>");}
  elseif(empty($Pays)){echo("<div class='comment'>Vous avez obliger de séléctionner le pays</div>");}
  elseif(empty($Monnaie)){echo("<div class='comment'>Vous avez obliger de séléctionner du devise</div>");}
  elseif(empty($Email)){echo("<div class='comment'>Vous avez obliger de saisir l'email'</div>");}
  elseif(empty($Mdp)){echo("<div class='comment'>Vous avez obliger de saisir le mot de pass</div>");}
  elseif(empty($Cmdp)){echo("<div class='comment'>Vous avez obliger de saisir le même mot de passe du champ précédent</div>");}
   elseif($Mdp!=$Cmdp){echo("<div class='comment'>le mot de pass et la confirmation doivent être identiques</div>");}
      else {
$query = "SELECT nom_pharmacie,nom_proprietaire,n_tele,pays,devise,email,mdp,cmdp FROM les_pharmacies";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_row($result)){
$TNom = $row[0];
$TPropre= $row[1];
$TTelphon= $row[2];
$TPays= $row[3];
$TMonnaie = $row[4];
$TEmail= $row[5];
$TMdp= $row[6];
$TCmdp= $row[7];
}
       if($TNom==$Nom)echo"<div class='comment'>Ce NOM est déja utilisé</div>";
       elseif($TTelphon==$Telphon)echo"<div class='comment'>Ce NUMERO de telephone est déja utilisé</div>";
       elseif($TEmail==$Email)echo"<div class='comment'>Cette adress email est déja utilisé</div>";
       elseif (($TNom==$Nom)&&($TPropre==$Propre)&&($TTelphon==$Telphon)&&($TPays==$Pays)&&($TMonnaie==$Monnaie)&&($TEmail==$Email)&&($TMdp==$Mdp)&&($TCmdp==$Cmdp))echo "<script> alert('ces informations sonts déja existants');</script>";
       else{
       	$query2="INSERT INTO les_pharmacies (nom_pharmacie,nom_proprietaire,n_tele,pays,devise,email,mdp,cmdp)VALUES ('$Nom','$Propre', '$Telphon', '$Pays', '$Monnaie', '$Email', '$Mdp', '$Cmdp')";
        $result = mysqli_query($connect, $query2);
        if(isset($result)){		
		$_SESSION['auth']=array('email'=>$Email,'mdp'=>$Mdp );
		 ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);
			$_SESSION['email']=$Email;
			$_SESSION['mdp']=$Mdp; 
			echo'<div class="att"><ul><li>Attendez quelques secondes svp! ... &nbsp&nbsp&nbsp&nbsp <img class="imgatt"src="../images/icons/gip21hy.gif"/></li></ul></div>';
         echo'<meta http-equiv="refresh" content="2;url=profil.php"/>';exit();
	}
		else{echo"<div class='comment'> les informations ne sonts pas //enregistrées </div>";}
      }
}
}
echo("<form method='post' action=".'ajoutPharmacie.php'.">
	<table>
     <tr>
       <td class='indice'> Nom du pharmacie</td><td> <input type='text' name='nom' placeholder='Nom du pharmacie ...'></td></tr>
    <tr>
       <td class='indice'  >Nom du propriétaire</td><td> <input type='text' name='propre' placeholder='Nom du propriétaire de la pharmacie...'></td></tr>
    <tr>
       <td class='indice'  >Numéro du téléphone</td><td> <input type='text' name='telphon' pattern='(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}' title='format du telephone est 0xxxxxxxxx ou bien 0x.xx.xx.xx.xx' placeholder='Numéro du téléphone...'></td></tr>
    <tr >
    <td class='indice'  >Pays</td>
    <td>
<select name='pays' id='pay'>
<option></option>
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
</td>
</tr>

<tr >
    <td class='indice'  >Devise</td>
    <td>
<select name='monnaie' id='monnaie'>
<option></option>
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
</select>
</td>
</tr>

  <tr> <td class='indice'  >Email</td><td> <input type='text' pattern='^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$' title='forme du email xxxx@xxxx'name='email' placeholder='email ...'></td></tr>
  <tr> <td class='indice'  >Mot de passe</td><td> <input type='text' name='mdp' pattern='^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{5}[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]*$' title='le mot de pass doit etre plus de 5 caractères' placeholder='Mot de pass ...'></td></tr>
  <tr> <td class='indice'  >Confirmation Mot de passe</td><td> <input type='text' name='cmdp' placeholder='Confirmation de Mot de pass ...'></td></tr>
<tr>
       <td colspan='2' align='right'> <input type='submit' class='change' name='enregistrer' value='Enregistrer'></td></tr>
     </table></form> 
");

mysqli_close($connect);
?>

<div class="change"><a href="login.php">Connecter </a> </div>
</div>
<a href="../index.html"><img src="../images/icons/giphy6852.gif" class='back'/><span id="back">Home</span></a>
</body>
</html>