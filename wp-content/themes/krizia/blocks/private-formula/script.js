(function () {
  var instances = [];

  function updateProgress(swiper, progress) {
    if (!swiper || !progress || !swiper.slides || !swiper.slides.length) {
      return;
    }

    var total = swiper.slides.length;
    var width = 100 / total;

    progress.style.width = width + '%';
    progress.style.transform =
      'translateX(' + swiper.activeIndex * 100 + '%)';
  }

  function initPrivateFormulaSwiper() {
    var blocks = document.querySelectorAll('.krz-private-formula');

    blocks.forEach(function (block) {
      var container = block.querySelector(
        '.krz-private-formula__swiper'
      );

      var progress = block.querySelector(
        '.krz-private-formula__pagination span'
      );

      if (!container || typeof window.Swiper !== 'function') {
        return;
      }

      var existing = instances.find(function (item) {
        return item.container === container;
      });

      var shouldEnable = window
        .matchMedia('(max-width: 991.98px)')
        .matches;

      if (shouldEnable && !existing) {
        var swiper = new window.Swiper(container, {
          slidesPerView: 'auto',
          slidesPerGroup: 1,
          centeredSlides: true,
          centeredSlidesBounds: false,
          centerInsufficientSlides: true,
          spaceBetween: 16,
          grabCursor: true,
          watchOverflow: true,

          on: {
            init: function () {
              updateProgress(this, progress);
            },

            slideChange: function () {
              updateProgress(this, progress);
            },

            resize: function () {
              updateProgress(this, progress);
            },

            slidesLengthChange: function () {
              updateProgress(this, progress);
            }
          }
        });

        instances.push({
          container: container,
          swiper: swiper
        });
      }

      if (!shouldEnable && existing) {
        existing.swiper.destroy(true, true);

        instances = instances.filter(function (item) {
          return item.container !== container;
        });

        if (progress) {
          progress.style.width = '';
          progress.style.transform = '';
        }
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener(
      'DOMContentLoaded',
      initPrivateFormulaSwiper
    );
  } else {
    initPrivateFormulaSwiper();
  }

  window.addEventListener('resize', initPrivateFormulaSwiper);

  if (window.acf) {
    window.acf.addAction(
      'render_block_preview/type=krizia-private-formula',
      initPrivateFormulaSwiper
    );
  }
})();