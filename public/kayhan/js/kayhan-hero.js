(function () {
  'use strict';
  if (typeof Swiper === 'undefined') return;

  var el = document.querySelector('.kp-cinema-swiper');
  if (!el) return;

  var slides = el.querySelectorAll('.swiper-slide').length;
  if (!slides) return;

  var bar = document.querySelector('.kp-cinema__bar');
  var currentEl = document.querySelector('.kp-cinema__current');
  var totalEl = document.querySelector('.kp-cinema__total');
  var thumbs = document.querySelectorAll('.kp-cinema__thumb');

  function pad(n) {
    return n < 10 ? '0' + n : String(n);
  }

  function updateUI(swiper) {
    var i = (swiper.realIndex || 0) + 1;
    if (bar) bar.style.width = (i / slides) * 100 + '%';
    if (currentEl) currentEl.textContent = pad(i);
    thumbs.forEach(function (t, idx) {
      t.classList.toggle('is-active', idx === swiper.realIndex);
    });
  }

  var cinema = new Swiper('.kp-cinema-swiper', {
    loop: slides > 1,
    speed: 900,
    effect: 'fade',
    fadeEffect: { crossFade: true },
    autoplay: slides > 1 ? { delay: 7000, disableOnInteraction: false } : false,
    navigation: {
      nextEl: '.kp-cinema__arrow--next',
      prevEl: '.kp-cinema__arrow--prev',
    },
    on: {
      init: function () { updateUI(this); },
      slideChange: function () { updateUI(this); },
    },
  });

  thumbs.forEach(function (thumb) {
    thumb.addEventListener('click', function () {
      var idx = parseInt(thumb.getAttribute('data-index'), 10);
      if (!isNaN(idx)) cinema.slideToLoop(idx);
    });
  });
})();
