<div class="row mb-5 align-items-center">
    <div class="col-12 col-lg-4 mb-3 mb-lg-0">Kewarganegaraan (Nationality)</div>
    <div class="col-12 col-lg-8 mb-3 mb-lg-0">
        <label>
            <input type="radio" id="radioMalaysia" name="nationality" value="Malaysia" required checked> Malaysia
        </label><br>
        <label>
            <input type="radio" id="radioOthers" name="nationality" value="" required> <input type="text" id="nationalityOthers" placeholder="Other...">
        </label>
    </div>
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
</script>