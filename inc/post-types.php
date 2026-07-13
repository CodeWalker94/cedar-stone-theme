<?php

function cedarstone_register_post_types() {
  register_post_type('service', array(
    'labels' => array(
      'name' => 'Services',
      'singular_name' => 'Service'
    ),
    'public' => true,
    'has_archive' => 'services',
    'supports' => array('title', 'editor', 'thumbnail'),
  ));
} 
add_action('init', 'cedarstone_register_post_types');