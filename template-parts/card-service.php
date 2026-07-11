<?php
/**
 * Service card, ONE component reused everywhere services render.
 * Receives data via get_template_part's $args (think: component props).
 * TODO(user): in the CPT phase, the static fallbacks below get replaced by
 * the_title(), the_post_thumbnail(), and ACF get_field() inside the loop.
 */
$title = $args['title'] ?? 'Service Title';
$text  = $args['text'] ?? 'One line describing this service and its value.';
?>
<article class="card-service">
  <div class="card-service__media">
    <?php /* TODO(user): the_post_thumbnail( 'medium_large' ) goes here */ ?>
  </div>
  <div class="card-service__body">
    <h3 class="card-service__title"><?php echo esc_html( $title ); ?></h3>
    <p class="card-service__text"><?php echo esc_html( $text ); ?></p>
    <a class="card-service__link" href="/services/">Learn more <span aria-hidden="true">&rarr;</span></a>
  </div>
</article>
