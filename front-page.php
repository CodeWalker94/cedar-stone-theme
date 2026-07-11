<?php get_header(); ?>

<main class="front-page">

  <?php get_template_part( 'template-parts/section-hero' ); ?>

  <?php /* Editorial feature split (Flores/HeartLand pattern). The services CARD GRID
           (grid-services + card-service.php) now debuts on archive-service.php in the
           CPT phase instead of the homepage. */ ?>
  <section class="section feature">
    <div class="container feature__inner">
      <div class="feature__media">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/erikawittlieb-house-2414374_1920.jpg' ); ?>"
          alt="A landscaped front yard with manicured beds outside a family home"
          loading="lazy"
        >
      </div>
      <div class="feature__body">
        <p class="kicker">Locally owned since 2012</p>
        <h2>A family-run landscaping company in <span class="highlight">Cedar Rapids.</span></h2>
        <p>Cedar &amp; Stone opened in 2012 as a locally owned, family-run business. We handle landscape design, patios and stonework, planting, and seasonal care for homeowners across the Cedar Rapids area.</p>
        <p>The same people who plan your yard are the ones who build it. We show up when we say we will, we do the work ourselves, and we treat your property like it's our own. Licensed and fully insured.</p>
        <div class="feature__buttons">
          <a class="btn btn--accent" href="/services/">See what we do</a>
          <a class="section__link" href="/about/">About our family <span aria-hidden="true">&rarr;</span></a>
        </div>
      </div>
    </div>
  </section>

  <?php /* Service-area statement (small-company staple): plainly say WHAT we do
           and WHERE. Doubles as local SEO. Real town names build trust. */ ?>
  <section class="statement band--lawn">
    <div class="container statement__inner">
      <p class="kicker">Serving the Cedar Rapids area</p>
      <p class="statement__lead">Landscape design, patios, planting, and year-round yard care for homeowners across <span class="highlight--gold">Eastern Iowa</span>.</p>
      <p class="statement__areas">Cedar Rapids &middot; Marion &middot; Hiawatha &middot; Robins &middot; Fairfax &middot; Ely &middot; and surrounding towns</p>
    </div>
  </section>

  

  <section class="section">
    <div class="container">
      <div class="section__head">
        <h2>Our work</h2>
        <a class="section__link" href="/our-work/">View full portfolio <span aria-hidden="true">&rarr;</span></a>
      </div>
      <div class="grid-work">
        <?php
        /* TODO(user): replace with a WP_Query loop over the 'project' CPT (6 most recent). */
        get_template_part( 'template-parts/card-project', null, array( 'title' => 'Backyard Paver Patio', 'img' => 'todfrank-backyard-1715876_1920.jpg' ) );
        get_template_part( 'template-parts/card-project', null, array( 'title' => 'Front Yard Redesign', 'img' => 'erikawittlieb-house-2417321_1920.jpg' ) );
        get_template_part( 'template-parts/card-project', null, array( 'title' => 'Stone Retaining Wall', 'img' => 'qy-liu-184tM0HpxPA-unsplash.jpg' ) );
        get_template_part( 'template-parts/card-project', null, array( 'title' => 'Garden Path & Beds', 'img' => 'aniston-grace-L3hyEbDk194-unsplash.jpg' ) );
        get_template_part( 'template-parts/card-project', null, array( 'title' => 'Outdoor Living Space', 'img' => '1139623-backyard-2549830_1920.jpg' ) );
        get_template_part( 'template-parts/card-project', null, array( 'title' => 'Seasonal Cleanup', 'img' => 'paul-arky-BoVg3wUOJ_g-unsplash.jpg' ) );
        ?>
      </div>
    </div>
  </section>


  <?php /* Why section: staggered card mosaic (Highlands). Reasons AND photos as
           cards on an intentionally uneven 3-column grid, middle column offset down,
           mixed card heights. Photos woven in so visuals help make the case. */ ?>
  <section class="section why">
    <div class="container">
      <div class="section__head">
        <div>
          <p class="kicker">Why Cedar &amp; Stone</p>
          <h2>Reasons homeowners keep calling us back.</h2>
        </div>
      </div>
      <div class="why__cols">

        <div class="why__col">
          <article class="why-card why-card--photo">
            <div class="why-card__img why-card__img--tall">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/michelle-maria-steps-3747068_1920.jpg' ); ?>"
                alt="Brick garden steps bordered by flowering plants"
                loading="lazy"
              >
            </div>
          </article>
          <article class="why-card">
            <h3>Family-owned &amp; local</h3>
            <p>One crew, one owner, start to finish. You'll know exactly who's in your yard.</p>
          </article>
        </div>

        <div class="why__col why__col--offset">
          <article class="why-card">
            <h3>Licensed &amp; fully insured</h3>
            <p>Coverage on every job, big or small. No risk to your property.</p>
          </article>
          <article class="why-card">
            <h3>We design and build in-house</h3>
            <p>The people who plan your yard are the ones who build it. No handoffs.</p>
          </article>
          <article class="why-card">
            <h3>Free, honest estimates</h3>
            <p>Real numbers up front. No pressure and no surprises on the invoice.</p>
          </article>
        </div>

        <div class="why__col">
          <article class="why-card">
            <h3>Year-round care</h3>
            <p>From spring planting to winter prep, we keep your yard right in every season.</p>
          </article>
          <article class="why-card">
            <h3>We stand behind our work</h3>
            <p>If it settles, shifts, or fails, we come back and make it right.</p>
          </article>
          <article class="why-card why-card--photo">
            <div class="why-card__img why-card__img--short">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/tanya-barrow-omsriVMVd_A-unsplash.jpg' ); ?>"
                alt="Stone wall with a built-in outdoor seating and grill area"
                loading="lazy"
              >
            </div>
          </article>
        </div>

      </div>
    </div>
  </section>

  <?php /* Numbers land AFTER the claims (why-us) and BEFORE the quotes:
           claims → proof → testimony, escalating trust. */ ?>
  <section class="stats">
    <div class="container stats__grid">
      <?php /* TODO(user): numbers animate via cookbook #8 in the JS phase */ ?>
      <div class="stat"><span class="stat__number" data-target="120">120+</span><span class="stat__label">Projects completed</span></div>
      <div class="stat"><span class="stat__number" data-target="12">12</span><span class="stat__label">Years in business</span></div>
      <div class="stat"><span class="stat__number">5.0</span><span class="stat__label">Google rating</span></div>
      <div class="stat"><span class="stat__number" data-target="98">98%</span><span class="stat__label">Repeat &amp; referral</span></div>
    </div>
  </section>

  <section class="testimonials">
    <div class="container">
      <div class="section__head">
        <h2>What homeowners say</h2>
      </div>
      <div class="testimonials__row">
        <?php
        /* TODO(user): feed from ACF later. Swipeable row via CSS scroll-snap, no JS. */
        get_template_part( 'template-parts/card-testimonial', null, array( 'quote' => 'They transformed our backyard completely. Professional, on time, and better than we imagined.', 'name' => 'Sarah M.', 'town' => 'Cedar Rapids, IA' ) );
        get_template_part( 'template-parts/card-testimonial', null, array( 'quote' => 'The patio is the best money we have put into this house. Crew was respectful and fast.', 'name' => 'Dan & Alicia R.', 'town' => 'Marion, IA' ) );
        get_template_part( 'template-parts/card-testimonial', null, array( 'quote' => 'Third season using them for maintenance. Yard has never looked better.', 'name' => 'Paul T.', 'town' => 'Hiawatha, IA' ) );
        ?>
      </div>
    </div>
  </section>

  <?php get_template_part( 'template-parts/section-cta' ); ?>

</main>

<?php get_footer(); ?>
