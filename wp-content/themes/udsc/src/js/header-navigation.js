(function () {
  class HeaderNavigation {
    constructor() {
      this.body = document.body;
      this.scrollLockCount = 0;
      this.previousOverflow = this.body.style.overflow || "";

      this.initCityDialog();
      this.initMegaMenu();
      this.initFortuneWheel();
    }

    // ----------------------------
    // City dialog
    // ----------------------------
    initCityDialog() {
      this.cityButton = document.querySelector("[data-city-dialog-open]");
      this.cityDialog = document.querySelector('[data-city-dialog="wrapper"]');
      this.selectedCityLabel = document.getElementById("selected-city-label");
      this.citySearchInput = document.getElementById("city-search-input");
      this.cityAlphabet = document.getElementById("city-alphabet");
      this.cityListContainer = document.getElementById("city-list");

      if (!this.cityButton || !this.cityDialog || !this.cityListContainer) {
        return;
      }

      const storedCity = window.localStorage.getItem("udscSelectedCity");
      if (storedCity) {
        this.selectedCityLabel.textContent = storedCity;
      }

      const citiesDataAttr = this.cityListContainer.dataset.cities || "{}";
      try {
        this.citiesData = JSON.parse(citiesDataAttr);
      } catch (error) {
        console.error("City list parsing error", error);
        this.citiesData = { popular: [], letter_a: [] };
      }

      this.alphabetButtons = Array.from(
        this.cityAlphabet
          ? this.cityAlphabet.querySelectorAll("button[data-letter]")
          : []
      );
      this.selectedLetter = "";
      this.searchQuery = "";

      this.cityButton.addEventListener("click", () => this.openCityDialog());
      this.cityDialog
        .querySelectorAll("[data-city-dialog-close]")
        .forEach((btn) => {
          btn.addEventListener("click", () => this.closeCityDialog());
        });

      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && this.cityDialogOpen) {
          this.closeCityDialog();
        }
      });

      if (this.cityDialog) {
        this.cityDialog.addEventListener("click", (event) => {
          if (event.target === this.cityDialog) {
            this.closeCityDialog();
          }
        });
      }

      if (this.citySearchInput) {
        this.citySearchInput.addEventListener("input", (event) => {
          this.searchQuery = event.target.value;
          this.renderCityList();
        });
      }

      this.alphabetButtons.forEach((button) => {
        button.addEventListener("click", () => {
          this.selectedLetter = button.dataset.letter || "";
          this.alphabetButtons.forEach((btn) => {
            btn.classList.remove("bg-primary", "text-primary-foreground");
            btn.classList.add("bg-accent");
          });

          if (this.selectedLetter === "") {
            this.resetAlphabetButtons();
          } else {
            button.classList.add("bg-primary", "text-primary-foreground");
            button.classList.remove("bg-accent");
          }

          this.renderCityList();
        });
      });

      this.renderCityList();
    }

    resetAlphabetButtons() {
      this.alphabetButtons.forEach((btn) => {
        if (btn.dataset.letter === "") {
          btn.classList.add("bg-primary", "text-primary-foreground");
          btn.classList.remove("bg-accent");
        } else {
          btn.classList.remove("bg-primary", "text-primary-foreground");
          btn.classList.add("bg-accent");
        }
      });
    }

    openCityDialog() {
      if (!this.cityDialog) return;
      this.cityDialog.classList.remove("hidden");
      this.cityDialog.setAttribute("aria-hidden", "false");
      this.cityButton.setAttribute("aria-expanded", "true");
      this.cityDialogOpen = true;
      this.lockScroll();

      if (this.citySearchInput) {
        setTimeout(() => this.citySearchInput.focus(), 100);
      }
    }

    closeCityDialog() {
      if (!this.cityDialog) return;
      this.cityDialog.classList.add("hidden");
      this.cityDialog.setAttribute("aria-hidden", "true");
      this.cityButton.setAttribute("aria-expanded", "false");
      this.cityDialogOpen = false;
      this.unlockScroll();

      this.searchQuery = "";
      if (this.citySearchInput) {
        this.citySearchInput.value = "";
      }
      this.selectedLetter = "";
      this.resetAlphabetButtons();
      this.renderCityList();
    }

    renderCityList() {
      if (!this.cityListContainer) return;

      const popular = Array.isArray(this.citiesData?.popular)
        ? this.citiesData.popular
        : [];
      const citiesA = Array.isArray(this.citiesData?.letter_a)
        ? this.citiesData.letter_a
        : [];

      let cities = [];

      if (this.searchQuery) {
        const searchLower = this.searchQuery.toLowerCase();
        const fullList = [...popular, ...citiesA];
        cities = fullList.filter((city) =>
          city.toLowerCase().includes(searchLower)
        );
      } else if (this.selectedLetter === "" || !this.selectedLetter) {
        cities = popular;
      } else if (this.selectedLetter === "А") {
        cities = citiesA;
      } else {
        const letterLower = this.selectedLetter.toLowerCase();
        cities = popular.filter((city) =>
          city.toLowerCase().startsWith(letterLower)
        );
      }

      if (!cities.length) {
        this.cityListContainer.innerHTML =
          '<div class="col-span-full text-center text-muted-foreground py-6 text-sm">' +
          "Города не найдены" +
          "</div>";
        return;
      }

      this.cityListContainer.innerHTML = cities
        .map(
          (city) =>
            `<button type="button" class="text-left px-2 py-1.5 hover:bg-accent rounded-lg transition-colors text-sm" data-city-select="${city}">${city}</button>`
        )
        .join("");

      this.cityListContainer
        .querySelectorAll("[data-city-select]")
        .forEach((button) => {
          button.addEventListener("click", () => {
            const city = button.dataset.citySelect || "";
            this.selectedCityLabel.textContent = city;
            try {
              window.localStorage.setItem("udscSelectedCity", city);
            } catch (error) {
              console.warn("Unable to store city", error);
            }
            this.closeCityDialog();
          });
        });
    }

    // ----------------------------
    // Mega menu
    // ----------------------------
    initMegaMenu() {
      this.megaTrigger = document.querySelector("[data-mega-trigger]");
      this.megaMenu = document.getElementById("bankruptcy-mega-menu");

      if (!this.megaTrigger || !this.megaMenu) {
        return;
      }

      this.megaBackdrop = this.megaMenu.querySelector("[data-mega-backdrop]");
      this.megaContent = this.megaMenu.querySelector("[data-mega-content]");
      this.megaIcon = this.megaTrigger.querySelector("[data-mega-icon]");

      this.megaTrigger.addEventListener("click", () => {
        this.isMegaOpen ? this.closeMegaMenu() : this.openMegaMenu();
      });

      if (this.megaBackdrop) {
        this.megaBackdrop.addEventListener("click", () => this.closeMegaMenu());
      }

      document.addEventListener("click", (event) => {
        if (!this.isMegaOpen) return;
        const target = event.target;
        if (
          !this.megaContent.contains(target) &&
          !this.megaTrigger.contains(target)
        ) {
          this.closeMegaMenu();
        }
      });

      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && this.isMegaOpen) {
          this.closeMegaMenu();
        }
      });

      window.addEventListener("resize", () => {
        if (this.isMegaOpen && window.innerWidth < 1024) {
          this.closeMegaMenu();
        }
      });
    }

    openMegaMenu() {
      if (!this.megaMenu) return;
      this.megaMenu.classList.remove("hidden");
      this.megaMenu.setAttribute("aria-hidden", "false");
      this.megaTrigger.setAttribute("aria-expanded", "true");
      this.isMegaOpen = true;
      if (this.megaIcon) {
        this.megaIcon.classList.add("rotate-180");
      }
      this.lockScroll();
    }

    closeMegaMenu() {
      if (!this.megaMenu) return;
      this.megaMenu.classList.add("hidden");
      this.megaMenu.setAttribute("aria-hidden", "true");
      this.megaTrigger.setAttribute("aria-expanded", "false");
      this.isMegaOpen = false;
      if (this.megaIcon) {
        this.megaIcon.classList.remove("rotate-180");
      }
      this.unlockScroll();
    }

    // ----------------------------
    // Fortune wheel
    // ----------------------------
    initFortuneWheel() {
      this.fortuneTrigger = document.querySelector("[data-fortune-trigger]");
      this.fortuneModal = document.getElementById("fortune-wheel-modal");
      this.fortuneResult = document.getElementById("fortune-wheel-result");
      this.fortuneSpinButton = document.getElementById("fortune-spin-button");
      this.fortuneWheelSvg = document.getElementById("fortune-wheel-svg");
      this.fortuneCanvasWrapper = document.getElementById(
        "fortune-wheel-canvas-wrapper"
      );
      this.fortuneCanvas = document.getElementById("fortune-fireworks-canvas");
      this.fortunePrizeTitle = document.getElementById("fortune-prize-title");
      this.fortunePrizeDescription = document.getElementById(
        "fortune-prize-description"
      );

      const prizesScript = document.getElementById("fortune-prizes-data");
      if (prizesScript) {
        try {
          this.fortunePrizes = JSON.parse(prizesScript.textContent || "[]");
        } catch (error) {
          console.error("Failed to parse fortune prizes", error);
          this.fortunePrizes = [];
        }
      } else {
        this.fortunePrizes = [];
      }

      if (
        !this.fortuneTrigger ||
        !this.fortuneModal ||
        !this.fortuneWheelSvg ||
        !this.fortuneSpinButton
      ) {
        return;
      }

      this.rotation = 0;
      this.isSpinning = false;
      this.showFireworks = false;

      this.fortuneTrigger.addEventListener("click", () =>
        this.openFortuneModal()
      );
      this.fortuneModal
        .querySelectorAll("[data-fortune-close]")
        .forEach((btn) =>
          btn.addEventListener("click", () => this.closeFortuneModal())
        );
      if (this.fortuneResult) {
        this.fortuneResult
          .querySelectorAll("[data-fortune-result-close]")
          .forEach((btn) =>
            btn.addEventListener("click", () => this.closeFortuneResult())
          );
      }

      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
          if (this.fortuneResultOpen) {
            this.closeFortuneResult();
          } else if (this.fortuneModalOpen) {
            this.closeFortuneModal();
          }
        }
      });

      this.fortuneSpinButton.addEventListener("click", () =>
        this.spinFortuneWheel()
      );
    }

    openFortuneModal() {
      this.fortuneModal.classList.remove("hidden");
      this.fortuneModal.setAttribute("aria-hidden", "false");
      this.fortuneModalOpen = true;
      this.lockScroll();
    }

    closeFortuneModal() {
      this.fortuneModal.classList.add("hidden");
      this.fortuneModal.setAttribute("aria-hidden", "true");
      this.fortuneModalOpen = false;
      this.unlockScroll();
      this.resetFortuneWheel();
    }

    closeFortuneResult() {
      if (this.fortuneResult) {
        this.fortuneResult.classList.add("hidden");
        this.fortuneResult.setAttribute("aria-hidden", "true");
      }
      this.fortuneResultOpen = false;
      this.closeFortuneModal();
      this.hideFireworks();
    }

    resetFortuneWheel() {
      this.rotation = 0;
      this.isSpinning = false;
      this.fortuneWheelSvg.style.transition = "none";
      this.fortuneWheelSvg.style.transform = "rotate(0deg)";
      this.fortuneSpinButton.disabled = false;
    }

    spinFortuneWheel() {
      if (
        this.isSpinning ||
        !Array.isArray(this.fortunePrizes) ||
        !this.fortunePrizes.length
      ) {
        return;
      }

      this.isSpinning = true;
      this.fortuneSpinButton.disabled = true;

      const randomRotation = Math.floor(Math.random() * 360) + 3600;
      this.rotation += randomRotation;

      this.fortuneWheelSvg.style.transition =
        "transform 10s cubic-bezier(0.17, 0.67, 0.12, 0.99)";
      this.fortuneWheelSvg.style.transform = `rotate(${this.rotation}deg)`;

      setTimeout(() => {
        const normalizedRotation = this.rotation % 360;
        const segmentAngle = 360 / this.fortunePrizes.length;
        const selectedIndex =
          Math.floor(
            (360 - normalizedRotation + segmentAngle / 2) / segmentAngle
          ) % this.fortunePrizes.length;

        const prize = this.fortunePrizes[selectedIndex];
        this.playFanfare();
        this.launchFireworks();
        this.showFortuneResult(prize);

        this.isSpinning = false;
        this.fortuneSpinButton.disabled = false;
        this.fortuneWheelSvg.style.transition = "none";
      }, 10000);
    }

    showFortuneResult(prize) {
      if (!prize || !this.fortuneResult) return;

      if (this.fortunePrizeTitle) {
        this.fortunePrizeTitle.textContent = prize.text || "";
      }
      if (this.fortunePrizeDescription) {
        this.fortunePrizeDescription.textContent = prize.description || "";
      }

      this.fortuneResult.classList.remove("hidden");
      this.fortuneResult.setAttribute("aria-hidden", "false");
      this.fortuneResultOpen = true;
    }

    hideFireworks() {
      if (this.fortuneCanvasWrapper) {
        this.fortuneCanvasWrapper.classList.add("hidden");
      }
      this.showFireworks = false;
    }

    launchFireworks() {
      if (!this.fortuneCanvasWrapper || !this.fortuneCanvas) {
        return;
      }

      this.fortuneCanvasWrapper.classList.remove("hidden");
      this.showFireworks = true;

      const canvas = this.fortuneCanvas;
      const ctx = canvas.getContext("2d");
      if (!ctx) return;

      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;

      const particles = [];
      const colors = [
        "#ff0000",
        "#00ff00",
        "#0000ff",
        "#ffff00",
        "#ff00ff",
        "#00ffff",
        "#ffa500",
      ];

      for (let i = 0; i < 5; i++) {
        setTimeout(() => {
          const x = Math.random() * canvas.width;
          const y = canvas.height * 0.3 + Math.random() * canvas.height * 0.3;

          for (let j = 0; j < 50; j++) {
            const angle = (Math.PI * 2 * j) / 50;
            const velocity = 2 + Math.random() * 3;
            particles.push({
              x,
              y,
              vx: Math.cos(angle) * velocity,
              vy: Math.sin(angle) * velocity,
              alpha: 1,
              color: colors[Math.floor(Math.random() * colors.length)],
            });
          }
        }, i * 400);
      }

      const animate = () => {
        if (!this.showFireworks) {
          ctx.clearRect(0, 0, canvas.width, canvas.height);
          return;
        }

        ctx.fillStyle = "rgba(0, 0, 0, 0.1)";
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        for (let i = particles.length - 1; i >= 0; i--) {
          const p = particles[i];
          p.x += p.vx;
          p.y += p.vy;
          p.vy += 0.1;
          p.alpha -= 0.01;

          if (p.alpha <= 0) {
            particles.splice(i, 1);
            continue;
          }

          ctx.beginPath();
          ctx.arc(p.x, p.y, 3, 0, Math.PI * 2);
          ctx.fillStyle = p.color;
          ctx.globalAlpha = p.alpha;
          ctx.fill();
          ctx.globalAlpha = 1;
        }

        if (particles.length > 0) {
          requestAnimationFrame(animate);
        } else {
          this.hideFireworks();
        }
      };

      animate();

      setTimeout(() => {
        this.hideFireworks();
      }, 3000);
    }

    playFanfare() {
      try {
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        if (!AudioContext) return;

        const audioContext = new AudioContext();
        const notes = [
          { freq: 523.25, start: 0, duration: 0.2 },
          { freq: 659.25, start: 0.2, duration: 0.2 },
          { freq: 783.99, start: 0.4, duration: 0.2 },
          { freq: 1046.5, start: 0.6, duration: 0.4 },
        ];

        notes.forEach((note) => {
          const oscillator = audioContext.createOscillator();
          const gainNode = audioContext.createGain();

          oscillator.connect(gainNode);
          gainNode.connect(audioContext.destination);

          oscillator.frequency.value = note.freq;
          oscillator.type = "sine";

          const startTime = audioContext.currentTime + note.start;
          gainNode.gain.setValueAtTime(0.3, startTime);
          gainNode.gain.exponentialRampToValueAtTime(
            0.01,
            startTime + note.duration
          );

          oscillator.start(startTime);
          oscillator.stop(startTime + note.duration);
        });
      } catch (error) {
        console.warn("Fanfare playback failed", error);
      }
    }

    // ----------------------------
    // Helpers
    // ----------------------------
    lockScroll() {
      if (this.scrollLockCount === 0) {
        this.previousOverflow = this.body.style.overflow || "";
      }
      this.scrollLockCount += 1;
      this.body.style.overflow = "hidden";
    }

    unlockScroll() {
      if (this.scrollLockCount > 0) {
        this.scrollLockCount -= 1;
      }

      if (this.scrollLockCount === 0) {
        const mobileMenu = document.getElementById("mobile-menu");
        const isMobileMenuOpen =
          mobileMenu && !mobileMenu.classList.contains("hidden");
        if (
          !isMobileMenuOpen &&
          !this.cityDialogOpen &&
          !this.isMegaOpen &&
          !this.fortuneModalOpen &&
          !this.fortuneResultOpen
        ) {
          this.body.style.overflow = this.previousOverflow || "";
        }
      }
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    new HeaderNavigation();
  });
})();

