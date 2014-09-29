<?php
session_start(); //permet l'utilisation des variables de session
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 
 <head>  <!--En-tête du XHTML-->
	<link rel="icon" type="image/png" href="./images/favicon.png" /> 
	         <!--permet de mettre une favicon dans la barre d'adresse mais ne fonctionne pas-->
	<title>Demo2</title> <!--permet de mettre un titre dans la barre d'adresse -->
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
	<link rel="stylesheet" href="./lib/css/style_site.css" type="text/css" media="all" />  <!--lien du CSS -->
 </head>

 <body >
	<p>	<?php include('./lib/php/dbconnect.php');?> </p>  
	<!--permet d'appeler le PHP qui contrôle la connexion à la base de données et crée des fonctions de requête -->
	
	<div id="ensemble">   <!--permet de définir une boite pour que tout soit cloisonné : évite les problèmes quand 
	                      on réduit la taille de la fenêtre -->
	 
		<div id="header"> <!--bannière d'en-tête -->	
			<p> Produits divers</p>
			<img src="./images/ban.jpg" alt="Bannière" />
		</div>	
		
		<div id="gauche">  <!--bandeau à gauche de la page web-->
			<div id="menu"> <!--boite du menu-->
				<p id="titre_m">&nbsp; Menu</p>
				<?php if(file_exists('./lib/php/menu.php')) //permet de vérifier si la page existe
						include('./lib/php/menu.php'); //affiche que si la page existe
				?>
			</div>
			<div id="info"> <!--boite info-->
				<p id="titre">&nbsp; Le magasin</p>
				<?php if(file_exists('./lib/php/info.php')) //permet de vérifier si la page existe
						include('./lib/php/info.php');//affiche que si la page existe
				?>
			</div> <!--fin div info-->
		</div>  <!--fin div gauche-->
		
		<div id="contenu">
			<?php
				if(!isset($_SESSION['page'])) //si la variable page n'existe pas encore
					$_SESSION['page']="accueil.php";//affichage de la page par défaut
				if(isset($_GET['page'])) 
					$_SESSION['page']=$_GET['page'];//affichage de la page demandée suite à un clic
				$chemin="./pages/".$_SESSION['page']; //stockage du lien d'accès dans la variable 
				if(file_exists($chemin)) 
					include ($chemin); //affichage de la page
				else 
					print "Oups! La page n'existe pas encore";
			?>  
		</div><!--fin div contenu-->
		
	</div> <!--fin div ensemble-->
 </body>
</html>