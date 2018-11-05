<?php
/**
 * @package Annuary
 * @version 1
 */
/*
Plugin Name: Annuary
Plugin URI:
Description: Annuaire des adhérents et des partenaires
Author: Ana Jimenez
Version: 1.0
Author URI: 
*/

function wpm_custom_post_type() {

	// Administration labels for the custom post type
	$labels = array(
		// Plural name
		'name'                => 'Annuaire',
		// Singular name
		'singular_name'       => 'Annuaire',
		// Menu labels
		'add_new'             => 'Ajouter un membre',
		'all_items'           => 'Voir tous les membres',
		'add_new_item'        => 'Ajouter un nouveaux membre',
		'edit_item'           => 'Editer un membre',
		'new_item'            => 'Nouveax membre',
		'view_item'           => 'Voir un membre',
		'search_items'        => 'Rechercher un membre',
		'not_found'           => 'Non trouvée',
		'not_found_in_trash'  => 'Non trouvée dans la corbeille',
		'parent_item_colon'   => 'Parent Item',
	);
	$args = array(
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-id-alt',
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'query_var'           => true,  
		'rewrite'			  => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'supports'             => array( 
			'title', 
			'custom-fields',
			'thumbnail',
		),
		/* 
		* Supplementary options
		*/	
		'taxonomies'          => array('annuarykind'),
		'menu_position'       => 2,
		'exclude_from_search' => false
	);
	register_post_type('annuary',$args);
}
add_action( 'init', 'wpm_custom_post_type');


function wpm_add_taxonomies() {

	$labels_cat_membres = array(
		'name'                       => _x( 'Type membre', 'taxonomy general name'),
		'singular_name'              => _x( 'Type membre', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une Type'),
		'popular_items'              => __( 'Types populaires'),
		'all_items'                  => __( 'Toutes les Types'),
		'edit_item'                  => __( 'Editer une Type'),
		'update_item'                => __( 'Mettre à jour une Type'),
		'add_new_item'               => __( 'Ajouter une nouvelle Type'),
		'new_item_name'              => __( 'Nom du nouveaux Type'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une Type'),
		'choose_from_most_used'      => __( 'Choisir parmi les Types les plus utilisées'),
		'not_found'                  => __( 'Pas de Types trouvées'),
		'menu_name'                  => __( 'Types de membres'),
	);

	$args_cat_membres = array(
	
		'hierarchical'          => true,
		'labels'                => $labels_cat_membres,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
	);

	register_taxonomy( 'annuarykind', 'annuary', $args_cat_membres);

}
add_action( 'init', 'wpm_add_taxonomies', 0 );


function my_custom_template($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'annuary' ) {
        if ( file_exists( PLUGIN_PATH . '/archive-annuary.php' ) ) {
            return PLUGIN_PATH . '/archive-annuary.php';
        }
    }

    return $single;

}

add_filter('single_template', 'my_custom_template');


/* Metabox: add metas */

add_action('add_meta_boxes','init_metabox');
function init_metabox(){
  global $post;
  if(!empty($post)) {
    /*Custom post type*/
    add_meta_box('info_membre', 'Informations sur les membres', 'info_membre', 'annuary', 'normal','high');
    add_meta_box( "url_du_pdf", "Fichier à télécharger", "pdf_metabox", "post", "normal", "high" );
  }
}
/* Meta box: create metas*/

function info_membre($post){
  $first_name          = get_post_meta($post->ID,'_first_name',true);
  $last_name           = get_post_meta($post->ID,'_last_name',true);
  $professional_title  = get_post_meta($post->ID,'_professional_title',true);
  $pro_field           = get_post_meta($post->ID,'_pro_field',true);
  $company_name        = get_post_meta($post->ID,'_company_name',true);
  $description         = get_post_meta($post->ID,'_description',true);
  $adress_number       = get_post_meta($post->ID,'_adress_number',true);
  $adress_street       = get_post_meta($post->ID,'_adress_street',true);
  $adress_post_code    = get_post_meta($post->ID,'_adress_post_code',true);
  $adress_city         = get_post_meta($post->ID,'_adress_city',true);
  $adress_country      = get_post_meta($post->ID,'_adress_country',true);
  $phone_number        = get_post_meta($post->ID,'_phone_number',true);
  $email               = get_post_meta($post->ID,'_email',true);
  $status              = get_post_meta($post->ID,'_status',true);
  $subscription_date   = get_post_meta($post->ID,'_subscription_date',true);
  $end_of_rights       = get_post_meta($post->ID,'_end_of_rights',true);
  $status_active       = get_post_meta($post->ID,'_status_active',true);
  $photo_link          = get_post_meta($post->ID,'_photo_link',true);
  $interest            = get_post_meta($post->ID,'_interest',true);
  $url_pdf             = get_post_meta($post->ID,'_url_pdf', true );
  ?>
  
  <div class="content">
    
    <div class="name_title">

      <div>
        <label class="first_name">Prénom: <input id="" type="text" name="first_name" value="<?php echo $first_name; ?>" /></label>
        <label>Titre professionnel: <input id="" type="text" name="professional_title" value="<?php echo $professional_title; ?>" /></label>
      </div>
      <div>
        <label>Nom: <input id="" type="text" name="last_name" value="<?php echo $last_name; ?>" /></label>
      </div>

    </div>

    <div class="white_space">
    </div>

    <div class="company_info">
    <!-- <label>Domaine professionnel: <input id="" type="text" name="pro_field" value="<?php echo $pro_field; ?>" /></label><br> -->
      <label>Nom de votre entreprise: <input class="input_ent"  id="" type="text" name="company_name" value="<?php echo $company_name; ?>" /></label>
      <label>Description de votre entreprise: <textarea id="" type="text-area" name="description" value="<?php echo $description; ?>" /></textarea>
      <label>Site internet: <input class="input_ent" id="" type="email" name="email" value="<?php echo $email; ?>" /></label>
      <label>Link photo: <input class="input_ent" id="" type="text" name="photo_link" value="<?php echo $photo_link; ?>" /></label>
      <label>Intêret: <textarea class="interest" id="" type="text-area" name="interest" value="<?php echo $interest; ?>" /></textarea>
      <label for="url_pdf">
        <input class="btn_telechargement" id="upload_pdf_button" class="button-secondary" type="button" value="Télécharger une image ou logo" />
        <input id="url_pdf" style="width: 650px;" type="text" name="url_pdf" value="<?php echo esc_url( $url_pdf ); ?>" />
      </label>
    </div>
    <div class="adress">
      <h2>Adresse: </h2>
      <div class="adress_info">
        <div>
          <label>No: <input id="" type="text" name="adress_number" value="<?php echo $adress_number; ?>" /></label>
          <label>Code postal: <input id="" type="text" name="adress_post_code" value="<?php echo $adress_post_code; ?>" /></label>
           <label>Pays: <input id="" type="text" name="adress_country" value="<?php echo $adress_country; ?>" /></label>
        </div>
        <div>
          <label>Rue: <input id="" type="text" name="adress_street" value="<?php echo $adress_street; ?>" /></label>
          <label>Ville: <input id="" type="text" name="adress_city" value="<?php echo $adress_city; ?>" /></label>
          <label>No. de téléphone: <input id="" type="text" name="phone_number" value="<?php echo $phone_number; ?>" /></label>
        </div>
      </div>
    </div>

    <div class="white_space">
    </div>

    <div class="admin_info">
      <label>Date de suscription: <input id="" type="date" name="subscription_date" value="<?php echo $subscription_date; ?>" /></label>
      <label>Fin de droits: <input class="input_fd" id="" type="date" name="end_of_rights" value="<?php echo $end_of_rights; ?>" /></label>
      <label>Active:
          <select name="status_active" id="">
            <option <?php if ($status_active == "true" ) echo 'selected' ; ?> value="true">Oui</option>
            <option <?php if ($status_active == "false" ) echo 'selected' ; ?> value="false">Non</option>
          </select>
       </label>
    </div>

  </div>
  <?php 
}

/*Meta box: save metas*/

add_action('save_post','save_metabox');
function save_metabox($post_id){

  if(isset($_POST['first_name'])){
    update_post_meta($post_id, '_first_name', sanitize_text_field($_POST['first_name']));
  }
  if(isset($_POST['last_name'])){
    update_post_meta($post_id, '_last_name', sanitize_text_field($_POST['last_name']));
  }
  if(isset($_POST['professional_title'])){
    update_post_meta($post_id, '_professional_title', sanitize_text_field($_POST['professional_title']));
  }
  if(isset($_POST['pro_field'])){
    update_post_meta($post_id, '_pro_field', sanitize_text_field($_POST['pro_field']));
  }
  if(isset($_POST['company_name'])){
    update_post_meta($post_id, '_company_name', sanitize_text_field($_POST['company_name']));
  }
  if(isset($_POST['description'])){
    update_post_meta($post_id, '_description', sanitize_text_field($_POST['description']));
  }
  if(isset($_POST['adress_number'])){
    update_post_meta($post_id, '_adress_number', esc_html($_POST['adress_number']));
  }
  if(isset($_POST['adress_street'])){
    update_post_meta($post_id, '_adress_street', sanitize_text_field($_POST['adress_street']));
  }
   if(isset($_POST['adress_post_code'])){
    update_post_meta($post_id, '_adress_post_code', esc_html($_POST['adress_post_code']));
  }
  if(isset($_POST['adress_city'])){
    update_post_meta($post_id, '_adress_city', sanitize_text_field($_POST['adress_city']));
  }
  if(isset($_POST['adress_country'])){
    update_post_meta($post_id, '_adress_country', sanitize_text_field($_POST['adress_country']));
  }
  if(isset($_POST['phone_number'])){
    update_post_meta($post_id, '_phone_number', esc_html($_POST['phone_number']));
  }
  if(isset($_POST['email'])){
    update_post_meta($post_id, '_email', is_email($_POST['email']));
  }
  if(isset($_POST['status'])){
    update_post_meta($post_id, '_status', sanitize_text_field($_POST['status']));
  }
  if(isset($_POST['subscription_date'])){
    update_post_meta($post_id, '_subscription_date', sanitize_text_field($_POST['subscription_date']));
  }
  if(isset($_POST['end_of_rights'])){
    update_post_meta($post_id, '_end_of_rights', sanitize_text_field($_POST['end_of_rights']));
  }
   if(isset($_POST['status_active'])){
    update_post_meta($post_id, '_status_active', sanitize_text_field($_POST['status_active']));
  }
  if(isset($_POST['photo_link'])){
    update_post_meta($post_id, '_photo_link', sanitize_text_field($_POST['photo_link']));
  }
  if(isset($_POST['interest'])){
    update_post_meta($post_id, '_interest', sanitize_text_field($_POST['interest']));
  }
  if ( isset( $_POST[ 'url_pdf' ])){
    update_post_meta($post_id, '_url_pdf', esc_url_raw($_POST['url_pdf']));
  }
}

// /*Get the template*/

add_filter('template_include', 'include_template_function');
function include_template_function( $template_path ) {
    if ( get_post_type() == 'annuary' ) {
    	// checks if the file exists in the theme first,
        // otherwise serve the file from the plugin
        if ( $theme_file = locate_template( array ( 'archive-annuary.php' ) ) ) {
            $template_path = $theme_file;
        } else {
            $template_path = plugin_dir_path( __FILE__ ) . '/archive-annuary.php';
        }
    }
    return $template_path;
}

// /**
//  * Proper way to enqueue scripts and styles
//  */

function wpse_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'style1', $plugin_url . 'css/style_plugin.css');
}
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );

function load_custom_wp_admin_script() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_script('my_custom_script', $plugin_url . 'js/app.js');
    wp_enqueue_style('my_custom_style', $plugin_url . 'css/style_backend.css');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_script');







