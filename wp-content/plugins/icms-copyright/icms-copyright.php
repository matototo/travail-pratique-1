<?php
/*
Plugin Name: Introduction au CMS - Copyright
Description: Ajoute un copyright en bas de page
Version: 1
Author: Simon C-Bouchard
*/


/**
 * Exit si accès direct au fichier 
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Charge le fichier CSS
 */
function icms_copyright_styles() {
    $template = get_option( 'template' );
    if ( $template == 'twentytwentyone' ) {
        $styleFilePath = 'styles/icms-twentytwentyone-styles.css';
    } else {
        $styleFilePath = 'styles/icms-styles.css';
    }

    wp_register_style( 'icms-styles', plugins_url( $styleFilePath, __FILE__  ) );
    wp_enqueue_style( 'icms-styles' );
}
add_action( 'wp_enqueue_scripts', 'icms_copyright_styles' );


/**
 * Charge le fichier template
 */
function icms_copyright_template() {
    ob_start();
    include(  plugin_dir_path( __FILE__ ) . 'templates/copyright.php' );
    $output = ob_get_clean();
    echo $output;
}
add_action( 'wp_footer', 'icms_copyright_template' ); 