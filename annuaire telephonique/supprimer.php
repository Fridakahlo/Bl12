<?php
require ('login.php');

$nom = $HTTP_POST_VARS['nom'] ;

$connexion = mysql_connect($hote, $login, $pass) or die("Erreur de connexion...") ;

$req = mysql_select_db($bdd, $connexion) or die("Erreur de connexion...") ;

$req2 = "DELETE FROM info_personne WHERE nom='$nom' LIMIT 1";

$req3 = mysql_query($req2) or die("Erreur de requête...") ;
echo "<div align=\"center\">La personne dont le nom est $nom a bien été supprimer." ;
echo "<br><br><br><input type=\"button\" onClick=\"document.location.href = 'inscription.htm'\" value=\"Inscrire une personne\">" ;
echo "<br><form method=\"POST\" action=\"consultation.php\"><input type=\"hidden\" value=\"0\" name=\"plnom\"><input type=\"submit\" value=\"Consulter la liste des personnes\"></form></div>" ;
?>