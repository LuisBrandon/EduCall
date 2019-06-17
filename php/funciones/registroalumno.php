<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config.php';
include_once '../clases/alumno.php';

$baseDatos = new Database();
$bd = $baseDatos->getConnection();

$alumno = new Alumno($bd);

//Obtenemos los datos
$datosAlumno = json_decode(file_get_contents("php://input"));

//Verificamos los datos
if (
    !empty($datosAlumno->nombre) &&
    !empty($datosAlumno->apellido1) &&
    !empty($datosAlumno->email) &&
    !empty($datosAlumno->pass) &&
    !empty($datosAlumno->provincia)
) {
    $alumno->nombre = $datosAlumno->nombre;
    $alumno->apellido1 = $datosAlumno->apellido1;
    $alumno->apellido2 = $datosAlumno->apellido2;
    $alumno->email = $datosAlumno->email;
    $alumno->pass = md5($datosAlumno->pass);
    $alumno->telefono = $datosAlumno->telefono;
    $alumno->provincia = $datosAlumno->provincia;
    $alumno->fechaRegistro = date('Y-m-d H:i:s');

    if ($alumno->registroAlumno()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("mensaje" => "Alumno creado correctamente."));
    }

    // if unable to create the product, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("mensaje" => "No se ha podido crear el alumno."));
    }
}

// tell the user data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("mensaje" => "No se ha podido crear el alumno. Faltan datos."));
}

