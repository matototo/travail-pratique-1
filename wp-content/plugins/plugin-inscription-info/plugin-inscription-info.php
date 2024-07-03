<?php
/*
Plugin Name: Premier ravail Pratique
Description: Plugin developpé pour le premier travail pratique
Version: 1
Author: Matéo-thomas Fortin-lubin
*/

/**
 * Exit si accès direct au fichier
 */
if (!defined('ABSPATH')) {
    exit;
}

function plugin_inscription_info_definir_const()
{
    if (!defined('PLUGIN_INSCRIPTION_INFO_PARAMETRES')) {
        global $wpdb;
        define('PLUGIN_INSCRIPTION_INFO_PARAMETRES', $wpdb->prefix . 'plugin_inscription_info_parametres');
    }

    if (!defined('PLUGIN_INSCRIPTION_INFO_INSCRIPTIONS')) {
        global $wpdb;
        define('PLUGIN_INSCRIPTION_INFO_INSCRIPTIONS', $wpdb->prefix . 'plugin_inscription_info_inscriptions');
    }
}
add_action('plugins_loaded', 'plugin_inscription_info_definir_const', 0);

/**
 * TODO:
 * Supprime la table plugin_inscription_info après la désactivation du plugin
 * on utilis cette fonction EXCLUSIVEMENT en environnement de developpement
 * il faut TOUJOURS supprimer/commentre cette fonction avant la remise ou publication en ligne
 */
function plugin_inscription_info_deactivation()
{
    global $wpdb;
    $table_parametres = $wpdb->prefix . 'plugin-inscription-info_parametres';
    $wpdb->query("DROP TABLE IF EXISTS $table_parametres");

    $table_inscriptions = $wpdb->prefix . 'plugin-inscription-info_inscriptions';
    $wpdb->query("DROP TABLE IF EXISTS $table_inscriptions");
}
register_deactivation_hook(__FILE__, 'plugin-inscription-info_deactivation');
