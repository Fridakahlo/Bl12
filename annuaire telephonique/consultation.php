<?php
require ('login.php');

$plnom1 = $HTTP_POST_VARS['plnom'] ;

$connexion = mysql_connect($hote, $login, $pass) or die("Erreur de connexion...") ;

$req = mysql_select_db($bdd, $connexion) or die("Erreur de connexion...") ;

echo "<html><body><div align=\"center\">" ;
echo "<h1>Liste des personnes</h1><br><br><br>" ;
echo "<table border=\'1\' cellspacing=3>" ;
echo "<tr><td style='border:solid windowtext .1pt;'>Nom</td><td style='border:solid windowtext .5pt;'>Prénom</td><td style='border:solid windowtext .5pt;'>Adresse</td><td style='border:solid windowtext .5pt;'>Téléphone</td><td style='border:solid windowtext .5pt;'>Supprimer</td></tr>" ;

if ($plnom1 != "0")
{
$req3 = "SELECT * FROM info_personne WHERE plnom='$plnom1'" ;
$req4 = mysql_query($req3) or die("Erreur dans la requête...");
$res = mysql_numrows($req4);
if($res==0)
{
echo "<tr><td colspan=5 align=center style='border:solid windowtext .5pt;'><b>L'annuaire est vide !!!</b></td></tr>" ;
}
while ($data = mysql_fetch_array($req4)) 
{
$tabChamps[0]=$data['nom'];
$tabChamps[1]=$data['prenom'];
$tabChamps[2]=$data['adresse'];
$tabChamps[3]=$data['tel'];

echo "<tr><td>$tabChamps[0]</td><td>$tabChamps[1]</td><td>$tabChamps[2]</td><td>$tabChamps[3]</td><td><form action=\"supprimer.php\" method=\"POST\"><input type=\"hidden\" value=\"$tabChamps[0]\" name=\"nom\"><div align=\"center\"><input type=\"submit\" value=\"supprimer\"></div></form></td></tr><br>" ; 
}
}else{

$req3 = "SELECT * FROM info_personne" ;
$req4 = mysql_query($req3) or die("Erreur dans la requête...");
$res = mysql_numrows($req4);
if($res==0)
{
echo "<tr><td colspan=5 align=center style='border:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><b>L'annuaire est vide !!!</b></td></tr>" ;
}

while ($data = mysql_fetch_array($req4)) 
{
$tabChamps[0]=$data['nom'];
$tabChamps[1]=$data['prenom'];
$tabChamps[2]=$data['adresse'];
$tabChamps[3]=$data['tel'];

echo "<tr><td style='border:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>$tabChamps[0]</td><td style='border:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>$tabChamps[1]</td><td style='border:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>$tabChamps[2]</td><td style='border:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>$tabChamps[3]</td><td style='border:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><form action=\"supprimer.php\" method=\"POST\"><input type=\"hidden\" value=\"$tabChamps[0]\" name=\"nom\"><div align=\"center\"><input type=\"submit\" value=\"supprimer\"></div></form></td></tr><br>" ; 
}
}
echo "</table>" ;
echo "<br><form action=\"consultation.php\" method=\"POST\" name=\"form1\"><select name=\"plnom\">
        <option selected value=\"0\">Choissiser une lettre...</option>
        <option value=\"A\">A</option>
        <option value=\"B\">B</option>
        <option value=\"C\">C</option>
        <option value=\"D\">D</option>
        <option value=\"E\">E</option>
        <option value=\"F\">F</option>
        <option value=\"G\">G</option>
        <option value=\"H\">H</option>
        <option value=\"I\">I</option>
        <option value=\"J\">J</option>
        <option value=\"K\">K</option>
        <option value=\"L\">L</option>
        <option value=\"M\">M</option>
        <option value=\"N\">N</option>
        <option value=\"O\">O</option>
        <option value=\"P\">P</option>
        <option value=\"Q\">Q</option>
        <option value=\"R\">R</option>
        <option value=\"S\">S</option>
        <option value=\"T\">T</option>
        <option value=\"U\">U</option>
        <option value=\"V\">V</option>
        <option value=\"W\">W</option>
        <option value=\"X\">X</option>
        <option value=\"Y\">Y</option>
        <option value=\"Z\">Z</option>
        <option value=\"0\">---Tout afficher---</option>
        </select>
        <input type=\"submit\" value=\"Trier\"></form><br><br>" ;
echo "<a href=\"inscription.htm\">Ajouter une personne a l'annuaire...</a></div></body></html>" ;

mysql_close($connexion) ;
?>