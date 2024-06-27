<?php
/**
 * The file that deals with the registration of Custom Post Type Job offers
 */

class JobOffersRegisterPostType {

    public function __construct() {
        add_action('init', array($this, 'register_custom_post_job_offers'));
    }

    public function register_custom_post_job_offers() {
        $labels = array(
            'name'               => __( 'Job offers' ),
            'singular_name'      => __( 'Job offer'),
            'add_new'            => __( 'Add new offer'),
            'add_new_item'       => __( 'Add new offer'),
        );
    
        $args = array(
            'labels'             => $labels,
            'hierarchical'       => false, 
            'public'             => true,
            'has_archive'        => true,
            'menu_icon'          => 'dashicons-book',
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'show_in_rest'       => true,
            'taxonomies'         => array( 'job-category' ),
        );

        register_post_type( 'job-offers', $args );
    }
}

new JobOffersRegisterPostType();
