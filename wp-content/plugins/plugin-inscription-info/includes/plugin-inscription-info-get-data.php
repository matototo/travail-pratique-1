<?php

/**
 * Retourne toutes les valeurs dans la table PLUGIN_INSCRIPTION_INFO_PARAMETRES
 */

function plugin_inscription_info_get_data()
{
    global $wpdb;

    $resultat = $wpdb->get_var("SELECT * FROM " . PLUGIN_INSCRIPTION_INFO_PARAMETRES . "WHERE id=1");

    return $resultat;
}
