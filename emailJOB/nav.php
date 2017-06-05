<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">API MAILS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ajout contact <span class="caret"></span></a>
          <ul class="dropdown-menu">
		 <li><a href="ajoutC.php">Ajout contact</a></li>
		  <li role="separator" class="divider"></li>
            <li><a href="#"><b>Modifier</b></a></li>
            <li role="separator" class="divider"></li>
		 <li><a href="listContact.php">Liste contacts</a></li>
           
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Emails <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li><a href="ajouT.php">Ecrire un Email</a></li>
		  <li role="separator" class="divider"></li>
            <li><a href="#"><b>Modifier</b></a></li>
            <li role="separator" class="divider"></li>
		 <?php $lesrub=new Navigation;
$resultat=$lesrub->listTemplate();
foreach ($resultat as $key => $value) {?><li>
                
                <a href="<?php echo $value['fichiermail'];?>?etn=<?php echo $value['id_temp'];?>"><span style="font-weight:bold;color:#ccc;padding-right:3px;"><?php $idTemplate=$value['id_temp'];$tempused=new Jointab;
$resultatTU=$tempused->nbrfoisTused($idTemplate); echo $resultatTU; ?></span><?php echo $value['objet'];?></a>
                </li> <?php }?>
           
          </ul>
        </li>
	
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Domaine <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="ajoutDomaine.php">Ajouter un domaine </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><b>Modifier</b></a></li>
            <li role="separator" class="divider"></li>
            <?php 
                $appelDomaine=new Domaine();
                $resultDomaine=$appelDomaine->listDomaine();
                foreach ($resultDomaine as $key => $value) {?>
            <li><a href="modifDomaine.php?idD=<?php echo $value['id_dom'];?>"><?php echo $value['slogan1'];?></a></li>
            <?php }?>
            
          </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CV <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="ajoutCv.php">Ajouer un CV </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><b>Modifier</b></a></li>
            <li role="separator" class="divider"></li>
            <?php
                $appelCvm=new Cv();
                $resultCvm=$appelCvm->listCV();
                foreach ($resultCvm as $key => $value) {?>
            <li><a href="modifCv.php?idD=<?php echo $value['id_cv'];?>"><?php echo $value['nom'];?></a></li>
            <?php }?>
            
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

