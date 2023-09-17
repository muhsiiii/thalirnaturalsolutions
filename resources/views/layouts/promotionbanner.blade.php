<!-- offer section  -->
@if($settings->promobanner != "")
<div class="offer-section">
    <a href="{{$settings->promobannerurl ?? ''}}" class="normallink">
    <p>
        {{$settings->promobanner}}
    </p>
    </a>
</div>
@endif
