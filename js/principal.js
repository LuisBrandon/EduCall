window.onload = function () {
    $("#profesorInfo").css("display","none");
    $("#alumnoInfo").css("display","none");

    $("#profesorInfo").fadeIn(3000);
    $("#alumnoInfo").fadeIn(3000);

    $("#profesorInfo").hover(function(){
    $(this).css("border-style", "solid");
    $(this).css("border-radius", "5px");
    $(this).css("box-shadow", "1px 1px 10px");
    $(this).css("cursor", "pointer");
    }, function(){
    $(this).css("border-style", "none");
    $(this).css("box-shadow", "0px 0px");
    });

    $("#alumnoInfo").hover(function(){
    $(this).css("border-style", "solid");
    $(this).css("border-radius", "5px");
    $(this).css("box-shadow", "1px 1px 10px");
    $(this).css("cursor", "pointer");
    }, function(){
    $(this).css("border-style", "none");
    $(this).css("box-shadow", "0px 0px");
    });

    $("#profesorInfo").click(function(){
        window.location.href = "php/registroprofesor.html";
    });

    $("#alumnoInfo").click(function(){
        window.location.href = "php/registroalumno.html";
    });

}
