<?php

/**
 * Plugin Name: Job Offers Custom Block
 * Description: Creates a custom block to display a list of jobs.
 */

// Importing functions from files
require_once plugin_dir_path( __FILE__ ) . 'includes/register-block.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/register-post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/register-taxonomy.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/block-render-callback.php';

// Import style from dist/style.css
function job_offers_custom_block_enqueue_styles() {
    wp_enqueue_style( 'job-offers-custom-block-styles', plugin_dir_url( __FILE__ ) . 'dist/style.css' );
    wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap', false );
}
add_action( 'enqueue_block_assets', 'job_offers_custom_block_enqueue_styles' );