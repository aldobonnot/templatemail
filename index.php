<?php
session_start();

include("inc/init.inc.php");
require("inc/nav.class.php");

if (!isset($_GET['seconecter'])) $seconecter=""; else $seconecter=$_GET['seconecter'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> NAVAS Thierry</title>
<link rel="icon" type="image/png" href="<?php echo URL;?>favicon.png">
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="<?php echo URL;?>favicon.ico" /><![endif]-->

<link type="text/css" rel="stylesheet" href="<?php echo URL;?>css/bootstrap.css">
<link href="<?php echo URL;?>css/one.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Add jQuery library -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="js/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
</head>

<body bgcolor="#3B3313">
<div class="global">
<h1>NAVAS Thierry</h1>
<?php 
include("inc/nav2.php");
?>
</div>
<?php if($seconecter=="okc"){ 
include("connexion2.php");
} else { echo""; } ?>

<?php if($conect=="ok"){?>
<div class="demosphere">
<iframe src="http://www.parisenphotos.com/iframePEP/islide.php" style="width:100%;height:550px;margin:auto;color:#8F8557;" frameborder="no" scrolling="no" ></iframe></div>
<?php } else {echo"";} ?><div class="hh"><span class="copya">&copy;<sub class="copyt"> 2016</sub></span></div>
<script type="text/javascript">
$(document).ready(function() {
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		afterClose  : function() {window.location.reload();}
		
	});
});
</script>
</body>
</html>