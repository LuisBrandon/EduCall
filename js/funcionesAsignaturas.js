var primaria = ["Lengua Castellana y Literatura","Matemáticas","Ciencias de la Naturaleza","Ciencias Sociales"
,"Inglés","Educación Física", "Religión","Valores Sociales y Cívicos","Educación Artística"];

var secundaria = ["Biología y Geología","Geografía e Historia","Lengua Castellana y Literatura","Matemáticas","Inglés","Francés","Música","Tecnología","Educación Plástica","Educación Física","Cultura Clásica"];

var bachillerato = [];

var nivelesPrimaria = ["1º Primaria","2º Primaria","3º Primaria","4º Primaria","5º Primaria","6º Primaria"];

var nivelesSecundaria = ["1º ESO","2º ESO","3º ESO","4º ESO"];

var nivelesBachillerato = ["1º Bachillerato Científico","1º Bachillerato Humanidades y Ciencias Sociales","1º Bachillerato Artístico",
"2º Bachillerato Científico","2º Bachillerato Humanidades y Ciencias Sociales","2º Bachillerato Artístico"];

var etapas = ["Infantil","Primaria","Secundaria","Bachillerato"];

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

function NivelesBachillerato(){
    for(var i = 0;i<nivelesBachillerato.length;i++){
        $('#nivelAcademico').append( '<option value="'+nivelesBachillerato[i]+'">'+nivelesBachillerato[i]+'</option>' );
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