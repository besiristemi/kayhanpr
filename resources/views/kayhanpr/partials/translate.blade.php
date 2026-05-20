<script>
function googleTranslateElementInit2() {
  new google.translate.TranslateElement({
    pageLanguage: 'tr',
    autoDisplay: false,
    includedLanguages: 'tr,en,de,fr,it,es,ar,ru,sr',
  }, 'google_translate_element2');
}
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2" defer></script>
<script>
function GTranslateGetCurrentLang() {
  var m = document.cookie.match('(^|;) ?googtrans=([^;]*)(;|$)');
  return m ? m[2].split('/')[2] : null;
}
function GTranslateFireEvent(el, ev) {
  try {
    if (document.createEventObject) {
      var evt = document.createEventObject();
      el.fireEvent('on' + ev, evt);
    } else {
      var evt = document.createEvent('HTMLEvents');
      evt.initEvent(ev, true, true);
      el.dispatchEvent(evt);
    }
  } catch (e) {}
}
function doGTranslate(lang_pair) {
  if (lang_pair && lang_pair.value) lang_pair = lang_pair.value;
  if (!lang_pair) return;
  var lang = lang_pair.split('|')[1];
  if (GTranslateGetCurrentLang() === null && lang === lang_pair.split('|')[0]) return;
  var teCombo;
  var sel = document.getElementsByTagName('select');
  for (var i = 0; i < sel.length; i++) {
    if (sel[i].className.indexOf('goog-te-combo') !== -1) teCombo = sel[i];
  }
  if (!document.getElementById('google_translate_element2') ||
      !teCombo || !teCombo.options.length) {
    setTimeout(function () { doGTranslate(lang_pair); }, 400);
    return;
  }
  teCombo.value = lang;
  GTranslateFireEvent(teCombo, 'change');
}
document.querySelectorAll('[data-gt-lang]').forEach(function (link) {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    doGTranslate(this.getAttribute('data-gt-lang'));
    var label = this.getAttribute('data-lang-label');
    var emoji = this.getAttribute('data-lang-emoji') || '🇹🇷';
    var html = '<span class="kp-lang__flag-emoji" aria-hidden="true">' + emoji + '</span> <span class="kp-lang__label">' + label + '</span> <i class="fa-solid fa-chevron-down"></i>';
    document.querySelectorAll('.kp-lang__btn').forEach(function (btn) {
      btn.innerHTML = html;
    });
    document.querySelectorAll('.kp-lang.is-open').forEach(function (el) { el.classList.remove('is-open'); });
  });
});
</script>
