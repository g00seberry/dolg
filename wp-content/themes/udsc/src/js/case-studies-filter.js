/**
 * Case Studies Filter JavaScript
 * Handles asynchronous filtering of case studies
 */

(function ($) {
  "use strict";

  const CaseStudiesFilter = {
    init: function () {
      this.bindEvents();
      this.loadInitialData();
    },

    bindEvents: function () {
      // Apply filters button
      $("#apply-filters").on("click", this.applyFilters.bind(this));

      // Reset filters button
      $("#reset-filters").on("click", this.resetFilters.bind(this));
    },

    loadInitialData: function () {
      // Load initial cases count
      this.applyFilters();
    },

    applyFilters: function () {
      // Check if AJAX data is available
      if (typeof udsc_ajax === "undefined") {
        console.error(
          "udsc_ajax is not defined. Make sure you are on the case studies archive page."
        );
        this.showError("Ошибка инициализации фильтров");
        return;
      }

      const formData = {
        action: "filter_case_studies",
        nonce: udsc_ajax.nonce,
        year: $('select[name="year"]').val(),
        region: $('select[name="region"]').val(),
        debt_range: $('select[name="debt_range"]').val(),
      };

      // Show loading state
      this.showLoading();

      $.ajax({
        url: udsc_ajax.ajax_url,
        type: "POST",
        data: formData,
        success: this.handleSuccess.bind(this),
        error: this.handleError.bind(this),
      });
    },

    resetFilters: function () {
      $('select[name="year"]').val("all");
      $('select[name="region"]').val("all");
      $('select[name="debt_range"]').val("all");
      this.applyFilters();
    },

    handleSuccess: function (response) {
      this.hideLoading();

      if (response.success) {
        // Update cases count
        $("#cases-count").text(response.count);

        // Update cases grid
        $(".cases-grid-container").html(response.html);

        // Scroll to cases section
        $("html, body").animate(
          {
            scrollTop: $(".cases-grid-container").offset().top - 100,
          },
          500
        );
      } else {
        this.showError("Ошибка при загрузке данных");
      }
    },

    handleError: function (xhr, status, error) {
      this.hideLoading();
      this.showError("Произошла ошибка при загрузке данных");
      console.error("AJAX Error:", error);
    },

    showLoading: function () {
      const loadingHtml = `
                <div class="flex items-center justify-center py-12">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
                    <span class="ml-2 text-muted-foreground">Загрузка...</span>
                </div>
            `;
      $(".cases-grid-container").html(loadingHtml);
      $("#apply-filters").prop("disabled", true).text("Загрузка...");
    },

    hideLoading: function () {
      $("#apply-filters").prop("disabled", false).text("Применить фильтры");
    },

    showError: function (message) {
      const errorHtml = `
                <div class="p-12 text-center rounded-lg border bg-card text-card-foreground shadow-sm">
                    <svg class="h-12 w-12 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Ошибка</h3>
                    <p class="text-muted-foreground">${message}</p>
                </div>
            `;
      $(".cases-grid-container").html(errorHtml);
    },
  };

  // Initialize when document is ready
  $(document).ready(function () {
    if ($("#case-studies-filter").length && typeof udsc_ajax !== "undefined") {
      CaseStudiesFilter.init();
    }
  });
})(jQuery);
