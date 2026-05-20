@php
$langs = [
    ['code' => 'tr|tr', 'label' => 'Türkçe', 'emoji' => '🇹🇷'],
    ['code' => 'tr|de', 'label' => 'Deutsch', 'emoji' => '🇩🇪'],
    ['code' => 'tr|fr', 'label' => 'Français', 'emoji' => '🇫🇷'],
    ['code' => 'tr|it', 'label' => 'Italiano', 'emoji' => '🇮🇹'],
    ['code' => 'tr|en', 'label' => 'English', 'emoji' => '🇬🇧'],
    ['code' => 'tr|es', 'label' => 'Español', 'emoji' => '🇪🇸'],
    ['code' => 'tr|ar', 'label' => 'عربى', 'emoji' => '🇸🇦'],
    ['code' => 'tr|ru', 'label' => 'Русский', 'emoji' => '🇷🇺'],
    ['code' => 'tr|sr', 'label' => 'Српски', 'emoji' => '🇷🇸'],
];
@endphp
<div class="kp-lang">
    <button type="button" class="kp-lang__btn" aria-haspopup="listbox" aria-expanded="false">
        <span class="kp-lang__flag-emoji" aria-hidden="true">🇹🇷</span>
        <span class="kp-lang__label">Türkçe</span>
        <i class="fa-solid fa-chevron-down"></i>
    </button>
    <div class="kp-lang__menu" role="listbox">
        @foreach($langs as $lang)
        <a href="#" role="option"
           data-gt-lang="{{ $lang['code'] }}"
           data-lang-label="{{ $lang['label'] }}"
           data-lang-emoji="{{ $lang['emoji'] }}">
            <span class="kp-lang__flag-emoji" aria-hidden="true">{{ $lang['emoji'] }}</span>
            {{ $lang['label'] }}
        </a>
        @endforeach
    </div>
</div>
