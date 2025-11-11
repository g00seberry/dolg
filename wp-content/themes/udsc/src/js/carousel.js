/**
 * Lightweight carousel controller inspired by Flowbite's data attributes.
 * Supports:
 *  - data-carousel="static|slide" on the container
 *  - data-carousel-prev / data-carousel-next on controls
 *  - data-carousel-slide-to on indicators
 *  - optional data-carousel-target="#id" to point controls/indicators to a specific carousel
 */

const initCarousel = (container) => {
  if (!container || container.dataset.carouselInitialized === "true") {
    return;
  }

  const carouselId = container.id;
  const slides = Array.from(container.querySelectorAll("[data-carousel-item]"));

  if (!slides.length) {
    container.dataset.carouselInitialized = "true";
    return;
  }

  const getScopedElements = (selector) =>
    Array.from(document.querySelectorAll(selector)).filter((element) => {
      const target = element.getAttribute("data-carousel-target");
      if (target && carouselId) {
        return target === `#${carouselId}`;
      }
      return container.contains(element);
    });

  const prevButtons = getScopedElements("[data-carousel-prev]");
  const nextButtons = getScopedElements("[data-carousel-next]");
  const indicators = getScopedElements("[data-carousel-slide-to]");

  const clampIndex = (index) => Math.max(0, Math.min(slides.length - 1, index));

  let activeIndex = slides.findIndex(
    (slide) => slide.getAttribute("data-carousel-item") === "active"
  );
  if (activeIndex < 0) {
    activeIndex = 0;
  }

  const setActiveSlide = (index) => {
    const targetIndex = clampIndex(index);

    slides.forEach((slide, slideIndex) => {
      const isActive = slideIndex === targetIndex;
      slide.classList.toggle("hidden", !isActive);
      slide.setAttribute("data-carousel-item", isActive ? "active" : "");
    });

    indicators.forEach((indicator, indicatorIndex) => {
      const isActive = indicatorIndex === targetIndex;
      indicator.classList.toggle("bg-primary", isActive);
      indicator.classList.toggle("bg-muted-foreground/30", !isActive);
      indicator.setAttribute("aria-current", isActive ? "true" : "false");
    });

    activeIndex = targetIndex;
  };

  prevButtons.forEach((button) => {
    button.addEventListener("click", () => {
      setActiveSlide(activeIndex - 1);
    });
  });

  nextButtons.forEach((button) => {
    button.addEventListener("click", () => {
      setActiveSlide(activeIndex + 1);
    });
  });

  indicators.forEach((indicator) => {
    indicator.addEventListener("click", () => {
      const target = parseInt(
        indicator.getAttribute("data-carousel-slide-to") || "0",
        10
      );
      setActiveSlide(target);
    });
  });

  setActiveSlide(activeIndex);
  container.dataset.carouselInitialized = "true";
};

const initAllCarousels = () => {
  document
    .querySelectorAll("[data-carousel]")
    .forEach((container) => initCarousel(container));
};

document.addEventListener("DOMContentLoaded", initAllCarousels);
window.addEventListener("load", initAllCarousels);

window.addEventListener("udsc:carousel:init", (event) => {
  const carouselId = event?.detail?.id;
  if (!carouselId) {
    return;
  }
  const container = document.getElementById(carouselId);
  if (container) {
    initCarousel(container);
  }
});

window.udscInitCarousels = initAllCarousels;
