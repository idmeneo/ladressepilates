(function () {
  'use strict';

  var instances = [];
  var mobileQuery = window.matchMedia(
    '(max-width: 991.98px)'
  );

  function updateProgress(swiper, progress) {
    if (
      !swiper ||
      !progress ||
      !swiper.slides ||
      !swiper.slides.length
    ) {
      return;
    }

    var total = swiper.slides.length;
    var width = 100 / total;

    progress.style.width = width + '%';
    progress.style.transform =
      'translateX(' + swiper.activeIndex * 100 + '%)';
  }

  function findInstance(container) {
    return instances.find(function (item) {
      return item.container === container;
    });
  }

  function getFeaturedSlideIndex(container) {
    var slides = Array.prototype.slice.call(
      container.querySelectorAll('.swiper-slide')
    );

    return slides.findIndex(function (slide) {
      return Boolean(
        slide.querySelector(
          '.krz-private-course__card.is-featured'
        )
      );
    });
  }

  function resetDesktopLayout(container, progress) {
    var wrapper = container.querySelector(
      '.krz-private-course__packages'
    );

    var slides = container.querySelectorAll(
      '.swiper-slide'
    );

    container.style.removeProperty('overflow');

    if (wrapper) {
      wrapper.style.removeProperty('transform');
      wrapper.style.removeProperty(
        'transition-duration'
      );
      wrapper.style.removeProperty(
        'transition-delay'
      );
      wrapper.style.removeProperty('width');
      wrapper.style.removeProperty('height');
    }

    slides.forEach(function (slide) {
      slide.style.removeProperty('width');
      slide.style.removeProperty('height');
      slide.style.removeProperty('margin-right');
      slide.style.removeProperty('transform');
    });

    if (progress) {
      progress.style.removeProperty('width');
      progress.style.removeProperty('transform');
    }

    void container.offsetWidth;
  }

  function createSwiper(container, progress) {
    var featuredIndex =
      getFeaturedSlideIndex(container);

    var initialIndex =
      featuredIndex >= 0
        ? featuredIndex
        : 0;

    var swiper = new window.Swiper(container, {
      initialSlide: initialIndex,

      slidesPerView: 'auto',
      slidesPerGroup: 1,

      centeredSlides: true,
      centeredSlidesBounds: true,
      centerInsufficientSlides: true,

      spaceBetween: 16,
      grabCursor: true,
      watchOverflow: true,

      observer: true,
      observeParents: true,
      observeSlideChildren: true,

      on: {
        init: function () {
          updateProgress(this, progress);

          if (featuredIndex >= 0) {
            this.slideTo(
              featuredIndex,
              0,
              false
            );
          }
        },

        slideChange: function () {
          updateProgress(this, progress);
        },

        resize: function () {
          updateProgress(this, progress);
        },

        observerUpdate: function () {
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

  function destroySwiper(instance, progress) {
    var container = instance.container;

    instance.swiper.destroy(true, false);

    instances = instances.filter(function (item) {
      return item.container !== container;
    });

    resetDesktopLayout(container, progress);
  }

  function updatePrivateCourseSwiper() {
    var blocks = document.querySelectorAll(
      '.krz-private-course'
    );

    blocks.forEach(function (block) {
      var container = block.querySelector(
        '.krz-private-course__swiper'
      );

      var progress = block.querySelector(
        '.krz-private-course__pagination span'
      );

      if (
        !container ||
        typeof window.Swiper !== 'function'
      ) {
        return;
      }

      var existing = findInstance(container);

      if (mobileQuery.matches) {
        if (!existing) {
          createSwiper(container, progress);
        }

        return;
      }

      if (existing) {
        destroySwiper(existing, progress);
      } else {
        resetDesktopLayout(
          container,
          progress
        );
      }
    });
  }

  function init() {
    updatePrivateCourseSwiper();

    if (
      typeof mobileQuery.addEventListener ===
      'function'
    ) {
      mobileQuery.addEventListener(
        'change',
        updatePrivateCourseSwiper
      );
    } else {
      mobileQuery.addListener(
        updatePrivateCourseSwiper
      );
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener(
      'DOMContentLoaded',
      init
    );
  } else {
    init();
  }

  if (window.acf) {
    window.acf.addAction(
      'render_block_preview/type=krizia-private-course',
      updatePrivateCourseSwiper
    );
  }
})();