<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

add_action('customize_register', function ($wp_customize) {

    $wp_customize->add_setting('theme_logo');
    $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'theme_logo',
        array(
        'label' => 'Upload Logo',
        'section' => 'title_tagline',
        'settings' => 'theme_logo',
    )));

    $wp_customize->add_setting( 'logo_width' , array(
        'default' => '100',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( 'logo_width', array(
    'label' => __( 'Width of Logo (px)', '100' ),
    'section' => 'title_tagline',
    'settings' => 'logo_width',
    'type' => 'text'
    ));

    $wp_customize->add_section('contact_social_info', array(
    'title' => 'Contact & Social Media Information',
    'description' => 'Manage your contact and social media information',
    'priority' => 110,
    ));

    $wp_customize->add_setting( 'currency' , array(
        'default' => '',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( 'currency', array(
    'label' => __( 'Paste the Currency Symbol Here', '' ),
    'section' => 'title_tagline',
    'settings' => 'currency',
    'type' => 'text'
    ));
});
