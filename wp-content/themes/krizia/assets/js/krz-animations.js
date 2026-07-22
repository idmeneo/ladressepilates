(function () {
  'use strict';

  var animationSettings = {
    textCharsUp: {
      yPercent: 110,
      duration: 0.85,
      stagger: 0.035,
      ease: 'power3.out',
      start: 'top 85%'
    },

    fadeUp: {
      y: 40,
      duration: 0.7,
      ease: 'power2.out',
      start: 'top 88%'
    }
  };

  /**
   * Vérifie que GSAP et ses plugins sont disponibles.
   */
  function hasGsap() {
    return (
      typeof window.gsap !== 'undefined' &&
      typeof window.ScrollTrigger !== 'undefined' &&
      typeof window.SplitText !== 'undefined'
    );
  }

  /**
   * Anime un texte caractère par caractère.
   */
  function initCharsUpAnimation(element) {
    var settings = animationSettings.textCharsUp;

    var delay = parseFloat(
      element.getAttribute('data-krz-delay') || '0'
    );

    if (element.dataset.krzAnimationReady === 'true') {
      return;
    }

    element.dataset.krzAnimationReady = 'true';

    var settings = animationSettings.textCharsUp;

    var split = new SplitText(element, {
      type: 'words,chars',
      charsClass: 'krz-split-char',
      wordsClass: 'krz-split-word',
      aria: 'auto'
    });

    var animation = gsap.from(split.chars, {
      yPercent: settings.yPercent,
      opacity: 0,
      duration: settings.duration,
      stagger: settings.stagger,
      delay: delay,
      ease: settings.ease,
      paused: true
    });

    var trigger = ScrollTrigger.create({
      trigger: element,
      start: settings.start,
      once: true,

      onEnter: function () {
        animation.play();
      }
    });

    element.__krzSplitText = split;
    element.__krzAnimation = animation;
    element.__krzScrollTrigger = trigger;
  }

  /**
   * Anime un élément avec un fade-up.
   */
  function initFadeUpAnimation(element) {
    if (element.dataset.krzAnimationReady === 'true') {
      return;
    }

    element.dataset.krzAnimationReady = 'true';

    var settings = animationSettings.fadeUp;

    var delay = parseFloat(
      element.getAttribute('data-krz-delay') || '0'
    );

    var animation = gsap.from(element, {
      y: settings.y,
      opacity: 0,
      duration: settings.duration,
      delay: delay,
      ease: settings.ease,
      paused: true
    });

    var trigger = ScrollTrigger.create({
      trigger: element,
      start: settings.start,
      once: true,

      onEnter: function () {
        animation.play();
      }
    });

    element.__krzAnimation = animation;
    element.__krzScrollTrigger = trigger;
  }

  /**
   * Initialise les animations présentes dans un contexte.
   */
  function initKrzAnimations(context) {
    var root = context || document;

    var reduceMotion = window.matchMedia(
      '(prefers-reduced-motion: reduce)'
    ).matches;

    if (reduceMotion) {
      root
        .querySelectorAll('[data-krz-animation]')
        .forEach(function (element) {
          element.style.opacity = '';
          element.style.transform = '';
        });

      return;
    }

    if (!hasGsap()) {
      console.warn(
        'Krizia animations: GSAP, ScrollTrigger ou SplitText est absent.'
      );

      return;
    }

    gsap.registerPlugin(
      ScrollTrigger,
      SplitText
    );

    root
      .querySelectorAll(
        '[data-krz-animation="text-chars-up"]'
      )
      .forEach(function (element) {
        initCharsUpAnimation(element);
      });

    root
      .querySelectorAll(
        '[data-krz-animation="fade-up"]'
      )
      .forEach(function (element) {
        initFadeUpAnimation(element);
      });

    ScrollTrigger.refresh();
  }

  /**
   * Détruit une animation avant un nouveau rendu ACF.
   */
  function resetKrzAnimation(element) {
    if (element.__krzScrollTrigger) {
      element.__krzScrollTrigger.kill();
    }

    if (element.__krzAnimation) {
      element.__krzAnimation.kill();
    }

    if (element.__krzSplitText) {
      element.__krzSplitText.revert();
    }

    delete element.__krzScrollTrigger;
    delete element.__krzAnimation;
    delete element.__krzSplitText;

    delete element.dataset.krzAnimationReady;

    element.style.opacity = '';
    element.style.transform = '';
  }

  function resetKrzAnimations(context) {
    var root = context || document;

    root
      .querySelectorAll('[data-krz-animation]')
      .forEach(function (element) {
        resetKrzAnimation(element);
      });
  }

  /**
   * Front-end.
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
   * Aperçu des blocs ACF Gutenberg.
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

        resetKrzAnimations(context);
        initKrzAnimations(context);
      }
    );
  }

  /**
   * Fonctions pratiques pour la console.
   */
  window.initKrzAnimations = initKrzAnimations;
  window.resetKrzAnimations = resetKrzAnimations;
})();