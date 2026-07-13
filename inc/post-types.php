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
    register_post_type('project', array(
    'labels'      => array('name' => 'Projects', 'singular_name' => 'Project'),
    'public'      => true,
    'has_archive' => 'our-work',   // matches the /our-work/ nav link
    'supports'    => array('title', 'editor', 'thumbnail'),
  ));

  register_taxonomy('project_category', 'project', array(
    'labels'            => array('name' => 'Project Categories', 'singular_name' => 'Project Category'),
    'public'            => true,
    'hierarchical'      => true,   // category-style checkboxes, not free-text tags
    'show_admin_column' => true,   // shows the category column in the Projects list
  ));

} 
add_action('init', 'cedarstone_register_post_types');

/**
 * Our Work archive query. Two changes just for the /our-work/ listing:
 *  - posts_per_page => -1 : render ALL projects, because the gallery pages
 *    through them client-side via "Load more" (default is ~10, which starves it).
 *  - orderby => rand : mix the categories instead of newest-first (which grouped
 *    all the design projects at the front).
 */
function cedarstone_project_archive_query( $query ) {
  if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'project' ) ) {
    $query->set( 'posts_per_page', -1 );
    $query->set( 'orderby', 'rand' );
  }
}
add_action( 'pre_get_posts', 'cedarstone_project_archive_query' );