<?php
/**
 * One project tile in the Our Work masonry grid.
 * Reads image filenames from post meta ('project_images') and builds URLs from
 * the theme's assets folder. images[0] is the tile; the full set (as URLs) is
 * stamped on data-images for the lightbox.
 */

// The filenames the seeder stored (an array). First one = the tile image.
$tile_files = get_post_meta( get_the_ID(), 'project_images', true );
if ( empty( $tile_files ) ) {
  return; // no images? render nothing.
}

// Turn each filename into a full asset URL.
$assets_base = get_template_directory_uri() . '/assets/images/';
$tile_urls   = array();
foreach ( $tile_files as $file ) {
  $tile_urls[] = $assets_base . $file;
}
$tile_main = $tile_urls[0]; // the tile shows the first image

// Category (first term) for the filter attribute + the caption label.
$tile_terms    = get_the_terms( get_the_ID(), 'project_category' );
$tile_cat_slug = ( $tile_terms && ! is_wp_error( $tile_terms ) ) ? $tile_terms[0]->slug : '';
$tile_cat_name = ( $tile_terms && ! is_wp_error( $tile_terms ) ) ? $tile_terms[0]->name : '';
?>
<figure class="work-tile reveal reveal--zoom" data-category="<?php echo esc_attr( $tile_cat_slug ); ?>">
  <button
    class="work-tile__btn"
    type="button"
    data-images="<?php echo esc_attr( wp_json_encode( $tile_urls ) ); ?>"
    data-title="<?php echo esc_attr( get_the_title() ); ?>"
    data-description="<?php echo esc_attr( wp_strip_all_tags( get_the_content() ) ); ?>"
  >
    <img class="work-tile__img" src="<?php echo esc_url( $tile_main ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy">
  </button>
  <figcaption class="work-tile__caption">
    <span class="work-tile__title"><?php the_title(); ?></span>
    <?php if ( $tile_cat_name ) : ?>
      <span class="work-tile__cat"><?php echo esc_html( $tile_cat_name ); ?></span>
    <?php endif; ?>
  </figcaption>
</figure>
