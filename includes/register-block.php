<?php
/**
 * A file that deals with the registration of ACF job blocks.
 */

class JobOffersBlocksRegister {

    public function __construct() {
        add_action('acf/init', array($this, 'register_blocks'));
    }

    public function register_blocks() {
        if (function_exists('acf_register_block')) {
            acf_register_block(array(
                'name'              => 'job-offers',
                'title'             => __('Job offers'),
                'description'       => __('A custom job offers block.'),
                'render_callback'   => array(new JobOffersBlocksRender(), 'renderCallback'),
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('oferty pracy', 'quote'),
            ));
        }
    }
}

new JobOffersBlocksRegister();