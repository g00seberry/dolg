/**
 * Contact Form JavaScript
 *
 * Обработка формы контактов: валидация, маска телефона, отправка
 *
 * @package udsc
 * @since 1.0.0
 */

class ContactFormHandler {
  constructor() {
    this.form = document.getElementById("contact-form");
    if (!this.form) return;

    this.init();
  }

  init() {
    this.setupPhoneMask();
    this.setupFormValidation();
    this.setupFormSubmission();
    this.showSuccessMessage();
  }

  /**
   * Настройка маски для телефона
   */
  setupPhoneMask() {
    const phoneInput = this.form.querySelector("#contact-form_phone");
    if (!phoneInput) return;

    phoneInput.addEventListener("input", (e) => {
      let value = e.target.value.replace(/\D/g, "");

      if (value.length > 0) {
        if (value[0] === "8") {
          value = "7" + value.slice(1);
        }
        if (value[0] !== "7") {
          value = "7" + value;
        }
      }

      let formattedValue = "";
      if (value.length > 0) {
        formattedValue = "+7";
        if (value.length > 1) {
          formattedValue += " (" + value.slice(1, 4);
        }
        if (value.length >= 4) {
          formattedValue += ") " + value.slice(4, 7);
        }
        if (value.length >= 7) {
          formattedValue += "-" + value.slice(7, 9);
        }
        if (value.length >= 9) {
          formattedValue += "-" + value.slice(9, 11);
        }
      }

      e.target.value = formattedValue;
    });

    phoneInput.addEventListener("keydown", (e) => {
      // Разрешаем: backspace, delete, tab, escape, enter
      if (
        [8, 9, 27, 13, 46].indexOf(e.keyCode) !== -1 ||
        // Разрешаем: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
        (e.keyCode === 65 && e.ctrlKey === true) ||
        (e.keyCode === 67 && e.ctrlKey === true) ||
        (e.keyCode === 86 && e.ctrlKey === true) ||
        (e.keyCode === 88 && e.ctrlKey === true) ||
        // Разрешаем: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 40)
      ) {
        return;
      }
      // Убеждаемся, что это число
      if (
        (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
        (e.keyCode < 96 || e.keyCode > 105)
      ) {
        e.preventDefault();
      }
    });
  }

  /**
   * Настройка валидации формы
   */
  setupFormValidation() {
    const inputs = this.form.querySelectorAll(
      "input[required], textarea[required], select[required]"
    );

    inputs.forEach((input) => {
      input.addEventListener("blur", () => this.validateField(input));
      input.addEventListener("input", () => this.clearFieldError(input));
    });
  }

  /**
   * Валидация отдельного поля
   */
  validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = "";

    // Проверка обязательных полей
    if (field.hasAttribute("required") && !value) {
      isValid = false;
      errorMessage = "Это поле обязательно для заполнения";
    }

    // Проверка email
    if (field.type === "email" && value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) {
        isValid = false;
        errorMessage = "Введите корректный email адрес";
      }
    }

    // Проверка телефона
    if (field.type === "tel" && value) {
      const phoneRegex = /^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/;
      if (!phoneRegex.test(value)) {
        isValid = false;
        errorMessage = "Введите корректный номер телефона";
      }
    }

    // Проверка длины сообщения
    if (field.name === "message" && value && value.length < 10) {
      isValid = false;
      errorMessage = "Сообщение должно содержать минимум 10 символов";
    }

    if (!isValid) {
      this.showFieldError(field, errorMessage);
    } else {
      this.clearFieldError(field);
    }

    return isValid;
  }

  /**
   * Показать ошибку поля
   */
  showFieldError(field, message) {
    this.clearFieldError(field);

    field.classList.add(
      "border-red-500",
      "focus:ring-red-500",
      "focus:border-red-500"
    );
    field.classList.remove(
      "border-slate-300",
      "focus:ring-primary",
      "focus:border-primary"
    );

    const errorDiv = document.createElement("div");
    errorDiv.className = "field-error text-red-500 text-xs mt-1";
    errorDiv.textContent = message;

    field.parentNode.appendChild(errorDiv);
  }

  /**
   * Очистить ошибку поля
   */
  clearFieldError(field) {
    field.classList.remove(
      "border-red-500",
      "focus:ring-red-500",
      "focus:border-red-500"
    );
    field.classList.add(
      "border-slate-300",
      "focus:ring-primary",
      "focus:border-primary"
    );

    const errorDiv = field.parentNode.querySelector(".field-error");
    if (errorDiv) {
      errorDiv.remove();
    }
  }

  /**
   * Настройка отправки формы
   */
  setupFormSubmission() {
    this.form.addEventListener("submit", (e) => {
      e.preventDefault();

      if (this.validateForm()) {
        this.submitForm();
      }
    });
  }

  /**
   * Валидация всей формы
   */
  validateForm() {
    const inputs = this.form.querySelectorAll(
      "input[required], textarea[required], select[required]"
    );
    let isFormValid = true;

    inputs.forEach((input) => {
      if (!this.validateField(input)) {
        isFormValid = false;
      }
    });

    return isFormValid;
  }

  /**
   * Отправка формы
   */
  async submitForm() {
    const submitButton = this.form.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;

    // Показываем состояние загрузки
    submitButton.disabled = true;
    submitButton.innerHTML = `
            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Отправка...
        `;

    try {
      const formData = new FormData(this.form);

      const response = await fetch(this.form.action || window.location.href, {
        method: "POST",
        body: formData,
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      });

      if (response.ok) {
        // Успешная отправка
        this.showSuccessMessage();
        this.form.reset();
      } else {
        throw new Error("Ошибка сервера");
      }
    } catch (error) {
      console.error("Ошибка отправки формы:", error);
      this.showErrorMessage(
        "Произошла ошибка при отправке сообщения. Попробуйте позже."
      );
    } finally {
      // Восстанавливаем кнопку
      submitButton.disabled = false;
      submitButton.innerHTML = originalText;
    }
  }

  /**
   * Показать сообщение об успехе
   */
  showSuccessMessage() {
    // Проверяем URL параметр
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("contact_sent") === "1") {
      this.showNotification(
        "Сообщение успешно отправлено! Мы свяжемся с вами в ближайшее время.",
        "success"
      );
    }
  }

  /**
   * Показать сообщение об ошибке
   */
  showErrorMessage(message) {
    this.showNotification(message, "error");
  }

  /**
   * Показать уведомление
   */
  showNotification(message, type = "info") {
    // Удаляем существующие уведомления
    const existingNotifications = document.querySelectorAll(
      ".contact-notification"
    );
    existingNotifications.forEach((notification) => notification.remove());

    const notification = document.createElement("div");
    notification.className = `contact-notification fixed top-4 right-4 z-50 max-w-sm p-4 rounded-lg shadow-lg ${
      type === "success"
        ? "bg-green-500 text-white"
        : type === "error"
        ? "bg-red-500 text-white"
        : "bg-blue-500 text-white"
    }`;

    notification.innerHTML = `
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    ${
                      type === "success"
                        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                        : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                    }
                </svg>
                <span>${message}</span>
                <button class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.parentElement.remove()">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;

    document.body.appendChild(notification);

    // Автоматически скрыть через 5 секунд
    setTimeout(() => {
      if (notification.parentNode) {
        notification.remove();
      }
    }, 5000);
  }
}

// Инициализация при загрузке DOM
document.addEventListener("DOMContentLoaded", () => {
  new ContactFormHandler();
});

// Экспорт для использования в других модулях
window.ContactFormHandler = ContactFormHandler;
