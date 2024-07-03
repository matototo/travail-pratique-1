<?php
/*
Plugin Name: Mon Premier Plugin
Description: Mon premier plugin
Version: 1.1
Author: Matéo-thomas Fortin-lubin
*/

/**
 * Exit si accès direct au fichier 
 */

if (!defined('ABSPATH')) {
    exit;
}


/**
 * Definis la constante MPP_TABLE_NAME qui va etre utilise dans d'autres fonctions
 */
function mpp_definir_const()
{
    if (!defined('MPP_PARAMETRES')) {
        global $wpdb;
        define('MPP_PARAMETRES', $wpdb->prefix . 'mpp_parametres');
    }

    if (!defined('MPP_INSCRIPTIONS')) {
        global $wpdb;
        define('MPP_INSCRIPTIONS', $wpdb->prefix . 'mpp_inscriptions');
    }
}
add_action('plugins_loaded', 'mpp_definir_const', 0);

/**
 * Ajoute la table wp_mon_premier_plugin à la db suite à l'activation du plugin
 */
/*
function mpp_activation() {   
    global $wpdb;

    //comme cest un nom de table ca prends absolument les underscore pour 'mon_premier_plugin'
    $table_name = $wpdb->prefix . 'mon_premier_plugin';
    $charset_collate = $wpdb->get_charset_collate();

        if  ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name ) {
            $sql = "CREATE TABLE $table_name (
                id int NOT NULL AUTO_INCREMENT,
                nom varchar(50)  NOT NULL,
                PRIMARY KEY (id)
            ) $charset_collate";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );

        }
    }
*/
require_once(plugin_dir_path(__FILE__) . '/includes/mpp-activation.php');
register_activation_hook(__FILE__, 'mpp_activation');


/**
 * Ajoute un pop-up au chargement de la page
 */
function mpp_ajouter_styles_et_scripts()
{
    wp_register_style('mpp-style', plugins_url('assets/styles/styles.css', __FILE__));
    wp_enqueue_style('mpp-style');
    wp_register_script('mpp-script', plugins_url('assets/scripts/main.js', __FILE__));
    wp_enqueue_script('mpp-script');
}
//add_action( 'init', 'mpp_ajouter_styles_et_scripts' );
add_action('wp_enqueue_scripts', 'mpp_ajouter_styles_et_scripts');
//add_action( 'admin_enqueue_scripts', 'mpp_ajouter_styles_et_scripts' );


/*
function mpp_change_wordpress( $content ) {
    return str_replace( 'wordpress', 'WordPress', $content );
    }
add_filter( 'the_content', 'mpp_change_wordpress' );
*/


/**
 * Supprime la table wp_mon_premier_plugin après desactivation du plugin
 * on utilise cette fonction EXCULSIVEMENT en environnement de developpement
 * il faut TOUJOURS supprimer/commenter cette fonction avant remise ou publication en ligne !!!
 */

function mpp_deactivation()
{
    global $wpdb;
    $table_parametres = $wpdb->prefix . 'mpp_parametres';
    $wpdb->query("DROP TABLE IF EXISTS $table_parametres");

    $table_inscriptions = $wpdb->prefix . 'mpp_inscriptions';
    $wpdb->query("DROP TABLE IF EXISTS $table_inscriptions");
}
register_deactivation_hook(__FILE__, 'mpp_deactivation');


/**
 * Charge les comportements du panneau admin
 */
require_once(plugin_dir_path(__FILE__) . 'includes/mpp-panneau-admin.php');

/**
 * Charge els comportemenbts côté client
 */
require_once(plugin_dir_path(__FILE__) . 'includes/mpp-modal-client.php');

/**
 * Formalise les données du formulaire et ensuite insere dans la BD la nouvelle information
 */
/*
function mpp_ajouter_data()
{
    global $wpdb;

    $mpp_nom = sanitize_text_field($_POST['nom']);
    $wpdb->insert(
        MPP_PARAMETRES,
        array(
            'nom' => $mpp_nom
        ),
        array(
            '%s'  // $format (optionnel) => string     
        )
    );
}



function mpp_afficher_data()
{
    global $wpdb;   // Récupère les valeurs de la table wp_mon_premier_plugin      
    $resultats = $wpdb->get_results("SELECT * FROM " . MPP_PARAMETRES);      // S'il y a des résultats      
    if ($resultats) {
        echo   '<div style="padding:0 5vw;">
                    <h2>Entrée(s)</h2>
                    <ul>';
        foreach ($resultats as  $data) {
            echo   '<li><small>Nom : </small>' . esc_html($data->nom) . '</li>';
        }
        echo   '  </ul> </div>';
    }
}
*/