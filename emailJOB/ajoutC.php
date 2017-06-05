<?php
session_start();
if(isset($_SESSION['statut']) && $_SESSION['statut']=="adminNT"){$conect="ok";}else{echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."index.php\";";
	echo"</script>";}

require_once('../inc/init.inc.php');
require("../inc/nav.class.php");
require_once('../inc/jTab.class.php');
require_once('../inc/emailC.class.php');
require_once('../inc/domaine.class.php');
require_once('../inc/cv.class.php');
if($_GET){extract($_GET);}else{$larub="";$ajt="";$nomrub="";$urll="";}
if($_POST){extract($_POST);}else{$emailcontact="";$nomcontact="";$entreprise="";$url="";$activite="";$envoi="";$submit="";}

if($submit=="Enregister"){
	$lien = new Contact();
	$lien->setEmailcontact(addslashes($emailcontact));
	$lien->setNomcontact(addslashes($nomcontact));
        $lien->setEntreprise(addslashes($entreprise));
        $lien->setUrl(addslashes($url));
        $lien->setActivite(addslashes($activite));
        $lien->setEnvoi($envoi);
	$lien->savelemail();
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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../js/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="../js/lib/bootstrap-3.3.5.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="js/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="../js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="../js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="../js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
        <style type="text/css">.global2{width:70%; margin:auto;}</style>
</head>

<body style="margin-top:-20px;" >
    <?php include('nav.php');?>
    <div style='text-align:center'><h1>Ajout Contact</h1></div>
<?php if($ajt=="ok"){?>
<div class="conectdeconect">
    
<div class="form-group">
<label >Le Contact <strong>"<?= $email;?> - <?= $contact;?>"</strong> est bien enregistré</label>
</div>
</div>
<?php }else{?> 
    <div class="global2"> 
<div class="tophight"><form method="post" action="" enctype="multipart/form-data">
<div class="form">
<div class="form-group">
<label for="emailcontact">Email</label>
<input type="text" name="emailcontact" id="emailcontact" placeholder="Email" class="form-control">

</div>
<div class="form-group">
<label for="nomcontact">Contact</label>
<input type="text" name="nomcontact" id="nomcontact" placeholder="Nom prénom" class="form-control">

</div>
<div class="form-group">
<label for="entreprise">Entreprise</label>
<input type="text" name="entreprise" id="entreprise" placeholder="Nom de l'entreprise" class="form-control">
<div class="form-group">
<label for="url">URL</label>
<input type="text" name="url" id="url" placeholder="Url l'entreprise" class="form-control">

</div>
<div class="form-group">
<label for="activite">Activite</label>
<input type="text" name="activite" id="activite" placeholder="Domaine d'activité" class="form-control">

</div>

<div class="form-group">
<input type="hidden" name="envoi" value="N">
<input type="submit" name="submit" class="btn btn-default" value="Enregister">
</div>

</div>
</form></div></div><?php }?>
    
</body>
</html>

