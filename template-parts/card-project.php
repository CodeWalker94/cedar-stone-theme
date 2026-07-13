<?php
/**
 * Project card for the Our Work grid, hover overlay + title slide (cookbook #9).
 * Props via $args: 'title', and optionally 'img' (a filename in assets/images/).
 * TODO(user): in the Projects CPT phase, href becomes the_permalink(), the img
 * becomes the_post_thumbnail( 'large' ), title becomes the_title().
 */
$title = $args['title'] ?? 'Project Title';
$img   = $args['img'] ?? '';
?>
<a href="/our-work/" class="gallery-card">
  <div class="gallery-card__media reveal">
    <?php if ( $img ) : ?>
      <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $img ); ?>"
        alt="<?php echo esc_attr( $title ); ?>"
        loading="lazy"
      >
    <?php endif; ?>
  </div>
  <div class="gallery-card__overlay">
    <span class="gallery-card__title"><?php echo esc_html( $title ); ?></span>
  </div>
</a>
