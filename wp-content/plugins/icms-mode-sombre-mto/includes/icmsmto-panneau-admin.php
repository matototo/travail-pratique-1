<?php


/**
 * Ajoute le panneau du plugin dans l'interface admin
 */
function icmsmto_ajouter_menu()
{
    add_menu_page(
        'ICMS Mode Sombre',             // Page title
        'ICMS Mode Sombre',             // Menu title
        'manage_options',               // Capability
        'icmsmto-menu-page',          // Menu Slug
        'icmsmto_ajouter_formulaire'  // Callable function
    );
}
add_action('admin_menu', 'icmsmto_ajouter_menu');



/**
 * Ajoute un formulaire dans la page
 */
function icmsmto_ajouter_formulaire()
{
    if (isset($_POST['icms-mode-sombre'])) {
        icmsmto_update_data();    // Appel à la db
    };

    require_once('icmsmto-get-mode.php');
    $icmsmto_mode = icmsmto_get_mode();


    echo '<div class="ims-formulaire">
            <h2>' . get_admin_page_title() . '</h2>
                <form method="post">

                    <select name="icms-mode-sombre">
                        <option value="sombre-fonce">Mode sombre foncé</option>
                        <option value="sombre-leger">Mode sombre léger</option>
                        <option value="sombre-bleute">Mode sombre bleuté</option>
                        <option value="clair">Mode clair</option>
                    </select>

                    <button type="submit">Changer</button>
                </form>
            <br>
            <h2>Mode actuellement sélectionné : ' . esc_attr($icmsmto_mode) . '</h2>
        </div>';
}


/**
 * Change la valeur de la col mode dans le tableau de la db
 */
function icmsmto_update_data()
{
    global $wpdb;

    $icmsmto_mode = sanitize_text_field($_POST['icms-mode-sombre']);

    $data = ['mode' => $icmsmto_mode];
    $where = ['id' => 1];
    $wpdb->update(ICMSMTO_PARAMETRES, $data, $where);
}


// Fonction pour modifier le style coté client
/* https://wordpress.stackexchange.com/questions/350245/add-a-different-css-class-into-the-body-tag-of-different-wp-pages */
function icmsmto_body_class($classes)
{
    if (isset($_POST['icms-mode-sombre'])) {
        icmsmto_update_data();    // Appel à la db
    };

    require_once('icmsmto-get-mode.php');
    $icmsmto_mode = icmsmto_get_mode();

    $classes[] = esc_attr($icmsmto_mode);

    return $classes;
}
add_filter('body_class', 'icmsmto_body_class');

//FIXME: le css fonctionne pas !