(function () {
  'use strict';

  var sectionSelector = '[data-krz-animation-section]';
  var elementSelector = '[data-krz-animate]';
  var initializedAttribute = 'data-krz-animation-ready';

  /**
   * Retourne le nom complet de la classe Animate.css.
   *
   * bounceInLeft devient animate__bounceInLeft.
   */
  function getAnimationClass(element) {
    var animation = element.getAttribute('data-krz-animate');

    if (!animation) {
      return '';
    }

    if (animation.indexOf('animate__') === 0) {
      return animation;
    }

    return 'animate__' + animation;
  }

  /**
   * Convertit une valeur HTML en nombre.
   */
  function parseNumber(value) {
    if (value === null || value === '') {
      return null;
    }

    var parsed = parseInt(value, 10);

    return Number.isNaN(parsed) ? null : parsed;
  }

  /**
   * Prépare le délai et la durée d’un élément.
   */
  function prepareElement(element, index) {
    var explicitDelay = parseNumber(
      element.getAttribute('data-krz-delay')
    );

    var delayStep = parseNumber(
      element.getAttribute('data-krz-delay-step')
    );

    var duration = parseNumber(
      element.getAttribute('data-krz-duration')
    );

    var delay = explicitDelay;

    if (delay === null && delayStep !== null) {
      delay = index * delayStep;
    }

    if (delay !== null) {
      element.style.animationDelay = delay + 'ms';
    }

    if (duration !== null) {
      element.style.animationDuration = duration + 'ms';
    }
  }

  /**
   * Lance l’animation.
   */
  function animateElement(element) {
    if (element.getAttribute('data-krz-animated') === 'true') {
      return;
    }

    var animationClass = getAnimationClass(element);

    if (!animationClass) {
      return;
    }

    element.setAttribute('data-krz-animated', 'true');

    /*
     * Deux frames permettent au navigateur de calculer
     * correctement l’état initial.
     */
    window.requestAnimationFrame(function () {
      element.classList.add('krz-animation-pending');

      window.requestAnimationFrame(function () {
        element.classList.remove('krz-animation-pending');

        element.classList.add(
          'animate__animated',
          animationClass
        );

        element.addEventListener(
          'animationend',
          function handleAnimationEnd() {
            element.classList.add('krz-animation-complete');

            element.removeEventListener(
              'animationend',
              handleAnimationEnd
            );
          }
        );
      });
    });
  }

  /**
   * Initialise une section.
   */
  function initAnimationSection(section) {
    if (
      section.getAttribute(initializedAttribute) === 'true'
    ) {
      return;
    }

    var elements = section.querySelectorAll(elementSelector);

    if (!elements.length) {
      return;
    }

    section.setAttribute(initializedAttribute, 'true');

    elements.forEach(function (element, index) {
      prepareElement(element, index);
    });

    var reduceMotion = window.matchMedia(
      '(prefers-reduced-motion: reduce)'
    ).matches;

    /*
     * En réduction des mouvements, on laisse simplement
     * les contenus visibles.
     */
    if (reduceMotion) {
      elements.forEach(function (element) {
        element.classList.add('krz-animation-complete');
      });

      return;
    }

    /*
     * Fallback pour les anciens navigateurs.
     */
    if (!('IntersectionObserver' in window)) {
      elements.forEach(function (element) {
        animateElement(element);
      });

      return;
    }

    /*
     * Chaque élément est observé séparément.
     * Les animations se déclenchent donc aussi au scroll.
     */
    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) {
            return;
          }

          animateElement(entry.target);
          observer.unobserve(entry.target);
        });
      },
      {
        threshold: 0.05,
        rootMargin: '0px 0px -5% 0px'
      }
    );

    elements.forEach(function (element) {
      observer.observe(element);
    });
  }

  /**
   * Initialise les animations dans un contexte donné.
   */
  function initKrzAnimations(context) {
    var root = context || document;
    var sections = [];

    if (
      root.matches &&
      root.matches(sectionSelector)
    ) {
      sections.push(root);
    }

    if (root.querySelectorAll) {
      root
        .querySelectorAll(sectionSelector)
        .forEach(function (section) {
          sections.push(section);
        });
    }

    sections.forEach(function (section) {
      initAnimationSection(section);
    });
  }

  /**
   * Réinitialise un bloc ACF après son rendu.
   */
  function resetAnimationContext(context) {
    if (!context) {
      return;
    }

    var sections = [];

    if (
      context.matches &&
      context.matches(sectionSelector)
    ) {
      sections.push(context);
    }

    if (context.querySelectorAll) {
      context
        .querySelectorAll(sectionSelector)
        .forEach(function (section) {
          sections.push(section);
        });
    }

    sections.forEach(function (section) {
      section.removeAttribute(initializedAttribute);

      section
        .querySelectorAll(elementSelector)
        .forEach(function (element) {
          var animationClass = getAnimationClass(element);

          element.removeAttribute('data-krz-animated');
          element.classList.remove(
            'animate__animated',
            'krz-animation-pending',
            'krz-animation-complete'
          );

          if (animationClass) {
            element.classList.remove(animationClass);
          }
        });
    });
  }

  /**
   * Initialisation front-end.
   */
  function onReady() {
    initKrzAnimations(document);
  }

  if (document.readyState === 'loading') {
    document.addEventListener(
      'DOMContentLoaded',
      onReady
    );
  } else {
    onReady();
  }

  /**
   * Aperçu ACF Gutenberg.
   */
  if (
    window.acf &&
    typeof window.acf.addAction === 'function'
  ) {
    window.acf.addAction(
      'render_block_preview',
      function ($block) {
        var context =
          $block && $block[0]
            ? $block[0]
            : document;

        resetAnimationContext(context);
        initKrzAnimations(context);
      }
    );
  }

  window.initKrzAnimations = initKrzAnimations;
})( );