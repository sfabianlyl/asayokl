function showEng(){
    $(".bm").removeClass("show");
    $("#bm, #eng").addClass("disabled");
    setTimeout(function(){
        $(".bm").hide();
        $(".eng").show();
        $(".eng").addClass("show");
        $("#bm").removeClass("disabled");
    },610);
    Cookies.set('lang','eng', { expires: 30 });
}

function showBm(){
    $(".eng").removeClass("show");
    $("#bm, #eng").addClass("disabled");
    setTimeout(function(){
        $(".eng").hide();
        $(".bm").show();
        $(".bm").addClass("show");
        $("#eng").removeClass("disabled");
    },610);
    Cookies.set('lang','bm', { expires: 30 });
}

function scrollTo(sel){
    var offset=$(sel).offset();
    offset.left-=20;
    offset.top-=170;
    $("html,body").animate({
        scrollTop:offset.top,
        scrollLeft:offset.left
    });
}

function scroll(){
    alert($(this).attr("id"));
    var id= this.id;
}

function mobileUpdate(){
    var viewportWidth = $(window).width();
    if (viewportWidth <= 768) $("#tab-navigate").removeClass("flex-column").addClass("nav-tabs");
    else $("#tab-navigate").removeClass("nav-tabs").addClass("flex-column");
}


$(document).ready(function(){
    mobileUpdate();

    $(window).on('resize', function() {
        mobileUpdate();
    });


    var lang=Cookies.get('lang');
    if(lang==undefined || lang=="eng"){
        showEng();
    }else{
        showBm();
    }

    
    $("#bm").on("click",showBm);

    $("#eng").on("click",showEng);
    
    $('.collapse').on('shown.bs.collapse', function(e) {
        var $panel = $(this).closest('.card');
        $('html,body').animate({
          scrollTop: $panel.offset().top - 120
        }, 100);
    });
})