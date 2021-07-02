<div class="row mb-5 align-items-center">
    <div class="col-4">Kewarganegaraan (Nationality)</div>
    <div class="col-8">
        <label>
            <input type="radio" id="radioMalaysia" name="nationality" value="Malaysia" required checked> Malaysia
        </label><br>
        <label>
            <input type="radio" id="radioOthers" name="nationality" value="" required> <input type="text" id="nationalityOthers" placeholder="Other...">
        </label>
    </div>
</div>
<div class="row mb-5 align-items-center">
    <div class="col-4">Nama seperti dalam MyKad/Passport (Name as in MyKad/Passport)</div>
    <div class="col-8">
        <input type="text" name="name" class="form-control" required>
    </div>
</div>
<div class="row mb-5 align-items-center">
    <div class="col-4">Umur (Age)</div>
    <div class="col-8">
        <label><input type="radio" name="age" value="18 - 21" checked>18 - 21 tahun (18 - 21 years old)</label><br>
        <label><input type="radio" name="age" value="22 - 24">22 - 24 tahun (22 - 24 years old)</label><br>
        <label><input type="radio" name="age" value="25 - 29">25 - 29 tahun (25 - 29 years old)</label><br>
        <label><input type="radio" name="age" value="30 - 34">30 - 34 tahun (30 - 34 years old)</label>
    </div>
</div>
<div class="row mb-5 align-items-center">
    <div class="col-4">Jantina (Gender)</div>
    <div class="col-8">
        <label><input type="radio" name="gender" value="Male" required>Lelaki (Male)</label><br>
        <label><input type="radio" name="gender" value="Female" required>Perempuan (Female)</label>
    </div>
</div>
<div class="row mb-5 align-items-center">
    <div class="col-4">Emel (Email)</div>
    <div class="col-8">
        <input type="email" name="email" class="form-control" required>
    </div>
</div>
<div class="row mb-5 align-items-center">
    <div class="col-4">No. Telefon (Phone Number)</div>
    <div class="col-8">
        <input type="text" name="phone" class="form-control" value="+6" required>
    </div>
</div>
<div class="row mb-5 align-items-center">
    <div class="col-4">Keuskupan (Diocese)</div>
    <div class="col-8">
        <select class="form-control" name="diocese" required>
            @include("res.options.dioceses")
        </select>
    </div>
</div>
<div class="row mb-5 align-items-center">
    <div class="col-4">Paroki (Parish)</div>
    <div class="col-8">
        <input type="text" name="parish" id="parishOthers" class="form-control" style="display:none;" disabled>
        <select id="parishKL" class="form-control" name="parish" required>
            @include("res.options.klparishes")
        </select>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-6"><button class="btn btn-success w-100" type="submit" name="submit">Hantar (Submit)</button></div>
</div>

<script>
    $("#nationalityOthers").on("keyup",function(){
        $("input[type='radio'][name='nationality']").removeAttr("checked");
        $("input[type='radio'][name='nationality']").prop("checked",false);
        if(this.value){
            $("#radioOthers").prop("checked",true);
            $("#radioOthers").val(this.value);
        }else{
            $("#radioMalaysia").prop("checked",true);
        }
        $("#radioMalaysia, #radioOthers").trigger("change");
    });
    $("select[name='diocese']").on("change",function(){
        $("#parishOthers, #parishKL").prop("disabled",true);
        $("#parishOthers, #parishKL").prop("required",false);
        $("#parishOthers, #parishKL").css("display","none");
        if(this.value =="Keuskupan Agung Kuala Lumpur"){
            $("#parishKL").prop("disabled",false);
            $("#parishKL").prop("required",true);
            $("#parishKL").css("display","block");
        }else{
            $("#parishOthers").prop("disabled",false);
            $("#parishOthers").prop("required",true);
            $("#parishOthers").css("display","block");
        }
    });
</script>