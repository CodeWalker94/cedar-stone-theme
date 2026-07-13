<?php
/**
 * Testimonial card. TODO(user): later feed from ACF (options page or CPT).
 */
$quote = $args['quote'] ?? 'They transformed our backyard completely. Professional, on time, and the result is better than we imagined.';
$name  = $args['name'] ?? 'Happy Customer';
$town  = $args['town'] ?? 'Cedar Rapids, IA';
?>
<figure class="card-testimonial">
  <div class="card-testimonial__stars reveal" aria-label="5 out of 5 stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
  <blockquote class="card-testimonial__quote"><?php echo esc_html( $quote ); ?></blockquote>
  <figcaption class="card-testimonial__meta">
    <strong><?php echo esc_html( $name ); ?></strong> &middot; <?php echo esc_html( $town ); ?> &middot; via Google
  </figcaption>
</figure>
