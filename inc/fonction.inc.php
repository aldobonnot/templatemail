<?php
function execute_requete($req)
{Global $pdo;
$result=$pdo->query($req);
return $result;
}

function netUrl($chaine2)
{
	$caracteres = array(
		'À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', '@' => 'a',
		'È' => 'e', 'É' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', '€' => 'e',
		'Ì' => 'i', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
		'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o',
		'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'µ' => 'u',
		'Œ' => 'oe', 'œ' => 'oe',
		'$' => 's');
 
	$chaine2 = strtr($chaine2, $caracteres);
	$chaine2 = preg_replace('#[^A-Za-z0-9]+#', '-', $chaine2);
	$chaine2 = trim($chaine2, '-');
	$chaine2 = strtolower($chaine2);
 
	return $chaine2;
}

function lirub($id,$nom,$conect){
echo"<div id=\"flip".netUrl($nom)."\" class=\"lirub\">".stripslashes($nom)."";
if($conect=="ok"){echo"<a class=\"various\" data-fancybox-type=\"iframe\" href=\"back/modifrub.php?lidr=$id\">
<img  class=\"flotimg\" src=\"img/editS.png\" alt=\"modif\" title=\"modif\" border=\"0\"></a>"; } else {echo"";}
echo"</div>";
}
function lilien($id,$url,$nom,$conect){
echo"<li class=\"liliens\"><a href=\"$url\" class=\"liens\" target=\"_blank\">".stripslashes($nom)."</a>";
if($conect=="ok"){echo'<a class="various" data-fancybox-type="iframe" href="back/modifliens.php?lidl='.$id.'">
<img  class="flotimgL" src="img/editS.png" alt="modif" title="modif" border="0"></a>'; } else {echo"";}
echo'</li>';}