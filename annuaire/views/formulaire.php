<?php
/**
 * @package Annuaire
 * @version 1
 */
/*
Plugin Name: Annuaire
Plugin URI: http://www.test.businessladies12.com/
Description: Annuaire d'adherents et partenaires économiques
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
{
        die('Erreur : '.$e->getMessage());
}

$req3 = $bdd->prepare('SELECT * FROM statuses');
$req3->execute();
$req4 = $bdd->prepare('SELECT * FROM payment_status');
$req4->execute();
$req5 = $bdd->prepare('SELECT * FROM payment_mode');
$req5->execute();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Formulaire</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	    form
	    {
	        text-align:center;
	    }
    </style>
</head>

<body>
	<form method="post" action="formulaire_post.php">
	    <h1>Formulaire pour creer un adhérant</h1>
    	<h2>Informations professionnelles</h2>
	    <label>Prenom*: <input name="first_name" type="text" id="first_name"></label><br>
	    <label>Nom*: <input name="last_name" type="text"></label><br>
	    <label>Titre professionnel*: <input name="professional_title" type="text"></label><br>
    	<label>Nom de l'entreprise: <input name="company_name" type="text" size="45"></label><br>
    	<label>Domaine professionnel*: <input name="pro_field" type="text" size="45"></label><br>
    	<label>Description de l'entreprise: </label> 
    		<textarea name="description" type="text" rows="4" cols="45"></textarea>
    	<br>
    	<label>Link logo/photo: <input name="photo_link" type="text" size="45"></label><br>
    	<label>Status Activité*:
    		<input type="radio" id="active" name="status_active" value="0">
    		<label for="active">Active</label>
    		<input type="radio" id="inactive" name="status_active" value="1">
    		<label for="inactive">Inactive</label>
		</label>
    	<h3>Adresse de l'entreprise:</h3>
		<label>No.: <input name="adress_number" type="text" size="45"></label><br>
    	<label>Rue*: <input name="adress_street" type="text" size="45"></label><br>
    	<label>Code postal*: <input name="adress_post_code" type="text" size="45"></label><br>
        <label>Ville*: <input name="adress_city" type="text" size="45"></label><br>
    	<label>Pays*: <input name="adress_country" type="text" size="45"></label><br>
    	<label>No. de téléphone*: <input name="phone_number" type="text" size="45"></label><br>
    	<label>Email*: <input name="email" type="text" size="45"></label><br>
	    	
		<h2>Informations administratives</h2>
		<label>Status*: 
			<select name="status_id">
			 <option value= "">---Select---</option>
				<?php
				$status = $req3->fetchAll();
				foreach ($status as $option) { ?>
					<option value="<?php echo $option['id'];?>"><?php echo $option['name']; ?></option>
				<?php
				}
				?>
			</select>
		</label><br>
	    <label>Date d'adhésion*: <input name="subscription_date" type="text" size="45"></label><br>
	    <label>Date fin d'adhésion: <input name="end_of_rights" type="text" size="45"></label><br>
	    <label>Description paiement: <input name="payment_description" type="text" size="45"></label><br>
	    <label>Status Paiement*: 
			<select name="payment_status_id">
				<option value="">---Select---</option>
					<?php
					$payment_status = $req4->fetchAll();
					foreach ($payment_status as $ps_option) { ?>
				<option value="<?php echo $ps_option['id'];?>"><?php echo $ps_option['name']; ?></option>
				<?php
				}
				?>
			</select>
		</label><br>
		<label>Mode de paiement: 
			<select name="payment_mode_id">
				<option value="">---Select---</option>
					<?php
					$payment_mode = $req5->fetchAll();
					foreach ($payment_mode as $pm_option) { ?>
				<option value="<?php echo $pm_option['id'];?>"><?php echo $pm_option['name']; ?></option>
				<?php
				}
				?>
			</select>
		</label><br>
		<label>Date de paiement: <input name="payment_date" type="text" size="45"></label><br> 

		<input type="submit" value="Submit" name="envoi">
	</form>
	
	</body>
</html>


