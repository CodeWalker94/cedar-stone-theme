<?php
function cedarstone_enqueue_assets() {
    wp_enqueue_style(
        'cedarstone-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:wght@600;700&family=Inter:wght@400;500;600&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'cedarstone-style',
        get_stylesheet_uri(),
        array( 'cedarstone-fonts' ),
        wp_get_theme()->get( 'Version' )
    );
    wp_enqueue_script(
        'cedarstone-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'cedarstone_enqueue_assets' );

