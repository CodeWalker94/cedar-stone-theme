<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cedar & Stone</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class();
?>>
<?php wp_body_open();?>
<header class="site-header">
  <div class="site-header__brand"> 
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo">Cedar &amp; Stone</a>    
</div>
  <nav id="site-nav" class="site-header__nav">
    <ul> 
        <li><a href="/services/">Services</a></li>
        <li><a href="/our-work/">Our Work</a></li>
        <li><a href="/about/">About</a></li>
        <li><a href="/news/">News</a></li>
        <li><a href="/contact/">Contact</a></li>
    </ul>
    <!-- Mobile-only CTA inside the panel. SYNC: phone number also lives in header actions + footer -->
    <div class="site-header__nav-cta">
      <a href="tel:+15555551234" class="site-header__phone">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <span>(555) 555-1234</span>
      </a>
      <a href="/contact/" class="btn btn--accent">Get a Free Quote</a>
    </div>
  </nav>
  <div class="site-header__actions">
    <a href="tel:+15555551234" class="site-header__phone" aria-label="Call us at (555) 555-1234">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
  <span>(555) 555-1234</span>
</a>
<a href="/contact/" class="btn btn--accent">Get a Free Quote</a>
<button class="nav-toggle" aria-expanded="false" aria-controls="site-nav" aria-label="Open menu">
  <span></span>
  <span></span>
  <span></span>
</button>
</div>
</header>

