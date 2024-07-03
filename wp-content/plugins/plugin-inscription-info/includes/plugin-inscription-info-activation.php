<?php

// Ajoute une table dans la bd wp
function plugin_inscription_info_activation()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    // table pour les parametres
    $table_parametres = $wpdb->prefix . 'plugin_inscription_info_parametres';

    // TODO: Cheker le type pour la data des bouttons Suivant et Soumettre
    if ($wpdb->get_var("SHOW TABLES IKE '$table_parametres'") != $table_parametres) {
        $sql = "CREATE TABLE $table_parametres (
                id int NOT NULL AUTO_INCREMENT,
                couleur_bg varchar(10) NOT NULL,
                couleur_txt_icones varchar(10) NOT NULL,
                titre varchar(10) NOT NULL
                nom_usr varchar(20) NOT NULL,
                email varchar(20) NOT NULL,
                boutton_suivant varchar(10) NOT NULL,
                boutton_soumettre varchar(10) NOT NULL,
                PRIMARY KEY(id)
            ) $charset_collate";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        /* TODO: multiple inserts ? 
            'couleur_txt_icones' => '#000000' 
            'titre' => 'Inscrivez-vous à notre infolettre !'
            'nom_usr' => 'Nom'
            'email' => 'Courriel'
            'boutton_suivant' => 'Suivant'
            'boutton_soumettre' => 'Soumettre'
        */
        $wpdb->insert($table_parametres, array('couleur_bg' => '#ffffff', 'couleur_txt_icones' => '#000000',  'titre' => 'Inscrivez-vous à notre infolettre !', 'nom_usr' => 'Nom', 'email' => 'Courriel', 'boutton_suivant' => 'Suivant', 'boutton_soumettre' => 'Soumettre'));
    }

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_inscriptions'") != $table_inscriptions) {
        $sql = "CREATE TABLE $table_inscriptions (
        id int NOT NULL AUTO_INCREMENT,
        nom varchar(20) NOT NULL,
        courriel varchar(20) NOT NULL,
        PRIMARY KEY(id)
        ) $charset_collate";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        // $wpdb insert pour $table_inscriptions
    }
}
