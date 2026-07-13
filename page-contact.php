<?php
/**
 * Contact page. Custom template for the Page with slug "contact".
 * Hand-coded quote-request form with a nonce + sanitize + validate handler.
 * The form posts back to itself; the handler runs BEFORE any output.
 */

// ---- Form handler ----
$cs_sent   = false;
$cs_errors = array();
$cs_val    = array( 'name' => '', 'email' => '', 'phone' => '', 'service' => '', 'message' => '' );

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['cs_contact_nonce'] ) ) {

  // 1. Nonce check — blocks forged/cross-site submissions (CSRF).
  if ( ! wp_verify_nonce( $_POST['cs_contact_nonce'], 'cs_contact_submit' ) ) {
    $cs_errors['form'] = 'Your session expired. Please send again.';
  } else {

    // 2. Sanitize every field on the way IN (wp_unslash removes the slashes WP adds to $_POST).
    $cs_val['name']    = sanitize_text_field( wp_unslash( $_POST['cs_name'] ?? '' ) );
    $cs_val['email']   = sanitize_email( wp_unslash( $_POST['cs_email'] ?? '' ) );
    $cs_val['phone']   = sanitize_text_field( wp_unslash( $_POST['cs_phone'] ?? '' ) );
    $cs_val['service'] = sanitize_text_field( wp_unslash( $_POST['cs_service'] ?? '' ) );
    $cs_val['message'] = sanitize_textarea_field( wp_unslash( $_POST['cs_message'] ?? '' ) );

    // 3. Validate the required fields.
    if ( '' === $cs_val['name'] ) {
      $cs_errors['name'] = 'Please enter your name.';
    }
    if ( '' === $cs_val['email'] || ! is_email( $cs_val['email'] ) ) {
      $cs_errors['email'] = 'Please enter a valid email address.';
    }
    if ( '' === $cs_val['message'] ) {
      $cs_errors['message'] = 'Tell us a little about your project.';
    }

    // 4. If clean, email it. (wp_mail needs SMTP configured to actually deliver on a live host.)
    if ( empty( $cs_errors ) ) {
      $to      = get_option( 'admin_email' );
      $subject = 'New quote request from ' . $cs_val['name'];
      $body    = "Name: {$cs_val['name']}\nEmail: {$cs_val['email']}\nPhone: {$cs_val['phone']}\nService: {$cs_val['service']}\n\nMessage:\n{$cs_val['message']}";
      $headers = array( 'Reply-To: ' . $cs_val['name'] . ' <' . $cs_val['email'] . '>' );
      wp_mail( $to, $subject, $body, $headers );
      $cs_sent = true;
    }
  }
}

$cs_services = array( 'Landscape Design & Installation', 'Patios & Stonework', 'Planting & Garden Beds', 'Seasonal Care', 'Not sure yet' );

get_header();
?>

<main class="contact">

  <section class="contact-hero">
    <div class="container">
      <p class="kicker">Get in touch</p>
      <h1>Let's talk about your yard</h1>
      <p class="contact-hero__sub">Tell us what you're picturing and we'll get back to you with an honest estimate. No pressure.</p>
    </div>
  </section>

  <section class="contact-body">
    <div class="container contact-grid">

      <div class="contact-form-wrap">
        <?php if ( $cs_sent ) : ?>

          <div class="contact-success reveal">
            <h2>Thanks, <?php echo esc_html( $cs_val['name'] ); ?>.</h2>
            <p>We got your message and we'll be in touch shortly. If it's urgent, give us a call at <a href="tel:+15555551234">(555) 555-1234</a>.</p>
          </div>

        <?php else : ?>

          <?php if ( ! empty( $cs_errors['form'] ) ) : ?>
            <p class="contact-formerror"><?php echo esc_html( $cs_errors['form'] ); ?></p>
          <?php endif; ?>

          <form class="contact-form" method="post" action="" novalidate>
            <?php wp_nonce_field( 'cs_contact_submit', 'cs_contact_nonce' ); ?>

            <div class="field">
              <label for="cs_name">Name</label>
              <input type="text" id="cs_name" name="cs_name" value="<?php echo esc_attr( $cs_val['name'] ); ?>" required>
              <?php if ( ! empty( $cs_errors['name'] ) ) : ?><span class="field__error"><?php echo esc_html( $cs_errors['name'] ); ?></span><?php endif; ?>
            </div>

            <div class="field field--half">
              <label for="cs_email">Email</label>
              <input type="email" id="cs_email" name="cs_email" value="<?php echo esc_attr( $cs_val['email'] ); ?>" required>
              <?php if ( ! empty( $cs_errors['email'] ) ) : ?><span class="field__error"><?php echo esc_html( $cs_errors['email'] ); ?></span><?php endif; ?>
            </div>

            <div class="field field--half">
              <label for="cs_phone">Phone <span class="field__opt">(optional)</span></label>
              <input type="tel" id="cs_phone" name="cs_phone" value="<?php echo esc_attr( $cs_val['phone'] ); ?>">
            </div>

            <div class="field">
              <label for="cs_service">What can we help with?</label>
              <select id="cs_service" name="cs_service">
                <option value="">Choose one&hellip;</option>
                <?php foreach ( $cs_services as $service_opt ) : ?>
                  <option value="<?php echo esc_attr( $service_opt ); ?>" <?php selected( $cs_val['service'], $service_opt ); ?>><?php echo esc_html( $service_opt ); ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="field">
              <label for="cs_message">Project details</label>
              <textarea id="cs_message" name="cs_message" rows="5" required><?php echo esc_textarea( $cs_val['message'] ); ?></textarea>
              <?php if ( ! empty( $cs_errors['message'] ) ) : ?><span class="field__error"><?php echo esc_html( $cs_errors['message'] ); ?></span><?php endif; ?>
            </div>

            <button type="submit" class="btn btn--accent">Send request</button>
          </form>

        <?php endif; ?>
      </div>

      <aside class="contact-info">
        <h2>Cedar &amp; Stone</h2>
        <ul class="contact-info__list">
          <li><span class="contact-info__label">Call</span><a href="tel:+15555551234">(555) 555-1234</a></li>
          <li><span class="contact-info__label">Email</span><a href="mailto:hello@cedarandstone.com">hello@cedarandstone.com</a></li>
          <li><span class="contact-info__label">Hours</span>Mon&ndash;Fri, 8am&ndash;5pm</li>
        </ul>
        <div class="contact-info__area">
          <p class="contact-info__label">Service area</p>
          <p>Cedar Rapids &middot; Marion &middot; Hiawatha &middot; Robins &middot; Fairfax &middot; Ely and surrounding towns.</p>
        </div>
      </aside>

    </div>
  </section>

</main>

<?php get_footer(); ?>
