<?php
//===== connexion
$pdo= new PDO('mysql:dbname=pperso;host=localhost', 'root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8' ));

//constantes
define("SITE","NAVAS Thierry");
define("URL","http://localhost/pageperso/");
define("RACINE",$_SERVER['DOCUMENT_ROOT'].'/pageperso/');
//variables
//pour permettre d'afficher des messages d'erreurs d'inforamtions etc..
$content="";
$contenu="";
//===== SESSION

//======Fonctions =====
require_once('fonction.inc.php');

$mysqli = new mysqli();
$mysqli->connect("localhost", "root", "", "pperso");
if ($mysqli->connect_error) {die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);}
