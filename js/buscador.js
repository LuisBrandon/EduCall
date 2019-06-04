function CompruebaEtapa() {
    var etapa = $("#EtapaAcademica").val();

    if (etapa == "Primaria") {
        // LimpiarEtapas();
        // RellenaEtapas();
        LimpiarNiveles();
        NivelesPrimaria();
    }
    if (etapa == "Secundaria") {
        // LimpiarEtapas();
        // RellenaEtapas();
        LimpiarNiveles();
        NivelesSecundaria();
    }
    if(etapa == "Bachillerato"){
        LimpiarNiveles();
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
    if(nivel == "1º ESO" || nivel == "2º ESO" || nivel == "3º ESO" || nivel == "4º ESO"){
        LimpiarAsignaturas();
        AsignaturasSecundaria();
    }


    //Los de bachillerato
    // if(nivel ==)
}