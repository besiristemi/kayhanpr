(function () {
  'use strict';

  var headerWrap = document.getElementById('kp-header-wrap');
  var menuToggle = document.getElementById('kp-menu-toggle');
  var menuClose = document.getElementById('kp-menu-close');
  var mobileMenu = document.getElementById('kp-mobile-menu');
  var menuOverlay = document.getElementById('kp-menu-overlay');
  var langWraps = document.querySelectorAll('.kp-lang');
  var backTop = document.querySelector('.kp-back-top');

  if (headerWrap) {
    window.addEventListener('scroll', function () {
      headerWrap.classList.toggle('is-scrolled', window.scrollY > 24);
    }, { passive: true });
  }

  function closeMenu() {
    if (mobileMenu) {
      mobileMenu.classList.remove('is-open');
      mobileMenu.setAttribute('aria-hidden', 'true');
    }
    if (menuOverlay) {
      menuOverlay.classList.remove('is-open');
      menuOverlay.setAttribute('aria-hidden', 'true');
    }
    document.body.classList.remove('kp-menu-open');
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
  }

  function openMenu() {
    if (mobileMenu) {
      mobileMenu.classList.add('is-open');
      mobileMenu.setAttribute('aria-hidden', 'false');
    }
    if (menuOverlay) {
      menuOverlay.classList.add('is-open');
      menuOverlay.setAttribute('aria-hidden', 'false');
    }
    document.body.classList.add('kp-menu-open');
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
  }

  if (menuToggle) {
    menuToggle.addEventListener('click', function () {
      mobileMenu && mobileMenu.classList.contains('is-open') ? closeMenu() : openMenu();
    });
  }
  if (menuClose) menuClose.addEventListener('click', closeMenu);
  if (menuOverlay) menuOverlay.addEventListener('click', closeMenu);
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeMenu();
  });
  if (mobileMenu) {
    mobileMenu.querySelectorAll('.kp-mobile-menu__nav a').forEach(function (a) {
      a.addEventListener('click', closeMenu);
    });
  }

  langWraps.forEach(function (langWrap) {
    var langBtn = langWrap.querySelector('.kp-lang__btn');
    if (!langBtn) return;
    langBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      langWraps.forEach(function (w) {
        if (w !== langWrap) w.classList.remove('is-open');
      });
      langWrap.classList.toggle('is-open');
    });
  });
  document.addEventListener('click', function () {
    langWraps.forEach(function (w) { w.classList.remove('is-open'); });
  });

  if (backTop) {
    window.addEventListener('scroll', function () {
      backTop.classList.toggle('is-visible', window.scrollY > 400);
    }, { passive: true });
    backTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  if (typeof Swiper !== 'undefined') {
    function initShowcase(selector, prevCls, nextCls, pagCls) {
      var root = document.querySelector(selector);
      if (!root) return;
      var stage = root.closest('.kp-showcase__stage');
      var fracEl = stage ? stage.querySelector('.' + pagCls) : null;
      var total = root.querySelectorAll('.swiper-slide').length;

      function updateFraction(swiper) {
        if (!fracEl || !total) return;
        fracEl.textContent = (swiper.realIndex + 1) + ' / ' + total;
      }

      var news = selector.indexOf('news') !== -1;
      new Swiper(selector, {
        speed: 480,
        grabCursor: true,
        spaceBetween: 14,
        slidesPerView: 1,
        slidesPerGroup: 1,
        watchOverflow: true,
        navigation: {
          nextEl: '.' + nextCls,
          prevEl: '.' + prevCls,
        },
        breakpoints: {
          640: { slidesPerView: news ? 2 : 2, spaceBetween: 16 },
          900: { slidesPerView: news ? 2.5 : 3, spaceBetween: 18 },
          1200: { slidesPerView: news ? 3 : 4, spaceBetween: 20 },
        },
        on: {
          init: updateFraction,
          slideChange: updateFraction,
          breakpoint: updateFraction,
        },
      });
    }

    initShowcase('.kp-products-swiper', 'kp-products-prev', 'kp-products-next', 'kp-products-pag');
    initShowcase('.kp-news-swiper', 'kp-news-prev', 'kp-news-next', 'kp-news-pag');
  }

  var waFab = document.getElementById('kp-wa-fab');
  var waPanel = document.getElementById('kp-wa-panel');
  var waClose = document.getElementById('kp-wa-close');
  if (waFab && waPanel) {
    waFab.addEventListener('click', function () { waPanel.hidden = !waPanel.hidden; });
    if (waClose) waClose.addEventListener('click', function () { waPanel.hidden = true; });
  }
})();
