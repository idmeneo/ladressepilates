(function () {
  var instances = [];

  function updateProgress(swiper, progress) {
    if (!swiper || !progress || !swiper.slides || !swiper.slides.length) {
      return;
    }

    var total = swiper.slides.length;
    var width = 100 / total;

    progress.style.width = width + '%';
    progress.style.transform = 'translateX(' + swiper.activeIndex * 100 + '%)';
  }

  function initArticlesSwiper() {
    var blocks = document.querySelectorAll('.krz-articles');

    blocks.forEach(function (block) {
      var container = block.querySelector('.krz-articles__swiper');
      var progress = block.querySelector('.krz-articles__pagination span');

      if (!container || typeof window.Swiper !== 'function') {
        return;
      }

      var existing = instances.find(function (item) {
        return item.container === container;
      });

      var shouldEnable = window.matchMedia('(max-width: 991.98px)').matches;

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
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initArticlesSwiper);
  } else {
    initArticlesSwiper();
  }

  window.addEventListener('resize', initArticlesSwiper);

  if (window.acf) {
    window.acf.addAction('render_block_preview/type=krizia-articles', initArticlesSwiper);
  }
})();