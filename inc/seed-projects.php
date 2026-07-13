<?php
/**
 * ONE-TIME seeder for the demo Project posts.
 *
 * Images stay as theme assets (assets/images/). We store each project's image
 * FILENAMES in post meta ('project_images') instead of the Media Library, so
 * nothing gets copied around and the whole gallery rebuilds from git.
 *   images[0] = the tile image; the rest = extra angles for the lightbox.
 *
 * HOW TO RUN (once):
 *   1. In functions.php, add:  require_once get_template_directory() . '/inc/seed-projects.php';
 *   2. Load any wp-admin page once. It creates the posts, then sets a flag so it
 *      never runs again.
 *   3. Confirm Projects appear, then REMOVE that require line (and you can delete
 *      this file). Leaving it required is harmless (the flag blocks re-runs), but
 *      a seeder isn't shipping code.
 */

function cedarstone_seed_projects() {
  // Run-once guard. Set the flag FIRST so a concurrent admin_init (e.g. a
  // background heartbeat AJAX request) can't slip past and create a second copy.
  if ( get_option( 'cedarstone_projects_seeded_v2' ) ) {
    return;
  }
  update_option( 'cedarstone_projects_seeded_v2', true );

  // Clean slate: delete any projects left from an earlier run (clears duplicates).
  $existing_projects = get_posts( array( 'post_type' => 'project', 'numberposts' => -1, 'post_status' => 'any', 'fields' => 'ids' ) );
  foreach ( $existing_projects as $existing_id ) {
    wp_delete_post( $existing_id, true );
  }

  // Make sure the three categories exist (slug => display name).
  $categories = array(
    'patios'   => 'Patios & Stonework',
    'planting' => 'Planting & Gardens',
    'design'   => 'Design & Installation',
  );
  foreach ( $categories as $slug => $name ) {
    if ( ! term_exists( $slug, 'project_category' ) ) {
      wp_insert_term( $name, 'project_category', array( 'slug' => $slug ) );
    }
  }

  // The projects. 'images'[0] is the tile; any extras are lightbox angles.
  $seed = array(

    // ---- Patios & Stonework ----
    array( 'title' => 'Backyard Patio & Fire Feature', 'cat' => 'patios', 'desc' => 'A backyard paver patio with a built-in fire feature, laid to hold up through Iowa freeze-thaw.', 'images' => array( 'todfrank-backyard-1715876_1920.jpg' ) ),
    array( 'title' => 'Stone Wall Patio & Seating', 'cat' => 'patios', 'desc' => 'A stone-walled patio with built-in seating and a grill spot.', 'images' => array( 'tanya-barrow-omsriVMVd_A-unsplash.jpg' ) ),
    array( 'title' => 'Hilltop Stone Patio', 'cat' => 'patios', 'desc' => 'A tiled stone patio with a hilltop view and room to entertain.', 'images' => array( 'projectmgmt-mallorca-246909_1920.jpg' ) ),
    array( 'title' => 'Rock Waterfall & Pool', 'cat' => 'patios', 'desc' => 'A natural rock waterfall built into a backyard pool surround.', 'images' => array( '1139623-backyard-2549830_1920.jpg' ) ),
    array( 'title' => 'Pondless Waterfall', 'cat' => 'patios', 'desc' => 'A low-maintenance pondless waterfall set into the garden.', 'images' => array( 'pondguy-pondless-waterfalls-2428111_1920.jpg' ) ),
    array( 'title' => 'Backyard Garden Pond', 'cat' => 'patios', 'desc' => 'A planted backyard pond with a natural stone edge.', 'images' => array( 'smltd-pond-722926_1920.jpg' ) ),
    array( 'title' => 'Circular Paver Patio', 'cat' => 'patios', 'desc' => 'A circular paver patio ringed by a low stone wall.', 'images' => array( 'sergej-NvApISBMvXY-unsplash.jpg' ) ),
    array( 'title' => 'Tiered Garden Fountain', 'cat' => 'patios', 'desc' => 'A cast tiered fountain as a garden centerpiece.', 'images' => array( '70154-fountain-199168_1920.jpg' ) ),
    array( 'title' => 'Raised Stone Terrace', 'cat' => 'patios', 'desc' => 'A raised stone terrace with built-in planters.', 'images' => array( 'george-J_OcF3xlsBQ-unsplash.jpg' ) ),
    array( 'title' => 'Pergola Walkway', 'cat' => 'patios', 'desc' => 'A paver walkway shaded by a timber pergola.', 'images' => array( 'albert-hyseni-bQOnB5LRZsg-unsplash.jpg' ) ),
    array( 'title' => 'Brick Garden Steps', 'cat' => 'patios', 'desc' => 'Brick steps climbing through planted garden beds.', 'images' => array( 'michelle-maria-steps-3747068_1920.jpg' ) ),
    array( 'title' => 'Modern Poolside Deck', 'cat' => 'patios', 'desc' => 'A modern poolside deck with paver-and-grass stepping bands.', 'images' => array( 'pexels-artbovich-8134751.jpg', 'pexels-artbovich-8134748.jpg', 'pexels-artbovich-8134750.jpg', 'pexels-artbovich-8134849.jpg' ) ),

    // ---- Planting & Gardens ----
    array( 'title' => 'Rose Garden Path', 'cat' => 'planting', 'desc' => 'A garden path winding past climbing roses and mixed beds.', 'images' => array( 'david-billington-oOq2RO52UPM-unsplash.jpg' ) ),
    array( 'title' => 'Spring Tulip Path', 'cat' => 'planting', 'desc' => 'A brick path lined with spring tulips and flowering trees.', 'images' => array( 'jillwellington-pathway-2289978.jpg' ) ),
    array( 'title' => 'Flagstone Garden Path', 'cat' => 'planting', 'desc' => 'A flagstone path set through a full flower garden.', 'images' => array( 'aniston-grace-L3hyEbDk194-unsplash.jpg' ) ),
    array( 'title' => 'Circular Flower Bed', 'cat' => 'planting', 'desc' => 'A circular bed of red and white annuals set in the lawn.', 'images' => array( 'ah-morgan-63j8unc6U3A-unsplash.jpg' ) ),
    array( 'title' => 'Colorful Perennial Bed', 'cat' => 'planting', 'desc' => 'A long perennial border in full summer color.', 'images' => array( 'roger-starnes-sr-OK-bkFlixzI-unsplash.jpg' ) ),
    array( 'title' => 'Japanese Maple & Azaleas', 'cat' => 'planting', 'desc' => 'A Japanese maple over a mound of blooming azaleas.', 'images' => array( 'pascal-murzeau-gJajiVZJZ-E-unsplash.jpg' ) ),
    array( 'title' => 'Backyard Flower Garden', 'cat' => 'planting', 'desc' => 'A backyard garden with layered beds along the fence.', 'images' => array( 'michelle-maria-garden-9005294_1920.jpg' ) ),
    array( 'title' => 'Mixed Border Bed', 'cat' => 'planting', 'desc' => 'A mixed border bed with a path light and stone edging.', 'images' => array( 'tatyana-rubleva-hWQvXlasfXE-unsplash.jpg' ) ),
    array( 'title' => 'Garden Gazebo & Lilacs', 'cat' => 'planting', 'desc' => 'A garden gazebo framed by mature lilacs.', 'images' => array( 'marilynhanes-gazebo-211654_1920.jpg' ) ),
    array( 'title' => 'Formal Parterre & Fountain', 'cat' => 'planting', 'desc' => 'A formal parterre garden centered on a fountain.', 'images' => array( 'tama66-garden-2040714_1920.jpg' ) ),
    array( 'title' => 'Formal Garden & Reflecting Pool', 'cat' => 'planting', 'desc' => 'A clipped formal garden around a reflecting pool.', 'images' => array( 'ryedaleweb-garden-2822931_1920.jpg' ) ),
    array( 'title' => 'Estate Hedge Garden', 'cat' => 'planting', 'desc' => 'A formal estate garden with hedges and stone urns.', 'images' => array( 'memorycatcher-felbrigg-estate-1144789_1920.jpg' ) ),
    array( 'title' => 'Topiary Border', 'cat' => 'planting', 'desc' => 'A row of shaped topiary along a garden wall.', 'images' => array( 'arttower-decorative-57482_1920.jpg' ) ),
    array( 'title' => 'Terraced Stone Garden', 'cat' => 'planting', 'desc' => 'A terraced garden held by a low stone wall.', 'images' => array( 'kyrie-isaac-ppaf6DIUGYs-unsplash.jpg' ) ),
    array( 'title' => 'Flowering Shrub Beds', 'cat' => 'planting', 'desc' => 'Foundation beds with red flowering shrubs framing the home.', 'images' => array( 'qy-liu-184tM0HpxPA-unsplash.jpg', 'qy-liu-RykkS_DVhPQ-unsplash.jpg' ) ),

    // ---- Design & Installation ----
    array( 'title' => 'Hilltop Lawn & Shade Tree', 'cat' => 'design', 'desc' => 'A wide hilltop lawn under a mature shade tree.', 'images' => array( 'banele-madlala-XKoxWI_gHVs-unsplash.jpg' ) ),
    array( 'title' => 'Front Yard Redesign', 'cat' => 'design', 'desc' => 'A full front-yard redesign with fresh beds and lawn.', 'images' => array( 'erikawittlieb-house-2414374_1920.jpg', 'erikawittlieb-house-2417321_1920.jpg' ) ),
    array( 'title' => 'New Backyard Landscape', 'cat' => 'design', 'desc' => 'A newly planted backyard with young trees and beds.', 'images' => array( 'michelle-maria-landscape-7380474_1920.jpg' ) ),
    array( 'title' => 'Backyard Lawn & Beds', 'cat' => 'design', 'desc' => 'A tidy backyard lawn edged with garden beds.', 'images' => array( 'fast-markers-physUiaPB6k-unsplash.jpg' ) ),
    array( 'title' => 'Lawn & Pine Border', 'cat' => 'design', 'desc' => 'An open lawn curving into a pine and shrub border.', 'images' => array( 'nhxl-bdl-eTKt0YVS-LE-unsplash.jpg' ) ),
    array( 'title' => 'Retaining Wall & Lawn', 'cat' => 'design', 'desc' => 'A terraced lawn held by a stone retaining wall.', 'images' => array( 'mowcow-lawn-landscape-IBJAFSXmBhw-unsplash.jpg' ) ),
    array( 'title' => 'Estate Lawn', 'cat' => 'design', 'desc' => 'A broad striped lawn running up to the house.', 'images' => array( 'gregory-brainard-y3kCj1WC2mA-unsplash.jpg' ) ),
    array( 'title' => 'Front Yard Landscaping', 'cat' => 'design', 'desc' => 'Fresh front-yard beds and lawn around the entry.', 'images' => array( 'keenan-shepard-vOQDS6AmwrM-unsplash.jpg' ) ),
    array( 'title' => 'Cottage Garden & Fence', 'cat' => 'design', 'desc' => 'A cottage garden behind a white picket fence.', 'images' => array( 'julia-lynn-NswG5nozXj4-unsplash.jpg' ) ),
    array( 'title' => 'Victorian Home Landscape', 'cat' => 'design', 'desc' => 'Layered foundation plantings around a Victorian home.', 'images' => array( 'omri-d-cohen-Qjc6QtIEjjg-unsplash.jpg' ) ),
    array( 'title' => 'Farmhouse Front Yard', 'cat' => 'design', 'desc' => 'A farmhouse front yard with a white fence and beds.', 'images' => array( 'wes-fischer-awO1-S4q_bo-unsplash.jpg' ) ),
    array( 'title' => 'Brick Home Landscape', 'cat' => 'design', 'desc' => 'Full landscaping around a brick home, front and side.', 'images' => array( 'roger-starnes-sr-1j1kPS0vZqA-unsplash.jpg', 'roger-starnes-sr-t0CsdU0wopU-unsplash.jpg' ) ),
    array( 'title' => 'Lawn & Orchard Tree', 'cat' => 'design', 'desc' => 'A maintained lawn with a single orchard tree.', 'images' => array( 'sergej-PldpnLUcock-unsplash.jpg' ) ),
    array( 'title' => 'Hedge Corridor & Lawn', 'cat' => 'design', 'desc' => 'A striped lawn corridor framed by tall hedges.', 'images' => array( 'paul-arky-BoVg3wUOJ_g-unsplash.jpg' ) ),
    array( 'title' => 'Hedge-Lined Walk', 'cat' => 'design', 'desc' => 'A shaded walk between tall, clipped hedges.', 'images' => array( 'pexels-jaymantri-2631.jpg' ) ),
  );

  foreach ( $seed as $project ) {
    // 1. Create the Project post (title + description as the body).
    $post_id = wp_insert_post( array(
      'post_title'   => $project['title'],
      'post_content' => $project['desc'],
      'post_status'  => 'publish',
      'post_type'    => 'project',
    ) );

    if ( $post_id && ! is_wp_error( $post_id ) ) {
      // 2. File it under its category (look up the term ID by slug).
      $term = get_term_by( 'slug', $project['cat'], 'project_category' );
      if ( $term ) {
        wp_set_object_terms( $post_id, array( (int) $term->term_id ), 'project_category' );
      }
      // 3. Store the image filenames in post meta (the tile + any extra angles).
      update_post_meta( $post_id, 'project_images', $project['images'] );
    }
  }

}
add_action( 'admin_init', 'cedarstone_seed_projects' );
