<?php
session_start();
require_once('../inc/init.inc.php');
if(isset($_SESSION['statut']) && $_SESSION['statut']=="adminNT"){$conect="ok";}else{echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."index.php\";";
	echo"</script>";}

require('../inc/liens.class.php');
$ajt = (isset($_GET['ajt'])) ? $_GET['ajt'] : '';
$lidl = (isset($_GET['lidl'])) ? $_GET['lidl'] : '';
$larub = (isset($_GET['larub'])) ? $_GET['larub'] : '';
$nomrub = (isset($_GET['nomrub'])) ? $_GET['nomrub'] : '';
$urll = (isset($_GET['urll'])) ? $_GET['urll'] : '';

if($_GET){extract($_GET);}else{
	$lidl="";
	$larub="";
	$ajt="";
	$nomrub="";
	$urll="";}
if($_POST){extract($_POST);}else{
$id="";
$idRub="";
$nom="";
$url="";
$submit="";
$affL="";}

if($submit=="Enregister"){
	$lien = new Liens();
	$lien->setId(intval($id));
	$lien->setIdRub(intval($idRub));
	$lien->setNom(addslashes($nom));
	$lien->setUrl($url);
	$lien->setAffL($affL);
	$lien->save();
	echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."back/modifliens.php?ajt=ok&nomrub=".$nom."&urll=".$url."\";";
	echo"</script>";
	//header("location:".URL."back/modifliens.php?ajt=ok&nomrub=".$nom."&urll=".$url."");
	}
Global $pdo;
$resultatL = execute_requete("SELECT * FROM liens WHERE id='$lidl'");
	$LiensRub = $resultatL->fetch(PDO::FETCH_ASSOC);
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
<label >Le liens <strong>"<?= $nomrub;?> - <?= $urll;?>"</strong> est bien modifiée</label>
</div>
</div>
<?php }else{?> 
<div class="tophight"><form method="post" action="" enctype="multipart/form-data">
<div class="form">
<div class="form-group">
<div class="form-group">
<label for="nom">Rubrique</label>
<select name="idRub" id="idRub">
<?php
$lidmdrub=$LiensRub['idRub'];
$mdf=new Liens;
$resultat=$mdf->mdrub();
foreach ($resultat as $key => $value) {
    echo "<option value=\"$value[id]\"";if($value['id']==$lidmdrub){echo" selected";}else{echo"";}echo "> $value[nom]</option>";
}
?>
</select>
</div>
<label for="nom">Titre du liens</label>
<input type="text" name="nom" id="nom" placeholder="Le Titre du lien" class="form-control" value="<?php echo stripslashes($LiensRub['nom']);?>">

</div>
<div class="form-group">
<label for="url">Url du liens</label>
<input type="text" name="url" id="url" placeholder="L'Url du lien" class="form-control" value="<?php echo $LiensRub['url'];?>">

</div>
<div class="form-group">
<label for="affL">Affichage du liens</label>
<select name="affL" id="affL">
<option value="Y"<?php $selected=$LiensRub['affL']; ($selected=="Y") ? " selected": ""; ?> >Oui</option>
<option value="N"<?php ($selected=="N") ? " selected": ""; ?> >Non</option>
</select>
</div>
<div class="form-group">
<input type="hidden" name="id" class="btn btn-default" value="<?php echo $LiensRub['id'];?>">
<input type="submit" name="submit" class="btn btn-default" value="Enregister">
</div>

</div>
</form></div><?php }?>
</body>
</html>