<?php

$pdo= new PDO('mysql:dbname=parisenphotos_news;host=localhost', 'parisenphotos','chris3t7ine',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8' ));

//constantes
define("SITE","NAVAS Thierry");
define("URL","http://www.parisenphotos.com/NT/");
define("RACINE",$_SERVER['DOCUMENT_ROOT'].'/NT/');
//variables
//pour permettre d'afficher des messages d'erreurs d'inforamtions etc..
$content="";
$contenu="";

//======Fonctions =====
require_once('fonction.inc.php');
