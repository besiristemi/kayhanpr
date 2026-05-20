(function () {
  'use strict';

  var container = document.getElementById('kp-flipbook');
  var loadingEl = document.getElementById('kp-flipbook-loading');
  var pdfUrl = container && container.getAttribute('data-pdf');

  if (!container || !pdfUrl || typeof pdfjsLib === 'undefined' || typeof St === 'undefined') {
    return;
  }

  pdfjsLib.GlobalWorkerOptions.workerSrc =
    'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

  var PAGE_WIDTH = Math.min(520, window.innerWidth - 32);
  var PAGE_HEIGHT = Math.round(PAGE_WIDTH * 1.414);
  var pageFlipInstance;

  function bindControls() {
    document.getElementById('kp-flip-prev')?.addEventListener('click', function () {
      pageFlipInstance?.flipPrev();
    });
    document.getElementById('kp-flip-next')?.addEventListener('click', function () {
      pageFlipInstance?.flipNext();
    });
  }

  async function renderFlipbook() {
    try {
      var pdf = await pdfjsLib.getDocument(pdfUrl).promise;
      var pageCount = pdf.numPages;
      var pages = [];

      for (var i = 1; i <= pageCount; i++) {
        var page = await pdf.getPage(i);
        var baseViewport = page.getViewport({ scale: 1 });
        var scale = PAGE_WIDTH / baseViewport.width;
        var viewport = page.getViewport({ scale: scale });
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        canvas.width = viewport.width;
        canvas.height = viewport.height;
        await page.render({ canvasContext: ctx, viewport: viewport }).promise;

        var pageEl = document.createElement('div');
        pageEl.className = 'page';
        if (i === 1 || i === pageCount) {
          pageEl.setAttribute('data-density', 'hard');
        }
        var img = document.createElement('img');
        img.src = canvas.toDataURL('image/jpeg', 0.9);
        img.alt = 'Sayfa ' + i;
        pageEl.appendChild(img);
        pages.push(pageEl);
      }

      if (loadingEl) loadingEl.remove();

      pageFlipInstance = new St.PageFlip(container, {
        width: PAGE_WIDTH,
        height: PAGE_HEIGHT,
        size: 'stretch',
        minWidth: 280,
        maxWidth: PAGE_WIDTH,
        minHeight: 400,
        maxHeight: PAGE_HEIGHT,
        showCover: true,
        mobileScrollSupport: true,
        usePortrait: window.innerWidth < 768,
        maxShadowOpacity: 0.45,
      });

      pageFlipInstance.loadFromHTML(pages);
      bindControls();
    } catch (err) {
      if (loadingEl) {
        loadingEl.innerHTML =
          '<p>PDF yüklenemedi. <a href="' +
          pdfUrl +
          '" target="_blank" rel="noopener">PDF dosyasını indirin</a></p>';
      }
      console.error(err);
    }
  }

  renderFlipbook();
})();
