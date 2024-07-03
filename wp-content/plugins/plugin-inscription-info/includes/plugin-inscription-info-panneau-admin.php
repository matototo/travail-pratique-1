<?php
// FIXME: UN NOM PLUS SEMANTIQUE POUR TON PLUGIN

// TODO: fonction plugin_inscription_info_affiche_data(); affiche la valeur conservée dans la base de données directement à l’intérieur de chaque champ via leur attribut value.
function plugin_inscription_info_ajouter_menu()
{
    add_menu_page(
        'Premier ravail Pratique',
        'Premier ravail Pratique',
        'manage_options',
        'plugin-inscription-info-menu-page',
        'plugin-inscription-info_ajouter_formulaire'
    );
}
add_action('admin_menu', 'plugin-inscription-info_ajouter_menu');

function plugin_inscription_info_ajouter_formulaire()
{
    if (isset($_POST['plugin-inscription-info-couleur-bg'])) {
        // on appelle la db ?
        plugin_inscription_info_update_data();
    }

    // on va chercher les data
    // require_once('plugin-inscription-info-get-data.php');
    // $plugin-inscription-info_data = plugin-inscription-info_get_data;
}

function plugin_inscription_info_update_data()
{
}
