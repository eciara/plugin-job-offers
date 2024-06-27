<?php
/**
 * File that takes care of registering the Taxonomy category for job offers
 */

class JobOffersRegisterTaxonomy {

    public function __construct() {
        add_action('init', array($this, 'register_taxonomy_job_offers'));
    }

    public function register_taxonomy_job_offers() {
        $labels = array(
            'name'              => __( 'Job categories'),
            'singular_name'     => __( 'Job category'),
        );
    
        $args = array(
            'labels'                => $labels,
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'show_in_nav_menus'     => true,
            'show_tagcloud'         => true,
            'show_in_rest'          => true,
            'rest_base'             => 'job-category',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        );
    
        register_taxonomy( 'job-category', array( 'job-offers' ), $args );
    }
}

new JobOffersRegisterTaxonomy();