<?php
require ('login.php');

$connexion = mysql_connect($hote, $login, $pass) or die("Erreur de connexion...") ;

$req = mysql_select_db($bdd, $connexion) or die("Erreur de connexion...") ;

$nom1 = $HTTP_POST_VARS["nom"] ;

$prenom1 = $HTTP_POST_VARS["prenom"] ;

$adresse1 = $HTTP_POST_VARS["adresse"] ;

$telephone1 = $HTTP_POST_VARS["telephone"] ;

$plnom1 = $HTTP_POST_VARS["plnom"] ;

if(empty($nom1)) { 

echo "Il manque le nom !";

require ("inscription.htm");

}else{

if(empty($prenom1)) { 

echo "Il manque le Prenom !";

require ("inscription.htm");

}else{

if(empty($adresse1)) { 

echo "Il manque l'adresse !";

require ("inscription.htm");

}else{

if(empty($telephone1) || $telephone1 < "0100000000") { 

echo "Numero de telephone manquant ou incorrecte !";

require ("inscription.htm");

}else{

if(empty($plnom1)) {

echo "Il faut choisir une lettre...(la premiere de nom de famille)";

require ("inscription.htm");

}else{
$sql = "SELECT nom, prenom, adresse, tel FROM info_personne WHERE nom ='$nom1' " ;

$req2 = mysql_query($sql) ;

$req3 = mysql_numrows($req2);

if($req3!=0) { 
echo "Cette personne est deja inscrite !" ;
require ("inscription.htm");
exit();
}else{

$req4 = "INSERT INTO info_personne (plnom, nom, prenom, adresse, tel) VALUES ('$plnom1', '$nom1', '$prenom1', '$adresse1', '$telephone1')" ;

$req5 = mysql_query($req4) or die("Erreur de requete...") ;
echo "<div align=\"center\">Les donnés suivantes on été inscrite : $nom1 $prenom1 domiciliée au $adresse1 a pour numero de telephone $telephone1" ;
echo "<br><br><br><form method=\"POST\" action=\"consultation.php\"><input type=\"hidden\" value=\"0\" name=\"plnom\"><input type=\"submit\" value=\"Consulter la liste des personnes\"></form></div>";
}
}
}
}
}
}
?>