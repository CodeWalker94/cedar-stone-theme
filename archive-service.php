<?php get_header(); ?>

<main class="archive-service">

  <section class="svc-hero">
    <h1>Our Services</h1>
  </section>

  <section class="svc-lead">
    <div class="container svc-lead__inner reveal">
      <h2>Everything your yard needs, from <span class="highlight">one local crew</span>.</h2>
      <p class="svc-lead__body">We keep it to the work we can do right: full landscape design, patios and stonework, planting, and year-round upkeep. No handoffs to subcontractors, and no padding the list with services we don't actually staff for. Here's each one, up close.</p>
    </div>
  </section>

  <div class="container">
    <div class="svc-rows">
      <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          get_template_part( 'template-parts/row-service' );
        }
      }
      ?>
    </div>
  </div>

  <section class="visit">
    <div class="container visit__inner reveal">
      <div class="visit__text">
        <h2>Let's start with a walk of your yard.</h2>
        <p>Tell us what you're picturing and we'll come take a look. No cost, no pressure, just an honest estimate.</p>
      </div>
      <div class="visit__action">
        <a class="btn btn--accent" href="/contact/">Request a site visit</a>
        <a class="visit__phone" href="tel:+15555551234">or call (555) 555-1234</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
