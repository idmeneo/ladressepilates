(function () {
  function getAnswerHeight(answer) {
    var inner = answer.querySelector('.krz-faq__answer-inner');
    return inner ? inner.offsetHeight : answer.scrollHeight;
  }

  function openItem(item, button, answer) {
    item.classList.add('is-open');
    button.setAttribute('aria-expanded', 'true');

    answer.hidden = false;
    answer.style.height = '0px';

    requestAnimationFrame(function () {
      answer.style.height = getAnswerHeight(answer) + 'px';
    });

    answer.addEventListener('transitionend', function handler(event) {
      if (event.propertyName !== 'height') {
        return;
      }

      answer.style.height = 'auto';
      answer.removeEventListener('transitionend', handler);
    });
  }

  function closeItem(item, button, answer) {
    answer.hidden = false;
    answer.style.height = getAnswerHeight(answer) + 'px';

    requestAnimationFrame(function () {
      item.classList.remove('is-open');
      button.setAttribute('aria-expanded', 'false');
      answer.style.height = '0px';
    });

    answer.addEventListener('transitionend', function handler(event) {
      if (event.propertyName !== 'height') {
        return;
      }

      answer.hidden = true;
      answer.removeEventListener('transitionend', handler);
    });
  }

  function initFaq(block) {
    var items = block.querySelectorAll('.krz-faq__item');

    items.forEach(function (item) {
      var button = item.querySelector('.krz-faq__question');
      var answer = item.querySelector('.krz-faq__answer');

      if (!button || !answer || button.dataset.krzFaqReady === 'true') {
        return;
      }

      button.dataset.krzFaqReady = 'true';

      if (item.classList.contains('is-open')) {
        answer.hidden = false;
        answer.style.height = 'auto';
      } else {
        answer.hidden = true;
        answer.style.height = '0px';
      }

      button.addEventListener('click', function () {
        if (item.classList.contains('is-open')) {
          closeItem(item, button, answer);
        } else {
          openItem(item, button, answer);
        }
      });
    });
  }

  function initAllFaqs() {
    document.querySelectorAll('.krz-faq').forEach(initFaq);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAllFaqs);
  } else {
    initAllFaqs();
  }

  if (window.acf) {
    window.acf.addAction('render_block_preview/type=krizia-faq', initAllFaqs);
  }
})();