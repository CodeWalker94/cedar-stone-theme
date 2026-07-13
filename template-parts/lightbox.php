<?php
/**
 * Shared project lightbox modal (used by Our Work + the homepage preview).
 * Empty shell; assets/js/main.js fills the image, caption, and thumbnails on click.
 * The browser's native <dialog> gives us the backdrop, focus-trap, and Esc-to-close.
 */
?>
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
