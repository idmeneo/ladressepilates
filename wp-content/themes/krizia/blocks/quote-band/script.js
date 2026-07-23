(function () {
  function initQuoteBand(block) {
    var swiperEl = block.querySelector('.krz-quote-band__swiper');
    var nav = block.querySelector('.krz-quote-band__nav');
    var buttons = block.querySelectorAll('.krz-quote-band__nav-button');
    var progress = block.querySelector('.krz-quote-band__pagination span');
    var backgroundLayers = block.querySelectorAll(
      '.krz-quote-band__background'
    );

    var activeBackgroundLayer = 0;
    var currentBackground = '';

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

    var backgroundTimeout = null;

    function getBackgroundImage(url) {
      return (
        "linear-gradient(rgba(50,35,27,.44), rgba(50,35,27,.44)), " +
        "url('" + url + "')"
      );
    }

    function preloadBackground(url, callback) {
      var image = new Image();

      image.onload = callback;

      image.onerror = function () {
        callback();
      };

      image.src = url;
    }

    function updateBackground(index, immediate) {
      var slide = swiper.slides[index];

      if (!slide || backgroundLayers.length < 2) {
        return;
      }

      var background = slide.getAttribute('data-quote-background');

      if (!background || background === currentBackground) {
        return;
      }

      if (immediate) {
        backgroundLayers[0].style.backgroundImage =
          getBackgroundImage(background);

        backgroundLayers[0].classList.add('is-active');
        backgroundLayers[1].classList.remove('is-active');

        activeBackgroundLayer = 0;
        currentBackground = background;

        return;
      }

      preloadBackground(background, function () {
        var nextBackgroundLayer =
          activeBackgroundLayer === 0 ? 1 : 0;

        var currentLayer = backgroundLayers[activeBackgroundLayer];
        var nextLayer = backgroundLayers[nextBackgroundLayer];

        nextLayer.style.backgroundImage =
          getBackgroundImage(background);

        /*
        * On force le navigateur à prendre en compte la nouvelle image
        * avant de lancer la transition d’opacité.
        */
        void nextLayer.offsetWidth;

        nextLayer.classList.add('is-active');
        currentLayer.classList.remove('is-active');

        activeBackgroundLayer = nextBackgroundLayer;
        currentBackground = background;
      });
    }

    function setActive(index, immediate) {
      buttons.forEach(function (button, buttonIndex) {
        button.classList.toggle(
          'is-active',
          buttonIndex === index
        );
      });

      centerActiveButton(index);
      updateProgress(index);
      updateBackground(index, immediate);
    }

    buttons.forEach(function (button, index) {
      button.addEventListener('click', function () {
        swiper.slideTo(index);
      });
    });

    swiper.on('slideChange', function () {
      setActive(swiper.activeIndex);
    });

    setActive(swiper.activeIndex, true);
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