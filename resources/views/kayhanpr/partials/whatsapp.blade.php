@php
$waPhone = '905323706107';
$waMsg = rawurlencode('Merhaba, Kayhan Prodüksiyon iskele sistemleri hakkında bilgi almak istiyorum.');
@endphp
<div class="kp-wa" id="kp-wa">
    <div class="kp-wa__panel" id="kp-wa-panel" hidden>
        <div class="kp-wa__panel-head">
            <div class="kp-wa__avatar"><i class="fa-brands fa-whatsapp"></i></div>
            <div>
                <strong>Kayhan Destek</strong>
                <span>Genellikle birkaç dakika içinde yanıt</span>
            </div>
            <button type="button" class="kp-wa__close" id="kp-wa-close" aria-label="Kapat"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="kp-wa__panel-body">
            <p>Merhaba 👋 İskele sistemleri ve teklif için size nasıl yardımcı olabiliriz?</p>
            <a href="https://wa.me/{{ $waPhone }}?text={{ rawurlencode('Merhaba, proje teklifi almak istiyorum.') }}" class="kp-wa__chip" target="_blank" rel="noopener">🇹🇷 Proje teklifi</a>
            <a href="https://wa.me/{{ $waPhone }}?text={{ rawurlencode('Guten Tag, ich möchte ein Angebot.') }}" class="kp-wa__chip" target="_blank" rel="noopener">🇨🇭 Angebot (DE)</a>
            <a href="https://wa.me/{{ $waPhone }}?text={{ rawurlencode('Bonjour, je souhaite un devis.') }}" class="kp-wa__chip" target="_blank" rel="noopener">🇨🇭 Devis (FR)</a>
        </div>
        <a href="https://wa.me/{{ $waPhone }}?text={{ $waMsg }}" class="kp-wa__panel-cta" target="_blank" rel="noopener">
            <i class="fa-brands fa-whatsapp"></i> Sohbeti Başlat
        </a>
    </div>
    <button type="button" class="kp-wa__fab" id="kp-wa-fab" aria-label="WhatsApp destek">
        <span class="kp-wa__pulse"></span>
        <span class="kp-wa__pulse kp-wa__pulse--2"></span>
        <i class="fa-brands fa-whatsapp"></i>
    </button>
</div>
