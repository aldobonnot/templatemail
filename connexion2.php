<?php
if (!isset($_GET['come'])) $_GET=""; else $come=$_GET['come'];
if (!isset($_GET['action'])) $_GET=""; else $action=$_GET['action'];
if (!isset($_POST['verif'])) $verif=""; else $verif=$_POST['verif'];
if (!isset($_POST['spam'])) $spam=""; else $spam=$_POST['spam'];
if (!isset($_POST['pseudo'])) $pseudo=""; else $pseudo=$_POST['pseudo'];
if (!isset($_POST['mdp'])) $mdp=""; else $mdp=$_POST['mdp'];
if (!isset($_POST['valider'])) $valider=""; else $valider=$_POST['valider'];
Global $pdo;
$resultat = execute_requete("SELECT * FROM cms_spam");
$nbrsPromo=$resultat->rowCount();
$msg1="";
if($nbrsPromo>0) {$numimageP=1;
    while($rowP = $resultat->fetch(PDO::FETCH_ASSOC)) 
   { $nomimagesP[$numimageP]=$rowP['f_img'];
	 $titre_p[$numimageP]=$rowP['code'];
     $numimageP++;}
   mt_srand((float)microtime()*1000000);
   $affimageP=mt_rand(1,$nbrsPromo);  
$imgP=$nomimagesP[$affimageP];
$message=$titre_p[$affimageP];}
$colpass_rsLogin = "0";

if ($valider=="ok")
{
//on verifie les données du formulaire
$ok=true;
$gif=".gif";
$code="$spam$gif";
$msg1 .='<div class="alert alert-danger dim">';
//injection sql mdp
$colpass_rsLogin = "0";
if (isset($_POST['mdp'])) {
 $colpass_rsLogin = (get_magic_quotes_gpc()) ? $_POST['mdp'] : addslashes($_POST['mdp']);
 	if (preg_match("/<script/i", "$colpass_rsLogin")) {$ok=false;
    echo"<script language=\"JavaScript\" type=\"text/javascript\">";
echo"document.location=\"http://www.police-nationale.interieur.gouv.fr/Organisation/Direction-Centrale-de-la-Police-Judiciaire/Lutte-contre-la-criminalite-organisee/Sous-direction-de-lutte-contre-la-cybercriminalite\";";
echo"</script>";
exit;
}
}

$colname_rsLogin = "0";
if (isset($_POST['pseudo'])) {
$colname_rsLogin = (get_magic_quotes_gpc()) ? $_POST['pseudo'] : addslashes($_POST['pseudo']);
  	if (preg_match("/<script/i", "$colname_rsLogin")) {
    echo"<script language=\"JavaScript\" type=\"text/javascript\">";
echo"document.location=\"http://www.police-nationale.interieur.gouv.fr/Organisation/Direction-Centrale-de-la-Police-Judiciaire/Lutte-contre-la-criminalite-organisee/Sous-direction-de-lutte-contre-la-cybercriminalite\";";
echo"</script>";
exit;
} 
}
	if($code!=$verif)
		{
		$ok=false;
		$msg1 .="Le code anti-spam!<br>";
		}

	$result = execute_requete("SELECT * FROM membre WHERE pseudo ='$pseudo'");
	
	if($result->rowCount()==1){
		$abonne = $result->fetch(PDO::FETCH_ASSOC);
	if($_POST['mdp'] === $abonne['mdp'])
	{
		if ($abonne['statut']=="adminNT")
		{
			$droit = "adminNT";
			$pseudo = $abonne['pseudo'];
			}
	
	} else
	{
		$ok=false;		
		$msg1 .='Mot de passe incorrect<br>';
	}
		
	}
	else
	{
		$ok=false;
		$msg1 .='Pseudo incorrect<br>';
	}	
		
	if($ok){
		session_start();
		$_SESSION['statut'] = $abonne['statut'];
		$_SESSION['pseudo'] = $abonne['pseudo'];
	echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."index.php\";";
        echo"</script>";	
	
		
	}else{ $msg1 .="</div>";
	}	
}


if($_GET){
	extract($_GET);
	if($action=="deconnect"){
		
		session_destroy();
		echo"<script language=\"JavaScript\" type=\"text/javascript\">";
echo"document.location=\"".URL."deconectok.php\";";
echo"</script>";
		
		
	}
	
}else{$action="";}
?>

<div class="formconect">
<table width="280" height="500"><tr><td align="center"><?php

echo $msg1;
?>
<form method="post" action="">
<div class="form">
<div class="form-group">
<label for="pseudo">Pseudo</label>
<input type="text" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo" class="form-control" value="<?php echo $pseudo;?>">

</div>
<div class="form-group">
<label for="mdp">Mot de passe</label>
<input type="password" name="mdp" id="mdp"  class="form-control" >

</div>
<div class="form-group">
 <table width="300" border="0" cellpadding="0" cellspacing="0" align="center">
              <tr> 
                <td colspan="2" class="txt3">Controle 
                  anti-spam :<br>
                  ( Respecter les majuscules ) </td>
              </tr>
              <tr> 
                <td height="1"></td>
                <td height="1"></td>
              </tr>
              <tr> 
                <td width="100" height="50" background="<?php echo"img/secureform/$imgP"; ?>">&nbsp;</td>
                <td width="200"> 
                  <input  type="hidden" name="verif" value="<?php echo "$imgP"; ?>">
                  <input type="text" name="spam" id="spam" size="16">
                  <font color="#FF0000" size="2" > 
                  *</font> </td>
              </tr>
            </table>


</div>
<div class="form-group">
<input type="submit" class="btn btn-default" value="Se connecter">
<input name="valider" type="hidden" id="valider" value="ok">
</div>

</form></div></td></tr></table>
</div>