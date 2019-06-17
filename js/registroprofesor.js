function RegresaIndex() {
    setTimeout(function () { window.location.href = "../index.html"; }, 2000);
}


$(document).ready(function () {
    AgregarProvincias();

    $(document).on('submit', '#formProfesor', function () {

        var datosProfesor = JSON.stringify($(this).serializeObject());

        var datosProfesorObjeto = JSON.parse(datosProfesor);

        datosProfesorObjeto.nombre = datosProfesorObjeto.nombre.replace(/\s/g, "");
        datosProfesorObjeto.apellido1 = datosProfesorObjeto.apellido1.replace(/\s/g, "");
        datosProfesorObjeto.email = datosProfesorObjeto.email.replace(/\s/g, "");

        if (datosProfesorObjeto.nombre == "") {
            bootbox.alert("Introduce el nombre");
        } else {
            if (datosProfesorObjeto.apellido1 == "") {
                bootbox.alert("Introduce el primer apellido");
            } else {
                if (datosProfesorObjeto.email == "" || datosProfesorObjeto.email == " ") {
                    bootbox.alert("Introduce el email");
                } else {
                    if (datosProfesorObjeto.nivelAcademicoPriAsig == " " || datosProfesorObjeto.asignatura1 == " ") {
                        bootbox.alert("Debes elegir la primera asignatura");
                    } else {
                        if (datosProfesorObjeto.provincia == "") {
                            bootbox.alert("Debes elegir tu provincia");
                        } else {
                            if (!/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$/.test(datosProfesorObjeto.pass)) {
                                bootbox.alert("Error en la contraseña. Debe contener de 6 a 15 caracteres e incluir un número y una letra mayúscula.");
                            } else {
                                if (datosProfesorObjeto.nivelAcademicoSegAsig == " " || datosProfesorObjeto.asignatura2 == "nada") {
                                    bootbox.alert("Debes elegir la segunda asignatura");
                                } else {
                                    $.ajax({
                                        url: "http://localhost/Educall/php/funciones/registroprofesor.php",
                                        type: "POST",
                                        contentType: 'application/json',
                                        data: datosProfesor,
                                        success: function (result) {
                                            console.log(result);
                                            $("#divRegistro").append('<p class="form-control bg-success text-white mt-3">¡Hecho! Regresando...</p>');
                                            RegresaIndex();
                                        },
                                        error: function (xhr, resp, text) {
                                            console.log(xhr, resp, text);
                                            $("#divemail").append('<p class="form-control bg-danger text-white">¡Ese email ya está usado!</p>');
                                        }

                                    });
                                }



                            }
                        }
                    }
                }

            }
        }


        return false;
    });

});
