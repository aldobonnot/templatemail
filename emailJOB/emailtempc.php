<?php
if(!isset($_GET['etn'])) $etn=""; else $etn=$_GET['etn'];
include("../inc/init.inc.php");
require("../inc/template.class.php");

Global $pdo;
$appelT=new Template();
$resultlabon=$appelT->versionweb($etn);
//$result = execute_requete("SELECT * FROM templatemail WHERE variable='$etn'");
//$resultlabon = $result->fetch(PDO::FETCH_ASSOC);
$lidtemplate=$resultlabon['id_temp'];
$fichierweb=$resultlabon['fichierweb'];
$lavariable=$resultlabon['variable'];
$fichiercv =$resultlabon['fichiercv'];
$fichierpdf =$resultlabon['fichierpdf'];
$adresse="".URL."emailJOB/$fichierweb?etn=$lavariable";
$urlimg="".URL."emailJOB/img/nt.png";
$cv="".URL."emailJOB/$fichiercv?etn=$lavariable";
$cvpdf="".URL."emailJOB/$fichierpdf";
$lobjet=$resultlabon['objet'];
$slogan1=$resultlabon['slogan1'];
$slogan2=$resultlabon['slogan2'];
$slogan3=$resultlabon['slogan3'];
$titre1="$resultlabon[titre]";

$contenu1="$resultlabon[texte]";



$titre2="Marketing:";
$contenu2="
<table cellpadding='0' cellspacing='0'>
<tr><td style='color:#ffffff;'>Accueil des clients</td><td class='etoile'>+ + + + + </td></tr>
<tr><td style='color:#ffffff;'>Conseils </td><td class='etoile'>+ + + + + </td></tr>
<tr><td style='color:#ffffff;'>Ecoute des besoins et des freins </td><td class='etoile'>+ + + +</td></tr>
<tr><td style='color:#ffffff;'>Argumentaires de ventes </td><td class='etoile'>+ + + </td></tr>
<tr><td style='color:#ffffff;'>Conclusion de ventes  </td><td class='etoile'>+ + +  </td></tr>
</table>
";

$titre3="Management:";
$contenu3="<table cellpadding='0' cellspacing='0'>
<tr><td style='color:#ffffff;'>Gestion des stocks</td><td class='etoile'>+ + + + +</td></tr>
<tr><td style='color:#ffffff;'>Animation d'une équipe </td><td class='etoile'>+ + + </td></tr>
<tr><td style='color:#ffffff;'>Répartition des tâches </td><td class='etoile'>+ + + + </td></tr>
<tr><td style='color:#ffffff;'>Calcul temps de travail </td><td class='etoile'>+ + + + </td></tr>
</table>";

$titre4="Logiciels :";
$contenu4="
<table cellpadding='0' cellspacing='0'>
<tr><td class='article-content2'>Word </td><td class='etoilea'>+ + + +</td></tr>
<tr><td class='article-content2'>Excel</td><td class='etoilea'>+ + + +</td></tr>
<tr><td class='article-content2'>Ms project </td><td class='etoilea'>+ + </td></tr>
<tr><td class='article-content2'>Suite Libre office </td><td class='etoilea'>+ + + +</td></tr>
<tr><td class='article-content2'>Photoshop</td><td class='etoilea'>+ + + + </td></tr>
<tr><td class='article-content2'>InDesign </td><td class='etoilea'>+ + </td></tr>
</table>";

$titre5="Connaissances internet :";
$contenu5="<table cellpadding='0' cellspacing='0'>
<tr><td class='article-content2'>Wordpress</td><td class='etoilea'>+ + +  </td></tr>
<tr><td class='article-content2'>Drupal </td><td class='etoilea'>+ + +  </td></tr>
<tr><td class='article-content2'>Prestashop </td><td class='etoilea'>+ + + </td></tr>
<tr><td class='article-content2'>Html</td><td class='etoilea'>+ + + + + </td></tr>
<tr><td class='article-content2'>Css </td><td class='etoilea'>+ + + + + </td></tr>
<tr><td class='article-content2'>Mysql</td><td class='etoilea'>+ + + </td></tr>
<tr><td class='article-content2'>Dreamweaver </td><td class='etoilea'>+ + + + +</td></tr>

</table>";
 $titre6="Les entreprises:";
  $contenu61="
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"#\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">TOTAL SA</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"#\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">WANADOO</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"#\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">IRIS Fenêtres</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"#\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">KparK</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"#\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Laboratoire RACINE</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"#\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Mega SCOOTER</span></a><br>
";
$contenu6='
<a style="color:#0c4c8a; font-size:12px;"  href="#" target="_blank"><span style="color:#0c4c8a; font-size:12px;">TOTAL SA</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="#" target="_blank"><span style="color:#0c4c8a; font-size:12px;">WANADOO</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="#" target="_blank"><span style="color:#0c4c8a; font-size:12px;">IRIS Fenêtres</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="#" target="_blank"><span style="color:#0c4c8a; font-size:12px;">KparK</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="#" target="_blank"><span style="color:#0c4c8a; font-size:12px;">Laboratoire RACINE</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="#" target="_blank"><span style="color:#0c4c8a; font-size:12px;">Mega SCOOTER</span></a><br>
';



$titre7="Formations :";
$contenu7="<b>2017</b> Chef de projet Multimédia - Doranco<br>
<b>2016</b> Développeur expert PHP et CMS Ecole Aston<br>
<b>2007</b> Management et conduite de projets informatiques, C3E, Paris XI<br>
<b>2004</b> Développement de site Internet en Php/MySql, CREFAC, Pantin<br>
<b>2001</b> Web Marketing, IFOCOP, Rungis<br>
<b>1998</b> Création de site en Html AFCI, Montreuil";
?> 
 <!DOCTYPE html>
<!--[if lte IE 6]><html class="preIE7 preIE8 preIE9"><![endif]-->
<!--[if IE 7]><html class="preIE8 preIE9"><![endif]-->
<!--[if IE 8]><html class="preIE9"><![endif]-->
<!--[if gte IE 9]><!-->
<html lang="fr" >
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes">
<title><?php echo $lobjet;?></title>
 <link rel="stylesheet" type="text/css" href="css/tc.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/tc_print.css" media="print" />  
</head>
<body style="margin:0px; padding:0px; -webkit-text-size-adjust:none;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td align="center" >
                    <table  cellpadding="0" cellspacing="0" border="0">
                        <tbody>  
                            <tr class="pagetoplogo">
                                <td class="w640"  width="640">
                                   <!-- trois colonnes____________________________________!-->
                                                    <table class="w580"  width="640" cellpadding="0" cellspacing="0" border="0" style="background:#0c4c8a;">
                                                        <tbody>
                                                           
                                                            <tr>
                                                                <td class="w180"  width="180" >
                                                                    <div align="center" class="one"><hr class="br">
                                                                        Thierry NAVAS
                                                                    </div>
                                                                </td>

                                                                <td class="w20"  width="20"></td>
                                                                <td class="w180"  width="180">
																<div align="center" class="onep">
                                                                        <img class="w180" width="50" src="img/nt.png" alt="Navas Thierry"/>
                                                                    </div>
                                                                    
                                                                </td>

                                                                <td class="w20"  width="20"></td>
                                                                <td class="w180"  width="180" >
                                                                    <div align="center" class="oneital">
                                                                        <?php echo $slogan1;?> <hr class="br">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                          </tbody>
                                                    </table>
													<!-- trois colonnes____________________________________!-->
													<table class="w580"  width="640" cellspacing="0" cellpadding="0" border="0" style="background:#97d5e0;">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td class="w180"  width="275" >
                                                                    <div align="center" class="two">
                                                                        <p> <?php echo $slogan2;?> </p>
                                                                       
                                                                    </div>
                                                                </td>
                                                                <td class="w20"  width="30"></td>
                                                                <td class="w180"  width="275" valign="top">
                                                                    <div align="center" class="two">
                                                                        <p><?php echo $slogan3;?> </p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                </td>
                            </tr>

                            <!-- separateur horizontal -->
                            <tr>
                                <td  class="w640"  width="640" height="1" bgcolor="#d7d6d6"></td>
                            </tr>

                             <!-- contenu -->
                            <tr class="content">
                                <td class="w640"  width="640" bgcolor="#ffffff">
                                    <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td  class="w30"  width="30"></td>
                                                <td  class="w580"  width="580">
                                                    <!-- une zone de contenu -->
                                                    <table class="w582"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w582"  width="580">
                                                                    <h3 style="color:#0c4c8a; font-size:22px; padding-top:12px;">
                                                                        <?php echo $titre1;?>  </h3>

                                                                    <div align="left" class="article-content padd5">
																	<?php echo $contenu1;?>
                                                                        
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                    <!-- fin zone -->                                                   

                                                    <!-- une autre zone de contenu -->
                                                    <table class="w580"  width="640" cellspacing="0" cellpadding="0" border="0" >
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td class="w180"  width="275"  valign="top">
                                                                    <div align="left" class="trois">
                                                                         <strong><?php echo $titre2;?></strong><br><?php echo $contenu2;?>
                                                                       
                                                                    </div>
                                                                </td>
                                                                <td class="w20"  width="30"></td>
                                                                <td class="w180"  width="275">
                                                                    <div align="left" class="trois">
                                                                        <strong><?php echo $titre3;?></strong><br><?php echo $contenu3;?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
<!-- trois colonnes____________________________________!--> 
<div class="quatre">
                                                    <table class="w582"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>
                                                                                                                        <tr>
                                                                <td class="w180"  width="180" valign="top">
                                                                    <div align="left" class="article-content2">
                                                                         <strong class="h4"><?php echo $titre4;?> </strong><br><?php echo $contenu4;?>
                                                                    </div> 
                                                                </td>

                                                                <td class="w20"  width="20"></td>
                                                                <td class="w180"  width="180" valign="top">
                                                                    <div align="left" class="article-content2">
                                                                       <hr class="br"><strong class="h4"><?php echo $titre5;?> </strong><br><?php echo $contenu5;?>
                                                                    </div>
                                                                </td>

                                                                <td class="w20"  width="20"></td>
                                                                <td class="w180"  width="180" valign="top">
                                                                    <hr class="br"><div align="left" class="article-content2">
                                                                        <strong class="h4"><?php echo $titre6;?></strong><br><?php echo $contenu6;?>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                           </tbody>
                                                    </table>
													</div><!-- trois colonnes____________________________________!-->
													<table class="w582"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w582"  width="580">
                                                                    <h3 style="color:#0c4c8a; font-size:22px; padding-top:12px;">
                                                                        <?php echo $titre7;?>  </h3>

                                                                    <div align="left" class="article-content3">
																	<?php echo $contenu7;?>
                                                                        
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="w30" width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!--  separateur horizontal de 15px de haut -->
                            <tr>
                                <td class="w640"  width="640" height="15" bgcolor="#ffffff"></td>
                            </tr>

                            <!-- pied de page -->
                            <tr >
                                <td class="w640"  width="640">
                                     <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" style="background:#5587a2;">
                                             <tbody>
                                                           
                                                            <tr>
                                                                <td class="w180"  width="180" >
                                                                    <div  class="foot1" style="padding:1px 1px 1px 4px;color:#ffffff;"><hr class="br">
                                                                       <p > Thierry NAVAS<br>9 Rue René Boulanger<br>75010 PARIS</p>
                                                                    </div>
                                                                </td>

                                                                <td class="w20"  width="20"></td>
                                                                <td class="w180"  width="180">
																<div align="center" class="foot" style="color:#ffffff;">
                                                                       07.81.55.84.61<br>thierry.navas@neuf.fr
                                                                    </div>
                                                                    
                                                                </td>

                                                                <td class="w20"  width="20"></td>
                                                                <td class="w180"  width="180" >
                                                                    <div align="center" class="foot"  style="">
     <table cellpadding="2" cellspacing="2" border="0" style="width:100px"><tr>
             <td><div class="cvwhite"><a class="acv"  href="<?php echo $cv;?>" target="_blank">CV en ligne</a></div></td></tr><tr>
     <td><div class="cvwhite"><a class="acv"  href="<?php echo $cvpdf;?>" target="_blank">CV PDF</a></div></td></tr></table>
                                                                        <hr class="br">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                              </tbody>
									</table>
                                </td>
                            </tr>
                            <tr>
                                <td class="w640"  width="640" height="60"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>