@extends("layouts.master")

@section("title", "Hangout")


@php
    $klnTime=strtotime("January 25th 8.30pm"); 
    $klnVal=date("j/n",$klnTime);
    $kln="KL North $klnVal"; 
    $klnStr=date("d/m/Y - g:ia",$klnTime);
    
    $petalingTime=strtotime("January 28th 8.30pm"); 
    $petalingVal=date("j/n",$petalingTime);
    $petaling="Petaling $petalingVal"; 
    $petalingStr=date("d/m/Y - g:ia",$petalingTime);
    
@endphp

@section("content")

<div class="mb-5">
    <h3 class="text-center">Online Hangout with ASAYOKL</h3>
    <p class="text-center"><i>Join us according to your preferred language</i></p>
</div>


<div class="row justify-content-center">
    <div class="col-lg-8 col-12">
        <form action="{{ route('hangout.registration.submit') }}" id="myform" method="POST">
            <div class="row mb-5 align-items-center">
                <div class="col-12">
                    
                    <div class="row justify-content-center">
                        <div class="col-10 col-lg-5">
                            <label>
                                <input class="hangout-radio" type="radio" name="program" value="KLN" required>
                                <div><img src="Images/hangout_kln.png" class="w-100"></div>
                            </label>
                        </div>
                        <div class="col-10 col-lg-5">
                            <label>
                                <input class="hangout-radio" type="radio" name="program" value="Petaling" required>
                                <div><img src="Images/hangout_petaling.png" class="w-100"></div>
                            </label>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div id="hangout-disclaimer" style="display:none;">
                <h5>Tentative Date: 29th May 2021</h5>
                <p>Registrations will be open 1 week before the confirmed date, which will be updated based on the best interest of our young people in terms of public safety and health.</p>
            </div>
            <div id="hangout-registration-form" style="display:none;">
                <div class="row mb-5">
                    <div class="col-3 col-lg-4">Sesi (Session)</div>
                    <div class="col-9 col-lg-8">
                        
                        <div id="KLNDates" style="display:none;">
                            <div class="row">
                                <div class="col-4">KL North</div>
                                <div class="col-8">
                                    <label><input type="radio" name="language[]" value="<?=$kln?>@Mandarin"> Mandarin, <?=$klnStr?> </label><br>
                                    <label><input type="radio" name="language[]" value="<?=$kln?>@BM"> BM, <?=$klnStr?> </label><br>
                                    <label><input type="radio" name="language[]" value="<?=$kln?>@Tamil"> Tamil, <?=$klnStr?> </label><br>
                                    <label><input type="radio" name="language[]" value="<?=$kln?>@English"> English, <?=$klnStr?> </label><br>

            
                                </div>
                            </div>
                        </div>
                        <div id="PetalingDates" style="display:none;">
                            <div class="row">
                                <div class="col-4">Petaling District</div>
                                <div class="col-8">
                                    <label><input type="radio" name="language[]" value="<?=$petaling?>@Mandarin"> Mandarin, <?=$petalingStr?></label><br>
                                    <label><input type="radio" name="language[]" value="<?=$petaling?>@BM"> BM, <?=$petalingStr?></label><br>
                                    <label><input type="radio" name="language[]" value="<?=$petaling?>@Tamil"> Tamil, <?=$petalingStr?></label><br>
                                    <label><input type="radio" name="language[]" value="<?=$petaling?>@English"> English, <?=$petalingStr?></label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include("res.forms.basic_info")
            </div>
        </form>
    </div>
</div>


@stop

@section("js")
@stop

@section("css")
@stop