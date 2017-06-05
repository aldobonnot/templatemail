<nav>
<?php
$conect="";
if(isset($_SESSION['membre']['statut']) && $_SESSION['membre']['statut']=="adminNT"){$conect="ok";}else{$conect="pasok";}
//requete construction rubriques principales
$aff='Y';
Global $pdo;
$resultat = execute_requete("SELECT * FROM rubriques WHERE aff = '$aff'");
//valeur de mise en session de la connexion

//declaration du ul
echo"<ul>";
//Boucle Rubrique principale
	while($TitreRub=$resultat->fetch(PDO::FETCH_ASSOC))
	{
		lirub($TitreRub['id'],$TitreRub['nom'],$conect);
				//id de la rubrique 
				$larub = $TitreRub['id'];
				//requete construction liens de chaque rubrique
				$aff="Y";
				Global $pdo;
				$resultatL = execute_requete("SELECT * FROM liens WHERE idRub='$larub' AND affL = '$aff'");
				$nbrL=$resultatL->rowCount();
				//si liens exite
				if($nbrL>0){
				//declaration du ul
				echo"<ul>";
				//Boucle Liens de la rubrique
				while($LiensRub = $resultatL->fetch(PDO::FETCH_ASSOC))
				{ 
				lilien($LiensRub['id'],$LiensRub['url'],$LiensRub['nom'],$conect);

				} 
				//fin boucle liensde la rubrique
				//si connect ajout lien dans la rubrique
				if($conect=="ok"){?>
				<li ><a class="various ajt" data-fancybox-type="iframe" href="back/ajoutlien.php?larub=<?php echo $larub;?>">Ajouter un lien</a></li>
				<?php } else {echo"";}?>

				</ul>
				<?php } else { 
				if($conect=="ok"){?>
				<ul><li><a class="various ajt" data-fancybox-type="iframe" href="back/ajoutlien.php?larub=<?php echo $larub;?>">Ajouter un lien</a></li></ul>

					<?php }else{echo"";}
				} 
				 } if($conect=="ok"){?>
 
		<li><a class="various ajt" data-fancybox-type="iframe" href="back/ajoutm1.php">Ajouter une rubrique</a></li>
 
 <?php }else{echo"";}
  if(isset($_SESSION['membre']['statut'])){?>
  <div class="demosphere">
<iframe src="http://www.parisenphotos.com/iframePEP/islide.php" style="width:100%;height:600px;margin:auto;color:#8F8557;" frameborder="no" ></iframe></div>
<div><a class="various ajt" data-fancybox-type="iframe" href="<?php echo URL;?>back/connexion.php?action=deconnect" class="lmp">Se déconnecter</a></div>
<?php }else{?><div><a class="various ajt" data-fancybox-type="iframe" href="<?php echo URL;?>back/connexion.php" class="lmp">Connexion</a></div>
<?php }?>
	<ul>
</nav>