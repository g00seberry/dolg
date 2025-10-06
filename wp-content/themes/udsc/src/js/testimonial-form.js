/**
 * Testimonial Form JavaScript
 *
 * Обработка формы отзывов (без модальных окон - они уже реализованы)
 *
 * @package udsc
 * @since 1.0.0
 */

class TestimonialFormHandler {
  constructor(formId) {
    this.form = document.getElementById(formId);

    if (!this.form) return;

    this.init();
  }

  init() {
    this.form.addEventListener("submit", (e) => this.handleSubmit(e));
  }

  async handleSubmit(e) {
    e.preventDefault();

    // Получаем данные формы
    const formData = new FormData(this.form);
    const data = {
      name: formData.get("name"),
      location: formData.get("location"),
      rating: formData.get("rating"),
      debt: formData.get("debt"),
      text: formData.get("text"),
      consent: formData.get("consent"),
    };

    // Валидация
    if (!this.validateForm(data)) {
      return;
    }

    // Показываем индикатор загрузки
    const submitButton = this.form.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    submitButton.innerHTML =
      '<svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Отправка...';
    submitButton.disabled = true;

    try {
      // Отправляем AJAX запрос
      const response = await fetch(udsc_ajax.ajaxurl, {
        method: "POST",
        body: formData,
        credentials: "same-origin",
      });

      const result = await response.json();

      if (result.success) {
        this.showNotification(
          "Спасибо за отзыв! Ваш отзыв отправлен на модерацию.",
          "success"
        );
        this.form.reset(); // Очищаем форму
        this.closeModal(); // Закрываем модальное окно
      } else {
        this.showNotification(
          result.data || "Произошла ошибка при отправке отзыва",
          "error"
        );
      }
    } catch (error) {
      console.error("Ошибка отправки формы:", error);
      this.showNotification(
        "Произошла ошибка при отправке отзыва. Попробуйте еще раз.",
        "error"
      );
    } finally {
      // Восстанавливаем кнопку
      submitButton.innerHTML = originalText;
      submitButton.disabled = false;
    }
  }

  validateForm(data) {
    const errors = [];

    if (!data.name || data.name.length < 2) {
      errors.push("Имя должно содержать минимум 2 символа");
    }

    if (!data.location || data.location.length < 2) {
      errors.push("Укажите ваш город");
    }

    if (!data.rating) {
      errors.push("Выберите оценку");
    }

    if (!data.debt || data.debt.length < 1) {
      errors.push("Укажите сумму долга");
    }

    if (!data.text || data.text.length < 10) {
      errors.push("Отзыв должен содержать минимум 10 символов");
    }

    if (!data.consent) {
      errors.push("Необходимо согласие на обработку персональных данных");
    }

    if (errors.length > 0) {
      this.showNotification(errors.join("<br>"), "error");
      return false;
    }

    return true;
  }

  closeModal() {
    // Ищем модальное окно и закрываем его
    const modal = document.querySelector("#testimonial-modal");
    if (modal) {
      // Если используется Radix UI или другой модальный компонент
      const closeButton = modal.querySelector(
        '[data-state="open"] button[aria-label="Close"]'
      );
      if (closeButton) {
        closeButton.click();
      } else {
        // Fallback - скрываем модальное окно
        modal.style.display = "none";
        modal.setAttribute("data-state", "closed");
      }
    }
  }

  showNotification(message, type = "info") {
    // Удаляем существующие уведомления
    const existingNotifications = document.querySelectorAll(".notification");
    existingNotifications.forEach((notification) => notification.remove());

    // Создаем новое уведомление
    const notification = document.createElement("div");
    notification.className = `notification fixed top-4 right-4 z-[10000] p-4 rounded-lg shadow-lg max-w-sm ${
      type === "success"
        ? "bg-green-500 text-white"
        : type === "error"
        ? "bg-red-500 text-white"
        : "bg-blue-500 text-white"
    }`;

    notification.innerHTML = `
      <div class="flex items-start">
        <div class="flex-shrink-0">
          ${
            type === "success"
              ? '<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>'
              : type === "error"
              ? '<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>'
              : '<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>'
          }
        </div>
        <div class="ml-3 flex-1">
          <p class="text-sm font-medium">${message}</p>
        </div>
        <div class="ml-4 flex-shrink-0">
          <button class="inline-flex text-white hover:text-white/75 focus:outline-none" onclick="this.parentElement.parentElement.parentElement.remove()">
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
        </div>
      </div>
    `;

    document.body.appendChild(notification);

    // Анимация появления
    setTimeout(() => {
      notification.style.transform = "translateX(0)";
      notification.style.opacity = "1";
    }, 10);

    // Автоматическое скрытие через 5 секунд
    setTimeout(() => {
      if (notification.parentElement) {
        notification.style.transform = "translateX(100%)";
        notification.style.opacity = "0";
        setTimeout(() => {
          if (notification.parentElement) {
            notification.remove();
          }
        }, 300);
      }
    }, 5000);
  }
}

// Автоматическая инициализация всех форм отзывов
document.addEventListener("DOMContentLoaded", function () {
  const testimonialForms = document.querySelectorAll(
    'form[id^="testimonial-modal-form"]'
  );

  testimonialForms.forEach((form) => {
    new TestimonialFormHandler(form.id);
  });
});

console.log("Testimonial form loaded");
