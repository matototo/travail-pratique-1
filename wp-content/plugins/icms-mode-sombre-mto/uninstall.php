<?php

// Si uninstall.php n'est pas appelé par WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$table_name = $wpdb->prefix . 'icmsmto_parametres';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
