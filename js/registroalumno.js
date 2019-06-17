function RegresaIndex(){
    setTimeout(function(){ window.location.href = "../index.html"; }, 2000);
}


$(document).ready(function () {
    AgregarProvincias();

    $(document).on('submit', '#formAlumno', function(){
    
    var datosAlumno = JSON.stringify($(this).serializeObject());
    
    var datosAlumnoObjeto = JSON.parse(datosAlumno);
    
    datosAlumnoObjeto.nombre = datosAlumnoObjeto.nombre.replace(/\s/g, "");
    datosAlumnoObjeto.apellido1 = datosAlumnoObjeto.apellido1.replace(/\s/g, "");
    if(datosAlumnoObjeto.nombre == ""){
        bootbox.alert("Introduce el nombre");
    }else{
        if(datosAlumnoObjeto.apellido1 == ""){
            bootbox.alert("Introduce el primer apellido");
        }else{
            if(!/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$/.test(datosAlumnoObjeto.pass)){
                bootbox.alert("Error en la contraseña. Debe contener de 6 a 15 caracteres e incluir un número y una letra mayúscula.");
            }else{

                $.ajax({
                url: "http://localhost/Educall/php/funciones/registroalumno.php",
                type : "POST",
                contentType : 'application/json',
                data : datosAlumno,
                success : function(result) {
                $("#divRegistro").append('<p class="form-control bg-success text-white mt-3">¡Hecho! Regresando...</p>');
                RegresaIndex();      
            },
                error: function(xhr, resp, text) {
                    $("#divemail").append('<p class="form-control bg-danger text-white">¡Ese email ya está usado!</p>');
                }

            });

            }
        }
    }

    
    return false;
    });

});