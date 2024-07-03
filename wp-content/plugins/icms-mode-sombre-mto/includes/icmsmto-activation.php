<?php

// Ajoute une table dans la bd wp
function icmsmto_activation()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    // On utilise toujours des underscore pour les tables
    // Création d'une nouvelle table dans la base de données du site avec une requête SQL
    $table_parametres = $wpdb->prefix . 'icmsmto_parametres';

    // Condition pour ne pas écraser des tables paramètres existantes lors de l'activation
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_parametres'") != $table_parametres) {

        // Requête SQL
        $sql = "CREATE TABLE $table_parametres (
                    id int NOT NULL AUTO_INCREMENT,
                    mode varchar(50) NOT NULL,
                    PRIMARY KEY (id)
                ) $charset_collate";

        // On lance la requête SQL ici ?
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $wpdb->insert($table_parametres, array('mode' => 'sombre-fonce'));
    }
}
