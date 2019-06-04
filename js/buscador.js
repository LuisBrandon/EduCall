function CompruebaEtapa() {
    var etapa = $("#EtapaAcademica").val();

    if (etapa == "Primaria") {
        // LimpiarEtapas();
        // RellenaEtapas();
        LimpiarNiveles();
        LimpiarAsignaturas();
        NivelesPrimaria();
    }
    if (etapa == "Secundaria") {
        // LimpiarEtapas();
        // RellenaEtapas();
        LimpiarNiveles();
        LimpiarAsignaturas();
        NivelesSecundaria();
    }
    if(etapa == "Bachillerato"){
        LimpiarNiveles();
        LimpiarAsignaturas();
        NivelesBachillerato();
    }
}

function CompruebaNivel(){
    var nivel = $("#nivelAcademico").val();
    //Los de primaria
    if(nivel == "1º Primaria" || nivel == "2º Primaria" || nivel == "3º Primaria" || nivel == "1º Primaria"
    || nivel == "4º Primaria" || nivel == "5º Primaria" || nivel == "6º Primaria"){
        LimpiarAsignaturas();
        AsignaturasPrimaria();
    }

    //Los de secundaria
    if(nivel == "1º ESO" || nivel == "2º ESO" || nivel == "3º ESO"){
        LimpiarAsignaturas();
        AsignaturasSecundaria();
    }
    if(nivel == "4º ESO"){
        LimpiarAsignaturas();
        AsignaturasCuartoESO();
    }


    //Los de bachillerato
    if(nivel  == "1º Bachillerato Científico"){
        LimpiarAsignaturas();
        AsignaturasPrimeroBachCiencias();
    }

    if(nivel == "1º Bachillerato Humanidades y Ciencias Sociales"){
        LimpiarAsignaturas();
        AsignaturasPrimeroBachHumSoc();
    }
    if(nivel == "1º Bachillerato Artístico"){
        LimpiarAsignaturas();
        AsignaturasPrimeroBachArt();
    }
    
    if(nivel == "2º Bachillerato Científico"){
        LimpiarAsignaturas();
        AsignaturasSegundoBachCiencias();        
    }

    if(nivel == "2º Bachillerato Humanidades y Ciencias Sociales"){
        LimpiarAsignaturas();
        AsignaturasSegundoBachHumSoc();
    }

    if(nivel == "2º Bachillerato Artístico"){
        LimpiarAsignaturas();
        AsignaturasSegundoBachArt();
    }

}