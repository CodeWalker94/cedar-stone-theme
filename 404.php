<?php get_header(); ?>

<main class="section">
  <div class="container page-404">
    <h1>Looks like this page got landscaped away.</h1>
    <p>The page you're after doesn't exist or moved. Let's get you back on the path.</p>
    <a class="btn btn--accent" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a>
  </div>
</main>

<?php get_footer(); ?>
