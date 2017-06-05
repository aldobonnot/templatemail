<?php
session_start();
if(isset($_SESSION['statut']) && $_SESSION['statut']=="adminNT"){$conect="ok";}else{echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."index.php\";";
	echo"</script>";}

require_once('../inc/init.inc.php');
require("../inc/nav.class.php");
require_once('../inc/jTab.class.php');
require_once('../inc/template.class.php');
require_once('../inc/domaine.class.php');
require_once('../inc/cv.class.php');
if($_GET){extract($_GET);}else{$id="";}
if($_POST){extract($_POST);}else{$idcv="";$slogan1="";$slogan2="";$slogan3="";$submit="";}

if($submit=="Enregister"){
	$lien = new Domaine();
        $lien->setIdcv(intval($idcv));
	$lien->setSlogan1(addslashes($slogan1));
        $lien->setSlogan2(addslashes($slogan2));
        $lien->setSlogan3(addslashes($slogan3));
        $lien->savedom();
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
    <div style='text-align:center'><h1>Ajout Domaine</h1></div>

    <div class="global2"> 
        <form method="post" action="" enctype="multipart/form-data">
<div class="form-group">
    <label for="idcv">CV à utiliser: <i style="font-size:10px;font-weight:normal;color:#ccc">web, commerce</i></label>
<select name="idcv" id="idcv" class="form-control">
    <?php Global $pdo;
$appelCv=new Cv();
$resultCv=$appelCv->listCV();
foreach ($resultCv as $key => $value) {?>
    <option value="<?php echo $value['id_cv'];?>"><?php echo $value['nom'];?></option>
<?php }?>
        
      </select>

</div>

<div class="form-group">
<label for="objet">Slogan1</label>
<input type="text" name="slogan1" id="slogan1" placeholder="Intégrateur web" class="form-control">
</div>
        
<div class="form-group">
<label for="objet">Slogan2</label>
<input type="text" name="slogan2" id="slogan2" placeholder="Responsive Design" class="form-control">
</div>
        
<div class="form-group">
<label for="objet">Slogan3</label>
<input type="text" name="slogan3" id="slogan3" placeholder="Sites Web, Templates email" class="form-control">
</div>

<div class="form-group">
<input type="submit" name="submit" class="btn btn-default" value="Enregister">
</div>
</form>
    </div>
    
</body>
</html>

