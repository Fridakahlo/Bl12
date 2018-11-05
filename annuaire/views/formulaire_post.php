<?php
/**
 * @package Annuaire
 * @version 1
 */
/*
Plugin Name: Formulaire d'adhesion
Plugin URI: http://www.test.businessladies12.com/
Description: Formulaire d'adhesion pour adherents et partenaires économiques
Author: Ana Jimenez
Version: 1.0
Author URI: https://mon_theme_maison.com/
*/
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=businessnupprod.mysql.db;dbname=businessnupprod;charset=utf8', 'businessnupprod', 'Rodez2018');
}
catch(Exception $e)
{businessnupprod.mysql.db
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
$status_id = '';
$subscription_date = '';
$end_of_rights = '';
$status_active = true;
$photo_link = '';
$payment_description = '';
$payment_status_id = '';
$payment_mode_id = '';
$payment_date = '';

if (isset($_POST)) {
	if ( !empty( $_POST['first_name'] )) {
		$first_name = $_POST['first_name'];
	}
	if (!empty($_POST['last_name'])) {
		$last_name = $_POST['last_name'];
	}
	if (!empty($_POST['professional_title'])) {
		$professional_title = $_POST['professional_title'];
	}
	if (!empty($_POST['pro_field'])) {
		$pro_field = $_POST['pro_field'];
	}
	if (!empty($_POST['company_name'])) {
		$company_name = $_POST['company_name'];
	}
	if (!empty($_POST['description'])){
		$description = $_POST['description'];
	}
	if (!empty($_POST['adress_number'])) {
		$adress_number = $_POST['adress_number'];
	}
	if (!empty($_POST['adress_street'])) {
		$adress_street = $_POST['adress_street'];
	}
	if (!empty($_POST['adress_post_code'])) {
		$adress_post_code = $_POST['adress_post_code'];
	}
	if (!empty($_POST['adress_city'])) {
		$adress_city = $_POST['adress_city'];
	}
	if (!empty($_POST['adress_country'])) {
		$adress_country = $_POST['adress_country'];
	}
	if (!empty($_POST['phone_number'])) {
		$phone_number = $_POST['phone_number'];
	}
	if (!empty($_POST['email'])) {
		$email = $_POST['email'];
	}
	if (!empty($_POST['status_id'])) {
		$status_id = $_POST['status_id'];
	}
	if (!empty($_POST['subscription_date'])) {
		$subscription_date = $_POST['subscription_date'];
	}
	if (!empty($_POST['end_of_rights'])) {
		$end_of_rights = $_POST['end_of_rights'];
	}
	if (!empty($_POST['status_active'])) {
		$status_active_id = $_POST['status_active'];
	}
	if (!empty($_POST['photo_link'])) {
		$photo_link = $_POST['photo_link'];
	}
	if (!empty($_POST['payment_description'])) {
		$payment_description = $_POST['payment_description'];
	}
	if (!empty($_POST['payment_status_id'])) {
		$payment_status_id = $_POST['payment_status_id'];
	}
	if (!empty($_POST['payment_mode_id'])) {
		$payment_mode_id = $_POST['payment_mode_id'];
	}
	if (!empty($_POST['payment_date'])) {
		$payment_date = $_POST['payment_date'];
	}
}

try
{
    $bdd = new PDO('mysql:host=businessnupprod.mysql.db;dbname=	businessnupprod;charset=utf8', '	businessnupprod', 'Rodez2018');
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO users (first_name, last_name, professional_title, pro_field, company_name, description, adress_number, adress_street, adress_post_code, adress_city, adress_country, phone_number, email, status_id, subscription_date, end_of_rights, status_active, photo_link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$req->execute(array($first_name, $last_name, $professional_title, $pro_field, $company_name, $description, $adress_number, $adress_street, $adress_post_code, $adress_city, $adress_country, $phone_number, $email, $status_id, $subscription_date, $end_of_rights, $status_active, $photo_link));

$req2 = $bdd->prepare('INSERT INTO accounts (description, payment_status_id, payment_mode_id, payment_date) VALUES (?, ?, ?, ?)');
$req2->execute(array($payment_description, $payment_status_id, $payment_mode_id, $payment_date));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_POST['envoi'])){ // si formulaire soumis

?>
	<p>
		<strong>Données sauvegardés: </strong><br />
	    Prénom:<?php echo $first_name; ?><br />
	    Nom:<?php echo $last_name; ?><br />
	    Titre professional:<?php echo $professional_title; ?><br />
	    Domaine Professional: <?php echo $pro_field; ?><br />
	    Nom de lentreprise: <?php echo $company_name; ?><br />
	    Description: <?php echo $description; ?><br />
	    <strong>Adresse: </strong><br />
	    Numero: <?php echo $adress_number; ?><br />
	    Rue: <?php echo $adress_street; ?><br />
	    Code Postal: <?php echo $adress_post_code; ?><br />
	    Ville: <?php echo $adress_city; ?><br />
	    Pays: <?php echo $adress_country; ?><br />    
	    Téléphone: <?php echo $phone_number; ?><br />
	    Email: <?php echo $email; ?><br />
	    <strong>Information administratives: </strong><br />
	    Status: <?php echo $status_id; ?><br />   
	    Date de la première adhésion: <?php echo $subscription_date; ?><br />
	    Fin de droits: <?php echo $end_of_rights; ?><br />
	    Status activité: <?php echo $status_active; ?><br />
	    Photo/Logo: <?php echo $photo_link; ?><br />
	    Description du paiement:  <?php echo $payment_description; ?><br />
	    Status du paiement: <?php echo $payment_status_id; ?><br />
	    Mode de paiement: <?php echo $payment_mode_id; ?><br />
	    Date de paiement: <?php echo $payment_date; ?><br />
	</p>
	
<?php
}
