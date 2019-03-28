<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html  xml:lang="pt" lang="pt">
 
<head>
<?php 
    session_cache_expire(10);
    $cache_expire = session_cache_expire();
    session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
    }
    
    $logado = $_SESSION['login'];
    ?>
	<!-- Include scripts -->
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script> 
	<script type="text/javascript" src="js/responsivemultimenu.js"></script>

	<!-- Include styles -->
	<link rel="stylesheet" href="css/responsivemultimenu.css" type="text/css"/>

	<!-- Include media queries -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
</head>
 
<body class="body">
<div>
		<div class="rmm style">
			<ul>
				<li><a href="pesquisa.php">Nova Pesquisa</a></li>
				<li><a href="sair.php">Sair</a></li>
			</ul>
		</div>
	</div>
</body>
</html>