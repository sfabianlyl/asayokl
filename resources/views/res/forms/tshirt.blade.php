@php
    $range=json_decode($form->tshirt_sizes,true);
@endphp

<div class="row mb-5 align-items-center">
    <div class="col-12 col-lg-4 mb-3 mb-lg-0">Saiz kemeja-T (T-shirt size)</div>
    <div class="col-12 col-lg-8 mb-3 mb-lg-0">
        @if(isset($range["XS"]))<label><input type="radio" name="size" value="XS">XS</label><br>@endif
        @if(isset($range["S"]))<label><input type="radio" name="size" value="S">S</label><br>@endif
        @if(isset($range["M"]))<label><input type="radio" name="size" value="M" checked>M</label><br>@endif
        @if(isset($range["L"]))<label><input type="radio" name="size" value="L">L</label><br>@endif
        @if(isset($range["XL"]))<label><input type="radio" name="size" value="XL">XL</label><br>@endif
        @if(isset($range["2XL"]))<label><input type="radio" name="size" value="2XL">2XL</label><br>@endif
        @if(isset($range["3XL"]))<label><input type="radio" name="size" value="3XL">3XL</label><br>@endif
    </div>
</div>