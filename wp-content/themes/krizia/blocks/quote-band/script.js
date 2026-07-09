(function () {
  function initQuoteBand(block) {
    var swiperEl = block.querySelector('.krz-quote-band__swiper');
    var buttons = block.querySelectorAll('.krz-quote-band__nav-button');

    if (!swiperEl || typeof window.Swiper !== 'function') {
      return;
    }

    if (swiperEl.swiper) {
      return;
    }

    var swiper = new window.Swiper(swiperEl, {
      slidesPerView: 1,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      autoHeight: true,
      allowTouchMove: true,
      speed: 350
    });

    function setActive(index) {
      buttons.forEach(function (button, buttonIndex) {
        button.classList.toggle('is-active', buttonIndex === index);
      });
    }

    buttons.forEach(function (button, index) {
      button.addEventListener('click', function () {
        swiper.slideTo(index);
        setActive(index);
      });
    });

    swiper.on('slideChange', function () {
      setActive(swiper.activeIndex);
    });
  }

  function initAllQuoteBands() {
    document.querySelectorAll('.krz-quote-band').forEach(initQuoteBand);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAllQuoteBands);
  } else {
    initAllQuoteBands();
  }

  if (window.acf) {
    window.acf.addAction('render_block_preview/type=krizia-quote-band', initAllQuoteBands);
  }
})();