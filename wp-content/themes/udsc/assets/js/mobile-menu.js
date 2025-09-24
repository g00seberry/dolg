/**
 * Mobile Menu Handler for UDSC Theme
 *
 * Manages mobile navigation menu toggle functionality with accessibility support
 *
 * @package udsc
 * @since 1.0.0
 */

class MobileMenuHandler {
  constructor() {
    this.elements = null;
    this.isOpen = false;
    this.init();
  }

  /**
   * Initialize mobile menu functionality
   */
  init() {
    document.addEventListener("DOMContentLoaded", () => {
      this.cacheElements();
      if (this.elements.isValid) {
        this.bindEvents();
      }
    });
  }

  /**
   * Cache DOM elements for performance
   */
  cacheElements() {
    this.elements = {
      toggle: document.getElementById("mobile-menu-toggle"),
      menu: document.getElementById("mobile-menu"),
      openIcon: document.getElementById("menu-open"),
      closeIcon: document.getElementById("menu-close"),
      menuLinks: null,
    };

    // Cache menu links if menu exists
    if (this.elements.menu) {
      this.elements.menuLinks =
        this.elements.menu.querySelectorAll("a, button");
    }

    // Validate all required elements exist
    this.elements.isValid = !!(
      this.elements.toggle &&
      this.elements.menu &&
      this.elements.openIcon &&
      this.elements.closeIcon
    );
  }

  /**
   * Bind event listeners
   */
  bindEvents() {
    // Toggle button click
    this.elements.toggle.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      this.toggle();
    });

    // Close menu when clicking menu links
    if (this.elements.menuLinks) {
      this.elements.menuLinks.forEach((link) => {
        link.addEventListener("click", () => {
          this.close();
        });
      });
    }

    // Close menu when clicking outside
    document.addEventListener("click", (e) => {
      if (
        this.isOpen &&
        !this.elements.toggle.contains(e.target) &&
        !this.elements.menu.contains(e.target)
      ) {
        this.close();
      }
    });

    // Handle escape key
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && this.isOpen) {
        this.close();
        this.elements.toggle.focus(); // Return focus to toggle button
      }
    });

    // Handle window resize
    window.addEventListener("resize", () => {
      // Close mobile menu if screen becomes large
      if (window.innerWidth >= 1024 && this.isOpen) {
        this.close();
      }
    });
  }

  /**
   * Toggle menu state
   */
  toggle() {
    if (this.isOpen) {
      this.close();
    } else {
      this.open();
    }
  }

  /**
   * Open mobile menu
   */
  open() {
    this.isOpen = true;
    this.elements.menu.classList.remove("hidden");
    this.elements.openIcon.classList.add("hidden");
    this.elements.closeIcon.classList.remove("hidden");

    // Update ARIA attributes for accessibility
    this.elements.toggle.setAttribute("aria-expanded", "true");
    this.elements.menu.setAttribute("aria-hidden", "false");

    // Prevent body scroll when menu is open
    document.body.style.overflow = "hidden";

    // Focus management - focus first menu item
    const firstMenuItem = this.elements.menu.querySelector("a, button");
    if (firstMenuItem) {
      firstMenuItem.focus();
    }

    // Dispatch custom event
    this.dispatchEvent("menuOpened");
  }

  /**
   * Close mobile menu
   */
  close() {
    this.isOpen = false;
    this.elements.menu.classList.add("hidden");
    this.elements.openIcon.classList.remove("hidden");
    this.elements.closeIcon.classList.add("hidden");

    // Update ARIA attributes for accessibility
    this.elements.toggle.setAttribute("aria-expanded", "false");
    this.elements.menu.setAttribute("aria-hidden", "true");

    // Restore body scroll
    document.body.style.overflow = "";

    // Dispatch custom event
    this.dispatchEvent("menuClosed");
  }

  /**
   * Dispatch custom events for extensibility
   */
  dispatchEvent(eventName) {
    const event = new CustomEvent(eventName, {
      detail: {
        handler: this,
        isOpen: this.isOpen,
      },
    });
    document.dispatchEvent(event);
  }

  /**
   * Public API methods
   */
  getState() {
    return {
      isOpen: this.isOpen,
      elements: this.elements,
    };
  }

  /**
   * Programmatically open menu
   */
  openMenu() {
    if (!this.isOpen) {
      this.open();
    }
  }

  /**
   * Programmatically close menu
   */
  closeMenu() {
    if (this.isOpen) {
      this.close();
    }
  }
}

// Initialize mobile menu when script loads
const mobileMenu = new MobileMenuHandler();

// Export for potential use by other scripts
if (typeof window !== "undefined") {
  window.MobileMenuHandler = MobileMenuHandler;
  window.mobileMenu = mobileMenu;
}
