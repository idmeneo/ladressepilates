(function () {
  var instances = [];

  function initPrivateFormulaSwiper() {
    var blocks = document.querySelectorAll('.krz-private-formula');

    blocks.forEach(function (block) {
      var container = block.querySelector('.krz-private-formula__swiper');
      var pagination = block.querySelector('.krz-private-formula__pagination');

      if (!container || typeof window.Swiper !== 'function') {
        return;
      }

      var existing = instances.find(function (item) {
        return item.container === container;
      });

      var shouldEnable = window.matchMedia('(max-width: 991.98px)').matches;

      if (shouldEnable && !existing) {
        instances.push({
          container: container,
          swiper: new window.Swiper(container, {
            slidesPerView: 'auto',
            slidesPerGroup: 1,
            centeredSlides: true,
            centeredSlidesBounds: false,
            centerInsufficientSlides: true,
            spaceBetween: 16,
            grabCursor: true,
            pagination: {
              el: pagination,
              clickable: true
            },
            watchOverflow: true
          })
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
    document.addEventListener('DOMContentLoaded', initPrivateFormulaSwiper);
  } else {
    initPrivateFormulaSwiper();
  }

  window.addEventListener('resize', initPrivateFormulaSwiper);
})();