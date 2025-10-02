/**
 * Consultation Form JavaScript
 *
 * Обработка формы записи на консультацию
 *
 * @package udsc
 * @since 1.0.0
 */

class ConsultationFormHandler {
  constructor(formId) {
    this.form = document.getElementById(formId);

    if (!this.form) return;

    this.init();
  }

  init() {
    this.form.addEventListener("submit", (e) => this.handleSubmit(e));
  }

  handleSubmit(e) {
    e.preventDefault();

    const submitBtn = this.form.querySelector('button[type="submit"]');
    if (!submitBtn) return;

    const originalText = submitBtn.innerHTML;

    // Показываем состояние загрузки
    submitBtn.disabled = true;
    submitBtn.innerHTML =
      '<svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Отправляем...';

    // Имитация отправки (заменить на реальный AJAX)
    setTimeout(() => {
      this.showSuccess();
      this.resetForm(submitBtn, originalText);
    }, 1500);
  }

  showSuccess() {
    alert("Спасибо! Мы скоро свяжемся с вами.");
  }

  resetForm(submitBtn, originalText) {
    submitBtn.disabled = false;
    submitBtn.innerHTML = originalText;
    this.form.reset();
  }
}

// Автоматическая инициализация всех форм консультации
document.addEventListener("DOMContentLoaded", function () {
  const consultationForms = document.querySelectorAll(
    'form[id^="consultation-modal-form"]'
  );

  consultationForms.forEach((form) => {
    new ConsultationFormHandler(form.id);
  });
});
