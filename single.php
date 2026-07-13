<?php
/**
 * Single post (a News article). WordPress uses single.php to show one post.
 * Long-form editorial layout: centered title/date, a wide featured image, then a
 * narrow readable text column.
 */
get_header();
?>

<main class="article">
  <?php while ( have_posts() ) : the_post(); ?>
    <article>

      <header class="article-hero">
        <div class="container">
          <p class="article-hero__date"><?php echo esc_html( get_the_date() ); ?></p>
          <h1><?php the_title(); ?></h1>
        </div>
      </header>

      <?php if ( has_post_thumbnail() ) : ?>
        <figure class="article-figure container">
          <?php the_post_thumbnail( 'large' ); ?>
        </figure>
      <?php endif; ?>

      <div class="container">
        <div class="article-body reveal">
          <?php the_content(); ?>
        </div>
        <p class="article-back"><a href="/news/"><span aria-hidden="true">&larr;</span> Back to News</a></p>
      </div>

    </article>
  <?php endwhile; ?>

  <?php get_template_part( 'template-parts/section-cta' ); ?>
</main>

<?php get_footer(); ?>
