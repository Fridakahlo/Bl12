<?php
/**
 * @package A_la_mexicaine
 * @version 1
 */
/*
Plugin Name: A la mexicaine
Plugin URI: https://mon_theme_maison.com/
Description: This is not just a plugin, it symbolizes the mexican mood of an entire generation summed up in one word sung most famously by Louis Fonsi: Despacito. When activated you will randomly see a lyric from <cite>Despacito</cite> in the upper right of your admin screen on every page.
Author: Ana Jimenez
Version: 1.0
Author URI: https://mon_theme_maison.com/
*/

function despacito_get_lyric() {
	/** These are the lyrics to Despacito */
	$lyrics = "Ay 
Fonsi 
DY 
Oh
Oh no, oh no
Oh yeah
Diridiri, dirididi Daddy 
Go
Sí, sabes que ya llevo un rato mirándote 
Tengo que bailar contigo hoy (DY) 
Vi que tu mirada ya estaba llamándome 
Muéstrame el camino que yo voy (Oh)
Tú, tú eres el imán y yo soy el metal 
Me voy acercando y voy armando el plan 
Solo con pensarlo se acelera el pulso (Oh yeah)
Ya, ya me está gustando más de lo normal 
Todos mis sentidos van pidiendo más 
Esto hay que tomarlo sin ningún apuro
Despacito 
Quiero respirar tu cuello despacito 
Deja que te diga cosas al oído 
Para que te acuerdes si no estás conmigo
Despacito 
Quiero desnudarte a besos despacito 
Firmo en las paredes de tu laberinto 
Y hacer de tu cuerpo todo un manuscrito (sube, sube, sube)
(Sube, sube)
Quiero ver bailar tu pelo 
Quiero ser tu ritmo 
Que le enseñes a mi boca 
Tus lugares favoritos (favoritos, favoritos baby)
Déjame sobrepasar tus zonas de peligro 
Hasta provocar tus gritos 
Y que olvides tu apellido (Diridiri, dirididi Daddy)
Si te pido un beso ven dámelo 
Yo sé que estás pensándolo 
Llevo tiempo intentándolo 
Mami, esto es dando y dándolo 
Sabes que tu corazón conmigo te hace bom, bom 
Sabes que esa beba está buscando de mi bom, bom 
Ven prueba de mi boca para ver cómo te sabe 
Quiero, quiero, quiero ver cuánto amor a ti te cabe 
Yo no tengo prisa, yo me quiero dar el viaje 
Empecemos lento, después salvaje
Pasito a pasito, suave suavecito 
Nos vamos pegando poquito a poquito 
Cuando tú me besas con esa destreza 
Veo que eres malicia con delicadeza
Pasito a pasito, suave suavecito 
Nos vamos pegando, poquito a poquito 
Y es que esa belleza es un rompecabezas 
Pero pa montarlo aquí tengo la pieza
Despacito 
Quiero respirar tu cuello despacito 
Deja que te diga cosas al oído 
Para que te acuerdes si no estás conmigo
Despacito 
Quiero desnudarte a besos despacito 
Firmo en las paredes de tu laberinto 
Y hacer de tu cuerpo todo un manuscrito (sube, sube, sube)
(Sube, sube)
Quiero ver bailar tu pelo 
Quiero ser tu ritmo 
Que le enseñes a mi boca 
Tus lugares favoritos (favoritos, favoritos baby)
Déjame sobrepasar tus zonas de peligro 
Hasta provocar tus gritos 
Y que olvides tu apellido
Despacito 
Vamos a hacerlo en una playa en Puerto Rico 
Hasta que las olas griten ay, bendito 
Para que mi sello se quede contigo
Pasito a pasito, suave suavecito 
Nos vamos pegando, poquito a poquito 
Que le enseñes a mi boca 
Tus lugares favoritos (favoritos, favoritos baby)
Pasito a pasito, suave suavecito 
Nos vamos pegando, poquito a poquito 
Hasta provocar tus gritos 
Y que olvides tu apellido (DY)
Despacito
";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function despacito() {
	$chosen = despacito_get_lyric();
	echo "<p id='despacito'>$chosen</p>";
	buttons();
}

// Now we set that function up to execute when the admin_notices action is called
// We need some CSS to position the paragraph
add_action( 'admin_notices', 'despacito' );

function despacito_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#despacito {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'despacito_css' );

function buttons() {
echo <<<TTT
	<audio id="audioPlayer" src="/audio/zadig.mp3"></audio>
	<button class="control" onclick="play('audioPlayer', this)">Play</button>
	<button class="control" onclick="resume('audioPlayer')">Stop</button>
	<script type="text/javascript" src="js/app.js"></script>
TTT;
}


?>


// On ajoute une entrée dans la table users
$bdd->exec('INSERT INTO users(first_name, last_name, professional_title, pro_field, company_name, description, adress_number, adress_street, adress_post_code, adress_city, adress_country, phone_number, email, status, subscription_date, end_of_rights, status_active, photo_link) VALUES ($first_name, '$last_name', '$professional_title', '$pro_field', '$company_name', '$description', '$adress_number','$adress_street', '$adress_post_code', '$adress_city', '$adress_country', '$phone_number', '$email', '$status', '$subscription_date', '$end_of_rights', '$status_active', '$photo_link')');

echo 'Le jeu a bien été ajouté !';

INSERT INTO users (first_name, last_name, professional_title, pro_field, company_name, description, adress_number, adress_street, adress_post_code, adress_city, adress_country, phone_number, email, status, subscription_date, end_of_rights, status_active, photo_link) VALUES ('Clara','Sabatier', 'Decoratrice', 'Decoration', 'DecoandMore', 'DecoandMore est une entreprise de décoration extérieur et interieur. Spécialisé dans lart tribal.', '23', 'Rue des Fleurs', '12000', 'Rodez', 'France', '0565040322', 'decoandmore@gmail.com', 'Adhérant', '2018/02/02', '2019/12/31', '1', 'Photo.pgn' );

INSERT INTO users(last_name)
VALUES (Sabatier);

// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
	?>
	<p>
		<strong>Données sauvegardés: </strong>
	    Prénom:<?php echo $donnees['first_name']; ?><br />
	    Nom:<?php echo $donnees['last_name']; ?><br />
	    Titre professional:<?php echo $donnees['professional_title']; ?><br />
	    Domaine Professional: <?php echo $donnees['pro_field']; ?><br />
	    Nom de l'entreprise: <?php echo $donnees['company_name']; ?><br />
	    Description: <?php echo $donnees['description']; ?><br />
	    <strong>Adresse: </strong>
	    Numero: <?php echo $donnees['adress_number']; ?><br />
	    Rue: <?php echo $donnees['adress_street']; ?><br />
	    Code Postal: <?php echo $donnees['adress_post_code']; ?><br />
	    Ville: <?php echo $donnees['adress_city']; ?><br />
	    Pays: <?php echo $donnees['adress_country']; ?><br />    
	    Téléphone: <?php echo $donnees['phone_number']; ?><br />
	    Email: <?php echo $donnees['email']; ?><br />
	    Status: <?php echo $donnees['status']; ?><br />   
	    Date de la première adhésion: <?php echo $donnees['subscription_date']; ?><br />
	    Fin de droits: <?php echo $donnees['end_of_rights']; ?><br />
	    Status activité: <?php echo $donnees['status_active']; ?><br />
	    Photo/Logo: <?php echo $donnees['photo_link']; ?><br />
	</p>
	
	<?php
	}
	$reponse->closeCursor();

	?>


<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=clbl12;charset=utf8', 'root', 'simplonco');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO users(first_name, last_name, professional_title, pro_field, company_name, description, adress_number, adress_street, adress_post_code, adress_city, adress_country, phone_number, email, status, subscription_date, end_of_rights, status_active, photo_link) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$req->execute(array($_POST['first_name'], $_POST['last_name'], $_POST['professional_title'], $_POST['pro_field'], $_POST['company_name'], $_POST['description'], $_POST['adress_number'], $_POST['adress_street'], $_POST['adress_post_code'], $_POST['adress_city'], $_POST['adress_country'], $_POST['phone_number'], $_POST['email'], $_POST['status'], $_POST['subscription_date'], $_POST['end_of_rights'], $_POST['status_active'], $_POST['photo_link']));


if(isset($_POST['envoi'])){ // si formulaire soumis

?>
	<p>
		<strong>Données sauvegardés: </strong><br>
	    Prénom:<?php echo $_POST['first_name']; ?><br />
	    Nom:<?php echo $donnees['last_name']; ?><br />
	    Titre professional:<?php echo $donnees['professional_title']; ?><br />
	    Domaine Professional: <?php echo $donnees['pro_field']; ?><br />
	    Nom de l'entreprise: <?php echo $donnees['company_name']; ?><br />
	    Description: <?php echo $donnees['description']; ?><br />
	    <strong>Adresse: </strong>
	    Numero: <?php echo $donnees['adress_number']; ?><br />
	    Rue: <?php echo $donnees['adress_street']; ?><br />
	    Code Postal: <?php echo $donnees['adress_post_code']; ?><br />
	    Ville: <?php echo $donnees['adress_city']; ?><br />
	    Pays: <?php echo $donnees['adress_country']; ?><br />    
	    Téléphone: <?php echo $donnees['phone_number']; ?><br />
	    Email: <?php echo $donnees['email']; ?><br />
	    Status: <?php echo $donnees['status']; ?><br />   
	    Date de la première adhésion: <?php echo $donnees['subscription_date']; ?><br />
	    Fin de droits: <?php echo $donnees['end_of_rights']; ?><br />
	    Status activité: <?php echo $donnees['status_active']; ?><br />
	    Photo/Logo: <?php echo $donnees['photo_link']; ?><br />
	</p>
	
	<?php

}



<?php 

mysql_connect('localhost', 'root', 'simplonco'); 
mysql_select_db("clbl12");

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$professional_title=$_POST['professional_title'];
$pro_fiel=$_POST['pro_field'];
$company_name=$_POST['company_name'];
$description=$_POST['description'];
$adress_number=$_POST['adress_number'];
$adress_street=$_POST['adress_street'];
$adress_post_code$_POST['adress_post_code'];
$adress_city=$_POST['adress_city'];
$adress_country=$_POST['adress_country'];
$phone_number=$_POST['phone_number'];
$email=$_POST['email'];
$status=$_POST['status'];
$subscription_date=$_POST['subscription_date'];
$end_of_rights=$_POST['end_of_rights'];
$status_active=$_POST['status_active'];
$photo_link=$_POST['photo_link'];
 
if ('$envoi') { 
	$ok=mysql_db_query("clbl12","INSERT INTO users(first_name, last_name, professional_title, pro_field, company_name, description, adress_number, adress_street, adress_post_code, adress_city, adress_country, phone_number, email, status, subscription_date, end_of_rights, status_active, photo_link) VALUES ('$first_name', '$last_name', '$professional_title', '$pro_field', '$company_name', '$description', '$adress_number', '$adress_street', '$adress_post_code', '$adress_city', '$adress_country', '$phone_number', '$email', '$status', '$subscription_date', '$end_of_rights', '$status_active', '$photo_link')"); 


	echo"L'élément a bien été inséré !"; 
 }else{
 	echo"Buuuu !";
 }
	$reponse->closeCursor();

	?>

	<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=clbl12;charset=utf8', 'root', 'simplonco');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$first_name = '';
$last_name = '';
$professional_title = '';
$pro_field = '';
$company_name = '';
$description = '';
$adress_number = '';
$adress_street = '';
$adress_post_code = '';
$adress_city = '';
$adress_country = '';
$phone_number = '';
$email = '';
$status = 'Active';
$subscription_date = '2018/02/02';
$end_of_rights = '2019/12/31';
$status_active = '1';
$photo_link = 'photoentreprise.pgn';

if (isset($_POST)) {
	if (!empty($_POST['first_name']) {
		$first_name = $_POST['first_name'];
	}
	if (!empty($_POST['last_name']) {
		$first_name = $_POST['last_name'];
	}
	if (!empty($_POST['professional_title']) {
		$first_name = $_POST['professional_title'];
	}
	if (!empty($_POST['pro_field']) {
		$first_name = $_POST['pro_field'];
	}
	if (!empty($_POST['professional_title']) {
		$first_name = $_POST['professional_title'];
	}
	if (!empty($_POST['company_name']) {
		$first_name = $_POST['company_name'];
	}
	if (!empty($_POST['description']) {
		$first_name = $_POST['description'];
	}
	if (!empty($_POST['adress_number']) {
		$first_name = $_POST['adress_number'];
	}
	if (!empty($_POST['adress_street']) {
		$first_name = $_POST['adress_street'];
	}
	if (!empty($_POST['adress_post_code']) {
		$first_name = $_POST['adress_post_code'];
	}
	if (!empty($_POST['adress_city']) {
		$first_name = $_POST['adress_city'];
	}
	if (!empty($_POST['adress_country']) {
		$first_name = $_POST['adress_country'];
	}
	if (!empty($_POST['phone_number']) {
		$first_name = $_POST['phone_number'];
	}
	if (!empty($_POST['email']) {
		$first_name = $_POST['email'];
	}
	if (!empty($_POST['status']) {
		$first_name = $_POST['status'];
	}
	if (!empty($_POST['subscription_date']) {
		$first_name = $_POST['subscription_date'];
	}
	if (!empty($_POST['end_of_rights']) {
		$first_name = $_POST['end_of_rights'];
	}
	if (!empty($_POST['status_active']) {
		$first_name = $_POST['status_active'];
	}
	if (!empty($_POST['photo_link']) {
		$first_name = $_POST['photo_link'];
	}
	
	

		$first_name = $_POST['first_name'];
		$last_name=$_POST['last_name'];
		$professional_title=$_POST['professional_title'];
		$pro_field=$_POST['pro_field'];
		$company_name=$_POST['company_name'];
		$description=$_POST['description'];
		$adress_number=$_POST['adress_number'];
		$adress_street=$_POST['adress_street'];
		$adress_post_code$_POST['adress_post_code'];
		$adress_city=$_POST['adress_city'];
		$adress_country=$_POST['adress_country'];
		$phone_number=$_POST['phone_number'];
		$email=$_POST['email'];
		$status=$_POST['status'];
		$subscription_date=$_POST['subscription_date'];
		$end_of_rights=$_POST['end_of_rights'];
		$status_active=$_POST['status_active'];
		$photo_link=$_POST['photo_link'];
	
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO users (first_name, last_name, professional_title, pro_field, company_name, description, adress_number, adress_street, adress_post_code, adress_city, adress_country, phone_number, email, status, subscription_date, end_of_rights, status_active, photo_link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$req->execute(array($first_name, $last_name, $professional_title, $pro_field, $company_name, $description, $adress_number, $adress_street, $adress_post_code, $adress_city, $adress_country, $phone_number, $email, $status, $subscription_date, $end_of_rights, $status_active, $photo_link));

<!-- <?php
					$status = $req3->fetchAll();
					foreach ($status as $option) {
						var_dump($option);
						echo "<option value="{$option}"></option>"
					}
				    endforeach; 
				?>
 -->