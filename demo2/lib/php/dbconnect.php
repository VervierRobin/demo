<?php
    //permet de se connecter à ma session de base de données
	$connexion = "host=localhost password=robin user=robin_PHP dbname=template1 port=5433";
	$cnx=pg_connect($connexion);
	if($cnx)
		print "Connexion OK";
	else
		print "Echec de connexion";
	function sendQuery($cnx,$query,&$result) //& = opérateur d'adressage
	{ 	//cnx = données connexion, $query = requête
		//$result = ensemble de données venant de la bd
		$result=pg_query($cnx,$query);
		if($result)
			return $result; //renvoie le résultat
		else
			return false;//envoie false en cas d'échec 
	}
	function getData($result,&$tab)//$result = ensemble de données retourné par sendQuery 
	{	$tab=array(); //tab = tableau 2 dim qui contiendra les données 
		$nbr=pg_numrows($result);//compte le nombre de lignes de la table
		for($i=0;$i<$nbr;$i++)
			{$tab[$i]=pg_fetch_array($result,$i);}//fonction qui va chercher des données et les mettre dans un tableau
	}
	function sendData($cnx,$query) { //permet de vérifier si les données sont bien envoyées
	$result="";
	$result=pg_query($cnx,$query);
	if($result) {
		return true; //envoie true
	}
	else {
		return false;//envoie false en cas d'échec 
	}
}
	
?>