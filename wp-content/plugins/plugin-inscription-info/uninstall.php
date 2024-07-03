<?php

// Si uninstall.php n'est pas appelé par WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$table_name = $wpdb->prefix . 'plugin_inscription_info';
$wpdb->query("DROP TABLE IF EXISTS $table_name");

$table_parametres = $wpdb->prefix . 'plugin_inscription_info_parametres';
$wpdb->query("DROP TABLE IF EXISTS $table_inscriptions");

$table_inscriptions = $wpdb->prefix . 'plugin_inscription_info_inscriptions';
$wpdb->query("DROP TABLE IF EXISTS $table_inscriptions");
