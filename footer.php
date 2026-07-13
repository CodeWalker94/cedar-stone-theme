<footer class="site-footer">
  <div class="site-footer__grid">

    <div class="site-footer__col site-footer__brand">
      <p class="site-footer__logo">Cedar &amp; Stone</p>
      <p>Residential design-build landscaping. Design, hardscaping, planting, and year-round care.</p>
    </div>

    <div class="site-footer__col">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li><a href="/about/">About</a></li>
        <li><a href="/our-work/">Our Work</a></li>
        <li><a href="/news/">News</a></li>
        <li><a href="/contact/">Contact</a></li>
      </ul>
    </div>

    <div class="site-footer__col">
      <h3>Services</h3>
      <ul>
        <li><a href="/services/">Landscape Design</a></li>
        <li><a href="/services/">Hardscaping</a></li>
        <li><a href="/services/">Planting &amp; Gardens</a></li>
        <li><a href="/services/">Seasonal Maintenance</a></li>
      </ul>
    </div>

    <div class="site-footer__col">
      <h3>Get In Touch</h3>
      <ul>
        <li><a href="tel:+15555551234">(555) 555-1234</a></li>
        <li><a href="mailto:hello@cedarandstone.com">hello@cedarandstone.com</a></li>
        <li>Mon&ndash;Fri: 8am&ndash;5pm</li>
        <li>Serving Cedar Rapids &amp; surrounding areas</li>
      </ul>
    </div>

  </div>

  <div class="site-footer__bottom">
    <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Cedar &amp; Stone. Demo project, not a real business.</p>
  </div>
</footer>

<?php get_template_part( 'template-parts/lightbox' ); ?>

<?php wp_footer(); ?>
</body>
</html>
