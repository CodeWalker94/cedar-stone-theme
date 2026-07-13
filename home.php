<?php
/**
 * News index. WordPress uses home.php for the blog listing once a static "Posts page"
 * is set in Settings > Reading. This runs the page's MAIN Loop over published posts.
 */
get_header();
?>

<main class="news">

  <?php /* Text-forward header (no photo hero) — an editorial "section front" look,
           deliberately different from the photo heroes on the other pages. */ ?>
  <section class="news-hero">
    <div class="container">
      <p class="kicker">From the crew</p>
      <h1>News &amp; Updates</h1>
      <p class="news-hero__sub">Seasonal tips, project notes, and what we're up to around the Cedar Rapids area.</p>
    </div>
  </section>

  <div class="container">
    <?php if ( have_posts() ) : ?>
      <div class="news-grid">
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="news-card reveal">
            <a class="news-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
              <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium_large' ); } ?>
            </a>
            <div class="news-card__body">
              <p class="news-card__date"><?php echo esc_html( get_the_date() ); ?></p>
              <h2 class="news-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p class="news-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
              <a class="news-card__link" href="<?php the_permalink(); ?>">Read more <span aria-hidden="true">&rarr;</span></a>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
      <?php the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => '&larr; Newer', 'next_text' => 'Older &rarr;' ) ); ?>
    <?php else : ?>
      <p class="news-empty">No posts yet, check back soon.</p>
    <?php endif; ?>
  </div>

  <?php get_template_part( 'template-parts/section-cta' ); ?>

</main>

<?php get_footer(); ?>
