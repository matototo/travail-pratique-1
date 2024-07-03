<?php

/**
 * Retourne la valeur dans la col mode dans la table icmsmto_PARAMETRES
 */
function icmsmto_get_mode()
{
    global $wpdb;

    $resultat = $wpdb->get_var("SELECT mode FROM " . ICMSMTO_PARAMETRES . " WHERE id=1");
    return $resultat;
}
