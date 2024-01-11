<?php
/**
 * Menu()
 * The Menu handler class
 * 
 * @author: Ashraful Sarkar Naiem
 * @since 1.0.0
 */

namespace LicenseEnvato\Admin;

class Menu {

    /**
     * __construct()
     * Initialize the class
     * 
     * @return void
     * @since 1.0.0 
     */
    function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * admin_menu()
     * Register admin menu
     * 
     * @return void
     * @since 1.0.0 
     */
    public function admin_menu() {
        $parent_slug = 'licenseenvato';
        $capability = 'manage_options';

        add_menu_page( __( 'License Envato', 'licenseenvato' ), __( 'License Envato', 'licenseenvato' ), $capability, $parent_slug, [ $this, 'allusers' ], 'dashicons-admin-network' );

        add_submenu_page( $parent_slug, __( 'All Users', 'licenseenvato' ), __( 'All Users', 'licenseenvato' ), $capability, $parent_slug, [ $this, 'allusers' ] );

        add_submenu_page( $parent_slug, __( 'Settings', 'licenseenvato' ), __( 'Settings', 'licenseenvato' ), $capability, $parent_slug.'-settings', [ $this, 'settings' ] );
        add_submenu_page( $parent_slug, __( 'Documentation', 'licenseenvato' ), __( 'Documentation', 'licenseenvato' ), $capability, $parent_slug.'-documentation', [ $this, 'documentation' ] );

        add_action( 'admin_init', [ $this, 'enqueue_assets' ] );
    }

    /**
     * settings()
     * Handles the settings page
     * 
     * @return void
     * @since 1.0.0 
     */
    public function settings() {
        $settings = new Settings();
        $settings->plugin_page();
    }

    /**
     * documentation()
     * Handles the documentation page
     * 
     * @return void
     * @since 1.0.0 
     */
    public function documentation() {
        $documentation = new Documentation();
        $documentation->plugin_page();
    }

    /**
     * allusers()
     * Handles the All User page
     * 
     * @return void
     * @since 1.0.0 
     */
    public function allusers() {
        $user = new Allusers();
        $user->plugin_page();
    }

    /**
     * enqueue_assets()
     * Enqueue scripts and styles
     * 
     * @return void
     * @since 1.0.0 
     */
    public function enqueue_assets() {
        wp_enqueue_style( 'licenseenvato-admin-style' );
    }
}