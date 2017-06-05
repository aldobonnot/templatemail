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

//****************
$titre1="$resultlabon[titrecv]";

$contenu1="$resultlabon[competences]";


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
$contenu7="<b>2017</b> Chef de projet Multimédia - Doranco <span style='font-size:10px;'>(8 mois)</span><br>
<b>2016</b> Développeur expert PHP et CMS Ecole Aston <span style='font-size:10px;'>(3 mois)</span><br>
<b>2007</b> Management et conduite de projets informatiques, C3E, Paris XI <span style='font-size:10px;'>(8 mois)</span><br>
<b>2004</b> Développement de site Internet en Php/MySql, CREFAC, Pantin <span style='font-size:10px;'>(2 mois)</span><br>
<b>2001</b> Web Marketing, IFOCOP, Rungis <span style='font-size:10px;'>(8 mois)</span><br>
<b>1998</b> Création de site en Html AFCI, Montreuil <span style='font-size:10px;'>(1 mois)</span>";


$titre8="";
$contenu8="";

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
<title>CV Navas Thierry mai 2017</title>
        <link rel="stylesheet" type="text/css" href="css/cv.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/cv_print.css" media="print" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>        
 </head>
<body style="margin:0px; padding:0px; -webkit-text-size-adjust:none;">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
 <tbody>
  <tr>
    <td align="center" >
      <table  cellpadding="0" cellspacing="0" border="0">
       <tbody>                            
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
                          <div align="center" class="two" style="padding:5px 0px 5px 0px;">
                          <?php echo $slogan2;?>
                          </div>
                      </td>
                      <td class="w20"  width="30"></td>
                      <td class="w180"  width="275" >
                         <div align="center" class="two"  style="padding:5px 0px 5px 0px;">
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
                                          <h3 style="color:#0c4c8a; font-size:14px; padding-top:12px;">
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
                                                <hr class="br">
                                                    <div align="left" class="article-content2">
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
                                                <h3 style="color:#0c4c8a; font-size:14px; padding-top:12px;">
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
          <tr>
            <td class="w640"  width="640">
                    <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" style="background:#5587a2;">
                        <tbody>
                            <tr>
                                <td class="w180"  width="180" >
                                    <div  class="foot1" style="padding-left:4px;color:#ffffff;"><hr class="br">
                                       <p > Thierry NAVAS<br>9 Rue René Boulanger<br>75010 PARIS</p></div>
                                </td>
                                <td class="w20"  width="20"></td>
                                <td class="w180"  width="180">
					<div align="center" class="foot1" style="color:#ffffff;text-align:center">
                                         07.81.55.84.61<br>thierry.navas@neuf.fr
                                        </div>
                                </td>
                                <td class="w20"  width="20"></td>
                                <td class="w180"  width="180" >
                                    <div  class="foot1"  style="text-align:center">
                                        <table cellpadding="2" cellspacing="2" border="0" align="center" style="width:100px">
                                            <tr>
                                                <td><div class="cvwhite"><a class="acv" href="<?php echo $cv;?>" target="_blank">CV en ligne</a></div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="cvwhite"><a class="acv" href="<?php echo $cvpdf;?>" target="_blank">CV PDF</a></div>
                                                </td>
                                            </tr>
                                        </table>
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
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:-15px;">
      <tbody>
         <tr>
                <td>
				<div class="global">
				<div class="exp">EXPERIENCES COMMERCIALES</div>
				<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>TOTAL SA </strong>Du 11/2011 – 05/2012 | 7 mois </div>
				<div class="intitule">Assistant commercial</div>
				<div class="projet"><span>Mission:</span> Prise en charge des deux boutiques de la Défense</div>
				<div id="flip13" class="btflip">Ventes et gestion des articles publicitaires et promotionnels du Groupe  </div>
				<div id="panel13" style="display:none;" class="lepanel">
						<div class="nogras">Ouverture et fermeture des boutiques.</div>
						<div class="nogras">Etat des caisses, état des stocks</div>
						<div class="nogras">Commandes de réapprovisionnement</div>
						<div class="nogras">Réception des marchandises et entrées dans le stock, avec le Logiciel de caisse et de gestion de stock </div>
				</div>
				</div>
				<!-- Fin d'Une Experience!-->
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>Wanadoo </strong>Du 07/2002 – 09/2003 | 14 mois </div>
				<div class="intitule">Chargé de Clientèle</div>
				<div class="projet"><span>Mission:</span> Téléconseiller les clients et les prospects</div>
				<div id="flip14" class="btflip">Services abonnements, facturations, contentieux, commercial  </div>
				<div id="panel14" style="display:none;" class="lepanel">
						<div class="nogras">Accueil téléphonique.</div>
						<div class="nogras">Gestion de la demande des abonnés ou des prospects</div>
						<div class="nogras">Résoudre les soucis des clients, intervenir sur les logiciels de gestion des abonnés</div>
						<div class="nogras">Rediriger les clients vers le bon service </div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>IRIS Fenêtres Sarl  </strong>Du 09/1995 – 10/1996 | 13 mois </div>
				<div class="intitule">Commercial</div>
				<div class="projet"><span>Mission:</span> Ventes de fenêtres en PVC et bois dans paris et petite couronne</div>
				<div id="flip15" class="btflip">RDV, Présentation des produits et des services, prises de mesures</div>
				<div id="panel15" style="display:none;" class="lepanel">
						<div class="nogras">Présentation de l'entreprise</div>
						<div class="nogras">Présentation des produits en fonction des besoins du client</div>
						<div class="nogras">Prises de commandes</div>
						<div class="nogras">Prises de mesures</div>
						<div class="nogras">Suivis des travaux, fidélisation et prospection de nouveaux clients sur les lieux ou aux près des proches du client</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>KparK  </strong>Du 05/1995 – 09/1995 | 4 mois </div>
				<div class="intitule">Commercial</div>
				<div class="projet"><span>Mission:</span> Ventes de fenêtres en PVC et bois dans paris et petite couronne</div>
				<div id="flip16" class="btflip">RDV, Présentation des produits et des services, prises de mesures</div>
				<div id="panel16" style="display:none;" class="lepanel">
						<div class="nogras">Prospection et distributuion de tracts dans les boites aux lettres des secteurs alloués</div>
						<div class="nogras">Présentation de l'entreprise</div>
						<div class="nogras">Présentation des produits en fonction des besoins du client</div>
						<div class="nogras">Prises de commandes</div>
						<div class="nogras">Prises de mesures</div>
						<div class="nogras">Suivis des travaux, fidélisation et prospection de nouveaux clients sur les lieux ou aux près des proches du client</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>Laboratoire Racine </strong>Du 01/1995 – 05/1995 | 4 mois </div>
				<div class="intitule">Assistant commercial</div>
				<div class="projet"><span>Mission:</span> Ventes de services de développement et d'articles photographiques</div>
				<div id="flip17" class="btflip">Gestion des points de ventes dans les Haut de seine, l'Essonne et le Loiret.</div>
				<div id="panel17" style="display:none;" class="lepanel">
						<div class="nogras">Prospection de nouveaux points de ventes</div>
						<div class="nogras">Visites dans les points de ventes acquis</div>
						<div class="nogras">Présentation des nouveaux produits aux points de ventes</div>
						<div class="nogras">Prises de commandes de nouveaux services, laboratoires de développement photos automatique</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>La chaiserie traditionnelle </strong>Du 03/1993 – 12/1994 | 9 mois </div>
				<div class="intitule">Commercial</div>
				<div class="projet"><span>Mission:</span> Ventes de tissus d'ammeublement et de services de réfection de sièges.</div>
				<div id="flip18" class="btflip">Stands sur les marchés et les centres commerciaux de la region parisienne</div>
				<div id="panel18" style="display:none;" class="lepanel">
						<div class="nogras">Installations des stands, accueil et prises de rendez vous</div>
						<div class="nogras">Prospection de nouveaux centres commerciaux et de nouveaux marchés</div>
						<div class="nogras">Démarchages aux près des fournisseurs de tissus d'ameublement pour trouver des échantillons à montrer aux clients</div>
						<div class="nogras">Rdv, devis, prise en charge des sièges ou des commandes de rideaux</div>
						<div class="nogras">Livraison des produits commandés ou des travaux réalisés</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>Mega Scooter </strong>Du  05/1992 - 03/1993  | 9 mois </div>
				<div class="intitule">Responsable de magasin</div>
				<div class="projet"><span>Mission:</span>Ventes de scooters et d'accessoires</div>
				<div id="flip19" class="btflip">Gestion de la boutique et de l'atelier de mécanique</div>
				<div id="panel19" style="display:none;" class="lepanel">
						<div class="nogras">Ventes de scooters et des accessoires</div>
						<div class="nogras">Gestion des stocks des accessoires et des pièces détachées pour l'atelier de mécanique (Vespa)</div>
						<div class="nogras">Prospection de nouveaux accessoirs à vendre</div>
						<div class="nogras">Gestion de l'agenda de l'atelier mécanique (1 mécanicien)</div>
						<div class="nogras">Carrosserie des scooters vespa en métal</div>						
				</div>
				</div>
				<!-- Fin d'Une Experience!-->
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>Bar le Perroquet, Aigues Mortes</strong> Saison 1982  | 2 mois </div>
				<div class="intitule">Chef de rang</div>
				<div class="projet"><span>Mission:</span>Service limonaderie</div>
				<div id="flip20" class="btflip">Service en terrasse</div>
				<div id="panel20" style="display:none;" class="lepanel">
						<div class="nogras">Servir au plateau</div>
						<div class="nogras">Travail tous les jours, pas de jours de repos</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>Bar la Croix du Sud, Grau du Roi</strong> Saison 1981  | 3 mois </div>
				<div class="intitule">Barman</div>
				<div class="projet"><span>Mission:</span>Service limonaderie</div>
				<div id="flip21" class="btflip">Service au bar</div>
				<div id="panel21" style="display:none;" class="lepanel">
						<div class="nogras">Servir les clients du bar</div>
						<div class="nogras">Préparer les commandes du serveur en salle</div>
						<div class="nogras">Gérer les frigos et refaire le stock, faire l'état des stocks et le répercuter au gérant pour les commandes</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>Tennis de Port-Camargue, Grau du Roi</strong> Saison 1979 et 1980  | 6 mois </div>
				<div class="intitule">Gérant</div>
				<div class="projet"><span>Mission:</span>Gestion de courts de tennis</div>
				<div id="flip22" class="btflip">Location, entretien de cours de tennis, Gestion des réservations</div>
				<div id="panel22" style="display:none;" class="lepanel">
						<div class="nogras">Accueil</div>
						<div class="nogras">Gestion des réservations: prises, repports, annulations</div>
						<div class="nogras">Ventes de boissons fraiches et de balles de tennis</div>
						<div class="nogras">Entretien des courts</div>
						<div class="nogras">Etat journalier de la caisse</div>
						<div class="nogras">Activité pendant les vacances scolaires de Noël, Pâques, et week-end de mai et de juin</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!-->
<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>Librairie du port, Grau du Roi</strong> Saison 1977 et 1978  | 6 mois </div>
				<div class="intitule">Vendeur</div>
				<div class="projet"><span>Mission:</span>Vente de journaux, périodique, et d'articles de plages.</div>
				<div id="flip23" class="btflip">Gestion des invendus</div>
				<div id="panel23" style="display:none;" class="lepanel">
						<div class="nogras">Mise en place de la presse, journaux, périodiques</div>
						<div class="nogras">Gestion des invendus, préparation des retours</div>
						<div class="gras">Deuxième saison</div>
						<div class="nogras">Gestion d'un stand d'articles de plage, de jouets, de lots de presse pour la jeunesse et pour adultes</div>
						<div class="nogras">Etat journalier de la caisse</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 	 				
				<br>
				
				<div class="exp">EXPERIENCES WEB</div>
				
                                <!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>BIO-CULTURE.FR</strong>Du 21 Févier au 31 Mars 2017 | 1 mois 1 semaine</div>
				<div class="intitule">Stage Chef de projet</div>
				<div class="projet"><span>Projet:</span>Développer une application destinée aux vendeurs indépendant à domicile</div>
				<div id="flip1" class="btflip"> Création du cahier des charges, création des IHM </div>
				<div id="panel1" style="display:none;" class="lepanel">
				        <div class="gras">Définition des champs d’application :</div>
						<div class="nogras"> Le rôle de l’application</div>
						<div class="nogras"> Les différents acteurs et leurs rôles.</div>
						<div class="gras">Les IHM</div>
						<div class="nogras"> Définitions des IHM</div>
						<div class="nogras"> Construction Html css jquery de toutes les IHM et des mails de l’API</div>
						<div class="nogras"> Scénario des IHM (le développement ayant lieu dans quelques mois, investisseurs)</div>
						<div class="gras">Arborescence</div>
						<div class="nogras"> Définition de toutes les interfaces et de leurs interconnexions</div>
						<div class="nogras"> Définition du menu</div>
						<div class="gras">Fonctionnalités</div>
						<div class="nogras"> Définition de toutes les fonctionnalités de l’API</div>
						<div class="nogras"> Diagrammes des fonctionnalités</div>
						<div class="gras"> BDD et Class</div>
						<div class="nogras"> Définition de la base de données et des tables</div>
						<div class="nogras"> Définition de toutes les class et de leurs méthodes</div>
						<div class="gras">Budget</div>
						<div class="nogras"> Calcul des coûts et du temps de production pour le développement de l’application</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!-->
				<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>SHOTA-TKSOM.COM</strong>Du 5 au 10 Juillet 2016 | 1 mois</div>
				<div class="intitule">Chef de projet - développeur - intégrateur Html 5 CSS3 Responsive Design</div>
				<div class="projet"><span>Projet:</span>Faire un site vitrine pour le peintre TKsom</div>
				<div id="flip2" class="btflip">Intégration de la charte graphique dans le CMS (CMSNT 5,3),Référencement du site </div>
				<div id="panel2" style="display:none;" class="lepanel"><div class="gras">Déploiement du cahier des charges </div>
						<div class="nogras"> Intégration Html5 CSS3 en responsive design: Compass, Bootstrap, JQuery, Fancybox light</div>
						<div class="nogras"> Construction du menu</div>
						<div class="nogras"> Reconfiguration du menu dynamique, Php5 CSS3 Javascript.</div>
						<div class="nogras"> Développement des nouvelles templates, Html5 CSS3 Php</div>
						<div class="nogras"> Notations des oeuvres en AJAX</div>
						<div class="nogras"> Développement du back-end, pour les nouvelles templates, en php 5.6</div>
						<div class="nogras"> Insertion contenu du site</div>
						<div class="nogras"> Lancement référencement: Google Analitycs, webmasters-tools + liens réseaux</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!-->
				<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>DIXON-SECURITE.FR</strong>Du 11/2015 à 03/2016  | 4 mois dont 3 à 1/10 de temps</div>
				<div class="intitule">Chef de projet - développeur - intégrateur Html 5 CSS3 Responsive Design</div>
				<div class="projet"><span>Projet:</span>Faire un site vitrine pour la société Dixon Sécurité privé</div>
				<div id="flip3" class="btflip">Création d'un CMS Responsive Design en php5, Référencement du site </div>
				<div id="panel3" style="display:none;" class="lepanel">
						<div class="gras">Développement du CMS :</div>
						<div class="nogras"> Mise en œuvre du projet</div>
						<div class="nogras"> Construction de la bases de données Mysql</div>
						<div class="nogras"> Développement du constructeur des pages, Php5 </div>
						<div class="nogras"> Développement du menu dynamique, Php5 CSS3 Javascript.</div>
						<div class="nogras"> Développement des templates pour les différents modules , Html5 CSS3 Php</div>
						<div class="nogras"> Intégration Html5 CSS3 avec Compass, Bootstrap, JQuery, Fancybox light</div>
						<div class="nogras"> Développement du back-end, intégrant dynamiquement les modules, en php5</div>
						<div class="nogras"> Intégration de Ckeditor pour la mise en page du contenu</div>
						<div class="nogras"> Développement d'une interface spécifique au référencement des pages.</div>
						<div class="nogras"> Rewriting des urls des pages</div>
						<div class="gras">Collecte et intégration du contenu</div>
						<div class="nogras"> Recherche de contenu spécifique à la sécurité et ses différents spécifications</div>
						<div class="nogras"> Mise en place des rubriques et des sous rubriques avec leurs contenus</div>
						<div class="gras">Tests et retour d'informations</div>
						<div class="nogras"> Vérifications sur tous les navigateurs du fonctionnement de l'application</div>
						<div class="nogras"> Corrections de bug ou de mauvaises configurations</div>
						<div class="nogras"> Corrections de fautes de frappes</div>
						<div class="gras">Référencement du site</div>
						<div class="nogras"> Référencement dans les moteurs de recherches, Google, Bing, Yahoo, etc..</div>
						<div class="nogras"> Sitemap, Robots.txt</div>
						<div class="nogras"> Google Analytics, Outils webmaster</div>
						<div class="nogras"> Google+,Google maps</div>
						<div class="nogras"> Page jaunes, La poste, Liens sur tous les sites en référence</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!-->
				<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>ALIZENET</strong>Du 10/08/2015 au 20/08/2015 | 8 jours</div>
				<div class="intitule">Intégrateur Html 5 CSS3 Responsive Design</div>
				<div class="projet"><span>Projet:</span>Faire des améliorations sur le site Millésima.</div>
				<div id="flip4" class="btflip">Rendre le tunnel d'achat responsive, affichage menu sur IPAD, Template eamiling  </div>
				<div id="panel4" style="display:none;" class="lepanel">
						<div class="gras"> Rendre le tunnel d'achat responsive</div>
						<div class="nogras"> Création de nouvelles classes CSS et paramétrage des existantes</div>
						<div class="nogras"> Demande de modification de code <i style="font-size:8px">if(produit offert){ img vide même dimensions}else{rien}</i></div>
						<div class="gras"> Affichage menu sur IPAD</div>
						<div class="nogras"> Correction des CSS du menu principal sur tablette (format IPad)</div>
						<div class="nogras"> Correction des CSS des textes du carousel sur la page d'index</div>
						<div class="gras">Template eamiling</div>
						<div class="nogras"> Construction Template emailing pour toutes les messageries et les logiciels de
						messageries.</div>
						<div class="nogras"> Tests d'affichage sur les différentes messageries en ligne et les logiciels de messageries</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!-->
				<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>Z-WORKSHOP.FR</strong>Du 09/2014 – 08/2015 | 1 mois et 15 jours</div>
				<div class="intitule">Chef de projet - développeur - intégrateur Html 5 CSS3 Responsive Design</div>
				<div class="projet"><span>Projet:</span>Création d'un site vitrine pour l'atelier de mécanique mini motos 4 temps</div>
				<div id="flip5" class="btflip">Réalisation des versions 1 et 2 du site  </div>
				<div id="panel5" style="display:none;" class="lepanel">
						<div class="gras">Sept 2014 Construction du site</div>
						<div class="nogras"> Elaboration du cahier des charges et de la charte graphique</div>
						<div class="nogras"> Construction BDD Mysql</div>
						<div class="nogras"> Construction du menu Dynamique html,css,php5,js</div>
						<div class="nogras"> Construction des pages intégration html4 css3 Js Php</div>
						<div class="nogras"> Intégration et amélioration du slider construit avec Wow-slider</div>
						<div class="nogras"> Affichage des photos Jquery, Fancybox</div>
						<div class="nogras"> Construction du back-end</div>
						<div class="nogras"> Tests de fonctionnements</div>
						<div class="nogras"> Référencement</div>
						<div class="gras"> Aout 2015 Rendre le site existant Responsive en gardant le design initial</div>
						<div class="nogras"> Passage du code html en Html5 utf8</div>
						<div class="nogras"> Intégration de la librairies Bootstrap</div>
						<div class="nogras"> Reconstruction du code des pages</div>
						<div class="nogras"> Reconstruction de l'affichage des photos pour l'utilisation de Fancybox light</div>
						<div class="nogras"> Reconstruction des CSS et du JS pour le menu dynamique</div>
						<div class="nogras"> Fonctions de conversion des signes pour affichage en Utf8</div>
						<div class="nogras"> Tests de fonctionnements</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!-->
				<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>SOCIALOGIS</strong>Du 12/2012 au 08/2014 | 21 mois</div>
				<div class="intitule">Chef de projet - développeur - intégrateur Html</div>
				<div class="projet"><span>Projet:</span>Ameublement-social.fr</div>
				<div id="flip6" class="btflip">Dec 2012 – Août 2014 Création et développement d'un site vitrine magasin d'ameublement et d'électroménager.  </div>
				<div id="panel6" style="display:none;" class="lepanel">
						<div class="nogras"> Prise en charge du développement du projet</div>
						<div class="nogras"> Création du cahier des charges,</div>
						<div class="nogras"> Design, sous Photoshop</div>
						<div class="nogras"> Développement du front et back-end en PHP5/Mysql,</div>
						<div class="nogras"> Optimisation pour le référencement</div>
						<div class="nogras"> Intégration Html4 Css3, Jquery, du catalogue des fiches produits</div>
						<div class="nogras"> Référencement moteurs de recherche et annuaires</div>
						<div class="nogras"> Mise à jour du catalogue</div>
						<div class="nogras"> Progression du référencement</div>
						<div class="nogras"> Mise en place de campagnes adwords</div>
						<div class="nogras"> Construction de landing pages</div>
						<div class="nogras"> Mise en place de campagnes promotionnelles sur le site</div>
				</div>
				<div class="projet"><span>Projet:</span>Urgence-electromenager.fr</div>
				<div id="flip7" class="btflip">Avril 2013 : Création et développement d'un site vitrine pour un soutraitant du service après vente electroménager </div>
				<div id="panel7" style="display:none;" class="lepanel">
						<div class="nogras"> Prise en charge du développement du projets</div>
						<div class="nogras"> Création du cahier des charges</div>
						<div class="nogras"> Design sous Photoshop</div>
						<div class="nogras"> Développement en HTML4.01 et CSS3</div>
						<div class="nogras"> Optimisation pour le référencement </div>
						<div class="nogras"> Développement du front et back-end en PHP5/Mysql</div>
						<div class="nogras"> Intégration Html4 Css3, Jquery</div>
						<div class="nogras"> Tests de fonctionnement</div>
						<div class="nogras"> Référencement moteurs de recherche et annuaires</div>
				</div>
				<div class="projet"><span>Projet:</span>Louer-en-toute-securite.fr</div>
				<div id="flip8" class="btflip">Avril 2013- juin 2014 : Création et développement d'un site mise en relation de propriétaires avec des associations à la recherche de logements.
Objectif du site, faire un outil pratique et indispensable pour les propriétaires et les associations. </div>
				<div id="panel8" style="display:none;" class="lepanel">
						<div class="nogras"> Prise en charge du développement du projets</div>
						<div class="nogras"> Création du cahier des charges</div>
						<div class="nogras"> Modelisation UML</div>
						<div class="nogras"> Design</div>
						<div class="nogras"> Développement en HTML4.01 et CSS3</div>
						<div class="nogras"> Optimisation pour le référencement</div>
						<div class="nogras"> Développement du front et back-end en PHP5/Mysql, intégration Html4 Css3, Jquery</div>
						<div class="nogras"> Développement d'outils de gestion et de recherche de logements, de communications, de
						paiements.</div>
						<div class="nogras"> Création de bail</div>
						<div class="nogras"> Gestion annuelle ou mensuel des paiements</div>
						<div class="nogras"> Gestion des occupants des logements</div>
						<div class="nogras"> Envoi de mail automatique pour chaque action sur les différents tableaux de bord</div>
						<div class="nogras"> Tests permanents de fonctionnement</div>
				</div>
				</div>
			
				<!-- Fin d'Une Experience!-->
				<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>GUILLEMETTE-BUFFAULT.COM </strong>Du 11/09/2012 au 15/10/2012 | 1 mois </div>
				<div class="intitule">Chef de projet - développeur - intégrateur Html</div>
				<div class="projet"><span>Projet:</span>Création d'un site pour l' artiste Guillemette Buffault</div>
				<div id="flip9" class="btflip">Conception Développement en php back et end, intégration Html  </div>
				<div id="panel9" style="display:none;" class="lepanel">
						<div class="gras"> Prise en charge du développement du projets en Front et Back-end</div>
						<div class="nogras"> Design sous Photoshop</div>
						<div class="nogras"> Développement du front et back-end en PHP5/Mysql, Ckeditor</div>
						<div class="nogras"> Intégration Html4 Css3, Jquery</div>
						<div class="nogras"> Optimisation du référencement</div>
						<div class="nogras"> Galerie Photos , Fancybox</div>
						<div class="nogras"> Tests de fonctionnement</div>
						<div class="nogras"> Référencement basique moteurs de recherche et annuaires</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
				<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>MELLINO.FR</strong>Du 06/2012 au 07/2012 | 1 mois </div>
				<div class="intitule">Développeur - intégrateur Html</div>
				<div class="projet"><span>Projet:</span> Création d'un site pour les artistes Stefan et Isa Mellino (Ex Négresses Vertes)</div>
				<div id="flip10" class="btflip">Développement en php back et end, intégration Html  </div>
				<div id="panel10" style="display:none;" class="lepanel">
						<div class="gras"> Prise en charge du développement du projets en Front et Back-end</div>
						<div class="nogras"> Design sous Photoshop</div>
						<div class="nogras"> Développement du front et back-end en PHP5/Mysql, Ckeditor</div>
						<div class="nogras"> Intégration Html4 Css3, Jquery</div>
						<div class="nogras"> Optimisation du référencement</div>
						<div class="nogras"> Galerie Photos , Fancybox</div>
						<div class="nogras"> Tests de fonctionnement</div>
						<div class="nogras"> Référencement basique moteurs de recherche et annuaires</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
				<!-- Une Experience!-->
				<div id="element">
				<div class="titredate"><strong>BERT-THE-MADSILKSCREAMER.COM</strong>Du 04/2012 au 06/2014 | 2 et 1 mois </div>
				<div class="intitule">Chef de projet - développeur - intégrateur Html5 Css3 Responsive Design</div>
				<div class="projet"><span>Projet1:</span>Création d'un site pour l'artiste sérigraphe Bert Bélanger</div>
				<div id="flip11" class="btflip">Conception Développement en php back et end, intégration Html  </div>
				<div id="panel11" style="display:none;" class="lepanel">
						<div class="gras">Avril - Juin 2012</div>
						<div class="nogras">Création du cahier des charges</div>
						<div class="nogras">Design sous Photoshop</div>
						<div class="nogras">Développement du front et back-end en PHP5/Mysql, Ckeditor</div>
						<div class="nogras">Intégration Html4 Css3, Jquery</div>
						<div class="nogras">Optimisation du référencement</div>
						<div class="nogras">Galerie Photos , Fancybox</div>
						<div class="nogras">Agenda, Fancybox</div>
						<div class="nogras">Tests de fonctionnement</div>
						<div class="nogras">Référencement basique moteurs de recherche et annuaires</div>
				</div>
				<div class="projet"><span>Projet2:</span>Rendre le site existant Responsive en gardant le design initial</div>
				<div id="flip12" class="btflip">Intégration Html5 Css3 Responsive Design  </div>
				<div id="panel12" style="display:none;" class="lepanel">
						<div class="nogras"> Passage du code html en Html5 utf8</div>
						<div class="nogras"> Intégration de la librairies Bootstrap</div>
						<div class="nogras"> Reconstruction du code des pages</div>
						<div class="nogras"> Reconstruction de l'affichage des photos pour l'utilisation de Fancybox light</div>
						<div class="nogras"> Reconstruction des CSS et du JS pour le menu dynamique</div>
						<div class="nogras"> Fonctions de conversion des signes pour affichage en Utf8</div>
						<div class="nogras"> Tests de fonctionnements</div>
				</div>
				</div>
				<!-- Fin d'Une Experience!--> 
				
                                <!-- langues--> <br><br>
                                <div class="titredate"><strong>LANGUES :</strong></div>
                                <div class="anglais"><strong>ANGLAIS</strong> Niveau B1 Roseta stone</div>
                                <div class="espagnol"><strong>ESPAGNOL</strong> Niveau B2 Roseta stone</div>
                                 <div class="titredate"><strong>LOISIRS :</strong></div>
                                <div class="photos"><strong>PHOTOS</strong></div>
                                <div class="musique"><strong>MUSIQUE</strong> </div>
                                <div class="livre"><strong>LITTERATURE</strong> </div>
                                <div class="moto"><strong>MINI MOTOS</strong> </div>

				</div><br><br><br>
                </td>
            </tr>
	</table>
	<script>
$(document).ready(function(){
        $("#flip1").click(function(){
        $("#panel1").slideToggle("slow");
	});
        $("#flip2").click(function(){
        $("#panel2").slideToggle("slow");
	});
        $("#flip3").click(function(){
        $("#panel3").slideToggle("slow");
	});
        $("#flip4").click(function(){
        $("#panel4").slideToggle("slow");
	});
	 $("#flip5").click(function(){
        $("#panel5").slideToggle("slow");
	});
	$("#flip6").click(function(){
        $("#panel6").slideToggle("slow");
	});
	$("#flip7").click(function(){
        $("#panel7").slideToggle("slow");
	});
	$("#flip8").click(function(){
        $("#panel8").slideToggle("slow");
	});
	$("#flip9").click(function(){
        $("#panel9").slideToggle("slow");
	});
	$("#flip10").click(function(){
        $("#panel10").slideToggle("slow");
	});
	$("#flip11").click(function(){
        $("#panel11").slideToggle("slow");
	});
	$("#flip12").click(function(){
        $("#panel12").slideToggle("slow");
	});
	$("#flip13").click(function(){
        $("#panel13").slideToggle("slow");
	});
	$("#flip14").click(function(){
        $("#panel14").slideToggle("slow");
	});
	$("#flip15").click(function(){
        $("#panel15").slideToggle("slow");
	});
	$("#flip16").click(function(){
        $("#panel16").slideToggle("slow");
	});
	$("#flip17").click(function(){
        $("#panel17").slideToggle("slow");
	});
	$("#flip18").click(function(){
        $("#panel18").slideToggle("slow");
	});
	$("#flip19").click(function(){
        $("#panel19").slideToggle("slow");
	});
	$("#flip20").click(function(){
        $("#panel20").slideToggle("slow");
	});
	$("#flip21").click(function(){
        $("#panel21").slideToggle("slow");
	});
	$("#flip22").click(function(){
        $("#panel22").slideToggle("slow");
	});
	$("#flip23").click(function(){
        $("#panel23").slideToggle("slow");
	});
 });
</script>
</body>
</html>