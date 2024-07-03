<?php
/*
Plugin Name: ICMS Mode Sombre
Description: fonctionnalité populaire mode sombre (dark mode) pour le thème Twenty Twenty-One
Version: 1
Author: Matéo-thomas Fortin-lubin
*/



/**
 * Exit si accès direct au fichier
 */
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Definis la constante icmsmto_PARAMETRES qui va etre utilisé dans d'autres fonctions
 */
function icmsmto_definir_const()
{
    if (!defined('ICMSMTO_PARAMETRES')) {
        global $wpdb;
        define('ICMSMTO_PARAMETRES', $wpdb->prefix . 'icmsmto_parametres');
    }
}
add_action('plugins_loaded', 'icmsmto_definir_const', 0);


/**
 * Charge les comportements de l'activation
 */
require_once(plugin_dir_path(__FILE__) . '/includes/icmsmto-activation.php');
register_activation_hook(__FILE__, 'icmsmto_activation');


/**
 * Supprime la table wp_icmsmto_parametres après la desactivation du plugin
 */
/*
function icmsmto_deactivation()
{
    global $wpdb;
    $table_parametres = $wpdb->prefix . 'icmsmto_parametres';
    $wpdb->query("DROP TABLE IF EXISTS $table_parametres");
}
register_deactivation_hook(__FILE__, 'icmsmto_deactivation');
*/

/**
 * Fonction ajoute styles pour lier le fichier CSS au plugin
 */
function icmsmto_ajouter_styles()
{
    wp_register_style('icmsmto-style', plugins_url('assets/styles/styles.css', __FILE__));
    wp_enqueue_style('icmsmto-style');
}
add_action('init', 'icmsmto_ajouter_styles');


/**
 * Charge les comportements du panneau admin
 */
require_once(plugin_dir_path(__FILE__) . './includes/icmsmto-panneau-admin.php');
