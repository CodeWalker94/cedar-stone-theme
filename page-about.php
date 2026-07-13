<?php
/**
 * About page. Custom template, picked automatically by filename (page-about.php)
 * for the Page whose slug is "about". Writes the whole page itself (ignores the editor).
 */
get_header();
?>

<main class="about">

  <section class="about-hero">
    <div class="container">
      <h1>About Cedar &amp; Stone</h1>
      <p class="about-hero__sub">A family-run landscaping company built one yard at a time.</p>
    </div>
  </section>

  <section class="about-lead">
    <div class="container about-lead__inner reveal">
      <p class="kicker">Who we are</p>
      <h2>Rooted in <span class="highlight">Cedar Rapids</span> since 2012.</h2>
      <p class="about-lead__body">Cedar &amp; Stone is a small, family-run landscaping company serving homeowners across the Cedar Rapids area. We handle everything ourselves, design, hardscaping, planting, and the year-round care that keeps a yard looking right. No subcontractors, no call centers, just the same crew from the first conversation to the last cleanup.</p>
    </div>
  </section>

  <?php /* Story section: crew photos stacked vertically on the LEFT, the company history
           timeline on the RIGHT. Photos run at their natural aspect ratio (no forced crop)
           so nobody gets cut off, and they're three different crew members. */ ?>
  <section class="about-story">
    <div class="container about-story__inner">
      <div class="about-story__photos reveal">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cedar-about (1).jpg' ); ?>" alt="A Cedar & Stone crew member with a shovel in a garden" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cedar-about (2).jpg' ); ?>" alt="A smiling Cedar & Stone crew member holding a potted plant" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cedar-about (3).jpg' ); ?>" alt="A Cedar & Stone crew member giving a thumbs up beside a new planting" loading="lazy">
      </div>
      <div class="about-story__timeline">
        <p class="kicker">Our story</p>
        <h2>How we got here</h2>
        <div class="timeline">
          <div class="timeline__item reveal">
            <span class="timeline__year">2012</span>
            <div class="timeline__body">
              <h3>One truck, one mower</h3>
              <p>Dave Voss started Cedar &amp; Stone with a handful of mowing accounts around Cedar Rapids.</p>
            </div>
          </div>
          <div class="timeline__item reveal">
            <span class="timeline__year">2015</span>
            <div class="timeline__body">
              <h3>A full crew</h3>
              <p>Mowing turned into cleanups, cleanups turned into planting and small hardscape jobs. We brought on a full-time crew to keep up.</p>
            </div>
          </div>
          <div class="timeline__item reveal">
            <span class="timeline__year">2019</span>
            <div class="timeline__body">
              <h3>Licensed for design &amp; build</h3>
              <p>We added full landscape design and hardscape construction, and got licensed and insured for the bigger jobs.</p>
            </div>
          </div>
          <div class="timeline__item reveal">
            <span class="timeline__year">Today</span>
            <div class="timeline__body">
              <h3>120+ yards and counting</h3>
              <p>Same crew, same family. Just more equipment. We're still based in Cedar Rapids and still show up ourselves.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-quote">
    <div class="container about-quote__inner reveal">
      <p class="about-quote__mark" aria-hidden="true">&ldquo;</p>
      <p class="about-quote__text">We treat every yard like it's going to be looked at for the next twenty years, because it probably will be.</p>
      <p class="about-quote__cite">Dave Voss, Owner</p>
    </div>
  </section>

  <?php get_template_part( 'template-parts/section-cta' ); ?>

</main>

<?php get_footer(); ?>
