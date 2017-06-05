<?php
session_start();
if(isset($_SESSION['statut']) && $_SESSION['statut']=="adminNT"){$conect="ok";}else{echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."index.php\";";
	echo"</script>";}

require_once('../inc/init.inc.php');
require('../inc/liens.class.php');
if($_GET){extract($_GET);}else{$larub="";$ajt="";$nomrub="";$urll="";}
if($_POST){extract($_POST);}else{$idRub="";$nom="";$url="";$submit="";}

if($submit=="Enregister"){
	$lien = new Liens();
	$lien->setIdRub(intval($idRub));
	$lien->setNom(addslashes($nom));
	$lien->setUrl($url);
	$lien->save();

	echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."back/ajoutlien.php?ajt=ok&nomrub=".$nom."&urll=".$url."\";";
	echo"</script>";
	//header("location:".URL."back/ajoutlien.php?ajt=ok&nomrub=".$nom."&urll=".$url."");
	}

	
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
<label >Le liens <strong>"<?= $nomrub;?> - <?= $urll;?>"</strong> est bien enregistrée</label>
</div>
</div>
<?php }else{?> 
<div class="tophight"><form method="post" action="" enctype="multipart/form-data">
<div class="form">
<div class="form-group">
<label for="nom">Titre du liens</label>
<input type="text" name="nom" id="nom" placeholder="Le Titre du lien" class="form-control">

</div>
<div class="form-group">
<label for="url">Url du liens</label>
<input type="text" name="url" id="url" placeholder="L'Url du lien" class="form-control">

</div>

<div class="form-group">
<input type="hidden" name="idRub" class="btn btn-default" value="<?php echo $larub;?>">
<input type="submit" name="submit" class="btn btn-default" value="Enregister">
</div>

</div>
</form></div><?php }?>
</body>
</html>