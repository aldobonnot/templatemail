<?php
session_start();
if(isset($_SESSION['statut']) && $_SESSION['statut']=="adminNT"){$conect="ok";}else{echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."index.php\";";
	echo"</script>";}
require_once('../inc/init.inc.php');
require('../inc/rub.class.php');
$ajt = (isset($_GET['ajt'])) ? $_GET['ajt'] : '';
$lidr = (isset($_GET['lidr'])) ? $_GET['lidr'] : '';
$nomrub = (isset($_GET['nomrub'])) ? $_GET['nomrub'] : '';



if($_GET){extract($_GET);} else {
	$ajt="";
	$nomrub="";
	$lidr="";
}
if($_POST){
	extract($_POST);
	} else {
		$id="";
		$nom="";
		$aff="";
		$submit="";
		}

if($submit=="Enregister"){
	$rub = new Rubrique();
	$rub->setId(intval($id));
	$rub->setNom(addslashes($nom));
	$rub->setAff(addslashes($aff));
	$rub->save();
	echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."back/modifrub.php?ajt=ok&nomrub=".$nom." ".$aff."\";";
	echo"</script>";
	//header("location:".URL."back/modifrub.php?ajt=ok&nomrub=".$nom." ".$aff."");
	}

Global $pdo;
$resultat = execute_requete("SELECT * FROM rubriques WHERE id = '$lidr'");
	$larubrique = $resultat->fetch(PDO::FETCH_ASSOC);
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NAVAS Thierry</title>
<link type="text/css" rel="stylesheet" href="<?php echo URL;?>css/bootstrap.css">
<link href="<?php echo URL;?>css/one.css" rel="stylesheet" type="text/css">
</head>

<body style="background:#3B3313;">
<?php if($ajt=="ok"){?> 
<div class="conectdeconect">

<div class="form-group">
<label >La rubrique <strong>"<?= $nomrub;?>"</strong> est bien Modifiée</label>
</div>
</div>
<?php } else {?> 
<div class="tophight"><form method="post" action="" enctype="multipart/form-data">
<div class="form">
<div class="form-group">
<label for="nom">Rubrique</label>
<input type="text" name="nom" id="nom" placeholder="Le nom de la rubrique" class="form-control" value="<?php echo stripslashes($larubrique['nom']);?>">

</div>
<div class="form-group">
<label for="aff">Affichage de la rubrique</label>
<select name="aff" id="aff">
<option value="oui"<?php $selected=$larubrique['aff']; ($selected=="oui") ? " selected": ""; ?> >Oui</option>
<option value="non"<?php ($selected =="non") ? " selected": ""; ?> >Non</option>
</select>
</div>
<div class="form-group">
<input type="hidden" name="id" class="btn btn-default" value="<?php echo $larubrique['id'];?>">
<input type="submit" name="submit" class="btn btn-default" value="Enregister">
</div>

</div>
</form></div><?php } ?>
</body>
</html>