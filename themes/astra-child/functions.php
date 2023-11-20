<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );


// hook
function ajouter_lien_admin_menu_astra( $items, $args ) {

    // Vérifie si l'utilisateur est connecté 

    if ( is_user_logged_in() && $args->theme_location == "primary" || $args->theme_location == "off_canvas") {

        // Balises <li> pour "Admin"

        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="' . admin_url() . '">Admin</a></li>';
    }
    return $items;
}

add_filter( 'wp_nav_menu_items', 'ajouter_lien_admin_menu_astra', 20, 2 );

add_filter( 'astra_get_mobile_menu_items', 'ajouter_lien_admin_menu_astra', 20, 2 );







