<?php


// Si uninstall.php n'est pas appelé par WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$table_name = $wpdb->prefix . 'mon_premier_plugin';
$wpdb->query("DROP TABLE IF EXISTS $table_name");

$table_inscriptions = $wpdb->prefix . 'mpp_inscriptions';
$wpdb->query("DROP TABLE IF EXISTS $table_inscriptions");
