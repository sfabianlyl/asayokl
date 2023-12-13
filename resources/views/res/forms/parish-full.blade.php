<div class="row mb-5 align-items-center">
    <div class="col-12 col-lg-4 mb-3 mb-lg-0">Paroki (Parish)</div>
    <div class="col-12 col-lg-8 mb-3 mb-lg-0">
        <input type="text" name="parish" id="parishOthers" class="form-control" style="display:none;" disabled>
        <select id="parishKL" class="form-control" name="parish" required>
            <option disabled selected value> -- Select A Parish -- </option>
            @include("res.options.klparishes")
        </select>
    </div>
</div>

<script>
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