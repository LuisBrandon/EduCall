var primaria = ["Lengua Castellana y Literatura", "Matemáticas", "Ciencias de la Naturaleza", "Ciencias Sociales"
    , "Inglés","Francés", "Educación Física", "Religión", "Valores Sociales y Cívicos", "Educación Artística"];

var secundaria = ["Biología y Geología", "Geografía e Historia","Música", "Tecnología", "Educación Plástica", "Educación Física", "Cultura Clásica", "Lengua Castellana y Literatura", "Matemáticas", "Economía", "Física y Química", "Latín", "Ciencias Aplicadas a la Actividad Profesional", "Iniciación a la Actividad Emprendedora y Empresarial", "Tecnología"];

var bachillerato = ["Historia de España","Historia de la Filosofía","Filosofía","Lengua Castellana y Literatura","Inglés","Francés","Matemáticas","Biología y Geología","Dibujo Técnico","Física y Química","Tecnología Industrial","Latín","Economía","Griego","Historia del mundo Contemporáneo","Literatura Universal","Fundamentos del Arte","Cultura Audiovisual"];



function nivelPriAsig() {
    var nivel = $("#nivelAcademicoPriAsig").val();
    if (nivel == "Primaria") {
        LimpiarPriAsig();
        AsignaturasPrimaria(1);
    }
    if(nivel == "Secundaria"){
        LimpiarPriAsig();
        AsignaturasSecundaria(1);
    }
    if(nivel == "Bachillerato"){
        LimpiarPriAsig();
        AsignaturasBachillerato(1);
    }

}


function nivelSegAsig() {
    var nivel = $("#nivelAcademicoSegAsig").val();
    if (nivel == "Primaria") {
        LimpiarSegAsig();
        AsignaturasPrimaria(2);
    }
    if(nivel == "Secundaria"){
        LimpiarSegAsig();
        AsignaturasSecundaria(2);
    }
    if(nivel == "Bachillerato"){
        LimpiarSegAsig();
        AsignaturasBachillerato(2);
    }
}

function LimpiarPriAsig() {
    $("#asignatura1").html("<option value='nada'>---</option>");
}

function LimpiarSegAsig() {
    $("#asignatura2").html("<option value='nada'>---</option>");
}

function AsignaturasPrimaria(nivelAcademico) {    
    $('#asignatura'+nivelAcademico+'').append( '<option selected value="'+primaria[0]+'">'+primaria[0]+'</option>' );
    for(var i = 1;i<primaria.length;i++){
        $('#asignatura'+nivelAcademico+'').append( '<option value="'+primaria[i]+'">'+primaria[i]+'</option>' );
    }
}

function AsignaturasSecundaria(nivelAcademico){
    $('#asignatura'+nivelAcademico+'').append( '<option selected value="'+secundaria[0]+'">'+secundaria[0]+'</option>' );
    for(var i = 1;i<secundaria.length;i++){
        $('#asignatura'+nivelAcademico+'').append( '<option value="'+secundaria[i]+'">'+secundaria[i]+'</option>' );
    }
}

function AsignaturasBachillerato(nivelAcademico){
    $('#asignatura'+nivelAcademico+'').append( '<option selected value="'+secundaria[0]+'">'+secundaria[0]+'</option>' );
    for(var i = 1;i<bachillerato.length;i++){
        $('#asignatura'+nivelAcademico+'').append( '<option value="'+bachillerato[i]+'">'+bachillerato[i]+'</option>' );
    }
}