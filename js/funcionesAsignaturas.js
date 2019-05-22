var primaria = ["Lengua Castellana y Literatura","Matemáticas","Ciencias de la Naturaleza","Ciencias Sociales"
,"Inglés","Educación Física", "Religión","Valores Sociales y Cívicos","Educación Artística"];

var secundaria = ["Biología y Geología","Geografía e Historia","Lengua Castellana y Literatura","Matemáticas","Educación Física","Religión","Música","Tecnología"];

var bachillerato = [];

var nivelesPrimaria = ["1º Primaria","2º Primaria","3º Primaria","4º Primaria","5º Primaria","6º Primaria"];

var nivelesSecundaria = ["1º ESO","2º ESO","3º ESO","4º ESO"];

var nivelesBachillerato = ["1º Bachillerato","2º Bachillerato"];




function AsignaturasPrimaria(){
    LimpiarAsignaturas();
    for(var i = 0;i<primaria.length;i++){
        $('#asignatura').append( '<option value="'+primaria[i]+'">'+primaria[i]+'</option>' );
    }
}

function AsignaturasSecundaria(){
    
    for(var i = 0;i<secundaria.length;i++){
        $('#asignatura').append( '<option value="'+secundaria[i]+'">'+secundaria[i]+'</option>' );
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


function LimpiarNiveles(){
    $("#nivelAcademico").empty();
}


function LimpiarAsignaturas(){
    $("#asignatura").empty();
}

function LimpiarEtapas(){
    $("#etapaAcademica").empty();
}