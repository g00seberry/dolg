/**
 * Test Form JavaScript
 *
 * Обработка формы тестирования на возможность банкротства
 *
 * @package udsc
 * @since 1.0.0
 */

class TestFormHandler {
  constructor(formId) {
    this.form = document.getElementById(formId);
    this.header = document.getElementById(formId + "_header");

    if (!this.form) {
      console.warn("Test form not found:", formId);
      return;
    }

    this.init();
  }

  init() {
    this.setupStickyHeader();
    this.setupFormSubmission();
  }

  setupStickyHeader() {
    if (!this.header) return;

    let originalTop = this.header.offsetTop;

    const handleScroll = () => {
      const scrollTop = window.pageYOffset;
      if (scrollTop >= originalTop) {
        this.header.classList.add("shadow-2xl");
      } else {
        this.header.classList.remove("shadow-2xl");
      }
    };

    window.addEventListener("scroll", handleScroll);
    handleScroll(); // Initial call
  }

  setupFormSubmission() {
    this.form.addEventListener("submit", (e) => this.handleSubmit(e));
  }

  handleSubmit(e) {
    e.preventDefault();

    const submitBtn =
      document.querySelector(`button[form="${this.form.id}"]`) ||
      this.form.querySelector('button[type="submit"]');

    if (!submitBtn) return;

    const originalText = submitBtn.innerHTML;

    // Show loading state
    submitBtn.disabled = true;
    submitBtn.innerHTML =
      '<svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Анализируем...';

    // Simulate processing (replace with real AJAX)
    setTimeout(() => {
      this.showSuccess();
      this.resetForm(submitBtn, originalText);
    }, 2000);
  }

  showSuccess() {
    alert("Спасибо за прохождение теста! Свяжемся с вами в ближайшее время.");
  }

  resetForm(submitBtn, originalText) {
    submitBtn.disabled = false;
    submitBtn.innerHTML = originalText;
    this.form.reset();
  }
}

// Auto-initialize all test forms
document.addEventListener("DOMContentLoaded", function () {
  const testForms = document.querySelectorAll(
    'form[id^="bankruptcy-assessment-test"]'
  );
  testForms.forEach((form) => {
    new TestFormHandler(form.id);
  });
});
