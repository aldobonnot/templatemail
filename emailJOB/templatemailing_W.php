<?php 
session_start();
include("../inc/init.inc.php");
require("../inc/template.class.php");
require("../inc/nav.class.php");
require("../inc/emailC.class.php");
require("../inc/jTab.class.php");
require_once('../inc/domaine.class.php');
require_once('../inc/cv.class.php');
if(isset($_SESSION['statut']) && $_SESSION['statut'] === "adminNT"){ $conect = "ok"; }else{$conect = "";echo"<script language=\"JavaScript\" type=\"text/javascript\">";
echo"document.location=\"".URL."index.php\";";
echo"</script>";}
if(!isset($_GET['etn'])) $etn=""; else $etn=$_GET['etn'];
if(!isset($_POST['envoiemail'])) $envoiemail=""; else $envoiemail=$_POST['envoiemail'];
if(!isset($_POST['selectmail'])) $selectmail=""; else $selectmail=$_POST['selectmail'];
if(!isset($_POST['iddelatemplate'])) $iddelatemplate=""; else $iddelatemplate=$_POST['iddelatemplate'];

Global $pdo;
$appelT=new Template();

$resultlabon=$appelT->laTemplate($etn);

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
if($selectmail=="okselect"){

foreach($_POST['id_mail'] as $k => $v){
$New0 = $_POST['envoi'][$k];
$query = "UPDATE lmjob SET envoi='$New0' WHERE id_lemail='$v'";

    if ($pdo->query($query) === FALSE) {
        echo "Error: " .$pdo->errorInfo(). "<br>";
    } else {
        echo"<script language=\"JavaScript\" type=\"text/javascript\">";
        echo"document.location=\"?etn=$lidtemplate\";";
        echo"</script>";}
}
}
$titre2="Langages web:";
$contenu2="
<table cellpadding='0' cellspacing='0'>
<tr><td style='color:#ffffff;'>Html5</td><td class='etoile'>+ + + + + </td></tr>
<tr><td style='color:#ffffff;'>Css3 </td><td class='etoile'>+ + + + + </td></tr>
<tr><td style='color:#ffffff;'>JavaScript </td><td class='etoile'>+ + + </td></tr>
<tr><td style='color:#ffffff;'>AJAX </td><td class='etoile'>+ + + </td></tr>
<tr><td style='color:#ffffff;'>Php 5 et 7  </td><td class='etoile'>+ + + + </td></tr>
<tr><td style='color:#ffffff;'>Sql </td><td class='etoile'>+ + + </td></tr>
<tr><td style='color:#ffffff;'>XML </td><td class='etoile'>+ + </td></tr>
<tr><td style='color:#ffffff;'>Schema.org </td><td class='etoile'>+ + + </td></tr>
</table>
";

$titre3="Framework / CMS / API / Librairies :";
$contenu3="<table cellpadding='0' cellspacing='0'>
<tr><td style='color:#ffffff;'>Compass (sass)</td><td class='etoile'>+ + + + </td></tr>
<tr><td style='color:#ffffff;'>Jquery </td><td class='etoile'>+ + + </td></tr>
<tr><td style='color:#ffffff;'>Bootstrap </td><td class='etoile'>+ + + + </td></tr>
<tr><td style='color:#ffffff;'>Fancybox </td><td class='etoile'>+ + + + </td></tr>
<tr><td style='color:#ffffff;'>Ckeditor </td><td class='etoile'>+ + + + </td></tr>
<tr><td style='color:#ffffff;'>Google Map </td><td class='etoile'>+ + + </td></tr>
<tr><td style='color:#ffffff;'>Paypal </td><td class='etoile'>+ + </td></tr>
<tr><td style='color:#ffffff;'>Ogone </td><td class='etoile'>+ + </td></tr>
<tr><td style='color:#ffffff;'>Allopass </td><td class='etoile'>+ + + </td></tr>
<tr><td style='color:#ffffff;'>AngularJS </td><td class='etoile'>+ + </td></tr>
<tr><td style='color:#ffffff;'>Symfony </td><td class='etoile'>+ + </td></tr>
<tr><td style='color:#ffffff;'>Drupal </td><td class='etoile'>+ + + </td></tr>
</table>";

$titre4="Logiciels :";
$contenu4="
<table cellpadding='0' cellspacing='0'>
<tr><td class='article-content2'>Photoshop</td><td class='etoilea'>+ + + + </td></tr>
<tr><td class='article-content2'>Illustrator </td><td class='etoilea'>+ + </td></tr>
<tr><td class='article-content2'>InDesign </td><td class='etoilea'>+ + </td></tr>
<tr><td class='article-content2'>GIMP </td><td class='etoilea'>+ + + + </td></tr>
<tr><td class='article-content2'>Bryce </td><td class='etoilea'>+ + + + </td></tr>
<tr><td class='article-content2'>Flash </td><td class='etoilea'>+ + + </td></tr>
<tr><td class='article-content2'>Mobirise </td><td class='etoilea'>+ + + +</td></tr>
<tr><td class='article-content2'>Wow slider </td><td class='etoilea'>+ + + +</td></tr>
<tr><td class='article-content2'>Suite Libre office </td><td class='etoilea'>+ + + +</td></tr>
<tr><td class='article-content2'>Ms project </td><td class='etoilea'>+ + </td></tr>
<tr><td class='article-content2'>Visual-Paradigm </td><td class='etoilea'>+ + </td></tr>

</table>";

$titre5=" Outils de développement :";
$contenu5="<table cellpadding='0' cellspacing='0'>
<tr><td class='article-content2'>Dreamweaver</td><td class='etoilea'>0 0 0 0 0  </td></tr>
<tr><td class='article-content2'>Bracket </td><td class='etoilea'>+ + + + </td></tr>
<tr><td class='article-content2'>NetBeans </td><td class='etoilea'>+ + + + </td></tr>
<tr><td class='article-content2'>Notepad ++</td><td class='etoilea'>+ + + + + </td></tr>
<tr><td class='article-content2'>MySQL Workbench </td><td class='etoilea'>+ + + </td></tr>
<tr><td class='article-content2'>PhpStorm </td><td class='etoilea'>+ + + </td></tr>
<tr><td class='article-content2'>Git </td><td class='etoilea'>+ + +</td></tr>
<tr><td class='article-content2'>Node.js </td><td class='etoilea'>+ + +</td></tr>
<tr><td class='article-content2'>Grunt </td><td class='etoilea'>+ + + </td></tr>
<tr><td class='article-content2'>PrimeNG </td><td class='etoilea'>+ + </td></tr>
</table>";
 $titre6="Sites Créés en gestion:";
  $contenu61="
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"http://www.shota-tksom.com/\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">TKsom</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"http://www.dixon-securite.fr/\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Dixon</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"http://www.z-workshop.fr/\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Z-Workshop</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"http://bert-the-madsilkscreamer.com/\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Bert Bélanger</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"http://mellino.fr/\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Mellino</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"http://www.parisenphotos.com\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Parisenphotos</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"http://www.cheminements-solidaires.com/\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Cheminements-Solidaire</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"http://guillemette-buffault.com/\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Guillemette Buffault</span></a><br>
<a style=\"color:#0c4c8a; font-size:12px;\"  href=\"http://paris.web.presence.free.fr/\" target=\"_blank\"><span style=\"color:#0c4c8a; font-size:12px;\">Présence Web</span></a>";
$contenu6='<a style="color:#0c4c8a; font-size:12px;"  href="http://www.shota-tksom.com/" target=\"_blank\"><span style="color:#0c4c8a; font-size:12px;">TKsom</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="http://www.dixon-securite.fr/" target=\"_blank\"><span style="color:#0c4c8a; font-size:12px;">Dixon</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="http://www.z-workshop.fr/" target=\"_blank\"><span style="color:#0c4c8a; font-size:12px;">Z-Workshop</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="http://bert-the-madsilkscreamer.com/" target=\"_blank\"><span style="color:#0c4c8a; font-size:12px;">Bert Bélanger</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="http://mellino.fr/" target=\"_blank\"><span style="color:#0c4c8a; font-size:12px;">Mellino</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="http://www.parisenphotos.com" target=\"_blank\"><span style="color:#0c4c8a; font-size:12px;">Parisenphotos</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="http://www.cheminements-solidaires.com/" target=\"_blank\"><span style="color:#0c4c8a; font-size:12px;">Cheminements-Solidaire</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="http://guillemette-buffault.com/" target=\"_blank\"><span style="color:#0c4c8a; font-size:12px;">Guillemette Buffault</span></a><br>
<a style="color:#0c4c8a; font-size:12px;"  href="http://paris.web.presence.free.fr/" target=\"_blank\"><span style="color:#0c4c8a; font-size:12px;">Présence Web</span></a>';


$titre7="Formations :";
$contenu7="<b>2017</b> Chef de projet Multimédia - Doranco<br>
<b>2016</b> Développeur expert PHP et CMS Ecole Aston<br>
<b>2007</b> Management et conduite de projets informatiques, C3E, Paris XI<br>
<b>2004</b> Développement de site Internet en Php/MySql, CREFAC, Pantin<br>
<b>2001</b> Web Marketing, IFOCOP, Rungis<br>
<b>1998</b> Création de site en Html AFCI, Montreuil";


$titre8="";
$contenu8="";
$lesemailsutilises="";
if($envoiemail=="okmail"){

$objet= $resultlabon['objet'];
$entete= "MIME-Version: 1.0\r\n".
   "Content-type: text/html; charset=utf-8\r\n";

$entete .= 'From: <thierry.navas@parisenphotos.com>' ."\r\n" .
 'Reply-To: thierry.navas@neuf.fr' . "\r\n" .
 'Disposition-Notification-To: thierry.navas@neuf.fr' . "\r\n" . 
 'Read-Receipt-To: thierry.navas@neuf.fr' . "\r\n" . 
 'X-Confirm-reading-to: thierry.navas@neuf.fr' . "\r\n" .
 'Return-Receipt-To: thierry.navas@neuf.fr' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
$message="<html><head>
<style type=\"text/css\">
    /* Fonts and Content */
    body, td { font-family: Tohoma, Arial, Helvetica, Geneva, sans-serif; font-size:14px; }
    body {  margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
    h2{ padding-top:12px; /* ne fonctionnera pas sous Outlook 2007+  */color:#0E7693; font-size:22px; }
    .one{font-family: Tohoma, Arial, Helvetica, Geneva, sans-serif; font-size:20px;color:#ffffff;} 
	.oneital{font-family: Tohoma, Arial, Helvetica, Geneva, sans-serif; font-size:20px;color:#ffffff;font-style:italic;} 
	.two{font-family: Tohoma, Arial, Helvetica, Geneva, sans-serif; font-size:14px;color:#0c4c8a;} 
	.trois{width:95%;min-height:255px;6margin:auto;padding:6px;background:#5587a2;-moz-border-radius: 6px 6px 6px 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px 6px 6px 6px;color:#ffffff;}
	.etoile{padding-left:5px;font-size:16px;color:#FAAC58}
	.etoilea{padding-left:5px;font-size:14px;color:#B43104}
	
	.quatre{margin:10px 3px 10px 3px;padding:4px;background:#97d5e0;-moz-border-radius: 6px 6px 6px 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px 6px 6px 6px;color:#0c4c8a;}
	
	.article-content2{font-size:12px;color:#0c4c8a;}
	.article-content3{font-size:14px;}
	.h4{margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; color:#0c4c8a;font-size:13px}
	.br{display:none;}
	.foot1{text-align:left;}
        .cvwhite{margin:2px;padding:2px;font-weight:bold;background:#ffffff;-moz-border-radius: 6px 6px 6px 6px; -webkit-border-radius: 6px;
    border-radius: 6px 6px 6px 6px;color:#0c4c8a;text-align:center;border: 1px solid #4d6b7b;color:#ff4400;}
    @media only screen and (max-width: 480px) { 

        table[class=w275], td[class=w275], img[class=w275] { width:135px !important; }
        table[class=w30], td[class=w30], img[class=w30] { width:10px !important; }  
        table[class=w580], td[class=w580], img[class=w580] { width:100% !important; }
		 table[class=w582], td[class=w582], img[class=w582] { width:90% !important;margin:auto; }
        table[class=w640], td[class=w640], img[class=w640] { width:100% !important; }
        img{ height:auto;}
         /*illisible, on passe donc sur 3 lignes */
        table[class=w180], td[class=w180] { 
            width:100% !important; 
            display:block;
        }    
        td[class=w20]{ display:none; }  
.br{height:1px;color:transparent;opacity: 0;
    filter: alpha(opacity=0); display:block;}
.trois{margin:auto;margin-bottom:3px;min-height:75px}	
.article-content3{font-size:10px;}	
.foot1{text-align:center;}
    } 
 </style>
	</head>
      <body>
	  <body style=\"margin:0px; padding:0px; -webkit-text-size-adjust:none;\">

    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
        <tbody>
            <tr>
                <td align=\"center\" >
                    <table  cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
                        <tbody>                            
                            <tr>
                                <td class=\"w640\"  width=\"640\" height=\"10\"></td>
                            </tr>

                            <tr>
                                <td align=\"center\" class=\"w640\"  width=\"640\" height=\"20\"> <a style=\"color:#000000; font-size:12px;\"  href=\"$adresse\" target=\"_blank\"><span style=\"color:#000000; font-size:12px;\">Voir le contenu de ce mail en ligne</span></a> </td>
                            </tr>
                            <tr>
                                <td class=\"w640\"  width=\"640\" height=\"10\"></td>
                            </tr>


                            <!-- entete -->
                            <tr class=\"pagetoplogo\">
                                <td class=\"w640\"  width=\"640\">
                                   <!-- trois colonnes____________________________________!-->
                                                    <table class=\"w580\"  width=\"640\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background:#0c4c8a;\">
                                                        <tbody>
                                                           
                                                            <tr>
                                                                <td class=\"w180\"  width=\"180\" >
                                                                    <div align=\"center\" class=\"one\"><hr class=\"br\">
                                                                        Thierry NAVAS
                                                                    </div>
                                                                </td>

                                                                <td class=\"w20\"  width=\"20\"></td>
                                                                <td class=\"w180\"  width=\"180\">
																<div align=\"center\" class=\"onep\">
                                                                        <img class=\"w180\" width=\"50\" src=\"$urlimg\" alt=\"Navas Thierry\"/>
                                                                    </div>
                                                                    
                                                                </td>

                                                                <td class=\"w20\"  width=\"20\"></td>
                                                                <td class=\"w180\"  width=\"180\" >
                                                                    <div align=\"center\" class=\"oneital\">
                                                                        $slogan1 <hr class=\"br\">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                          </tbody>
                                                    </table>
													<!-- trois colonnes____________________________________!-->
													<table class=\"w580\"  width=\"640\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" style=\"background:#97d5e0;\">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td class=\"w180\"  width=\"275\" >
                                                                    <div align=\"center\" class=\"two\">
                                                                        <p> $slogan2 </p>
                                                                       
                                                                    </div>
                                                                </td>
                                                                <td class=\"w20\"  width=\"30\"></td>
                                                                <td class=\"w180\"  width=\"275\" valign=\"top\">
                                                                    <div align=\"center\" class=\"two\">
                                                                        <p>$slogan3</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                </td>
                            </tr>

                            <!-- separateur horizontal -->
                            <tr>
                                <td  class=\"w640\"  width=\"640\" height=\"1\" bgcolor=\"#d7d6d6\"></td>
                            </tr>

                             <!-- contenu -->
                            <tr class=\"content\">
                                <td class=\"w640\" class=\"w640\"  width=\"640\" bgcolor=\"#ffffff\">
                                    <table class=\"w640\"  width=\"640\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
                                        <tbody>
                                            <tr>
                                                <td  class=\"w30\"  width=\"30\"></td>
                                                <td  class=\"w580\"  width=\"580\">
                                                    <!-- une zone de contenu -->
                                                    <table class=\"w582\"  width=\"580\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class=\"w582\"  width=\"580\">
                                                                    <h3 style=\"color:#0c4c8a; font-size:22px; padding-top:12px;\">
                                                                         $titre1  </h3>

                                                                    <div align=\"left\" class=\"article-content\">
																	 $contenu1
                                                                        
                                                                    <br><br></div>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                    <!-- fin zone -->                                                   

                                                    <!-- une autre zone de contenu -->
                                                    <table class=\"w580\"  width=\"640\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" >
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td class=\"w180\"  width=\"275\"  valign=\"top\">
                                                                    <div align=\"left\" class=\"trois\">
                                                                         <strong> $titre2</strong><br> $contenu2
                                                                       
                                                                    </div>
                                                                </td>
                                                                <td class=\"w20\"  width=\"30\"></td>
                                                                <td class=\"w180\"  width=\"275\">
                                                                    <div align=\"left\" class=\"trois\">
                                                                        <strong> $titre3</strong><br> $contenu3
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
<!-- trois colonnes____________________________________!--> 
<div class=\"quatre\">
                                                    <table class=\"w582\"  width=\"580\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
                                                        <tbody>
                                                                                                                        <tr>
                                                                <td class=\"w180\"  width=\"180\" valign=\"top\">
                                                                    <div align=\"left\" class=\"article-content2\">
                                                                         <strong class=\"h4\"> $titre4 </strong><br> $contenu4
                                                                    </div> 
                                                                </td>

                                                                <td class=\"w20\"  width=\"20\"></td>
                                                                <td class=\"w180\"  width=\"180\" valign=\"top\">
                                                                    <div align=\"left\" class=\"article-content2\">
                                                                       <hr class=\"br\"><strong class=\"h4\"> $titre5 </strong><br> $contenu5
                                                                    </div>
                                                                </td>

                                                                <td class=\"w20\"  width=\"20\"></td>
                                                                <td class=\"w180\"  width=\"180\" valign=\"top\">
                                                                    <hr class=\"br\"><div align=\"left\" class=\"article-content2\">
                                                                        <strong class=\"h4\"> $titre6</strong><br> $contenu61
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                           </tbody>
                                                    </table>
													</div><!-- trois colonnes____________________________________!-->
													<table class=\"w582\"  width=\"580\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class=\"w582\"  width=\"580\">
                                                                    <h3 style=\"color:#0c4c8a; font-size:22px; padding-top:12px;\">
                                                                         $titre7  </h3>

                                                                    <div align=\"left\" class=\"article-content3\">
																	 $contenu7
                                                                        
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class=\"w30\" class=\"w30\"  width=\"30\"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!--  separateur horizontal de 15px de haut -->
                            <tr>
                                <td class=\"w640\"  width=\"640\" height=\"15\" bgcolor=\"#ffffff\"></td>
                            </tr>

                            <!-- pied de page -->
                            <tr >
                                <td class=\"w640\"  width=\"640\">
                                     <table class=\"w640\"  width=\"640\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background:#5587a2;\">
                                             <tbody>
                                                           
                                                            <tr>
                                                                <td class=\"w180\"  width=\"180\" >
                                                                    <div  class=\"foot1\" style=\"padding-left:4px;color:#ffffff;\"><hr class=\"br\">
                                                                       <p > Thierry NAVAS<br>9 Rue René Boulanger<br>75010 PARIS</p>
                                                                    </div>
                                                                </td>

                                                                <td class=\"w20\"  width=\"20\"></td>
                                                                <td class=\"w180\"  width=\"180\">
																<div align=\"center\" class=\"foot\" style=\"color:#ffffff;\">
                                                                       07.81.55.84.61<br>thierry.navas@neuf.fr
                                                                    </div>
                                                                    
                                                                </td>

                                                                <td class=\"w20\"  width=\"20\"></td>
                                                                <td class=\"w180\"  width=\"180\" >
                                                                    <div align=\"center\" class=\"foot\" style=\"color:#ff4400;\"  >
  <table cellpadding=\"2\" cellspacing=\"2\" border=\"0\" style=\"width:150px\"><tr>                                                                  
<td><div class=\"cvwhite\"><a style=\"color:#ff4400; font-size:12px;text-decoration:none\"  href=\"$cv\" target=\"_blank\" ><span style=\"color:#ff4400; font-size:12px;text-decoration:none\">CV en ligne complet</span></a></td></tr><tr>
<td><div class=\"cvwhite\"><a style=\"color:#ff440; font-size:12px;text-decoration:none\"  href=\"$cvpdf\" target=\"_blank\" ><span style=\"color:#ff4400; font-size:12px;text-decoration:none\">CV PDF</span></a></td></tr></table>																		
																		<hr class=\"br\">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                              </tbody>
									</table>
                                </td>
                            </tr>
                            <tr>
                                <td class=\"w640\"  width=\"640\" height=\"60\"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
	</body>
	 </html>
";


$oui="Y";
$req=$mysqli->query("SELECT id_lemail, emailcontact FROM lmjob  WHERE envoi='$oui' GROUP BY emailcontact ");

$res=mysqli_num_rows($req);

$i=0;
while($i!=$res) { 
mysqli_data_seek($req, $i);
$email= mysqli_fetch_row($req);
$objet2=$objet;
$message2=$message;
$entete2=$entete;
mail($email[1],$objet2,$message2,$entete2);

$lien = new Jointab();
$lien->setidMail(intval($email[0]));
$lien->setIdtemplate(intval($lidtemplate));
$lien->savejt();
$ni=$i+1;
$lesemailsutilises .= 'Mail '.$ni.' bien envoyé à '.$email[1].'-<br>';
$i++;}
$messageOKE="Votre news letter a bien &eacute;t&eacute; envoy&eacute;";
}


?> <!DOCTYPE html>

<html lang="fr" >

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=5.0 user-scalable=yes">
<title>Template email envoie</title>
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
    /* Fonts and Content */
    
    body {  }
    body, td { font-family: Tohoma, Arial, Helvetica, Geneva, sans-serif; font-size:14px; }
    h2{ padding-top:12px; /* ne fonctionnera pas sous Outlook 2007+  */color:#0E7693; font-size:22px; }
    .one{font-family: Tohoma, Arial, Helvetica, Geneva, sans-serif; font-size:20px;color:#ffffff;} 
	.oneital{font-family: Tohoma, Arial, Helvetica, Geneva, sans-serif; font-size:20px;color:#ffffff;font-style:italic;} 
	.two{font-family: Tohoma, Arial, Helvetica, Geneva, sans-serif; font-size:14px;color:#0c4c8a;} 
	.trois{width:95%;min-height:255px;margin:auto;padding:6px;background:#5587a2;-moz-border-radius: 6px 6px 6px 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px 6px 6px 6px;color:#ffffff;}
	.etoile{padding-left:5px;font-size:16px;color:#FAAC58}
	.etoilea{padding-left:5px;font-size:14px;color:#B43104}
	
	.quatre{margin:10px 3px 10px 3px;padding:4px;background:#97d5e0;-moz-border-radius: 6px 6px 6px 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px 6px 6px 6px;color:#0c4c8a;}
	
	.article-content2{font-size:12px;color:#0c4c8a;}
	.article-content3{font-size:14px;}
	.h4{margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; color:#0c4c8a;font-size:13px}
	.br{display:none;}
	.foot1{text-align:left;}
        .cvwhite{margin:2px;padding:2px;font-weight:bold;background:#ffffff;-moz-border-radius: 6px 6px 6px 6px; -webkit-border-radius: 6px;
    border-radius: 6px 6px 6px 6px;color:#0c4c8a;text-align:center;border: 1px solid #4d6b7b;}
    @media only screen and (max-width: 480px) { 

        table[class=w275], td[class=w275], img[class=w275] { width:135px !important; }
        table[class=w30], td[class=w30], img[class=w30] { width:10px !important; }  
        table[class=w580], td[class=w580], img[class=w580] { width:100% !important; }
		 table[class=w582], td[class=w582], img[class=w582] { width:90% !important;margin:auto; }
        table[class=w640], td[class=w640], img[class=w640] { width:100% !important; }
        img{ height:auto;}
         /*illisible, on passe donc sur 3 lignes */
        table[class=w180], td[class=w180] { 
            width:100% !important; 
            display:block;
        }    
        td[class=w20]{ display:none; }  
.br{height:1px;color:transparent;opacity: 0;
    filter: alpha(opacity=0); display:block;}
.trois{margin:auto;margin-bottom:3px;min-height:75px}	
.article-content3{font-size:10px;}	
.foot1{text-align:center;padding:1px 1px 2px 4px;}
    } 
.tab{width:95%;margin:auto;}
   .tab th{background: #01DF74;color:#fff;text-align: center;}
.tab td{text-align: center;border-bottom:1px solid #ccc;}
.tab tr:nth-child(odd){background:#F7F4CB;}
.tab tr:nth-child(even){background:#fff;}
.tab td:nth-child(1) {width:10%;}
.tab td:nth-child(2) {width:34%;}
.tab td:nth-child(3) {width:5%;}
.tab td:nth-child(4) {width:25%;}
.tab td:nth-child(5) {width:12%;}
.tab td:nth-child(6) {width:12%;}
.tab td:nth-child(7) {width:12%;}
a.lienM{margin-left:10px;font-size:10px;color:green}
a.lienM:hover{margin-left:10px;font-size:10px;color:red}
    </style>
</head>
<body style="margin:0px;margin-top:-20px; padding:0px; -webkit-text-size-adjust:none;"><?php include("nav.php");?>
    <?php echo $lesemailsutilises;?>
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td align="center" >
                    <table  cellpadding="0" cellspacing="0" border="0">
                        <tbody>  
<tr>
                                <td class="w640"  width="640" height="10"></td>
                            </tr>						
                             <tr>
                                <td class="w640"  width="640" height="10" align="center"><strong><?php echo $lobjet;?></strong></td>
                            </tr>
							<tr>
                                <td class="w640"  width="640" height="10"></td>
                            </tr>

                            <tr>
                                <td align="center" class="w640"  width="640" height="20"> <a style="color:#000000; font-size:12px;" href="<?php echo $adresse;?>" target="_blank"><span style="color:#000000; font-size:12px;">Voir le contenu de ce mail en ligne</span></a> </td>
                            </tr>
                           <tr>
                                <td class="w640"  width="640" height="10"></td>
                            </tr>


                            <!-- entete -->
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
                                                                    <div align="center" class="two" style="padding:10px 1px 10px 1px;">
                                                                       <?php echo $slogan2;?>
                                                                     </div>
                                                                </td>
                                                                <td class="w20"  width="30"></td>
                                                                <td class="w180"  width="275">
                                                                    <div align="center" class="two" style="padding:10px 1px 10px 1px;">
                                                                        <?php echo $slogan3;?>
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
                                <td class="w640" class="w640"  width="640" bgcolor="#ffffff">
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

                                                                    <div align="left" class="article-content">
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
                                                <td class="w30" class="w30"  width="30"></td>
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
                                                                    <div  class="foot1" style="padding:4px 1px 1px 4px;color:#ffffff;"><hr class="br">
                                                                        Thierry NAVAS<br>9 Rue René Boulanger<br>75010 PARIS
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
                                                                    <div align="center" class="foot" >
 <table cellpadding="2" cellspacing="2" border="0" style="width:100px"><tr>
         <td><div class="cvwhite"><a style="color:red; font-size:12px;" href="<?php echo $cv;?>" target="_blank"><span style="color:red; font-size:12px;">CV en ligne</span></a></div></td></tr><tr>
     <td><div class="cvwhite"><a style="color:red; font-size:12px;" href="<?php echo $cvpdf;?>" target="_blank"><span style="color:red; font-size:12px;">CV PDF</span></a></div></td></tr></table>		
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
	<hr>
	
	<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
	<tr><td align="center"><strong><?php echo $lobjet;?></strong><a href="ajoumodifTemplate.php?idT=<?php echo $lidtemplate;?>" class="lienM">Modif</a></td></tr>
	<tr><td align="center"> 
      
      </td></tr>
	<tr><td align="center">
                <form name="form2" method="post" action="" enctype="multipart/form-data">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tab">
                    
                    <tr><th>Email</th><th>Contact</th><th>Entreprise</th><th>Activité</th><th>Envoi</th></tr>
                    <?php $lescontact=new Contact();
                    $resultC=$lescontact->listmail();
                    foreach($resultC as $key => $value) { ?>
                    <tr <?php $envoile=$value['envoi'];if($envoile=="Y"){?>style="background:#97d5e0;"<?php }else{echo"";}?>>
                        <td><input type="hidden" name="id_mail[]" value="<?php echo $value['id_lemail'];?>"><?php  echo $value['emailcontact'];?><a href="modifC.php?idc=<?php echo $value['id_lemail'];?>&variableC=<?php echo $lavariable;?>" class="lienM">Modif</a></td><td><?php echo $value['nomcontact'];?></td><td><?php echo $value['entreprise'];?></td><td><?php echo $value['activite'];?></td><td>
       <select name="envoi[]">
        <option value="Y" <?php if (!(strcmp("Y", $value['envoi']))) {echo "SELECTED";} ?>>Oui</option>
        <option value="N" <?php if (!(strcmp("N", $value['envoi']))) {echo "SELECTED";} ?>>Non</option>
      </select></td></tr>
                        <?php }?>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="Submit3" value="Select email" >
	<input name="selectmail" type="hidden"  value="okselect"></td></tr>
                </table>
                
                </form> </td></tr>
	
        <tr><td align="center"><form name="form1" method="post" action="" enctype="multipart/form-data">
                    <input type="submit" name="Submit2" value="Envoyer mail">
                    <input name="iddelatemplate" type="hidden"  value="<?php echo $lidtemplate;?>">
	<input name="envoiemail" type="hidden"  value="okmail"></form></td></tr>
	</table>
	
</body>
</html>