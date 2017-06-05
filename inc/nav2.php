<nav>
<?php

if(isset($_SESSION['statut']) && $_SESSION['statut'] === "adminNT"){ $conect = "ok"; }else{$conect = "";}
//requete construction rubriques principales

echo'<div class="container-fluid"><div class="row">';
//construction des rubriques

$lesrub=new Navigation;
$resultat=$lesrub->cmRub();
foreach ($resultat as $key => $value) {
	echo'<div class="col-md-3" style="min-height:40px;">';
	echo'<div class="demarg">';
	lirub($value['id'],$value['nom'],$conect);
	//construction des liens de la rubrique
	$lid=$value['id'];
	$nomrub=$value['nom'];
	$resultatL=$lesrub->cmLien(intval($lid));
	if($resultatL!=''){
        echo "<div class=\"clear\"></div><div id=\"panel".netUrl($nomrub)."\" style=\"display:none;margin-right:10px;width:255px;\"><ul>";
	foreach($resultatL as $key => $value) {
	echo lilien($value['id'],$value['url'],$value['nom'],$conect);
	}
        //si il y a dejà des liens existants
	if($conect == "ok"){ ?><li><a  class="various ajt" data-fancybox-type="iframe" href="back/ajoutlien.php?larub=<?php echo $lid; ?>">Ajouter un lien </a></li><?php } else {echo "";}

	echo"</ul></div>";

	//fin de liens de la rubrique
	}else{
            //si il n'y a pas de liens existants
		if($conect == "ok"){ ?><div class="clear"></div><div class="lajt"><a  class="various ajt" data-fancybox-type="iframe" href="back/ajoutlien.php?larub=<?php echo $lid; ?>">Ajouter un lien </a></div><?php } else {echo "";}

	}
	echo"</div></div>";
	
}if($conect=="ok"){  //ajouter une rubrique ?>

		<div class="clear"></div><div class="lajt" style="margin-top:20px;margin-bottom:20px; "><a class="various ajt" data-fancybox-type="iframe" href="back/ajoutm1.php">Ajouter une rubrique</a></div>
 
 <?php }else{echo"";}
//fin de la construction des li des rubriques
//connection et deconnexion du back
echo'</div></div><div>';
  if($conect == "ok"){ ?>
<div class="lajt"><a class="various ajt" data-fancybox-type="iframe" href="<?php echo URL;?>back/connexion.php?action=deconnect" class="lmp">Se déconnecter</a>
</div>
<?php } else { ?><div class="lajt"><a class="ajt"  href="<?php echo URL;?>index.php?seconecter=okc" class="lmp">Connexion</a>  </div>
<?php } ?>
	</div>
</nav>
<script>
$(document).ready(function(){
<?php 
foreach ($resultat as $key => $value) {?>
   $("#flip<?php echo netUrl($value['nom']); ?>").click(function(){
        $("#panel<?php echo netUrl($value['nom']); ?>").slideToggle("slow");
	});
	
 <?php } ?>
});
</script>