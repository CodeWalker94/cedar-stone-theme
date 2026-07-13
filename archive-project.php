<?php get_header(); ?>

<main class="work">

  <?php /* HERO: a quiet solid-green band ON PURPOSE. Services uses a photo hero, but on a
           gallery page the project photos below should be the star, so the header stays calm. */ ?>
  <section class="work-hero">
    <div class="container">
      <h1>Our Work</h1>
      <p class="work-hero__sub">Real projects we've designed and built around the Cedar Rapids area.</p>
    </div>
  </section>

  <div class="container">

    <?php /* FILTER BAR. <search> is a semantic landmark for filtering controls (modern, underused).
             Each button holds data-filter = a category slug; the Stage-3 JS shows/hides tiles by it.
             "All" (data-filter="all") is the default and starts active. */ ?>
    <search class="work-filter" aria-label="Filter projects by category">
      <button class="work-filter__btn is-active" type="button" data-filter="all">All</button>
      <?php
      // One filter button per project_category term that has projects.
      $work_terms = get_terms( array( 'taxonomy' => 'project_category', 'hide_empty' => true ) );
      if ( ! is_wp_error( $work_terms ) ) :
        foreach ( $work_terms as $work_term ) : ?>
          <button class="work-filter__btn" type="button" data-filter="<?php echo esc_attr( $work_term->slug ); ?>">
            <?php echo esc_html( $work_term->name ); ?>
          </button>
      <?php endforeach;
      endif; ?>

    </search>

    <?php /* THE MASONRY GRID. The Loop prints one tile per project into a CSS-columns masonry:
             the browser splits tiles into vertical columns and each image keeps its natural
             height, packing like Unsplash/Pexels. One partial per project (never copy-pasted). */ ?>
    <?php /* .work-grid-wrap is the positioning context for the loading overlay that
             covers the grid while a filter/load swaps tiles (JS toggles .is-loading). */ ?>
    <div class="work-grid-wrap">
      <div class="work-grid">
        <?php
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/tile-project' );
          }
        }
        ?>
      </div>
      <div class="work-loader" aria-hidden="true"><span class="work-loader__spinner"></span></div>
    </div>

    <?php /* LOAD MORE: JS pages through the tiles 9 at a time. */ ?>
    <div class="work-more">
      <button class="btn btn--outline" type="button" id="work-load-more">Load more</button>
    </div>

  </div>

  <?php /* LIGHTBOX: native <dialog>. Empty shell now — Stage-3 JS sets the <img> src + caption
           then calls dialog.showModal(). The browser hands us focus-trap, Esc-to-close, and the
           ::backdrop dim overlay for free. That's the whole reason we chose <dialog>. */ ?>
  <dialog class="lightbox" id="work-lightbox" aria-label="Project detail">
    <div class="lightbox__inner">
      <button class="lightbox__close" type="button" aria-label="Close" data-close>&times;</button>
      <img class="lightbox__img" src="" alt="">
      <div class="lightbox__caption">
        <div class="lightbox__text">
          <h2 class="lightbox__title"></h2>
          <p class="lightbox__desc"></p>
        </div>
      </div>
      <div class="lightbox__thumbs" hidden></div>
    </div>
  </dialog>

</main>

<?php get_footer(); ?>
