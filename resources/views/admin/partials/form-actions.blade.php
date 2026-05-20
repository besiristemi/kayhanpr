@php
    $cancelUrl = $cancelUrl ?? url()->previous();
    $submitText = $submitText ?? 'Kaydet';
@endphp
<a href="{{ $cancelUrl }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> İptal</a>
<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{ $submitText }}</button>
