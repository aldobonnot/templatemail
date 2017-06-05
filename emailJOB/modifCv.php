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
if($_GET){extract($_GET);}else{$idD="";}
if($_POST){extract($_POST);}else{$id="";$nom="";$fichiercv="";$fichiermail ="";$fichierpdf="";$fichierweb="";$titrecv="";$editor1="";$submit="";}
$appelC = new Cv();
$resultCv = $appelC->findcv($idD);
if($submit=="Enregister"){
	$lien = new Cv();
        $lien->setId_cv(intval($id));
        $lien->setNom(addslashes($nom));
        $lien->setFichiercv(addslashes($fichiercv));
        $lien->setFichiermail(addslashes($fichiermail));
        $lien->setFichierpdf(addslashes($fichierpdf));
	$lien->setFichierweb(addslashes($fichierweb));
        $lien->setTitrecv(addslashes($titrecv));
        $lien->setCompetences(addslashes($editor1));
        $lien->savecv();

	
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
<script src="../../ckeditor/ckeditor.js"></script>
	<script src="../../ckeditor/sample/js/sample.js"></script>
	<link rel="stylesheet" href="../../ckeditor/sample/css/samples.css">
	<link rel="stylesheet" href="../../ckeditor/sample/toolbarconfigurator/lib/codemirror/neo.css">
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
    <div style='text-align:center'><h1>Modif Cv <?php echo $resultCv['nom'];?></h1></div>

    <div class="global2"> 
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
<label for="nom">Nom du Cv</label>
<input type="text" name="nom" id="nom" placeholder="nom du cv" class="form-control"  value="<?php echo $resultCv['nom'];?>">
</div>
        
        <div class="form-group">
<label for="fichiercv">Fichier du cv sur le web</label>
<input type="text" name="fichiercv" id="fichiercv" placeholder="fichier.php" class="form-control"  value="<?php echo $resultCv['fichiercv'];?>">
</div>
        
        <div class="form-group">
<label for="fichiermail">Fichier du template mail(pour l'envoi)</label>
<input type="text" name="fichiermail" id="fichiermail" placeholder="fichier.php" class="form-control"  value="<?php echo $resultCv['fichiermail'];?>">
</div>
        
        <div class="form-group">
<label for="fichierpdf">Le cv.pdf</label>
<input type="text" name="fichierpdf" id="fichierpdf" placeholder="fichier.pdf" class="form-control"  value="<?php echo $resultCv['fichierpdf'];?>">
</div>

<div class="form-group">
<label for="fichierweb">Fichier visialisation du mail sur le web</label>
<input type="text" name="fichierweb" id="fichierweb" placeholder="fichier.php" class="form-control"  value="<?php echo $resultCv['fichierweb'];?>">
</div>
        
<div class="form-group">
<label for="titrecv">Titre du cv</label>
<input type="text" name="titrecv" id="titrecv" placeholder="Ex: Compétences" class="form-control"  value="<?php echo $resultCv['titrecv'];?>">
</div>
        
<div class="form-group">
<label for="competences">Descriptif des compétences</label>
<textarea name="editor1" id="editor1" rows="10" cols="80">
               <?php echo $resultCv['competences'];?>
            </textarea>
              <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script> 

</div>

<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $resultCv['id_cv'];?>">
<input type="submit" name="submit" class="btn btn-default" value="Enregister">
</div>
</form>
    </div>
    
</body>
</html>

