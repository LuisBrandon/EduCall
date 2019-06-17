<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config.php';
include_once '../clases/profesor.php';

$baseDatos = new Database();
$bd = $baseDatos->getConnection();

$profesor = new Profesor($bd);

//Obtenemos los datos
$datosProfesor = json_decode(file_get_contents("php://input"));

//Verificamos los datos
if (
    !empty($datosProfesor->nombre) &&
    !empty($datosProfesor->apellido1) &&
    !empty($datosProfesor->email) &&
    !empty($datosProfesor->pass) &&
    !empty($datosProfesor->provincia) &&
    !empty($datosProfesor->nivelAcademicoPriAsig) &&
    !empty($datosProfesor->asignatura1)
) {
    $profesor->nombre = $datosProfesor->nombre;
    $profesor->apellido1 = $datosProfesor->apellido1;
    $profesor->apellido2 = $datosProfesor->apellido2;
    $profesor->email = $datosProfesor->email;
    $profesor->pass = md5($datosProfesor->pass);
    $profesor->telefono = $datosProfesor->telefono;
    $profesor->provincia = $datosProfesor->provincia;
    $profesor->fechaRegistro = date('Y-m-d H:i:s');
    $profesor->nivelAcademicoPriAsig = $datosProfesor->nivelAcademicoPriAsig;
    $profesor->asignatura1 = $datosProfesor->asignatura1;
    $profesor->nivelAcademicoSegAsig = $datosProfesor->nivelAcademicoSegAsig;
    $profesor->asignatura2 = $datosProfesor->asignatura2;
    $profesor->infoAdicional = $datosProfesor->infoAdicional;

    if ($profesor->registroProfesor()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("mensaje" => "Profesor creado correctamente."));
    }

    // if unable to create the product, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("mensaje" => "No se ha podido crear el profesor."));
    }
}

// tell the user data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("mensaje" => "No se ha podido crear el profesor. Faltan datos."));
}