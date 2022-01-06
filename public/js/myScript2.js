
$(document).ready(function(){
      
    $(".rog .nav-link[data-toggle='tab']").click(function(){
        $(".nav-link").parent().css({opacity:0.5});
        $(this).parent().css({opacity:1});
    });
    $(window).on('load', function() {
        $(".rog .active").parent().css({opacity:1});
    });
    
    $("input[type='radio'][name='program']").on("change",function(){
        $("#scriptureDates, #taizeDates, #youngAdultDates, #youthCampusDates, #allSoulsDates, #IRLDates, #gameDates").css("display","none");
        $("input[type='radio'][name='language']").attr("disabled","");
        var idDates="#"+$(this).val()+"Dates";
        var idInput=idDates+" input";
        $(idDates).css("display","block");
        $(idInput).removeAttr("disabled");
    })

    $("input[type='radio'][name='program'][value='scripture']").attr("checked","");
    $("input[type='radio'][name='location'][value='KL']").attr("checked","");
    
    $("input[type='radio'][name='location']").on("change",function(){
        $(".program-dates").hide("slow");
        var idDates="#"+$(this).val()+"Dates";
        $(idDates).show("slow");
    });
    $(".program-dates").hide();
    $("#KLDates").show("slow");
   
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
    
     
     
     $("#myform").on("submit", function(e){
         if(/\d/.test($("input[name='name']").val())){
             alert("Please do not put digits in the name field.");
            scrollTo("input[name='name']");
             return false;

         }
         if($("input[name='language[]']").length > 0){
             if ($('input[name="language[]"]:checked, input[name="slot"]:checked').length > 0){
                 $("#myform").submit();
             }else{
                 alert("Please check at least one session.");
                 return false;
             }
         }else{
             $("#myform").submit();
         }
     });
});