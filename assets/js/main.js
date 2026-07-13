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