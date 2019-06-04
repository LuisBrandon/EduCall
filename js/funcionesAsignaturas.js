//Asignaturas
var primaria = ["Lengua Castellana y Literatura","Matemáticas","Ciencias de la Naturaleza","Ciencias Sociales"
,"Inglés","Educación Física", "Religión","Valores Sociales y Cívicos","Educación Artística"];

var secundaria = ["Biología y Geología","Geografía e Historia","Lengua Castellana y Literatura","Matemáticas","Inglés","Francés","Música","Tecnología","Educación Plástica","Educación Física","Cultura Clásica"];
var secundariaCuarto = ["Geografía e Historia","Lengua Castellana y Literatura","Matemáticas","Biología y Geología","Economía","Física y Química","Latín","Ciencias Aplicadas a la Actividad Profesional","Iniciación a la Actividad Emprendedora y Empresarial","Tecnología"];

var primeroBachilleratoCiencias = ["Filosofía","Lengua Castellana y Literatura","Inglés","Francés","Matemáticas","Biología y Geología","Dibujo Técnico","Física y Química","Tecnología Industrial"];
var primeroBachilleratoHumSoc = ["Filosofía","Lengua Castellana y Literatura","Inglés","Francés","Latín","Matemáticas","Economía","Griego","Historia del mundo Contemporáneo","Literatura Universal"];
var primeroBachilleratoArtes = ["Filosofía","Lengua Castellana y Literatura","Inglés","Francés","Fundamentos del Arte","Cultura Audiovisual","Historia del mundo Contemporáneo","Literatura Universal"];

var segundoBachilleratoCiencias = ["Historia de España","Lengua Castellana y Literatura","Inglés","Francés","Matemáticas","Biología","Geología","Dibujo Técnico","Física","Química","Tecnología Industrial"];
var segundoBachilleratoHumSoc = ["Historia de España","Lengua Castellana y Literatura","Inglés","Francés","Latín","Matemáticas","Economía de la empresa","Geografía","Griego","Historia del Arte","Historia de la Filosofía"];
var segundoBachilleratoArtes = ["Historia de España","Lengua Castellana y Literatura","Inglés","Francés","Fundamentos del arte","Artes Escénicas","Cultura Audiovisual","Diseño"];


//Niveles académicos
var nivelesPrimaria = ["1º Primaria","2º Primaria","3º Primaria","4º Primaria","5º Primaria","6º Primaria"];

var nivelesSecundaria = ["1º ESO","2º ESO","3º ESO","4º ESO"];

var nivelesBachilleratoPrimero = ["1º Bachillerato Científico","1º Bachillerato Humanidades y Ciencias Sociales","1º Bachillerato Artístico"];

var nivelesBachilleratoSegundo = ["2º Bachillerato Científico","2º Bachillerato Humanidades y Ciencias Sociales","2º Bachillerato Artístico"];


//Etapas académicas
var etapas = ["Primaria","Secundaria","Bachillerato"];





function RellenaEtapas(){
    for(var i = 0;i<etapas.length;i++){
        $("#EtapaAcademica").append( '<option value="'+etapas[i]+'">'+etapas[i]+'</option>');
    }
}

function AsignaturasPrimaria(){
    LimpiarAsignaturas();
    $('#asignatura').append( '<option selected value="'+primaria[0]+'">'+primaria[0]+'</option>' );
    for(var i = 1;i<primaria.length;i++){
        $('#asignatura').append( '<option value="'+primaria[i]+'">'+primaria[i]+'</option>' );
    }
}

function AsignaturasSecundaria(){
    $('#asignatura').append( '<option selected value="'+secundaria[0]+'">'+secundaria[0]+'</option>' );
    for(var i = 1;i<secundaria.length;i++){
        $('#asignatura').append( '<option value="'+secundaria[i]+'">'+secundaria[i]+'</option>' );
    }
}

function AsignaturasCuartoESO(){
    $('#asignatura').append( '<option selected value="'+secundariaCuarto[0]+'">'+secundariaCuarto[0]+'</option>' );
    for(var i = 1;i<secundariaCuarto.length;i++){
        $('#asignatura').append( '<option value="'+secundariaCuarto[i]+'">'+secundariaCuarto[i]+'</option>' );
    }
}

function AsignaturasPrimeroBachCiencias(){
    
    $("#asignatura").append('<option selected value="'+primeroBachilleratoCiencias[0]+'">'+primeroBachilleratoCiencias[0]+'</option>');
    for(var i = 1;i<primeroBachilleratoCiencias.length;i++){
        $("#asignatura").append('<option value="'+primeroBachilleratoCiencias[i]+'">'+primeroBachilleratoCiencias[i]+'</option>');
    }
}

function AsignaturasPrimeroBachHumSoc(){
    
    $("#asignatura").append('<option selected value="'+primeroBachilleratoHumSoc[0]+'">'+primeroBachilleratoHumSoc[0]+'</option>');
    for(var i = 1;i<primeroBachilleratoHumSoc.length;i++){
        $("#asignatura").append('<option value="'+primeroBachilleratoHumSoc[i]+'">'+primeroBachilleratoHumSoc[i]+'</option>');
    }
}

function AsignaturasPrimeroBachArt(){
    $("#asignatura").append('<option selected value="'+primeroBachilleratoArtes[0]+'">'+primeroBachilleratoArtes[0]+'</option>');
    for(var i = 1;i<primeroBachilleratoArtes.length;i++){
        $("#asignatura").append('<option value="'+primeroBachilleratoArtes[i]+'">'+primeroBachilleratoArtes[i]+'</option>');
    }
}

function AsignaturasSegundoBachCiencias(){
    $("#asignatura").append('<option selected value="'+segundoBachilleratoCiencias[0]+'">'+segundoBachilleratoCiencias[0]+'</option>');
    for(var i = 1;i<segundoBachilleratoCiencias.length;i++){
        $("#asignatura").append('<option value="'+segundoBachilleratoCiencias[i]+'">'+segundoBachilleratoCiencias[i]+'</option>');
    }
}

function AsignaturasSegundoBachHumSoc(){
    $("#asignatura").append('<option selected value="'+segundoBachilleratoHumSoc[0]+'">'+segundoBachilleratoHumSoc[0]+'</option>');
    for(var i = 1;i<segundoBachilleratoHumSoc.length;i++){
        $("#asignatura").append('<option value="'+segundoBachilleratoHumSoc[i]+'">'+segundoBachilleratoHumSoc[i]+'</option>');
    }
}

function AsignaturasSegundoBachArt(){
    $("#asignatura").append('<option selected value="'+segundoBachilleratoArtes[0]+'">'+segundoBachilleratoArtes[0]+'</option>');
    for(var i = 1;i<segundoBachilleratoArtes.length;i++){
        $("#asignatura").append('<option value="'+segundoBachilleratoArtes[i]+'">'+segundoBachilleratoArtes[i]+'</option>');
    }
}




function NivelesPrimaria(){
   
    LimpiarAsignaturas();
    for(var i = 0;i<nivelesPrimaria.length;i++){
        $('#nivelAcademico').append( '<option value="'+nivelesPrimaria[i]+'">'+nivelesPrimaria[i]+'</option>' );
    }
}

function NivelesSecundaria(){
    
    for(var i = 0;i<nivelesSecundaria.length;i++){
        $('#nivelAcademico').append( '<option value="'+nivelesSecundaria[i]+'">'+nivelesSecundaria[i]+'</option>' );
    }
}

function NivelesBachillerato(){
    //$('#nivelAcademico').append( '<option selected value="'+nivelesBachilleratoPrimero[0]+'">'+nivelesBachilleratoPrimero[0]+'</option>' );
    for(var i = 0;i<nivelesBachilleratoPrimero.length;i++){
        $('#nivelAcademico').append( '<option value="'+nivelesBachilleratoPrimero[i]+'">'+nivelesBachilleratoPrimero[i]+'</option>' );
    }
    for(var i = 0;i<nivelesBachilleratoSegundo.length;i++){
        $('#nivelAcademico').append( '<option value="'+nivelesBachilleratoSegundo[i]+'">'+nivelesBachilleratoSegundo[i]+'</option>' );
    }
}

function LimpiarNiveles(){
    $("#nivelAcademico").html("<option value='nada'>---</option>");
}


function LimpiarAsignaturas(){
    $("#asignatura").html("<option value='nada'>---</option>");
}


function LimpiarEtapas(){
    $("#EtapaAcademica").html("<option value='nada'>---</option>");
}

function CompruebaCampos(){
    var etapa = $("#EtapaAcademica").val();
    var nivel = $("#nivelAcademico").val();
    var asignatura = $("#asignatura").val();
    console.log(etapa,nivel,asignatura);
    if(etapa == "nada" || nivel == "nada" || asignatura == "nada"){
        bootbox.alert("Oops! Has dejado algún campo vacío.")
        return false;
    }else{
        return true;
    }
    
}