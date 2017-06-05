<?php
session_start();
if(isset($_SESSION['statut']) && $_SESSION['statut']=="adminNT"){$conect="ok";}else{echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."index.php\";";
	echo"</script>";}

require_once('../inc/init.inc.php');
require("../inc/nav.class.php");
require_once('../inc/template.class.php');
require_once('../inc/domaine.class.php');
require_once('../inc/jTab.class.php');
require_once('../inc/cv.class.php');
if($_GET){extract($_GET);}else{$idT="";}
if($_POST){extract($_POST);}else{$id_temp="";$iddomaine="";$variable="";$objet="";$titre="";$editor1="";$submit="";}

Global $pdo;
$appelT=new Template();
$resultlabon=$appelT->laTemplate($idT);
if($submit=="Enregister"){

	$lien = new Template();
        $lien->setId_temp(intval($id_temp));
        $lien->setIddomaine(intval($iddomaine));
	$lien->setVariable(addslashes($variable));
	$lien->setObjet(addslashes($objet));
        $lien->setTitre(addslashes($titre));
        $lien->setTexte(addslashes($editor1));
       	$lien->savetemp();
$nomtemplate = new Navigation();
$resultNT = $nomtemplate->nomT($id_temp);
$lapage=$resultNT['fichiermail'];
	echo"<script language=\"JavaScript\" type=\"text/javascript\">";
        echo"document.location=\"".URL."emailJOB/$lapage?etn=".$id_temp."\";";
        echo"</script>";
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
    <div style='text-align:center'><h1>Modifier un mail </h1><?php echo $resultlabon['objet'];?></div>
 
    <div class="global2"> 
<div class="tophight"><form method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label for="iddomaine">Domaine: <i style="font-size:10px;font-weight:normal;color:#ccc">Intégrateur web, chef de projet</i></label>
<select name="iddomaine" id="iddomaine" class="form-control">
    <?php Global $pdo;
$appelDomaine=new Domaine();
$resultDomaine=$appelDomaine->listDomaine();
foreach ($resultDomaine as $key => $value) {?>
    <option value="<?php echo $value['id_dom'];?>" <?php if (!(strcmp("".$resultlabon['iddomaine']."", $value['id_dom']))) {echo "SELECTED";} ?>><?php echo $value['slogan1'];?></option>
<?php }?>
        
      </select>

</div>
<div class="form">
<div class="form-group">
<label for="variable">Variable de la page d'affichage</label>
<input type="text" name="variable" id="variable" placeholder="Variable" class="form-control" value="<?php echo $resultlabon['variable'];?>">

</div>
<div class="form-group">
<label for="objet">Objet du mail</label>
<input type="text" name="objet" id="objet" placeholder="Objet" class="form-control" value="<?php echo $resultlabon['objet'];?>">
</div>
    
<div class="form-group">
<label for="titre">Titre</label>
<input type="text" name="titre" id="titre" placeholder="Bonjour ou.." class="form-control" value="<?php echo $resultlabon['titre'];?>">
</div>
    
<div class="form-group">
<label for="texte">Le texte du mail</label>

<textarea name="editor1" id="editor1" rows="10" cols="80">
               <?php echo $resultlabon['texte'];?>
            </textarea>
              <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>              
</div>
<div class="form-group">
<input type="hidden" name="id_temp" value="<?php echo $resultlabon['id_temp'];?>">
<input type="submit" name="submit" class="btn btn-default" value="Enregister">
</div>

</div>
</form></div></div>
    
</body>
</html>

