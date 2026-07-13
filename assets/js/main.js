// ===== Mobile nav toggle =====
const navToggle = document.querySelector(".nav-toggle");
const siteNav = document.querySelector(".site-header__nav");

navToggle.addEventListener("click", () => {
  const isOpen = siteNav.classList.toggle("is-open");
  navToggle.classList.toggle("is-open", isOpen);
  document.body.classList.toggle("nav-open", isOpen);
  navToggle.setAttribute("aria-expanded", isOpen);
  navToggle.setAttribute("aria-label", isOpen ? "Close menu" : "Open menu");
});

// Scroll In IntersectionObserver Animations

const revealElements = document.querySelectorAll('.reveal');

// ===== Count-up (stats numbers) =====
// Counts an element's text from 0 to data-target over 1.5s.
// data-suffix: text appended after the number (e.g. "+", "%")
// data-decimals: decimal places to keep (e.g. "1" for 5.0), defaults to 0
function animateCount(el) {
  const target = parseFloat(el.dataset.target);
  const decimals = +(el.dataset.decimals || 0);
  const suffix = el.dataset.suffix || "";
  const duration = 1500;
  const start = performance.now();

  function tick(now) {
    const progress = Math.min((now - start) / duration, 1);
    el.textContent = (progress * target).toFixed(decimals) + suffix;
    if (progress < 1) requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
}

const revealSection = new IntersectionObserver((sections, view) => {
  sections.forEach((section) => {
    if (section.isIntersecting) {
      section.target.classList.add("is-visible");
      view.unobserve(section.target);

      // If the revealed section contains counters, start them now too.
      const counters = section.target.querySelectorAll("[data-target]");
      counters.forEach((counter) => animateCount(counter));
    }
  });
}, {
  threshold: 0.25,
  rootMargin: "0px 0px -10% 0px",
});

revealElements.forEach((el) => revealSection.observe(el));

// ===== Our Work: filter + load more =====
const filterButtons = document.querySelectorAll(".work-filter__btn");
const workTiles = Array.from(document.querySelectorAll(".work-tile"));
const loadMoreBtn = document.getElementById("work-load-more");
const gridWrap = document.querySelector(".work-grid-wrap");
const PAGE_SIZE = 9;

let activeFilter = "all";
let shownCount = PAGE_SIZE;

// Recompute which tiles are visible from the current state (filter + count).
// force = true reveals shown tiles immediately (for clicks); false lets the
// scroll-reveal fade them in (for the first page load).
// Set which tiles are shown, and return the ones that just went hidden -> visible
// (those are the ones we want to animate in).
function applyView() {
  const matching = workTiles.filter(
    (tile) => activeFilter === "all" || tile.dataset.category === activeFilter
  );
  const newlyShown = [];
  workTiles.forEach((tile) => {
    const index = matching.indexOf(tile);
    const show = index !== -1 && index < shownCount;
    const wasHidden = tile.hidden;
    tile.hidden = !show;
    if (show && wasHidden) newlyShown.push(tile);
  });
  if (loadMoreBtn) loadMoreBtn.hidden = shownCount >= matching.length;
  return newlyShown;
}

// Replay the zoom-reveal on a set of tiles, staggered so they cascade in.
function revealTiles(tiles) {
  tiles.forEach((tile) => tile.classList.remove("is-visible")); // reset to pre-reveal state
  void document.body.offsetWidth;                                // force reflow so re-adding replays it
  tiles.forEach((tile, i) => {
    tile.style.transitionDelay = `${Math.min(i, 8) * 45}ms`;     // stagger (capped so it never drags)
    tile.classList.add("is-visible");
  });
}

// Cover the swap with the spinner, then cascade the new tiles in once it lifts.
function transitionView() {
  if (!gridWrap) { revealTiles(applyView()); return; }
  gridWrap.classList.add("is-loading");
  window.setTimeout(() => {
    const shown = applyView();
    gridWrap.classList.remove("is-loading");
    revealTiles(shown);
  }, 350);
}

filterButtons.forEach((button) => {
  button.addEventListener("click", () => {
    filterButtons.forEach((b) => b.classList.remove("is-active"));
    button.classList.add("is-active");
    activeFilter = button.dataset.filter;
    shownCount = PAGE_SIZE;      // reset paging when the filter changes
    transitionView();
  });
});

if (loadMoreBtn) {
  loadMoreBtn.addEventListener("click", () => {
    shownCount += PAGE_SIZE;
    transitionView();
  });
}

applyView(); // initial: set which tiles show; scroll-reveal fades them in on scroll


// ===== Our Work: lightbox (native <dialog>) =====
const lightbox = document.querySelector("#work-lightbox");

if (lightbox) {                                                // guard: this element only exists on Our Work
  const lightboxImg = lightbox.querySelector(".lightbox__img");
  const lightboxTitle = lightbox.querySelector(".lightbox__title");
  const lightboxDesc = lightbox.querySelector(".lightbox__desc");
  const lightboxThumbs = lightbox.querySelector(".lightbox__thumbs");
  const tileButtons = document.querySelectorAll(".work-tile__btn");

  let currentImages = [];   // the set of URLs for the open project
  let currentIndex = 0;     // which one is showing

  // Show a given image from the current set and highlight its thumbnail.
  function showLightboxImage(index) {
    currentIndex = index;
    lightboxImg.src = currentImages[index];
    lightboxThumbs.querySelectorAll(".lightbox__thumb").forEach((thumb, i) => {
      thumb.classList.toggle("is-active", i === index);
    });
  }

  tileButtons.forEach((button) => {
    button.addEventListener("click", () => {
      currentImages = JSON.parse(button.dataset.images);       // the set of URLs, from the PHP
      lightboxImg.alt = button.dataset.title;
      lightboxTitle.textContent = button.dataset.title;
      lightboxDesc.textContent = button.dataset.description;

      // Build the thumbnail strip only when there's more than one angle.
      lightboxThumbs.innerHTML = "";
      if (currentImages.length > 1) {
        currentImages.forEach((src, i) => {
          const thumb = document.createElement("button");
          thumb.type = "button";
          thumb.className = "lightbox__thumb";
          thumb.innerHTML = `<img src="${src}" alt="">`;
          thumb.addEventListener("click", () => showLightboxImage(i));
          lightboxThumbs.appendChild(thumb);
        });
        lightboxThumbs.hidden = false;
      } else {
        lightboxThumbs.hidden = true;
      }

      showLightboxImage(0);                                    // start on the first image
      lightbox.showModal();                                    // open as a modal (backdrop, focus-trap, Esc)
    });
  });

  // Left/right arrows step through a set (wraps around).
  lightbox.addEventListener("keydown", (event) => {
    if (currentImages.length < 2) return;
    if (event.key === "ArrowRight") {
      showLightboxImage((currentIndex + 1) % currentImages.length);
    } else if (event.key === "ArrowLeft") {
      showLightboxImage((currentIndex - 1 + currentImages.length) % currentImages.length);
    }
  });

  lightbox.querySelector("[data-close]").addEventListener("click", () => lightbox.close());

  lightbox.addEventListener("click", (event) => {              // click the dimmed area (not the image) → close
    if (event.target === lightbox || event.target.classList.contains("lightbox__inner")) {
      lightbox.close();
    }
  });
}
