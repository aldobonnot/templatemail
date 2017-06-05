<?php
session_start();
require_once('../inc/init.inc.php');

$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '';
$mdp = (isset($_POST['mdp'])) ? $_POST['mdp'] : '';
$come = (isset($_GET['come'])) ? $_GET['come'] : '';
$action = (isset($_GET['action'])) ? $_GET['action'] : '';
if($_POST){
//var_dump($_POST);

	extract($_POST);//permet de générer des variables avec le nom des champs respectif
	$erreur = '';
	//controle la taille du pseudo
	
	//controle de la disponibilité du pseudo
	$result = execute_requete("SELECT * FROM membre WHERE pseudo ='$pseudo'");
	
	if($result->rowCount()==1){
		$membre = $result->fetch(PDO::FETCH_ASSOC);
	if($_POST['mdp'] === $membre['mdp']){
		
		foreach($membre as $indice => $element){
			if($indice != 'mdp'){
				$_SESSION['membre'][$indice]= $element; //on met toutes les info du membre en cache session
				
			}
		}
		echo"<script language=\"JavaScript\" type=\"text/javascript\">";
echo"document.location=\"".URL."conectok.php\";";
echo"</script>";

	}else{
		$erreur .='<div class="alert alert-danger dim" >Mot de passe incorrect</div>';
	}
		
	}else{$erreur .='<div class="alert alert-danger dim">Pseudo incorrect</div>';}
	

}else{$contenu ="";}
if($_GET){
	extract($_GET);
	if($action=="deconnect"){
		
		session_destroy();

		echo"<script language=\"JavaScript\" type=\"text/javascript\">";
echo"document.location=\"".URL."deconectok.php\";";
echo"</script>";
		
		
	}
	
}else{$action="";}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NAVAS Thierry</title>
<link type="text/css" rel="stylesheet" href="<?php echo URL;?>css/bootstrap.css">
<link href="<?php echo URL;?>css/one.css" rel="stylesheet" type="text/css">
</head>

<body><?php
echo $erreur;
echo $contenu;
$content = '';

$content .='<div class="tophight"><form method="post" action="">
<div class="form">
<div class="form-group">
<label for="pseudo">Pseudo</label>
<input type="text" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo" class="form-control" value="' .$pseudo. '">

</div>
<div class="form-group">
<label for="mdp">Mot de passe</label>
<input type="password" name="mdp" id="mdp"  class="form-control" >

</div>
<div class="form-group">
<input type="submit" class="btn btn-default" value="Se connecter">
</div>

</div>
</form></div>';
echo $content;

?>
</body>
</html>