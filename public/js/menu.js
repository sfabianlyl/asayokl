$(document).ready(function(){
    $(".navbar-toggler").on("click", function(){ 
        $("#navbarCollapse").toggleClass("show");
        $(this).toggleClass("collapsed");
    });
});