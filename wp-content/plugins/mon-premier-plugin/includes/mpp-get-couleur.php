<?php

/**
 * Retourne la valeur de la couleur_bg dans la table MPP_PARAMETRES
 */
function mpp_get_couleur()
{
    global $wpdb;

    $resultat = $wpdb->get_var("SELECT couleur_bg FROM " . MPP_PARAMETRES . " WHERE id=1");
    return $resultat;
}
