/**
 * Mobile Menu JavaScript
 *
 * Обработка мобильного меню навигации
 *
 * @package udsc
 * @since 1.0.0
 */

class MobileMenuHandler {
  constructor() {
    this.toggleButton = document.getElementById("mobile-menu-toggle");
    this.mobileMenu = document.getElementById("mobile-menu");
    this.menuOpenIcon = document.getElementById("menu-open");
    this.menuCloseIcon = document.getElementById("menu-close");

    if (!this.toggleButton || !this.mobileMenu) {
      console.warn("Mobile menu elements not found");
      return;
    }

    this.isOpen = false;
    this.init();
  }

  init() {
    // Add click event listener to toggle button
    this.toggleButton.addEventListener("click", () => this.toggle());

    // Close menu when clicking outside
    document.addEventListener("click", (e) => this.handleOutsideClick(e));

    // Close menu on escape key
    document.addEventListener("keydown", (e) => this.handleKeydown(e));

    // Close menu on window resize to desktop size
    window.addEventListener("resize", () => this.handleResize());
  }

  toggle() {
    this.isOpen ? this.close() : this.open();
  }

  open() {
    this.isOpen = true;
    this.mobileMenu.classList.remove("hidden");
    this.menuOpenIcon.classList.add("hidden");
    this.menuCloseIcon.classList.remove("hidden");
    this.toggleButton.setAttribute("aria-expanded", "true");

    // Prevent body scroll when menu is open
    document.body.style.overflow = "hidden";
  }

  close() {
    this.isOpen = false;
    this.mobileMenu.classList.add("hidden");
    this.menuOpenIcon.classList.remove("hidden");
    this.menuCloseIcon.classList.add("hidden");
    this.toggleButton.setAttribute("aria-expanded", "false");

    // Restore body scroll
    document.body.style.overflow = "";
  }

  handleOutsideClick(e) {
    if (
      this.isOpen &&
      !this.mobileMenu.contains(e.target) &&
      !this.toggleButton.contains(e.target)
    ) {
      this.close();
    }
  }

  handleKeydown(e) {
    if (e.key === "Escape" && this.isOpen) {
      this.close();
      this.toggleButton.focus();
    }
  }

  handleResize() {
    // Close menu if window is resized to desktop size
    if (window.innerWidth >= 1024 && this.isOpen) {
      this.close();
    }
  }
}

// Initialize mobile menu when DOM is ready
document.addEventListener("DOMContentLoaded", function () {
  new MobileMenuHandler();
});
