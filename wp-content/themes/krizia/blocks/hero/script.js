(function () {
  function initHeroAnimations() {
    var heroes = document.querySelectorAll('.krz-hero');

    if (!heroes.length) {
      return;
    }

    heroes.forEach(function (hero) {
      if (hero.dataset.animationInitialized === 'true') {
        return;
      }

      hero.dataset.animationInitialized = 'true';

      var elements = hero.querySelectorAll('.krz-hero__animate');

      if (!elements.length) {
        return;
      }

      function animateElements() {
        elements.forEach(function (element, index) {
          element.style.setProperty(
            '--animate-delay',
            index * 120 + 'ms'
          );

          element.classList.add(
            'animate__animated',
            'animate__bounceInLeft'
          );
        });
      }

      if (!('IntersectionObserver' in window)) {
        animateElements();
        return;
      }

      var observer = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) {
              return;
            }

            animateElements();
            observer.unobserve(entry.target);
          });
        },
        {
          threshold: 0.25,
          rootMargin: '0px 0px -8% 0px'
        }
      );

      observer.observe(hero);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener(
      'DOMContentLoaded',
      initHeroAnimations
    );
  } else {
    initHeroAnimations();
  }

  if (window.acf) {
    window.acf.addAction(
      'render_block_preview/type=krizia-hero',
      initHeroAnimations
    );
  }
})();