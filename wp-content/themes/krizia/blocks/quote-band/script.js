(function () {
  function initQuoteBand(block) {
    var swiperEl = block.querySelector('.krz-quote-band__swiper');
    var nav = block.querySelector('.krz-quote-band__nav');
    var buttons = block.querySelectorAll('.krz-quote-band__nav-button');
    var progress = block.querySelector('.krz-quote-band__pagination span');

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

    function centerActiveButton(index) {
      var activeButton = buttons[index];

      if (!nav || !activeButton) {
        return;
      }

      var navRect = nav.getBoundingClientRect();
      var buttonRect = activeButton.getBoundingClientRect();

      var offset =
        buttonRect.left -
        navRect.left -
        navRect.width / 2 +
        buttonRect.width / 2;

      nav.scrollTo({
        left: nav.scrollLeft + offset,
        behavior: 'smooth'
      });
    }

    function updateProgress(index) {
      if (!progress || !buttons.length) {
        return;
      }

      var width = 100 / buttons.length;
      progress.style.width = width + '%';
      progress.style.transform = 'translateX(' + index * 100 + '%)';
    }

    function setActive(index) {
      buttons.forEach(function (button, buttonIndex) {
        button.classList.toggle('is-active', buttonIndex === index);
      });

      centerActiveButton(index);
      updateProgress(index);
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

    setActive(0);
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