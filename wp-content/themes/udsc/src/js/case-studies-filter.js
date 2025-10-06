/**
 * Case Studies Filter JavaScript
 * Handles asynchronous filtering of case studies
 */

(function ($) {
  "use strict";

  const CaseStudiesFilter = {
    currentPage: 1,
    currentFilters: {},

    init: function () {
      this.bindEvents();
      this.loadInitialData();
    },

    bindEvents: function () {
      // Apply filters button
      $("#apply-filters").on(
        "click",
        function (e) {
          e.preventDefault();
          this.applyFilters();
        }.bind(this)
      );

      // Reset filters button
      $("#reset-filters").on(
        "click",
        function (e) {
          e.preventDefault();
          this.resetFilters();
        }.bind(this)
      );

      // Pagination buttons
      $(document).on(
        "click",
        ".pagination-btn",
        function (e) {
          this.handlePagination(e);
        }.bind(this)
      );
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

      // Reset to first page when applying filters
      this.currentPage = 1;

      const formData = {
        action: "filter_case_studies",
        nonce: udsc_ajax.nonce,
        year: $('select[name="year"]').val(),
        region: $('select[name="region"]').val(),
        debt_range: $('select[name="debt_range"]').val(),
        page: this.currentPage,
      };

      // Store current filters
      this.currentFilters = {
        year: formData.year,
        region: formData.region,
        debt_range: formData.debt_range,
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

    handlePagination: function (e) {
      e.preventDefault();

      const page = parseInt($(e.target).data("page"));
      if (page && page !== this.currentPage) {
        this.currentPage = page;
        this.loadPage(page);
      }
    },

    loadPage: function (page) {
      if (typeof udsc_ajax === "undefined") {
        console.error("udsc_ajax is not defined");
        return;
      }

      const formData = {
        action: "filter_case_studies",
        nonce: udsc_ajax.nonce,
        year: this.currentFilters.year || "all",
        region: this.currentFilters.region || "all",
        debt_range: this.currentFilters.debt_range || "all",
        page: page,
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

        // Update pagination if available
        if (response.pagination) {
          // Find and replace pagination
          const $container = $(".cases-grid-container");
          const $existingPagination = $container.find(
            ".flex.items-center.justify-center.gap-2"
          );
          if ($existingPagination.length) {
            $existingPagination.replaceWith(response.pagination);
          } else {
            $container.append(response.pagination);
          }
        }

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
      console.error("AJAX Error:", error);
      this.showError("Произошла ошибка при загрузке данных");
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
