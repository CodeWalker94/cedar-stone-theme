<?php
/**
 * Service row: one full-width image/text block, rendered once per post by the
 * loop in archive-service.php. CSS alternates image/text sides via nth-child.
 */
?>
<article class="svc-row reveal">
  <div class="svc-row__media">
    <div class="svc-row__photo">
      <?php the_post_thumbnail( 'large' ); ?>
    </div>
  </div>
  <div class="svc-row__content">
    <h2 class="svc-row__title"><?php the_title(); ?></h2>
    <div class="svc-row__text"><?php the_content(); ?></div>
    <div class="svc-row__actions">
      <a class="btn btn--accent" href="/contact/">Get a quote</a>
      <a class="btn btn--outline" href="<?php the_permalink(); ?>">Learn more</a>
    </div>
  </div>
</article>
