<?php 
session_start();
include("../inc/init.inc.php");
require("../inc/nav.class.php");
require("../inc/jTab.class.php");
require_once('../inc/domaine.class.php');
require_once('../inc/cv.class.php');
if(isset($_SESSION['statut']) && $_SESSION['statut'] === "adminNT"){ $conect = "ok"; }else{$conect = "";echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."index.php\";";
        echo"</script>";}
if($_GET){extract($_GET);}else{$idreq="";$variableC="";}
?> <!DOCTYPE html>
<!--[if lte IE 6]><html class="preIE7 preIE8 preIE9"><![endif]-->
<!--[if IE 7]><html class="preIE8 preIE9"><![endif]-->
<!--[if IE 8]><html class="preIE9"><![endif]-->
<!--[if gte IE 9]><!-->
<html lang="fr" >
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes">
<title>Template de mail</title>
<link rel="icon" type="image/png" href="<?php echo URL;?>favicon.png">
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="<?php echo URL;?>favicon.ico" /><![endif]-->

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
    <style type="text/css">
   .tab{width:95%;margin:auto; }
   
   .tab tr th{background:#044D17;color:#fff;text-align: center;padding:1px;font-size:12px;font-weight:normal}
	.thh{background:#6F5C29;padding:0px 0px px 0px;height:45px;border:1px solid #999;border-radius:5px;}
   .midlle{line-height:45px}
   .midlle1{padding-top:10px;line-height:10px}
   .midlle2{line-height:50px}
.tab td{text-align:center;}
.tab tr:nth-child(odd) .creme{background:#F7F4CB;padding:0px 0px px 0px;height:50px;border:1px solid #999;border-radius:5px;}
.tab tr:nth-child(even) .creme{background:#fff;padding:0px 0px px 0px;height:50px;border:1px solid #999;border-radius:5px;}
.tab td:nth-child(1){width:4%;font-size:8px;}
.tab td:nth-child(1){font-size:8px;}
.tab td:nth-child(2){width:35%;font-size:11px;}
.tab td:nth-child(3){width:10%;font-size:10px;}
.tab td:nth-child(4){width:15%;font-size:10px;}
.tab td:nth-child(5){width:10%;font-size:10px;}
.tab td:nth-child(6){width:10%;font-size:9px;}
.tab td:nth-child(7){width:10%;font-size:9px;}
	a{text-decoration:none; color:black;}
	a:hover{color:green;}
	.five{padding-top:5px}
        .tbsql{width:100%;height:45px}
        .tbsql td:nth-child(1){width:90%;font-size:14px;}
        .tbsql td:nth-child(2){width:10%;font-size:14px;}
        .bts1:hover{opacity:0.7}
        .bts2:hover{opacity:0.7}
    </style>
   
</head>
<body style="margin:-20px 0px 0px 0px; padding:0px; -webkit-text-size-adjust:none;background:#044D17;">
<?php include("nav.php");
function butonsql($titre,$id,$id2){

echo"<table class=\"tbsql\"> 
    <tr>
        <td width=\"90%\" rowspan=\"2\" style=\" text-align:center;color:#fff\">$titre</td>
        <td width=\"10%\"><a href=\"?idreq=$id\"><img src=\"img/flecheH2.png\" class=\"bts1\"></a></td>
        
    </tr>
    <tr>
        <td width=\"10%\"><a href=\"?idreq=$id2\"><img src=\"img/flechB.png\" class=\"bts2\"></a></td>
        <td></td>
    </tr>
    </table>";
}
?>
    <table class="tab"><tr><th><div class="thh midlle">Date</div></th><th><div class="thh midlle"><?php  butonsql("Objet",3,4);?></div></th><th><div class="thh">Variable<br>Domaine<br>CV</div></th><th>
                <div class="thh"><?php  butonsql("Email de contact",1,2);?></div></th><th><div class="thh midlle">Nom du contact </div></th><th><div class="thh midlle">Entreprise</div></th><th><div class="thh midlle">Activite</div></th></tr>
        <?php
        $lesenvoi=new Jointab;
            switch($idreq){
case '1' :
$resulEnvoi=$lesenvoi->listenvoimail();
break;
case '2' :
$resulEnvoi=$lesenvoi->listenvoimail2();
break;
case '3' :
$resulEnvoi=$lesenvoi->listenvoimail3();
break;
case '4' :
$resulEnvoi=$lesenvoi->listenvoimail4();
break;
default:
$resulEnvoi=$lesenvoi->listenvoi();
break;
}
 
if($resulEnvoi!=''){
 foreach($resulEnvoi as $key => $value){
 ?>
  <tr id="ici"><td><div class="creme midlle1"><?php echo $value['id_joint'];?><br><?php echo $value['dateT'];?></div></td>
  <td class="objet"><div class="creme midlle2">
          <a href="<?php echo $value['fichierweb'];?>?etn=<?php echo $value['variable'];?>"><?php echo $value['objet'];?></a>
      </div></td>
  <td><div class="creme five">
      <?php echo $value['variable'];?>
  <br><?php echo $value['slogan1'];?>    
  <br><a href="<?php echo $value['fichiercv'];?>?etn=<?php echo $value['variable'];?>" target="_blank"><?php echo $value['nom'];?></a>      
</div>
  </td>
  <td><div class="creme midlle2"> 
  <?php echo $value['emailcontact'];?></a>
</div>
 </td>
 <td><div class="creme midlle2"><a href="modifC.php?idc=<?php echo $value['id_lemail'];?>&variableC=<?php echo $value['variable'];?>"><?php echo $value['nomcontact'];?> </div>
 </td>
 <td><div class="creme midlle2"><?php echo $value['entreprise'];?></div>
 </td>
 <td><div class="creme five"><?php echo $value['activite'];?></div>
 </td></tr>   
 <?php }  
}else
    { echo "<tr><td colspan='7'>aucun message envoyé</td><tr>";}
?> </table>  
<!--
<script>function showNote(str){	
if(str === ""){}else
{$(document).ready(function() 
{
$.post( 'result.php', { name: str },function(data){$('#ntd'+str).html(data);
});
});
}
}</script>
<TABLE width="100%" border="0">
<TR> 
<TD width="80%" rowspan="2" style=" text-align:center;color:#fff">Email de contact</TD> 
<TD width="25%"><a href="?idreq="><img src="img/flecheH2.png" ></a></TD> 
<TD width="25%"></TD>
</TR> 
<TR> 
<TD width="55%"><a href="?idreq="><img src="img/flechB.png"></a></TD>
<TD width="52%"></TD> 
</TR> 
</TABLE></body>
</html>




--!>