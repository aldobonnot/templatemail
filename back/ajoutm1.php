<?php
session_start();
if(isset($_SESSION['statut']) && $_SESSION['statut']=="adminNT"){$conect="ok";}else{echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."index.php\";";
	echo"</script>";}
require_once('../inc/init.inc.php');
require('../inc/rub.class.php');
if($_GET){
	extract($_GET);
}else{
	$ajt="";
	$nomrub="";}
if($_POST){
	extract($_POST);
}else{
	$nom="";
	$submit="";
}

if($submit=="Enregister"){
	$rub = new Rubrique();
	$rub->setNom(addslashes($nom));
	$rub->save();
	echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."back/ajoutm1.php?ajt=ok&nomrub=".$nom."\";";
	echo"</script>";
	//header("location:".URL."back/ajoutm1.php?ajt=ok&nomrub=".$nom."");
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
<label >La rubrique <strong>"<?php echo $nomrub; ?>"</strong> est bien enregistrée</label>
</div>
</div>
<?php }else{?> 
<div class="tophight"><form method="post" action="" enctype="multipart/form-data">
<div class="form">
<div class="form-group">
<label for="nom">Rubrique</label>
<input type="text" name="nom" id="nom" placeholder="Le nom de la rubrique" class="form-control">

</div>

<div class="form-group">
<input type="submit" name="submit" class="btn btn-default" value="Enregister">
</div>

</div>
</form></div><?php }?>
</body>
</html>